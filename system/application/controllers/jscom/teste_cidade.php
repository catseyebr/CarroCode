<?php
class Teste_cidade extends MyController {
	
	function Teste_cidade () {
		parent::__construct('Jscom');	
		$this->index();	
	}
	
  	public function index () {
		
		$resul = $this->get('TagCidade_Model', array('like' => $this->input->post('origem')), 'getTagsAutocomplete');
		foreach($resul as $res => $val){
			$result[$res]['id'] = $val->city_id;
			$result[$res]['val'] = $val->city_nome;
			$result[$res]['ref'] = 'cidade';
		}
		echo json_encode($result);
	}
}
?>