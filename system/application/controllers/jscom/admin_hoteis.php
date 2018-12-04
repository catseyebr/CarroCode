<?php
class Admin_Hoteis extends MyController {
	
  function Admin_Hoteis () {
		parent::__construct('Jscom');		
	}
	
  public function index () {
    if ($this->auth_acl->hasAuth('admin')) {
      $this->load->model('TagsHoteis_Model');
      $result = $this->get('TagsHoteis_model', $this->checkOptions(array('like' => $this->input->post('q'))), 'getTagsAutocomplete');
      
      $r = "";
      for ($i = 0, $s = count($result) -1;$i <= $s;$i++) {
        $r .= $result[$i]->hot_nome;
        $r .= "|";
        $r .= $result[$i]->hot_nome;
        $r .= "\r\n";
      }
      echo $r;
    }
  }
  
  private function checkOptions ($opt) {
    if (!$this->auth_acl->hasAuth('superadmin')) {
      $opt['hot_id_in'] = $this->hoteis_acesso;
    }
    
    return $opt;
  }
}