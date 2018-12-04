<?php

class GrupoEspec_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}

	function AddGrupoEspec($options = array())
	{
		if (!$this-> _required(
			Array('grpespec_nome', 'grpespec_nome'),
			$options)
		) return false;
					
		$postData = array(
						//char - grpespec_nome
						'grpespec_nome' => $options['grpespec_nome'],
		
					);
		$this->db->insert('grupoespec', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateGrupoEspec($options = array())
	{
		if (!$this-> _required(
			Array('grpespec_id', 'grpespec_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('grpespec_nome', 'grpespec_nome'),
			$options)
		) return false;
										
		if(isset($options['grpespec_nome']))
			$this->db->set('grpespec_nome', $options['grpespec_nome']);
			
		$this->db->where('grpespec_id', $options['grpespec_id']);
		$this->db->update('grupoespec');
		
		return $this->db->affected_rows();
	}
	
	function GetGrupoEspec($options = array())
	{
		if(isset($options['grpespec_id']))
			$this->db->where('grpespec_id', $options['grpespec_id']);
			
		if(isset($options['grpespec_nome']))
			$this->db->where('grpespec_nome', $options['grpespec_nome']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('grupoespec');

		if(isset($options['grpespec_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteGrupoEspec($options = array())
	{
    
		if (!$this-> _required(
			Array('grpespec_id', 'grpespec_id'),
			$options)
		) return false;
		
		$this->db->where('grpespec_id', $options['grpespec_id']);
    	$this->db->delete('grupoespec');
	}
}

?>