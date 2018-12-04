<?php

class PfRel extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddPfRel($options = array())
	{
		if (!$this-> _required(
			Array('pfrel_sec_cpf_id', 'pfrel_sec_cpf_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('pfrel_main_cpf_id', 'pfrel_main_cpf_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - pfrel_sec_cpf_id
						'pfrel_sec_cpf_id' => $options['pfrel_sec_cpf_id'],
		
						//integer - pfrel_main_cpf_id
						'pfrel_main_cpf_id' => $options['pfrel_main_cpf_id'],
						
					);
		$this->db->insert('pfrel', $postData);
		return $this->db->insert_id();
	}
	
	function UpdatePfRel($options = array())
	{
		if (!$this-> _required(
			Array('pfrel_sec_cpf_id', 'pfrel_sec_cpf_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('pfrel_main_cpf_id', 'pfrel_main_cpf_id'),
			$options)
		) return false;
				
		if(isset($options['pfrel_sec_cpf_id']))
			$this->db->set('pfrel_sec_cpf_id', $options['pfrel_sec_cpf_id']);
			
		if(isset($options['pfrel_main_cpf_id']))
			$this->db->set('pfrel_main_cpf_id', $options['pfrel_main_cpf_id']);
		
		$this->db->where('pfrel_sec_cpf_id', $options['pfrel_sec_cpf_id']);
		$this->db->where('pfrel_main_cpf_id', $options['pfrel_main_cpf_id']);
		$this->db->update('pfrel');
		
		return $this->db->affected_rows();
	}
	
	function GetPfRel($options = array())
	{
		if(isset($options['pfrel_sec_cpf_id']))
			$this->db->where('pfrel_sec_cpf_id', $options['pfrel_sec_cpf_id']);
			
		if(isset($options['pfrel_main_cpf_id']))
			$this->db->where('pfrel_main_cpf_id', $options['pfrel_main_cpf_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('pfrel');

		return $query->row(0);
	}
	
	function DeletePfRel($options = array())
	{
    
		if (!$this-> _required(
			Array('pfrel_sec_cpf_id', 'pfrel_sec_cpf_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('pfrel_main_cpf_id', 'pfrel_main_cpf_id'),
			$options)
		) return false;
		
		$this->db->where('pfrel_sec_cpf_id', $options['pfrel_sec_cpf_id']);
		$this->db->where('pfrel_main_cpf_id', $options['pfrel_main_cpf_id']);
    	$this->db->delete('pfrel');
	}
}

?>