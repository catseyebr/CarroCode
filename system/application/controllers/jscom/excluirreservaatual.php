<?php
class ExcluirReservaAtual extends MyController {
	
  function ExcluirReservaAtual () {
		parent::__construct('Jscom');		
	}
	
  public function Index () {
		$id = $this->input->post('id');
		if ($id != '') {
			$id = intval($id);
			$reservas = $this->session->userdata('reservas');
			array_splice($reservas, $id, 1);
			$this->session->set_userdata('reservas', $reservas);
		}  
  }
}