<?php

class Hotel extends MyController {
  
  public $tipo;
	public $hotel;
	public $apartamento;
	public $cliente;
	public $comentarios = array();
	public $fotos       = array();
	public $categorias  = array();
	
	public function Hotel () {   
		parent::__construct();
		
		$this->css_js->add('js', 'http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA_aeI75amByB889KtT65ikBSPyp71MaEGWOJGS-wus0UVCTg2bBTSv-v_VeysCdsW9zMjKSywZtVbWA');
		//$this->css_js->add('js', '/js/gmaps.js');
		
		if (!empty($this->usuario->usu_id)) {
      $this->cliente = $this->get('Clientes_model', array(
                                    'cli_idusuario' => $this->usuario->usu_id,
                                    '_join' => array('clientes_enderecos','enderecos', 'portal_cidades', 'portal_estados') 
                                   ));
    }
		
		if ($this->uri->segment('3') == FALSE) {
      $this->callErrHotel();
    } else if ($this->uri->segment('4') != FALSE) {
      if ($this->uri->segment('5') == FALSE) {
        $this->callErrApartamento();
      } else {
        $this->tipo = 'apartamento';
        $this->loadApartamento();
      }
    } else {
      $this->tipo = 'hotel';
      $this->loadHotel();
    }
	}
  
  public function Index() {
    if ($this->tipo == 'apartamento') {
		  $this->load->view('apartamento');
		} else {
		  $this->load->view('hotel');
    }
	}	
	
  private function loadHotel () {
    $_join = array('hoteis_enderecos','enderecos','portal_cidades','portal_estados',
                    'comentarios','usuarios', 'categorias_apartamentos','tipos_apartamentos', 'hoteis');
    $this->hotel = $this->get('Hoteis_model', array(
                                            'hot_permalink' => $this->uri->segment('3'),
                                            '_join' => $_join
                                            ));
    
    if (!is_object($this->hotel)) {
      $this->callErrHotel();
    }
    
    $this->organizaCategorias($this->get('Apartamentos_model', array(
                                            'apa_idhotel' => $this->hotel->hot_id,
                                            '_join' => $_join
                                            )));
    
    if ($this->input->post('mensagem') != FALSE) {
      $this->setComentarios();
    }
                                                                                         
    $this->comentarios  = $this->get('ComentariosHoteis_model', array(
                                            'cho_idhotel' => $this->hotel->hot_id,
                                            '_join' => $_join,
                                            'sortBy' => 'com_dthcadastro',
                                            'sortDirection' => 'DESC'
                                            ));                                                                                
    $this->fotos        = $this->get('HoteisImagens_model', array(
                                            'him_idhotel' => $this->hotel->hot_id,
                                            'sortBy' => 'him_principal',
                                            'sortDirection' => 'DESC',
                                            '_join' => array('imagens')
                                            ));
    $this->hotel->tarifa_minima = $this->get('Hoteis_model', $this->hotel->hot_id, 'GetTarifaMinima');
    
    $this->dados_adicionais = $this->get('Dadosadicionais_model', array());
		$this->dados_adicionais = $this->organizaHDA($this->get('HoteisDadosadicionais_model', array('hda_idhotel' => $this->hotel->hot_id)));
		$this->setHDAExibicao();
		
		$pontos = array();
		$pontos[0] = new stdClass();
		$pontos[0]->name     = $this->hotel->hot_permalink;
		$pontos[0]->lat      = -25.442884;
		$pontos[0]->lng      = -49.272858;
    $pontos[0]->image    = 'http://webdesign/images/mm_20.png';
    $pontos[0]->infoHTML = '<div>Olá</div>';
    /*
		$pontos[0]->shadowImage = '';
		$pontos[0]->transpImage = '';
		$pontos[0]->imageSize   = new stdClass();
		$pontos[0]->shadowSize  = new stdClass();
		$pontos[0]->imagePos    = new stdClass();
		$pontos[0]->infoPos     = new stdClass();
		$pontos[0]->hasCirc     = false;
		$pontos[0]->circRadius  = 1;
		
		$pontos[0]->imageSize->w = 0;
		$pontos[0]->imageSize->h = 0;
		$pontos[0]->shadowSize->w = 0;
		$pontos[0]->shadowSize->h = 0;
		$pontos[0]->imagePos->x = 0;
		$pontos[0]->imagePos->y = 0;
		$pontos[0]->infoPos->x = 0;
		$pontos[0]->infoPos->y = 0;
    */
		$this->css_js->add('js', '/js/hotel.js', 'loadHotel(' . json_encode($pontos) . ');');
  }
  
  public function loadApartamento () {    
    $_join = array('tipos_apartamentos','hoteis', 'hoteis_enderecos','categorias_apartamentos','bloqueios', 'clientes_enderecos', 'enderecos', 
                    'portal_cidades','portal_estados','comentarios','usuarios');

    $this->apartamento    = $this->get('Apartamentos_model', array(
                                                    'hot_permalink' => $this->uri->segment('3'),
                                                    'cap_permalink' => $this->uri->segment('4'),
                                                    'tap_permalink' => $this->uri->segment('5'),
                                                    '_join'         => $_join 
                                                    ));
    if (!is_object($this->apartamento)) {
      $this->callErrApartamento();
    }
    
    if ($this->input->post('mensagem') != FALSE) {
      $this->setComentarios();
    }
    $this->comentarios    = $this->get('ComentariosApartamentos_model', array(
                                                    'cap_idapartamento' => $this->apartamento->apa_id,
                                                    '_join'             => $_join,
                                                    'sortBy'            => 'com_dthcadastro',
                                                    'sortDirection'     => 'DESC'
                                                    ));
    $this->fotos          = $this->get('ApartamentosImagens_model', array(
                                                    'aim_idapartamento' => $this->apartamento->apa_id,
                                                    'sortBy'            => 'aim_principal',
                                                    'sortDirection'     => 'DESC',
                                                    ));
    $this->apartamento->tarifa_minima = $this->get('Apartamentos_model', $this->apartamento->apa_id, 'GetTarifaMinima');                                                                                                                                                 
		
    
    $this->dados_adicionais = $this->get('DadosadicionaisApartamento_model', array());
		$this->dados_adicionais = $this->organizaADA($this->get('ApartamentosDadosAdicionais_model', array('ada_idapartamento' => $this->apartamento->apa_id)));
		$this->setADAExibicao();
  }
	
	private function organizaCategorias ($apartamentos) {
    $j = 0;
    $v_categoria = array();
    for ($i = 0, $s = count ($apartamentos); $i < $s; $i++) {
      if (!in_array($apartamentos[$i]->cap_nome, $v_categoria)) {
        $v_categoria[] = $apartamentos[$i]->cap_nome;
        $this->categorias[$j] = new stdClass();
        $this->categorias[$j]->cap_nome       = $apartamentos[$i]->cap_nome;
        $this->categorias[$j]->apartamentos   = array($apartamentos[$i]);
        $j++;
      } else {
        for ($k = 0, $c = count($this->categorias); $k < $c; $k++) {
          if ($apartamentos[$i]->cap_nome == $this->categorias[$k]->cap_nome) {
            $this->categorias[$k]->apartamentos[] = $apartamentos[$i];
            break;
          }
        }
      }
    }
  }
	
	private function setComentarios () {
  //atribui valores de data/hora e dados do input
    $data_comentario = date('Y-m-d H:i:s');
    $mensagem        = $this->input->post('mensagem');
  //
  
  //verifica se usuário foi logado.  
    if (!empty($this->usuario)) {
      $usuario_id     = $this->usuario->usu_id;
      $nome           = $this->usuario->usu_nome;
      $email          = $this->usuario->usu_email;
    //verifica se usuario é cliente
      if (!empty($this->cliente)) { 
        $cidade = $this->cliente->nome_cidade . " - " . $this->cliente->abr_estado;
      } else {  
        $cidade = $this->input->post('cidade');
      }
    //
     
    } else {
      $usuario_id  = NULL;
      $nome           = $this->input->post('nome');
      $email          = $this->input->post('email');
      $cidade         = $this->input->post('cidade');
    } 
  //  
    $comentario = $this->insert('Comentarios_model', array(
                                               'com_dthcadastro' => $data_comentario,
                                               'com_mensagem' => $mensagem,
                                               'com_idusuario' => $usuario_id,
                                               'com_nome' => $nome,
                                               'com_email' => $email,
                                               'com_cidade' => $cidade
                                            ));
    if ($this->tipo == 'apartamento') {
      $this->insert('ComentariosApartamentos_model', array(
                                                   'cap_idcomentario'  => $comentario,
                                                   'cap_idapartamento' => $this->apartamento->apa_id
                                                   ));
    } else {
      $this->insert('ComentariosHoteis_model', array(
                                                 'cho_idcomentario' => $comentario,
                                                 'cho_idhotel' => $this->hotel->hot_id
                                               ));
    }   
  }
	
	private function organizaHDA ($dados_cadastrados, $pai = NULL) {
    $r = array();
    $a = 0;
    for ($i = 0, $s = count($this->dados_adicionais); $i < $s; $i++) {
      if ($this->dados_adicionais[$i]->dad_pai == $pai) {
        $r[$a] = $this->dados_adicionais[$i];
        for ($j = 0, $c = count($dados_cadastrados); $j < $c; $j++) {
          if ($dados_cadastrados[$j]->hda_iddadoadcional == $r[$a]->dad_id) {
            $r[$a] = $this->obj_merge($r[$a], $dados_cadastrados[$j]);
            if (property_exists($r[$a], 'hda_lista')) {
              if (strstr($r[$a]->hda_lista, ',')) {
                $r[$a]->hda_lista = explode(',', $r[$a]->hda_lista);
              } else if ($r[$a]->hda_lista != NULL) {
                $r[$a]->hda_lista = array($r[$a]->hda_lista);
              } else {
                $r[$a]->hda_lista = array();
              }
            }
            array_splice($dados_cadastrados, $j, 1);
            $j--;
            $c--;
          }
        }
        array_splice($this->dados_adicionais, $i, 1);
        $i--;
        $s--;
        $a++;
      }
    }
    for ($i = 0, $s = count($r); $i < $s; $i++) {
      if ($r[$i]->dad_has_lista) {
        $r[$i]->childs = $this->organizaHDA($dados_cadastrados, $r[$i]->dad_id);
      } else {
        $r[$i]->childs = array();
      }
    }
    return $r;
  }
  
	
  private function setHDAExibicao ($dados = NULL) {
    $first = empty($dados) ? TRUE : FALSE;
    $dados = !empty($dados) ? $dados : $this->dados_adicionais;
    $this->da_exibicao = !empty($this->da_exibicao) ? $this->da_exibicao : '';
    for ($i = 0, $s = count($dados); $i < $s; $i++) {
      $this->da_exibicao .= "<div class=\"item contemfloat" . (($i == 0) ? " topo" : "") . "\">";
      $this->da_exibicao .= "<div class=\"contemfloat " . (($first) ? "first" : "") . "\">";
      $this->da_exibicao .= "<p>" . $dados[$i]->dad_campo . (substr($dados[$i]->dad_campo, -1) != "?" && substr($dados[$i]->dad_campo, -1) != ":" ? ":" : "");
      if ($dados[$i]->dad_has_bool) {
        $this->da_exibicao .= " <span class=\"item_bool\">";
				$this->da_exibicao .= (isset($dados[$i]->hda_bool) ? (($dados[$i]->hda_bool == 1) ? "Sim": "Não") : "");
        $this->da_exibicao .= "</span>";
      }
			$this->da_exibicao .= "</p>";
      $campos = FALSE;
      if ($dados[$i]->dad_has_qtde) {
        if (!$campos) {
          $campos = TRUE;
          $this->da_exibicao .= "<div class=\"campos_extra\">";
        }
        $this->da_exibicao .= "<div class=\"item_qtde\">";
        $this->da_exibicao .= "Quantidade: " . (isset($dados[$i]->hda_qtde) ? $dados[$i]->hda_qtde : "");
        $this->da_exibicao .= "</div>";
      }
      if ($dados[$i]->dad_has_valor) {
				$val = number_format((float) (isset($dados[$i]->hda_valor) ? $dados[$i]->hda_valor : ""), 2, ',', '.');
				if ($val != '0,00') {
					if (!$campos) {
						$campos = TRUE;
						$this->da_exibicao .= "<div class=\"campos_extra\">";
					}
					$this->da_exibicao .= "<div class=\"item_valor\">";
					$this->da_exibicao .= "Valor:" . $val;
					$this->da_exibicao .= "</div>";
				}
      }
      if ($campos) {
        $this->da_exibicao .= "</div>";
      }
      if ($dados[$i]->dad_has_desc) {
        $this->da_exibicao .= "<div class=\"item_desc\">";
        $this->da_exibicao .= (isset($dados[$i]->hda_desc) ? $dados[$i]->hda_desc : "");
        $this->da_exibicao .= "</div>";
      }
      $this->da_exibicao .= "</div>";
      if (!empty($dados[$i]->childs)) {
        $this->da_exibicao .= "<div class=\"childs\">";
        $this->setHDAExibicao($dados[$i]->childs);
        $this->da_exibicao .= "</div>";
      }
      $this->da_exibicao .= "</div>";
    }
  }
	
	private function organizaADA ($dados_cadastrados, $pai = NULL) {
    $r = array();
    $a = 0;
    for ($i = 0, $s = count($this->dados_adicionais); $i < $s; $i++) {
      if ($this->dados_adicionais[$i]->dap_pai == $pai) {
        $r[$a] = $this->dados_adicionais[$i];
        for ($j = 0, $c = count($dados_cadastrados); $j < $c; $j++) {
          if ($dados_cadastrados[$j]->ada_iddadosadicionais == $r[$a]->dap_id) {
            $r[$a] = $this->obj_merge($r[$a], $dados_cadastrados[$j]);
            if (property_exists($r[$a], 'ada_lista')) {
              if (strstr($r[$a]->ada_lista, ',')) {
                $r[$a]->ada_lista = explode(',', $r[$a]->ada_lista);
              } else if ($r[$a]->ada_lista != NULL) {
                $r[$a]->ada_lista = array($r[$a]->ada_lista);
              } else {
                $r[$a]->ada_lista = array();
              }
            }
            array_splice($dados_cadastrados, $j, 1);
            $j--;
            $c--;
          }
        }
        array_splice($this->dados_adicionais, $i, 1);
        $i--;
        $s--;
        $a++;
      }
    }
    for ($i = 0, $s = count($r); $i < $s; $i++) {
      if ($r[$i]->dap_has_lista) {
        $r[$i]->childs = $this->organizaADA($dados_cadastrados, $r[$i]->dap_id);
      } else {
        $r[$i]->childs = array();
      }
    }
    return $r;
  }
  
	
  private function setADAExibicao ($dados = NULL) {
    $first = empty($dados) ? TRUE : FALSE;
    $dados = !empty($dados) ? $dados : $this->dados_adicionais;
    $this->da_exibicao = !empty($this->da_exibicao) ? $this->da_exibicao : '';
    for ($i = 0, $s = count($dados); $i < $s; $i++) {
      $this->da_exibicao .= "<div class=\"item contemfloat" . (($i == 0) ? " topo" : "") . "\">";
      $this->da_exibicao .= "<div class=\"contemfloat " . (($first) ? "first" : "") . "\">";
      $this->da_exibicao .= "<p>" . $dados[$i]->dap_campo . (substr($dados[$i]->dap_campo, -1) != "?" && substr($dados[$i]->dap_campo, -1) != ":" ? ":" : "");
      if ($dados[$i]->dap_has_bool) {
        $this->da_exibicao .= " <span class=\"item_bool\">";
				$this->da_exibicao .= (isset($dados[$i]->ada_bool) ? (($dados[$i]->ada_bool == 1) ? "Sim": "Não") : "");
        $this->da_exibicao .= "</span>";
      }
			$this->da_exibicao .= "</p>";
      $campos = FALSE;
      if ($dados[$i]->dap_has_qtde) {
        if (!$campos) {
          $campos = TRUE;
          $this->da_exibicao .= "<div class=\"campos_extra\">";
        }
        $this->da_exibicao .= "<div class=\"item_qtde\">";
        $this->da_exibicao .= "Quantidade: " . (isset($dados[$i]->ada_qtde) ? $dados[$i]->ada_qtde : "");
        $this->da_exibicao .= "</div>";
      }
      if ($dados[$i]->dap_has_valor) {
				$val = number_format((float) (isset($dados[$i]->ada_valor) ? $dados[$i]->ada_valor : ""), 2, ',', '.');
				if ($val != '0,00') {
					if (!$campos) {
						$campos = TRUE;
						$this->da_exibicao .= "<div class=\"campos_extra\">";
					}
					$this->da_exibicao .= "<div class=\"item_valor\">";
					$this->da_exibicao .= "Valor:" . $val;
					$this->da_exibicao .= "</div>";
				}
      }
      if ($campos) {
        $this->da_exibicao .= "</div>";
      }
      if ($dados[$i]->dap_has_desc) {
        $this->da_exibicao .= "<div class=\"item_desc\">";
        $this->da_exibicao .= (isset($dados[$i]->ada_desc) ? $dados[$i]->ada_desc : "");
        $this->da_exibicao .= "</div>";
      }
      $this->da_exibicao .= "</div>";
      if (!empty($dados[$i]->childs)) {
        $this->da_exibicao .= "<div class=\"childs\">";
        $this->setADAExibicao($dados[$i]->childs);
        $this->da_exibicao .= "</div>";
      }
      $this->da_exibicao .= "</div>";
    }
  }
  
	private function callErrHotel () {
    redirect('/');
  }
    
  private function callErrApartamento () {
    redirect('/');
  }
}

/* fim do arquivo hotel.php */
/* Location: ./system/application/controllers/hotel.php */
