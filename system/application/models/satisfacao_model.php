<?php

class Satisfacao_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddSatisfacao($options = array())
	{
		if (!$this-> _required(
			Array('sat_id', 'sat_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('sat_refsa_id', 'sat_refsa_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('sat_cla_id', 'sat_cla_id'),
			$options)
		) return false;
				
		$postData = array(
						//integer - sat_id
						'sat_id' => $options['sat_id'],
		
						//integer - sat_refsa_id
						'sat_refsa_id' => $options['sat_refsa_id'],
		
						//integer - sat_cla_id
						'sat_cla_id' => $options['sat_cla_id'],
		
					);
		$this->db->insert('satisfacao', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateSatisfacao($options = array())
	{
		if (!$this-> _required(
			Array('sat_id', 'sat_id'),
			$options)
		) return false;
		
		if(isset($options['sat_refsa_id']))
			$this->db->set('sat_refsa_id', $options['sat_refsa_id']);
			
		if(isset($options['sat_cla_id']))
			$this->db->set('sat_cla_id', $options['sat_cla_id']);
			
		$this->db->where('sat_id', $options['sat_id']);
		$this->db->update('satisfacao');
		
		return $this->db->affected_rows();
	}
	
	function GetSatisfacao($options = array())
	{
		if(isset($options['sat_id']))
			$this->db->where('sat_id', $options['sat_id']);
			
		if(isset($options['sat_refsa_id']))
			$this->db->where('sat_refsa_id', $options['sat_refsa_id']);
			
		if(isset($options['sat_cla_id']))
			$this->db->where('sat_cla_id', $options['sat_cla_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('satisfacao');

		if(isset($options['sat_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteSatisfacao($options = array())
	{
    
		if (!$this-> _required(
			Array('sat_id', 'sat_id'),
			$options)
		) return false;
		
		$this->db->where('sat_id', $options['sat_id']);
    	$this->db->delete('satisfacao');
	}
}

?>