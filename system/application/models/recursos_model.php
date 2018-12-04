<?php

class Recursos_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddRecursos($options = array())
	{
		if (!$this-> _required(
			Array('rec_nome', 'rec_nome'),
			$options)
		) return false;
		
		$postData = array(
						//char - rec_nome
						'rec_nome' => $options['rec_nome']
		
					);
		$this->db->insert('recursos', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateRecursos($options = array())
	{
		if (!$this-> _required(
			Array('rec_id', 'rec_id'),
			$options)
		) return false;
		
		if(isset($options['rec_nome']))
			$this->db->set('rec_nome', $options['rec_nome']);
			
		$this->db->where('rec_id', $options['rec_id']);
		$this->db->update('recursos');
		
		return $this->db->affected_rows();
	}
	
	function GetRecursos($options = array())
	{
		if(isset($options['rec_id']))
			$this->db->where('rec_id', $options['rec_id']);
			
		if(isset($options['rec_nome']))
			$this->db->where('rec_nome', $options['rec_nome']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('recursos');

		if(isset($options['rec_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteRecursos($options = array())
	{
    
		if (!$this-> _required(
			Array('rec_id', 'rec_id'),
			$options)
		) return false;
		
		$this->db->where('rec_id', $options['rec_id']);
    	$this->db->delete('recursos');
	}
}

?>