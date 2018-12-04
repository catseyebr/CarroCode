<?php

class DepartamentoPj_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddDepartamentoPj($options = array())
	{
		if (!$this-> _required(
			Array('deppj_dep_id', 'deppj_dep_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('deppj_cnpj_id', 'deppj_cnpj_id'),
			$options)
		) return false;
		
		$postData['deppj_dep_id'] = $options['deppj_dep_id'];
		
		//---------------------------------------------------
		
		$postData['deppj_cnpj_id'] = $options['deppj_cnpj_id'];
		//---------------------------------------------------
		
		if(isset($options['deppj_nome'])){
			//varchar
			$postData['deppj_nome'] = $options['deppj_nome'];
		}else{
			$postData['deppj_nome'] = NULL;
		}
		
		//---------------------------------------------------
		
		
		$this->db->insert('departamentopj', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateDepartamentoPj($options = array())
	{
		if (!$this-> _required(
			Array('deppj_id', 'deppj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('deppj_dep_id', 'deppj_dep_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('deppj_cnpj_id', 'deppj_cnpj_id'),
			$options)
		) return false;
				
		if(isset($options['deppj_dep_id']))
			$this->db->set('deppj_dep_id', $options['deppj_dep_id']);
			
		if(isset($options['deppj_cnpj_id']))
			$this->db->set('deppj_cnpj_id', $options['deppj_cnpj_id']);
		
		$this->db->where('deppj_id', $options['deppj_id']);
		$this->db->update('departamento');
		
		return $this->db->affected_rows();
	}
	
	function GetDepartamentoPj($options = array())
	{
		if(isset($options['deppj_id']))
			$this->db->where('deppj_id', $options['deppj_id']);
			
		if(isset($options['deppj_dep_id']))
			$this->db->where('deppj_dep_id', $options['deppj_dep_id']);
			
		if(isset($options['deppj_cnpj_id']))
			$this->db->where('deppj_cnpj_id', $options['deppj_cnpj_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('departamentopj');

		if(isset($options['deppj_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteDepartamentoPj($options = array())
	{
    
		if (!$this-> _required(
			Array('deppj_id', 'deppj_id'),
			$options)
		) return false;
		
		$this->db->where('deppj_id', $options['deppj_id']);
    	$this->db->delete('departamento');
	}
}

?>