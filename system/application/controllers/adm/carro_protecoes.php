<?php
class Carro_Protecoes extends MyController {
	
	public $metatags;
	public $menu_sel;
	
	function Carro_Protecoes()
	{
		parent::__construct('admin');
		$this->css_js->add('js', '/js/adm/carro_lista_protecoes.js');
		$menu_uri = explode('_',$this->uri->segment(2));
		$this->menu_sel = $menu_uri[0];
	}
	
	function index()
	{
		$this->lista();
	}
	
	function lista()
	{
		$this->metatags->met_title = "Administração Layum - Veículos - Protecoes";
		$this->load->view('adm/carro_lista_protecoes');
	}
}

/* End of file carro_locadoras.php */
/* Location: ./system/application/controllers/adm/carro_lojas.php */