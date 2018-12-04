<?php
class Adm_Combos extends MyController {
	
	public $recursos;
	
	function Adm_Combos () {
		parent::__construct('Jscom');	
			
	}
	
  	public function recursos () {
		$recursos_json = '';
		$this->recursos = $this->get('recursos_model',NULL);
		echo "<select>";
		foreach($this->recursos as $rec){
			echo "<option value='$rec->rec_id'>$rec->rec_nome</option>";
		}
		echo "</select>";
	}
	
}