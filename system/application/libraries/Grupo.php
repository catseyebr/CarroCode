<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Grupo{
	
	public $nome;
	public $id;
	public $locadora;
	public $categoria;
	
	function __construct()
	{
		$this->nome 	= NULL;
		$this->id		= NULL;
		$this->espec->duas_portas = FALSE;
		$this->espec->quatro_portas = FALSE;
		$this->espec->dh = FALSE;
		$this->espec->ac = FALSE;
		$this->espec->te = FALSE;
		$this->espec->cd = FALSE;
	}
	
	private function getCI(){
		$CI =& get_instance();
		$CI->load->library('Model');
		$CI->load->model('grupo_model','grupo_model',true);
		$CI->load->model('grpespecassoc_model','grpespecassoc_model',true);
		$CI->load->model('tarifagrupos_model','tarifagrupos_model',true);
		return $CI;
	}
	
	function setGrupo($grupo_id){
		$this->setNome($grupo_id);
		$this->setId($grupo_id);
		$this->setLoc($grupo_id);
		$this->setCategoria($grupo_id);
		$this->setFranquia($grupo_id);
		$this->setEspec($grupo_id);
		$this->setCarros($grupo_id);
	}
	
	function setTarifaMedia($grupo_id = NULL){
		$diaria = $this->getCI()->tarifagrupos_model->GetTarifaGrupos(
				array(
					'targrp_grp_id' 			=> $grupo_id,
					'targrp_ativo' 				=> 't',
					'targrp_ndiainicial' 		=> 1,
					'targrp_ndiafinal' 			=> 1
					)
				);
			$this->tarifa_media->diaria = $diaria[0]->targrp_valor;
		$semanal = $this->getCI()->tarifagrupos_model->GetTarifaGrupos(
				array(
					'targrp_grp_id' 			=> $grupo_id,
					'targrp_ativo' 				=> 't',
					'targrp_ndiainicial' 		=> 7,
					'targrp_ndiafinal' 			=> 7
					)
				);
			$this->tarifa_media->semanal = $semanal[0]->targrp_valor;
		
		$quinzenal = $this->getCI()->tarifagrupos_model->GetTarifaGrupos(
				array(
					'targrp_grp_id' 			=> $grupo_id,
					'targrp_ativo' 				=> 't',
					'targrp_ndiainicial' 		=> 15,
					'targrp_ndiafinal' 			=> 15
					)
				);
			$this->tarifa_media->quinzenal = $quinzenal[0]->targrp_valor;
		
		$mensal = $this->getCI()->tarifagrupos_model->GetTarifaGrupos(
				array(
					'targrp_grp_id' 			=> $grupo_id,
					'targrp_ativo' 				=> 't',
					'targrp_ndiainicial' 		=> 30,
					'targrp_ndiafinal' 			=> 30
					)
				);
			if($mensal != NULL){$this->tarifa_media->mensal = $mensal[0]->targrp_valor;}else{$this->tarifa_media->mensal= NULL;};
	}
	
	private function getDados($grupo_id = NULL){
		if($grupo_id != NULL){
			$grupo = $this->getCI()->grupo_model->GetGrupo(array('grp_id' => $grupo_id));
			return $grupo;
		}else{
			return false;
		}
	}
	
	private function setFranquia($grupo_id = NULL){
		$this->franquia = $this->getDados($grupo_id)->grp_franquia;
		$this->franquia_terceiros = $this->getDados($grupo_id)->grp_franquia_terceiros;
		$this->caucao = $this->getDados($grupo_id)->grp_caucao;
	}
	
	private function setEspec($grupo_id = NULL){
		$grupoespec = $this->getCI()->grpespecassoc_model->GetGrpEspecAssoc(array('grpespecassoc_grp_id' => $grupo_id));
		foreach($grupoespec as $opc){
			switch ($opc->grpespec_id){
				case 1:
					$this->espec->duas_portas = TRUE;
					break;
				case 2:
					$this->espec->quatro_portas = TRUE;
					break;
				case 3:
					$this->espec->dh = TRUE;
					break;
				case 4:
					$this->espec->ac = TRUE;
					break;
				case 5:
					$this->espec->te = TRUE;
					break;
				case 6:
					$this->espec->cd = TRUE;
					break;
			}
		}
	}
	
	private function setNome($grupo_id = NULL){
		$this->nome = $this->getDados($grupo_id)->grp_nome;
	}
	
	private function setId($grupo_id = NULL){
		$this->id = (integer)$grupo_id;
	}
	
	private function setLoc($grupo_id = NULL){
		$this->locadora = $this->getDados($grupo_id)->grp_loc_id;
	}
	
	private function setCategoria($grupo_id = NULL){
		$this->categoria = (integer)$this->getDados($grupo_id)->grp_cat_id;
		$this->categoria_nome = $this->getDados($grupo_id)->cat_nome;
	}
	
	private function setCarros($grupo_id = NULL){
		if($grupo_id != NULL){
			$this->getCI()->load->library('carro');
			$this->carros = new Carro();
			$this->carros->getCarrosDispo($grupo_id);
		}else{
			$this->carros = "Carros não informados";	
		}
	}
	
	function getGruposDisponiveis($options = array()){
		$grupo = $this->getCI()->grupo_model->GetGrupo(array(
				'grp_loc_id' 	=> $options['locadora_id'],
				'grp_cat_id' 	=> $options['categoria_id']
			)
		);
		if($grupo != NULL){
			foreach($grupo as $grp){
				$grup[$grp->grp_id]->nome = $grp->grp_nome;
				$grup[$grp->grp_id]->categoria = (integer)$grp->grp_cat_id;
			}
			return $grup;
		}
	}
}

//end of file