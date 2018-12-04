<?php
class Admin_TipoApartamento extends MyController {
	
  function Admin_TipoApartamento () {
		parent::__construct('Jscom');		
	}
	
  public function index () {
    if ($this->auth_acl->hasAuth('admin')) {
      $result = $this->get('TiposApartamentos_model', $this->checkOptions(array('tap_nome' => $this->input->post('q'))));
      $r = "";
      for ($i = 0, $s = count($result) -1;$i <= $s;$i++) {
        $r .= $result[$i]->tap_nome;
        $r .= "|";
        $r .= $result[$i]->tap_nome;
        $r .= "\r\n";
      }
      echo $r;
    }
  }
  
  private function checkOptions ($opt) {
    if (isset($opt['_join'])) {
      $_join = $opt['_join'];
      unset($opt['_join']);
    } else {
      $_join = array();
    } 
    
    if (!$this->auth_acl->hasAuth('superadmin') && $hot_id <= 0) {
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