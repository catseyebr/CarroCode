<?php
class Bloqueios extends MyController {
  
  public function Bloqueios () {
		parent::__construct('Admin');
      $this->estados    = $this->get('PortalEstados_model', array());
      $this->categorias = $this->get('CategoriasApartamentos_model', array());            
	}
	
	public function index () {
    redirect('/admin/bloqueios/lista');
  }
	
	public function lista () {
	  $this->load->library('pagination');
    
    $apa_id = 0;
    $hot_id = 0;
    $url_segment = intval($this->uri->segment(5));
    $base_url = '/admin/bloqueios/lista/pagina/';
    $uri_segment = 5;
    
    $seg = $this->uri->segment(4);
    if ($seg == 'id_hotel' || $seg == 'id_apartamento') {
      if ($this->auth_acl->hasAuth('superadmin')) {
        $url_segment = intval($this->uri->segment(7));
        $uri_segment = 7;
        $id = intval($this->uri->segment(5));
        $base_url = '/admin/apartamentos/lista/' . $seg . '/' . $id . '/pagina/';
      } else if ($seg == 'id_hotel' && in_array($id, $this->hoteis_acesso)) {
        $url_segment = intval($this->uri->segment(7));
        $uri_segment = 7;
        $id = intval($this->uri->segment(5));
        $base_url = '/admin/apartamentos/lista/' . $seg . '/' . $id . '/pagina/';
      } else {
        $apartamentos_acesso = array();
        $apa = $this->get('Apartamentos_model', array('hot_id_in' => $this->hoteis_acesso));
        for ($i = 0, $s = count($apa); $i < $s; $i++) {
          $apartamentos_acesso[] = $apa[$i]->apa_id;
        }
        if (in_array($id, $apartamentos_acesso)) {
          $url_segment = intval($this->uri->segment(7));
          $uri_segment = 7;
          $id = intval($this->uri->segment(5));
          $base_url = '/admin/apartamentos/lista/' . $seg . '/' . $id . '/pagina/';
        } else {
          redirect('/admin/bloqueios/lista');
        }
        unset($apartamentos_acesso);
      }
      
      if ($seg == 'id_hotel') {
        $hot_id = $id;
      } else {
        $apa_id = $id;
      }
      unset($id);
    }
    unset($seg);
    
    $opt = array(
      '_join' => array(
          'bloqueios_categorias',
          'apartamentos',
          'tipos_apartamentos',
          'hoteis'
      )
    );
    
    $this->bloqueios = $this->get('Bloqueios_model', $this->setFiltros($this->checkOptions($hot_id, $apa_id, $opt)));
    $this->setFiltros($this->checkOptions($hot_id, $apa_id, $opt));
    
    $per_page = (intval($this->input->post('per_page')) > 0) ? intval($this->input->post('per_page')) : intval($this->session->userdata('per_page'));
    $config['base_url'] = $base_url;
		$config['total_rows'] = count($this->get('Bloqueios_model', $opt));
		$config['url_segment'] = $url_segment;
		$config['uri_segment'] = $uri_segment;
		$config['per_page'] = !empty($per_page) ? $per_page : 20;
		$this->pagination->initialize($config);
    
    $this->metatags['title'] = "Lista de Bloqueios - Administra&ccedil;&atilde;o Reserva de Hotel Online";
    
    $this->load->view('admin/bloqueios_lista');
	}
	
	public function exibir () {
    $this->setBloqueio();
    
    if ($this->bloqueio != NULL && $this->bloqueio != FALSE) {
      $this->metatags['title'] = "Detalhes do Bloqueio - Administra&ccedil;&atilde;o Reserva de Hotel Online";
      
      $this->load->view('admin/bloqueios_exibir');
    } else {
      redirect('/admin/bloqueios/lista');
    }
	}
	
	public function inserir () {
    $this->categorias = $this->get('BloqueiosCategorias_model', array());
    $this->categorias_apa = $this->get('CategoriasApartamentos_model', array());
    
	  $adicionar_bloqueio = NULL;
    if($this->input->post('apa_id') != FALSE) {
      $this->form_validation->set_rules('apa_id', 'apa_id', 'required');
    } else {
      $this->form_validation->set_rules('hot_nome', 'Hotel', 'required');
  		$this->form_validation->set_rules('apa_idcategoria', 'Categoria', 'required');
  		$this->form_validation->set_rules('tap_nome', 'Tipo de Apartamento', 'required');
    }
    $this->form_validation->set_rules('blo_idcategoria', 'Categoria de Bloqueio', 'required');
		$this->form_validation->set_rules('blo_vigenciaini', 'Data de início', 'required');
		$this->form_validation->set_rules('blo_vigenciafim', 'Data de término', 'required');
		$this->form_validation->set_rules('blo_tarifa', 'Tarifa Base', 'required');
		$this->form_validation->set_rules('blo_tarifafinal', 'Tarifa Final', 'required');
		$this->form_validation->set_rules('blo_taxaservico', 'Taxa de Serviço', 'required');
		$this->form_validation->set_rules('blo_iss', 'ISS', 'required');
		$this->form_validation->set_rules('blo_taxaturismo', 'Taxa Turismo', 'required');
		$this->form_validation->set_rules('blo_qtdebloqueios', 'Qtde de bloqueios', 'required');
		$this->form_validation->set_rules('blo_deadline', 'Deadline', 'required');
    
		if($this->form_validation->run()) {
		  if($this->input->post('apa_id') != FALSE) {
		    $apa = $this->get('Apartamentos_model', array('apa_id' => intval($this->input->post('apa_id')), '_join' => array('hoteis')));
		  } else {
  		  $hot_id = $this->getIdHotelByNomeHotel($this->input->post('hot_nome'));
        $tap_id = $this->getIdTipoApartamentoByNomeTipoApartamento($this->input->post('tap_nome'));
        $apa = $this->get('Apartamentos_model', array('apa_idtipo' => $tap_id,
                                                      'apa_idhotel' => $hot_id,
                                                      'apa_idcategoria' => intval($this->input->post('apa_idcategoria')),
                                                      '_join' => array('hoteis')
                                                ));
        if (!is_object($apa)) {
          if (is_array($apa)) {
            if (count($apa) == 1) {
              $apa = $apa[0];
            } else {
              $apa = NULL;
            }
          } else {
            $apa = NULL;
          }
        }
      }
      
  		if (!empty($apa)) {
        if ($this->auth_acl->hasAuth('superadmin')) {
          $adicionar_bloqueio = $this->insert('Bloqueios_model', array(
    			                                   'blo_idapartamento' => $apa->apa_id,
    			                                   'blo_idcategoria' => intval($this->input->post('blo_idcategoria')),
    			                                   'blo_vigenciaini' => preg_replace('/(.{2})\/(.{2})\/(.{4}).*/i', '$3-$2-$1', $this->input->post('blo_vigenciaini')),
    			                                   'blo_vigenciafim' => preg_replace('/(.{2})\/(.{2})\/(.{4}).*/i', '$3-$2-$1', $this->input->post('blo_vigenciafim')),
    			                                   'blo_tarifa' => number_format((float) $this->input->post('blo_tarifa')),
    			                                   'blo_tarifafinal' => number_format((float) $this->input->post('blo_tarifafinal'), 2, '.', ''),
    			                                   'blo_taxaservico' => number_format((float) $this->input->post('blo_taxaservico'), 2, '.', ''),
    			                                   'blo_iss' => number_format((float)$this->input->post('iss'), 2, '.', ''),
    			                                   'blo_taxaturismo' => number_format((float) $this->input->post('blo_taxaservico'), 2, '.', ''),
    			                                   'blo_qtde_bloqueios' => intval($this->input->post('blo_qtdebloqueios')),
    			                                   'blo_deadline' => (string) intval($this->input->post('blo_deadline')),
    																		));
  			} else if (in_array($apa->apa_idhotel, $this->hoteis_acesso)) {
    			$adicionar_bloqueio = $this->insert('Bloqueios_model', array(
    			                                   'blo_idapartamento' => $apa->apa_id,
    			                                   'blo_idcategoria' => intval($this->input->post('blo_idcategoria')),
    			                                   'blo_vigenciaini' => preg_replace('/(.{2})\/(.{2})\/(.{4}).*/i', '$3-$2-$1', $this->input->post('blo_vigenciaini')),
    			                                   'blo_vigenciafim' => preg_replace('/(.{2})\/(.{2})\/(.{4}).*/i', '$3-$2-$1', $this->input->post('blo_vigenciafim')),
    			                                   'blo_tarifa' => number_format((float) $this->input->post('blo_tarifa')),
    			                                   'blo_tarifafinal' => NULL,
    			                                   'blo_taxaservico' => number_format((float) $this->input->post('blo_taxaservico'), 2, '.', ''),
    			                                   'blo_iss' => number_format((float)$this->input->post('iss'), 2, '.', ''),
    			                                   'blo_taxaturismo' => number_format((float) $this->input->post('blo_taxaservico'), 2, '.', ''),
    			                                   'blo_qtde_bloqueios' => intval($this->input->post('blo_qtdebloqueios')),
    			                                   'blo_deadline' => (string) intval($this->input->post('blo_deadline')),
    																		));
        }
      }
			
      if ($adicionar_bloqueio) {
        $this->session->set_userdata('msg', 'Bloqueio adicionado com sucesso!');
      } else {
        $this->session->set_userdata('msg', 'Erro ao adicionar bloqueio!');
      }
      
      redirect('/admin/bloqueios/lista');
		}
		
		$this->metatags['title'] = "Inserir Bloqueio - Administra&ccedil;&atilde;o Reserva de Hotel Online";
		
		$this->load->view('admin/bloqueios_inserir');
	}
	
	function editar () {
    $this->categorias = $this->get('BloqueiosCategorias_model', array());
    $this->setBloqueio();
    
    if ($this->bloqueio != NULL && $this->bloqueio != FALSE) {
      
      $this->form_validation->set_rules('blo_idcategoria', 'Categoria de Bloqueio', 'required');
  		$this->form_validation->set_rules('blo_vigenciaini', 'Data de início', 'required');
  		$this->form_validation->set_rules('blo_vigenciafim', 'Data de término', 'required');
  		$this->form_validation->set_rules('blo_tarifa', 'Tarifa Base', 'required');
  		$this->form_validation->set_rules('blo_tarifafinal', 'Tarifa Final', 'required');
  		$this->form_validation->set_rules('blo_taxaservico', 'Taxa de Serviço', 'required');
  		$this->form_validation->set_rules('blo_iss', 'ISS', 'required');
  		$this->form_validation->set_rules('blo_taxaturismo', 'Taxa Turismo', 'required');
  		$this->form_validation->set_rules('blo_qtde_bloqueios', 'Qtde de bloqueios', 'required');
  		$this->form_validation->set_rules('blo_deadline', 'Deadline', 'required');
      
      if ($this->form_validation->run()) {
  		  $novo = clone $this->bloqueio;
  		  
		    if ($this->auth_acl->hasAuth('superadmin')) {
  		    $novo->blo_vigenciaini   = preg_replace('/(.{2})\/(.{2})\/(.{4})/i', '$3-$2-$1',$this->input->post('blo_vigenciaini'));
  		    $novo->blo_vigenciafim   = preg_replace('/(.{2})\/(.{2})\/(.{4})/i', '$3-$2-$1',$this->input->post('blo_vigenciafim'));
  		    $novo->blo_tarifa        = (float) $this->input->post('blo_tarifa');
  		    $novo->blo_tarifafinal   = (float) $this->input->post('blo_tarifafinal');
  		    $novo->blo_taxaservico   = (float) $this->input->post('blo_taxaservico');
  		    $novo->blo_iss           = (float) $this->input->post('blo_iss');
  		    $novo->blo_taxaturismo   = (float) $this->input->post('blo_taxaturismo');
  		    $novo->blo_qtdebloqueios = intval($this->input->post('blo_qtdebloqueios'));
  		    $novo->blo_deadline      = (string) intval($this->input->post('blo_deadline'));
    		  
          if ($this->update('Bloqueios_model', $novo, $this->bloqueio)) {
            $this->css_js->add("function", NULL, "alert('Apartamento atualizado com sucesso!');");
          } else {
            $this->css_js->add("function", NULL, "alert('Erro ao editar apartamento!');");
          }
        } else if (in_array($this->bloqueio->hot_id, $this->hoteis_acesso)) {
  		    $novo->blo_vigenciaini   = preg_replace('/(.{2})\/(.{2})\/(.{4})/i', '$3-$2-$1',$this->input->post('blo_vigenciaini'));
  		    $novo->blo_vigenciafim   = preg_replace('/(.{2})\/(.{2})\/(.{4})/i', '$3-$2-$1',$this->input->post('blo_vigenciafim'));
  		    $novo->blo_tarifa        = (float) $this->input->post('blo_tarifa');
  		    $novo->blo_tarifafinal   = (float) $this->input->post('blo_tarifafinal');
  		    $novo->blo_taxaservico   = (float) $this->input->post('blo_taxaservico');
  		    $novo->blo_iss           = (float) $this->input->post('blo_iss');
  		    $novo->blo_taxaturismo   = (float) $this->input->post('blo_taxaturismo');
  		    $novo->blo_qtdebloqueios = intval($this->input->post('blo_qtdebloqueios'));
  		    $novo->blo_deadline      = (string) intval($this->input->post('blo_deadline'));
    		  
          if ($this->update('Bloqueios_model', $novo, $this->bloqueio)) {
            $this->css_js->add("function", NULL, "alert('Apartamento atualizado com sucesso!');");
          } else {
            $this->css_js->add("function", NULL, "alert('Erro ao editar apartamento!');");
          }
        } else {
          $this->css_js->add("function", NULL, "alert('Erro ao editar apartamento!');");
        }
        
        $this->bloqueio = $novo;
  		}
      
      $this->metatags['title'] = "Editar Bloqueio - Administra&ccedil;&atilde;o Reserva de Hotel Online";
      $this->load->view('admin/bloqueios_editar');
    
    } else {
      redirect('/admin/bloqueios/lista');
    }
	}
	
	public function excluir () {
	  $this->setBloqueio();
	  
    if ($this->bloqueio != NULL && $this->bloqueio != FALSE) {      
      if ($this->delete('Bloqueios_model', array('blo_id' => $this->bloqueio->blo_id)) != '') {
        $this->session->set_userdata('msg', 'Bloqueio excluído com sucesso!');
      } else {
        $this->session->set_userdata('msg', 'Erro ao excluir bloqueio!');
      }
    }
    
    redirect('admin/bloqueios/lista');
	}
	
  private function setBloqueio () {
    $blo_id = intval($this->uri->segment(4));
      
    if ($blo_id > 0) {
      $this->bloqueio = $this->get('Bloqueios_model', array(
                                                        'blo_id' => $blo_id,
                                                        '_join' => array(
                                                                      'bloqueios_categorias',
                                                                      'apartamentos',
                                                                      'tipos_apartamentos',
                                                                      'hoteis'
                                                                    )
                                                        ));
    }
    
    if (!$this->auth_acl->hasAuth('superadmin')) {
      if (!in_array($this->bloqueio->hot_id, $this->hoteis_acesso)) {
        redirect('/admin/bloqueios/lista');
      }
    }
  }
  
  private function checkOptions ($apa_id, $hot_id, $opt) {
    if (isset($opt['_join'])) {
      $_join = $opt['_join'];
      unset($opt['_join']);
    } else {
      $_join = array();
    } 
    
    if ($apa_id > 0) {
      $opt['apa_id'] = $hot_id;
      if (!in_array('apartamentos', $_join)) {
        $_join[] = 'apartamentos';
      }
    } else if ($hot_id > 0) {
      $opt['hot_id'] = $hot_id;
      if (!in_array('apartamentos', $_join)) {
        $_join[] = 'apartamentos';
      }
      if (!in_array('hoteis', $_join)) {
        $_join[] = 'hoteis';
      }
    } else if (!$this->auth_acl->hasAuth('superadmin')) {
      $opt['hot_id_in'] = $this->hoteis_acesso;
      if (!in_array('apartamentos', $_join)) {
        $_join[] = 'apartamentos';
      }
      if (!in_array('hoteis', $_join)) {
        $_join[] = 'hoteis';
      }
    }
    
    if (!empty($_join)) {
      $opt['_join'] = $_join;
    }
    
    return $opt;
  }
}

/* End of file bloqueios.php */
/* Location: ./system/application/controllers/admin/bloqueios.php */