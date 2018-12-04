<?php

class ReferenciaClasse_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddReferenciaClasse($options = array())
	{
		if (!$this-> _required(
			Array('refcla_nome', 'refcla_nome'),
			$options)
		) return false;
				
		$postData = array(
						
						//char - refcla_nome
						'refcla_nome' => $options['refcla_nome']
		
					);
		$this->db->insert('referenciaclasse', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateReferenciaClasse($options = array())
	{
		if (!$this-> _required(
			Array('refcla_id', 'refcla_id'),
			$options)
		) return false;
		
		if(isset($options['refcla_nome']))
			$this->db->set('refcla_nome', $options['refcla_nome']);
			
		$this->db->where('refcla_id', $options['refcla_id']);
		$this->db->update('referenciaclasse');
		
		return $this->db->affected_rows();
	}
	
	function GetReferenciaClasse($options = array())
	{
		if(isset($options['refcla_id']))
			$this->db->where('refcla_id', $options['refcla_id']);
			
		if(isset($options['refcla_nome']))
			$this->db->where('refcla_nome', $options['refcla_nome']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('referenciaclasse');

		if(isset($options['refcla_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteReferenciaClasse($options = array())
	{
    
		if (!$this-> _required(
			Array('refcla_id', 'refcla_id'),
			$options)
		) return false;
		
		$this->db->where('refcla_id', $options['refcla_id']);
    	$this->db->delete('referenciaclasse');
	}
}

?>