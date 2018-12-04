<?php
class Manutencao_Paginas extends MyController {
	
	public $metatags;
	public $menu_sel;
	
	function Manutencao_Paginas()
	{
		parent::__construct('admin');
		$this->css_js->add('js', '/js/adm/manutencao_lista_paginas.js');
		$menu_uri = explode('_',$this->uri->segment(2));
		$this->menu_sel = $menu_uri[0];
	}
	
	function index()
	{
		$this->lista();
	}
	
	function lista()
	{
		$this->metatags->met_title = "Administração Layum - Manutenção - Paginas";
		$this->load->view('adm/manutencao_lista_paginas');
	}
}

/* End of file manutencao_paginas.php */
/* Location: ./system/application/controllers/adm/manutencao_paginas.php */