<?php
class Carro_home extends MyController {
	
	public $metatags;
	public $depoimento;
	public $maisReservados;
	public $arrayHoras = array();
	public $pagina;
	public $locadoras;
	public $menu;
	public $cidade_definida;
	public $cidade_definida2;
	
	function Carro_home()
	{
		parent::__construct('site');
		
		$this->load->library('Locadora');
		$this->pagina = $this->getPage('home');
		$this->metatags = $this->get('Metatags_model', array('met_id' => $this->pagina[0]->pag_met_id));
		$this->metatags->author = 'Layum Travel';
    	$this->metatags->copyright = 'Layum Travel - '.date('Y');
    	$this->css_js->add('js', '/js/jquery-plus-jquery-ui.js');
    	$this->css_js->add('js', '/js/jtip.js');
    	$this->css_js->add('js', '/js/flash.js');
    	$this->css_js->add('js', '/js/SpryValidationTextField.js');
    	$this->css_js->add('js', '/js/'.SITE.'/site_js.js');
    	$this->css_js->add('js', '/js/jquery.autocomplete.js');
    	$this->css_js->add('js', '/js/jquery.datePickerMultiMonth.js');
    	$this->css_js->add('js', '/js/SpryValidationSelect.js');
    	$this->css_js->add('js', '/js/'.SITE.'/pesquisa.js');
		$this->css_js->add('css', '/css/'.SITE.'/jquery-ui.css');
		
		$locadoras_ativas = $this->get('locadora_model', NULL, 'GetLocAtivas');
		foreach($locadoras_ativas as $active => $id){
			$loc[$active] = new Locadora();
			$loc[$active]->setLocadora($id->loc_id);
		}
		$this->menu->locadoras = $loc;
		$categorias_ativas = $this->get('categoria_model', array('sortBy' => 'cat_ordem', 'sortDirection' => 'ASC'));
		$this->menu->categorias = $categorias_ativas;
	}
	
	function index()
	{
		for($i = 0; $i < 96; $i++){
			$add = $i * 15;
			$this->arrayHoras[] = date('H:i', mktime('00','00'+$add,'00','12','25','2010'));
		}
		$this->depoimento = parent::introdep("Texto do depoimento");
		if ($this->input->post('cityRet')){
			$this->cidade_definida = $this->input->post('cityRet');
		}else{
			$this->cidade_definida = "Digite Cidade de Retirada";	
		}
		
		if ($this->input->post('cityDev')){
			$this->cidade_definida2 = $this->input->post('cityDev');
		}else{
			$this->cidade_definida2 = "Digite Cidade de Devolução";
		}

		$this->load->view(SITE.'/home');
	}
	
	private function trataCidade($data){
		$cidade = explode('-',$data);
		$returnCidade = trim($cidade[0]);
		return $returnCidade;
	}
	
	function depoimentos(){
		$this->load->view(SITE.'/depoimentos');
	}
}

/* End of file carro_home.php */
/* Location: ./system/application/controllers/carro_home.php */