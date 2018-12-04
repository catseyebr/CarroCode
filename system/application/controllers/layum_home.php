<?php
class Layum_home extends MyController {
	
	public $data = array();
	public $nivel1_def;
  	public $nivel2_def;
	
	function Layum_home()
	{
		parent::__construct('site');
		$this->load->library('Locadora');
		$this->pagina = $this->getPage('home');
		$this->metatags = $this->get('Metatags_model', array('met_id' => $this->pagina[0]->pag_met_id));
		$this->metatags->author = 'Layum Travel';
    	$this->metatags->copyright = 'Layum Travel - '.date('Y');
		$this->css_js->add('css', '/css/'.SITE.'/home.css');
		$this->css_js->add('css', '/css/'.SITE.'/topo.css');
		$this->css_js->add('css', '/css/'.SITE.'/menu.css');
		$this->css_js->add('css', '/css/'.SITE.'/rodape.css');
		$this->css_js->add('css', '/css/'.SITE.'/comp_busca.css');
		$this->css_js->add('css', '/css/'.SITE.'/jquery-ui-1.8.2.custom.css');
		$this->css_js->add('js', '/js/'.SITE.'/jquery-1.4.2.min.js');
		$this->css_js->add('js', '/js/'.SITE.'/jquery-ui-1.8.2.custom.min.js');
		$this->css_js->add('js', '/js/'.SITE.'/menu.js');
		$this->css_js->add('js', '/js/'.SITE.'/jquery.scrollTo-min.js');
		$this->css_js->add('js', '/js/jquery.autocomplete.js');
		$this->css_js->add('js', '/js/'.SITE.'/pesquisa.js');
		$this->css_js->add('js', '/js/'.SITE.'/calendario.js');
		
		$locadoras_ativas = $this->get('locadora_model', NULL, 'GetLocAtivas');
		foreach($locadoras_ativas as $active => $id){
			$loc[$active] = new Locadora();
			$loc[$active]->setLocadora($id->loc_id);
		}
		$this->menu->locadoras = $loc;
		$categorias_ativas = $this->get('categoria_model', array('sortBy' => 'cat_ordem', 'sortDirection' => 'ASC'));
		$this->menu->categorias = $categorias_ativas;
		
		$this->nivel1_def = 1;
      	$this->nivel2_def = 2;
	}
	
	function index()
	{
		for($i = 0; $i < 96; $i++){
			$add = $i * 15;
			$this->arrayHoras[] = date('H:i', mktime('00','00'+$add,'00','12','25','2010'));
		}
		$this->load->view(SITE.'/home.php');
	}
	
	function embreve()
	{
		$this->css_js->add('css', '/css/'.SITE.'/embreve.css');
		$this->load->view(SITE.'/embreve.php');
	}
}

/* End of file layum_home.php */
/* Location: ./system/application/controllers/layum_home.php */