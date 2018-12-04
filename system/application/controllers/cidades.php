<?php
class Cidades extends MyController {
	public $estados;
  
  public function Cidades () { 
		parent::__construct();	
  }
  
  public function Index () {
  	$hoteis = $this->get('hoteis_model', array(
				'hot_ativo' =>'1',
				'_join' => array('hoteis_enderecos', 'enderecos', 'portal_cidades', 'portal_estados'),
				'sortBy' => 'nome_cidade',
				'sortDirection' => 'ASC',
		));
  	
  	$this->estados = $ids_estados = array();
  	for ($i = 0, $s = count($hoteis); $i < $s; $i++) {
  		if (!in_array($hoteis[$i]->id_estado, $ids_estados)) {
  			$ids_estados[] = $hoteis[$i]->id_estado;
  			$ce = count($this->estados);
  			$this->estados[$ce] = new stdClass();
  			$this->estados[$ce]->id_estado   = $hoteis[$i]->id_estado;
  			$this->estados[$ce]->nome_estado = $hoteis[$i]->nome_estado;
  			$this->estados[$ce]->abr_estado  = $hoteis[$i]->abr_estado;
  			$this->estados[$ce]->dados       = array($hoteis[$i]);
  			$this->estados[$ce]->cidades     = array();
			} else {
				for ($j = 0, $c = count($this->estados); $j < $c; $j++) {
					if ($this->estados[$j]->id_estado == $hoteis[$i]->id_estado) {
						$this->estados[$j]->dados[] = $hoteis[$i];
						break;
					}
				} 
			}
		}
		
		for ($i = 0, $s = count($this->estados); $i < $s; $i++) {
			$id_cidades = array();
			for ($j = 0, $c = count($this->estados[$i]->dados); $j < $c; $j++) {
				if (!in_array($this->estados[$i]->dados[$j]->id_cidade, $id_cidades)) {
					$id_cidades[] = $this->estados[$i]->dados[$j]->id_cidade;
					$cc = count($this->estados[$i]->cidades);
					$this->estados[$i]->cidades[$cc] = new stdClass();
					$this->estados[$i]->cidades[$cc]->id_cidade   = $this->estados[$i]->dados[$j]->id_cidade;
					$this->estados[$i]->cidades[$cc]->nome_cidade = $this->estados[$i]->dados[$j]->nome_cidade;
					$this->estados[$i]->cidades[$cc]->uf_cidade   = $this->estados[$i]->dados[$j]->uf_cidade;
					$this->estados[$i]->cidades[$cc]->ddd_cidade  = $this->estados[$i]->dados[$j]->ddd_cidade;
				}
			}
			$tot_cidades = $this->estados[$i]->total_cidades = count($this->estados[$i]->cidades);
			$sobra_cidades = $tot_cidades % 3;
			$base_coluna = ($tot_cidades - $sobra_cidades)/3;
			$limite1 = ($sobra_cidades > 0) ? $base_coluna + 1 : $base_coluna;
			$limite2 = $limite1 + (($sobra_cidades > 1) ? $base_coluna + 1 : $base_coluna);
			$this->estados[$i]->matriz_colunas = array(0, $limite1, $limite2, $tot_cidades); 
			unset($this->estados[$i]->dados);
			unset($tot_cidades, $sobra_cidades, $base_coluna, $limite1, $limite2);
		}
		$this->load->view('lista_cidades');
	}
	
}

//end of file