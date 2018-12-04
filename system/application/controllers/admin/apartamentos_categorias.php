<?php
class Apartamentos_Categorias extends MyController {
	public $categoriasApartamentos;
	public $categoriaApartamento;
	public $ativo;
	
	function Apartamentos_Categorias () {
		parent::__construct('Admin');
	}
	
	public function index () {
		redirect('/admin/apartamentos_categorias/lista');
  	}
	
	public function lista () {
    	$this->load->library('pagination');
		$opt = array();
    	$this->categoriasApartamentos = $this->get('CategoriasApartamentos_model', $this->setFiltros($opt));
    	$per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));
    	$config['base_url'] = '/admin/apartamentos_categorias/lista/pagina/';
		$config['total_rows'] = count($this->get('CategoriasApartamentos_model', $opt));
		$config['url_segment'] = $this->uri->segment(5);
		$config['uri_segment'] = 5;
		$config['per_page'] = !empty($per_page) ? $per_page : 20;
		$this->pagination->initialize($config);
		$this->metatags['title'] = "Lista de Categorias de Apartamentos - Administra&ccedil;&atilde;o Reserva de Hotel Online";
		$this->load->view('admin/apartamentos_categorias_lista');
	}
	
	public function exibir () {
    	$cap_id = intval($this->uri->segment(4));
		if ($cap_id > 0) {
			$this->categoriaApartamento = $this->get('CategoriasApartamentos_model', array(
        		'cap_id' => $cap_id
            ));
    	}
    
		if ($this->categoriaApartamento != NULL && $this->categoriaApartamento != FALSE) {
   			$this->metatags['title'] = "Detalhes da Categoria de Apartamento - Administra&ccedil;&atilde;o Reserva de Hotel Online";
      		$this->load->view('admin/apartamentos_categorias_exibir');
    	} else {
      		redirect('/admin/apartamentos_categorias/lista');
    	}
	}
	
	function inserir () {
    	$this->form_validation->set_rules('cap_nome', 'Nome', 'required');
		$this->form_validation->set_rules('cap_descricao', 'Descri&ccedil;&atilde;o', 'required');
		$this->form_validation->set_rules('cap_qtdpessoas', 'Quantidade de Pessoas', 'required');
		$this->form_validation->set_rules('cap_ordem', 'Ordem', 'required');
		$ativo = ($this->input->post('cap_ativo') ? 1 : 0);
		$permalink = str_replace(' ','_',strtolower($this->input->post('cap_nome')));
		$ok = TRUE;
		if ($this->get('CategoriasApartamentos_model', array('cap_permalink' => $permalink))){
			$this->css_js->add("function", NULL, "alert('Categoria já existe!!');");
			$ok = FALSE;
      	}
      	if ($ok){
			if($this->form_validation->run()) {
				$adicionar_categoria = $this->insert('CategoriasApartamentos_model', array(
					'cap_nome' 		=> (string)$this->input->post('cap_nome'),
					'cap_descricao' => (string)$this->input->post('cap_descricao'),
					'cap_qtdpessoas'=> intval($this->input->post('cap_qtdpessoas')),
					'cap_ordem' 	=> intval($this->input->post('cap_ordem')),
					'cap_permalink' => (string)$permalink,
					'cap_ativo' 	=> intval($ativo)
				));
				if ($adicionar_categoria) {
	        		$this->session->set_userdata('msg', 'Categoria de apartamento adicionada com sucesso!!');
	      		} else {
	        		$this->session->set_userdata('msg', 'Erro ao adicionar categoria de apartamento!');
	      		}
	      		redirect('/admin/apartamentos_categorias/lista'); 
			}
			$this->metatags['title'] = "Inserir Categoria de Apartamentos - Administra&ccedil;&atilde;o Reserva de Hotel Online";
	    	$this->load->view('admin/apartamentos_categorias_inserir');
      	}
	}
	
	function editar () {
    	$cap_id = intval($this->uri->segment(4));
    	if ($cap_id > 0) {
      		$this->categoriaApartamento = $this->get('CategoriasApartamentos_model', array(
         		'cap_id' => $cap_id
         	));                          
    	}
    	if ($this->categoriaApartamento != NULL && $this->categoriaApartamento != FALSE) {
        	$this->form_validation->set_rules('cap_nome', 'Nome', 'required');
  			$this->form_validation->set_rules('cap_descricao', 'Descri&ccedil;&atilde;o', 'required');
  			$this->form_validation->set_rules('cap_qtdpessoas', 'Quantidade de Pessoas', 'required');
  			$this->form_validation->set_rules('cap_ordem', 'Ordem', 'required');
  			$this->form_validation->set_rules('cap_permalink', 'Permalink', 'required');
  			$ativo = ($this->input->post('cap_ativo') ? 1 : 0);
      		if ($this->form_validation->run()) {
    			$novo = clone $this->categoriaApartamento;
        		$novo->cap_nome 		= $this->input->post('cap_nome');
    			$novo->cap_descricao	= $this->input->post('cap_descricao');
			  	$novo->cap_qtdpessoas 	= $this->input->post('cap_qtdpessoas');
    			$novo->cap_ordem      	= $this->input->post('cap_ordem');
    			$novo->cap_permalink  	= $this->input->post('cap_permalink');
    			$novo->cap_ativo      	= $ativo;
      			if ($this->update('Apartamentos_model', $novo, $this->categoriaApartamento)) {
          			$this->css_js->add("function", NULL, "alert('Categoria de apartamento atualizada com sucesso!');");
        		} else {
          			$this->css_js->add("function", NULL, "alert('Erro ao editar categoria de apartamento!');");
        		}
        		$this->categoriaApartamento = $novo;
      		}
    		$this->metatags['title'] = "Editar Categoria de Apartamentos - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    		$this->load->view('admin/apartamentos_categorias_editar');  
    	} else {
      		redirect('/admin/apartamentos_categorias/lista');
   		}
	}
	
	function excluir () {
    	$cap_id = intval($this->uri->segment(4));
    	if ($cap_id > 0) {
      		$apartamento = $this->get('Apartamentos_model', array(
            	'apa_idcategoria' => $cap_id
            ));
      		if(!empty($apartamento)){                          
        		if ($this->delete('CategoriasApartamentos_model', array('cap_id' => $cap_id))) {
          			$this->session->set_userdata('msg', 'Categoria de apartamento excluído com sucesso!');
        		} else {
          			$this->session->set_userdata('msg', 'Erro ao excluir categoria de apartamento!');
        		}
  			} else {
  		  		$this->session->set_userdata('msg', 'Esta categoria não pôde ser apagada!');
      		}
    	}
    	redirect('admin/apartamentos_categorias/lista');
	}
	
}

/* End of file apartamentos_categorias.php */
/* Location: ./system/application/controllers/admin/apartamentos_categorias.php */