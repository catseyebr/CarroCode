<?php
class Home extends MyController {
	public $data = array();
	function Home()
	{
		parent::__construct('Admin');
	}
	
	function index()
	{
		$this->data['metaTitle'] = "Administra&ccedil;&atilde;o Reserva de Hotel Online"; 
		$this->load->view('admin/home');
	}
}

/* End of file home.php */
/* Location: ./system/application/controllers/admin/home.php */