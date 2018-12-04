<?php
class Teste extends Controller {
	
	public $sessoes = array();
	
  	function Teste () {
    	parent::Controller();
    }
	
    function index()
	{
		
		//$this->load->library('TarifaCarro');
		//$loc = new TarifaCarro();
		//$loc->setTarifa(71,NULL,'2010-10-11T12:00','2010-10-12T22:00',285);
		//$loc->getLojas();
		//$loc->lojas[143]->getEndereco();
		//$loc->getCnpj();
		//$loc->cnpj->getEndereco();
		
		/*
		$this->load->library('DisponibilidadeCarro');
		$loc = new DisponibilidadeCarro();
		$loc->setDisponibilidade(array(
				'data_inicial' 			=> '2010-10-14T10:00',
				'data_final'			=> '2010-10-15T23:00',
				'cidadeRetirada_id'		=> NULL,
				'cidadeRetirada_nome'	=> 'Curitiba',
				'estadoRetirada_id'		=> 16,
				'cidadeDevolucao_id'	=> NULL,
				'cidadeDevolucao_nome'	=> 'Curitiba',
				'estadoDevolucao_id'	=> 16,
				//'categoriaSelecionada'	=> 2
			)
		);
		//var_dump($loc);
		foreach($loc->vet_ordem_valores as $valores){
			echo "Categoria: ".$valores['categoria'];
			echo "<br>";
			echo "Valor: ".$valores['valor'];
			echo "<br>";
			echo "Locadora: ".$valores['id_loc'];
			echo "<br>";
			echo "<hr>";
		}
		/*		
		$this->load->library('loja');
		$loj = new Loja(125);
		var_dump($loj);
		
		$this->load->library('endereco');
		$end = new Endereco(27);
		var_dump($end);
				
		$this->load->library('cnpj');
		$cnpj = new Cnpj(27);
		var_dump($cnpj);
		*/
		$this->load->view('teste');
	}
}
/* fim do arquivo teste.php */
/* Location: ./system/application/controllers/teste.php */
