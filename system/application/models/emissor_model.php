<?php

class Emissor_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddEmissor($options = array())
	{
		if (!$this-> _required(
			Array('em_id', 'em_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('em_cnpj_id', 'em_cnpj_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - em_id
						'em_id' => $options['em_id'],
		
						//integer - em_cnpj_id
						'em_cnpj_id' => $options['em_cnpj_id'],
						
					);
		$this->db->insert('emissor', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateEmissor($options = array())
	{
		if (!$this-> _required(
			Array('em_id', 'em_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('em_cnpj_id', 'em_cnpj_id'),
			$options)
		) return false;
				
		if(isset($options['em_cnpj_id']))
			$this->db->set('em_cnpj_id', $options['em_cnpj_id']);
		
		$this->db->where('em_id', $options['em_id']);
		$this->db->update('emissor');
		
		return $this->db->affected_rows();
	}
	
	function GetEmissor($options = array())
	{
		if(isset($options['em_id']))
			$this->db->where('em_id', $options['em_id']);
			
		if(isset($options['em_cnpj_id']))
			$this->db->where('em_cnpj_id', $options['em_cnpj_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('emissor');

		if(isset($options['em_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteEmissor($options = array())
	{
    
		if (!$this-> _required(
			Array('em_id', 'em_id'),
			$options)
		) return false;
		
		$this->db->where('em_id', $options['em_id']);
    	$this->db->delete('emissor');
	}
}

?>