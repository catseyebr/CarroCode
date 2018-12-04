<?php
class Usuarios extends MyController {
	public $data = array();
	public $usuarios;
	public $niveis;
	
	function Usuarios()
	{     
		parent::__construct('Admin');
	}
	
	public function index () {
    	redirect('/admin/usuarios/lista');
  	}
	
	function lista() 
	{
		$this->load->library('pagination');
		$opt = array(
					'sortBy' 		=>'usu_nome',
					'sortDirection' => 'ASC'
					);
		$this->usuarios = $this->get('Usuarios_model', $this->setFiltros($opt));
    	$per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));    														
    	$config['base_url'] = '/admin/usuarios/lista/pagina/';
    	$config['total_rows'] = count($this->get('Usuarios_model', $opt));
	  	$config['url_segment'] = intval($this->uri->segment(5));
	  	$config['uri_segment'] = 5;
	  	$config['per_page'] = !empty($per_page) ? $per_page : 20;
        
    	$this->pagination->initialize($config);
    
    	$this->metatags['title'] = "Lista de Usu&aacute;rios - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    	$this->load->view('admin/usuarios_lista');
	}
	
	public function inserir () {
		$this->niveis = $this->get('Niveis_model', array());
		$this->form_validation->set_rules('usu_nome', 'Nome', 'required');
		$this->form_validation->set_rules('usu_usuario', 'Usuário', 'required');
		$this->form_validation->set_rules('usu_senha', 'Senha', 'required');
		$this->form_validation->set_rules('usu_email', 'Email', 'required');
		$this->form_validation->set_rules('niv_id', 'Nível', 'required');
    		
		if($this->form_validation->run()) {
     	$adicionar_usuario = $this->insert('Usuarios_model', array(
			                              						'usu_nome' => $this->input->post('usu_nome'),
																'usu_usuario' => $this->input->post('usu_usuario'),
																'usu_senha' => $this->input->post('usu_senha'),
																'usu_email' => $this->input->post('usu_email'),
																'usu_dthcadastro' => date('Y-m-d H:i:s')
																));
			
      		if ($adicionar_usuario) {
        		$this->session->set_userdata('msg', 'Usuário adicionado com sucesso!');
      		} else {
        		$this->session->set_userdata('msg', 'Erro ao adicionar usuário!');
      		}
      		redirect('/admin/usuarios/lista');
		}
		$this->metatags['title'] = "Inserir Usuário - Administra&ccedil;&atilde;o Reserva de Hotel Online";
		$this->load->view('admin/usuarios_inserir');
	}
	
	public function excluir () 
	{
		$this->usuarios->usu_id = intval($this->uri->segment(4));
		if ($this->usuarios != NULL && $this->usuarios != FALSE) {
      		if ($this->delete('Usuarios_model', array('usu_id' => $this->usuarios->usu_id)) != '') {
        		$this->session->set_userdata('msg', 'Usuário excluído com sucesso!');
      		} else {
        		$this->session->set_userdata('msg', 'Erro ao excluir usuário!');
      		}
    	}
    	redirect('admin/usuarios/lista');
	}
}

/* End of file usuarios.php */
/* Location: ./system/application/controllers/admin/usuarios.php */