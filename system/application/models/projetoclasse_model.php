<?php

class ProjetoClasse_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddProjetoClasse($options = array())
	{
		if (!$this-> _required(
			Array('projcla_proj_id', 'projcla_proj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('projcla_cla_id', 'projcla_cla_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('projcla_refcla_id', 'projcla_refcla_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - projcla_proj_id
						'projcla_proj_id' => $options['projcla_proj_id'],
		
						//integer - projcla_cla_id
						'projcla_cla_id' => $options['projcla_cla_id'],
		
						//integer - projcla_refcla_id
						'projcla_refcla_id' => $options['projcla_refcla_id']
					);
		$this->db->insert('projetoclasse', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateProjetoClasse($options = array())
	{
		if (!$this-> _required(
			Array('projcla_proj_id', 'projcla_proj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('projcla_cla_id', 'projcla_cla_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('projcla_refcla_id', 'projcla_refcla_id'),
			$options)
		) return false;
		
		if(isset($options['projcla_proj_id']))
			$this->db->set('projcla_proj_id', $options['projcla_proj_id']);
		
		if(isset($options['projcla_cla_id']))
			$this->db->set('projcla_cla_id', $options['projcla_cla_id']);
		
		if(isset($options['projcla_refcla_id']))
			$this->db->set('projcla_refcla_id', $options['projcla_refcla_id']);
			
		$this->db->where('projcla_proj_id', $options['projcla_proj_id']);
		$this->db->where('projcla_cla_id', $options['projcla_cla_id']);
		$this->db->where('projcla_refcla_id', $options['projcla_refcla_id']);
		$this->db->update('projetoclasse');
		
		return $this->db->affected_rows();
	}
	
	function GetProjetoClasse($options = array())
	{
		if(isset($options['projcla_proj_id']))
			$this->db->where('projcla_proj_id', $options['projcla_proj_id']);
			
		if(isset($options['projcla_cla_id']))
			$this->db->where('projcla_cla_id', $options['projcla_cla_id']);
			
		if(isset($options['projcla_refcla_id']))
			$this->db->where('projcla_refcla_id', $options['projcla_refcla_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('projetoclasse');

		if(isset($options['projcla_proj_id']) && isset($options['projcla_cla_id']) && isset($options['projcla_refcla_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteProjetoClasse($options = array())
	{
    
		if (!$this-> _required(
			Array('projcla_proj_id', 'projcla_proj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('projcla_cla_id', 'projcla_cla_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('projcla_refcla_id', 'projcla_refcla_id'),
			$options)
		) return false;
		
		$this->db->where('proj_id', $options['proj_id']);
		$this->db->where('projcla_cla_id', $options['projcla_cla_id']);
		$this->db->where('projcla_refcla_id', $options['projcla_refcla_id']);
    	$this->db->delete('projetoclasse');
	}
}

?>