<?php

class ClienteCondutor_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddClienteCondutor($options = array())
	{
		if (!$this-> _required(
			Array('clicond_id', 'clicond_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('clicond_cli_id', 'clicond_cli_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('clicond_cond_id', 'cli_cond_id'),
			$options)
		) return false;
				
		$postData = array(
						//integer - clicond_id
						'clicond_id' => $options['clicond_id'],
		
						//integer - clicond_cli_id
						'clicond_cli_id' => $options['clicond_cli_id'],
		
						//integer - clicond_cond_id
						'clicond_cond_id' => $options['clicond_cond_id']
						
					);
		$this->db->insert('clientecondutor', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateClienteCondutor($options = array())
	{
		if (!$this-> _required(
			Array('clicond_id', 'clicond_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('clicond_cli_id', 'clicond_cli_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('clicond_cond_id', 'clicond_cond_id'),
			$options)
		) return false;
				
		if(isset($options['clicond_id']))
			$this->db->set('clicond_id', $options['clicond_id']);
			
		if(isset($options['clicond_cli_id']))
			$this->db->set('clicond_cli_id', $options['clicond_cli_id']);
			
		if(isset($options['clicond_cond_id']))
			$this->db->set('clicond_cond_id', $options['clicond_cond_id']);
			
		$this->db->where('clicond_id', $options['clicond_id']);
		$this->db->update('clientecondutor');
		
		return $this->db->affected_rows();
	}
	
	function GetClienteCondutor($options = array())
	{
		if(isset($options['clicond_id']))
			$this->db->where('clicond_id', $options['clicond_id']);
			
		if(isset($options['clicond_cli_id']))
			$this->db->where('clicond_cli_id', $options['clicond_cli_id']);
			
		if(isset($options['clicond_cond_id']))
			$this->db->where('clicond_cond_id', $options['clicond_cond_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('clientecondutor');

		if(isset($options['clicond_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteClienteCondutor($options = array())
	{
    
		if (!$this-> _required(
			Array('clicond_id', 'clicond_id'),
			$options)
		) return false;
		
		$this->db->where('clicond_id', $options['clicond_id']);
		$this->db->delete('clientecondutor');
	}
}

?>