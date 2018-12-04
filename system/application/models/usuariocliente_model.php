<?php

class UsuarioCliente_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddUsuarioCliente($options = array())
	{
		if (!$this-> _required(
			Array('usucli_cli_id', 'usucli_cli_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('usucli_usu_id', 'usucli_usu_id'),
			$options)
		) return false;
								
		$postData = array(
						//char - usucli_cli_id
						'usucli_cli_id' => $options['usucli_cli_id'],
		
						//char - usucli_usu_id
						'usucli_usu_id' => $options['usucli_usu_id']
		
					);
		$this->db->insert('usuariocliente', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateUsuarioCliente($options = array())
	{
		if (!$this-> _required(
			Array('usucli_id', 'usucli_id'),
			$options)
		) return false;
		
		if(isset($options['usucli_cli_id']))
			$this->db->set('usucli_cli_id', $options['usucli_cli_id']);
			
		if(isset($options['usucli_usu_id']))
			$this->db->set('usucli_usu_id', $options['usucli_usu_id']);
			
		$this->db->where('usucli_id', $options['usucli_id']);
		$this->db->update('usuariocliente');
		
		return $this->db->affected_rows();
	}
	
	function GetUsuarioCliente($options = array())
	{
		if(isset($options['usucli_id']))
			$this->db->where('usucli_id', $options['usucli_id']);
			
		if(isset($options['usucli_cli_id']))
			$this->db->where('usucli_cli_id', $options['usucli_cli_id']);
			
		if(isset($options['usucli_usu_id']))
			$this->db->where('usucli_usu_id', $options['usucli_usu_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('usuariocliente');

		if(isset($options['usucli_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteUsuarioCliente($options = array())
	{
    
		if (!$this-> _required(
			Array('usucli_id', 'usucli_id'),
			$options)
		) return false;
		
		$this->db->where('usucli_id', $options['usucli_id']);
    	$this->db->delete('usuariocliente');
	}
}

?>