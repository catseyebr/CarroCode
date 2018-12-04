<?php

class Login extends MyController {
	
	public function Login () { 
		parent::__construct('admin');
		
		if ($this->input->post('user')) {
      $this->auth_acl->setUser($this->input->post('user'), $this->input->post('pass'));
      if ($this->auth_acl->hasAuth('admin')) {
        redirect('/admin');
      } else {
        $this->css_js->add('function', NULL, 'alert(\'Login ou senha incorreto.\')');
      }                                     
    }
  }
  
  public function Index () {
		$this->load->view('admin/login');
	}
}
/* fim do arquivo login.php */
/* Location: ./system/application/controllers/login.php */
