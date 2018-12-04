<?php

class Continente_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddContinente($options = array())
	{
		if (!$this-> _required(
			Array('cont_id', 'cont_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cont_nome', 'cont_nome'),
			$options)
		) return false;
		
		$postData = array(
						//integer - cont_id
						'cont_id' => $options['cont_id'],
		
						//char - cont_nome
						'cont_nome' => $options['cont_nome'],
						
					);
		$this->db->insert('continente', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateContinente($options = array())
	{
		if (!$this-> _required(
			Array('cont_id', 'cont_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cont_nome', 'cont_nome'),
			$options)
		) return false;
				
		if(isset($options['cont_nome']))
			$this->db->set('cont_nome', $options['cont_nome']);
		
		$this->db->where('cont_id', $options['cont_id']);
		$this->db->update('continente');
		
		return $this->db->affected_rows();
	}
	
	function GetContinente($options = array())
	{
		if(isset($options['cont_id']))
			$this->db->where('cont_id', $options['cont_id']);
			
		if(isset($options['cont_nome']))
			$this->db->where('cont_nome', $options['cont_nome']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('continente');

		if(isset($options['cont_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteContinente($options = array())
	{
    
		if (!$this-> _required(
			Array('cont_id', 'cont_id'),
			$options)
		) return false;
		
		$this->db->where('cont_id', $options['cont_id']);
    	$this->db->delete('continente');
	}
}

?>