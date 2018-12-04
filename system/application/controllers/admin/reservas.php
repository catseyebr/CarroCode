<?php
class Reservas extends MyController {
  public $datas = array();
	public $reserva;
	public $reservas = array();
	public $reservaApartamento;
	public $categorias = array();
	public $valor;
  //public $quantidade;
	
	function Reservas()
	{
		parent::__construct('Admin');
	}
	
  public function index() {
		$this->lista();
	}
	
	function lista() {
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
		$res_id = intval($this->uri->segment(4));
    
    if ($res_id > 0) {
      $this->reserva                    = $this->get('Reservas_model', array(
                                                  'res_id' => $res_id,
                                                  '_join' => array('clientes','reservas_status','usuarios','reservas_formasdepagamento')
                                                  ));
      $this->reservaHoteis              = $this->get('ReservasHotel_model', array(
                                                  'rsh_idreserva' => $res_id,
                                                  '_join' => array('hoteis')
                                                  ));
                          
      for ($i = 0, $s = count($this->reservaHoteis);$i < $s; $i++) {
        $rsa         = $this->get('ReservasApartamento_model', array(
                                                  'rsa_idreservahotel' => $this->reservaHoteis[$i]->rsh_id,
                                                  '_join' => array('bloqueios_categorias')
                                                  ));
        $this->reservaHoteis[$i]->apartamentos = $this->organizaDetalhes($rsa, $this->reservaHoteis[$i]->rsh_checkin, $this->reservaHoteis[$i]->rsh_checkout);
      }                      
    }
    
    if ($this->reserva != NULL && $this->reserva != FALSE) {
      $this->metatags['title'] = "Detalhes da Reserva - Administra&ccedil;&atilde;o Reserva de Hotel Online";
      
      $this->load->view('admin/reservas_exibir');
    } else {
      redirect('/admin/reservas/lista');
    }
	}
  
  private function setDatas ($checkin, $checkout) {
    $di = explode('-', $checkin);
    $di[2] = substr($di[2], 0, 3);
    $df = explode('-', $checkout);
    $df[2] = substr($df[2], 0, 3);
    $this->dataini = array('dia' => intval($di[2]), 'mes' => intval($di[1]), 'ano' => intval($di[0]));
    $this->datafim = array('dia' => intval($df[2]), 'mes' => intval($df[1]), 'ano' => intval($df[0]));
    
    $str_datafim = date('Y-m-d', mktime(0,0,0,$this->datafim['mes'],$this->datafim['dia'],$this->datafim['ano']));
    
    for ($i = 0, $s = ''; $s != $str_datafim; $s = $dataatual, $i++) {
      $time = mktime(0,0,0,$this->dataini['mes'],$this->dataini['dia'] + 1 + $i,$this->dataini['ano']);
      
      $this->datas[$i] = new stdClass();
      $this->datas[$i]->data      = $dataatual = date('Y-m-d', $time); 
      $this->datas[$i]->diasemana = date('N', $time);
    }
  }
  
  private function organizaDetalhes ($dados, $checkin, $checkout) {
    $this->setDatas($checkin, $checkout);
    
    return  $this->organizaDetalhesPorApartamento($this->organizaDetalhesPorData($dados));
  }
  
  private function organizaDetalhesPorData($dados) {
    $por_data = array();
    for ($i = 0, $s = count ($this->datas); $i < $s; $i++) {
      $por_data[$this->datas[$i]->data] = new stdClass();
      $por_data[$this->datas[$i]->data]->apartamentos = array();
      $ch_apartamentos = array();
      $ca = 0;
      for ($j = 0, $c = count ($dados); $j < $c; $j++) {
        if ($dados[$j]->rsa_dthareserva == $this->datas[$i]->data) {
          $strid = $dados[$j]->rsa_tipoapartamento . '-' . $dados[$j]->rsa_categoriaapartamento;
          if (!in_array($strid, $ch_apartamentos)) {
            $ch_apartamentos[] = $strid;
            $por_data[$this->datas[$i]->data]->apartamentos[$ca] = $dados[$j];
            $por_data[$this->datas[$i]->data]->apartamentos[$ca]->nro_apartamentos = 1;
            $por_data[$this->datas[$i]->data]->apartamentos[$ca]->strid_apartamentos = $strid; 
            $ca++;
          } else {
            for ($k = 0, $o = count($por_data[$this->datas[$i]->data]->apartamentos); $k < $o; $k++) {
              if ($por_data[$this->datas[$i]->data]->apartamentos[$k]->strid_apartamentos == $strid) {
                $por_data[$this->datas[$i]->data]->apartamentos[$k]->nro_apartamentos++;
                break;
              }
            }
          }
        }
      }
    }
    return $por_data;
  }
  
  private function organizaDetalhesPorApartamento ($por_data) {
    $apartamentos = array();
    $ch_apartamentos = array();
    $ca = 0;
    foreach ($por_data as $data => $valores) {
      for ($i = 0, $s = count ($valores->apartamentos); $i < $s; $i++) {
        $bloqueio = new stdClass();
        $bloqueio->data              = $data;
        $bloqueio->rsa_tarifa        = $valores->apartamentos[$i]->rsa_tarifa;
        $bloqueio->rsa_idbloqueio    = $valores->apartamentos[$i]->rsa_idbloqueio;
        $bloqueio->rsa_idcatbloqueio = $valores->apartamentos[$i]->rsa_idcatbloqueio;
        $bloqueio->bca_nome          = $valores->apartamentos[$i]->bca_nome;
        $bloqueio->rsa_tarifafinal   = $valores->apartamentos[$i]->rsa_tarifafinal;
        $bloqueio->rsa_taxaturismo   = $valores->apartamentos[$i]->rsa_taxaturismo;
        $bloqueio->rsa_taxaservico   = $valores->apartamentos[$i]->rsa_taxaservico;
        $bloqueio->rsa_iss           = $valores->apartamentos[$i]->rsa_iss;
        
        if (!in_array($valores->apartamentos[$i]->strid_apartamentos, $ch_apartamentos)) {
          $ch_apartamentos[] = $valores->apartamentos[$i]->strid_apartamentos;
          $apartamentos[$ca] = new stdClass();
          $apartamentos[$ca]->strid_apartamentos       = $valores->apartamentos[$i]->strid_apartamentos;
          $apartamentos[$ca]->nro_apartamentos         = $valores->apartamentos[$i]->nro_apartamentos;
          $apartamentos[$ca]->vlr_apartamentos         = $bloqueio->rsa_tarifafinal;
          $apartamentos[$ca]->rsa_idapartamento        = $valores->apartamentos[$i]->rsa_idapartamento;
          $apartamentos[$ca]->rsa_tipoapartamento      = $valores->apartamentos[$i]->rsa_tipoapartamento;
          $apartamentos[$ca]->rsa_categoriaapartamento = $valores->apartamentos[$i]->rsa_categoriaapartamento;
          $apartamentos[$ca]->datas = array($bloqueio);
          $ca++;
        }  else {
          for ($j = 0, $c = count ($apartamentos); $j < $c; $j++) {
            if ($apartamentos[$i]->strid_apartamentos == $valores->apartamentos[$i]->strid_apartamentos) {
              $apartamentos[$i]->datas[] = $bloqueio;
              $apartamentos[$i]->vlr_apartamentos += $bloqueio->rsa_tarifafinal;
              break;
            }
          }
        }
      }
    }  
    return $apartamentos;
  }
}

/* End of file reservas.php */
/* Location: ./system/application/controllers/admin/reservas.php */