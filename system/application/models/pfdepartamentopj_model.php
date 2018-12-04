<?php

class PfDepartamentoPj_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddPfDepartamentoPj($options = array())
	{
		if (!$this-> _required(
			Array('pfdeppj_deppj_id', 'pfdeppj_deppj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('pfdeppj_cpf_id', 'pfdeppj_cpf_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - pfdeppj_deppj_id
						'pfdeppj_deppj_id' => $options['pfdeppj_deppj_id'],
		
						//integer - pfdeppj_cpf_id
						'pfdeppj_cpf_id' => $options['pfdeppj_cpf_id'],
						
					);
		$this->db->insert('pfdepartamentopj', $postData);
		return $this->db->insert_id();
	}
	
	function UpdatePfDepartamentoPj($options = array())
	{
		if (!$this-> _required(
			Array('pfdeppj_deppj_id', 'pfdeppj_deppj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('pfdeppj_cpf_id', 'pfdeppj_cpf_id'),
			$options)
		) return false;
				
		if(isset($options['pfdeppj_deppj_id']))
			$this->db->set('pfdeppj_deppj_id', $options['pfdeppj_deppj_id']);
			
		if(isset($options['pfdeppj_cpf_id']))
			$this->db->set('pfdeppj_cpf_id', $options['pfdeppj_cpf_id']);
		
		$this->db->where('pfdeppj_deppj_id', $options['pfdeppj_deppj_id']);
		$this->db->where('pfdeppj_cpf_id', $options['pfdeppj_cpf_id']);
		$this->db->update('pfdepartamentopj');
		
		return $this->db->affected_rows();
	}
	
	function GetPfDepartamentoPj($options = array())
	{
		if(isset($options['pfdeppj_deppj_id']))
			$this->db->where('pfdeppj_deppj_id', $options['pfdeppj_deppj_id']);
			
		if(isset($options['pfdeppj_cpf_id']))
			$this->db->where('pfdeppj_cpf_id', $options['pfdeppj_cpf_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('pfdepartamentopj');

		return $query->row(0);
	}
	
	function DeletePfDepartamentoPj($options = array())
	{
    
		if (!$this-> _required(
			Array('pfdeppj_deppj_id', 'pfdeppj_deppj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('pfdeppj_cpf_id', 'pfdeppj_cpf_id'),
			$options)
		) return false;
		
		$this->db->where('pfdeppj_deppj_id', $options['pfdeppj_deppj_id']);
		$this->db->where('pfdeppj_cpf_id', $options['pfdeppj_cpf_id']);
    	$this->db->delete('pfdepartamentopj');
	}
}

?>