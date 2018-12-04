<?php

class ContatoPj_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddContatoPj($options = array())
	{
		if (!$this-> _required(
			Array('conpj_con_id', 'conpj_con_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('conpj_cnpj_id', 'conpj_cnpj_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - conpj_con_id
						'conpj_con_id' => $options['conpj_con_id'],
		
						//integer - conpj_cnpj_id
						'conpj_cnpj_id' => $options['conpj_cnpj_id']
						
					);
		$this->db->insert('contatopj', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateContatoPj($options = array())
	{
		if (!$this-> _required(
			Array('conpj_id', 'conpj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('conpj_con_id', 'conpj_con_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('conpj_cnpj_id', 'conpj_cnpj_id'),
			$options)
		) return false;
				
		if(isset($options['conpj_con_id']))
			$this->db->set('conpj_con_id', $options['conpj_con_id']);
			
		if(isset($options['conpj_cnpj_id']))
			$this->db->set('conpj_cnpj_id', $options['conpj_cnpj_id']);
			
		$this->db->where('conpj_id', $options['conpj_id']);
		$this->db->update('contatopj');
		
		return $this->db->affected_rows();
	}
	
	function GetContatoPj($options = array())
	{
		if(isset($options['conpj_id']))
			$this->db->where('conpj_id', $options['conpj_id']);
			
		if(isset($options['conpj_con_id']))
			$this->db->where('conpj_con_id', $options['conpj_con_id']);
			
		if(isset($options['conpj_cnpj_id']))
			$this->db->where('conpj_cnpj_id', $options['conpj_cnpj_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('contatopj');

		if(isset($options['conpj_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteContatoPj($options = array())
	{
    
		if (!$this-> _required(
			Array('conpj_id', 'conpj_id'),
			$options)
		) return false;
		
		$this->db->where('conpj_id', $options['conpj_id']);
		$this->db->delete('contatopj');
	}
}

?>