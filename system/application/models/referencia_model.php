<?php

class Referencia_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddReferencia($options = array())
	{
		if (!$this-> _required(
			Array('ref_id', 'ref_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ref_nome', 'ref_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ref_distancia', 'ref_distancia'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ref_tipo', 'ref_tipo'),
			$options)
		) return false;
		
		$postData = array(
						//integer - ref_id
						'ref_id' => $options['ref_id'],
		
						//char - ref_nome
						'ref_nome' => $options['ref_nome'],
		
						//char - ref_distancia
						'ref_distancia' => $options['ref_distancia'],
		
						//char - ref_tipo
						'ref_tipo' => $options['ref_tipo']
		
					);
		$this->db->insert('referencia', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateReferencia($options = array())
	{
		if (!$this-> _required(
			Array('ref_id', 'ref_id'),
			$options)
		) return false;
		
		if(isset($options['ref_nome']))
			$this->db->set('ref_nome', $options['ref_nome']);
			
		if(isset($options['ref_distancia']))
			$this->db->set('ref_distancia', $options['ref_distancia']);
			
		if(isset($options['ref_tipo']))
			$this->db->set('ref_tipo', $options['ref_tipo']);
			
		$this->db->where('ref_id', $options['ref_id']);
		$this->db->update('referencia');
		
		return $this->db->affected_rows();
	}
	
	function GetReferencia($options = array())
	{
		if(isset($options['ref_id']))
			$this->db->where('ref_id', $options['ref_id']);
			
		if(isset($options['ref_nome']))
			$this->db->where('ref_nome', $options['ref_nome']);
			
		if(isset($options['ref_distancia']))
			$this->db->where('ref_distancia', $options['ref_distancia']);
			
		if(isset($options['ref_tipo']))
			$this->db->where('ref_tipo', $options['ref_tipo']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('referencia');

		if(isset($options['ref_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteReferencia($options = array())
	{
    
		if (!$this-> _required(
			Array('ref_id', 'ref_id'),
			$options)
		) return false;
		
		$this->db->where('ref_id', $options['ref_id']);
    	$this->db->delete('referencia');
	}
}

?>