<?php

class HoteisImagens_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddHoteisImagens($options = array())
	{
		if (!$this-> _required(
			Array('him_img_id', 'him_img_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('him_hot_id', 'him_hot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('him_principal', 'him_principal'),
			$options)
		) return false;
				
		$postData = array(
						//integer - him_img_id
						'him_img_id' => $options['him_img_id'],
		
						//integer - him_hot_id
						'him_hot_id' => $options['him_hot_id'],
						
						//boolean - him_principal
						'him_principal' => $options['him_principal']
		
					);
		$this->db->insert('hoteisimagens', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateHoteisImagens($options = array())
	{
		if (!$this-> _required(
			Array('him_img_id', 'him_img_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('him_hot_id', 'him_hot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('him_principal', 'him_principal'),
			$options)
		) return false;
				
		if(isset($options['him_principal']))
			$this->db->set('him_principal', $options['him_principal']);
		
		$this->db->where('him_img_id', $options['him_img_id']);
		$this->db->where('him_hot_id', $options['him_hot_id']);
		$this->db->update('hoteisimagens');
		
		return $this->db->affected_rows();
	}
	
	function GetHoteisImagens($options = array())
	{
		if(isset($options['him_img_id']))
			$this->db->where('him_img_id', $options['him_img_id']);
			
		if(isset($options['him_hot_id']))
			$this->db->where('him_hot_id', $options['him_hot_id']);
			
		if(isset($options['him_principal']))
			$this->db->where('him_principal', $options['him_principal']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('hoteisimagens');

		if(isset($options['him_img_id']) && isset($options['him_hot_id']))
		return $query->row(0);
		return $query->result();
	}
	
	function DeleteHoteisImagens($options = array())
	{
    
		if (!$this-> _required(
			Array('him_img_id', 'him_img_id'),
			$options)
		) return false;
		
		if (!$this-> _required(
			Array('him_hot_id', 'him_hot_id'),
			$options)
		) return false;
		
		$this->db->where('him_img_id', $options['him_img_id']);
		$this->db->where('him_hot_id', $options['him_hot_id']);
    	$this->db->delete('hoteisimagens');
	}
}

?>