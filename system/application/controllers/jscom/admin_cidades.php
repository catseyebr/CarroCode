<?php
class Admin_Cidades extends MyController {
	
  function Admin_Cidades () {
		parent::__construct('Jscom');		
	}
	
  public function index () {
    if ($this->auth_acl->hasAuth('admin')) {
      $result = $this->get('TagsCidades_model', array('like' => $this->input->post('q')), 'getTagsAutocomplete');
      $r = "";
      for ($i = 0, $s = count($result) -1;$i <= $s;$i++) {
        $r .= $result[$i]->nome_cidade;
        $r .= "|";
        $r .= $result[$i]->nome_cidade;
        $r .= "\r\n";
      }
      echo $r;
    }
  }
}