<?php

class UsuarioEmissor_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddUsuarioEmissor($options = array())
	{
		if (!$this-> _required(
			Array('usuem_id', 'usuem_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('usuem_em_id', 'usuem_em_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('usuem_usu_id', 'usuem_usu_id'),
			$options)
		) return false;
								
		$postData = array(
						//integer - usuem_id
						'usuem_id' => $options['usuem_id'],
		
						//integer - usuem_em_id
						'usuem_em_id' => $options['usuem_em_id'],
		
						//integer - usuem_usu_id
						'usuem_usu_id' => $options['usuem_usu_id']
		
					);
		$this->db->insert('usuarioemissor', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateUsuarioEmissor($options = array())
	{
		if (!$this-> _required(
			Array('usuem_id', 'usuem_id'),
			$options)
		) return false;
		
		if(isset($options['usuem_em_id']))
			$this->db->set('usuem_em_id', $options['usuem_em_id']);
			
		if(isset($options['usuem_usu_id']))
			$this->db->set('usuem_usu_id', $options['usuem_usu_id']);
			
		$this->db->where('usuem_id', $options['usuem_id']);
		$this->db->update('usuarioemissor');
		
		return $this->db->affected_rows();
	}
	
	function GetUsuarioEmissor($options = array())
	{
		if(isset($options['usuem_id']))
			$this->db->where('usuem_id', $options['usuem_id']);
			
		if(isset($options['usuem_em_id']))
			$this->db->where('usuem_em_id', $options['usuem_em_id']);
			
		if(isset($options['usuem_usu_id']))
			$this->db->where('usuem_usu_id', $options['usuem_usu_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('usuarioemissor');

		if(isset($options['usuem_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteUsuarioEmissor($options = array())
	{
    
		if (!$this-> _required(
			Array('usuem_id', 'usuem_id'),
			$options)
		) return false;
		
		$this->db->where('usuem_id', $options['usuem_id']);
    	$this->db->delete('usuarioemissor');
	}
}

?>