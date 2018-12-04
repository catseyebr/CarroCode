<?php

class ContatoPf_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddContatoPf($options = array())
	{
		if (!$this-> _required(
			Array('conpf_con_id', 'conpf_con_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('conpf_cpf_id', 'conpf_cpf_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - conpf_con_id
						'conpf_con_id' => $options['conpf_con_id'],
		
						//integer - conpf_cpf_id
						'conpf_cpf_id' => $options['conpf_cpf_id']
						
					);
		$this->db->insert('contatopf', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateContatoPf($options = array())
	{
		if (!$this-> _required(
			Array('conpf_id', 'conpf_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('conpf_con_id', 'conpf_con_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('conpf_cpf_id', 'conpf_cpf_id'),
			$options)
		) return false;
				
		if(isset($options['conpf_con_id']))
			$this->db->set('conpf_con_id', $options['conpf_con_id']);
			
		if(isset($options['conpf_cpf_id']))
			$this->db->set('conpf_cpf_id', $options['conpf_cpf_id']);
			
		$this->db->where('conpf_id', $options['conpf_id']);
		$this->db->update('contatopf');
		
		return $this->db->affected_rows();
	}
	
	function GetContatoPf($options = array())
	{
		$this->db->join('contato', 'con_id = conpf_con_id', 'left');
		$this->db->join('contatoref', 'conref_id = con_conref_id', 'left');
		
		if(isset($options['conpf_id']))
			$this->db->where('conpf_id', $options['conpf_id']);
			
		if(isset($options['conpf_con_id']))
			$this->db->where('conpf_con_id', $options['conpf_con_id']);
			
		if(isset($options['conpf_cpf_id']))
			$this->db->where('conpf_cpf_id', $options['conpf_cpf_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('contatopf');

		return $query->result();
	}
	
	function DeleteContatoPf($options = array())
	{
    
		if (!$this-> _required(
			Array('conpf_id', 'conpf_id'),
			$options)
		) return false;
		
		$this->db->where('conpf_id', $options['conpf_id']);
		$this->db->delete('contatopf');
	}
}

?>