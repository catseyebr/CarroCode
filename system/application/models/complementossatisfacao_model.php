<?php

class ComplementosSatisfacao_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddComplementosSatisfacao($options = array())
	{
		if (!$this-> _required(
			Array('csa_id', 'csa_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('csa_nome', 'csa_nome'),
			$options)
		) return false;
				
		$postData = array(
						//integer - csa_id
						'csa_id' => $options['csa_id'],
		
						//char - csa_nome
						'csa_nome' => $options['csa_nome']
						
					);
		$this->db->insert('complementossatisfacao', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateComplementosSatisfacao($options = array())
	{
		if (!$this-> _required(
			Array('csa_id', 'csa_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('csa_nome', 'csa_nome'),
			$options)
		) return false;
				
		if(isset($options['csa_id']))
			$this->db->set('csa_id', $options['csa_id']);
			
		if(isset($options['csa_nome']))
			$this->db->set('csa_nome', $options['csa_nome']);
			
		$this->db->where('csa_id', $options['csa_id']);
		$this->db->update('complementossatisfacao');
		
		return $this->db->affected_rows();
	}
	
	function GetComplementosSatisfacao($options = array())
	{
		if(isset($options['csa_id']))
			$this->db->where('csa_id', $options['csa_id']);
			
		if(isset($options['csa_nome']))
			$this->db->where('csa_nome', $options['csa_nome']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('complementossatisfacao');

		if(isset($options['csa_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteComplementosSatisfacao($options = array())
	{
    
		if (!$this-> _required(
			Array('csa_id', 'csa_id'),
			$options)
		) return false;
		
		$this->db->where('csa_id', $options['csa_id']);
		$this->db->delete('complementossatisfacao');
	}
}

?>