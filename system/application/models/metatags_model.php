<?php

class Metatags_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddMetatags($options = array())
	{
		if (!$this-> _required(
			Array('met_title', 'met_title'),
			$options)
		) return false;
		
		$postData = array(
						//char - met_title
						'met_title' => $options['met_title'],
		
						//char - met_description
						'met_description' => $options['met_description'],
		
						//char - met_keywords
						'met_keywords' => $options['met_keywords'],
		
					);
		$this->db->insert('metatags', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateMetatags($options = array())
	{
		if (!$this-> _required(
			Array('met_id', 'met_id'),
			$options)
		) return false;
		
		if(isset($options['met_title']))
			$this->db->set('met_title', $options['met_title']);
			
		if(isset($options['met_description']))
			$this->db->set('met_description', $options['met_description']);
			
		if(isset($options['met_keywords']))
			$this->db->set('met_keywords', $options['met_keywords']);
			
		$this->db->where('met_id', $options['met_id']);
		$this->db->update('metatags');
		
		return $this->db->affected_rows();
	}
	
	function GetMetatags($options = array())
	{
		if(isset($options['met_id']))
			$this->db->where('met_id', $options['met_id']);
			
		if(isset($options['met_title']))
			$this->db->where('met_title', $options['met_title']);
			
		if(isset($options['met_description']))
			$this->db->where('met_description', $options['met_description']);
			
		if(isset($options['met_keywords']))
			$this->db->where('met_keywords', $options['met_keywords']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('metatags');

		if(isset($options['met_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteMetatags($options = array())
	{
    
		if (!$this-> _required(
			Array('met_id', 'met_id'),
			$options)
		) return false;
		
		$this->db->where('met_id', $options['met_id']);
    	$this->db->delete('metatags');
	}
}

?>