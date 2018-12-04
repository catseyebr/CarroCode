<?php

class PessoaJuridica_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddPessoaJuridica($options = array())
	{
		$postData = array();
		
		if(isset($options['cnpj_stur_id'])){
			//integer
			$postData['cnpj_stur_id'] = $options['cnpj_stur_id'];
		}else{
			$postData['cnpj_stur_id'] = NULL;
		}
		
		//---------------------------------------------------
				
		if(isset($options['cnpj_end_id'])){
			//integer
			$postData['cnpj_end_id'] = $options['cnpj_end_id'];
		}else{
			$postData['cnpj_end_id'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cnpj_razaosoc'])){
			//varchar
			$postData['cnpj_razaosoc'] = $options['cnpj_razaosoc'];
		}else{
			$postData['cnpj_razaosoc'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cnpj_nomefantasia'])){
			//varchar
			$postData['cnpj_nomefantasia'] = $options['cnpj_nomefantasia'];
		}else{
			$postData['cnpj_nomefantasia'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cnpj_ie'])){
			//varchar
			$postData['cnpj_ie'] = $options['cnpj_ie'];
		}else{
			$postData['cnpj_ie'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cnpj_numero'])){
			//varchar
			$postData['cnpj_numero'] = $options['cnpj_numero'];
		}else{
			$postData['cnpj_numero'] = NULL;
		}
				
		//---------------------------------------------------
		
		if(isset($options['cnpj_dthcadastro'])){
			//timestamp
			$postData['cnpj_dthcadastro'] = $options['cnpj_dthcadastro'];
		}else{
			$postData['cnpj_dthcadastro'] = date("Y-m-d H:i:s");
		}
		
		//---------------------------------------------------
		
		if(isset($options['cnpj_codigo_web'])){
			//timestamp
			$postData['cnpj_codigo_web'] = $options['cnpj_codigo_web'];
		}else{
			$postData['cnpj_codigo_web'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cnpj_senha_web'])){
			//timestamp
			$postData['cnpj_senha_web'] = $options['cnpj_senha_web'];
		}else{
			$postData['cnpj_senha_web'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cnpj_credito'])){
			//timestamp
			$postData['cnpj_credito'] = $options['cnpj_credito'];
		}else{
			$postData['cnpj_credito'] = NULL;
		}
		
		//---------------------------------------------------
				
		$this->db->insert('pessoajuridica', $postData);
		
		return $this->db->insert_id();
	}
	
	function UpdatePessoaJuridica($options = array())
	{
		if (!$this-> _required(
			Array('cnpj_id', 'cnpj_id'),
			$options)
		) return false;
		
		if(isset($options['cnpj_end_id']))
			$this->db->set('cnpj_end_id', $options['cnpj_end_id']);
			
		if(isset($options['cnpj_stur_id']))
			$this->db->set('cnpj_stur_id', $options['cnpj_stur_id']);
			
		if(isset($options['cnpj_razaosoc']))
			$this->db->set('cnpj_razaosoc', $options['cnpj_razaosoc']);
			
		if(isset($options['cnpj_nomefantasia']))
			$this->db->set('cnpj_nomefantasia', $options['cnpj_nomefantasia']);
			
		if(isset($options['cnpj_ie']))
			$this->db->set('cnpj_ie', $options['cnpj_ie']);
			
		if(isset($options['cnpj_numero']))
			$this->db->set('cnpj_numero', $options['cnpj_numero']);
			
		if(isset($options['cnpj_codigo_web']))
			$this->db->set('cnpj_codigo_web', $options['cnpj_codigo_web']);
		
		if(isset($options['cnpj_senha_web']))
			$this->db->set('cnpj_senha_web', $options['cnpj_senha_web']);
			
		if(isset($options['cnpj_credito']))
			$this->db->set('cnpj_credito', $options['cnpj_credito']);
			
		$this->db->where('cnpj_id', $options['cnpj_id']);
		$this->db->update('pessoajuridica');
		
		return $this->db->affected_rows();
	}
	
	function GetPessoaJuridica($options = array())
	{
		if(isset($options['cnpj_id']))
			$this->db->where('cnpj_id', $options['cnpj_id']);
			
		if(isset($options['cnpj_stur_id']))
			$this->db->where('cnpj_stur_id', $options['cnpj_stur_id']);
			
		if(isset($options['cnpj_end_id']))
			$this->db->where('cnpj_end_id', $options['cnpj_end_id']);
			
		if(isset($options['cnpj_razaosoc']))
			$this->db->where('cnpj_razaosoc', $options['cnpj_razaosoc']);
			
		if(isset($options['cnpj_nomefantasia']))
			$this->db->where('cnpj_nomefantasia', $options['cnpj_nomefantasia']);
			
		if(isset($options['cnpj_ie']))
			$this->db->where('cnpj_ie', $options['cnpj_ie']);
			
		if(isset($options['cnpj_numero']))
			$this->db->where('cnpj_numero', $options['cnpj_numero']);
			
		if(isset($options['cnpj_codigo_web']))
			$this->db->where('cnpj_codigo_web', $options['cnpj_codigo_web']);
		
		if(isset($options['cnpj_senha_web']))
			$this->db->where('cnpj_senha_web', $options['cnpj_senha_web']);
			
		if(isset($options['cnpj_credito']))
			$this->db->where('cnpj_credito', $options['cnpj_credito']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('pessoajuridica');

		if(isset($options['cnpj_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeletePessoaJuridica($options = array())
	{
    
		if (!$this-> _required(
			Array('cnpj_id', 'cnpj_id'),
			$options)
		) return false;
		
		$this->db->where('cnpj_id', $options['cnpj_id']);
    	$this->db->delete('pessoajuridica');
	}
}

?>