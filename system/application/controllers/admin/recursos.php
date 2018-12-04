<?php
class Recursos extends MyController {
	public $data = array();
	public $recursos;
	
	function Recursos()
	{
		parent::__construct('Admin');
	}
	
	public function index () {
    	redirect('/admin/recursos/lista');
  	}
	
	function lista()
	{
		$this->load->library('pagination');
		$opt = array();
		$this->recursos = $this->get('Recursos_model', $this->setFiltros($opt));
    	$per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));    														
    	$config['base_url'] = '/admin/recursos/lista/pagina/';
    	$config['total_rows'] = count($this->get('Recursos_model', $opt));
	  	$config['url_segment'] = intval($this->uri->segment(5));
	  	$config['uri_segment'] = 5;
	  	$config['per_page'] = !empty($per_page) ? $per_page : 20;
        $this->pagination->initialize($config);
		$this->metatags['title'] = "Lista de Recursos - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    	$this->load->view('admin/recursos_lista');
	}
}

/* End of file usuarios_recursos.php */
/* Location: ./system/application/controllers/admin/usuarios_recursos.php */