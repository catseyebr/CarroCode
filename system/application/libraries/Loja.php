<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Loja{
	
	public $nome;
	public $id;
	public $aeroporto;
	public $horarios;
	public $locadora;
	
	function __construct()
	{
		
	}
	
	function setLoja($loj_id){
		if($loj_id != NULL){
			$this->setNome($loj_id);
			$this->setId($loj_id);
			$this->setLink($loj_id);
			$this->setAero($loj_id);
			$this->setValorExtra($loj_id);
			$this->setLocadora($loj_id);
		}else{
			return false;	
		}
	}
	
	private function getDados($loj_id = NULL){
		if($loj_id != NULL){
			$loja = $this->getCI()->loja_model->GetLoja(array('loj_id' => $loj_id));
			return $loja[0];
		}else{
			return false;
		}
	}
	
	function getLojasDisponiveis($options = array()){
		$lojaRetira = $this->getCI()->horariolojas_model->GetHorarioLojas(array(
				'hloj_horainicial' 	=> $options['hora_inicial'],
				'hloj_horafinal' 	=> $options['hora_inicial'],
				'hloj_weekday' 		=> $options['weekday_inicial'],
				'hloj_ativo' 		=> 't',
				'loj_city_id' 		=> $options['cidadeRetirada']
			)
		);
		foreach($lojaRetira as $ljret){
			$retirada->locadoras[(integer)$ljret->loc_id] = $ljret->loc_nomelocadora;
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
			$devolucao->locadoras[(integer)$ljdev->loc_id] = $ljdev->loc_nomelocadora;
		}
		$this->lojas_disponiveis->locadoras_disponiveis = array_intersect($devolucao->locadoras,$retirada->locadoras);
	}
	
	function getLojasDispo($options = array()){
		$lojaRetira = $this->getCI()->horariolojas_model->GetHorarioLojas(array(
				'hloj_horainicial' 	=> $options['hora_inicial'],
				'hloj_horafinal' 	=> $options['hora_inicial'],
				'hloj_weekday' 		=> $options['weekday_inicial'],
				'hloj_ativo' 		=> 't',
				'loj_city_id' 		=> $options['cidadeRetirada'],
				'loc_id' 			=> $options['loc_id'],
				'sortBy'			=> 'loj_nome',
				'sortDirection'		=> 'ASC',
				'join_endereco'		=> 'endereco'
			)
		);
		foreach($lojaRetira as $ljret){
			$this->retirada[] = $ljret;
		}
		
		$lojaDevolve = $this->getCI()->horariolojas_model->GetHorarioLojas(array(
				'hloj_horainicial' 	=> $options['hora_final'],
				'hloj_horafinal' 	=> $options['hora_final'],
				'hloj_weekday' 		=> $options['weekday_final'],
				'hloj_ativo' 		=> 't',
				'loj_city_id' 		=> $options['cidadeDevolucao'],
				'loc_id' 			=> $options['loc_id'],
				'sortBy'			=> 'loj_nome',
				'sortDirection'		=> 'ASC',
				'join_endereco'		=> 'endereco'
			)
		);
		foreach($lojaDevolve as $ljdev){
			$this->devolucao[] = $ljdev;
		}
	}
	
	private function setNome($loj_id = NULL){
		$this->nome = $this->getDados($loj_id)->loj_nome;
	}
	
	private function setLocadora($loj_id = NULL){
		$this->locadora = $this->getDados($loj_id)->loj_loc_id;
	}
	
	private function setId($loj_id = NULL){
		$this->id = (integer)$loj_id;
	}
	
	private function setAero($loj_id = NULL){
		$this->aeroporto = (boolean)($this->getDados($loj_id)->loj_aero == 't')? TRUE : FALSE;
	}
	
	private function setValorExtra($loj_id = NULL){
		$this->valor_extra = (float)$this->getDados($loj_id)->loj_valorextra;
	}
	
	private function getCI(){
		$CI =& get_instance();
		$CI->load->library('model');
		$CI->load->model('loja_model','loja_model',true);
		$CI->load->model('pagina_model','pagina_model',true);
		$CI->load->model('horariolojas_model','horariolojas_model',true);
		return $CI;
	}
	
	function setEndereco($loj_id){
		$this->getCI()->load->library('endereco');
		$this->endereco = new Endereco();
		$this->endereco->setEndereco((integer)$this->getDados($loj_id)->loj_end_id);
	}
	
	private function setLink($loj_id){
		$pag_met_id = (integer)$this->getDados($loj_id)->loj_met_id;
		$link = $this->getCI()->pagina_model->GetPagina(array('pag_met_id' => $pag_met_id, 'pag_proj_id' => PROJETO));
		$this->link = $link[0]->pag_url;
	}
	
	function getEndereco(){
		$this->setEndereco($this->id);
	}
}

//end of file