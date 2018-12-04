<?php
class Contatos extends MyController {
	public $data = array();
	public $hotel = array();
	public $contatos= array();
	public $contato;
	public $departamentos;
	
  	function Contatos () {
		parent::__construct('Admin');
	}
	
	public function index () {
	 	redirect('/admin/contatos/lista');
  	}
	
	public function lista () {
		redirect('/admin/hoteis/exibir/'.$this->uri->segment(4).'#contatos'); 																	
	}
	
	function inserir () {
		$this->setHotel();
		if ($this->hotel != NULL && $this->hotel != FALSE) {
			$this->departamentos = $this->get('Departamentos_model', array());
			$this->metatags['title'] = "Adicionar Contatos - Lista de Hot&eacute;is - Administra&ccedil;&atilde;o Reserva de Hotel Online";
			$this->form_validation->set_rules('dep_id', 'Departamento', 'required');
			$this->form_validation->set_rules('con_nome', 'Nome', 'required');
			$this->form_validation->set_rules('con_email', 'Email', 'required');
			$this->form_validation->set_rules('con_telefone', 'Telefone', 'required');
			if($this->form_validation->run())
			{
				$adicionar_contato = $this->insert('Contatos_model', array(
																				'dep_id' => $this->input->post('dep_id'),
																				'con_nome' => $this->input->post('con_nome'),
																				'con_email' => $this->input->post('con_email'),
																				'con_telefone' => $this->input->post('con_telefone')
																				));
				if($adicionar_contato){
					$adicionar_hotelContato = $this->insert('HoteisContatos_model', array(
																				'hoc_idhotel' => $this->input->post('hot_id'),
																				'hoc_idcontato' => $adicionar_contato
																				));
					$adicionar_contatosDepartamentos = $this->insert('ContatosDepartamentos_model', array(
																				'cde_idcontato' => $adicionar_contato,
																				'cde_iddepartamento' => $this->input->post('dep_id')
																				));
				}																		
				if($adicionar_hotelContato){
						redirect(site_url('admin/hoteis/exibir')."/".$this->hotel->hot_id."#contatos");
				}
				
			}
			$this->load->view('admin/contatos_inserir');
		}else{
			redirect('/admin/hoteis/lista');
		}
	}
	
	function editar () {
		$this->setHotel();
		if ($this->hotel != NULL && $this->hotel != FALSE) {
			$this->departamentos = $this->get('Departamentos_model', array());
			$_join = array('contatos', 'departamentos');
			$this->contato = $this->get('Contatos_model', array('con_id' => $this->uri->segment(5),
																			'_join' => $_join));
			$this->metatags['title'] = "Editar Contato - Lista de Hot&eacute;is - Administra&ccedil;&atilde;o Reserva de Hotel Online";
			$this->form_validation->set_rules('dep_id', 'Departamento', 'required');
			$this->form_validation->set_rules('con_nome', 'Nome', 'required');
			$this->form_validation->set_rules('con_email', 'Email', 'required');
			$this->form_validation->set_rules('con_telefone', 'Telefone', 'required');
			if($this->form_validation->run())
			{
				$novo = clone $this->contato;
	    		$novo->con_nome = $this->input->post('con_nome');
	    		$novo->con_email = $this->input->post('con_email');
	    		$novo->con_telefone = $this->input->post('con_telefone');
				$apagar_contatosDepartamentos = $this->delete('ContatosDepartamentos_model', array(
										'cde_idcontato' => $this->contato->con_id,
										'cde_iddepartamento' => $this->input->post('olddep_id')));
					if($apagar_contatosDepartamentos)
					{
	        			$adicionar_contatosDepartamentos = $this->insert('ContatosDepartamentos_model', array(
																				'cde_idcontato' => $this->contato->con_id,
																				'cde_iddepartamento' => $this->input->post('dep_id')
																				));
	      			}
				$atualizar_contato = $this->update('Contatos_model', $novo, $this->contato);
				if($atualizar_contato || $apagar_contatosDepartamentos){
					redirect(site_url('admin/hoteis/exibir')."/".$this->hotel->hot_id."#contatos");
				}
			}
			$this->load->view('admin/contatos_editar');
		}else{
			redirect('/admin/hoteis/lista');
		}
	}
	
	function excluir () {
		$this->setHotel();
		if ($this->hotel != NULL && $this->hotel != FALSE) {   
			$_join = array('contatos', 'departamentos');
			$this->contato = $this->get('Contatos_model', array('con_id' => $this->uri->segment(5),
																			'_join' => $_join));  
	      	if ($this->delete('HoteisContatos_model', array(
															'hoc_idhotel' => $this->hotel->hot_id,
															'hoc_idcontato' => $this->contato->con_id
															)) != '')
			{
				if ($this->delete('ContatosDepartamentos_model', array(
															'cde_idcontato' => $this->contato->con_id,
															'cde_iddepartamento' => $this->contato->dep_id
															)) != '')
				{
					$apagar_contatos = $this->delete('Contatos_model', array(
										'con_id' => $this->contato->con_id));
	        		$this->session->set_userdata('msg', 'Contato excluído com sucesso!');
	      		} else {
	        		$this->session->set_userdata('msg', 'Erro ao excluir contato!');
	      		}
	    	}
	    redirect(site_url('admin/hoteis/exibir')."/".$this->hotel->hot_id."#contatos");
		}
	}
	
	private function setHotel () {
    	$hot_id = intval($this->uri->segment(4));
      
    	if ($hot_id > 0) {
    		$this->hotel = $this->get('Hoteis_model', array(
                                                        'hot_id' => $hot_id
    													));
    		}
    	if (!$this->auth_acl->hasAuth('superadmin')) {
      		if (!in_array($this->hotel->hot_id, $this->hoteis_acesso)) {
        		redirect('/admin/hoteis/lista');
      		}
    	}
  	}
}
/* End of file contatos.php */
/* Location: ./system/application/controllers/admin/contatos.php */