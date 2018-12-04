<?php
class Newsletter extends MyController {
	public $newsletter;
	public $email;
	public $ativo;
	function Newsletter()
	{
		parent::__construct('Admin');	
	}
	
	public function index () {
    	redirect('/admin/newsletter/lista');
  	}
	
	function lista()
	{
		$this->load->library('pagination');
		$opt = array();
		$this->newsletter = $this->get('Newsletter_model', $this->setFiltros($opt));
    	$per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));    														
    	$config['base_url'] = '/admin/newsletter/lista/pagina/';
    	$config['total_rows'] = count($this->get('Newsletter_model', $opt));
	  	$config['url_segment'] = intval($this->uri->segment(5));
	  	$config['uri_segment'] = 5;
	  	$config['per_page'] = !empty($per_page) ? $per_page : 20;
        
    	$this->pagination->initialize($config);
    
    	$this->metatags['title'] = "Lista de Newsletter - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    	$this->load->view('admin/newsletter_lista');
    }
	
	function editar () {
    	$new_id = $this->uri->segment(4);
   		$this->newsletter = $this->get('Newsletter_model', array('new_id' => $new_id));
		if ($this->newsletter != NULL && $this->newsletter != FALSE) {                                                                                                 
  			$this->form_validation->set_rules('new_email', 'E-mail', 'required');
      		if($this->input->post('new_ativo')){
        		$ativo = 1;
      		} else{
        		$ativo = 0;
      		}
      
      		if ($this->form_validation->run()) {
      			$novo = clone $this->newsletter;
      			$novo->new_email       = $this->input->post('new_email');
				$novo->new_ativo       = $ativo;
      			if ($this->update('Newsletter_model', $novo, $this->newsletter)) {
      				$this->css_js->add("function", NULL, "alert('Email atualizado com sucesso!');");
            	} else {
              		$this->css_js->add("function", NULL, "alert('Erro ao editar email!');");
            	}
            	$this->newsletter = $novo;
        	}
        $this->metatags['title'] = "Editar Newsletter - Administra&ccedil;&atilde;o Reserva de Hotel Online";
        $this->load->view('admin/newsletter_editar');
  		}else {
      		redirect('/admin/newsletter/lista');
    	}
	}
	
	function excluir()
	{                 
    	$this->newsletter->new_id = intval($this->uri->segment(4));
		if ($this->newsletter != NULL && $this->newsletter != FALSE) {
      		if ($this->delete('Newsletter_model', array('new_id' => $this->newsletter->new_id)) != '') {
        		$this->session->set_userdata('msg', 'Email excluído com sucesso!');
      		} else {
        		$this->session->set_userdata('msg', 'Erro ao excluir email!');
      		}
    	}
    	redirect('admin/newsletter/lista');
	}
}

/* End of file newsletter.php */
/* Location: ./system/application/controllers/admin/newsletter.php */