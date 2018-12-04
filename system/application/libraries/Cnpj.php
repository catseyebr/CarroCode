<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Cnpj{
	
	public $nome;
	public $id;
	public $endereco;
	
	function __construct($cnpj_id = NULL)
	{
		$this->nome 	= NULL;
		$this->id		= NULL;
		$this->endereco	= NULL;
	}
	
	private function getCI(){
		$CI =& get_instance();
		$CI->load->library('Model');
		$CI->load->model('pessoajuridica_model','pessoajuridica_model',true);
		return $CI;
	}
	
	function setCnpj($cnpj_id){
		$this->setNome($cnpj_id);
		$this->setId($cnpj_id);
	}
	
	private function getDados($cnpj_id = NULL){
		if($cnpj_id != NULL){
			$cnpj = $this->getCI()->pessoajuridica_model->GetPessoaJuridica(array('cnpj_id' => $cnpj_id));
			return $cnpj;
		}else{
			return false;
		}
	}
	
	private function setNome($cnpj_id = NULL){
		$this->nome = $this->getDados($cnpj_id)->cnpj_nomefantasia;
	}
	
	private function setId($cnpj_id = NULL){
		$this->id = (integer)$cnpj_id;
	}
	
	private function setEndereco($cnpj_id){
		$this->getCI()->load->library('endereco');
		$this->endereco = new Endereco();
		$this->endereco->setEndereco((integer)$this->getDados($cnpj_id)->cnpj_end_id);
	}
	
	function getEndereco(){
		$this->setEndereco($this->id);
	}
}

//end of file