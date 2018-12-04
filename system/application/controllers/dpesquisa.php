<?php
class Pesquisa extends MyController {
  public $tipo;
  public $termo;
  public $hot_categorias = array();
  public $categorias_apa = array();
  public $qtde_apa = array();
  public $dataini = array();
  public $datafim = array();
  public $datas = array();
  public $hoteis = array();
  public $result = NULL;
  public $bairros = array();
  
  public function Pesquisa () {
    parent::__construct();
    
    $this->css_js->add('js', '/js/moeda.js');
    
    $this->hot_categorias = $this->get('Categorias_model', array('sortBy' => 'cat_nivel', 'sortDirection' => 'ASC'));
    
    $this->load->library('pagination');
    
    $h = $this->session->userdata('hoteis');
    
    if (empty ($h) || $this->input->post('np') == '1') {
    
      $this->setApartamentos();
      $this->setTermo();
      $this->setDatas();
      
      if ($this->input->post('pesquisar_por') == 'c') {
        $this->BuscaHoteisPorCidade();
      } else if ($this->input->post('pesquisar_por') == 'h') {
        $this->BuscaHoteisPorNome();
      }
      
      $this->setSession();
      
    } else {
      $this->getSession();
    }
    
    $this->setBairros();
    
    $this->ordenarPor($this->input->post('ordenacao'));
    
    $bairro = $this->input->post('bairros');
    $categoria = $this->input->post('categorias');
    $valorMin = $this->input->post('valorMin');
    $valorMax = $this->input->post('valorMax'); 
    
    if (!empty($bairro)) {
      $this->limitarPorBairro($bairro);
    }
    if (!empty($categoria)) {
      $this->limitarPorCategoria($categoria);
    }
    if (!empty($valorMin) || !empty($valorMax)) {
      $this->limitarPorValores($valorMin, $valorMax);
    }
    
    $this->limitarExibicao(20, 1);
    
    $this->pagination->initialize(array(
        'base_url' => 'pesquisa/result/',
        'total_rows' => count($this->hoteis),
        'per_page' => 20
    ));
    
    $this->css_js->add('js','/js/pesquisa.js', 'loadPesquisa();');
  }
  
  public function Index () {
    $this->load->view('pesquisa');
  }    
  
  private function BuscaHoteisPorCidade () {
	if (isset($this->dataini['ano'])) {
		$datainicial = $this->dataini['ano'] . '-' . $this->dataini['mes'] . '-' . $this->dataini['dia'];
		
		for ($i = 0, $s = count($this->datas); $i < $s; $i++) {
			  
		  switch ($this->datas[$i]->diasemana) {
			case 1: $diasemana = 'bca_seg'; break;
			case 2: $diasemana = 'bca_ter'; break;
			case 3: $diasemana = 'bca_qua'; break;
			case 4: $diasemana = 'bca_qui'; break;
			case 5: $diasemana = 'bca_sex'; break;
			case 6: $diasemana = 'bca_sab'; break;
			case 7: $diasemana = 'bca_dom'; break;
		  }
		  
		  $dados[$this->datas[$i]->data] = $this->get('Pesquisa_model', array(
			'nome_cidade' => $this->termo,
			'data' => $this->datas[$i]->data,
			'datainicial' => $datainicial,
			$diasemana => 1,
			'cap_id_in' => $this->categorias_apa
		  ));
		  
		}
		$this->OrganizaDados($dados);
	}
  }
  
  private function BuscaHoteisPorNome () {
    $datainicial = $this->dataini['ano'] . '-' . $this->dataini['mes'] . '-' . $this->dataini['dia'];
    
    for ($i = 0, $s = count($this->datas); $i < $s; $i++) {
          
      switch ($this->datas[$i]->diasemana) {
        case 1: $diasemana = 'bca_seg'; break;
        case 2: $diasemana = 'bca_ter'; break;
        case 3: $diasemana = 'bca_qua'; break;
        case 4: $diasemana = 'bca_qui'; break;
        case 5: $diasemana = 'bca_sex'; break;
        case 6: $diasemana = 'bca_sab'; break;
        case 7: $diasemana = 'bca_dom'; break;
      }
      
      $dados[$this->datas[$i]->data] = $this->get('Pesquisa_model', array(
        'hot_nome' => $this->termo,
        'data' => $this->datas[$i]->data,
        'datainicial' => $datainicial,
        $diasemana => 1,
        'cap_id_in' => $this->categorias_apa
      ));
      
    }
    $this->OrganizaDados($dados);
    
  }
  
  private function OrganizaDados($dados) {
    $this->hoteis = $this->OrganizaDadosHoteis($dados);
    
    for ($i = 0, $h = count($this->hoteis); $i < $h; $i++) {
      $hot_id = $this->hoteis[$i]->hot_id;
      $cap_ok = TRUE;
      
      $categorias_apa = $this->OrganizaDadosCategorias($this->hoteis[$i], $dados);
      
      if (count ($categorias_apa) != count ($this->categorias_apa)) {
      
        array_splice($this->hoteis, $i, 1);
        $i--;
        $h--;
        $cap_ok = FALSE;
      
      } else {
      
        $menor_valor_hot = 0;
        $apa_ok = TRUE;
        
        for ($j = 0, $c = count($categorias_apa); $j < $c; $j++) {
          $cap_id = $categorias_apa[$j]->cap_id;
          $menor_valor_cap = 0;
           
          $apartamentos = $this->OrganizaDadosApartamentos($categorias_apa[$j], $dados, $hot_id);
          
          
          if (count($apartamentos) <= 0) {
            array_splice($this->hoteis, $i, 1);
            $i--;
            $h--;
            $apa_ok = FALSE;
            
          } else {
            for ($k = 0, $a = count($apartamentos); $k < $a; $k++) {
              $valor_apa = 0;
              $blo_ok = TRUE;
              
              $bloqueios = $this->OrganizaDadosBloqueios($apartamentos[$k], $dados, $hot_id, $cap_id);
              
              if (count($bloqueios) <= 0) {
                
                array_splice($apartamentos, $k, 1);
                $k--;
                $a--;
                break;
                
              } else {
                              
                for ($l = 0, $b = count($bloqueios); $l < $b; $l++) {
                  $bloqueios[$l] = $this->OrganizaDadosBloqueiosValidos($bloqueios[$l], $bloqueios);
                  
                  if (count ($bloqueios[$l]->validos) <= 0) {
                    array_splice($apartamentos, $k, 1);
                    $k--;
                    $a--;
                    $blo_ok = FALSE;
                    break;
                  } else {
                    $bloqueios[$l]->prioritario = $this->OrganizaDadosBloqueioPrioritario($bloqueios[$l]);
                  }
                  
                }
                
                if ($blo_ok) {
                  $apartamentos[$k]->bloqueios = $bloqueios;
                
                  $apartamentos[$k] = $this->OrganizaDadosValidaApartamento($apartamentos[$k]);
                  
                  if ($apartamentos[$k] == NULL) {
                    
                    array_splice($apartamentos, $k, 1);
                    $k--;
                    $a--;
                    break;
                  
                  } else {
                  
                    $valor_apa = 0;                    
                    
                    for ($l = 0, $b = count($bloqueios); $l < $b; $l++) {
                      $valor_apa += $bloqueios[$l]->prioritario->blo_tarifafinal; 
                    }
                    
                    $apartamentos[$k]->valor_apa    = $valor_apa;
                    $apartamentos[$k]->diaria_media = $valor_apa / (count ($this->datas));
                    
                    if (isset($apartamentos[$k - 1]->valor_apa)) {
                
                      if ($valor_apa < $apartamentos[$k - 1]->valor_apa) {
                        $menor_valor_cap  = $apartamentos[$k]->valor_apa;
                        $menor_valor_cap_id = $apartamentos[$k]->apa_id;
                      }
                        
                    } else {
                      $menor_valor_cap = $apartamentos[$k]->valor_apa;
                      $menor_valor_cap_id = $apartamentos[$k]->apa_id;
                    }
                    
                  }
                  
                }
              
              }            
            
            }
            
            if (count ($apartamentos) > 0) {
              $categorias_apa[$j]->apartamentos = $apartamentos;
              $categorias_apa[$j]->menor_valor_cap = $menor_valor_cap;
              $categorias_apa[$j]->menor_valor_cap_id = $menor_valor_cap_id;
              $menor_valor_hot += $menor_valor_cap * $this->qtde_apa[$categorias_apa[$j]->cap_id];
            } else {
              array_splice($this->hoteis, $i, 1);
              $i--;
              $h--;
              $apa_ok = FALSE;
            }  
          
          }
          if ($apa_ok) {
            $this->hoteis[$i]->categorias_apa = $categorias_apa;
            $this->hoteis[$i]->menor_valor_hot = $menor_valor_hot;
          } else {
            $apa_ok = TRUE;
          }
        }
      
      }
    
    }
    
  }
  
  private function OrganizaDadosHoteis ($dados) {
    $hoteis = array();
    
    foreach ($dados as $data => $valores) {
      $h = count ($hoteis);
      
      for ($i = 0, $s = count($valores); $i < $s; $i++) {
        $hoteis[$h + $i] = new stdClass();
        
        $hoteis[$h + $i]->hot_id           = $valores[$i]->hot_id;
        $hoteis[$h + $i]->hot_idcategoria  = $valores[$i]->hot_idcategoria;
        $hoteis[$h + $i]->hot_nome         = $valores[$i]->hot_nome;
        $hoteis[$h + $i]->hot_permalink    = $valores[$i]->hot_permalink;
        $hoteis[$h + $i]->hot_noshow       = $valores[$i]->hot_noshow;
        $hoteis[$h + $i]->hot_idadecrianca = $valores[$i]->hot_idadecrianca;
        $hoteis[$h + $i]->hot_checkin      = $valores[$i]->hot_checkin;
        $hoteis[$h + $i]->hot_checkout     = $valores[$i]->hot_checkout;
        $hoteis[$h + $i]->end_endereco     = $valores[$i]->end_endereco;
        $hoteis[$h + $i]->end_numero       = $valores[$i]->end_numero;
        $hoteis[$h + $i]->end_bairro       = $valores[$i]->end_bairro;
        $hoteis[$h + $i]->nome_cidade      = $valores[$i]->nome_cidade;
        $hoteis[$h + $i]->nome_estado      = $valores[$i]->nome_estado;
        $hoteis[$h + $i]->abr_estado       = $valores[$i]->abr_estado;
        
        if ($this->VerificaRepetido($h + $i, $hoteis, 'hot_id')) {
          unset($hoteis[$h + $i]);
          $h--;
        }
        
      }
      
    }
    
    return $hoteis; 
  }
  
  private function OrganizaDadosCategorias ($hotel, $dados) {
    $categorias_apa = array();
    
    foreach ($dados as $data => $valores) {
      
      $c = count ($categorias_apa);
      
      for ($i = 0, $v = count($valores); $i < $v; $i++) {
      
        if ($hotel->hot_id == $valores[$i]->hot_id) {
          
          $categorias_apa[$c + $i] = new stdClass();
          
          $categorias_apa[$c + $i]->cap_id        = $valores[$i]->cap_id;
          $categorias_apa[$c + $i]->cap_nome      = $valores[$i]->cap_nome;
          $categorias_apa[$c + $i]->cap_descricao = $valores[$i]->cap_descricao;
          $categorias_apa[$c + $i]->cap_permalink = $valores[$i]->cap_permalink;
          
          if ($this->VerificaRepetido($c + $i, $categorias_apa, 'cap_id')) { 
            unset($categorias_apa[$c + $i]);
            $c--;
          }
          
        } else {
          $c--;
        }
        
      }
      
    }
    return $categorias_apa;
  }
  
  private function OrganizaDadosApartamentos ($categoria_apa, $dados, $hot_id) {
    $apartamentos = array();
    
    foreach ($dados as $data => $valores) {
      $a = count ($apartamentos);
      
      for ($i = 0, $v = count($valores); $i < $v; $i++) {
      
        if ($hot_id == $valores[$i]->hot_id) {
          
          if ($categoria_apa->cap_id == $valores[$i]->cap_id) {
            $apartamentos[$a + $i] = new stdClass();
            
            $apartamentos[$a + $i]->apa_id        = $valores[$i]->apa_id;
            $apartamentos[$a + $i]->tap_nome      = $valores[$i]->tap_nome;
            $apartamentos[$a + $i]->tap_permalink = $valores[$i]->tap_permalink;
            $apartamentos[$a + $i]->tap_descricao = $valores[$i]->tap_descricao;
            if ($this->VerificaRepetido($a + $i, $apartamentos, 'apa_id')) {
              unset($apartamentos[$a + $i]);
              $a--;
              break;
            }
            
          } else {
            $a--;
          }
          
        } else {
          $a--;
        }
                      
      }
      
    }
    
    return $apartamentos;
  }
  
  private function OrganizaDadosBloqueios ($apartamento, $dados, $hot_id, $cap_id) {
    $bloqueios = array();
    $i = 0;
    
    foreach ($dados as $data => $valores) {
      $invalidos = array();
      $validos = array();
      
      $da = explode('-', $data);
      $data_ant = date('Y-m-d', mktime(0,0,0,intval($da[1]),intval($da[2]) - 1,intval($da[0])));
       
      $bloqueios[$i] = new stdClass();
      
      $bloqueios[$i]->data     = $data;
      $bloqueios[$i]->data_ant = $data_ant;
      
      for ($j = 0, $v = count($valores); $j < $v; $j++) {
        
        if ($hot_id == $valores[$j]->hot_id) {
        
          if ($cap_id == $valores[$j]->cap_id) {
          
            if ($apartamento->apa_id == $valores[$j]->apa_id) {
            
              if ($bloqueios[$i]->data == $data) {
                $p = array('blo_id' => $valores[$j]->blo_id, 'data' => $bloqueios[$i]->data);
                
                $bloqueio = new stdClass();
                
                $bloqueio->blo_id            = $valores[$j]->blo_id;
                $bloqueio->blo_tarifa        = $valores[$j]->blo_tarifa;
                $bloqueio->blo_tarifafinal   = $valores[$j]->blo_tarifafinal;
                $bloqueio->blo_taxaservico   = $valores[$j]->blo_taxaservico;
                $bloqueio->blo_iss           = $valores[$j]->blo_iss;
                $bloqueio->blo_taxaturismo   = $valores[$j]->blo_taxaturismo;
                $bloqueio->bca_qtdmindiaria  = $valores[$j]->bca_qtdmindiaria;
                $bloqueio->blo_deadline      = $valores[$j]->blo_deadline;
                $bloqueio->bca_nome          = $valores[$j]->bca_nome;
                $bloqueio->bca_id            = $valores[$j]->bca_id;
                $bloqueio->bca_prioridade    = $valores[$j]->bca_prioridade;
                $bloqueio->blo_max_reservas  = $this->get('Pesquisa_model', $p, 'GetBloqueiosDisponiveis')->count;
                
                if ($valores[$j]->deadline_valida == '0' || $bloqueio->blo_max_reservas < $this->qtde_apa[$cap_id]) {
                  $invalidos[count($invalidos)] = $bloqueio;
                } else {
                  $validos[count($validos)] = $bloqueio;
                }
                
              }
              
            }
            
          }
          
        }
        
      }
      
      $bloqueios[$i]->invalidos = $invalidos;
      $bloqueios[$i]->validos = $validos;
      
      $i++; 
    }
    
    return $bloqueios;  
  }
  
  private function OrganizaDadosBloqueiosValidos ($bloqueio_atual, $bloqueios) {
    $validos   = array();
    $invalidos = array();
    
    for ($i = 0, $bv = count($bloqueio_atual->validos); $i < $bv; $i++) {
      $contador = 1;
      
      $c_inv = in_array($bloqueio_atual->validos[$i]->blo_id, $invalidos);
      $c_val = in_array($bloqueio_atual->validos[$i]->blo_id, $validos);
      
      if (!$c_inv && !$c_val) {
      
        for($j = 0, $b2 = count($bloqueios); $j < $b2; $j++) {
                              
          if ($bloqueio_atual->data != $bloqueios[$j]->data) {
          
            for($k = 0, $bv2 = count($bloqueios[$j]->validos); $k < $bv2; $k++) {
            
              if ($bloqueio_atual->validos[$i]->blo_id == $bloqueios[$j]->validos[$k]->blo_id) {
                $contador++;
              }
              
            }
            
          }
          
        }
        
      }
      
      if (!$c_val && $contador < $bloqueio_atual->validos[$i]->bca_qtdmindiaria) {
      
        if (!$c_inv) {
          $bloqueio_atual->invalidos[] = $bloqueio_atual->validos[$i];
          $invalidos[] = $bloqueio_atual->validos[$i]->blo_id;
        }
        
        array_splice($bloqueio_atual->validos, $i, 1);
        $i--;
        $bv--;
        
      } else {
        $validos[] = $bloqueio_atual->validos[$i]->blo_id;
      }
      
    }
    
    return $bloqueio_atual;
  }
  
  private function OrganizaDadosBloqueioPrioritario ($bloqueio) {
      $prioritario = $bloqueio->validos[0];
      
      for ($i = 1, $bv = count($bloqueio->validos); $i < $bv; $i++) {
      
        if ($prioritario->bca_prioridade < $bloqueio->validos[$i]->bca_prioridade) {
          $prioritario = $bloqueio->validos[$i];
        }
        
      }
    
    return $prioritario;
  }
  
  private function OrganizaDadosValidaApartamento ($apartamento) {
    $minimodiarias = 0;
    $invalidos = array();
    
    for ($j = 0, $b = count ($apartamento->bloqueios); $j < $b; $j++) {
      
      if ($apartamento->bloqueios[$j]->prioritario->bca_qtdmindiaria > 1) {
        $i_blo = $minimodiarias = $apartamento->bloqueios[$j]->prioritario->blo_minimodiarias - 1;
        
        for ($l = 0, $b2 = count ($apartamento->bloqueios); $l < $b2; $l++) {
          
          if (($l >= $j - $i_blo) && ($l <= $j + $i_blo) && $apartamento->bloqueios[$j]->data != $apartamento->bloqueios[$l]->data) {
              
            if ($apartamento->bloqueios[$j]->prioritario->blo_id == $apartamento->bloqueios[$l]->prioritario->blo_id) {
              $minimodiarias--;
              
              if ($minimodiarias == 0) {
                break;
              }
              
            } else {
              $minimodiarias = $apartamento->bloqueios[$j]->prioritario->blo_minimodiarias - 1;
            }
            
          }
          
        }
        
      }
      
      if ($minimodiarias > 0) {
        
        $cv = count ($apartamento->bloqueios[$j]->validos);
        
        if ($cv - 1 > 0) {
        
          for ($k = 0; $k < $cv; $k++) {
          
            if ($apartamento->bloqueios[$j]->validos[$k]->blo_id == $apartamento->bloqueios[$j]->prioritario->blo_id) {
              $apartamento->bloqueios[$j]->invalidos[] = $apartamento->bloqueios[$j]->validos[$k];
              array_splice($apartamento->bloqueios[$j]->validos, $k, 1);
              break;
            }
            
          }
          
          $apartamento->bloqueios[$j]->prioritario = $this->OrganizaDadosBloqueioPrioritario($apartamento->bloqueios[$j]);
          $j--;
          
        } else {
          $rel = '';
          $index_pos = 0;
          $index_neg = 0;
          $i_pos = 0;
          $i_neg = 0;
          $err = FALSE;
          
          for ($k = 1; $k < $apartamento->bloqueios[$j]->prioritario->blo_minimodiarias; $k++) {
            if (isset($apartamento->bloqueios[$j - $k + $i_neg])) {
              $rel_neg = $apartamento->bloqueios[$j - $k + $i_neg]->prioritario->bca_prioridade;
            }
            if (isset ($apartamento->bloqueios[$j + $k - $i_pos])) {
              $rel_pos = $apartamento->bloqueios[$j + $k - $i_pos]->prioritario->bca_prioridade;
            }
            if (isset($rel_neg) && isset($rel_pos)) {
              if ($rel_neg > $rel_pos) {
                $rel = 'index_neg';
                $index_neg = eval('return ' . $j . '-'. $k . '+' . $i_neg . ';');
                $i_pos--;
              } else {
                $rel = 'index_pos';
                $index_pos = eval('return ' . $j . '+'. $k . '-' . $i_pos . ';');
                $i_neg++;
              } 
            } else if (isset($rel_neg) XOR isset($rel_pos)) {
              if (isset($rel_neg)) {
                $rel = 'index_neg';
                $index_neg = eval('return ' . $j . '-'. $k . '+' . $i_neg . ';');
                $i_pos--;
              } else {
                $rel = 'index_pos';
                $index_pos = eval('return ' . $j . '+'. $k . '-' . $i_pos . ';');
                $i_neg++;
              }
            } else {
              $err = TRUE;
              break;
            }
            
            $ok = FALSE;
            for ($l = 0, $s = count ($apartamento->bloqueios[$$rel]->validos); $l < $s; $l++) {
              if ($apartamento->bloqueios[$$rel]->validos[$l]->blo_id == $apartamento->bloqueios[$j]->prioritario->blo_id) {
                $apartamento->bloqueios[$$rel]->prioritario = $apartamento->bloqueios[$$rel]->validos[$l];
                $ok = TRUE;
                break;
              }
            }
            
            if (!$ok) {
              $rel = ($rel == 'index_neg') ? 'index_pos' : 'index_neg';
              $ok = FALSE;
              for ($l = 0, $s = count ($apartamento->bloqueios[$$rel]->validos); $l < $s; $l++) {
                if ($apartamento->bloqueios[$$rel]->validos[$l]->blo_id == $apartamento->bloqueios[$j]->prioritario->blo_id) {
                  $apartamento->bloqueios[$$rel]->prioritario = $apartamento->bloqueios[$$rel]->validos[$l];
                  $ok = TRUE;
                }
              }
            }
            
            if (!$ok) {
              $err = TRUE;
              break;
            }
            
            unset($rel_neg);
            unset($rel_pos);
          }
          
          if ($err) {
            $apartamento = NULL;
            break;
          }
        }
        
      }
    }
    return $apartamento;
  }                   
  
  private function VerificaRepetido ($indice, $lista, $termo) {
    $r = false;
    
    for ($i = 0, $c = count($lista); $i < $c; $i++) {
    
      if ($indice != $i) {
      
        if ($lista[$indice]->{$termo} == $lista[$i]->{$termo}) { 
          $r = true;
          break;
        }
        
      }
      
    }
    
    return $r;
  }
  
  private function ordenarPor($tipo) {
	$hoteis = array();
	if ($tipo == 'reserva') {
		/**
		 * Separando variávies para usar no array_multisort()
		 */
		for ($i = 0, $h = count($this->hoteis); $i < $h; $i++) {
		  $valor[] = $hoteis_sort[$i]['valor'] = $this->hoteis[$i]->menor_valor_hot;
		  $nome[]  = $hoteis_sort[$i]['nome']  = $this->hoteis[$i]->hot_nome;
		  $id[]    = $hoteis_sort[$i]['id']    = $this->hoteis[$i]->hot_id;
		  $index[] = $hoteis_sort[$i]['index'] = $i;
		}
		
		/**
		 * Buscando referéncias de reservas em hotel
		 */
		$res_hot = $this->get('reservasHotel_model', array('rsh_idhotel_in' => $id), 'GetReservasHotel');
		
		
		/**
		 * Definindo hotéis mais reservados (separando ids e quantidade de locações)
		 */
		$mais = array();
		$hot_id_in = array();
		for ($i = 0, $s = count ($res_hot); $i < $s; $i++) {
			if (in_array($res_hot[$i]->rsh_idhotel, $hot_id_in)) {
				for ($j = 0, $c = count ($hot_id_in); $j < $c; $j++) {
					if ($hot_id_in[$j] == $res_hot[$i]->rsh_idhotel) {
						$mais[$j]++;
						break;
					}
				}
			} else {
				$cm = count($hot_id_in);
				$mais[$cm] = 1;
				$hot_id_in[$cm] = $res_hot[$i]->rsh_idhotel;
			}
		}
		/**
		 * Ordenando hotéis por reservas efetuadas... de menor quantidade para maior quantidade.
		 * Essa ordenação é ao contrário para facilitar a posterior ordenação dos resultados de pesquisa
		 */
		array_multisort($mais, SORT_ASC, $hot_id_in);
		
		/**
		 * Efetuando ordenação padrão
		 */
		array_multisort($valor, SORT_ASC, $nome, SORT_ASC, $id, SORT_ASC, $hoteis_sort);
		
		/**
		 * Efetuando ordenação por mais reservados
		 */
		for ($i = 0, $s = count($hot_id_in); $i < $s; $i++) {
			for ($j = 0, $c = count($hoteis_sort); $j < $c; $j++) {
				if ($hot_id_in[$i] == $hoteis_sort[$j]['id']) {
					$temp = $hoteis_sort[$j];
					array_splice($hoteis_sort, $j, 1);
					array_unshift($hoteis_sort, $temp);
					unset($temp);
					break;
				}
			}
		}
		
		for ($i = 0, $h2 = count($hoteis_sort); $i < $h2; $i++) {
		  $hoteis[] = $this->hoteis[$hoteis_sort[$i]['index']];
		}
	} else {
		$hoteis_sort = array();
		$valor = array();
		$nome = array();
		$id = array();
		$index = array();
		
		for ($i = 0, $h = count($this->hoteis); $i < $h; $i++) {
		  $valor[] = $hoteis_sort[$i]['valor'] = $this->hoteis[$i]->menor_valor_hot;
		  $nome[] = $hoteis_sort[$i]['nome'] = $this->hoteis[$i]->hot_nome;
		  $id[] = $hoteis_sort[$i]['id'] = $this->hoteis[$i]->hot_id;
		  $index[] = $hoteis_sort[$i]['index'] = $i;
		}
		
		if ($tipo == 'az') {
			array_multisort($nome, SORT_ASC, $valor, SORT_ASC, $id, SORT_ASC, $hoteis_sort);
		} else {
			array_multisort($valor, SORT_ASC, $nome, SORT_ASC, $id, SORT_ASC, $hoteis_sort);
		}
		
		for ($i = 0, $h2 = count($hoteis_sort); $i < $h2; $i++) {
		  $hoteis[] = $this->hoteis[$hoteis_sort[$i]['index']];
		}
	}
    $this->hoteis = $hoteis;
  }
  
  private function limitarPorBairro ($bairro) {
    $result = is_array($this->result) ? $this->result : $this->hoteis;
    
    $this->result = array();
    
    for ($i = 0, $r = count ($result); $i < $r; $i++) {
    
      if ($result[$i]->end_bairro == $bairro) {
        $this->result[] = $result[$i];
      }
      
    }
    
  }
  
  private function limitarPorCategoria ($categoria) {
    $result = is_array($this->result) ? $this->result : $this->hoteis;
    
    $this->result = array();
    
    for ($i = 0, $r = count ($result); $i < $r; $i++) {
    
      if ($result[$i]->hot_idcategoria == $categoria) {
        $this->result[] = $result[$i];
      }
      
    }
    
  }
  
  private function limitarPorValores ($valorMin = NULL, $valorMax = NULL) {
    $valorMin = !empty ($valorMin)      ? (float) $valorMin : 0;
    $valorMax = !empty ($valorMax)      ? (float) $valorMax : 999999999999999;
    $result   = is_array($this->result) ? $this->result     : $this->hoteis;
    
    $this->result = array();
    
    for ($i = 0, $r = count ($result); $i < $r; $i++) {
      if ($result[$i]->menor_valor_hot >= $valorMin && $result[$i]->menor_valor_hot <= $valorMax) {
        $this->result[] = $result[$i];
      }
      
    }
  }
  
  private function limitarExibicao ($qtde = 10, $comeco = 1) {
    $result = is_array($this->result) ? $this->result : $this->hoteis;
    $comeco = $comeco - 1;
    
    $h = count ($result) - 1;
    $t = $comeco + $qtde;
    
    $this->result = array();
    
    if (isset($result[$comeco])) {
    
      if ($h < $t) {
        $t = $h;
      }
      
      for ($i = $comeco; $i <= $t; $i++) {
        $this->result[] = $result[$i];
      }
      
    }
    
  }
  
  private function setTermo () {
    
    if ($this->input->post('pesquisar_por') == 'c') {
      $this->termo = preg_replace('/ - .*?$/', '', $this->input->post('autocompletecidade'));
    } else {
      $this->termo = $this->input->post('autocompletehotel');
    }
    
  }
  
  private function setDatas () {
    $di = explode('/', $this->input->post('retiradaini'));
    $df = explode('/', $this->input->post('retiradafim'));
    if (count($di) == 3 && count($df) == 3) {
		$this->dataini = array('dia' => intval($di[0]), 'mes' => intval($di[1]), 'ano' => intval($di[2]));
		$this->datafim = array('dia' => intval($df[0]), 'mes' => intval($df[1]), 'ano' => intval($df[2]));
		
		$timeini = mktime(0,0,0,$this->dataini['mes'],$this->dataini['dia'],$this->dataini['ano']);
		$timefim = mktime(0,0,0,$this->datafim['mes'],$this->datafim['dia'],$this->datafim['ano']);
		if ($timeini < $timefim) {
			$str_datafim = date('Y-m-d', $timefim);
			
			for ($i = 0, $s = ''; $s != $str_datafim; $s = $dataatual, $i++) {
			  $time = mktime(0,0,0,$this->dataini['mes'],$this->dataini['dia'] + 1 + $i,$this->dataini['ano']);
			  
			  $this->datas[$i] = new stdClass();
			  
			  $this->datas[$i]->data      = $dataatual = date('Y-m-d', $time); 
			  $this->datas[$i]->diasemana = date('N', $time);
			}
		}
	}
  }
  
  private function setApartamentos () {
    $cat_apa = $this->input->post('tipo_apartamento');
    
    for ($i = 0, $s = count ($cat_apa); $i < $s; $i++) {
      $c = intval($cat_apa[$i]);
      
      if (!in_array($c, $this->categorias_apa)) {
        $this->categorias_apa[] = $c;
        $this->qtde_apa[$c] = 1;
      } else {
        $this->qtde_apa[$c]++;
      }
      
    }
    
  }
  
  private function setBairros () {
    if (!empty ($this->hoteis)) {
    
      for ($i = 0, $h = count($this->hoteis); $i < $h; $i++) {
      
        if (!in_array($this->hoteis[$i]->end_bairro, $this->bairros)) {
          $this->bairros[] = $this->hoteis[$i]->end_bairro;
        }
        
      }
      
    }
  }
  
  private function setSession () {
    $this->session->set_userdata('hoteis', $this->hoteis);
    $this->session->set_userdata('categorias_apa', $this->categorias_apa);
    $this->session->set_userdata('qtde_apa', $this->qtde_apa);
    $this->session->set_userdata('dataini', $this->dataini);
    $this->session->set_userdata('datafim', $this->datafim);
    $this->session->set_userdata('datas', $this->datas);
    
    $this->session->set_userdata('fbusca_pesquisar_por', $this->input->post('pesquisar_por'));
    $this->session->set_userdata('fbusca_autocompletecidade', $this->input->post('autocompletecidade'));
    $this->session->set_userdata('fbusca_autocompletehotel', $this->input->post('autocompletehotel'));
    $this->session->set_userdata('fbusca_retiradaini', $this->input->post('retiradaini'));
    $this->session->set_userdata('fbusca_retiradafim', $this->input->post('retiradafim'));
    $this->session->set_userdata('fbusca_quantidade_apartamentos', $this->input->post('quantidade_apartamentos'));
    $this->session->set_userdata('fbusca_tipo_apartamento', $this->input->post('tipo_apartamento'));
  }
  
  private function getSession () {
    $this->hoteis = $this->session->userdata('hoteis');
    $this->categorias_apa = $this->session->userdata('categorias_apa');
    $this->qtde_apa = $this->session->userdata('qtde_apa');
    $this->dataini = $this->session->userdata('dataini');
    $this->datafim = $this->session->userdata('datafim');
    $this->datas = $this->session->userdata('datas');
  } 
}

//end of file