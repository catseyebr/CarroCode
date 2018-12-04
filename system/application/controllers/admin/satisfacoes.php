<?php
class Satisfacoes extends MyController {
	public $satisfacoes;
	public $satisfacao;
	
  function Satisfacoes()
	{
		parent::__construct('Admin');
	}
	
	public function index () {
    	redirect('/admin/satisfacoes/lista');
  	}
	
	function lista()
	{
		$this->load->library('pagination');
		$_join = array('classificacao','referencia_satisfacao');
		$opt = array('_join' => array('classificacao','referencia_satisfacao'));
		$this->satisfacoes = $this->get('Satisfacao_model', $this->setFiltros($opt));
    	$per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));    														
    	$config['base_url'] = '/admin/satisfacoes/lista/pagina/';
    	$config['total_rows'] = count($this->get('Satisfacao_model', $opt));
	  	$config['url_segment'] = intval($this->uri->segment(5));
	  	$config['uri_segment'] = 5;
	  	$config['per_page'] = !empty($per_page) ? $per_page : 20;
        
    	$this->pagination->initialize($config);
    
    	$this->metatags['title'] = "Satisfações - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    	$this->load->view('admin/satisfacoes_lista');
	}
	
}

/* End of file satisfacoes.php */
/* Location: ./system/application/controllers/admin/satisfacoes.php */