<?php

class Condutor_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddCondutor($options = array())
	{
		if (!$this-> _required(
			Array('cond_id', 'cond_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cond_cpf_id', 'cond_cpf_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cond_cnh', 'cond_cnh'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cond_validade_cnh', 'cond_validade_cnh'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cond_cih', 'cond_cih'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cond_validade_cih', 'cond_validade_cih'),
			$options)
		) return false;
				
		$postData = array(
						//integer - cond_id
						'cond_id' => $options['cond_id'],
		
						//integer - cond_cpf_id
						'cond_cpf_id' => $options['cond_cpf_id'],
		
						//char - cond_cnh
						'cond_cnh' => $options['cond_cnh'],
		
						//date - cond_validade_cnh
						'cond_validade_cnh' => $options['cond_validade_cnh'],
		
						//char - cond_cih
						'cond_cih' => $options['cond_cih'],
		
						//date - cond_validade_cih
						'cond_validade_cih' => $options['cond_validade_cih']
						
					);
		$this->db->insert('condutor', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateCondutor($options = array())
	{
		if (!$this-> _required(
			Array('cond_id', 'cond_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cond_cpf_id', 'cond_cpf_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cond_cnh', 'cond_cnh'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cond_validade_cnh', 'cond_validade_cnh'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cond_cih', 'cond_cih'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cond_validade_cih', 'cond_validade_cih'),
			$options)
		) return false;
				
		if(isset($options['cond_cpf_id']))
			$this->db->set('cond_cpf_id', $options['cond_cpf_id']);
			
		if(isset($options['cond_cnh']))
			$this->db->set('cond_cnh', $options['cond_cnh']);
			
		if(isset($options['cond_validade_cnh']))
			$this->db->set('cond_validade_cnh', $options['cond_validade_cnh']);
			
		if(isset($options['cond_cih']))
			$this->db->set('cond_cih', $options['cond_cih']);
			
		if(isset($options['cond_validade_cih']))
			$this->db->set('cond_validade_cih', $options['cond_validade_cih']);
			
		$this->db->where('cond_id', $options['cond_id']);
		$this->db->update('condutor');
		
		return $this->db->affected_rows();
	}
	
	function GetCondutor($options = array())
	{
		if(isset($options['cond_id']))
			$this->db->where('cond_id', $options['cond_id']);
			
		if(isset($options['cond_cpf_id']))
			$this->db->where('cond_cpf_id', $options['cond_cpf_id']);
			
		if(isset($options['cond_cnh']))
			$this->db->where('cond_cnh', $options['cond_cnh']);
			
		if(isset($options['cond_validade_cnh']))
			$this->db->where('cond_validade_cnh', $options['cond_validade_cnh']);
			
		if(isset($options['cond_cih']))
			$this->db->where('cond_cih', $options['cond_cih']);
			
		if(isset($options['cond_validade_cih']))
			$this->db->where('cond_validade_cih', $options['cond_validade_cih']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('condutor');

		if(isset($options['cond_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteCondutor($options = array())
	{
    
		if (!$this-> _required(
			Array('cond_id', 'cond_id'),
			$options)
		) return false;
		
		$this->db->where('cond_id', $options['cond_id']);
		$this->db->delete('condutor');
	}
}

?>