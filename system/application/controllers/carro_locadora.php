<?php
class Carro_Locadora extends MyController {
	
	public $data = array();
	public $nivel1_def;
  	public $nivel2_def;
	public $metatags;
	public $arrayHoras = array();
	public $pagina;
	public $locadoras;
	public $locadora;
	public $menu;
	public $loc_id;
	
	function Carro_Locadora()
	{
		parent::__construct('site');
		$this->load->library('locadora');
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
		
		$this->nivel1_def = 1;
      	$this->nivel2_def = 2;
	}
	
	function index()
	{
		$this->carregaLocadora();
	}
	
	function carregaLocadora()
	{
		$this->loc_id = $this->uri->rsegment(3);
		$this->protecoes_disponiveis = $this->get('protecao_model', array('prot_loc_id' => $this->loc_id,'sortBy' => 'prot_ordem', 'sortDirection' => 'ASC'));
		foreach ($this->protecoes_disponiveis as $prot_dispo => $prot_value){
			$prot_value->tarifa = $this->get('tarifaprotecoes_model', array(
					'tarprot_prot_id' 			=> $prot_value->prot_id,
					'tarprot_ativo' 			=> 't',
					'tarprot_ndiainicial' 		=> 1,
					'tarprot_ndiafinal' 		=> 1,
					'tarprot_validadeinicial' 	=> "2010-01-01",
					'tarprot_validadefinal' 	=> "2011-01-01"
				)
			);
		}
		$this->locadora = new Locadora();
		$this->locadora->setLocadora($this->loc_id);
		$this->locadora->loadData();
		$this->locadora->getFormasPagamento();
		$this->locadora->getCalcTarifa();
		foreach($this->locadora->lojas as $loj){
			$horas = $this->get('horarioLojas_model',array('loj_id_horas' => $loj->id));
			foreach($horas as $hr){
				$loj->horarios[$hr->hloj_weekday]->hora_inicial = $hr->hloj_horainicial;
				$loj->horarios[$hr->hloj_weekday]->hora_final = $hr->hloj_horafinal;
			}
		}
		$this->css_js->add('css', '/css/'.SITE.'/locadoras/estilo_locadora_'.$this->loc_id.'.css');
		$this->load->view(SITE.'/locadoras/locadora_'.$this->loc_id);
		//var_dump($this->locadora);
	}
	
	function carregaLoja()
	{
		$this->loj_id = $this->uri->rsegment(3);
		$this->protecoes_disponiveis = $this->get('protecao_model', array('prot_loc_id' => $this->loc_id,'sortBy' => 'prot_ordem', 'sortDirection' => 'ASC'));
		foreach ($this->protecoes_disponiveis as $prot_dispo => $prot_value){
			$prot_value->tarifa = $this->get('tarifaprotecoes_model', array(
					'tarprot_prot_id' 			=> $prot_value->prot_id,
					'tarprot_ativo' 			=> 't',
					'tarprot_ndiainicial' 		=> 1,
					'tarprot_ndiafinal' 		=> 1,
					'tarprot_validadeinicial' 	=> "2010-01-01",
					'tarprot_validadefinal' 	=> "2011-01-01"
				)
			);
		}
		$this->loja = new Loja();
		$this->loja->setLoja($this->loj_id);
		$this->loc_id = $this->loja->locadora;
		$this->load->view(SITE.'/loja');
	}
}

/* End of file layum_home.php */
/* Location: ./system/application/controllers/layum_home.php */