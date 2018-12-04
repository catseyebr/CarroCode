<?php
class Hoteis_categorias extends MyController {
	public $data = array();
	public $categorias;
	
	function Hoteis_categorias()
	{
		parent::__construct('Admin');
		$this->load->model('categorias_model');
		
	}
	
	public function index () {
    	redirect('/admin/hoteis_categorias/lista');
  	}
	
	function lista()
	{
		$this->load->library('pagination');
		$opt = array();
		$this->categorias = $this->get('Categorias_model', $this->setFiltros($opt));
    	$per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));    														
    	$config['base_url'] = '/admin/categorias/lista/pagina/';
    	$config['total_rows'] = count($this->get('Categorias_model', $opt));
	  	$config['url_segment'] = intval($this->uri->segment(5));
	  	$config['uri_segment'] = 5;
	  	$config['per_page'] = !empty($per_page) ? $per_page : 20;
        
    	$this->pagination->initialize($config);
    
    	$this->metatags['title'] = "Categorias de Hot&eacute;is - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    	$this->load->view('admin/hoteis_categorias_lista');
	}
}

/* End of file home.php */
/* Location: ./system/application/controllers/admin/home.php */