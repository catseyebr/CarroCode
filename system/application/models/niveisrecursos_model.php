<?php

class NiveisRecursos_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddNiveisRecursos($options = array())
	{
		if (!$this-> _required(
			Array('nre_rec_id', 'nre_rec_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('nre_niv_id', 'nre_niv_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - nre_rec_id
						'nre_rec_id' => $options['nre_rec_id'],
		
						//integer - nre_niv_id
						'nre_niv_id' => $options['nre_niv_id'],
						
					);
		$this->db->insert('niveisrecursos', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateNiveisRecursos($options = array())
	{
		if (!$this-> _required(
			Array('nre_rec_id', 'nre_rec_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('nre_niv_id', 'nre_niv_id'),
			$options)
		) return false;
				
		if(isset($options['nre_rec_id']))
			$this->db->set('nre_rec_id', $options['nre_rec_id']);
			
		if(isset($options['nre_niv_id']))
			$this->db->set('nre_niv_id', $options['nre_niv_id']);
		
		$this->db->where('nre_rec_id', $options['nre_rec_id']);
		$this->db->where('nre_niv_id', $options['nre_niv_id']);
		$this->db->update('niveisrecursos');
		
		return $this->db->affected_rows();
	}
	
	function GetNiveisRecursos($options = array())
	{
		$this->db->join('niveis', 'niv_id = nre_niv_id', 'left');
		$this->db->join('recursos', 'rec_id = nre_rec_id', 'left');
		
		if(isset($options['nre_rec_id']))
			$this->db->where('nre_rec_id', $options['nre_rec_id']);
			
		if(isset($options['nre_niv_id']))
			$this->db->where('nre_niv_id', $options['nre_niv_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('niveisrecursos');

		return $query->result();
	}
	
	function DeleteNiveisRecursos($options = array())
	{
    
		if (!$this-> _required(
			Array('nre_rec_id', 'nre_rec_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('nre_niv_id', 'nre_niv_id'),
			$options)
		) return false;
		
		$this->db->where('nre_rec_id', $options['nre_rec_id']);
		$this->db->where('nre_niv_id', $options['nre_niv_id']);
    	$this->db->delete('niveisrecursos');
	}
}

?>