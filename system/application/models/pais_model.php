<?php

class Pais_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddPais($options = array())
	{
		if (!$this-> _required(
			Array('pais_cont_id', 'pais_cont_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('pais_nome', 'pais_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('pais_sigla', 'pais_sigla'),
			$options)
		) return false;
		
		$postData = array(
						//integer - pais_cont_id
						'pais_cont_id' => $options['pais_cont_id'],
		
						//char - pais_nome
						'pais_nome' => $options['pais_nome'],
		
						//char - pais_sigla
						'pais_sigla' => $options['pais_sigla']
		
					);
		$this->db->insert('pais', $postData);
		return $this->db->insert_id();
	}
	
	function UpdatePais($options = array())
	{
		if (!$this-> _required(
			Array('pais_id', 'pais_id'),
			$options)
		) return false;
		
		if(isset($options['pais_cont_id']))
			$this->db->set('pais_cont_id', $options['pais_cont_id']);
			
		if(isset($options['pais_nome']))
			$this->db->set('pais_nome', $options['pais_nome']);
			
		if(isset($options['pais_sigla']))
			$this->db->set('pais_sigla', $options['pais_sigla']);
			
		$this->db->where('pais_id', $options['pais_id']);
		$this->db->update('pais');
		
		return $this->db->affected_rows();
	}
	
	function GetPais($options = array())
	{
		if(isset($options['pais_id']))
			$this->db->where('pais_id', $options['pais_id']);
			
		if(isset($options['pais_cont_id']))
			$this->db->where('pais_cont_id', $options['pais_cont_id']);
			
		if(isset($options['pais_nome']))
			$this->db->where('pais_nome', $options['pais_nome']);
			
		if(isset($options['pais_sigla']))
			$this->db->where('pais_sigla', $options['pais_sigla']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('pais');

		if(isset($options['pais_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeletePais($options = array())
	{
    
		if (!$this-> _required(
			Array('pais_id', 'pais_id'),
			$options)
		) return false;
		
		$this->db->where('pais_id', $options['pais_id']);
    	$this->db->delete('pais');
	}
}

?>