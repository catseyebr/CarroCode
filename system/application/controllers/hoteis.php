<?php
class Hoteis extends MyController {
	public $hoteis;
	public $filtro;
  
  public function Hoteis () { 
		parent::__construct();
		$this->css_js->add('js', '/js/lista_hoteis.js', 'loadListaHoteis();');	
  }
  
  public function Index () {
  	$this->hoteis = $this->getHoteis();
  	
  	$this->load->view('lista_hoteis');
	}
	
	public function filtro_cidade () {
  	redirect('/hoteis/cidade/' . $this->input->post('cidade'));
	}
	
	public function cidade () {
		$this->css_js->add('js', '/js/lista_hoteis.js', 'loadListaHoteis();');
		$this->hoteis = $this->getHoteis($this->uri->segment('3'));
  	$this->load->view('lista_hoteis');
	}
	
	private function getHoteis($filtro = NULL) {
		$opt = array('hot_ativo' =>'1', '_join' => array('hoteis_enderecos', 'enderecos', 'portal_cidades', 'portal_estados'));
		if (!empty ($filtro)) {
			$this->filtro = str_replace('_', ' ', $filtro);
			$explode = explode('_-_', $filtro);
  		if (count($explode) == 2) {
  			$opt['nome_cidade'] = $explode[0];
  			$opt['abr_estado']  = $explode[1];
			}
		}
		return $this->get('hoteis_model', $opt);
	}
	
	public function aaa () {
		$this->session->set_userdata('aaa', $this->session->userdata('reservas'));
	}
	
	public function bbb () {
		$this->session->set_userdata('reservas', $this->session->userdata('aaa'));
		var_dump($this->session->userdata('aaa'));
	}
}

//end of file