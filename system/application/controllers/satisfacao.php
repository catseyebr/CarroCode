<?php

class Satisfacao extends MyController {
	
	public function Satisfacao () { 
		parent::__construct();
  }
  
  public function Index () {
  	$msg_reserva = $this->session->userdata('msg_reserva');
		$this->tipo = $msg_reserva[0];
		$this->id_reserva = $msg_reserva[1];
		$this->load->view('satisfacao');
	}
	
	public function submit () {
		$map = array('otimo' => 1, 'bom' => 2, 'razoavel' => 3, 'ruim' => 4);
		$opiniao = $this->input->post('opiniao');
		$sugestao = $this->input->post('sugestao');
		$id_reserva = $this->input->post('reserva');
		$cliente = $this->get('clientes_model', array('cli_idusuario' => $this->usuario->usu_id));
		if (array_key_exists($opiniao, $map)) {
			$opiniao = $map[$opiniao];
			$this->insert('satisfacao_model', array(
				'sat_idclassificacao' => $opiniao,
				'sat_idreferencia' => 3,
				'sat_idreserva' => $id_reserva,
				'sat_idcliente' => $cliente->cli_id,
				'sat_comentario' => $sugestao
			));
		}
		redirect('/');
	}
}
/* fim do arquivo satisfacao.php */
/* Location: ./system/application/controllers/satisfacao.php */
