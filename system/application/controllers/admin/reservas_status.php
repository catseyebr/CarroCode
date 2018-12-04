<?php
class Reservas_status extends MyController {
	public $reservas_status;
	
	function Reservas_status()
	{
		parent::__construct('Admin');
	}
	public function index()
	{
		$this->lista();
	}
	
	function lista()
	{
		$this->load->library('pagination');
    $opt = array();
    $this->reservas_status = $this->get('ReservasStatus_model', $this->setFiltros($opt));
    	$per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));    														
    	$config['base_url'] = '/admin/reservas_status/lista/pagina/';
    	$config['total_rows'] = count($this->get('ReservasStatus_model', $opt));
	  	$config['url_segment'] = intval($this->uri->segment(5));
	  	$config['uri_segment'] = 5;
	  	$config['per_page'] = !empty($per_page) ? $per_page : 20;
        
    	$this->pagination->initialize($config);
    
    	$this->metatags['title'] = "Lista Status de Reserva - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    	$this->load->view('admin/reservas_status_lista');
  
  }
  	function exibir () {
		$srs_id = $this->uri->segment(4);
    
    if ($srs_id > 0) {      
      $this->reserva_status                    = $this->get('Reservas_model', array(
                                                  'srs_id' => $this->uri->segment(4)
                                                  ));                                       
    }
    
    if ($this->reserva_status != NULL && $this->reserva_status != FALSE) {
      $this->metatags['title'] = "Detalhes do Status de Reserva - Administra&ccedil;&atilde;o Reserva de Hotel Online";
      
      $this->load->view('admin/reservas_status_exibir');
    } else {
      redirect('/admin/reservas_status/lista');
    }
	}
}

/* End of file reservas_status.php */
/* Location: ./system/application/controllers/admin/reservas_status.php */