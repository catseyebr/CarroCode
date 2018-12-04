<?php
class Apartamentos_DadosAdicionais extends MyController {
	public $hoteis_dadosadicionais = array();
	
  function Apartamentos_DadosAdicionais() {
		parent::__construct('Admin');
	}
	
	function index() {
		redirect('/admin/apartamentos_dadosadicionais/lista');
	}
	
	function lista() {
		$msg = $this->session->userdata('msg');
    	if (!empty($msg)) {
      		$this->css_js->add("function", NULL, "alert('" . $msg . "');");
      		$this->session->unset_userdata('msg');
    	}
    	$this->load->library('pagination');
    	$opt = array('dap_pai' => 'NULL');    
    	$this->apartamentos_dadosadicionais = $this->get('DadosadicionaisApartamento_model', $this->setFiltros($opt));
    
		$per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));    														
    	$config['base_url'] = '/admin/apartamentos_dadosadicionais/lista/pagina/';
    	$config['total_rows'] = count($this->get('DadosadicionaisApartamento_model', $opt));
	  	$config['url_segment'] = intval($this->uri->segment(5));
	  	$config['uri_segment'] = 5;
	  	$config['per_page'] = !empty($per_page) ? $per_page : 20;
        
    	$this->pagination->initialize($config);
    
    	$this->load->view('admin/apartamentos_dadosadicionais_lista');
	}
	
	function detalhes() {
	}
	
	function inserir () {
	$this->css_js->add('js', '/js/admin/sist_da.js');
    $this->css_js->add('js', '/js/admin/apartamentos_dadosadicionais-inserir.js', 'loadApartamentosDadosAdicionaisInserir()');
    
    if ($this->input->post('fields') != FALSE) {
      $add = array();
      $id_list = array();
      $fields = explode(';', $this->input->post('fields'));
      
      for ($i = 0, $s = count($fields); $i < $s - 1; $i++) {
        $linha = explode(';', $this->input->post($fields[$i]));
        for ($j = 0, $c = count($linha); $j < $c - 1; $j++) {
          $opt = explode(': ', $linha[$j]);
          
          if ($opt[0] == 'id') {
            $DOMid = $opt[1];
            $id_list[$DOMid] = NULL;
          } else if ($opt[0] == 'princ') {
            $add['dap_campo'] = $opt[1];
          } else if ($opt[0] == 'ref') {
            $opt[1] = !empty($opt[1]) ? $opt[1] : NULL;
            if ($opt[1] != '') {
              $DOMref = $opt[1];
              $add['dap_pai'] = $id_list[$DOMref];
            } else {
              $add['dap_pai'] = NULL;
            }
          } else if ($opt[0] == 'bool') {
            $add['dap_has_bool'] = $opt[1];
          } else if ($opt[0] == 'qtde') {
            $add['dap_has_qtde'] = $opt[1];
          } else if ($opt[0] == 'value') {
            $add['dap_has_valor'] = $opt[1];
          } else if ($opt[0] == 'desc') {
            $add['dap_has_desc'] = $opt[1];
          } else if ($opt[0] == 'list') {
            $add['dap_has_list'] = $opt[1];
            $id_list[$DOMid] = $this->insert('DadosadicionaisApartamento_model', $add);
          }
          
        }
        
      }
      $this->session->set_userdata('msg', 'Cadastro efetuado com sucesso!');
      redirect('/admin/apartamentos_dadosadicionais/lista');
    }
    $this->load->view('admin/apartamentos_dadosadicionais_inserir');
  }
}

/* End of file hoteis_lista.php */
/* Location: ./system/application/controllers/admin/hoteis_lista.php */