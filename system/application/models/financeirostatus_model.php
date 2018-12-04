<?php

class FinanceiroStatus_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddFinanceiroStatus($options = array())
	{
		if (!$this-> _required(
			Array('finstatus_nome', 'finstatus_nome'),
			$options)
		) return false;
					
		$postData = array(
						
						//char - finstatus_nome
						'finstatus_nome' => $options['finstatus_nome']
		
					);
		$this->db->insert('financeirostatus', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateFinanceiroStatus($options = array())
	{
		if (!$this-> _required(
			Array('finstatus_id', 'finstatus_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('finstatus_nome', 'finstatus_nome'),
			$options)
		) return false;
								
		if(isset($options['finstatus_nome']))
			$this->db->set('finstatus_nome', $options['finstatus_nome']);
			
		$this->db->where('finstatus_id', $options['finstatus_id']);
		$this->db->update('financeirostatus');
		
		return $this->db->affected_rows();
	}
	
	function GetFinanceiroStatus($options = array())
	{
		if(isset($options['finstatus_id']))
			$this->db->where('finstatus_id', $options['finstatus_id']);
			
		if(isset($options['finstatus_nome']))
			$this->db->where('finstatus_nome', $options['finstatus_nome']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('financeirostatus');

		if(isset($options['finstatus_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteFinanceiroStatus($options = array())
	{
    
		if (!$this-> _required(
			Array('finstatus_id', 'finstatus_id'),
			$options)
		) return false;
		
		$this->db->where('finstatus_id', $options['finstatus_id']);
    	$this->db->delete('financeirostatus');
	}
}

?>