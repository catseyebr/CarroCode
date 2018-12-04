<?php

class AvaliacaoOp_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddAvaliacaoOp($options = array())
	{
		if (!$this-> _required(
			Array('avalop_nome', 'avalop_nome'),
			$options)
		) return false;
		
		$postData = array();
		
		$postData['avalop_nome'] = $options['avalop_nome'];
		
		$this->db->insert('avaliacaoop', $postData);
		
		return $this->db->insert_id();
	}
	
	function UpdateAvaliacaoOp($options = array())
	{
		if (!$this-> _required(
			Array('avalop_id', 'avalop_id'),
			$options)
		) return false;
		
		if(isset($options['avalop_nome']))
			$this->db->set('avalop_nome', $options['avalop_nome']);
			
		$this->db->where('avalop_id', $options['avalop_id']);
		$this->db->update('avaliacaoop');
		
		return $this->db->affected_rows();
	}
	
	function GetAvaliacaoOp($options = array())
	{
		if(isset($options['avalop_id']))
			$this->db->where('avalop_id', $options['avalop_id']);
			
		if(isset($options['avalop_nome']))
			$this->db->where('avalop_nome', $options['avalop_nome']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);
			
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);
			
		$query = $this->db->get('avaliacaoop');

		return $query->result();
	}
	
	function GetAvaliacaoOpId($options = array())
	{
		if(isset($options['avalop_nome']))
			$this->db->where('avalop_nome ILIKE', $options['avalop_nome']);
			
		$query = $this->db->get('avaliacaoop');
		
		if ($query->row(0) != NULL){
			return $query->row(0)->avalop_id;
		}else{
			return false;
		}
	}
	
	function DeleteAvaliacaoOp($options = array())
	{
    
		if (!$this-> _required(
			Array('avalop_id', 'avalop_id'),
			$options)
		) return false;
		
		$this->db->where('avalop_id', $options['avalop_id']);
    	$this->db->delete('avaliacaoop');
	}
}

?>