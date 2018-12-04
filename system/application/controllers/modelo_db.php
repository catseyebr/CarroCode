<?php
class Teste extends MyController {
  
  public function Teste () {
    parent::__construct();
    
    $antigo = $this->get('Telefones_model', array('tel_id' => 71));
    $novo = clone $antigo;
    $novo->tel_fone = 'rrrrrrrrrr';
    
    $this->update('Telefones_model', $novo, $antigo);
    $this->delete('Telefones_model', array('tel_id' => $novo->tel_id));
    $this->insert('Telefones_model', array('tel_id' => $novo->tel_id));
  }
  
  public function Index () {
  }
}

//end of file