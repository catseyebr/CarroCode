<?php

class HotelTipoServico_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddHotelTipoServico($options = array())
	{
		if (!$this-> _required(
			Array('hpo_hot_id', 'hpo_hot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hpo_tse_id', 'hpo_tse_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - hpo_hot_id
						'hpo_hot_id' => $options['hpo_hot_id'],
		
						//integer - hpo_tse_id
						'hpo_tse_id' => $options['hpo_tse_id'],
						
					);
		$this->db->insert('hoteltiposervico', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateHotelTipoServico($options = array())
	{
		if (!$this-> _required(
			Array('hpo_hot_id', 'hpo_hot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hpo_tse_id', 'hpo_tse_id'),
			$options)
		) return false;
				
		if(isset($options['hpo_hot_id']))
			$this->db->set('hpo_hot_id', $options['hpo_hot_id']);
			
		if(isset($options['hpo_tse_id']))
			$this->db->set('hpo_tse_id', $options['hpo_tse_id']);
		
		$this->db->where('hpo_hot_id', $options['hpo_hot_id']);
		$this->db->where('hpo_tse_id', $options['hpo_tse_id']);
		$this->db->update('hoteltiposervico');
		
		return $this->db->affected_rows();
	}
	
	function GetHotelTipoServico($options = array())
	{
		if(isset($options['hpo_hot_id']))
			$this->db->where('hpo_hot_id', $options['hpo_hot_id']);
			
		if(isset($options['hpo_tse_id']))
			$this->db->where('hpo_tse_id', $options['hpo_tse_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('hoteltiposervico');

		return $query->row(0);
	}
	
	function DeleteHotelTipoServico($options = array())
	{
    
		if (!$this-> _required(
			Array('hpo_hot_id', 'hpo_hot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hpo_tse_id', 'hpo_tse_id'),
			$options)
		) return false;
		
		$this->db->where('hpo_hot_id', $options['hpo_hot_id']);
		$this->db->where('hpo_tse_id', $options['hpo_tse_id']);
    	$this->db->delete('hoteltiposervico');
	}
}

?>