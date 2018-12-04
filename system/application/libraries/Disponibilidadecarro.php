<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class DisponibilidadeCarro{
	
	public $data_inicial;
	public $data_final;
	public $hora_inicial;
	public $hora_final;
	public $cidadeRetirada;
	public $cidadeDevolucao;
		
	function __construct()
	{
		
	}
	
	private function getCI(){
		$CI =& get_instance();
		$CI->load->library('model');
		$CI->load->model('cidade_model','cidade_model',true);
		$CI->load->model('categoria_model','categoria_model',true);
		return $CI;
	}
	
	function setDisponibilidade($options = array()){
		$this->calcPeriodo($options['data_inicial'], $options['data_final']);
		$this->cidadeRetirada = $this->setCidade($options['cidadeRetirada_nome'], $options['cidadeRetirada_id'], $options['estadoRetirada_id']);
		$this->cidadeDevolucao = $this->setCidade($options['cidadeDevolucao_nome'], $options['cidadeDevolucao_id'], $options['estadoDevolucao_id']);
		$this->getLocadorasDisponiveis();
		
		if(isset($options['categoriaSelecionada'])){
			$this->getCategorias($options['categoriaSelecionada']);
		}else{
			$this->getCategorias();
		}
		
		$this->getGruposDiponiveis();
	}
	
	private function setCidade($cidade_nome = NULL, $cidade_id = NULL, $estado_id = NULL){
		if($cidade_id != NULL){
			$cidade = $this->getCI()->cidade_model->GetCidade(array('city_id' => $cidade_id));
			return $cidade;
		}else if($cidade_nome != NULL){
			$cidade = $this->getCI()->cidade_model->GetCidadeId(array('city_nome' => $cidade_nome, 'city_uf_id' => $estado_id));
			return $cidade;
		}else{
			return "Cidade inválida";
		}
	}
	
	private function getCategorias($cat_id = NULL){
		if($cat_id != NULL){
			$cat = $this->getCI()->categoria_model->GetCategoria(array('cat_id' => $cat_id, 'sortBy' => 'cat_ordem', 'sortDirection' => 'ASC'));
			$this->categorias_disponiveis[$cat->cat_id] = $cat->cat_nome;
		}else{
			$cat = $this->getCI()->categoria_model->GetCategoria(array('sortBy' => 'cat_ordem', 'sortDirection' => 'ASC'));
			foreach($cat as $ca){
				$this->categorias_disponiveis[$ca->cat_id]->nome = $ca->cat_nome;
				$this->categorias_disponiveis[$ca->cat_id]->id = $ca->cat_id;
				$this->categorias_disponiveis[$ca->cat_id]->classe = $ca->cat_classe;
			}
		}
	}
	
	private function getGruposDiponiveis(){
		$this->getCI()->load->library('grupo');
		$dispo_grp = new Grupo();
		if($this->locadoras_disponiveis != 'Nenhuma locadora disponível no local e horários informados'){
			foreach($this->categorias_disponiveis as $cat_id => $val_cat){
				$real_val=0;
				foreach($this->locadoras_disponiveis as $loc_id => $valores){
						$grup = $dispo_grp->getGruposDisponiveis(array(
								'data_inicial' 			=> $this->data_inicial,
								'data_final'			=> $this->data_final,
								'hora_inicial'			=> $this->hora_inicial,
								'hora_final'			=> $this->hora_final,
								'weekday_inicial'		=> $this->week_inicial,
								'weekday_final'			=> $this->week_final,
								'cidadeRetirada'		=> $this->cidadeRetirada,
								'cidadeDevolucao'		=> $this->cidadeDevolucao,
								'locadora_id'			=> $loc_id,
								'categoria_id'			=> $cat_id
							)
						);
					if($grup != NULL){
						$grupos_disponiveis[$loc_id] = $grup;
						$real_val ++;
					}else{
						$grupos_disponiveis[$loc_id] = 'Categoria não disponível';
					}
				}
				if(isset($grupos_disponiveis)){
					$this->grupos_disponiveis[$cat_id] = $grupos_disponiveis;
				}
				$this->categorias_disponiveis[$cat_id]->real_val = $real_val;
			}
			
		}
		$this->setTarifas();
	}
		
	private function getLocadorasDisponiveis(){
		$this->getCI()->load->library('locadora');
		$dispo_loc = new Locadora();
		$loca = $dispo_loc->getLocadorasDisponiveis(array(
				'data_inicial' 			=> $this->data_inicial,
				'data_final'			=> $this->data_final,
				'hora_inicial'			=> $this->hora_inicial,
				'hora_final'			=> $this->hora_final,
				'weekday_inicial'		=> $this->week_inicial,
				'weekday_final'			=> $this->week_final,
				'cidadeRetirada'		=> $this->cidadeRetirada,
				'cidadeDevolucao'		=> $this->cidadeDevolucao
			)
		);	
		if($loca){
			$this->locadoras_disponiveis = $loca;
		}else{
			$this->locadoras_disponiveis = "Nenhuma locadora disponível no local e horários informados";
		}
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
			
		}else{
			if($this->data_inicial != NULL){$this->data_inicial = "Data de Retirada Inválida";}
			elseif($this->data_final != NULL){$this->data_final = "Data de Devolução Inválida";}
		}
	}
	
	private function setTarifas(){
		if(isset($this->grupos_disponiveis)){
			foreach($this->grupos_disponiveis as $cat_id => $cat_value){
				if($this->categorias_disponiveis[$cat_id]->real_val > 0){
					foreach($cat_value as $loc_id => $loc_value){
						if($loc_value != 'Categoria não disponível'){
							foreach($loc_value as $grp_id => $grp_obj){
								$this->getCI()->load->library('tarifacarro');
								$grp_obj->tarifas = new TarifaCarro();
								$grp_obj->tarifas->setTarifaDisponibilidade(array(
										'grupo_nome' 				=> $grp_obj->nome,
										'grupo_id' 					=> $grp_id,
										'locadora_nome' 			=> $this->locadoras_disponiveis[$loc_id]['loc_nomelocadora'],
										'locadora_id' 				=> $loc_id,
										'locadora_taxa' 			=> $this->locadoras_disponiveis[$loc_id]['loc_taxa'],
										'locadora_taxa_aero' 		=> $this->locadoras_disponiveis[$loc_id]['loc_taxa_aero'],
										'locadora_hora_extra' 		=> $this->locadoras_disponiveis[$loc_id]['loc_hora_extra'],
										'locadora_prazo_diaria' 	=> $this->locadoras_disponiveis[$loc_id]['loc_prazo_diaria'],
										'locadora_hora_cortesia' 	=> $this->locadoras_disponiveis[$loc_id]['loc_hora_cortesia'],
										'locadora_extra_opc' 		=> $this->locadoras_disponiveis[$loc_id]['loc_extra_opc'],
										'loja_nome'					=> $this->locadoras_disponiveis[$loc_id]['loj_nome'],
										'loja_id'					=> $this->locadoras_disponiveis[$loc_id]['loj_id'],
										'loja_aeroporto'			=> $this->locadoras_disponiveis[$loc_id]['loj_aeroporto'],
										'loja_valor_extra'			=> $this->locadoras_disponiveis[$loc_id]['loj_valor_extra'],
										'data_inicial' 				=> $this->data_inicial,
										'data_final'				=> $this->data_final,
										'hora_inicial'				=> $this->hora_inicial,
										'hora_final'				=> $this->hora_final,
										'diarias'					=> $this->diarias,
										'horas_extra'				=> $this->horas_extra,
									)
								);
								//$this->vet_ordem_valores[]=array('categoria' => $cat_id, 'valor' => $grp_obj->tarifas->diaria_media, 'id_loc' => $loc_id);
							}
						}$this->vet_ordem_valores[]=array('categoria' => $this->categorias_disponiveis[$cat_id]->classe, 'valor' => $grp_obj->tarifas->valor_total, 'id_loc' => $loc_id);
					}
				}else{
					unset($this->grupos_disponiveis[$cat_id]);
				}
			}
		}
	}
}

//end of file