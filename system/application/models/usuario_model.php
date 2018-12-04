<?php

class Usuario_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddUsuario($options = array())
	{
		$postData = array();
		
		if(isset($options['usu_id']))
			//integer
			$postData['usu_id'] = $options['usu_id'];
		
		//---------------------------------------------------
		
		if(isset($options['usu_login'])){
			//varchar
			$postData['usu_login'] = $options['usu_login'];
		}else{
			$postData['usu_login'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['usu_cpf_id'])){
			//varchar
			$postData['usu_cpf_id'] = $options['usu_cpf_id'];
		}else{
			$postData['usu_cpf_id'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['usu_senha'])){
			//varchar
			$postData['usu_senha'] = $options['usu_senha'];
		}else{
			$postData['usu_senha'] = '1234567';
		}
		
		//---------------------------------------------------
		
		if(isset($options['usu_ativo'])){
			//varchar
			$postData['usu_ativo'] = $options['usu_ativo'];
		}else{
			$postData['usu_ativo'] = 'f';
		}
		
		//---------------------------------------------------
		
		if(isset($options['usu_dthcadastro'])){
			//varchar
			$postData['usu_dthcadastro'] = $options['usu_dthcadastro'];
		}else{
			$postData['usu_dthcadastro'] = date("Y-m-d H:i:s");
		}
		
		//---------------------------------------------------
		
		$this->db->insert('usuario', $postData);
		
		if(isset($options['usu_id'])){
			if($postData['usu_id'] >= $this->db->insert_id()){
				$next_sequence = $postData['usu_id']+1;
				$this->db->simple_query("ALTER SEQUENCE usuario_usu_id_seq RESTART WITH $next_sequence");
			}
			return $postData['usu_id'];
		}else{
			return $this->db->insert_id();
		}
	}
	
	function UpdateUsuario($options = array())
	{
		if (!$this-> _required(
			Array('usu_id', 'usu_id'),
			$options)
		) return false;
		
		if(isset($options['usu_login']))
			$this->db->set('usu_login', $options['usu_login']);
			
		if(isset($options['usu_cpf_id']))
			$this->db->set('usu_cpf_id', $options['usu_cpf_id']);
			
		if(isset($options['usu_senha']))
			$this->db->set('usu_senha', $options['usu_senha']);
			
		$this->db->where('usu_id', $options['usu_id']);
		$this->db->update('usuario');
		
		return $this->db->affected_rows();
	}
	
	function GetUsuario($options = array())
	{
		if(isset($options['usu_id']))
			$this->db->where('usu_id', $options['usu_id']);
			
		if(isset($options['usu_login']))
			$this->db->where('usu_login', $options['usu_login']);
			
		if(isset($options['usu_cpf_id']))
			$this->db->where('usu_cpf_id', $options['usu_cpf_id']);
			
		if(isset($options['usu_senha']))
			$this->db->where('usu_senha', $options['usu_senha']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('usuario');

		if(isset($options['usu_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteUsuario($options = array())
	{
    
		if (!$this-> _required(
			Array('usu_id', 'usu_id'),
			$options)
		) return false;
		
		$this->db->where('usu_id', $options['usu_id']);
    	$this->db->delete('usuario');
	}
}

?>