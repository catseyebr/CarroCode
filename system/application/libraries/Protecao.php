<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Protecao{
	
	public $nome;
	public $id;
	public $locadora;
	
	function __construct()
	{
		
	}
	
	private function getCI(){
		$CI =& get_instance();
		$CI->load->library('Model');
		$CI->load->model('protecao_model','protecao_model',true);
		return $CI;
	}
	
	function setProtecao($prot_id){
		$this->setNome($prot_id);
		$this->setId($prot_id);
		$this->setLoc($prot_id);
		$this->setTexto($prot_id);
	}
	
	function setProtecaoPadrao($loc_id, $grp_id){
		$prot_data = $this->getDadosPadrao($loc_id, $grp_id);
		$prot_id = $prot_data[0]->prot_id; 
		$this->setNome($prot_id);
		$this->setId($prot_id);
		$this->setLoc($prot_id);
		$this->setTexto($prot_id);
	}
	
	private function getDadosPadrao($loc_id = NULL, $grp_id = NULL){
		if($loc_id != NULL){
			$prot = $this->getCI()->protecao_model->Getprotecao(array('prot_loc_id' => $loc_id, 'grp_id' => $grp_id, 'sortBy' => 'prot_ordem', 'sortDirection' => 'ASC', 'limit' => 1));
			return $prot;
		}else{
			return false;
		}
	}
	
	private function getDados($prot_id = NULL){
		if($prot_id != NULL){
			$prot = $this->getCI()->protecao_model->Getprotecao(array('prot_id' => $prot_id));
			return $prot;
		}else{
			return false;
		}
	}
	
	function getCalcTarifa(){
		if($this->id != NULL){
			$this->setHoraExtra($this->id);
			$this->setLimiteHoras($this->id);
			$this->setDivisor($this->id);
		}else{
			return false;
		}
	}
	
	private function setNome($prot_id = NULL){
		$this->nome = $this->getDados($prot_id)->prot_nome;
	}
	
	private function setTexto($prot_id = NULL){
		$this->desc = $this->getDados($prot_id)->prot_desc;
	}
	
	private function setId($prot_id = NULL){
		$this->id = (integer)$prot_id;
	}
	
	private function setLoc($prot_id = NULL){
		$this->locadora =(integer)$this->getDados($prot_id)->prot_loc_id;
	}
	
	private function setHoraExtra($prot_id = NULL){
		$this->hora_extra =(boolean)($this->getDados($prot_id)->prot_hora_extra == 't')? TRUE : FALSE;
	}
	
	private function setDivisor($prot_id = NULL){
		$this->div_hora_extra =(integer)$this->getDados($prot_id)->prot_divisor_horas;
	}
	
	private function setLimiteHoras($prot_id = NULL){
		$this->limite_horas =(integer)$this->getDados($prot_id)->prot_limite_horas;
	}
	
}

//end of file