<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Endereco{
	
	public $id;
	public $rua;
	public $bairro;
	
	function __construct()
	{
		$this->id 		= NULL;
		$this->rua 		= NULL;
		$this->bairro 	= NULL;
	}
	
	private function getCI(){
		$CI =& get_instance();
		$CI->load->library('model');
		$CI->load->model('endereco_model','endereco_model',true);
		$CI->load->model('cidade_model','cidade_model',true);
		$CI->load->model('estado_model','estado_model',true);
		return $CI;
	}
	
	function setEndereco($end_id){
		$this->setId($end_id);
		$this->setRua($end_id);
		$this->setBairro($end_id);
		$this->setCidade($end_id);
		$this->setUf($end_id);
	}
	
	private function getDados($end_id = NULL){
		if($end_id != NULL){
			$end = $this->getCI()->endereco_model->GetEndereco(array('end_id' => $end_id));
			return $end[0];
		}else{
			return false;
		}
	}
	
	private function setId($end_id = NULL){
		$this->id = (integer)$end_id;
	}
	
	private function setRua($end_id = NULL){
		$this->rua = $this->getDados($end_id)->end_endereco;
	}
	
	private function setBairro($end_id = NULL){
		$this->bairro = $this->getDados($end_id)->end_bairro;
	}
	
	private function setCidade($end_id = NULL){
		$cidad = $this->getCI()->cidade_model->GetCidade(array('city_id' => $this->getDados($end_id)->end_city_id));
		$this->cidade = $cidad->city_nome;
		$estado = $this->setUf($cidad->city_uf_id);
		$this->estado = $estado[0]->uf_abr;
	}
	
	private function setUf($uf_id){
		$estad = $this->getCI()->estado_model->GetEstado(array('uf_id' => $uf_id));
		return $estad;
	}
}

//end of file