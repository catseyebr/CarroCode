<?php

class OpcionalLojas_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddOpcionalLojas($options = array())
	{
		if (!$this-> _required(
			Array('opcloja_loj_id', 'opcloja_loj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('opcloja_opc_id', 'opcloja_opc_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - opcloja_loj_id
						'opcloja_loj_id' => $options['opcloja_loj_id'],
		
						//integer - opcloja_opc_id
						'opcloja_opc_id' => $options['opcloja_opc_id'],
						
					);
		$this->db->insert('opcionallojas', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateOpcionalLojas($options = array())
	{
		if (!$this-> _required(
			Array('opcloja_loj_id', 'opcloja_loj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('opcloja_opc_id', 'opcloja_opc_id'),
			$options)
		) return false;
				
		if(isset($options['opcloja_loj_id']))
			$this->db->set('opcloja_loj_id', $options['opcloja_loj_id']);
			
		if(isset($options['opcloja_opc_id']))
			$this->db->set('opcloja_opc_id', $options['opcloja_opc_id']);
		
		$this->db->where('opcloja_loj_id', $options['opcloja_loj_id']);
		$this->db->where('opcloja_opc_id', $options['opcloja_opc_id']);
		$this->db->update('opcionallojas');
		
		return $this->db->affected_rows();
	}
	
	function GetOpcionalLojas($options = array())
	{
		if(isset($options['opcloja_loj_id']))
			$this->db->where('opcloja_loj_id', $options['opcloja_loj_id']);
			
		if(isset($options['opcloja_opc_id']))
			$this->db->where('opcloja_opc_id', $options['opcloja_opc_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('opcionallojas');

		return $query->row(0);
	}
	
	function DeleteOpcionalLojas($options = array())
	{
    
		if (!$this-> _required(
			Array('opcloja_loj_id', 'opcloja_loj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('opcloja_opc_id', 'opcloja_opc_id'),
			$options)
		) return false;
		
		$this->db->where('opcloja_loj_id', $options['opcloja_loj_id']);
		$this->db->where('opcloja_opc_id', $options['opcloja_opc_id']);
    	$this->db->delete('opcionallojas');
	}
}

?>