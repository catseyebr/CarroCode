<?php

class Dominio_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddDominio($options = array())
	{
		if (!$this-> _required(
			Array('dom_proj_id', 'dom_proj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dom_name', 'dom_name'),
			$options)
		) return false;
		
		$postData = array(
						//integer - dom_proj_id
						'dom_proj_id' => $options['dom_proj_id'],
		
						//char - dom_name
						'dom_name' => $options['dom_name']
						
					);
		$this->db->insert('dominio', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateDominio($options = array())
	{
		if (!$this-> _required(
			Array('dom_id', 'dom_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dom_proj_id', 'dom_proj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dom_name', 'dom_name'),
			$options)
		) return false;
				
		if(isset($options['dom_proj_id']))
			$this->db->set('dom_proj_id', $options['dom_proj_id']);
			
		if(isset($options['dom_name']))
			$this->db->set('dom_name', $options['dom_name']);
		
		$this->db->where('dom_id', $options['dom_id']);
		$this->db->update('dominio');
		
		return $this->db->affected_rows();
	}
	
	function GetDominio($options = array())
	{
		if(isset($options['dom_id']))
			$this->db->where('dom_id', $options['dom_id']);
			
		if(isset($options['dom_proj_id']))
			$this->db->where('dom_proj_id', $options['dom_proj_id']);
			
		if(isset($options['dom_name']))
			$this->db->where('dom_name', $options['dom_name']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('dominio');

		if(isset($options['dom_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteDominio($options = array())
	{
    
		if (!$this-> _required(
			Array('dom_id', 'dom_id'),
			$options)
		) return false;
		
		$this->db->where('dom_id', $options['dom_id']);
    	$this->db->delete('dominio');
	}
}

?>