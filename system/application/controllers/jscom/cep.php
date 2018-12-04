<?php
class Cep extends Controller {
	public function exibir () {
    	parent::Controller();
    	$this->load->model('cep_model');
    	$cod = $this->input->post('cep');
    	$cod = str_replace("-","",$cod);
    	$this->cep = $this->cep_model->GetCep(array('cep_codigo' => $cod));
    	echo json_encode($this->cep[0]);
  	}
	public function carregaCidade () {
    	parent::Controller();
    	$this->load->model('cidade_model');
    	$uf = $this->input->post('estado');
    	$this->city = $this->cidade_model->GetCidade(array('city_uf_id' => $uf, 'sortBy' => 'city_nome', 'sortDirection' => 'ASC'));
    	echo json_encode($this->city);
  	}
	
	public function carregaAutocomplete () {
    	parent::Controller();
    	$this->load->model('loja_model');
    	$q = strtolower('Po');//$this->input->post('q');
    	$this->city = $this->loja_model->GetLoja(array('city_nome' => $q));
		//print_r($this->city);
		$r="";
		for ($i = 0, $s = count($this->city) -1;$i <= $s;$i++) {
			$items[''.$this->city[$i]->city_nome.' - '.$this->city[$i]->city_nome.', '.$this->city[$i]->city_nome.', '.$this->city[$i]->city_nome.' lojas'] = $this->city[$i]->city_nome;
    }
    	foreach ($items as $key=>$value) {
			if (strpos(strtolower($value), $q) !== false) {
				$r = "$value\n";
			}
		}
		echo $r;
		}
	}