<?php

class Produtos_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddProdutos($options = array())
	{
		if (!$this-> _required(
			Array('produ_nome', 'produ_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('produ_classe', 'produ_classe'),
			$options)
		) return false;
		
		$postData = array(
						
						//char - produ_nome
						'produ_nome' => $options['produ_nome'],
		
						//char - produ_classe
						'produ_classe' => $options['produ_classe'],
		
					);
		$this->db->insert('produtos', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateProdutos($options = array())
	{
		if (!$this-> _required(
			Array('produ_id', 'produ_id'),
			$options)
		) return false;
		
		if(isset($options['produ_nome']))
			$this->db->set('produ_nome', $options['produ_nome']);
			
		if(isset($options['produ_classe']))
			$this->db->set('produ_classe', $options['produ_classe']);
			
		$this->db->where('produ_id', $options['produ_id']);
		$this->db->update('produtos');
		
		return $this->db->affected_rows();
	}
	
	function GetProdutos($options = array())
	{
		if(isset($options['produ_id']))
			$this->db->where('produ_id', $options['produ_id']);
			
		if(isset($options['produ_nome']))
			$this->db->where('produ_nome', $options['produ_nome']);
			
		if(isset($options['produ_classe']))
			$this->db->where('produ_classe', $options['produ_classe']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('produtos');

		if(isset($options['produ_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteProdutos($options = array())
	{
    
		if (!$this-> _required(
			Array('produ_id', 'produ_id'),
			$options)
		) return false;
		
		$this->db->where('produ_id', $options['produ_id']);
    	$this->db->delete('produtos');
	}
}

?>