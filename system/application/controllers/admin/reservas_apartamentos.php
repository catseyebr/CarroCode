<?php
class Reservas_apartamentos extends MyController {
	public $reserva;
	public $reservas = array();
	public $reservaApartamento;
	
	function Reservas_apartamentos()
	{
		parent::__construct('Admin');
	}
	public function index()
	{
		//$this->lista();
	}
	
	function lista()
	{
		$this->load->library('pagination');
    $opt = array('_join' => array('clientes','reservas_status','usuarios','reservas_formasdepagamento'),
                'sortBy' => 'res_dthcadastro', 'sortDirection' => 'DESC');
    $this->reservas = $this->get('Reservas_model', $this->setFiltros($opt));
    	$per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));    														
    	$config['base_url'] = '/admin/reservas/lista/pagina/';
    	$config['total_rows'] = count($this->get('Reservas_model', $opt));
	  	$config['url_segment'] = intval($this->uri->segment(5));
	  	$config['uri_segment'] = 5;
	  	$config['per_page'] = !empty($per_page) ? $per_page : 20;
        
    	$this->pagination->initialize($config);
    
    	$this->metatags['title'] = "Lista de Reservas - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    	$this->load->view('admin/reservas_lista');
  
  }
  	function exibir () {
		$rsa_id = $this->uri->segment(4);
    
    if ($rsa_id > 0){
      $_join = array('reservas','hoteis','apartamentos','bloqueios','bloqueios_categorias','tipos_apartamentos');
      $this->reservaApartamento         = $this->get('ReservasApartamento_model', array(
                                                  'rsa_id' => $rsa_id,
                                                  '_join' => $_join
                                                  ));
    }
    if ($this->reservaApartamento != NULL && $this->reservaApartamento != FALSE) {
      $this->metatags['title'] = "Detalhes da Reserva do Apartamento - Administra&ccedil;&atilde;o Reserva de Hotel Online";
      
      $this->load->view('admin/reservas_apartamentos_exibir');
    } else {
      redirect('/admin/reservas/lista');
    }
	}
  
}

/* End of file reservas.php */
/* Location: ./system/application/controllers/admin/reservas.php */