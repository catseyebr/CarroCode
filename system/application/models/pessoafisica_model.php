<?php

class PessoaFisica_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	
	function AddPessoaFisica($options = array())
	{
		$postData = array();
		
		if(isset($options['cpf_id']))
			//integer
			$postData['cpf_id'] = $options['cpf_id'];
		
		//---------------------------------------------------
		
		if(isset($options['cpf_end_id'])){
			//integer
			$postData['cpf_end_id'] = $options['cpf_end_id'];
		}else{
			$postData['cpf_end_id'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cpf_nome'])){
			//varchar
			$postData['cpf_nome'] = $options['cpf_nome'];
		}else{
			$postData['cpf_nome'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cpf_sobrenome'])){
			//varchar
			$postData['cpf_sobrenome'] = $options['cpf_sobrenome'];
		}else{
			$postData['cpf_sobrenome'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cpf_passaporte'])){
			//varchar
			$postData['cpf_passaporte'] = $options['cpf_passaporte'];
		}else{
			$postData['cpf_passaporte'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cpf_numero'])){
			//varchar
			$postData['cpf_numero'] = $options['cpf_numero'];
		}else{
			$postData['cpf_numero'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cpf_sexo'])){
			//varchar
			$postData['cpf_sexo'] = $options['cpf_sexo'];
		}else{
			$postData['cpf_sexo'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cpf_rg'])){
			//varchar
			$postData['cpf_rg'] = $options['cpf_rg'];
		}else{
			$postData['cpf_rg'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cpf_dtnasc'])){
			//date
			$postData['cpf_dtnasc'] = $options['cpf_dtnasc'];
		}else{
			$postData['cpf_dtnasc'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cpf_ativo'])){
			//boolean
			$postData['cpf_ativo'] = $options['cpf_ativo'];
		}else{
			$postData['cpf_ativo'] = 'f';
		}
		
		//---------------------------------------------------
		
		if(isset($options['cpf_dthcadastro'])){
			//timestamp
			$postData['cpf_dthcadastro'] = $options['cpf_dthcadastro'];
		}else{
			$postData['cpf_dthcadastro'] = date("Y-m-d H:i:s");
		}
		
		//---------------------------------------------------
		
		if(isset($options['cpf_cargo'])){
			//timestamp
			$postData['cpf_cargo'] = $options['cpf_cargo'];
		}else{
			$postData['cpf_cargo'] = NULL;
		}
		
		//---------------------------------------------------
	
		$this->db->insert('pessoafisica', $postData);
		
		if(isset($options['cpf_id'])){
			if($postData['cpf_id'] >= $this->db->insert_id()){
				$next_sequence = $postData['cpf_id']+1;
				$this->db->simple_query("ALTER SEQUENCE pessoafisica_cpf_id_seq RESTART WITH $next_sequence");
			}
			return $postData['cpf_id'];
		}else{
			return $this->db->insert_id();
		}
	}
	
	function UpdatePessoaFisica($options = array())
	{
		if (!$this-> _required(
			Array('cpf_id', 'cpf_id'),
			$options)
		) return false;
		
		if(isset($options['cpf_end_id']))
			$this->db->set('cpf_end_id', $options['cpf_end_id']);
			
		if(isset($options['cpf_nome']))
			$this->db->set('cpf_nome', $options['cpf_nome']);
			
		if(isset($options['cpf_passaporte']))
			$this->db->set('cpf_passaporte', $options['cpf_passaporte']);
			
		if(isset($options['cpf_sobrenome']))
			$this->db->set('cpf_sobrenome', $options['cpf_sobrenome']);
			
		if(isset($options['cpf_numero']))
			$this->db->set('cpf_numero', $options['cpf_numero']);
			
		if(isset($options['cpf_sexo']))
			$this->db->set('cpf_sexo', $options['cpf_sexo']);
			
		if(isset($options['cpf_rg']))
			$this->db->set('cpf_rg', $options['cpf_rg']);
			
		if(isset($options['cpf_dtnasc']))
			$this->db->set('cpf_dtnasc', $options['cpf_dtnasc']);
			
		if(isset($options['cpf_ativo']))
			$this->db->set('cpf_ativo', $options['cpf_ativo']);
			
		if(isset($options['cpf_dthcadastro']))
			$this->db->set('cpf_dthcadastro', $options['cpf_dthcadastro']);
			
		$this->db->where('cpf_id', $options['cpf_id']);
		$this->db->update('pessoafisica');
		
		return $this->db->affected_rows();
	}
	
	function GetPessoaFisica($options = array())
	{
		if(isset($options['cpf_id']))
			$this->db->where('cpf_id', $options['cpf_id']);
			
		if(isset($options['cpf_end_id']))
			$this->db->where('cpf_end_id', $options['cpf_end_id']);
			
		if(isset($options['cpf_nome']))
			$this->db->where('cpf_nome', $options['cpf_nome']);
			
		if(isset($options['cpf_passaporte']))
			$this->db->where('cpf_passaporte', $options['cpf_passaporte']);
			
		if(isset($options['cpf_sobrenome']))
			$this->db->where('cpf_sobrenome', $options['cpf_sobrenome']);
			
		if(isset($options['cpf_numero']))
			$this->db->where('cpf_numero', $options['cpf_numero']);
			
		if(isset($options['cpf_sexo']))
			$this->db->where('cpf_sexo', $options['cpf_sexo']);
			
		if(isset($options['cpf_rg']))
			$this->db->where('cpf_rg', $options['cpf_rg']);
			
		if(isset($options['cpf_dtnasc']))
			$this->db->where('cpf_dtnasc', $options['cpf_dtnasc']);
			
		if(isset($options['cpf_ativo']))
			$this->db->where('cpf_ativo', $options['cpf_ativo']);
			
		if(isset($options['cpf_dthcadastro']))
			$this->db->where('cpf_dthcadastro', $options['cpf_dthcadastro']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('pessoafisica');

		if(isset($options['cpf_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeletePessoaFisica($options = array())
	{
    
		if (!$this-> _required(
			Array('cpf_id', 'cpf_id'),
			$options)
		) return false;
		
		$this->db->where('cpf_id', $options['cpf_id']);
    	$this->db->delete('pessoafisica');
	}
}

?>