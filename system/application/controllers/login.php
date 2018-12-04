<?php

class Login extends MyController {
	
	public function Login () { 
		parent::__construct();
  }
	
  public function index () {
		if ($this->input->post('user')) {
			if ($this->runLogin($this->input->post('user'), $this->input->post('pass'))) {
				redirect('cliente/exibir');
			} else {
				$this->css_js->add('function', NULL, 'alert(\'Login ou senha incorreto.\')');
			}
		} else if ($this->session->userdata('Xpass')) {
			$xpass = $this->session->userdata('Xpass');
			$this->session->unset_userdata('Xpass');
			if ($this->session->userdata('msg_cad')) {
				$this->session->set_userdata('msg', $this->session->userdata('msg_cad'));
			}
			if ($this->runLogin($xpass[0], $xpass[1])) {
				redirect('cliente/exibir');
			}
		}
		$this->load->view('login');
	}
  
  public function reserva () {
		if ($this->input->post('user')) {
			if ($this->runLogin($this->input->post('user'), $this->input->post('pass'))) {
				redirect('/reservar');
			} else {
				$this->css_js->add('function', NULL, 'alert(\'Login ou senha incorreto.\')');
			}
		}
		$this->load->view('login');
	}
	
	public function esqueci () {
			$email = $this->input->post('email_esqueci');
			if (!empty($email)) {
					if (preg_match('/.+@.+\..{2}.*/',$email)) {
							$usuarios = $this->get('usuarios_model', array('usu_email' => $email));
							if (count($usuarios) > 0) {
								$limit = date('Y-m-d H:i:s', time() + (3 * 60 * 60));
								$usuarios[0]->usu_usuario;
								$usuarios[0]->usu_email;
								$key = md5($usuarios[0]->usu_usuario . '$$' . $usuarios[0]->usu_email . '$$' . $limit . '$$') . rand(1000, 9999);
								$this->insert('recuperarSenha_model', array('hash' => $key, 'limit' => $limit, 'id_usuario' => $usuarios[0]->usu_id));
								var_dump($key);
								$this->load->view('esqueci_senha_msg');
							} else {
								$this->erro =  'e-mail não cadastrado';
								$this->load->view('esqueci_senha_form');
							}
					} else {
						$this->erro =  'e-mail inválido';
						$this->load->view('esqueci_senha_form');
					}
			} else {
					$this->load->view('esqueci_senha_form');
			}
	}
	
	public function resetar () {		
		$recuperar_senha = $this->get('recuperarSenha_model', array('hash' => $this->uri->segment(3)));
		if ($recuperar_senha) {
			$usuario = $this->get('usuarios_model',array('usu_id' => $recuperar_senha->id_usuario));

			if ($this->input->post('p')) {
				$nova_senha = $this->input->post('nova_senha');
				$nova_senha_repetir = $this->input->post('nova_senha_repetir');
				if (!empty($nova_senha)) {
					if($nova_senha == $nova_senha_repetir) {
						$this->load->library('encrypt');
						$novo_usuario = clone $usuario;
						$novo_usuario->usu_senha = $this->encrypt->encode($nova_senha);
						if($this->update('usuarios_model', $novo_usuario, $usuario)) {
							$this->delete('recuperarSenha_model', array('hash' => $recuperar_senha->hash));
							$this->runLogin($novo_usuario->usu_usuario, $nova_senha);
							$this->session->set_userdata('msg', 'Senha alterada com sucesso.');
							redirect('cliente/exibir');
						} else {
							$this->session->set_userdata('msg', 'Houve um erro com sua chave de recuperação de conta, por favor tente novamente.');
							redirect('/login/esqueci');
						}
					} else {
						$this->erro = 'A senha e sua confirmação não são iguais.';
						$this->load->view('esqueci_senha_nova');
					}
				} else {
					$this->erro = 'Uma senha deve ser informada.';
					$this->load->view('esqueci_senha_nova');
				}
			} else {
				$this->load->view('esqueci_senha_nova');
			}
		} else {
				$this->session->set_userdata('msg', 'Houve um erro com sua chave de recuperação de conta, por favor tente novamente.');
				redirect('/login/esqueci');
		}
	}
  
	private function runLogin ($user, $pass) {	
		if ($user) {
      $this->auth_acl->setUser($user, $pass);
       return $this->auth_acl->hasAuth('cliente');
    } else {
			return false;
		}
	}
	
}
/* fim do arquivo login.php */
/* Location: ./system/application/controllers/login.php */
