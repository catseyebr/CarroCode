<?php

class ContatoRef_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddContatoRef($options = array())
	{
		if (!$this-> _required(
			Array('conref_nome', 'conref_nome'),
			$options)
		) return false;
		
		$postData = array(
						//char - conref_nome
						'conref_nome' => $options['conref_nome'],
						
					);
		$this->db->insert('contatoref', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateContatoRef($options = array())
	{
		if (!$this-> _required(
			Array('conref_id', 'conref_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('conref_nome', 'conref_nome'),
			$options)
		) return false;
				
		if(isset($options['conref_nome']))
			$this->db->set('conref_nome', $options['conref_nome']);
		
		$this->db->where('conref_id', $options['conref_id']);
		$this->db->update('contatoref');
		
		return $this->db->affected_rows();
	}
	
	function GetContatoRef($options = array())
	{
		if(isset($options['conref_id']))
			$this->db->where('conref_id', $options['conref_id']);
			
		if(isset($options['conref_nome']))
			$this->db->where('conref_nome', $options['conref_nome']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('contatoref');

		if(isset($options['conref_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function GetContatoRefId($options = array())
	{
		if(isset($options['conref_nome']))
			$this->db->like('conref_nome', $options['conref_nome']);
			
		$query = $this->db->get('contatoref');
		
		if ($query->row(0) != NULL){
			return $query->row(0)->conref_id;
		}else{
			return false;
		}
	}
	
	function DeleteContatoRef($options = array())
	{
    
		if (!$this-> _required(
			Array('conref_id', 'conref_id'),
			$options)
		) return false;
		
		$this->db->where('conref_id', $options['conref_id']);
    	$this->db->delete('contatoref');
	}
}

?>