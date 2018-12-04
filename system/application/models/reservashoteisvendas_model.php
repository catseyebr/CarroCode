<?php

class ReservasHoteisVendas_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddReservasHoteisVendas($options = array())
	{
		if (!$this-> _required(
			Array('reshotven_id', 'reshotven_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('reshotven_reshot_id', 'reshotven_reshot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('reshotven_ven_id', 'reshotven_ven_id'),
			$options)
		) return false;
				
		$postData = array(
						//integer - reshotven_id
						'reshotven_id' => $options['reshotven_id'],
		
						//integer - reshotven_reshot_id
						'reshotven_reshot_id' => $options['reshotven_reshot_id'],
		
						//integer - reshotven_ven_id
						'reshotven_ven_id' => $options['reshotven_ven_id'],
		
					);
		$this->db->insert('reservashoteisvendas', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateReservasHoteisVendas($options = array())
	{
		if (!$this-> _required(
			Array('reshotven_id', 'reshotven_id'),
			$options)
		) return false;
		
		if(isset($options['reshotven_reshot_id']))
			$this->db->set('reshotven_reshot_id', $options['reshotven_reshot_id']);
			
		if(isset($options['reshotven_ven_id']))
			$this->db->set('reshotven_ven_id', $options['reshotven_ven_id']);
			
		$this->db->where('reshotven_id', $options['reshotven_id']);
		$this->db->update('reservashoteisvendas');
		
		return $this->db->affected_rows();
	}
	
	function GetReservasHoteisVendas($options = array())
	{
		if(isset($options['reshotven_id']))
			$this->db->where('reshotven_id', $options['reshotven_id']);
			
		if(isset($options['reshotven_reshot_id']))
			$this->db->where('reshotven_reshot_id', $options['reshotven_reshot_id']);
			
		if(isset($options['reshotven_ven_id']))
			$this->db->where('reshotven_ven_id', $options['reshotven_ven_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('reservashoteisvendas');

		if(isset($options['reshotven_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteReservasHoteisVendas($options = array())
	{
    
		if (!$this-> _required(
			Array('reshotven_id', 'reshotven_id'),
			$options)
		) return false;
		
		$this->db->where('reshotven_id', $options['reshotven_id']);
    	$this->db->delete('reservashoteisvendas');
	}
}

?>