<?php
class Departamentos extends MyController {
	public $data = array();
	public $departamentos = array();
	public $config = array();
	
	function Departamentos()
	{
		parent::__construct('Admin');
		$this->load->library('pagination');		
	}
	public function define()
	{
		$config['base_url'] = '/admin/departamentos/lista_departamentos/pagina/';
		$config['total_rows'] = count($this->get('Departamentos_model', null));
		$config['url_segment'] = $this->uri->segment(5);
		$config['uri_segment'] = 5;
		$config['per_page'] = 20;
		return $config;
	}
	function index()
	{
		$this->lista_departamentos();
	}
	
	function lista_departamentos()
	{
		$this->metatags['title'] = "Lista de Departamentos - Administra&ccedil;&atilde;o Reserva de Hotel Online";
		$config = $this->define();
		$this->pagination->initialize($config);
		$this->departamentos = $this->get('Departamentos_model', array(
    															'sortBy' =>'dep_id', 
																'limit' => $config['per_page'],
																'offset' => $config['url_segment'],
    															'sortDirection' => 'ASC',
																));
		$this->load->view('admin/departamentos_lista');
	}
	
	function ins_departamento()
	{
		$this->metatags['title'] = "Adicionar Departamento - Administra&ccedil;&atilde;o Reserva de Hotel Online";
		$this->form_validation->set_rules('dep_nome', 'Nome', 'required');
		
		$dep_ativo = "0";
		if($this->input->post('dep_ativo')==1)
			$dep_ativo = "1";
		
		if($this->form_validation->run())
		{
			$adicionar_departamento = $this->insert('Departamentos_model', array(
																			'dep_nome' => $this->input->post('dep_nome'),
																			'dep_ativo' => $dep_ativo
																		));
			if($adicionar_departamento)
				$this->css_js->add("function", NULL, "ciente = alert('Departamento adicionado com sucesso!');document.location='".site_url('/admin/departamentos')."'");
			$this->load->view('admin/departamentos_inserir');
		}else{
			$this->load->view('admin/departamentos_inserir');
		}
	}
	
	function upd_departamento()
	{
		$this->departamentos = $this->get('Departamentos_model', array(
    															'dep_id' => $this->input->post('dep_id')
																));
		$this->metatags['title'] = "Editar Departamento - Administra&ccedil;&atilde;o Reserva de Hotel Online";
		$this->form_validation->set_rules('dep_nome', 'Nome', 'required');
		if($this->form_validation->run())
		{
			$dep_ativo = "0";
			if($this->input->post('dep_ativo')==1)
				$dep_ativo = "1";
			$antigo = $this->get('Departamentos_model', array('dep_id' => $this->input->post('dep_id')));
    		$novo = clone $antigo;
    		$novo->dep_nome = $this->input->post('dep_nome');
    		$novo->dep_ativo = $dep_ativo;
    		$atualizar_departamentos = $this->update('Departamentos_model', $novo, $antigo);
			if($atualizar_departamentos)
				$this->css_js->add("function", NULL, "ciente = alert('Departamento atualizado com sucesso!');document.location='".site_url('/admin/departamentos')."'");
				$this->departamentos = $this->get('Departamentos_model', array(
    															'dep_id' => $this->input->post('dep_id')
																));
				$this->load->view('admin/departamentos_editar');
		}else{
			$this->load->view('admin/departamentos_editar');
		}
	}
	
	function del_departamento()
	{
		$contato_departamento = $this->get('ContatosDepartamentos_model', array(
                              'cde_iddepartamento' => $this->input->post('dep_id')
                              ));
        if(!$contato_departamento){
			$apagar_departamento = $this->delete('Departamentos_model', array(
																		'dep_id' => $this->input->post('dep_id')
																		));
			$this->css_js->add("function", NULL, "ciente = alert('Departamento apagado com sucesso!')");
			$config = $this->define();
			$this->departamentos = $this->get('Departamentos_model', array(
    															'sortBy' =>'dep_id', 
																'limit' => $config['per_page'],
																'offset' => $config['url_segment'],
    															'sortDirection' => 'ASC',
																));
			$this->load->view('admin/departamentos_lista');
        }else{											
			$this->css_js->add("function", NULL, "ciente = alert('Departamento em uso, não pode ser apagado!')");
			$config = $this->define();
			$this->departamentos = $this->get('Departamentos_model', array(
    															'sortBy' =>'dep_id', 
																'limit' => $config['per_page'],
																'offset' => $config['url_segment'],
    															'sortDirection' => 'ASC',
																));
			$this->load->view('admin/departamentos_lista');
        }
	}
}
/* End of file departamentos.php */
/* Location: ./system/application/controllers/admin/hoteis_lista.php */