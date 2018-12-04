<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Carro{
	
	public $modelo;
	public $id;
	
	function __construct()
	{
		
	}
	
	private function getCI(){
		$CI =& get_instance();
		$CI->load->library('Model');
		$CI->load->model('carro_model','carro_model',true);
		$CI->load->model('carrosgrupo_model','carrosgrupo_model',true);
		return $CI;
	}
	
	function setCarro($car_id){
		$this->setModelo($car_id);
		$this->setId($car_id);
		$this->setPassageiros($car_id);
		$this->setMalas($car_id);
		$this->setMotor($car_id);
		$this->setCambio($car_id);
	}
	
	private function getDados($car_id = NULL){
		if($car_id != NULL){
			$car = $this->getCI()->carro_model->GetCarro(array('car_id' => $car_id));
			return $car;
		}else{
			return false;
		}
	}
	
	private function setModelo($car_id = NULL){
		$this->modelo = $this->getDados($car_id)->car_modelo;
	}
	
	private function setId($car_id = NULL){
		$this->id = (integer)$car_id;
	}
	
	private function setPassageiros($car_id = NULL){
		$this->passageiros = $this->getDados($car_id)->car_passageiros;
	}
	
	private function setMalas($car_id = NULL){
		$this->mala_gde = $this->getDados($car_id)->car_malagde;
		$this->mala_peq = $this->getDados($car_id)->car_malapeq;
	}
	
	private function setMotor($car_id = NULL){
		$this->motor = $this->getDados($car_id)->car_motor;
	}
	
	private function setCambio($car_id = NULL){
		$this->cambio = $this->getDados($car_id)->car_cambio;
	}
	
	function getCarrosDispo($grupo_id = NULL){
		$carros = $this->getCI()->carrosgrupo_model->GetCarrosGrupo(array(
				'cargrp_grp_id' => $grupo_id,
				'sortBy'		=> 'car_id',
				'sortDirection'	=> 'ASC'
			)
		);
		$this->carros =  $carros;
	}
}

//end of file