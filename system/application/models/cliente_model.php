<?php

class Cliente_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddCliente($options = array())
	{
		if (!$this-> _required(
			Array('cli_usu_id', 'cli_usu_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cli_ref_id', 'cli_ref_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cli_tipo_id', 'cli_tipo_id'),
			$options)
		) return false;
				
		$postData = array(
						//integer - cli_usu_id
						'cli_usu_id' => $options['cli_usu_id'],
		
						//integer - cli_ref_id
						'cli_ref_id' => $options['cli_ref_id'],
		
						//integer - cli_tipo_id
						'cli_tipo_id' => $options['cli_tipo_id']
						
					);
		$this->db->insert('cliente', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateCliente($options = array())
	{
		if (!$this-> _required(
			Array('cli_id', 'cli_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cli_usu_id', 'cli_usu_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cli_ref_id', 'cli_ref_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cli_tipo_id', 'cli_tipo_id'),
			$options)
		) return false;
				
		if(isset($options['cli_usu_id']))
			$this->db->set('cli_usu_id', $options['cli_usu_id']);
			
		if(isset($options['cli_ref_id']))
			$this->db->set('cli_ref_id', $options['cli_ref_id']);
			
		if(isset($options['cli_tipo_id']))
			$this->db->set('cli_tipo_id', $options['cli_tipo_id']);
			
		$this->db->where('cli_id', $options['cli_id']);
		$this->db->update('cliente');
		
		return $this->db->affected_rows();
	}
	
	function GetCliente($options = array())
	{
		$this->db->join('usuario', 'usu_id = cli_usu_id', 'left');
		
		$this->db->join('pessoafisica', 'cpf_id = usu_cpf_id', 'left');
		
		if(isset($options['cli_id']))
			$this->db->where('cli_id', $options['cli_id']);
			
		if(isset($options['cli_usu_id']))
			$this->db->where('cli_usu_id', $options['cli_usu_id']);
			
		if(isset($options['cli_ref_id']))
			$this->db->where('cli_ref_id', $options['cli_ref_id']);
			
		if(isset($options['cli_tipo_id']))
			$this->db->where('cli_tipo_id', $options['cli_tipo_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('cliente');

		return $query->result();
	}
	
	function DeleteCliente($options = array())
	{
    
		if (!$this-> _required(
			Array('cli_id', 'cli_id'),
			$options)
		) return false;
		
		$this->db->where('cli_id', $options['cli_id']);
		$this->db->delete('cliente');
	}
}

?>