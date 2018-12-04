<?php
class Carro_Grupos extends MyController {
	
	public $metatags;
	public $menu_sel;
	
	function Carro_Grupos()
	{
		parent::__construct('admin');
		$this->css_js->add('js', '/js/adm/carro_lista_grupos.js');
		$menu_uri = explode('_',$this->uri->segment(2));
		$this->menu_sel = $menu_uri[0];
	}
	
	function index()
	{
		$this->lista();
	}
	
	function lista()
	{
		$this->metatags->met_title = "Administração Layum - Veículos - Grupos";
		$this->load->view('adm/carro_lista_grupos');
	}
}

/* End of file carro_locadoras.php */
/* Location: ./system/application/controllers/adm/carro_lojas.php */