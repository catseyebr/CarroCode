<?php

class Niveis_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddNiveis($options = array())
	{
		if (!$this-> _required(
			Array('niv_id', 'niv_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('niv_nome', 'niv_nome'),
			$options)
		) return false;
				
		$postData = array(
						//integer - niv_id
						'niv_id' => $options['niv_id'],
		
						//varchar - niv_nome
						'niv_nome' => $options['niv_nome'],
		
					);
		$this->db->insert('niveis', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateNiveis($options = array())
	{
		if (!$this-> _required(
			Array('niv_id', 'niv_id'),
			$options)
		) return false;
		
		if(isset($options['niv_nome']))
			$this->db->set('niv_nome', $options['niv_nome']);
			
		$this->db->where('niv_id', $options['niv_id']);
		$this->db->update('niveis');
		
		return $this->db->affected_rows();
	}
	
	function GetNiveis($options = array())
	{
		if(isset($options['niv_id']))
			$this->db->where('niv_id', $options['niv_id']);
			
		if(isset($options['niv_nome']))
			$this->db->where('niv_nome', $options['niv_nome']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('niveis');

		if(isset($options['niv_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteNiveis($options = array())
	{
    
		if (!$this-> _required(
			Array('niv_id', 'niv_id'),
			$options)
		) return false;
		
		$this->db->where('niv_id', $options['niv_id']);
    	$this->db->delete('niveis');
	}
}

?>