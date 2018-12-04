<?php

class TemplocStatus_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddTemplocStatus($options = array())
	{
		if (!$this-> _required(
			Array('tlocst_nome', 'tlocst_nome'),
			$options)
		) return false;
		
		$postData = array(
						//varchar - tlocst_nome
						'tlocst_nome' => $options['tlocst_nome']
		
					);
		$this->db->insert('templocstatus', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateTemplocStatus($options = array())
	{
		if (!$this-> _required(
			Array('tlocst_id', 'tlocst_id'),
			$options)
		) return false;
		
		if(isset($options['tlocst_nome']))
			$this->db->set('tlocst_nome', $options['tlocst_nome']);
			
		$this->db->where('tlocst_id', $options['tlocst_id']);
		$this->db->update('templocstatus');
		
		return $this->db->affected_rows();
	}
	
	function GetTemplocStatus($options = array())
	{
		if(isset($options['tlocst_id']))
			$this->db->where('tlocst_id', $options['tlocst_id']);
			
		if(isset($options['tlocst_nome']))
			$this->db->where('tlocst_nome', $options['tlocst_nome']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('templocstatus');

		if(isset($options['tlocst_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteTemplocStatus($options = array())
	{
    
		if (!$this-> _required(
			Array('tlocst_id', 'tlocst_id'),
			$options)
		) return false;
		
		$this->db->where('tlocst_id', $options['tlocst_id']);
    	$this->db->delete('templocstatus');
	}
}

?>