<?php
class Clientes extends MyController {
	public $data = array();
	public $clientes = array();
	function Clientes()
	{
		parent::__construct('Admin');
	}
	
	public function index () {
    	redirect('/admin/clientes/lista');
  	}
	
	function lista()
	{
		$this->load->library('pagination');
		$opt = array(
					'sortBy' 		=>'cli_nome',
					'sortDirection' => 'ASC'
					);
		$this->clientes = $this->get('Clientes_model', $this->setFiltros($opt));
		$per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));
		$config['base_url'] = '/admin/clientes/lista/pagina/';
		$config['total_rows'] = count($this->get('Clientes_model', $opt));
		$config['url_segment'] = intval($this->uri->segment(5));
	  	$config['uri_segment'] = 5;
		$config['per_page'] = !empty($per_page) ? $per_page : 20;
		$this->pagination->initialize($config);
		$this->data['metaTitle'] = "Lista de Clientes - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    	$this->load->view('admin/clientes_lista');
	}
	private function checkOptions ($opt) {
        if (!$this->auth_acl->hasAuth('superadmin')) {
      		$opt['hot_id_in'] = $this->hoteis_acesso;
    	} 
    	return $opt;
  	}
}

/* End of file usuarios_clientes.php */
/* Location: ./system/application/controllers/admin/usuarios_clientes.php */