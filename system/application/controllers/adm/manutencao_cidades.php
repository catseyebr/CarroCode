<?php
class Manutencao_Cidades extends MyController {
	
	public $metatags;
	public $menu_sel;
	
	function Manutencao_Cidades()
	{
		parent::__construct('admin');
		$this->css_js->add('js', '/js/adm/manutencao_lista_cidades.js');
		$menu_uri = explode('_',$this->uri->segment(2));
		$this->menu_sel = $menu_uri[0];
	}
	
	function index()
	{
		$this->lista();
	}
	
	function lista()
	{
		$this->metatags->met_title = "Administração Layum - Manutenção - Cidades";
		$this->load->view('adm/manutencao_lista_cidades');
	}
}

/* End of file manutencao_cidades.php */
/* Location: ./system/application/controllers/adm/manutencao_cidades.php */