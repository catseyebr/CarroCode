<?php

class Departamento_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddDepartamento($options = array())
	{
		if (!$this-> _required(
			Array('dep_nome', 'dep_nome'),
			$options)
		) return false;
		
		$postData = array(
						
						//char - dep_nome
						'dep_nome' => $options['dep_nome'],
						
					);
		$this->db->insert('departamento', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateDepartamento($options = array())
	{
		if (!$this-> _required(
			Array('dep_id', 'dep_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dep_nome', 'dep_nome'),
			$options)
		) return false;
				
		if(isset($options['dep_nome']))
			$this->db->set('dep_nome', $options['dep_nome']);
		
		$this->db->where('dep_id', $options['dep_id']);
		$this->db->update('departamento');
		
		return $this->db->affected_rows();
	}
	
	function GetDepartamento($options = array())
	{
		if(isset($options['dep_id']))
			$this->db->where('dep_id', $options['dep_id']);
			
		if(isset($options['dep_nome']))
			$this->db->where('dep_nome', $options['dep_nome']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('departamento');

		if(isset($options['dep_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteDepartamento($options = array())
	{
    
		if (!$this-> _required(
			Array('dep_id', 'dep_id'),
			$options)
		) return false;
		
		$this->db->where('dep_id', $options['dep_id']);
    	$this->db->delete('departamento');
	}
}

?>