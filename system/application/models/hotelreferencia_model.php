<?php

class HotelReferencia_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddHotelReferencia($options = array())
	{
		if (!$this-> _required(
			Array('hre_ref_id', 'hre_ref_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hre_hot_id', 'hre_hot_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - hre_ref_id
						'hre_ref_id' => $options['hre_ref_id'],
		
						//integer - hre_hot_id
						'hre_hot_id' => $options['hre_hot_id'],
						
					);
		$this->db->insert('hotelreferencia', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateHotelReferencia($options = array())
	{
		if (!$this-> _required(
			Array('hre_ref_id', 'hre_ref_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hre_hot_id', 'hre_hot_id'),
			$options)
		) return false;
				
		if(isset($options['hre_ref_id']))
			$this->db->set('hre_ref_id', $options['hre_ref_id']);
			
		if(isset($options['hre_hot_id']))
			$this->db->set('hre_hot_id', $options['hre_hot_id']);
		
		$this->db->where('hre_ref_id', $options['hre_ref_id']);
		$this->db->where('hre_hot_id', $options['hre_hot_id']);
		$this->db->update('hotelreferencia');
		
		return $this->db->affected_rows();
	}
	
	function GetHotelReferencia($options = array())
	{
		if(isset($options['hre_ref_id']))
			$this->db->where('hre_ref_id', $options['hre_ref_id']);
			
		if(isset($options['hre_hot_id']))
			$this->db->where('hre_hot_id', $options['hre_hot_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('hotelreferencia');

		return $query->row(0);
	}
	
	function DeleteHotelReferencia($options = array())
	{
    
		if (!$this-> _required(
			Array('hre_ref_id', 'hre_ref_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hre_hot_id', 'hre_hot_id'),
			$options)
		) return false;
		
		$this->db->where('hre_ref_id', $options['hre_ref_id']);
		$this->db->where('hre_hot_id', $options['hre_hot_id']);
    	$this->db->delete('hotelreferencia');
	}
}

?>