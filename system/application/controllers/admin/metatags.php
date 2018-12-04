<?php
class Metatags extends MyController {
	public $meta;

	function Metatags()
	{
		parent::__construct('Admin');		
	}
	
	public function index () {
    	redirect('/admin/metatags/lista');
  	}
	
	function lista()
	{
		$this->load->library('pagination');
		$opt = array();
		$this->meta = $this->get('Metatags_model', $this->setFiltros($opt));
    	$per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));    														
    	$config['base_url'] = '/admin/metatags/lista/pagina/';
    	$config['total_rows'] = count($this->get('Metatags_model', $opt));
	  	$config['url_segment'] = intval($this->uri->segment(5));
	  	$config['uri_segment'] = 5;
	  	$config['per_page'] = !empty($per_page) ? $per_page : 20;
        
    	$this->pagination->initialize($config);
    
    	$this->metatags['title'] = "Lista de Metatags - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    	$this->load->view('admin/metatags_lista');
	}
}

/* End of file metatags.php */
/* Location: ./system/application/controllers/admin/metatags.php */