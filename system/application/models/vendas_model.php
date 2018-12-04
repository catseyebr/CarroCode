<?php

class Vendas_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddVendas($options = array())
	{
		if (!$this-> _required(
			Array('ven_id', 'ven_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ven_proj_id', 'ven_proj_id'),
			$options)
		) return false;
								
		$postData = array(
						//integer - ven_id
						'ven_id' => $options['ven_id'],
		
						//integer - ven_proj_id
						'ven_proj_id' => $options['ven_proj_id']
		
					);
		$this->db->insert('vendas', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateVendas($options = array())
	{
		if (!$this-> _required(
			Array('ven_id', 'ven_id'),
			$options)
		) return false;
		
		if(isset($options['ven_proj_id']))
			$this->db->set('ven_proj_id', $options['ven_proj_id']);
			
		$this->db->where('usuem_id', $options['usuem_id']);
		$this->db->update('vendas');
		
		return $this->db->affected_rows();
	}
	
	function GetVendas($options = array())
	{
		if(isset($options['ven_id']))
			$this->db->where('ven_id', $options['ven_id']);
			
		if(isset($options['ven_proj_id']))
			$this->db->where('ven_proj_id', $options['ven_proj_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('vendas');

		if(isset($options['ven_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteVendas($options = array())
	{
    
		if (!$this-> _required(
			Array('ven_id', 'ven_id'),
			$options)
		) return false;
		
		$this->db->where('ven_id', $options['ven_id']);
    	$this->db->delete('vendas');
	}
}

?>