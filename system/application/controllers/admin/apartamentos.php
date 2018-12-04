<?php
class Apartamentos extends MyController {
  
  	public $imagens;
	public $apartamentos;
	public $comentarios;
	public $apartamento;
	public $categorias;
	public $hotel;
	public $dados_adicionais;
	public $apartamentosImagens;
	
	public function Apartamentos () {
		parent::__construct('Admin');
      $this->estados    = $this->get('PortalEstados_model', array());
      $this->categorias = $this->get('CategoriasApartamentos_model', array());            
	}
	
	public function index () {
    redirect('/admin/apartamentos/lista');
  }
	
	public function lista () {
	  $this->load->library('pagination');
    
    $hot_id = 0;
    $url_segment = intval($this->uri->segment(5));
    $base_url = '/admin/apartamentos/lista/pagina/';
    $uri_segment = 5;
    
    if ($this->uri->segment(4) == 'id_hotel') {
      if ($this->auth_acl->hasAuth('superadmin')) {
        $hot_id = intval($this->uri->segment(5));
        $url_segment = intval($this->uri->segment(7));
        $base_url = '/admin/apartamentos/lista/id_hotel/' . $hot_id . '/pagina/';
        $uri_segment = 7;
      } else if (in_array($this->uri->segment(5), $this->hoteis_acesso)) {
        $hot_id = intval($this->uri->segment(5));
        $url_segment = intval($this->uri->segment(7));
        $base_url = '/admin/apartamentos/lista/id_hotel/' . $hot_id . '/pagina/';
        $uri_segment = 7;
      } else {
        redirect('/admin/apartamentos/lista');
      }
    }
    
    $opt = array(
      '_join' => array(
          'tipos_apartamentos',
          'hoteis',
          'categorias_apartamentos',
          'bloqueios',
          'hoteis_enderecos',
          'enderecos',
          'portal_cidades',
          'portal_estados'
      )
    );
    
    $this->apartamentos = $this->get('Apartamentos_model', $this->setFiltros($this->checkOptions($hot_id, $opt)));
    
    $per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));
    $config['base_url'] = $base_url;
		$config['total_rows'] = count($this->get('Apartamentos_model', $opt));
		$config['url_segment'] = $url_segment;
		$config['uri_segment'] = $uri_segment;
		$config['per_page'] = !empty($per_page) ? $per_page : 20;
		$this->pagination->initialize($config);
    
    $this->metatags['title'] = "Lista de Apartamentos - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    
    $this->load->view('admin/apartamentos_lista');
	}
	
	public function exibir () {
    $this->setApartamento();
    
    if ($this->apartamento != NULL && $this->apartamento != FALSE) {
      $this->dados_adicionais = $this->get('ApartamentosDadosadicionais_model', array(
                                                                                      'ada_idapartamento' => $this->apartamento->apa_id,
                                                                                      '_join' => array('dadosadicionais_apartamento')
                                                                                    ));
      $this->dados_adicionais = $this->buscaDadosExibir();
      $this->setDAExibicao(NULL, TRUE);
      
      $_join4 = array('imagens');    																	
    	$this->apartamentosImagens = $this->get('ApartamentosImagens_model', array(
    																		'aim_idapartamento' => $this->apartamento->apa_id,
																			'_join' => $_join4
    																	));
      $this->comentarios = $this->get('ComentariosApartamentos_model', array(
                                                'cap_idapartamento' => $this->apartamento->apa_id,
                                                '_join'             => array(
                                                                            'hoteis',
                                                                            'tipos_apartamentos',
                                                                            'categorias_apartamentos',
                                                                            'comentarios'
                                                                        ),
                                                'sortBy'            => 'com_dthcadastro',
                                                'sortDirection'     => 'DESC'
                                                ));
      
      $this->metatags['title'] = "Detalhes do Apartamentos - Administra&ccedil;&atilde;o Reserva de Hotel Online";
      
      $this->load->view('admin/apartamentos_exibir');
    } else {
      redirect('/admin/apartamentos/lista');
    }
	}
	
	public function inserir () {
	  $this->css_js->add('js', '/js/admin/da_apartamento.js', 'loadDAApartamento();');
	  
	  $this->dados_adicionais = $this->get('DadosadicionaisApartamento_model', array());
	  $this->dados_adicionais = $this->buscaDadosInserir();
	  $this->setDAExibicao();
	  
		$this->form_validation->set_rules('hot_nome', 'Hotel', 'required');
		$this->form_validation->set_rules('apa_idcategoria', 'Categoria', 'required');
		$this->form_validation->set_rules('tap_nome', 'Tipo de Apartamento', 'required');
		$this->form_validation->set_rules('apa_quantidade', 'Quantidade', 'required');
		$this->form_validation->set_rules('apa_dtini', 'Data Inicial', 'required');
		$this->form_validation->set_rules('apa_dtfim', 'Data Final', 'required');
    if ($this->input->post('apa_ativo')) {
      $ativo = 1;
    } else{
      $ativo = 0;
    }
		
		if($this->form_validation->run()) {
      $hot_id = $this->getIdHotelByNomeHotel($this->input->post('hot_nome'));
      $tap_id = $this->getIdTipoApartamentoByNomeTipoApartamento($this->input->post('tap_nome'));
  		$adicionar_apartamento = NULL;
  		if (empty($tap_id)) {
  		  $tap_id = $this->insert('TiposApartamentos_model', array(
  		    'tap_nome' => strtoupper($this->input->post('tap_nome')),
  		    'tap_descricao' => strtoupper($this->input->post('tap_nome')),
  		    'tap_ativo' => 1,
  		    'tap_permalink' => strtolower(preg_replace('/[0-9a-z\-_]/i','_',strtr($this->input->post('tap_nome'), "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ", "aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr")))
        ));
      }
  		if (!empty($hot_id) && !empty($tap_id)) {
    		$apa = $this->get('Apartamentos_model', array(
  		                                            'apa_idhotel' => $hot_id,
                                                  'apa_idcategoria' => $this->input->post('apa_idcategoria'),
                                                  'apa_idtipo' => $tap_id
        ));
        
  		  if (empty($apa)) {
          if ($this->auth_acl->hasAuth('superadmin')) {
            $adicionar_apartamento = $this->insert('Apartamentos_model', array(
      			                              'apa_dthcadastro' => date('Y-m-d H:i:s'),
      																		'apa_idhotel' => $hot_id,
      																		'apa_idcategoria' => $this->input->post('apa_idcategoria'),
      																		'apa_idtipo' => $tap_id,
      																		'apa_quantidade' => $this->input->post('apa_quantidade'),
      																		'apa_dtini' => preg_replace('/(.{2})\/(.{2})\/(.{4})/', '$3-$2-$1', $this->input->post('apa_dtini')),
      																		'apa_dtfim' => preg_replace('/(.{2})\/(.{2})\/(.{4})/', '$3-$2-$1', $this->input->post('apa_dtfim')),
      																		'apa_ativo' => $ativo
      																		));
      			$this->adicionarDadosAdicionais($adicionar_apartamento);
    			} else if (in_array($hot_id, $this->hoteis_acesso)) {
      			$adicionar_apartamento = $this->insert('Apartamentos_model', array(
      			                              'apa_dthcadastro' => date('Y-m-d H:i:s'),
      																		'apa_idhotel' => $hot_id,
      																		'apa_idcategoria' => $this->input->post('apa_idcategoria'),
      																		'apa_idtipo' => $tap_id,
      																		'apa_quantidade' => $this->input->post('apa_quantidade'),
      																		'apa_dtini' => preg_replace('/(.{2})\/(.{2})\/(.{4})/', '$3-$2-$1', $this->input->post('apa_dtini')),
      																		'apa_dtfim' => preg_replace('/(.{2})\/(.{2})\/(.{4})/', '$3-$2-$1', $this->input->post('apa_dtfim')),
      																		'apa_ativo' => $ativo
      																		));
            $this->adicionarDadosAdicionais($adicionar_apartamento);
          }
        }
      }
			
      if ($adicionar_apartamento) {
        $this->session->set_userdata('msg', 'Apartamento adicionado com sucesso!');
      } else {
        $this->session->set_userdata('msg', 'Erro ao adicionar apartamento!');
      }
      
      redirect('/admin/apartamentos/lista');
		}
		
		$this->metatags['title'] = "Inserir Apartamento - Administra&ccedil;&atilde;o Reserva de Hotel Online";
		
		$this->load->view('admin/apartamentos_inserir');
	}
	
	function editar () {
	  $this->css_js->add('js', '/js/admin/da_apartamento.js', 'loadDAApartamento();');
    $this->setApartamento();
    
    if ($this->apartamento != NULL && $this->apartamento != FALSE) {
      $this->dados_adicionais = $this->get('DadosadicionaisApartamento_model', array());
      $dados_cadastrados = $this->get('ApartamentosDadosadicionais_model', array('ada_idapartamento' => $this->apartamento->apa_id));
      $this->dados_adicionais = $this->buscaDadosEditar($dados_cadastrados);
                                                                                                       
  		$this->form_validation->set_rules('hot_nome', 'Hotel', 'required');
  		$this->form_validation->set_rules('apa_idcategoria', 'Categoria', 'required');
  		$this->form_validation->set_rules('tap_nome', 'Apartamento', 'required');
  		$this->form_validation->set_rules('apa_quantidade', 'Quantidade', 'required');
  		$this->form_validation->set_rules('apa_dtini', 'Data Inicial', 'required');
  		$this->form_validation->set_rules('apa_dtfim', 'Data Final', 'required');
      if($this->input->post('apa_ativo')){
        $ativo = 1;
      } else{
        $ativo = 0;
      }
      
      if ($this->form_validation->run()) {
  		  $novo = clone $this->apartamento;
  		  $hot_id = $this->getIdHotelByNomeHotel($this->input->post('hot_nome'));
  		  $tap_id = $this->getIdTipoApartamentoByNomeTipoApartamento($this->input->post('tap_nome'));
  		  
  		  if (!empty($hot_id) && !empty($tap_id)) {
  		    if ($this->auth_acl->hasAuth('superadmin')) {
            $novo->apa_idhotel      = $hot_id;
        		$novo->apa_idcategoria  = $this->input->post('apa_idcategoria');
        		$novo->apa_idtipo       = $tap_id;
      		  $novo->apa_quantidade   = $this->input->post('apa_quantidade');
      		  $novo->apa_dtini        = preg_replace('/(.{2})\/(.{2})\/(.{4})/', '$3-$2-$1', $this->input->post('apa_dtini'));
      		  $novo->apa_dtfim        = preg_replace('/(.{2})\/(.{2})\/(.{4})/', '$3-$2-$1', $this->input->post('apa_dtfim'));
      		  $novo->apa_ativo        = $ativo;
      		  $apa = $this->update('Apartamentos_model', $novo, $this->apartamento);
      		  $ada = $this->editarDadosAdicionais($this->apartamento->apa_id);
            
            $this->dados_adicionais = $this->get('DadosadicionaisApartamento_model', array());
            $dados_cadastrados = $this->get('ApartamentosDadosadicionais_model', array('ada_idapartamento' => $this->apartamento->apa_id));
            $this->dados_adicionais = $this->buscaDadosEditar($dados_cadastrados);
            
    			  if ($apa || $ada) {
              $this->css_js->add("function", NULL, "alert('Apartamento atualizado com sucesso!');");
            } else {
              $this->css_js->add("function", NULL, "alert('Erro ao editar apartamento!');");
            }
          } else if (in_array($hot_id, $this->hoteis_acesso)) {
            $novo->apa_idhotel      = $hot_id;
        		$novo->apa_idcategoria  = $this->input->post('apa_idcategoria');
        		$novo->apa_idtipo       = $tap_id;
      		  $novo->apa_quantidade   = $this->input->post('apa_quantidade');
      		  $novo->apa_dtini        = preg_replace('/(.{2})\/(.{2})\/(.{4})/', '$3-$2-$1', $this->input->post('apa_dtini'));
      		  $novo->apa_dtfim        = preg_replace('/(.{2})\/(.{2})\/(.{4})/', '$3-$2-$1', $this->input->post('apa_dtfim'));
      		  $novo->apa_ativo        = $ativo;
      		  $apa = $this->update('Apartamentos_model', $novo, $this->apartamento);
      		  $ada = $this->editarDadosAdicionais($this->apartamento->apa_id);
      		  
            $this->dados_adicionais = $this->get('DadosadicionaisApartamento_model', array());
            $dados_cadastrados = $this->get('ApartamentosDadosadicionais_model', array('ada_idapartamento' => $this->apartamento->apa_id));
            $this->dados_adicionais = $this->buscaDadosEditar($dados_cadastrados);
            
    			  if ($apa || $ada) {
              $this->css_js->add("function", NULL, "alert('Apartamento atualizado com sucesso!');");
            } else {
              $this->css_js->add("function", NULL, "alert('Erro ao editar apartamento!');");
            }
          } else {
            $this->css_js->add("function", NULL, "alert('Erro ao editar apartamento!');");
          }
        }
        
        $this->apartamento = $novo;
  		}
      
      $this->metatags['title'] = "Editar Apartamento - Administra&ccedil;&atilde;o Reserva de Hotel Online";
      $this->setDAExibicao();
      $this->load->view('admin/apartamentos_editar');
    
    } else {
      redirect('/admin/apartamentos/lista');
    }
	}
	
	public function excluir () {
	  $this->setApartamento();
	  
    if ($this->apartamento != NULL && $this->apartamento != FALSE) {      
      if ($this->delete('Apartamentos_model', array('apa_id' => $this->apartamento->apa_id)) != '') {
        $this->session->set_userdata('msg', 'Apartamento excluído com sucesso!');
      } else {
        $this->session->set_userdata('msg', 'Erro ao excluir apartamento!');
      }
    }
    
    redirect('admin/apartamentos/lista');
	}
	
	
	/**
	 * TODO: passar esse método para a controller correta!;
	 */   	
	public function comentario () {
	  $_join = array('hoteis','tipos_apartamentos','categorias_apartamentos','comentarios');  
		$this->apartamento = $this->get('Apartamentos_model', array(
                                              'apa_id' => $this->input->post('apa_id'),
																			        '_join' => $_join
                                              ));
    $this->comentario       = $this->get('Comentarios_model', array(
                                      'com_id' => $this->input->post('com_id')
                                      ));
    $this->metaTitle = "Coment&aacute;rio".$this->input->post('com_id')." - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    $this->load->view('admin/apartamentos_comentarios');
  }
  
  private function setApartamento () {
    $apa_id = intval($this->uri->segment(4));
      
    if ($apa_id > 0) {
      $this->apartamento = $this->get('Apartamentos_model', array(
                                                        'apa_id' => $apa_id,
                                                        '_join' => array('hoteis',
                                                                        'tipos_apartamentos',
                                                                        'categorias_apartamentos',
                                                                        'comentarios')
                                                        ));
    }
    
    if (!$this->auth_acl->hasAuth('superadmin')) {
      if (!in_array($this->apartamento->hot_id, $this->hoteis_acesso)) {
        redirect('/admin/apartamentos/lista');
      }
    }
  }
  
  private function checkOptions ($hot_id, $opt) {
    if (isset($opt['_join'])) {
      $_join = $opt['_join'];
      unset($opt['_join']);
    } else {
      $_join = array();
    } 
    
    if (!$this->auth_acl->hasAuth('superadmin') && $hot_id <= 0) {
      $opt['hot_id_in'] = $this->hoteis_acesso;
      if (!in_array('hoteis', $_join)) {
        $_join[] = 'hoteis';
      }
    } else if ($hot_id > 0) {
      $opt['hot_id'] = $hot_id;
      if (!in_array('hoteis', $_join)) {
        $_join[] = 'hoteis';
      }
    }
    
    if (!empty($_join)) {
      $opt['_join'] = $_join;
    }
    
    return $opt;
  }
  
  private function buscaDadosInserir ($pai = NULL) {
    $r = array();
    for ($i = 0, $s = count($this->dados_adicionais); $i < $s; $i++) {
      if ($this->dados_adicionais[$i]->dap_pai == $pai) {
        $r[] = $this->dados_adicionais[$i];
        array_splice($this->dados_adicionais, $i, 1);
        $i--;
        $s--;
      }
    }
    for ($i = 0, $s = count($r); $i < $s; $i++) {
      if ($r[$i]->dap_has_lista) {
        $r[$i]->childs = $this->buscaDadosInserir($r[$i]->dap_id);
      } else {
        $r[$i]->childs = array();
      }
    }
    return $r;
  }
  
  private function buscaDadosExibir ($pai = NULL) {
    $r = array();
    for ($i = 0, $s = count($this->dados_adicionais); $i < $s; $i++) {
      if ($this->dados_adicionais[$i]->dap_pai == $pai) {
        $r[] = $this->dados_adicionais[$i];
        array_splice($this->dados_adicionais, $i, 1);
        $i--;
        $s--;
      }
    }
    for ($i = 0, $s = count($r); $i < $s; $i++) {
      if ($r[$i]->dap_has_lista) {
        $r[$i]->childs = $this->buscaDadosExibir($r[$i]->dap_id);
      } else {
        $r[$i]->childs = array();
      }
    }
    return $r;
  }
  
  private function buscaDadosEditar ($dados_cadastrados, $pai = NULL) {
    $r = array();
    $a = 0;
    for ($i = 0, $s = count($this->dados_adicionais); $i < $s; $i++) {
      if ($this->dados_adicionais[$i]->dap_pai == $pai) {
        $r[$a] = $this->dados_adicionais[$i];
        for ($j = 0, $c = count($dados_cadastrados); $j < $c; $j++) {
          if ($dados_cadastrados[$j]->ada_iddadosadicionais == $r[$a]->dap_id) {
            $r[$a] = $this->obj_merge($r[$a], $dados_cadastrados[$j]);
            if (property_exists($r[$a], 'ada_lista')) {
              if (strstr($r[$a]->ada_lista, ',')) {
                $r[$a]->ada_lista = explode(',', $r[$a]->ada_lista);
              } else if ($r[$a]->ada_lista != NULL) {
                $r[$a]->ada_lista = array($r[$a]->ada_lista);
              } else {
                $r[$a]->ada_lista = array();
              }
            }
            array_splice($dados_cadastrados, $j, 1);
            $j--;
            $c--;
          }
        }
        array_splice($this->dados_adicionais, $i, 1);
        $i--;
        $s--;
        $a++;
      }
    }
    for ($i = 0, $s = count($r); $i < $s; $i++) {
      if ($r[$i]->dap_has_lista) {
        $r[$i]->childs = $this->buscaDadosEditar($dados_cadastrados, $r[$i]->dap_id);
      } else {
        $r[$i]->childs = array();
      }
    }
    return $r;
  }
  
  private function setDAExibicao ($dados = NULL, $disable = FALSE) {
    $first = empty($dados) ? TRUE : FALSE;
    $dados = !empty($dados) ? $dados : $this->dados_adicionais;
    $this->da_exibicao = !empty($this->da_exibicao) ? $this->da_exibicao : '';
    for ($i = 0, $s = count($dados); $i < $s; $i++) {
      $this->da_exibicao .= "<div class=\"item contemfloat" . (($i == 0) ? " top" : "") . "\" id=\"item_" . $dados[$i]->dap_id . "\">";
      $this->da_exibicao .= "<div class=\"contemfloat " . (($first) ? "first" : "") . "\">";
      $this->da_exibicao .= "<p>";
      if (!$first) {
        $this->da_exibicao .= "<input type=\"checkbox\" name=\"item_" . $dados[$i]->dap_id . "_check\" id=\"item_" . $dados[$i]->dap_id . "_check\" value=\"1\" class=\"check_bool\" " . ((isset($dados[$i]->ada_iddadosadicionais)) ? " checked=\"checked\"" : "") . " " . ($disable ? "disabled=\"disabled\"" : "") . " />";
      }
      $this->da_exibicao .= $dados[$i]->dap_campo . "</p>";
      if ($dados[$i]->dap_has_bool) {
        $this->da_exibicao .= "<div class=\"item_bool\">"; 
        $this->da_exibicao .= "<input type=\"radio\" name=\"item_" . $dados[$i]->dap_id . "_bool\" id=\"item_" . $dados[$i]->dap_id . "_bool_s\" value=\"1\" class=\"radio_bool\" " . (($dados[$i]->dap_has_bool && isset($dados[$i]->ada_bool)) ? (($dados[$i]->ada_bool == 1) ? " checked=\"checked\"": "") : "") . " " . ($disable ? "disabled=\"disabled\"" : "") . " /> Sim";
        $this->da_exibicao .= "<input type=\"radio\" name=\"item_" . $dados[$i]->dap_id . "_bool\" id=\"item_" . $dados[$i]->dap_id . "_bool_n\" value=\"0\" class=\"radio_bool\" " . (($dados[$i]->dap_has_bool && isset($dados[$i]->ada_bool)) ? (($dados[$i]->ada_bool != 1) ? " checked=\"checked\"": "") : "") . " " . ($disable ? "disabled=\"disabled\"" : "") . " /> Não";
        $this->da_exibicao .= "</div>";
      }
      $campos = FALSE;
      if ($dados[$i]->dap_has_qtde) {
        if (!$campos) {
          $campos = TRUE;
          $this->da_exibicao .= "<div class=\"campos_extra " . ((!isset($dados[$i]->ada_qtde) && !isset($dados[$i]->ada_valor) && !isset($dados[$i]->ada_desc)) ? "inativo" : "") . "\">";
        }
        $this->da_exibicao .= "<div class=\"item_qtde\">";
        $this->da_exibicao .= "<label for=\"item_" . $dados[$i]->dap_id . "_qtde\">Quantidade:</label> <input type=\"text\" name=\"item_" . $dados[$i]->dap_id . "_qtde\" value=\"" . (($dados[$i]->dap_has_qtde && isset($dados[$i]->ada_qtde)) ? ((!empty($dados[$i]->ada_qtde)) ? $dados[$i]->ada_qtde : "") : "") . "\" " . ($disable ? "disabled=\"disabled\"" : "") . " />";
        $this->da_exibicao .= "</div>";
      }
      if ($dados[$i]->dap_has_valor) {
        if (!$campos) {
          $campos = TRUE;
          $this->da_exibicao .= "<div class=\"campos_extra " . ((!isset($dados[$i]->ada_qtde) && !isset($dados[$i]->ada_valor) && !isset($dados[$i]->ada_desc)) ? "inativo" : "") . "\">";
        }
        $this->da_exibicao .= "<div class=\"item_valor\">";
        $this->da_exibicao .= "<label for=\"item_" . $dados[$i]->dap_id . "_valor\">Valor:</label> <input type=\"text\" name=\"item_" . $dados[$i]->dap_id . "_valor\" value=\"" . (($dados[$i]->dap_has_valor && isset($dados[$i]->ada_valor)) ? ((!empty($dados[$i]->ada_valor)) ? $dados[$i]->ada_valor : "") : "") . "\"  " . ($disable ? "disabled=\"disabled\"" : "") . " />";
        $this->da_exibicao .= "</div>";
      }
      if ($dados[$i]->dap_has_desc) {
        if (!$campos) {
          $campos = TRUE;
          $this->da_exibicao .= "<div class=\"campos_extra " . ((!isset($dados[$i]->ada_qtde) && !isset($dados[$i]->ada_valor) && !isset($dados[$i]->ada_desc)) ? "inativo" : "") . "\">";
        }
        $this->da_exibicao .= "<div class=\"item_desc\">";
        $this->da_exibicao .= "<label for=\"item_" . $dados[$i]->dap_id . "_desc\">Descrição:</label> <textarea name=\"item_" . $dados[$i]->dap_id . "_desc\" " . ($disable ? "disabled=\"disabled\"" : "") . " >" . (($dados[$i]->dap_has_desc && isset($dados[$i]->ada_desc)) ? ((!empty($dados[$i]->ada_desc)) ? $dados[$i]->ada_desc : "") : "") . "</textarea>";
        $this->da_exibicao .= "</div>";
      }
      if ($campos) {
        $this->da_exibicao .= "</div>";
      }
      $this->da_exibicao .= "</div>";
      if (!empty($dados[$i]->childs)) {
        $this->da_exibicao .= "<div class=\"childs " . (isset($dados[$i]->ada_lista) ? ((count($dados[$i]->ada_lista) <= 0) ? "inativo" : "") : "inativo") . "\">";
        $this->setDAExibicao($dados[$i]->childs, $disable);
        $this->da_exibicao .= "</div>";
      }
      $this->da_exibicao .= "</div>";
    }
  }
  
  private function adicionarDadosAdicionais ($apa_id, $dados = NULL) {
    $r = '';
    $dados = !empty($dados) ? $dados : $this->dados_adicionais;
    for ($i = 0, $s = count ($dados); $i < $s; $i++) {
      $opt = array();
      $post = $this->input->post('item_' . $dados[$i]->dap_id . '_bool');
      if (empty($post)) {
        $post = $this->input->post('item_' . $dados[$i]->dap_id . '_check');
      }
      if (!empty($post)) {
        $opt = array(
            'ada_iddadosadicionais' => $dados[$i]->dap_id,
            'ada_idapartamento' => $apa_id,
            'ada_bool' => 1,
        );
        if ($dados[$i]->dap_has_qtde) {
          $qtde = $this->input->post('item_' . $dados[$i]->dap_id . '_qtde');
          if (!empty($qtde)) {
            $opt['ada_qtde'] = $qtde;
          }
        }
        if ($dados[$i]->dap_has_valor) {
          $valor = $this->input->post('item_' . $dados[$i]->dap_id . '_valor');
          if (!empty($valor)) {
            $opt['ada_valor'] = $valor;
          }
        }
        if ($dados[$i]->dap_has_desc) {
          $desc = $this->input->post('item_' . $dados[$i]->dap_id . '_desc');
          if (!empty($desc)) {
            $opt['ada_desc'] = $desc;
          }
        }
        if ($dados[$i]->dap_has_lista) {
          $list = $this->adicionarDadosAdicionais($apa_id, $dados[$i]->childs);
          if (!empty($list)) {
            $opt['ada_lista'] = $list;
          }
        }
      } else if ($dados[$i]->dap_pai == NULL) {
        $opt = array(
            'ada_iddadosadicionais' => $dados[$i]->dap_id,
            'ada_idapartamento' => $apa_id,
            'ada_bool' => 0,
        );
      }
      if (!empty($opt)) {
        if ($r != '') {
          $r .= ',';
        }
        $add = $this->insert('ApartamentosDadosadicionais_model', $opt);
        $r .= substr($add, 0, strpos($add,','));
      }
    }
    return $r;
  }
  
  private function editarDadosAdicionais ($apa_id, $dados = NULL) {
    $r = '';
    $dados = !empty($dados) ? $dados : $this->dados_adicionais;
    for ($i = 0, $s = count ($dados); $i < $s; $i++) {
      $child_update = FALSE;
      $antigo = $dados[$i];
      $novo = clone $antigo;
      $opt = array();
      if ($antigo->dap_has_lista && isset($antigo->ada_lista)) {
        if (!empty($antigo->ada_lista)) {
          $ada_lista = '';
          for ($j = 0, $c = count($antigo->ada_lista); $j < $c; $j++) {
            if ($ada_lista != '') {
              $ada_lista .= ',';
            }
            $ada_lista .= $antigo->ada_lista[$j];
          }
          $antigo->ada_lista = $ada_lista;
          unset($ada_lista);
        } else {
          $antigo->ada_lista = NULL;
        }
      }
      $post = $this->input->post('item_' . $antigo->dap_id . '_bool');
      if (empty($post)) {
        $post = $this->input->post('item_' . $antigo->dap_id . '_check');
      }
      if (!empty($post)) {
        $novo->ada_iddadosadicionais = $antigo->dap_id;
        $novo->ada_idapartamento = $apa_id;
        $novo->ada_bool = 1;
        if ($antigo->dap_has_qtde) {
          $qtde = $this->input->post('item_' . $antigo->dap_id . '_qtde');
          if (!empty($qtde)) {
            $novo->ada_qtde = $qtde;
          } else {
            $novo->ada_qtde = NULL;
          }
        }
        if ($antigo->dap_has_valor) {
          $valor = $this->input->post('item_' . $antigo->dap_id . '_valor');
          if (!empty($valor)) {
            $novo->ada_valor = $valor;
          } else {
            $novo->ada_valor = NULL;
          }
        }
        if ($antigo->dap_has_desc) {
          $desc = $this->input->post('item_' . $antigo->dap_id . '_desc');
          if (!empty($desc)) {
            $novo->ada_desc = $desc;
          } else {
            $novo->ada_desc = NULL;
          }
        }
        if ($antigo->dap_has_lista) {
          $list = $this->editarDadosAdicionais($apa_id, $antigo->childs); 
          if (!empty($list)) {
            $novo->ada_lista = $list;
            $child_update = TRUE;
          } else {
            $novo->ada_lista = NULL;
          }
        } else {
          $novo->ada_lista = NULL;
        }
      } else if ($antigo->dap_pai == NULL) {
        $novo->ada_iddadosadicionais = $antigo->dap_id;
        $novo->ada_idapartamento = $apa_id;
        $novo->ada_bool = 0;
        $novo->ada_qtde = NULL;
        $novo->ada_valor = NULL;
        $novo->ada_desc = NULL;
        $novo->ada_lista = NULL;
        if (!empty($antigo->childs)) {
          $this->excluirDadosAdicionais($antigo->childs);
        }
      } else {
        $novo->ada_lista = NULL;
      }
      if (!empty($antigo->ada_iddadosadicionais)) {
        if (count($this->objDiff($antigo, $novo)) > 0) {
          if($this->update('ApartamentosDadosadicionais_model', $novo, $antigo)) {
            if ($r != '') {
              $r .= ',';
            }
            $r .= $novo->ada_iddadosadicionais;
          }
        }
      } else if (!empty($novo->ada_iddadosadicionais)) {
        if ($r != '') {
          $r .= ',';
        }
        $add = $this->insert('ApartamentosDadosadicionais_model', get_object_vars($novo));
        $r .= substr($add, 0, strpos($add,','));
      } else if ($child_update) {
        if ($r != '') {
          $r .= ',';
        }
        $r .= $novo->ada_iddadosadicionais;
      }
    }
    return $r;
  }
  
  private function excluirDadosAdicionais ($dados = NULL) {
    $dados = !empty($dados) ? $dados : $this->dados_adicionais;
    for ($i = 0, $s = count ($dados); $i < $s; $i++) {
      if (!empty($dados[$i]->childs)) {
        $this->excluirDadosAdicionais($dados[$i]->childs);
      }
      if (!empty($dados[$i]->ada_idapartamento) && !empty($dados[$i]->ada_iddadosadicionais)) {
        $this->delete('ApartamentosDadosadicionais_model', array('ada_idapartamento' => $dados[$i]->ada_idapartamento, 'ada_iddadosadicionais' => $dados[$i]->ada_iddadosadicionais));
      }
    }
  }
}

/* End of file apartamentos.php */
/* Location: ./system/application/controllers/admin/apartamentos.php */