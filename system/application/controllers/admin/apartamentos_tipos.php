<?php
class Apartamentos_tipos extends MyController {
	public $tiposApartamentos;
	public $tipoApartamento;
	public $apartamento; //verifica se tem apartamento atrelado a categoria
	public $ativo;
	
  function Apartamentos_tipos() {
		parent::__construct('Admin');		
	}
	
	public function index () {
	 $this->lista();
  }
	
	public function lista () {
		$this->load->library('pagination');
    
    $this->tiposApartamentos = $this->get('TiposApartamentos_model', array(
                                                  'sortBy' =>'tap_nome', 
																			            'limit' => 20,
																			            'offset' => $this->uri->segment(5),
    																		          'sortDirection' => 'ASC'
                                                  ));
    
		$config['base_url'] = '/admin/apartamentos_tipos/index/pagina/';
		$config['total_rows'] = count($this->tiposApartamentos);
		$config['url_segment'] = $this->uri->segment(5);
		$config['uri_segment'] = 5;
		$config['per_page'] = 20;
		$this->pagination->initialize($config);
		
    $this->metatags['title'] = "Lista de Tipos de Apartamentos - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    
    $this->load->view('admin/apartamentos_tipos_lista');
	}
	
	function exibir () {
		$tap_id = $this->uri->segment(4);
    
    if ($tap_id > 0) {
      $this->tipoApartamento = $this->get('TiposApartamentos_model', array(
                                                  'tap_id' => $this->uri->segment(4)
                                                  ));	
    }
    
    if ($this->categoriaApartamento != NULL && $this->categoriaApartamento != FALSE) {
      $this->metatags['title'] = "Detalhes de Tipo de Apartamentos - Administra&ccedil;&atilde;o Reserva de Hotel Online";
      
      $this->load->view('admin/apartamentos_tipos_exibir');
    } else {
      redirect('/admin/apartamentos_tipos/lista');
    }
	}
	
	function inserir () {
		$this->form_validation->set_rules('tap_nome', 'Nome', 'required');
		$this->form_validation->set_rules('tap_descricao', 'Descri&ccedil;&atilde;o', 'required');
		$this->form_validation->set_rules('tap_permalink', 'Permalink', 'required');
		if ($this->input->post('tap_ativo')) {
      $ativo = 1;
    } else {
      $ativo = 0;
    }
		
		if($this->form_validation->run()) {
			$adicionar_tipo = $this->insert('TiposApartamentos_model', array(
																		'tap_nome' => $this->input->post('tap_nome'),
																		'tap_descricao' => $this->input->post('tap_descricao'),
																		'tap_permalink' => $this->input->post('tap_permalink'),
																		'tap_ativo' => $ativo
																		));
			
      if ($adicionar_apartamento) {
        $this->session->set_userdata('msg', 'Tipo de apartamento adicionada com sucesso!!');
      } else {
        $this->session->set_userdata('msg', 'Erro ao adicionar tipo de apartamento!');
      }
      
      redirect('/admin/apartamentos/lista');
		}
		
		$this->metatags['title'] = "Inserir Tipos de Apartamentos - Administra&ccedil;&atilde;o Reserva de Hotel Online";
		
		$this->load->view('admin/apartamentos_inserirTipos');
	}
	
	function editar () {	
    $tap_id = intval($this->input->post('tap_id'));
    
    if ($tap_id > 0) {
      $this->tipoApartamento = $this->get('TiposApartamentos_model', array(
                                                        'tap_id' => $tap_id
                                                        ));                
    }
    
    if ($this->tipoApartamento != NULL && $this->tipoApartamento != FALSE) {
  		$this->form_validation->set_rules('tap_nome', 'Nome', 'required');
  		$this->form_validation->set_rules('tap_descricao', 'Descri&ccedil;&atilde;o', 'required');
  		$this->form_validation->set_rules('tap_permalink', 'Permalink', 'required');
  		if ($this->input->post('tap_ativo')) {
        $ativo = 1;
      } else{
        $ativo = 0;
      }
  
      if ($this->form_validation->run()) {
    		$novo = clone $this->tipoApartamento;
        $novo->tap_nome       = $this->input->post('tap_nome');
    		$novo->tap_descricao  = $this->input->post('tap_descricao');
  		  $novo->tap_permalink  = $this->input->post('tap_permalink');
  		  $novo->tap_ativo      = $ativo;
  			
        $atualizar_tipo = $this->update('TiposApartamentos_model', $novo, $antigo);
        
        if ($this->update('Apartamentos_model', $novo, $this->apartamento)) {
          $this->css_js->add("function", NULL, "alert('Tipo de apartamento atualizada com sucesso!');");
        } else {
          $this->css_js->add("function", NULL, "alert('Erro ao editar tipo de apartamento!');");
        }
        
    		$this->categoriaApartamento = $novo;
  		}
  		
      $this->metatags['title'] = "Editar Tipo de Apartamentos - Administra&ccedil;&atilde;o Reserva de Hotel Online";
  		
  		$this->load->view('admin/apartamentos_tipos_editar');
  	} else {
      redirect('/admin/apartamentos_tipos/lista');
    }
	}
	
	function excluir () {
		$tap_id = intval($this->input->post('tap_id'));
		
		if ($tap_id > 0) {
      $apartamento = $this->get('Apartamentos_model', array(
                                'apa_idtipo' => $tap_id
                                ));
      
      if (!empty($apartamento)) {
        if ($this->delete('TiposApartamentos_model', array('tap_id' => $tap_id))) {
          $this->session->set_userdata('msg', 'Tipo de apartamento excluído com sucesso!');
        } else {
          $this->session->set_userdata('msg', 'Erro ao excluir tipo de apartamento!');
        }
  		} else {
        $this->session->set_userdata('msg', 'Este tipo de apartamento não pôde ser apagado!');
      }
    }
    
    redirect('admin/apartamentos_tipos/lista');
	}
}

/* End of file apartamentos_tipos.php */
/* Location: ./system/application/controllers/admin/apartamentos_tipos.php */