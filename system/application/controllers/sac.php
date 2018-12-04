<?php

class Sac extends MyController {
	public $logs = array();
	
	public function Sac () { 
		parent::__construct();
		$this->css_js->add('js', '/js/sac.js','loadSac();');
		$this->css_js->add('js', '/js/flash.js');
  }
  
  public function Index () { 
		$this->load->view('sac');
	}
}
/* fim do arquivo login.php */
/* Location: ./system/application/controllers/login.php */
