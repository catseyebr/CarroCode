<?php
class Hoteis extends MyController {
	public $data = array();
	public $hotel = array();
	public $endereco = array();
	public $hoteis = array();
	public $apartamentos;
	public $categorias;
	public $query_metatags;
	public $cidades;
	public $referencias;
	public $hoteisContatos;
	public $hoteisImagens;
	public $estados;
	public $dados_adicionais;
	
	function Hoteis()
	{
		parent::__construct('Admin');
		$this->estados = $this->get('PortalEstados_model', array());
	}
	function index()
	{
		redirect('/admin/hoteis/lista');
	}
	
	function lista()
	{
		$this->load->library('pagination');
		$opt = array(
      				'_join' => array(
      					'hoteis_enderecos',
      					'enderecos',
      					'portal_cidades',
      					'portal_estados'
						)
					);
		$this->hoteis = $this->get('Hoteis_model', $this->setFiltros($this->checkOptions($opt)));
    	$per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));    														
    	$config['base_url'] = '/admin/hoteis/lista/pagina/';
    	$config['total_rows'] = count($this->get('Hoteis_model', $opt));
	  	$config['url_segment'] = intval($this->uri->segment(5));
	  	$config['uri_segment'] = 5;
	  	$config['per_page'] = !empty($per_page) ? $per_page : 20;
        
    	$this->pagination->initialize($config);
    	$this->metatags['title'] = "Lista de Hot&eacute;is - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    	$this->load->view('admin/hoteis_lista');
	}
	function exibir()
	{
		$this->setHotel();
       	if ($this->hotel != NULL && $this->hotel != FALSE) {
       		$this->dados_adicionais = $this->get('HoteisDadosadicionais_model', array(
                                                                                      'hda_idhotel' => $this->hotel->hot_id,
                                                                                      '_join' => array('dados_adicionais')
                                                                                    ));
                                                                                    
      		$this->dados_adicionais = $this->buscaDadosExibir();
      		$this->setDAExibicao(NULL, TRUE);
       		$_join2 = array('referencias');    																	
    		$this->referencias = $this->get('HoteisReferencias_model', array(
    																		'hre_idhotel' => $this->hotel->hot_id,
																			'_join' => $_join2
    																	));
    		$_join3 = array('contatos', 'departamentos');    																	
    		$this->hoteisContatos = $this->get('HoteisContatos_model', array(
    																		'hoc_idhotel' => $this->hotel->hot_id,
																			'_join' => $_join3
    																	));
    		$_join4 = array('imagens');    																	
    		$this->hoteisImagens = $this->get('HoteisImagens_model', array(
    																		'him_idhotel' => $this->hotel->hot_id,
																			'_join' => $_join4
    																	));
			$this->apartamentos = $this->get('Apartamentos_model', array(
																			'apa_idhotel' => $this->hotel->hot_id,
																			'_join' => array(
																	        'tipos_apartamentos',
																	        'hoteis',
																	        'categorias_apartamentos',
																	        'bloqueios',
																	        'hoteis_enderecos',
																	        'enderecos',
																	        'portal_cidades',
																	        'portal_estados'
																		   )
																		));
        																	
		
    		$this->metatags['title'] = $this->hotel->hot_nome." - Detalhes - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    		
    		$this->load->view('admin/hoteis_exibir');
    	}else{
    		redirect('/admin/hoteis/lista');
    	}
	}
	
	function editar()
	{
		$this->css_js->add('js', '/js/admin/da_apartamento.js', 'loadDAApartamento();');
		$this->setHotel();
       	if ($this->hotel != NULL && $this->hotel != FALSE) {
       		$this->dados_adicionais = $this->get('Dadosadicionais_model', array());
      		$dados_cadastrados = $this->get('HoteisDadosadicionais_model', array('hda_idhotel' => $this->hotel->hot_id));
      		$this->dados_adicionais = $this->buscaDadosEditar($dados_cadastrados);
			$_join2 = array('referencias');    																	
    		$this->referencias = $this->get('HoteisReferencias_model', array(
    																		'hre_idhotel' => $this->hotel->hot_id,
																			'_join' => $_join2
    																	));
    		$_join3 = array('contatos', 'departamentos');    																	
    		$this->hoteisContatos = $this->get('HoteisContatos_model', array(
    																		'hoc_idhotel' => $this->hotel->hot_id,
																			'_join' => $_join3
    																	));
    		$this->categorias = $this->get('Categorias_model', array(
    																		'sortBy' =>'cat_nivel',
																			'sortDirection' => 'ASC',
    																	));
    		$_join4 = array('imagens');    																	
    		$this->hoteisImagens = $this->get('HoteisImagens_model', array(
    																		'him_idhotel' => $this->hotel->hot_id,
																			'_join' => $_join4
    																	));
    		$this->estados = $this->get('PortalEstados_model', array());
    		$this->metatags['title'] = $this->hotel->hot_nome." - Detalhes - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    		$this->form_validation->set_rules('hot_nome', 'Nome do Hotel', 'required');
			if($this->input->post('hot_ativo')){
        			$ativo = 1;
      			}else{
        			$ativo = 0;
      			}
      		if ($this->form_validation->run()) {
    				$novo = clone $this->hotel;
    				$novo->hot_nome = $this->input->post('hot_nome');
  		  			$novo->hot_cnpj = $this->input->post('hot_cnpj');
  		  			$novo->hot_descricao = $this->input->post('hot_descricao');
   	 				$novo->hot_permalink = $this->input->post('hot_permalink');
   	 				$novo->hot_idcategoria = $this->input->post('hot_idcategoria');
   	 				$novo->hot_noshow = $this->input->post('hot_noshow');
   	 				$novo->hot_idadecrianca = $this->input->post('hot_idadecrianca');
   	 				$novo->hot_termosuso = $this->input->post('hot_termosuso');
   	 				$novo->hot_checkin = $this->input->post('hot_checkin');
   	 				$novo->hot_checkout = $this->input->post('hot_checkout');
   	 				$novo->hot_ativo = $ativo;
   	 				$novo_end = clone $this->endereco;
   	 				$novo_end->end_cep = $this->input->post('end_cep');
   	 				$novo_end->end_endereco = $this->input->post('end_endereco');
   	 				$novo_end->end_numero = $this->input->post('end_numero');
   	 				$novo_end->end_complemento = $this->input->post('end_complemento');
   	 				$novo_end->end_bairro = $this->input->post('end_bairro');
   	 				$novo_end->end_idcidade = $this->input->post('end_cidade');
   	 				$novo_end->end_latitude = $this->input->post('end_latitude');
   	 				$novo_end->end_longitude = $this->input->post('end_longitude');
   	 				$atualizar_endereco = $this->update('Enderecos_model', $novo_end, $this->endereco);
					$atualizar_hotel = $this->update('Hoteis_model', $novo, $this->hotel);
					$atualizar_da = $this->editarDadosAdicionais($this->hotel->hot_id);
					if($atualizar_hotel || $atualizar_endereco || $atualizar_da){
						$this->css_js->add("function", NULL, "alert('Dados do Hotel atualizados com sucesso!');");
						$this->hotel = $novo;
					} else {
            			$this->css_js->add("function", NULL, "alert('Nenhum dado salvo!');");
            		}
			}
			$this->css_js->add("function", NULL, "carregaCidade(".$this->endereco->id_estado.", ".$this->endereco->id_cidade.")");
			$this->setDAExibicao();
			$this->load->view('/admin/hoteis_editar');
			
       	}else{
    		redirect('/admin/hoteis/lista');
    	}
	}
	
	public function inserir () 
	{
		$this->css_js->add('js', '/js/admin/da_apartamento.js', 'loadDAApartamento();');
	  	$this->dados_adicionais = $this->get('Dadosadicionais_model', array());
	  	$this->dados_adicionais = $this->buscaDadosInserir();
	  	$this->setDAExibicao();
    	$_join = array('portal_cidades','portal_estados');
    	$this->categorias = $this->get('Categorias_model', array());
    	$this->form_validation->set_rules('hot_nome', 'Nome do Hotel', 'required');
		$this->form_validation->set_rules('hot_cnpj', 'CNPJ', 'required');
		$this->form_validation->set_rules('hot_idcategoria', 'Categoria', 'required');
		$this->form_validation->set_rules('hot_noshow', 'No Show', 'required');
		$this->form_validation->set_rules('hot_idadecrianca', 'Idade Crian&ccedil;a', 'required');
		$this->form_validation->set_rules('hot_checkin', 'Checkin', 'required');
		$this->form_validation->set_rules('hot_checkout', 'Checkout', 'required');
		//$this->form_validation->set_rules('met_title', 'Meta Title', 'required');
		$this->form_validation->set_rules('end_cep', 'CEP', 'required');
		$this->form_validation->set_rules('end_cidade', 'Cidade', 'required');
    	$this->form_validation->set_rules('end_endereco', 'Endere&ccedil;o', 'required');
		$this->form_validation->set_rules('end_numero', 'N&uacute;mero', 'required');
		$this->form_validation->set_rules('end_bairro', 'Bairro', 'required');
		$permalink = str_replace(' ','_',strtolower($this->input->post('hot_nome')));
		$ok = TRUE;
		if ($this->get('Hoteis_model', array('hot_permalink' => $permalink))){
			$this->css_js->add("function", NULL, "alert('Permalink já existe!!');");
			$ok = FALSE;
      	}
      	if ($ok){
			if($this->form_validation->run()) {
				$ativo = ($this->input->post('hot_ativo') == FALSE ? 0 : 1);
				$adicionar_metatags = $this->insert('metatags_model', array(
										'met_title' => $this->input->post('met_title'),
										'met_description' => $this->input->post('met_description'),
										'met_keywords' => $this->input->post('met_keywords')
									));
				$adicionar_hotel = $this->insert('Hoteis_model', array(
	      								'hot_dthcadastro' => date('Y-m-d H:i:s'),
	      								'hot_dthatualizacao' => date('Y-m-d H:i:s'),
	      								'hot_nome' => (string)$this->input->post('hot_nome'),
										'hot_cnpj' => (string)$this->input->post('hot_cnpj'),
	      								'hot_idcategoria' => intval($this->input->post('hot_idcategoria')),
	      								'hot_descricao' => (string)$this->input->post('hot_descricao'),
	      								'hot_permalink' => (string)$permalink,
	      								'hot_idmetatag' => ($adicionar_metatags == FALSE ? NULL : $adicionar_metatags),
	      								'hot_noshow' => intval($this->input->post('hot_noshow')),
	      								'hot_idadecrianca' => intval($this->input->post('hot_idadecrianca')),
	      								'hot_termosuso' => (string)$this->input->post('hot_termosuso'),
	      								'hot_checkin' => (string)$this->input->post('hot_checkin'),
	      								'hot_checkout' => (string)$this->input->post('hot_checkout'),
	      								'hot_ativo' => intval($ativo)
	      							));
				if($adicionar_hotel){
					$tag[1] = $this->RemoveAcentos($this->input->post('hot_nome'));
					$tag[2] = $this->input->post('hot_nome');
					for($i=1; $i <= 2; $i++){
						$adicionar_tags = $this->insert('Hoteistags_model', array(
							'htg_idhotel' => intval($adicionar_hotel),
							'htg_nome' => (string)$tag[$i]
						));
					} 
	        		$adicionar_endereco = $this->insert('Enderecos_model', array(
										'end_idcidade' => intval($this->input->post('end_cidade')),
										'end_endereco' => (string)$this->input->post('end_endereco'),
										'end_numero' => (string)$this->input->post('end_numero'),
										'end_complemento' => (string)$this->input->post('end_complemento'),
										'end_bairro' => (string)$this->input->post('end_bairro'),
										'end_cep' => (string)$this->input->post('end_cep'),
										'end_latitude' => (string)$this->input->post('end_latitude'),
										'end_longitude' => (string)$this->input->post('end_longitude')
									));
					if($adicionar_endereco){
	          			$adicionar_hoteisEnderecos = $this->insert('HoteisEnderecos_model', array(
										'hen_idhotel' => intval($adicionar_hotel),
										'hen_idendereco' => intval($adicionar_endereco)
									));
	        		}
				}
	      		if ($adicionar_hotel) 
	      		{
	      			$this->adicionarDadosAdicionais($adicionar_hotel);
	        		$this->session->set_userdata('msg', 'Hotel adicionado com sucesso!');
	      		} else {
	        		$this->session->set_userdata('msg', 'Erro ao adicionar Hotel!');
	      		}
		      redirect('/admin/hoteis/lista');
			}
      	}
	$this->metatags['title'] = "Inserir Hotel - Administra&ccedil;&atilde;o Reserva de Hotel Online";
	$this->load->view('/admin/hoteis_inserir');
	}
	
	private function setHotel () {
    	$hot_id = intval($this->uri->segment(4));
      
    	if ($hot_id > 0) {
    		$this->hotel = $this->get('Hoteis_model', array(
                                                        'hot_id' => $hot_id,
                                                        '_join' => array(
                                                        	'hoteis_enderecos',
      														'enderecos',
      														'portal_cidades',
      														'portal_estados',
    														'categorias')
                                                        ));
    		$this->endereco = $this->get('HoteisEnderecos_model', array(
                                                        'hen_idhotel' => $hot_id
                                                        ));
    		}
    	if (!$this->auth_acl->hasAuth('superadmin')) {
      		if (!in_array($this->hotel->hot_id, $this->hoteis_acesso)) {
        		redirect('/admin/hoteis/lista');
      		}
    	}
  	}
	
	private function checkOptions ($opt) {
        if (!$this->auth_acl->hasAuth('superadmin')) {
      		$opt['hot_id_in'] = $this->hoteis_acesso;
    	} 
    	return $opt;
  	}
	
  	private function buscaDadosInserir ($pai = NULL) {
    $r = array();
    for ($i = 0, $s = count($this->dados_adicionais); $i < $s; $i++) {
      if ($this->dados_adicionais[$i]->dad_pai == $pai) {
        $r[] = $this->dados_adicionais[$i];
        array_splice($this->dados_adicionais, $i, 1);
        $i--;
        $s--;
      }
    }
    for ($i = 0, $s = count($r); $i < $s; $i++) {
      if ($r[$i]->dad_has_lista) {
        $r[$i]->childs = $this->buscaDadosInserir($r[$i]->dad_id);
      } else {
        $r[$i]->childs = array();
      }
    }
    return $r;
  }
  
  private function buscaDadosExibir ($pai = NULL) {
    $r = array();
    for ($i = 0, $s = count($this->dados_adicionais); $i < $s; $i++) {
      if ($this->dados_adicionais[$i]->dad_pai == $pai) {
        $r[] = $this->dados_adicionais[$i];
        array_splice($this->dados_adicionais, $i, 1);
        $i--;
        $s--;
      }
    }
    for ($i = 0, $s = count($r); $i < $s; $i++) {
      if ($r[$i]->dad_has_lista) {
        $r[$i]->childs = $this->buscaDadosExibir($r[$i]->dad_id);
      } else {
        $r[$i]->childs = array();
      }
    }
    return $r;
  }
  
  private function buscaDadosEditar ($dados_cadastrados, $pai = NULL) {
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
        $r[$i]->childs = $this->buscaDadosEditar($dados_cadastrados, $r[$i]->dad_id);
      } else {
        $r[$i]->childs = array();
      }
    }
    return $r;
  }
  
  private function setDAExibicao ($dados = NULL, $disable = FALSE) {
    $first = empty($dados) ? TRUE : FALSE;
    $dados = !empty($dados) ? $dados : $this->dados_adicionais;
    $this->da_exibicao = !empty($this->da_exibicao) ? $this->da_exibicao : '';
    for ($i = 0, $s = count($dados); $i < $s; $i++) {
      $this->da_exibicao .= "<div class=\"item contemfloat" . (($i == 0) ? " top" : "") . "\" id=\"item_" . $dados[$i]->dad_id . "\">";
      $this->da_exibicao .= "<div class=\"contemfloat " . (($first) ? "first" : "") . "\">";
      $this->da_exibicao .= "<p>";
      if (!$first) {
        $this->da_exibicao .= "<input type=\"checkbox\" name=\"item_" . $dados[$i]->dad_id . "_check\" id=\"item_" . $dados[$i]->dad_id . "_check\" value=\"1\" class=\"check_bool\" " . ((isset($dados[$i]->hda_iddadoadcional)) ? " checked=\"checked\"" : "") . " " . ($disable ? "disabled=\"disabled\"" : "") . " />";
      }
      $this->da_exibicao .= $dados[$i]->dad_campo . "</p>";
      if ($dados[$i]->dad_has_bool) {
        $this->da_exibicao .= "<div class=\"item_bool\">"; 
        $this->da_exibicao .= "<input type=\"radio\" name=\"item_" . $dados[$i]->dad_id . "_bool\" id=\"item_" . $dados[$i]->dad_id . "_bool_s\" value=\"1\" class=\"radio_bool\" " . (($dados[$i]->dad_has_bool && isset($dados[$i]->hda_bool)) ? (($dados[$i]->hda_bool == 1) ? " checked=\"checked\"": "") : "") . " " . ($disable ? "disabled=\"disabled\"" : "") . " /> Sim";
        $this->da_exibicao .= "<input type=\"radio\" name=\"item_" . $dados[$i]->dad_id . "_bool\" id=\"item_" . $dados[$i]->dad_id . "_bool_n\" value=\"0\" class=\"radio_bool\" " . (($dados[$i]->dad_has_bool && isset($dados[$i]->hda_bool)) ? (($dados[$i]->hda_bool != 1) ? " checked=\"checked\"": "") : "") . " " . ($disable ? "disabled=\"disabled\"" : "") . " /> Não";
        $this->da_exibicao .= "</div>";
      }
      $campos = FALSE;
      if ($dados[$i]->dad_has_qtde) {
        if (!$campos) {
          $campos = TRUE;
          $this->da_exibicao .= "<div class=\"campos_extra " . ((!isset($dados[$i]->hda_qtde) && !isset($dados[$i]->hda_valor) && !isset($dados[$i]->hda_desc)) ? "inativo" : "") . "\">";
        }
        $this->da_exibicao .= "<div class=\"item_qtde\">";
        $this->da_exibicao .= "<label for=\"item_" . $dados[$i]->dad_id . "_qtde\">Quantidade:</label> <input type=\"text\" name=\"item_" . $dados[$i]->dad_id . "_qtde\" value=\"" . (($dados[$i]->dad_has_qtde && isset($dados[$i]->hda_qtde)) ? ((!empty($dados[$i]->hda_qtde)) ? $dados[$i]->hda_qtde : "") : "") . "\" " . ($disable ? "disabled=\"disabled\"" : "") . " />";
        $this->da_exibicao .= "</div>";
      }
      if ($dados[$i]->dad_has_valor) {
        if (!$campos) {
          $campos = TRUE;
          $this->da_exibicao .= "<div class=\"campos_extra " . ((!isset($dados[$i]->hda_qtde) && !isset($dados[$i]->hda_valor) && !isset($dados[$i]->hda_desc)) ? "inativo" : "") . "\">";
        }
        $this->da_exibicao .= "<div class=\"item_valor\">";
        $this->da_exibicao .= "<label for=\"item_" . $dados[$i]->dad_id . "_valor\">Valor:</label> <input type=\"text\" name=\"item_" . $dados[$i]->dad_id . "_valor\" value=\"" . (($dados[$i]->dad_has_valor && isset($dados[$i]->hda_valor)) ? ((!empty($dados[$i]->hda_valor)) ? $dados[$i]->hda_valor : "") : "") . "\"  " . ($disable ? "disabled=\"disabled\"" : "") . " />";
        $this->da_exibicao .= "</div>";
      }
      if ($dados[$i]->dad_has_desc) {
        if (!$campos) {
          $campos = TRUE;
          $this->da_exibicao .= "<div class=\"campos_extra " . ((!isset($dados[$i]->hda_qtde) && !isset($dados[$i]->hda_valor) && !isset($dados[$i]->hda_desc)) ? "inativo" : "") . "\">";
        }
        $this->da_exibicao .= "<div class=\"item_desc\">";
        $this->da_exibicao .= "<label for=\"item_" . $dados[$i]->dad_id . "_desc\">Descrição:</label> <textarea name=\"item_" . $dados[$i]->dad_id . "_desc\" " . ($disable ? "disabled=\"disabled\"" : "") . " >" . (($dados[$i]->dad_has_desc && isset($dados[$i]->hda_desc)) ? ((!empty($dados[$i]->hda_desc)) ? $dados[$i]->hda_desc : "") : "") . "</textarea>";
        $this->da_exibicao .= "</div>";
      }
      if ($campos) {
        $this->da_exibicao .= "</div>";
      }
      $this->da_exibicao .= "</div>";
      if (!empty($dados[$i]->childs)) {
        $this->da_exibicao .= "<div class=\"childs " . (isset($dados[$i]->hda_lista) ? ((count($dados[$i]->hda_lista) <= 0) ? "inativo" : "") : "inativo") . "\">";
        $this->setDAExibicao($dados[$i]->childs, $disable);
        $this->da_exibicao .= "</div>";
      }
      $this->da_exibicao .= "</div>";
    }
  }
  
  private function adicionarDadosAdicionais ($hot_id, $dados = NULL) {
    $r = '';
    $dados = !empty($dados) ? $dados : $this->dados_adicionais;
    for ($i = 0, $s = count ($dados); $i < $s; $i++) {
      $opt = array();
      $post = $this->input->post('item_' . $dados[$i]->dad_id . '_bool');
      if (empty($post)) {
        $post = $this->input->post('item_' . $dados[$i]->dad_id . '_check');
      }
      if (!empty($post)) {
        $opt = array(
            'hda_iddadoadcional' => $dados[$i]->dad_id,
            'hda_idhotel' => $hot_id,
            'hda_bool' => 1,
        );
        if ($dados[$i]->dad_has_qtde) {
          $qtde = $this->input->post('item_' . $dados[$i]->dad_id . '_qtde');
          if (!empty($qtde)) {
            $opt['hda_qtde'] = $qtde;
          }
        }
        if ($dados[$i]->dad_has_valor) {
          $valor = $this->input->post('item_' . $dados[$i]->dad_id . '_valor');
          if (!empty($valor)) {
            $opt['hda_valor'] = $valor;
          }
        }
        if ($dados[$i]->dad_has_desc) {
          $desc = $this->input->post('item_' . $dados[$i]->dad_id . '_desc');
          if (!empty($desc)) {
            $opt['hda_desc'] = $desc;
          }
        }
        if ($dados[$i]->dad_has_lista) {
          $list = $this->adicionarDadosAdicionais($hot_id, $dados[$i]->childs);
          if (!empty($list)) {
            $opt['hda_lista'] = $list;
          }
        }
      } else if ($dados[$i]->dad_pai == NULL) {
        $opt = array(
            'hda_iddadoadcional' => $dados[$i]->dad_id,
            'hda_idhotel' => $hot_id,
            'hda_bool' => 0,
        );
      }
      if (!empty($opt)) {
        if ($r != '') {
          $r .= ',';
        }
        $add = $this->insert('HoteisDadosadicionais_model', $opt);
        $r .= substr($add, 0, strpos($add,','));
      }
    }
    return $r;
  }
  
  private function editarDadosAdicionais ($hot_id, $dados = NULL) {
    $r = '';
    $dados = !empty($dados) ? $dados : $this->dados_adicionais;
    for ($i = 0, $s = count ($dados); $i < $s; $i++) {
      $child_update = FALSE;
      $antigo = $dados[$i];
      $novo = clone $antigo;
      $opt = array();
      if ($antigo->dad_has_lista && isset($antigo->hda_lista)) {
        if (!empty($antigo->hda_lista)) {
          $hda_lista = '';
          for ($j = 0, $c = count($antigo->hda_lista); $j < $c; $j++) {
            if ($hda_lista != '') {
              $hda_lista .= ',';
            }
            $hda_lista .= $antigo->hda_lista[$j];
          }
          $antigo->hda_lista = $hda_lista;
          unset($hda_lista);
        } else {
          $antigo->hda_lista = NULL;
        }
      }
      $post = $this->input->post('item_' . $antigo->dad_id . '_bool');
      if (empty($post)) {
        $post = $this->input->post('item_' . $antigo->dad_id . '_check');
      }
      if (!empty($post)) {
        $novo->hda_iddadoadcional = $antigo->dad_id;
        $novo->hda_idhotel = $hot_id;
        $novo->hda_bool = 1;
        if ($antigo->dad_has_qtde) {
          $qtde = $this->input->post('item_' . $antigo->dad_id . '_qtde');
          if (!empty($qtde)) {
            $novo->hda_qtde = $qtde;
          } else {
            $novo->hda_qtde = NULL;
          }
        }
        if ($antigo->dad_has_valor) {
          $valor = $this->input->post('item_' . $antigo->dad_id . '_valor');
          if (!empty($valor)) {
            $novo->hda_valor = $valor;
          } else {
            $novo->hda_valor = NULL;
          }
        }
        if ($antigo->dad_has_desc) {
          $desc = $this->input->post('item_' . $antigo->dad_id . '_desc');
          if (!empty($desc)) {
            $novo->hda_desc = $desc;
          } else {
            $novo->hda_desc = NULL;
          }
        }
        if ($antigo->dad_has_lista) {
          $list = $this->editarDadosAdicionais($hot_id, $antigo->childs); 
          if (!empty($list)) {
            $novo->hda_lista = $list;
            $child_update = TRUE;
          } else {
            $novo->hda_lista = NULL;
          }
        } else {
          $novo->hda_lista = NULL;
        }
      } else if ($antigo->dad_pai == NULL) {
        $novo->hda_iddadoadcional = $antigo->dad_id;
        $novo->hda_idhotel = $hot_id;
        $novo->hda_bool = 0;
        $novo->hda_qtde = NULL;
        $novo->hda_valor = NULL;
        $novo->hda_desc = NULL;
        $novo->hda_lista = NULL;
        if (!empty($antigo->childs)) {
          $this->excluirDadosAdicionais($antigo->childs);
        }
      } else {
        $novo->ada_lista = NULL;
      }
      if (!empty($antigo->hda_iddadoadcional)) {
        if (count($this->objDiff($antigo, $novo)) > 0) {
          if($this->update('HoteisDadosadicionais_model', $novo, $antigo)) {
            if ($r != '') {
              $r .= ',';
            }
            $r .= $novo->hda_iddadoadcional;
          }
        }
      } else if (!empty($novo->hda_iddadoadcional)) {
        if ($r != '') {
          $r .= ',';
        }
        $add = $this->insert('HoteisDadosadicionais_model', get_object_vars($novo));
        $r .= substr($add, 0, strpos($add,','));
      } else if ($child_update) {
        if ($r != '') {
          $r .= ',';
        }
        $r .= $novo->hda_iddadoadcional;
      }
    }
    return $r;
  }
  
  private function excluirDadosAdicionais ($dados = NULL) {
    $dados = !empty($dados) ? $dados : $this->dados_adicionais;
    for ($i = 0, $s = count ($dados); $i < $s; $i++) {
      if (!empty($dados[$i]->childs)) {
        $this->excluirDadosAdicionais($dados[$i]->childs);
      }
      if (!empty($dados[$i]->ada_idapartamento) && !empty($dados[$i]->ada_iddadoadcional)) {
        $this->delete('HoteisDadosadicionais_model', array('ada_idhotel' => $dados[$i]->hda_idhotel, 'hda_iddadoadcional' => $dados[$i]->hda_iddadoadcional));
      }
    }
  }
}

/* End of file hoteis_lista.php */
/* Location: ./system/application/controllers/admin/hoteis_lista.php */