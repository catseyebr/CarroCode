<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class TarifaCarro{
	
	public $valor_total;
	public $valor_taxas;
	public $valor_diarias;
	public $valor_hora_extra;
	public $valor_protecao;
	public $diarias;
	public $diaria_extra;
	public $valor_total_sem_protecao;
	public $valor_total_sem_taxas;
	public $data_inicial;
	public $data_final;
	public $hora_inicial;
	public $hora_final;
	public $week_inicial;
	public $week_final;
	public $taxa;
	public $taxa_loja;
	public $diaria_media;
	public $horas_extra;
	public $tarifa_regional;
	public $valor_protecao_total;
	public $valor_hora_extra_protecao;
	public $grupo;
	public $locadora;
	public $protecao;
	public $loja;
	public $tarDiario;
		
	function __construct()
	{
		$this->diaria_extra = FALSE;
	}
	
	private function getCI(){
		$CI =& get_instance();
		$CI->load->library('model');
		$CI->load->model('tarifagrupos_model','tarifagrupos_model',true);
		$CI->load->model('tarifaprotecoes_model','tarifaprotecoes_model',true);
		return $CI;
	}
	
	function setTarifa($grupo_id = NULL, $prot_id = NULL, $data_inicial = NULL, $data_final = NULL, $loja_id = NULL){
		$this->setGrupo($grupo_id);
		if(isset($this->grupo->locadora)){
			$this->setLoc($this->grupo->locadora);
		}
		$this->setProt($prot_id);
		$this->setLoj($loja_id);
		$this->setCarros($grupo_id);
		$this->data_inicial = $data_inicial;
		$this->data_final = $data_final;
		$this->calcPeriodo($data_inicial,$data_final);
	}
	
	function setTarifaDisponibilidade($options = array()){
		$this->grupo->nome 				= $options['grupo_nome'];
		$this->grupo->id 				= $options['grupo_id'];
		$this->locadora->nome 			= $options['locadora_nome'];
		$this->locadora->id 			= $options['locadora_id'];
		$this->locadora->taxa 			= $options['locadora_taxa'];
		$this->locadora->taxa_aero 		= $options['locadora_taxa_aero'];
		$this->locadora->hora_extra 	= $options['locadora_hora_extra'];
		$this->locadora->prazo_diaria 	= $options['locadora_prazo_diaria'];
		$this->locadora->hora_cortesia 	= $options['locadora_hora_cortesia'];
		$this->locadora->extra_opc 		= $options['locadora_extra_opc'];
		$this->setProt();
		$this->loja->nome				= $options['loja_nome'];
		$this->loja->id					= $options['loja_id'];
		$this->loja->aeroporto			= $options['loja_aeroporto'];
		$this->loja->valor_extra		= $options['loja_valor_extra'];
		$this->data_inicial 			= $options['data_inicial'];
		$this->data_final 				= $options['data_final'];
		$this->hora_inicial 			= $options['hora_inicial'];
		$this->hora_final 				= $options['hora_final'];
		$this->diarias					= $options['diarias'];
		$this->horas_extra				= $options['horas_extra'];
		if($this->loja->aeroporto == TRUE){
			$this->taxa = $this->locadora->taxa_aero;
		}else{
			$this->taxa = $this->locadora->taxa;
		}
		$this->calcPeriodo($this->data_inicial.'T'.$this->hora_inicial,$this->data_final.'T'.$this->hora_final);
	}
	
	private function getDadosTar($grp_id = NULL, $data_inicial = NULL, $data_final = NULL, $diarias = NULL){
		if($grp_id != NULL){
			$grp = $this->getCI()->tarifagrupos_model->GetTarifaGrupos(
				array(
					'targrp_grp_id' 			=> $grp_id,
					'targrp_ativo' 				=> 't',
					'targrp_ndiainicial' 		=> $diarias,
					'targrp_ndiafinal' 			=> $diarias,
					'targrp_validadeinicial' 	=> $data_inicial,
					'targrp_validadefinal' 		=> $data_final
					)
				);
			return $grp;
		}else{
			return false;
		}
	}
	
	private function getDadosTarProt($prot_id = NULL, $data_inicial = NULL, $data_final = NULL, $diarias = NULL, $grupo = NULL){
		if($prot_id != NULL){
			$prot = $this->getCI()->tarifaprotecoes_model->GetTarifaProtecoes(
				array(
					'tarprot_prot_id' 			=> $prot_id,
					'tarprot_ativo' 			=> 't',
					'tarprot_ndiainicial' 		=> $diarias,
					'tarprot_ndiafinal' 		=> $diarias,
					'tarprot_validadeinicial' 	=> $data_inicial,
					'tarprot_validadefinal' 	=> $data_final
				)
			);
			return $prot;
		}else{
			return false;
		}
	}
	
	private function setGrupo($grupo_id = NULL){
		if($grupo_id != NULL){
			$this->getCI()->load->library('grupo');
			$this->grupo = new Grupo();
			$this->grupo->setGrupo($grupo_id);
		}else{
			$this->grupo = "Grupo não informado";	
		}
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
	
	private function setProt($prot_id = NULL){
		$this->getCI()->load->library('protecao');
		$this->protecao = new Protecao();
		if($prot_id != NULL){
			$this->protecao->setProtecao($prot_id);
		}else{
			$this->protecao->setProtecaoPadrao($this->locadora->id, $this->grupo->id);
		}
		$this->protecao->getCalcTarifa();
	}
	
	private function setLoc($loc_id = NULL){
		if($loc_id != NULL){
			$this->getCI()->load->library('locadora');
			$this->locadora = new Locadora();
			$this->locadora->setLocadora($loc_id);
			$this->locadora->getCalcTarifa();
			$this->locadora->getFormasPagamento();
		}else{
			$this->locadora = "Locadora não informada";	
		}
	}
	
	private function setLoj($loj_id = NULL){
		if($loj_id != NULL){
			$this->getCI()->load->library('loja');
			$this->loja = new Loja();
			$this->loja->setLoja($loj_id);
			
			if($this->loja->aeroporto == TRUE){
				$this->taxa = $this->locadora->taxa_aero;
			}else{
				$this->taxa = $this->locadora->taxa;
			}
			$this->taxa_loja = $this->loja->valor_extra;
		}else{
			$this->loja = "Loja não informada";	
		}
	}
	
	function getLojasDisponiveis($city_ret, $city_dev){
		$this->getCI()->load->library('loja');
		$this->lojas_disponiveis = new Loja();
		$this->lojas_disponiveis->getLojasDispo(array(
				'hora_inicial'			=> $this->hora_inicial,
				'hora_final'			=> $this->hora_final,
				'weekday_inicial'		=> $this->week_inicial,
				'weekday_final'			=> $this->week_final,
				'cidadeRetirada'		=> $city_ret,
				'cidadeDevolucao'		=> $city_dev,
				'loc_id'				=> $this->locadora->id
			)
		);
	}
	
	private function calcPeriodo($data_inicial = NULL, $data_final = NULL){
		if($data_inicial != NULL && $data_final != NULL){
			
			$dtIni = explode('T',$data_inicial);
			
			$ano_inicio = substr($dtIni[0],0,4);
			$mes_inicio = substr($dtIni[0],5,2);
			$dia_inicio = substr($dtIni[0],8,2);
			
			$timeIni = explode(':',$dtIni[1]);
			$horaIni = $timeIni[0];
			$minutoIni = $timeIni[1];
			if(isset($timeIni[2])){
				$segundoIni = $timeIni[2];
			}else{
				$segundoIni = 0;
			}
			
			$dtEnd = explode('T',$data_final);
			
			$ano_final = substr($dtEnd[0],0,4);
			$mes_final = substr($dtEnd[0],5,2);
			$dia_final = substr($dtEnd[0],8,2);
			
			$timeEnd  = explode(':',$dtEnd[1]);
			$horaEnd = $timeEnd[0];
			$minutoEnd = $timeEnd[1];
			if(isset($timeEnd[2])){
				$segundoEnd = $timeEnd[2];
			}else{
				$segundoEnd = 0;
			}
			
			$data_ini_calc = mktime($horaIni,$minutoIni,$segundoIni,$mes_inicio,$dia_inicio,$ano_inicio);
			$data_fin_calc = mktime($horaEnd,$minutoEnd,$segundoEnd,$mes_final,$dia_final,$ano_final);
			$diasemana_inicio = date("w", mktime(0,0,0,$mes_inicio,$dia_inicio,$ano_inicio));
			$diasemana_final = date("w", mktime(0,0,0,$mes_final,$dia_final,$ano_final));
			$horas = ($data_fin_calc - $data_ini_calc)/3600;
			$minutos1 = ($horaIni * 60) + ($minutoIni);
			$minutos2 = ($horaEnd * 60) + ($minutoEnd);
			$minutos = $minutos2 - $minutos1;
						
			if($horas < 24){
				$this->diarias = 1;	
				$this->horas_extra = 0;
			}else{
				$minutos_extra = ($minutos%1440)%60;
				$this->horas_extra = ($minutos%1440)/60;
				$this->diarias = (integer)($horas-($this->horas_extra))/24;
				if($this->horas_extra < 1 && $this->horas_extra > 0){
					$this->horas_extra = 1;
				}else{
					$this->horas_extra = (integer)(($minutos-$minutos_extra)%1440)/60;	
				}
			}
			
			$this->data_inicial = $dtIni[0];
			$this->data_final = $dtEnd[0];
			$this->hora_inicial = $dtIni[1];
			$this->hora_final = $dtEnd[1];
			$this->week_inicial = (integer)$diasemana_inicio;
			$this->week_final = (integer)$diasemana_final;
			
			for($i = 0; $i < $this->diarias; $i++){
				$this->tarDiario[]->data = date("Y-m-d",mktime($horaIni,$minutoIni,$segundoIni,$mes_inicio,date($dia_inicio) + $i,$ano_inicio));
			}
		}else{
			if($this->data_inicial != NULL){$this->data_inicial = "Data de Retirada Inválida";}
			elseif($this->data_final != NULL){$this->data_final = "Data de Devolução Inválida";}
		}
		if($this->diarias <= 30){
			$this->calcValorDiario();
		}
	}
	
	private function calcValorDiario(){
		foreach($this->tarDiario as $tarifa_diario){
				$this->tarifa_regional = $this->taxa_loja / 100;
				$tarifa = $this->getDadosTar($this->grupo->id, $this->data_inicial, $this->data_final, $this->diarias);
				$tarifa_protecao = $this->getDadosTarProt($this->protecao->id, $this->data_inicial, $this->data_final, $this->diarias, $this->grupo->id);
				
				$tarifa_diaria = $tarifa[0]->targrp_valor / $tarifa[0]->targrp_ndiainicial;
				$protecao_diaria = $tarifa_protecao[0]->tarprot_valor / $tarifa_protecao[0]->tarprot_ndiainicial;
				
				$tarifa_diario->valor = $tarifa_diaria * ($this->tarifa_regional + 1);
				$tarifa_diario->protecao = (float)$protecao_diaria;
				$this->grupo->km = $tarifa[0]->targrp_km;
			}
			$this->calcHoraExtra();
	}
	
	private function calcHoraExtra(){
		$hora_residual = $this->horas_extra - $this->locadora->hora_cortesia;
		$soma_extra = $this->locadora->hora_extra + $this->locadora->hora_cortesia;
		$hora_extra1 = end($this->tarDiario)->valor / $this->locadora->hora_extra;
				
		if($this->horas_extra > $this->locadora->prazo_diaria){
			$this->valor_hora_extra = round($hora_extra1 * $hora_residual,2);
			
			
			if($this->horas_extra > $soma_extra){
				$this->valor_hora_extra = end($this->tarDiario)->valor;
				$this->diaria_extra = TRUE;
			}
			
			if($this->protecao->hora_extra == TRUE){
				$prot_extra1 = (end($this->tarDiario)->protecao / $this->protecao->div_hora_extra);
				if($hora_residual < $this->protecao->limite_horas){
					$this->valor_hora_extra_protecao = round($prot_extra1 * $hora_residual,2);
				}else{
					$this->valor_hora_extra_protecao = end($this->tarDiario)->protecao;	
				}
			}
			
			if($this->locadora->extra_opc == TRUE){
				$this->valor_hora_extra_protecao = end($this->tarDiario)->protecao;	
			}
		}
		
		$this->calcValorTotal();
	}
	
	private function calcValorTotal(){
		foreach($this->tarDiario as $tarifa_diario){
			$this->valor_diarias += $tarifa_diario->valor;
			$this->valor_protecao += $tarifa_diario->protecao;
		}

		$this->valor_protecao += $this->valor_hora_extra_protecao;
		
		$this->valor_taxas = round((($this->valor_diarias + $this->valor_hora_extra + $this->valor_protecao)* $this->taxa)/100,2);
		
		$this->valor_total = $this->valor_diarias + $this->valor_taxas + $this->valor_hora_extra + $this->valor_protecao;
		$this->diaria_media = ($this->valor_diarias / $this->diarias) + ($this->valor_protecao / $this->diarias);
	}
}

//end of file