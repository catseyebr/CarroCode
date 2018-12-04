<?php
class Manutencao_Usuarios extends MyController {
	
	public $metatags;
	public $menu_sel;
	
	function Manutencao_Usuarios()
	{
		parent::__construct('admin');
		$this->css_js->add('js', '/js/adm/manutencao_lista_usuarios.js');
		$menu_uri = explode('_',$this->uri->segment(2));
		$this->menu_sel = $menu_uri[0];
	}
	
	function index()
	{
		$this->lista();
	}
	
	function lista()
	{
		$this->metatags->met_title = "Administração Layum - Manutenção - Usuários";
		$this->load->view('adm/manutencao_lista_usuarios');
	}
}

/* End of file manutencao_usuarios.php */
/* Location: ./system/application/controllers/adm/manutencao_usuarios.php */