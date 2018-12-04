<?php

class FaturasVendas_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddFaturasVendas($options = array())
	{
		if (!$this-> _required(
			Array('fatven_id', 'fatven_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('fatven_fat_id', 'fatven_fat_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('fatven_ven_id', 'fatven_ven_id'),
			$options)
		) return false;
					
		$postData = array(
						//integer - fatven_id
						'fatven_id' => $options['fatven_id'],
		
						//integer - fatven_fat_id
						'fatven_fat_id' => $options['fatven_fat_id'],
		
						//integer - fatven_ven_id
						'fatven_ven_id' => $options['fatven_ven_id']
		
					);
		$this->db->insert('faturasvendas', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateFaturasVendas($options = array())
	{
		if (!$this-> _required(
			Array('fatven_id', 'fatven_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('fatven_fat_id', 'fatven_fat_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('fatven_ven_id', 'fatven_ven_id'),
			$options)
		) return false;
						
		if(isset($options['fatven_fat_id']))
			$this->db->set('fatven_fat_id', $options['fatven_fat_id']);
			
		if(isset($options['fatven_ven_id']))
			$this->db->set('fatven_ven_id', $options['fatven_ven_id']);
			
		$this->db->where('fatven_id', $options['fatven_id']);
		$this->db->update('faturasvendas');
		
		return $this->db->affected_rows();
	}
	
	function GetFaturasVendas($options = array())
	{
		if(isset($options['fatven_id']))
			$this->db->where('fatven_id', $options['fatven_id']);
			
		if(isset($options['fatven_fat_id']))
			$this->db->where('fatven_fat_id', $options['fatven_fat_id']);
			
		if(isset($options['fatven_ven_id']))
			$this->db->where('fatven_ven_id', $options['fatven_ven_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('faturasvendas');

		if(isset($options['fatven_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteFaturasVendas($options = array())
	{
    
		if (!$this-> _required(
			Array('fatven_id', 'fatven_id'),
			$options)
		) return false;
		
		$this->db->where('fatven_id', $options['fatven_id']);
    	$this->db->delete('faturasvendas');
	}
}

?>