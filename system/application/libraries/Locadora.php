<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Locadora{
	
	public $nome;
	public $id;
	public $link;
	
	function __construct(){
		$this->nome 	= NULL;
		$this->id		= NULL;
	}
	
	function setLocadora($loc_id = NULL){
		if($loc_id != NULL){
			$this->setNome($loc_id);
			$this->setId($loc_id);
			$this->setLink($loc_id);
		}else{
			return false;	
		}
	}
	
	function loadData(){
		if($this->id != NULL){
			$this->setCnpj();	
			$this->setTextoLivre();
			$this->setLojas();
			$this->getGrupos();
			$this->setMaisInfo();
			$this->getCidades();
		}else{
			return false;	
		}
	}
	
	function getCalcTarifa(){
		if($this->id != NULL){
			$this->setTaxa($this->id);
			$this->setTaxaAero($this->id);
			$this->setHoraExtra($this->id);
			$this->setPrazoDiaria($this->id);
			$this->setHoraCortesia($this->id);
			$this->setExtraOpc($this->id);
		}else{
			return false;
		}
	}
	
	function getFormasPagamento(){
		$this->cnpj_id = $this->getDados($this->id)->loc_cnpj_id;
		$result = $this->getCI()->pjformapagamento_model->Getpjformapagamento(array('pjfrmpag_cnpj_id' => $this->cnpj_id));
		foreach($result as $res){
			$this->formas_pagamento->forma[$res->frmpag_id] = $res->frmpag_nome;
		}
		$this->formas_pagamento->parc_minima = $res->pjfrmpag_minima;
		$this->formas_pagamento->parcelamento = $res->pjfrmpag_parcelas;
	}
	
	private function setNome($loc_id = NULL){
		if($loc_id != NULL){
			$this->nome = $this->getDados($loc_id)->loc_nomelocadora;
		}
	}
	
	private function setId($loc_id = NULL){
		$this->id = (integer)$loc_id;
	}
	
	private function setTextoLivre(){
		$this->texto_livre = $this->getDados($this->id)->loc_texto_livre;
	}
	
	private function setMaisInfo(){
		$this->mais_info = $this->getDados($this->id)->loc_maisinfo;
	}
	
	private function setTaxa($loc_id = NULL){
		if($loc_id != NULL){
			$this->taxa = (float)$this->getDados($loc_id)->loc_taxas;
		}
	}
	
	private function setTaxaAero($loc_id = NULL){
		if($loc_id != NULL){
			$this->taxa_aero = (float)$this->getDados($loc_id)->loc_taxasaero;
		}
	}
	
	private function setHoraExtra($loc_id = NULL){
		if($loc_id != NULL){
			$this->hora_extra = (integer)$this->getDados($loc_id)->loc_horaextra;
		}
	}
	
	private function setPrazoDiaria($loc_id = NULL){
		if($loc_id != NULL){
			$this->prazo_diaria = (integer)$this->getDados($loc_id)->loc_prazodiaria;
		}
	}
	
	private function setHoraCortesia($loc_id = NULL){
		if($loc_id != NULL){
			$this->hora_cortesia = (integer)$this->getDados($loc_id)->loc_horacortesia;
		}
	}
	
	private function setExtraOpc($loc_id = NULL){
		if($loc_id != NULL){
			$this->extra_opc = (boolean)($this->getDados($loc_id)->loc_extra_opc == 't')? TRUE : FALSE;
		}
	}
	
	private function setCnpj(){
		$this->getCI()->load->library('cnpj');
		$this->cnpj = new Cnpj();
		$this->cnpj->setCnpj((integer)$this->getDados($this->id)->loc_cnpj_id);
	}
	
	private function setLink($loc_id){
		$pag_met_id = (integer)$this->getDados($loc_id)->loc_met_id;
		$link = $this->getCI()->pagina_model->GetPagina(array('pag_met_id' => $pag_met_id, 'pag_proj_id' => PROJETO));
		$this->link = $link[0]->pag_url;
		$this->link_titulo = $link[0]->pag_link_titulo;
	}
	
	private function setLojas(){
		$this->getCI()->load->library('loja');
		$lojas = $this->getLojasAtivas($this->id);
		foreach($lojas as $lojs){
			$loja[$lojs] = new Loja();
			$loja[$lojs]->setLoja($lojs);
			$loja[$lojs]->setEndereco($lojs);
		}
		$this->lojas = $loja;
	}
	
	private function getDados($loc_id = NULL){
		if($loc_id != NULL){
			$locadora = $this->getCI()->locadora_model->GetLocadora(array('loc_id' => $loc_id));
			return $locadora[0];
		}else{
			return false;
		}
	}
	
	private function getCI(){
		$CI =& get_instance();
		$CI->load->library('model');
		$CI->load->model('locadora_model','locadora_model',true);
		$CI->load->model('loja_model','loja_model',true);
		$CI->load->model('grupo_model','grupo_model',true);
		$CI->load->model('pagina_model','pagina_model',true);
		$CI->load->model('horariolojas_model','horariolojas_model',true);
		$CI->load->model('pjformapagamento_model','pjformapagamento_model',true);
		return $CI;
	}
	
	function getCnpj(){
		$this->setCnpj($this->id);
	}
	
	function getLojas(){
		$this->setLojas($this->id);
	}
	
	function getLojasAtivas($loc_id = NULL){
		$result = $this->getCI()->loja_model->GetLoja(array('loj_ativo' => 't', 'loj_loc_id' => $loc_id, 'sortBy' => 'loj_nome', 'sortDirection' => 'ASC'));
		foreach($result as $lojs){
			$ativas[] = (integer)$lojs->loj_id;
		}
		return $ativas;
	}
	
	function getGruposAtivos(){
		$result = $this->getCI()->grupo_model->GetGrupo(array('grp_loc_id' => $this->id));
		foreach($result as $grp){
			$grps[] = (integer)$grp->grp_id;
		}
		return $grps;
	}
	
	function getGrupos(){
		$this->getCI()->load->library('grupo');
		$grps = $this->getGruposAtivos($this->id);
		foreach($grps as $grp){
			$gr[$grp] = new Grupo();
			$gr[$grp]->setGrupo($grp);
			$gr[$grp]->setTarifaMedia($grp);
		}
		$this->grupos = $gr;
	}
	
	function getCidades(){
		$this->lojasCidades = $this->getCI()->loja_model->GetCidades(array('loc_id' => $this->id));
	}
	
	function getProtecoes(){
		if($this->locadora!=NULL){
			return $this->locadora->loc_id;
		}else if ($this->locadoras!=NULL){
			foreach($this->locadoras as $locs){
				$this->id_locadora[] = (integer)$locs->loc_id;	
			}
			return $this->id_locadora;
		}
	}
	
	function getLocadorasDisponiveis($options = array()){
		$lojaRetira = $this->getCI()->horariolojas_model->GetHorarioLojas(array(
				'hloj_horainicial' 	=> $options['hora_inicial'],
				'hloj_horafinal' 	=> $options['hora_inicial'],
				'hloj_weekday' 		=> $options['weekday_inicial'],
				'hloj_ativo' 		=> 't',
				'loj_city_id' 		=> $options['cidadeRetirada']
			)
		);
		foreach($lojaRetira as $ljret){
			$retirada->locadoras[(integer)$ljret->loc_id]['loc_nomelocadora'] = $ljret->loc_nomelocadora;
			$retirada->locadoras[(integer)$ljret->loc_id]['loc_taxa'] = (float)$ljret->loc_taxas;
			$retirada->locadoras[(integer)$ljret->loc_id]['loc_taxa_aero'] = (float)$ljret->loc_taxasaero;
			$retirada->locadoras[(integer)$ljret->loc_id]['loc_hora_extra'] = (integer)$ljret->loc_horaextra;
			$retirada->locadoras[(integer)$ljret->loc_id]['loc_prazo_diaria'] = (integer)$ljret->loc_prazodiaria;
			$retirada->locadoras[(integer)$ljret->loc_id]['loc_hora_cortesia'] = (integer)$ljret->loc_horacortesia;
			$retirada->locadoras[(integer)$ljret->loc_id]['loc_extra_opc'] = (boolean)($ljret->loc_extra_opc == 't')? TRUE : FALSE;
			$retirada->locadoras[(integer)$ljret->loc_id]['loj_id'] = (integer)$ljret->loj_id;
			$retirada->locadoras[(integer)$ljret->loc_id]['loj_nome'] = $ljret->loj_nome;
			$retirada->locadoras[(integer)$ljret->loc_id]['loj_aeroporto'] = (boolean)($ljret->loj_aero == 't')? TRUE : FALSE;
			$retirada->locadoras[(integer)$ljret->loc_id]['loj_valor_extra'] = (float)$ljret->loj_valorextra;
		}
		
		$lojaDevolve = $this->getCI()->horariolojas_model->GetHorarioLojas(array(
				'hloj_horainicial' 	=> $options['hora_final'],
				'hloj_horafinal' 	=> $options['hora_final'],
				'hloj_weekday' 		=> $options['weekday_final'],
				'hloj_ativo' 		=> 't',
				'loj_city_id' 		=> $options['cidadeDevolucao']
			)
		);
		foreach($lojaDevolve as $ljdev){
			$devolucao->locadoras[(integer)$ljdev->loc_id]['loc_nomelocadora'] = $ljdev->loc_nomelocadora;
			$devolucao->locadoras[(integer)$ljdev->loc_id]['loc_taxa'] = (float)$ljdev->loc_taxas;
			$devolucao->locadoras[(integer)$ljdev->loc_id]['loc_taxa_aero'] = (float)$ljdev->loc_taxasaero;
			$devolucao->locadoras[(integer)$ljdev->loc_id]['loc_hora_extra'] = (integer)$ljdev->loc_horaextra;
			$devolucao->locadoras[(integer)$ljdev->loc_id]['loc_prazo_diaria'] = (integer)$ljdev->loc_prazodiaria;
			$devolucao->locadoras[(integer)$ljdev->loc_id]['loc_hora_cortesia'] = (integer)$ljdev->loc_horacortesia;
			$devolucao->locadoras[(integer)$ljdev->loc_id]['loc_extra_opc'] = (boolean)($ljdev->loc_extra_opc == 't')? TRUE : FALSE;
			$devolucao->locadoras[(integer)$ljdev->loc_id]['loj_id'] = (integer)$ljdev->loj_id;
			$devolucao->locadoras[(integer)$ljdev->loc_id]['loj_nome'] = $ljdev->loj_nome;
			$devolucao->locadoras[(integer)$ljdev->loc_id]['loj_aeroporto'] = (boolean)($ljdev->loj_aero == 't')? TRUE : FALSE;
			$devolucao->locadoras[(integer)$ljdev->loc_id]['loj_valor_extra'] = (float)$ljdev->loj_valorextra;
		}
		if(isset($devolucao->locadoras) && isset($retirada->locadoras)){
			$array_disponivel = array_intersect($devolucao->locadoras,$retirada->locadoras);
		function so ($a, $b) { return (strcmp ($a['loc_nomelocadora'],$b['loc_nomelocadora']));    }
		uasort($array_disponivel, 'so');
		}
		
		if(isset($array_disponivel)){
			return $array_disponivel;
		}else{
			return FALSE;	
		}
	}
	
}

//end of file