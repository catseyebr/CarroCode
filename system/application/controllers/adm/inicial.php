<?php
class Inicial extends MyController {
	
	public $metatags;
	public $menu_sel;
	
	function Inicial()
	{
		parent::__construct('admin');
		$menu_uri = explode('_',$this->uri->segment(2));
		$this->menu_sel = $menu_uri[0];
	}
	
	function index()
	{
		$this->metatags->met_title = "Administração Layum - Página Inicial";
		$this->load->view('adm/inicial');
	}
	
	function lista()
	{
		$this->metatags->met_title = "Administração Layum - Página Inicial";
		$this->load->view('adm/inicial');
	}
}

/* End of file home.php */
/* Location: ./system/application/controllers/adm/home.php */