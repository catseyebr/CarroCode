<?php

class ContatoDep_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddContatoDep($options = array())
	{
		if (!$this-> _required(
			Array('condep_deppj_id', 'condep_deppj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('condep_con_id', 'condep_con_id'),
			$options)
		) return false;
		
		$postData = array(
						
						//integer - condep_deppj_id
						'condep_deppj_id' => $options['condep_deppj_id'],
		
						//integer - condep_con_id
						'condep_con_id' => $options['condep_con_id']
						
					);
		$this->db->insert('contatodep', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateContatoDep($options = array())
	{
		if (!$this-> _required(
			Array('condep_id', 'condep_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('condep_deppj_id', 'condep_deppj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('condep_con_id', 'condep_con_id'),
			$options)
		) return false;
				
		if(isset($options['condep_deppj_id']))
			$this->db->set('condep_deppj_id', $options['condep_deppj_id']);
			
		if(isset($options['condep_con_id']))
			$this->db->set('condep_con_id', $options['condep_con_id']);
			
		$this->db->where('condep_id', $options['condep_id']);
		$this->db->update('contatodep');
		
		return $this->db->affected_rows();
	}
	
	function GetContatoDep($options = array())
	{
		if(isset($options['condep_id']))
			$this->db->where('condep_id', $options['condep_id']);
			
		if(isset($options['condep_con_id']))
			$this->db->where('condep_con_id', $options['condep_con_id']);
			
		if(isset($options['condep_deppj_id']))
			$this->db->where('condep_deppj_id', $options['condep_deppj_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('contatodep');

		if(isset($options['condep_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteContatoDep($options = array())
	{
    
		if (!$this-> _required(
			Array('condep_id', 'condep_id'),
			$options)
		) return false;
		
		$this->db->where('condep_id', $options['condep_id']);
		$this->db->delete('contatodep');
	}
}

?>