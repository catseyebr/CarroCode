<?php

class GrpEspecAssoc_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddGrpEspecAssoc($options = array())
	{
		if (!$this-> _required(
			Array('grpespecassoc_grpespec_id', 'grpespecassoc_grpespec_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('grpespecassoc_grp_id', 'grpespecassoc_grp_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - grpespecassoc_grpespec_id
						'grpespecassoc_grpespec_id' => $options['grpespecassoc_grpespec_id'],
		
						//integer - grpespecassoc_grp_id
						'grpespecassoc_grp_id' => $options['grpespecassoc_grp_id'],
						
					);
		$this->db->insert('grpespecassoc', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateGrpEspecAssoc($options = array())
	{
		if (!$this-> _required(
			Array('grpespecassoc_grpespec_id', 'grpespecassoc_grpespec_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('grpespecassoc_grp_id', 'grpespecassoc_grp_id'),
			$options)
		) return false;
				
		if(isset($options['grpespecassoc_grpespec_id']))
			$this->db->set('grpespecassoc_grpespec_id', $options['grpespecassoc_grpespec_id']);
			
		if(isset($options['grpespecassoc_grp_id']))
			$this->db->set('grpespecassoc_grp_id', $options['grpespecassoc_grp_id']);
		
		$this->db->where('grpespecassoc_grpespec_id', $options['grpespecassoc_grpespec_id']);
		$this->db->where('grpespecassoc_grp_id', $options['grpespecassoc_grp_id']);
		$this->db->update('grpespecassoc');
		
		return $this->db->affected_rows();
	}
	
	function GetGrpEspecAssoc($options = array())
	{
		$this->db->join('grupoespec', 'grpespec_id = grpespecassoc_grpespec_id', 'left');
		
		if(isset($options['grpespecassoc_grpespec_id']))
			$this->db->where('grpespecassoc_grpespec_id', $options['grpespecassoc_grpespec_id']);
			
		if(isset($options['grpespecassoc_grp_id']))
			$this->db->where('grpespecassoc_grp_id', $options['grpespecassoc_grp_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('grpespecassoc');

		return $query->result();
	}
	
	function DeleteGrpEspecAssoc($options = array())
	{
    
		if (!$this-> _required(
			Array('grpespecassoc_grpespec_id', 'grpespecassoc_grpespec_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('grpespecassoc_grp_id', 'grpespecassoc_grp_id'),
			$options)
		) return false;
		
		$this->db->where('grpespecassoc_grpespec_id', $options['grpespecassoc_grpespec_id']);
		$this->db->where('grpespecassoc_grp_id', $options['grpespecassoc_grp_id']);
    	$this->db->delete('grpespecassoc');
	}
}

?>