<?php
class Hoteis_DadosAdicionais extends MyController {
	public $hoteis_dadosadicionais = array();
	
  function Hoteis_DadosAdicionais() {
		parent::__construct('Admin');
	}
	
	function index() {
		$this->lista();
	}
	
	function lista() {
    $this->load->library('pagination');
    
    $msg = $this->session->userdata('msg');
    if (!empty($msg)) {
      $this->css_js->add("function", NULL, "alert('" . $msg . "');");
      $this->session->unset_userdata('msg');
    }
	 
    $this->hoteis_dadosadicionais = $this->get('DadosAdicionais_model', array(
                                                                          'dad_pai' => 'NULL',
                                                                          'sortBy' =>'dad_id',
                                                                          'limit' => 20,
                                                                          'offset' => $this->uri->segment(5),
                                                                          'sortDirection' => 'ASC',
                                                                        ));
    
		$config['base_url'] = '/admin/hoteis_dadosadicionais/lista/pagina/';
		$config['total_rows'] = count($this->hoteis_dadosadicionais);
		$config['url_segment'] = $this->uri->segment(5);
		$config['uri_segment'] = 5;
		$config['per_page'] = 20;
		$this->pagination->initialize($config);
    
    $this->load->view('admin/hoteis_dadosadicionais_lista');
	}
	
	function detalhes() {
	}
	
	function inserir () {
	$this->css_js->add('js', '/js/admin/sist_da.js');
    $this->css_js->add('js', '/js/admin/hoteis_dadosadicionais-inserir.js', 'loadHoteisDadosAdicionaisInserir()');
    
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
            $add['dad_campo'] = $opt[1];
          } else if ($opt[0] == 'ref') {
            $opt[1] = !empty($opt[1]) ? $opt[1] : NULL;
            if ($opt[1] != '') {
              $DOMref = $opt[1];
              $add['dad_pai'] = $id_list[$DOMref];
            } else {
              $add['dad_pai'] = NULL;
            }
          } else if ($opt[0] == 'bool') {
            $add['dad_has_bool'] = $opt[1];
          } else if ($opt[0] == 'qtde') {
            $add['dad_has_qtde'] = $opt[1];
          } else if ($opt[0] == 'value') {
            $add['dad_has_valor'] = $opt[1];
          } else if ($opt[0] == 'desc') {
            $add['dad_has_desc'] = $opt[1];
          } else if ($opt[0] == 'list') {
            $add['dad_has_list'] = $opt[1];
            $id_list[$DOMid] = $this->insert('DadosAdicionais_model', $add);
          }
          
        }
        
      }
      $this->session->set_userdata('msg', 'cadastro efetuado com sucesso!');
      redirect('/admin/hoteis_dadosadicionais/lista');
    }
    $this->load->view('admin/hoteis_dadosadicionais_inserir');
  }
}

/* End of file hoteis_lista.php */
/* Location: ./system/application/controllers/admin/hoteis_lista.php */