<?php
class Niveis extends MyController {
	public $data = array();
	public $niveis;
	
	function Niveis()
	{
		parent::__construct('Admin');
	}
	
	public function index () {
    	redirect('/admin/niveis/lista');
  	}
	
	function lista()
	{
		$this->load->library('pagination');
		$opt = array();
		$this->niveis = $this->get('Niveis_model', $this->setFiltros($opt));
    	$per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));    														
    	$config['base_url'] = '/admin/niveis/lista/pagina/';
    	$config['total_rows'] = count($this->get('Niveis_model', $opt));
	  	$config['url_segment'] = intval($this->uri->segment(5));
	  	$config['uri_segment'] = 5;
	  	$config['per_page'] = !empty($per_page) ? $per_page : 20;
        
    	$this->pagination->initialize($config);
    
    	$this->metatags['title'] = "Lista de N&iacute;veis - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    	$this->load->view('admin/niveis_lista');
	}
}

/* End of file usuarios_niveis.php */
/* Location: ./system/application/controllers/admin/usuarios_niveis.php */