<?php

class TelefonesAtendimento_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddTelefonesAtendimento($options = array())
	{
		if (!$this-> _required(
			Array('tat_id', 'tat_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tat_ddd', 'tat_ddd'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tat_fone', 'tat_fone'),
			$options)
		) return false;
						
		$postData = array(
						//integer - tat_id
						'tat_id' => $options['tat_id'],
		
						//integer - tat_ddd
						'tat_ddd' => $options['tat_ddd'],
		
						//integer - tat_fone
						'tat_fone' => $options['tat_fone']
		
					);
		$this->db->insert('telefonesatendimento', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateTelefonesAtendimento($options = array())
	{
		if (!$this-> _required(
			Array('tat_id', 'tat_id'),
			$options)
		) return false;
		
		if(isset($options['tat_ddd']))
			$this->db->set('tat_ddd', $options['tat_ddd']);
			
		if(isset($options['tat_fone']))
			$this->db->set('tat_fone', $options['tat_fone']);
			
		$this->db->where('tat_id', $options['tat_id']);
		$this->db->update('telefonesatendimento');
		
		return $this->db->affected_rows();
	}
	
	function GetTelefonesAtendimento($options = array())
	{
		if(isset($options['tat_id']))
			$this->db->where('tat_id', $options['tat_id']);
			
		if(isset($options['tat_ddd']))
			$this->db->where('tat_ddd', $options['tat_ddd']);
			
		if(isset($options['tat_fone']))
			$this->db->where('tat_fone', $options['tat_fone']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('telefonesatendimento');

		if(isset($options['tat_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteTelefonesAtendimento($options = array())
	{
    
		if (!$this-> _required(
			Array('tat_id', 'tat_id'),
			$options)
		) return false;
		
		$this->db->where('tat_id', $options['tat_id']);
    	$this->db->delete('telefonesatendimento');
	}
}

?>