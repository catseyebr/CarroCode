<?php
class MyController extends Controller {
  
  private $loaded_models = array();
  public $hoteis_acesso = array();
  public $usuario;
  public $cat_aptos = array();
 
      
  public function __construct ($area = NULL) {
    parent::Controller();
    
    
	$this->load->model('Auth_Model');
    $this->load->model('usuario_model');
    $this->load->model('logs_model');
    
    $this->load->library(
      'session',
      array(
        'ip_address' => $this->input->ip_address(),
        'user_agent' => $this->input->user_agent()  
      )
    );
    
    $this->load->library(
      'auth_acl',
      array(
        'session' => $this->session,
        'model' => $this->Auth_Model,
        'method' => 'getPass',
        'method_acl' => 'getAcl',
        'accessto' => 'site'
      )
    );
    
    $this->setUsuario();
    $this->setArea($area);
    
    $msg = $this->session->userdata('msg');
    
    if (!empty($msg)) {
    	$this->css_js->add('function', NULL, 'alert(\'' . $msg . '\');');
      	$this->session->unset_userdata('msg');
    }
    
  }
  
  private function setUsuario () {
    if ($this->auth_acl->hasUser()) {
      $this->usuario = $this->usuario_model->GetUsuario(array(
                                                      'usu_id' => $this->auth_acl->getUserId()
                                                    ));
    } else {
      $this->usuario = new stdClass();
      $this->usuario->usu_id      	= NULL;
      $this->usuario->usu_nome    	= NULL;
      $this->usuario->usu_login 	= NULL;
      $this->usuario->usu_senha   	= NULL;
      $this->usuario->usu_email   	= NULL;
    }
  }
  
  private function setArea ($area) {
    $area = !empty($area) ? strtolower($area): 'site';
    switch ($area) {
      case 'admin': $this->setAreaAdmin(); break;
      case 'site': $this->setAreaSite(); break;
      case 'jscom': $this->setAreaJscom(); break;
    }
  }
  
  private function setAreaSite () {
	
    
	
		$this->load->library(
    		'css_js',
    		array(
      		'multiple' => array(
        			'css' => array('/css/'.SITE.'/estilo.css'),
        			'js' => array('/js/'.SITE.'/site.js')
      			)
    		)
  		);	
}
  
  private function setAreaAdmin () {
	 
    $this->load->library(
    		'css_js',
    		array(
      		'multiple' => array(
        			'css' => array(
          				'/css/adm/style.css',
						'/css/adm/jquery-ui-1.8.5.custom.css',
						'/css/adm/ui.jqgrid.css'
    				),
        			'js' => array(
          				'/js/adm/script.js',
    					'/js/adm/jquery-1.4.2.min.js',
    					'/js/adm/jquery-ui-1.8.5.custom.min.js',
						'/js/adm/grid.locale-pt-br.js',
						'/js/adm/jquery.jqGrid.min.js'
        			)
      			)
    		)
  	);
	
  	
  	$controler = $this->uri->segment('2');
  	$acao = $this->uri->segment('3');
  	
  	if ($controler != 'login' && $controler != 'logout') {
      if (!$this->auth_acl->hasAuth('admin')) {
        redirect('/adm/login');
      } else {
        if(!$this->auth_acl->hasAuth($controler . '-' . $acao)) {
          if ($acao == 'lista') {
            redirect('/adm/');
          } else if (!empty($controler)) {
            redirect('/adm/' . $controler . '/lista');
          }
        }
      }
    }
	
    
    $this->logMe('Acesso');
  }
  
  private function setAreaJscom () {
  }
  
  public function setFiltros ($opt) {
    $this->filters  = array();
    $this->offset   = ($this->uri->segment($this->uri->total_segments() - 1) == 'pagina') ? intval($this->uri->segment($this->uri->total_segments())) : 0;
    $this->per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));
    $this->sortby   = $this->input->post('sortby');
    $this->sortdir  = $this->input->post('sortdir');
    $fields   = $this->input->post('fields');
    $values   = $this->input->post('values');
     
    $opt['sortBy'] = isset($opt['sortBy']) ? $opt['sortBy'] : NULL;
    
    $opt['limit']         = !empty($this->per_page) ? $this->per_page : 20;
    $opt['offset']        = !empty($this->offset)   ? $this->offset   : 0;
    $opt['sortBy']        = !empty($this->sortby)   ? $this->sortby   : $opt['sortBy'];
    $opt['sortDirection'] = ($this->sortdir == 'a') ? 'ASC'           : 'DESC';
    
    for ($i = 0, $s = count($fields); $i < $s; $i++) {
      if ($values[$i] != '') {
        $val = $fields[$i];
        $this->filters[$val] = $values[$i];
      }
    }
    
    $this->session->set_userdata('per_page', $this->per_page);
    
    $opt = array_merge($this->filters, $opt);
    return $opt;
  }
  
  protected function objDiff ($antigo, $novo) {
    $r = array();
    $equals = array();
    $arr_antigo = array_keys(get_object_vars($antigo));
    $arr_novo = array_keys(get_object_vars($novo));
    for ($i = 0, $s = count ($arr_antigo); $i < $s; $i++) {
      for ($j = 0, $c = count ($arr_novo); $j < $c; $j++) {
        if ($arr_antigo[$i] == $arr_novo[$j]) {
          $equals[] = $arr_antigo[$i];
        }
      }
    }
    
    for ($i = 0, $s = count ($equals); $i < $s; $i++) {
      if ($antigo->{$equals[$i]} != $novo->{$equals[$i]}) {
        $cr = count($r);
        $r[$cr]['campo']  = $equals[$i];
        $r[$cr]['antigo'] = $antigo->{$equals[$i]};
        $r[$cr]['novo']   = $novo->{$equals[$i]};
      }
    }
    
    return $r;
  }
  
  protected function obj_merge () {
    $objs = func_get_args();
    $arrs = array();
    $r = new stdClass();
    
    $obj_vars = NULL;
    for ($i = 0, $s = count($objs); $i < $s; $i++) {
      if (is_object($objs[$i])) {
        $obj_vars = get_object_vars($objs[$i]);
        if (!empty($obj_vars)) {
          $arrs[] = $obj_vars;
        }
      }
    }
    unset($obj_vars);
    
    $final_arr = array();
    for ($i = 0, $s = count($arrs); $i < $s; $i++) {
      $final_arr += $arrs[$i];
    }
    
    foreach ($final_arr as $key => $value) {
      $r->{$key} = $value;
    }
    
    return $r;
  }
  
  public function logMe ($tipo, $tabela = NULL, $campo = NULL, $valor_antigo = NULL, $valor_novo = NULL) {
    /**
     * TODO: trocar $this->input->ip_address() por $this->input->server('REMOTE_HOST'));
     */         
    $this->logs_model->AddLogs(array(
    							'log_proj_id'  		=> PROJETO,
                                'log_usu_id'    	=> $this->usuario->usu_id,
                                'log_nomeusuario'  	=> NULL,//$this->usuario->usu_nome,
                                'log_emailusuario' 	=> NULL,//$this->usuario->usu_email,
                                'log_tipo'         	=> $tipo,
                                'log_url'          	=> $this->uri->uri_string(),
                                'log_data'         	=> date('Y-m-d H:i:s'),
                                'log_ip'           	=> $this->input->ip_address(),
                                'log_useragent'    	=> $this->input->user_agent(),
                                'log_tabela'       	=> $tabela,
                                'log_campo'        	=> $campo,
                                'log_valor_antigo' 	=> $valor_antigo,
                                'log_valor_novo'   	=> $valor_novo,
                               ));
  }
  
  protected function get ($model, $options, $method = NULL) {
    if (!in_array($model, $this->loaded_models)) {
      $this->load->model(strtolower($model));
      $this->loaded_models[] = $model;
    }
    
    $method = (!empty($method) && method_exists($this->{strtolower($model)}, $method)) ? $method : 'Get' . substr($model, 0, strpos($model, '_'));
    
    return $this->{strtolower($model)}->{$method}($options); 
  }
  
  protected function update ($model, $novo, $antigo, $method = NULL) {
    if (!in_array($model, $this->loaded_models)) {
      $this->load->model(strtolower($model));
      $this->loaded_models[] = $model;
    }
    
    $method = (!empty($method) && method_exists($this->{strtolower($model)}, $method)) ? $method : 'Update' . substr($model, 0, strpos($model, '_'));
    $tabela = strtolower(substr(preg_replace('/([A-Z])/','_$1', strstr($model, '_', TRUE)), 1));
    
    $r = $this->{strtolower($model)}->{$method}(get_object_vars($novo));
    
    if ($r > 0) {
      $diff = $this->objDiff($antigo, $novo);
      for ($i = 0, $s = count ($diff); $i < $s; $i++) {
        $this->logMe('Alteração', $tabela, $diff[$i]['campo'], $diff[$i]['antigo'], $diff[$i]['novo']);
      }
    }
    
    return $r;
  }
  
  protected function insert ($model, $options, $method = NULL) {
    if (!in_array($model, $this->loaded_models)) {
      $this->load->model(strtolower($model));
      $this->loaded_models[] = $model;
    }
    
    $method = (!empty($method) && method_exists($this->{strtolower($model)}, $method)) ? $method : 'Add' . substr($model, 0, strpos($model, '_'));
    $tabela = strtolower(substr(preg_replace('/([A-Z])/','_$1', strstr($model, '_', TRUE)), 1));
    
    $r = $this->{strtolower($model)}->{$method}($options);
    if ($r == FALSE) {
      $r = '';
      foreach ($options as $key => $value) {
        if (preg_match('/.{3}_id.*?$/', $key)) {
          if (strlen($r) > 0) {
            $r .= ',';
          }
          $r .= $value;
        }
      }
    }
    
    if (!empty ($r)) {
      $this->logMe('Inserção', $tabela, 'ID', NULL, $r);
    }
    
    return $r;
  }
  
  protected function delete ($model, $options, $method = NULL) {
    if (!in_array($model, $this->loaded_models)) {
      $this->load->model(strtolower($model));
      $this->loaded_models[] = $model;
    }
    
    $method = (!empty($method) && method_exists($this->{strtolower($model)}, $method)) ? $method : 'Delete' . substr($model, 0, strpos($model, '_'));
    $tabela = strtolower(substr(preg_replace('/([A-Z])/','_$1', strstr($model, '_', TRUE)), 1));
    
    $this->{strtolower($model)}->{$method}($options);
    
    $r = '';
    foreach ($options as $key => $value) {
      if (preg_match('/.{3}_id$/', $key)) {
        $r = $value;
        break;
      } else if (preg_match('/.{3}_id.*?$/', $key)) {
        if (strlen($r) > 0) {
          $r .= ',';
        }
        $r .= $value;
      }
    }
    
    if (!empty ($r)) {
      $this->logMe('Remoção', $tabela, 'ID', $r, NULL);
    }
    
    return $r;
  }
  
  
  
  public function __destruct () {
    $this->auth_acl->setSession();
  }
	
  	public function crop_resize ($opt_img) {
  		$areaWidth = $opt_img['dx'];
        $areaHeight = $opt_img['dy'];
        $scale=1;
        $x = $areaWidth/$opt_img['inputWidth'];
        $y = $areaHeight/$opt_img['inputHeight'];
        if($x < $y) {
        	$newWidth = round($opt_img['inputWidth']*($areaHeight/$opt_img['inputHeight']));
        	$newHeight = $areaHeight;
        } else {
        	$newHeight = round($opt_img['inputHeight']*($areaWidth/$opt_img['inputWidth']));
        	$newWidth = $areaWidth;
        }
        $source_aspect_ratio = $opt_img['inputWidth'] / $opt_img['inputHeight'];
        $desired_aspect_ratio = $opt_img['dx'] / $opt_img['dy'];
        if ( $source_aspect_ratio > $desired_aspect_ratio ){
       		$temp_height = $opt_img['dy'];
        	$temp_width = ( int ) ( $opt_img['dy'] * $source_aspect_ratio );
        }else{
        	$temp_width = $opt_img['dx'];
        	$temp_height = ( int ) ( $opt_img['dx'] / $source_aspect_ratio );
        }
        
        $config['x_axis'] = ($temp_width - $areaWidth)/2;
        $config['y_axis'] = ($temp_height - $areaHeight)/2;
        $config['image_library'] = 'GD2';
        $config['quality'] = '100';
        $config['source_image'] = $opt_img['file_path'].$opt_img['file'].$opt_img['file_ext'];
        $config['width'] = $temp_width;
        $config['height'] = $temp_height;
        $config['maintain_ratio'] = true;
        $config['new_image'] = $opt_img['file_path']."thumbs/".$opt_img['file'].$opt_img['file_ext'];
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $config['source_image'] = $opt_img['file_path']."thumbs/".$opt_img['file'].$opt_img['file_ext'];
        $config['width'] = $areaWidth;
        $config['height'] = $areaHeight;
        $config['maintain_ratio'] = false;
        $this->image_lib->initialize($config);
        $this->image_lib->crop();
        return TRUE;
  	}
	public function RemoveAcentos($str){
		$a = array(
			'/[ÂÀÁÄÃ]/'=>'A',
			'/[âãàáä]/'=>'a',
			'/[ÊÈÉË]/'=>'E',
			'/[êèéë]/'=>'e',
			'/[ÎÍÌÏ]/'=>'I',
			'/[îíìï]/'=>'i',
			'/[ÔÕÒÓÖ]/'=>'O',
			'/[ôõòóö]/'=>'o',
			'/[ÛÙÚÜ]/'=>'U',
			'/[ûúùü]/'=>'u',
			'/ç/'=>'c',
			'/Ç/'=> 'C');
	// Tira o acento pela chave do array
		return preg_replace(array_keys($a), array_values($a), $str);
	}
	public function introdep($text) {
		if (strlen($text) > 80) {
			$pos = strpos($text, ' ', "80");
			if ((!$pos) || ($pos > 100)) {
				$pos = 80;
			}
			$text = substr($text, 0, $pos + 1).'...';
			return $text;
		}else{
			return $text;
		}
	}
	public function getPage($pag_url){
		return $this->get('Pagina_model', array('pag_url' => $pag_url, 'pag_proj_id' => PROJETO));
	}
	
	public function dateBrToStd($data){
		$returnData = explode('/',$data);
		return $returnData[2].'-'.$returnData[1].'-'.$returnData[0];
	}
	
	public function dateBrToStd2($data){
		$returnData = explode('-',$data);
		return $returnData[2].'-'.$returnData[1].'-'.$returnData[0];
	}
	
	public function dateStdToBr($data){
		$returnData = explode('-',$data);
		return $returnData[2].'/'.$returnData[1].'/'.$returnData[0];
	}
	
	public function getNomeSemana($data){
		switch ($data){
			case 0:
				$returnData = "Domingo";
				break;
			case 1:
				$returnData = "Segunda-feira";
				break;
			case 2:
				$returnData = "Terça-feira";
				break;
			case 3:
				$returnData = "Quarta-feira";
				break;
			case 4:
				$returnData = "Quinta-feira";
				break;
			case 5:
				$returnData = "Sexta-feira";
				break;
			case 6:
				$returnData = "Sábado";
				break;
		}
		return $returnData;
	}
}

//end of file