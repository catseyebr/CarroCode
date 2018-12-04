<?php
class Manutencao_Projetos extends MyController {
	
	public $metatags;
	public $menu_sel;
	
	function Manutencao_Projetos()
	{
		parent::__construct('admin');
		$this->css_js->add('js', '/js/adm/manutencao_lista_projetos.js');
		$menu_uri = explode('_',$this->uri->segment(2));
		$this->menu_sel = $menu_uri[0];
	}
	
	function index()
	{
		$this->lista();
	}
	
	function lista()
	{
		$this->metatags->met_title = "Administração Layum - Manutenção - Projetos";
		$this->load->view('adm/manutencao_lista_projetos');
	}
}

/* End of file manutencao_projetos.php */
/* Location: ./system/application/controllers/adm/manutencao_projetos.php */