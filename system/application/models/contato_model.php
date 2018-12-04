<?php

class Contato_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddContato($options = array())
	{
		if (!$this-> _required(
			Array('con_conref_id', 'con_conref_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('con_value', 'con_value'),
			$options)
		) return false;
		
		$postData = array(
						//integer - con_conref_id
						'con_conref_id' => $options['con_conref_id'],
		
						//char - con_value
						'con_value' => $options['con_value']
						
					);
		$this->db->insert('contato', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateContato($options = array())
	{
		if (!$this-> _required(
			Array('con_id', 'con_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('con_conref_id', 'con_conref_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('con_value', 'con_value'),
			$options)
		) return false;
				
		if(isset($options['con_conref_id']))
			$this->db->set('con_conref_id', $options['con_conref_id']);
			
		if(isset($options['con_value']))
			$this->db->set('con_value', $options['con_value']);
			
		$this->db->where('con_id', $options['con_id']);
		$this->db->update('contato');
		
		return $this->db->affected_rows();
	}
	
	function GetContato($options = array())
	{
		$this->db->join('contatoref', 'conref_id = con_conref_id', 'left');
		
		if(isset($options['con_id']))
			$this->db->where('con_id', $options['con_id']);
			
		if(isset($options['con_conref_id']))
			$this->db->where('con_conref_id', $options['con_conref_id']);
			
		if(isset($options['con_value']))
			$this->db->where('con_value', $options['con_value']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('contato');

		return $query->result();
	}
	
	function DeleteContato($options = array())
	{
    
		if (!$this-> _required(
			Array('con_id', 'con_id'),
			$options)
		) return false;
		
		$this->db->where('con_id', $options['con_id']);
		$this->db->delete('contato');
	}
}

?>