<?php

class UsuariosNiveis_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddUsuariosNiveis($options = array())
	{
		if (!$this-> _required(
			Array('uni_usu_id', 'uni_usu_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('uni_niv_id', 'uni_niv_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - uni_usu_id
						'uni_usu_id' => $options['uni_usu_id'],
		
						//integer - uni_niv_id
						'uni_niv_id' => $options['uni_niv_id'],
						
					);
		$this->db->insert('usuariosniveis', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateUsuariosNiveis($options = array())
	{
		if (!$this-> _required(
			Array('uni_usu_id', 'uni_usu_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('uni_niv_id', 'uni_niv_id'),
			$options)
		) return false;
				
		if(isset($options['uni_usu_id']))
			$this->db->set('uni_usu_id', $options['uni_usu_id']);
			
		if(isset($options['uni_niv_id']))
			$this->db->set('uni_niv_id', $options['uni_niv_id']);
		
		$this->db->where('uni_usu_id', $options['uni_usu_id']);
		$this->db->where('uni_niv_id', $options['uni_niv_id']);
		$this->db->update('usuariosniveis');
		
		return $this->db->affected_rows();
	}
	
	function GetUsuariosNiveis($options = array())
	{
		if(isset($options['uni_usu_id']))
			$this->db->where('uni_usu_id', $options['uni_usu_id']);
			
		if(isset($options['uni_niv_id']))
			$this->db->where('uni_niv_id', $options['uni_niv_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('usuariosniveis');

		return $query->row(0);
	}
	
	function DeleteUsuariosNiveis($options = array())
	{
    
		if (!$this-> _required(
			Array('uni_usu_id', 'uni_usu_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('uni_niv_id', 'uni_niv_id'),
			$options)
		) return false;
		
		$this->db->where('uni_usu_id', $options['uni_usu_id']);
		$this->db->where('uni_niv_id', $options['uni_niv_id']);
    	$this->db->delete('usuariosniveis');
	}
}

?>