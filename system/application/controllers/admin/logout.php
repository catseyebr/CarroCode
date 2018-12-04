<?php
class Logout extends MyController {
	
	public function Logout () { 
		parent::__construct();
    $this->auth_acl->unsetUser();
    redirect('admin/');
  }
  
  public function Index () {
		$this->load->view('login');
	}
}
/* fim do arquivo login.php */
/* Location: ./system/application/controllers/login.php */
