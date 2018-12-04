<?php

class TelefonesAtendimentoCidades_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddTelefonesAtendimentoCidades($options = array())
	{
		if (!$this-> _required(
			Array('tac_city_id', 'tac_city_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tac_tat_id', 'tac_tat_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - tac_city_id
						'tac_city_id' => $options['tac_city_id'],
		
						//integer - tac_tat_id
						'tac_tat_id' => $options['tac_tat_id'],
						
					);
		$this->db->insert('telefonesatendimentocidades', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateTelefonesAtendimentoCidades($options = array())
	{
		if (!$this-> _required(
			Array('tac_city_id', 'tac_city_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tac_tat_id', 'tac_tat_id'),
			$options)
		) return false;
				
		if(isset($options['tac_city_id']))
			$this->db->set('tac_city_id', $options['tac_city_id']);
			
		if(isset($options['tac_tat_id']))
			$this->db->set('tac_tat_id', $options['tac_tat_id']);
		
		$this->db->where('tac_city_id', $options['tac_city_id']);
		$this->db->where('tac_tat_id', $options['tac_tat_id']);
		$this->db->update('telefonesatendimentocidades');
		
		return $this->db->affected_rows();
	}
	
	function GetTelefonesAtendimentoCidades($options = array())
	{
		if(isset($options['tac_city_id']))
			$this->db->where('tac_city_id', $options['tac_city_id']);
			
		if(isset($options['tac_tat_id']))
			$this->db->where('tac_tat_id', $options['tac_tat_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('telefonesatendimentocidades');

		return $query->row(0);
	}
	
	function DeleteTelefonesAtendimentoCidades($options = array())
	{
    
		if (!$this-> _required(
			Array('tac_city_id', 'tac_city_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tac_tat_id', 'tac_tat_id'),
			$options)
		) return false;
		
		$this->db->where('tac_city_id', $options['tac_city_id']);
		$this->db->where('tac_tat_id', $options['tac_tat_id']);
    	$this->db->delete('telefonesatendimentocidades');
	}
}

?>