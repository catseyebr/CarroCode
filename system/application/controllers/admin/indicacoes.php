<?php
class Indicacoes extends MyController {
	public $indicacoes;
	public $indicacao;
	
  function Indicacoes()
	{
		parent::__construct('Admin');	
	}
	
	function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = '/admin/indicacoes/index/pagina/';
		$config['total_rows'] = count($this->get('Indique_model', array()));
		$config['url_segment'] = $this->uri->segment(5);
		$config['uri_segment'] = 5;
		$config['per_page'] = 20;
		$this->pagination->initialize($config);
		
		$this->indicacoes = $this->get('Indique_model', array(
                                          'sortBy' =>'id_indique', 
																			    'limit' => $config['per_page'],
																			    'offset' => $config['url_segment'],
    																		  'sortDirection' => 'DESC'
                                          ));
		
    $this->metaTitle = "Indica&ccedil;&otilde;es - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    $this->load->view('admin/indicacoes');
	}
	
	function detalhes()
	{  
    if($this->input->post('id_indique')){
      $id_indique = $this->input->post('id_indique');
    }else{
      $id_indique = $this->uri->segment(4);
    }
    $this->indicacao = $this->get('Indique_model', array(
                                                      'id_indique' => $id_indique
                                                      ));
    $this->metaTitle = "Indica&ccedil;&otilde;es - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    $this->load->view('admin/indicacoes_detalhes.php');
	}
}

/* End of file indicacoes.php */
/* Location: ./system/application/controllers/admin/indicacoes.php */