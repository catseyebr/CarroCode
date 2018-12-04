<?php
class Index extends MyController {
	
	public $metatags;
	public $menu_sel;
	
	function Index()
	{
		parent::__construct('admin');
		$menu_uri = explode('_',$this->uri->segment(2));
		$this->menu_sel = $menu_uri[0];
		$this->metatags->met_title = "Administração Layum - Página Inicial";
		$this->load->view('adm/inicial');
	}
}

/* End of file home.php */
/* Location: ./system/application/controllers/adm/home.php */