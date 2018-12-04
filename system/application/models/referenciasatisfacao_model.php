<?php

class ReferenciaSatisfacao_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddReferenciaSatisfacao($options = array())
	{
		if (!$this-> _required(
			Array('refsa_id', 'refsa_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('refsa_nome', 'refsa_nome'),
			$options)
		) return false;
				
		$postData = array(
						//integer - refsa_id
						'refsa_id' => $options['refsa_id'],
		
						//char - refsa_nome
						'refsa_nome' => $options['refsa_nome']
		
					);
		$this->db->insert('referenciasatisfacao', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateReferenciaSatisfacao($options = array())
	{
		if (!$this-> _required(
			Array('refsa_id', 'refsa_id'),
			$options)
		) return false;
		
		if(isset($options['refsa_nome']))
			$this->db->set('refsa_nome', $options['refsa_nome']);
			
		$this->db->where('refsa_id', $options['refsa_id']);
		$this->db->update('referenciasatisfacao');
		
		return $this->db->affected_rows();
	}
	
	function GetReferenciaSatisfacao($options = array())
	{
		if(isset($options['refsa_id']))
			$this->db->where('refsa_id', $options['refsa_id']);
			
		if(isset($options['refsa_nome']))
			$this->db->where('refsa_nome', $options['refsa_nome']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('referenciasatisfacao');

		if(isset($options['refsa_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteReferenciaSatisfacao($options = array())
	{
    
		if (!$this-> _required(
			Array('refsa_id', 'refsa_id'),
			$options)
		) return false;
		
		$this->db->where('refsa_id', $options['refsa_id']);
    	$this->db->delete('referenciasatisfacao');
	}
}

?>