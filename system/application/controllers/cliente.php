<?php

class Cliente extends MyController {
	public $cliente;
	public $cliente_editar;
	public $senha;
	public $estados;
	public $usuario_verificar;
  public $email;
	public $cpf;
	protected $cliente_user;
	protected $cliente_pass;
	
	public function Cliente () { 
		parent::__construct();
    $this->css_js->add('js', '/js/cidades.js', 'loadCidade()');
    $this->css_js->add('js', '/js/validator.js');
		$this->css_js->add('js', '/js/cliente.js', 'loadCliente();');  
    $this->css_js->add('js', '/js/formatacao.js');
    $this->load->library('encrypt');
    if (!empty($this->usuario->usu_id)) {
      $this->cliente = $this->get('Clientes_model', array(
                                    'cli_idusuario' => $this->usuario->usu_id,
                                    '_join' => array('usuarios','clientes_enderecos','enderecos',
                                    'portal_cidades','portal_estados','usuarios_telefone','telefones') 
                                   ));
    }
    $this->estados = $this->get('PortalEstados_model', array());  	
  }
  
  public function Index () {  
  }
	
	public function exibir () {
    if (!empty ($this->usuario->usu_id))  {
      $this->metatags['title'] = "Minha Conta - Reserva de Hotel Online";
      $this->load->view('cliente_exibir');
    } else {
      redirect('login');
    }                               
  }
  
  public function inserir () {
    $this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('sobrenome', 'Sobrenome', 'required');
		$this->form_validation->set_rules('rg', 'RG', 'required');
		$this->form_validation->set_rules('cpf', 'CPF', 'required');
		$this->form_validation->set_rules('nascimento', 'Data de Nascimento', 'required');
		$this->form_validation->set_rules('telefone', 'Telefone', 'required');
		//USUARIO
    $this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('usuario', 'Usu&aacute;rio', 'required');
		$this->form_validation->set_rules('senha', 'Senha', 'required');
		//ENDERECO
    $this->form_validation->set_rules('endereco', 'Rua, Avenida, Alameda, etc', 'required');
		$this->form_validation->set_rules('numero', 'N&uacute;mero', 'required');
		$this->form_validation->set_rules('complemento', 'Complemento', 'required');
		$this->form_validation->set_rules('bairro', 'Bairro', 'required');
		$this->form_validation->set_rules('cep', 'CEP', 'required');
		$this->form_validation->set_rules('cidade', 'Cidade', 'required');
		$this->form_validation->set_rules('estado', 'Estado', 'required');
		
		$senha = $this->input->post('senha');
		$nascimento = substr($this->input->post('nascimento'),6,4)."-".substr($this->input->post('nascimento'),3,2)."-".substr($this->input->post('nascimento'),0,2);
		
		if ($this->form_validation->run()) {
      $this->usuario_verificar = $this->get('Usuarios_model', array('usu_usuario' => $this->input->post('usuario')));
  		$this->email   = $this->get('Usuarios_model', array('usu_email' => $this->input->post('email')));
  		$this->cpf     = $this->get('Clientes_model', array('cli_cpf' => $this->input->post('cpf')));
      if (($this->usuario_verificar == FALSE) && ($this->email == FALSE) && ($this->cpf == FALSE))
      {
          $adicionar_usuario           = $this->insert('Usuarios_model', array(
                                            'usu_nome' => $this->input->post('nome'),
    																		    'usu_usuario' => $this->input->post('usuario'),
    																		    'usu_senha' => $this->encrypt->encode($senha),
    																		    'usu_email' => $this->input->post('email'),
    																		    'usu_dthcadastro' => date('Y-m-d H:i:s')
    																		    ));
          $adicionar_nivel             = $this->insert('UsuariosNiveis_model', array(
                                            'uni_idusuario' => $adicionar_usuario,
                                            'uni_idnivel' => 2
                                            ));
          $adicionar_cliente           = $this->insert('Clientes_model', array(
                                            'cli_idusuario' => $adicionar_usuario,
                                            'cli_nome' => $this->input->post('nome'),
                                            'cli_sobrenome' => $this->input->post('sobrenome'),
                                            'cli_sexo' => $this->input->post('sexo'),
                                            'cli_rg' => $this->input->post('rg'),
                                            'cli_cpf' => $this->input->post('cpf'),
                                            'cli_dtnasc' => $nascimento,
                                            'cli_email' => $this->input->post('email'),
                                            'cli_dthcadastro' => date('Y-m-d H:i:s'),
                                            'cli_ativo' => 1
                                            ));
          $adicionar_endereco          = $this->insert('Enderecos_model', array(
                                            'end_idcidade' => $this->input->post('cidade'),
                                            'end_endereco' => $this->input->post('endereco'),
                                            'end_numero' => $this->input->post('numero'),
                                            'end_bairro' => $this->input->post('bairro'),
                                            'end_cep' => str_replace("-","",$this->input->post('cep')),
                                            'end_complemento' => $this->input->post('complemento'),
                                            'end_latitude' => NULL,
                                            'end_longitude' => NULL
                                            ));
          $adicionar_cliEndereco       = $this->insert('ClientesEnderecos_model', array(
                                            'cen_idcliente' => $adicionar_cliente,
                                            'cen_idendereco' => $adicionar_endereco
                                            ));
          $adicionar_telefone          = $this->insert('Telefones_model', array(
                                            'tel_fone' => $this->input->post('telefone'),
                                            'tel_tipo' => 'Telefone'
                                            ));
          $adicionar_usuTelefone       = $this->insert('UsuariosTelefones_model', array(
                                            'ute_idusuario' => $adicionar_usuario,
                                            'ute_idtelefone' => $adicionar_telefone
                                            ));  
    			//rowback USUARIO
          if($adicionar_usuario && (!$adicionar_cliente || !$adicionar_nivel)) {
            $rowback = $this->delete('Usuarios_model', array(
                                      'usu_id' => $adicionar_usuario
                                      ));
          }
          //rowback USUARIO E NIVEL
          if(($adicionar_usuario && $adicionar_nivel) && (!$adicionar_cliente)) {
            $rowback = $this->delete('Usuarios_model', array(
                                      'usu_id' => $adicionar_usuario
                                      ));
            $rowback2 = $this->delete('UsuariosNiveis_model', array(
                                      'uni_idusuario' => $adicionar_nivel
                                      ));   
          }
          //rowback ENDERECO
          if($adicionar_endereco && (!$adicionar_cliEndereco || !$adicionar_cliente)) {
            $rowback = $this->delete('Enderecos_model', array(
                                      'end_id' => $adicionar_endereco
                                      ));
          }
          
          //rowback TELEFONE
          if($adicionar_telefone && (!$adicionar_cliente || !$adicionar_usuTelefone ||
                                     !$adicionar_usuario || !$adicionar_nivel)) {
            $rowback = $this->delete('Telefones_model', array(
                                      'tel_id' => $adicionar_telefone
                                      ));
          }
          
          if ($adicionar_usuario && $adicionar_cliente) {
            $this->cliente_user = $this->input->post('usuario');
            $this->cliente_pass = $this->input->post('senha');
            $this->session->set_userdata('msg_cad', 'Cadastro realizado com sucesso!');
          } else {
            $this->session->set_userdata('msg_cad', 'Erro ao cadastrar cliente!');
          }
          $this->session->set_userdata('Xpass', array($this->cliente_user, $this->cliente_pass));
          redirect('/login');
        } else {
          $erro = '';
          $erro = !empty($this->usuario_verificar) ? 'Usuario' : $erro;
          $erro = !empty($this->email) ? 'E-mail' : $erro;
          $erro = !empty($this->cpf) ? 'CPF' : $erro;
          
          $mensagem = "Este ".$erro." ja esta cadastro!";   
          $this->session->set_userdata('msg', $mensagem);
          }
		}
		
    $this->metatags['title'] = "Cadastro de Clientes - Reserva de Hotel Online";
    
    $this->load->view('cliente_inserir');    
  }
  
  public function editar () {
    //USUARIO
    $this->form_validation->set_rules('email', 'E-mail', 'required');
    if($this->input->post('senha') || $this->input->post('nova_senha') || $this->input->post('confirmar_senha')) {
      $this->form_validation->set_rules('senha', 'Senha', 'required');
      $this->form_validation->set_rules('nova_senha', 'Nova Senha', 'required');
      $this->form_validation->set_rules('confirmar_senha', 'Confirmar Senha', 'required');
    }
    
    $this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('sobrenome', 'Sobrenome', 'required');
		$this->form_validation->set_rules('rg', 'RG', 'required');
		$this->form_validation->set_rules('cpf', 'CPF', 'required');
		$this->form_validation->set_rules('nascimento', 'Data de Nascimento', 'required');
		$this->form_validation->set_rules('telefone', 'Telefone', 'required');
		//ENDERECO
    $this->form_validation->set_rules('endereco', 'Rua, Avenida, Alameda, etc', 'required');
		$this->form_validation->set_rules('numero', 'N&uacute;mero', 'required');
		$this->form_validation->set_rules('complemento', 'Complemento', 'required');
		$this->form_validation->set_rules('bairro', 'Bairro', 'required');
		$this->form_validation->set_rules('cep', 'CEP', 'required');
		$this->form_validation->set_rules('cidade', 'Cidade', 'required');
		$this->form_validation->set_rules('estado', 'Estado', 'required');
	
		//$senha = $this->input->post('senha');
		$nascimento = substr($this->input->post('nascimento'),6,4)."-".substr($this->input->post('nascimento'),3,2)."-".substr($this->input->post('nascimento'),0,2);
		
		if ($this->form_validation->run()) {      
  		if ($this->cliente->usu_email != $this->input->post('email')) {
        $this->email   = $this->get('Usuarios_model', array('usu_email' => $this->input->post('email')));
      }
  		if ($this->cliente->cli_cpf != $this->input->post('cpf')) {
        $this->cpf     = $this->get('Clientes_model', array('cli_cpf' => $this->input->post('cpf')));
      }
      if ($this->input->post('senha') && $this->input->post('nova_senha') && $this->input->post('confirmar_senha')) { 
        if ($this->input->post('nova_senha') != $this->input->post('confirmar_senha')) {
          $this->session->set_userdata('msg', 'As senhas são diferentes!');
          redirect('cliente/editar');
        } else if ($this->input->post('senha') != $this->encrypt->decode($this->cliente->usu_senha)) {
          $this->session->set_userdata('msg', 'Senha atual incorreta');
          redirect('cliente/editar');       
        }
        
      }
  		
      if (($this->email == FALSE) && ($this->cpf == FALSE) && ($this->senha == FALSE))
      {
        $antigo = $this->cliente;
      	$novo = clone $antigo;
      	$novo->cli_nome          = $this->input->post('nome');
      	$novo->cli_sobrenome     = $this->input->post('sobrenome');
      	$novo->cli_sexo          = $this->input->post('sexo');
      	$novo->cli_rg            = $this->input->post('rg');
      	$novo->cli_cpf           = $this->input->post('cpf');
      	$novo->cli_dtnasc        = $nascimento;
      	$novo->cli_email         = $this->input->post('email');
  			$atualizar_cliente       = $this->update('Clientes_model', $novo, $antigo);
  			 	
  			$antigo = $this->get('Enderecos_model', array('end_id' => $this->cliente->cen_idendereco));
  			$novo = clone $antigo;
  			$novo->end_endereco      = $this->input->post('endereco');
  			$novo->end_numero        = $this->input->post('numero');
  			$novo->end_complemento   = $this->input->post('complemento');
  			$novo->end_bairro        = $this->input->post('bairro');
  			$novo->end_cep           = str_replace("-","",$this->input->post('cep'));
  			$novo->end_idcidade      = $this->input->post('cidade'); 
  			$atualizar_endereco      = $this->update('Enderecos_model', $novo, $antigo);
  			 	
  			$antigo = $this->get('Telefones_model', array('tel_id' => $this->cliente->ute_idtelefone));
  			$novo = clone $antigo;
  			$novo->tel_fone          = $this->input->post('telefone');
  			$atualizar_telefone      = $this->update('Telefones_model', $novo, $antigo);
  			 	
  			$antigo = $this->get('Usuarios_model', array('usu_id' => $this->cliente->cli_idusuario));
  			$novo = clone $antigo;
  			$novo->usu_email         = $this->input->post('email');
  			$novo->usu_senha         = $this->encrypt->encode($this->input->post('senha'));
  			$atualizar_usuario       = $this->update('Usuarios_model', $novo, $antigo);
        
        if ($atualizar_cliente || $atualizar_endereco || $atualizar_telefone || $atualizar_usuario) {
          $this->session->set_userdata('msg', 'Dados alterado com sucesso!');
        } else {
          $this->session->set_userdata('msg', 'Erro ao editar cliente!');
        }
        
        redirect('cliente/exibir');
      } else {
          $erro = '';
          $erro = !empty($this->usuario) ? 'Usuario' : $erro;
          $erro = !empty($this->email) ? 'E-mail' : $erro;
          $erro = !empty($this->cpf) ? 'CPF' : $erro;
          
          $mensagem = "Este ".$erro." ja esta cadastro!";   
          $this->session->set_userdata('msg', $mensagem);
          redirect('cliente/editar');
        }
    }
    
    $this->senha = $this->encrypt->decode($this->cliente->usu_senha);
    $this->metatags['title'] = "Editar Conta - Reserva de Hotel Online";
    $this->load->view('cliente_editar');  
  }
  
  
  public function reservas () {
    if ($this->uri->segment(3) == 'futuras' || $this->uri->segment(3) == 'passadas') {
      $this->reservasLista($this->uri->segment(3));
    } else if ($this->uri->segment(3) == 'detalhes') {
      $this->reservasDetalhes(intval($this->uri->segment(4)));
    } else {
      redirect('cliente/exibir');
    }
  }
  
  private function reservasLista ($tipo) {
    $this->reservas = $this->get('Reservas_model', array(
                                                'res_idcliente' => $this->cliente->cli_id, 
                                                '_join' => array('reservas_status','reservas_formasdepagamento')
                                                ));
    $rsh = array();
    for ($i = 0, $s = count($this->reservas);$i < $s; $i++) {
      $rsh[] = $this->reservas[$i]->res_id;
    }                    
    
    $reservasHotel          = $this->get('ReservasHotel_model', array(
                                                  'rsh_idreserva_in' => $rsh,
                                                  '_join' => array('hoteis')
                                                  ));
    
    $data_atual = strtotime(date('Y-m-d'));
    $reservas = array();
    
    for ($i = 0, $s = count($reservasHotel); $i < $s; $i++) {    
      $checkin = strtotime($reservasHotel[$i]->rsh_checkin);
      if ($tipo == 'futuras') {
        $fl = $data_atual <= $checkin;
        $this->titulo = $this->metatags['title'] = "Reservas Futuras";
      } else {
        $fl = $data_atual > $checkin;
        $this->titulo = $this->metatags['title'] = "Reservas Passadas";
      }
      
      if ($fl) {
        for ($j = 0, $k = count($this->reservas); $j < $k ;$j++) {
          if ($this->reservas[$j]->res_id == $reservasHotel[$i]->rsh_idreserva) {
            if (!in_array($this->reservas[$j]->res_id, $reservas)) {
              $reservas[] = $this->reservas[$j]->res_id;
            }
            if (!isset($this->reservas[$j]->hoteis)) {
              $this->reservas[$j]->hoteis = array();
            }
            $this->reservas[$j]->hoteis[] = $reservasHotel[$i];
            
            break;
          }
        }
      }
    }
    
    for ($i = 0, $s = count($this->reservas); $i < $s; $i++) {
      if (!in_array($this->reservas[$i]->res_id, $reservas)) {
        array_splice($this->reservas, $i, 1);
        $i--;
        $s--;
      }
    }
    
      $this->metatags['title'] .= " - Área do Cliente :: Reserva de Hotel Online";
      //var_dump($this->reservas);
      $this->load->view('cliente_reservas');
  }
  
  private function reservasDetalhes ($res_id) {
  	$this->css_js->add('js', '/js/reserva_detalhes.js', 'loadReservasDetalhes();');
		$this->reserva = $this->get('reservas_model', array(
				'res_id' => $res_id,
				'res_idcliente' => $this->cliente->cli_id,
		));
		$this->reserva->hoteis = $this->get('reservasHotel_model', array(
				'rsh_idreserva' => $res_id,
				'_join' => array('hoteis', 'hoteis_enderecos', 'enderecos'),
		));
		
		for ($i = 0, $s = count($this->reserva->hoteis); $i < $s; $i++) {
			$dados = $this->get('reservasApartamento_model', array(
					'rsa_idreservahotel' => $this->reserva->hoteis[$i]->rsh_id,
					'_join' => array('apartamentos', 'tipos_apartamentos', 'categorias_apartamentos'),
			));
			$this->reserva->hoteis[$i]->categorias = $this->organizaDados($dados, $this->reserva->hoteis[$i]->rsh_checkin, $this->reserva->hoteis[$i]->rsh_checkout);
			$this->reserva->hoteis[$i]->valor_hot = 0;
			for ($j = 0, $c = count($this->reserva->hoteis[$i]->categorias); $j < $c; $j++) {
				$this->reserva->hoteis[$i]->valor_hot += floatval($this->reserva->hoteis[$i]->categorias[$j]->apartamento->valor_apa); 
			}
		}
		$this->load->view('cliente_reservasdetalhes');  
  }
  
  private function organizaDados ($dados, $in, $out) {
  	$this->setDatas($in, $out);
  	$res = $cap = array();
		for ($i = 0, $s = count($dados); $i < $s; $i++) {
			if (!in_array($dados[$i]->rsa_idreservahotel . '.' . $dados[$i]->rsa_categoriaapartamento, $cap)) {
				$cap[] = $dados[$i]->rsa_idreservahotel . '.' . $dados[$i]->rsa_categoriaapartamento;
				$cr = count($res);
				$res[$cr] = new stdClass();
				$res[$cr]->rsa_categoriaapartamento = $dados[$i]->rsa_categoriaapartamento;
				$res[$cr]->cap_id                   = $dados[$i]->cap_id;
				$res[$cr]->cap_nome                 = $dados[$i]->cap_nome;
				$res[$cr]->cap_descricao            = $dados[$i]->cap_descricao;
				$res[$cr]->cap_ativo                = $dados[$i]->cap_ativo;
				$res[$cr]->cap_qtdpessoas           = $dados[$i]->cap_qtdpessoas;
				$res[$cr]->cap_ordem                = $dados[$i]->cap_ordem;
				$res[$cr]->cap_permalink            = $dados[$i]->cap_permalink;
				
				if (empty($res[$cr]->cap_id)) {
					$res[$cr]->ativo = false;
					$res[$cr]->cap_nome == $res[$cr]->rsa_categoriaapartamento;
				} else {
					$res[$cr]->ativo = true;
				}
				
				$res[$cr]->dados = array($dados[$i]);
			} else {
				for ($j = 0, $c = count($res); $j < $c; $j++) {
					if ($res[$j]->rsa_categoriaapartamento == $dados[$i]->rsa_categoriaapartamento) {
						$res[$j]->dados[] = $dados[$i];
						break;
					}
				}
			}
		}
		
		for ($i = 0, $s = count($res); $i < $s; $i++) {
			$res[$i]->apartamentos = $this->organizaDadosApartamentos($res[$i]->dados);
			if (count ($res[$i]->apartamentos) > 1) {
				die('erro');
			}
			$res[$i]->apartamento = $res[$i]->apartamentos[0];
			unset($res[$i]->apartamentos); 
			unset($res[$i]->dados);
		}
		unset($this->datas);
		unset($this->dataini);
		unset($this->datafim);
		
		return $res;
	}
	
	private function organizaDadosApartamentos ($dados) {
		$res = $apa = array();
		for ($i = 0, $s = count($dados); $i < $s; $i++) {
			if (!in_array($dados[$i]->rsa_idapartamento, $apa)) {
				$apa[] = $dados[$i]->rsa_idapartamento;
				$cr = count($res);
				$res[$cr] = new stdClass();
				$res[$cr]->rsa_id              = $dados[$i]->rsa_id;
				$res[$cr]->rsa_idreservahotel  = $dados[$i]->rsa_idreservahotel;
				$res[$cr]->rsa_idapartamento   = $dados[$i]->rsa_idapartamento;
				$res[$cr]->rsa_tipoapartamento = $dados[$i]->rsa_tipoapartamento;
				$res[$cr]->rsa_dthareserva     = $dados[$i]->rsa_dthareserva;
				$res[$cr]->rsa_dthcadastro     = $dados[$i]->rsa_dthcadastro;
				$res[$cr]->apa_id              = $dados[$i]->apa_id;
				$res[$cr]->apa_idhotel         = $dados[$i]->apa_idhotel;
				$res[$cr]->apa_idcategoria     = $dados[$i]->apa_idcategoria;
				$res[$cr]->apa_idtipo          = $dados[$i]->apa_idtipo;
				$res[$cr]->apa_quantidade      = $dados[$i]->apa_quantidade;
				$res[$cr]->apa_dtini           = $dados[$i]->apa_dtini;
				$res[$cr]->apa_dtfim           = $dados[$i]->apa_dtfim;
				$res[$cr]->apa_dtfim           = $dados[$i]->apa_dtfim;
				$res[$cr]->apa_ativo           = $dados[$i]->apa_ativo;
				$res[$cr]->apa_dthcadastro     = $dados[$i]->apa_dthcadastro;
				$res[$cr]->tap_id              = $dados[$i]->tap_id;
				$res[$cr]->tap_nome            = $dados[$i]->tap_nome;
				$res[$cr]->tap_descricao       = $dados[$i]->tap_descricao;
				$res[$cr]->tap_ativo           = $dados[$i]->tap_ativo;
				$res[$cr]->tap_permalink       = $dados[$i]->tap_permalink;
				
				if (empty($res[$cr]->apa_id) || empty($res[$cr]->tap_id)) {
					$res[$cr]->tap_nome = $dados[$i]->rsa_tipoapartamento;
					$res[$cr]->ativo = false;
				} else {
					$res[$cr]->ativo = true;
				}
				$res[$cr]->dados = array($dados[$i]);
			} else {
				for ($j = 0, $c = count($res); $j < $c; $j++) {
					if ($res[$j]->rsa_idapartamento == $dados[$i]->rsa_idapartamento) {
						$res[$j]->dados[] = $dados[$i];
						break;
					}
				}
			}
		}
		
		for ($i = 0, $s = count($res); $i < $s; $i++) {
			$res[$i]->datas = $this->ordanizaDadosDatas($res[$i]->dados);
			unset($res[$i]->dados);
			$res[$i]->valor_apa = 0;
			$res[$i]->quantidade = $res[$i]->datas[0]->qtde;
			for ($j = 0, $c = count($res[$i]->datas); $j < $c; $j++) {
				if ($res[$i]->quantidade != $res[$i]->datas[$j]->qtde) {
					die('erro!!');
				}
				$res[$i]->valor_apa += floatval($res[$i]->datas[$j]->rsa_tarifafinal) * $res[$i]->quantidade;
			}
			$res[$i]->diaria_media = $res[$i]->valor_apa / count($res[$i]->datas); 
		} 
		return $res;
	}
  
  private function ordanizaDadosDatas ($dados) {
  	$datas = $res = array();
  	for ($i = 0, $s = count($this->datas); $i < $s; $i++) {
  		for ($j = 0, $c = count($dados); $j < $c; $j++) {
  			if ($this->datas[$i]->data == $dados[$j]->rsa_dthareserva) {
  				if (!in_array($dados[$j]->rsa_dthareserva, $datas)) {
  					$datas[] = $dados[$j]->rsa_dthareserva;
  					$cr = count($res);
  					$res[$cr] = new stdClass();
  					$res[$cr]->rsa_idbloqueio = $dados[$j]->rsa_idbloqueio;
  					$res[$cr]->rsa_idcatbloqueio = $dados[$j]->rsa_idcatbloqueio;
  					$res[$cr]->rsa_dthareserva = $dados[$j]->rsa_dthareserva;
  					$res[$cr]->rsa_tarifa = $dados[$j]->rsa_tarifa;
  					$res[$cr]->rsa_tarifafinal = $dados[$j]->rsa_tarifafinal;
  					$res[$cr]->rsa_taxaturismo = $dados[$j]->rsa_taxaturismo;
  					$res[$cr]->rsa_taxaservico = $dados[$j]->rsa_taxaservico;
  					$res[$cr]->rsa_iss = $dados[$j]->rsa_iss;
  					$res[$cr]->rsa_iss = $dados[$j]->rsa_iss;
  					$res[$cr]->qtde = 1;
					} else {
						$res[$cr]->qtde++;
					}
				}
			}
		}
		return $res;
	}
	
	private function setDatas ($in, $out) {
    $di = explode('-', $in);
    $df = explode('-', $out);
    if (count($di) == 3 && count($df) == 3) {
		$this->dataini = array('dia' => intval($di[2]), 'mes' => intval($di[1]), 'ano' => intval($di[0]));
		$this->datafim = array('dia' => intval($df[2]), 'mes' => intval($df[1]), 'ano' => intval($df[0]));
		
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
		} else {
			$this->datas = array();
		}
	}
  }
  
  public function reservaAtual () {
  	$this->reservas = $this->session->userdata('reservas');
  	if (!empty($this->reservas)) {
	  	$this->css_js->add('js', '/js/moeda.js', 'loadReservaAtual();');
	  	$this->css_js->add('js', '/js/reserva_atual.js');
	  	$this->total = 0;
	  	for ($i = 0, $s = count($this->reservas); $i < $s; $i++) {
	  		$this->total += $this->reservas[$i]->valor_hot;
			}
	  	$this->load->view('cliente_reservaatual');
	  } else {
	  	redirect('/');
		}
	}
  
  public function formaPagamento () {
    $reservas = $this->session->userdata('reservas');
    if (!empty($reservas)) {
      $this->load->view('cliente_formapagamento');
    } else {
      redirect('/');
    }
  }
  
  public function confirmarReserva () {
    $reservas = $this->session->userdata('reservas');
    $forma    = $this->input->post('forma');
    
    $total = 0;
    for ($i = 0, $s = count($reservas); $i < $s; $i++) {
    	$total += $reservas[$i]->valor_hot;
		}
    
    /**
     * TODO: falta pegar dados do operador;
     * TODO: falta verificação e mensagem de erro;     
     */       
    if (!empty($reservas) && !empty($forma)) {
      $cliente = $this->get('Clientes_model', array('cli_idusuario' => $this->auth_acl->getUserId()));
      $res = $this->insert('Reservas_model', array(
          'res_idcliente' => $cliente->cli_id,
          'res_idstatus' => ($forma == 1) ? 1 : 3,
          'res_idoperador' => 1,
          'res_idformadepagamento' => $forma,
          'res_dthcadastro' => date('Y-m-d H:i:s'),
          'res_datarecebimento' => ($forma == 1) ? date('Y-m-d H:i:s') : '0000-00-00 00:00:00',
          'res_valor' => $total,
      ));
      for ($i = 0, $r = count($reservas); $i < $r; $i++) {
        $rsh = $this->insert('ReservasHotel_model', array(
          'rsh_idreserva' => $res,
          'rsh_idhotel' => $reservas[$i]->hot_id,
          'rsh_checkin' => $reservas[$i]->rsh_checkin,
          'rsh_checkout' => $reservas[$i]->rsh_checkout,
        ));

        for ($j = 0, $c = count($reservas[$i]->categorias_apa); $j < $c; $j++) {
          for ($l = 0, $b = count($reservas[$i]->categorias_apa[$j]->apartamento->bloqueios); $l < $b; $l++) {
            for ($m = 1; $m <= $reservas[$i]->categorias_apa[$j]->qtde_apa; $m++) {
              $rsa = $this->insert('ReservasApartamento_model', array(
                'rsa_idreservahotel' => $rsh,
                'rsa_idapartamento' => $reservas[$i]->categorias_apa[$j]->apartamento->apa_id,
                'rsa_idbloqueio' => $reservas[$i]->categorias_apa[$j]->apartamento->bloqueios[$l]->prioritario->blo_id,
                'rsa_idcatbloqueio' => $reservas[$i]->categorias_apa[$j]->apartamento->bloqueios[$l]->prioritario->bca_id,
                'rsa_tipoapartamento' => $reservas[$i]->categorias_apa[$j]->apartamento->tap_nome,
                'rsa_categoriaapartamento' => $reservas[$i]->categorias_apa[$j]->cap_nome,
                'rsa_dthareserva' => $reservas[$i]->categorias_apa[$j]->apartamento->bloqueios[$l]->data,
                'rsa_dthcadastro' => date('Y-m-d H:i:s'),
                'rsa_tarifa' => $reservas[$i]->categorias_apa[$j]->apartamento->bloqueios[$l]->prioritario->blo_tarifa,
                'rsa_tarifafinal' => $reservas[$i]->categorias_apa[$j]->apartamento->bloqueios[$l]->prioritario->blo_tarifafinal,
                'rsa_taxaturismo' => $reservas[$i]->categorias_apa[$j]->apartamento->bloqueios[$l]->prioritario->blo_taxaturismo,
                'rsa_taxaservico' => $reservas[$i]->categorias_apa[$j]->apartamento->bloqueios[$l]->prioritario->blo_taxaservico,
                'rsa_iss' => $reservas[$i]->categorias_apa[$j]->apartamento->bloqueios[$l]->prioritario->blo_iss,
              ));
            }
          }
        }
      }
      $this->session->unset_userdata('reservas');
      $this->session->set_userdata('msg_reserva', array('ok', $res));
      redirect('/satisfacao');
      
    } else {
    	redirect('/');
		}
  }

	
}
/* fim do arquivo cliente.php */
/* Location: ./system/application/controllers/cliente.php */
