<?php
class Login extends MyController {
	
	public $metatags;
		
	public function Login () { 
		parent::__construct('admin');
		
		if ($this->input->post('user')) {
      		$this->auth_acl->setUser($this->input->post('user'), $this->input->post('pass'));
     		if ($this->auth_acl->hasAuth('admin')) {
        		redirect('/adm/inicial');
      		}else{
        		$this->css_js->add('function', NULL, 'alert(\'Login ou senha incorreto.\')');
      		}                                     
    	}
	}
  
  	public function Index () {
	  	$this->metatags->met_title = "Administração Layum - Login";
		$this->load->view('/adm/login');
	}
	
	public function efetualogin(){
		if ($this->input->post('user')) {
      		$this->auth_acl->setUser($this->input->post('user'), $this->input->post('pass'));
     		if ($this->auth_acl->hasAuth('admin')) {
        		redirect('/adm/inicial');
      		}else{
        		$this->css_js->add('function', NULL, 'alert(\'Login ou senha incorreto.\')');
      		}                                     
    	}	
	}
	
	public function sair(){
		 $this->auth_acl->unsetUser();
    	redirect('/adm/inicial');	
	}
}
/* fim do arquivo login.php */
/* Location: ./system/application/controllers/login.php */
