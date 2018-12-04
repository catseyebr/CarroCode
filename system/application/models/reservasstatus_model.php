<?php

class ReservasStatus_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddReservasStatus($options = array())
	{
		if (!$this-> _required(
			Array('sta_nome', 'sta_nome'),
			$options)
		) return false;
		
		$postData = array();
		
		if(isset($options['sta_id']))
			//integer
			$postData['sta_id'] = $options['sta_id'];
		
		//---------------------------------------------------
		
			//integer
			$postData['sta_nome'] = $options['sta_nome'];
		
		//---------------------------------------------------
		
		if(isset($options['sta_titulo'])){
			//integer
			$postData['sta_titulo'] = $options['sta_titulo'];
		}else{
			$postData['sta_titulo'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['sta_desc'])){
			//integer
			$postData['sta_desc'] = $options['sta_desc'];
		}else{
			$postData['sta_desc'] = NULL;
		}
		
		//---------------------------------------------------
		
		$this->db->insert('reservasstatus', $postData);
		if(isset($options['sta_id'])){
			if($postData['sta_id'] >= $this->db->insert_id()){
				$next_sequence = $postData['sta_id']+1;
				$this->db->simple_query("ALTER SEQUENCE reservasstatus_sta_id_seq RESTART WITH $next_sequence");
			}
			return $postData['sta_id'];
		}else{
			return $this->db->insert_id();
		}
	}
	
	function UpdateReservasStatus($options = array())
	{
		if (!$this-> _required(
			Array('sta_id', 'sta_id'),
			$options)
		) return false;
		
		if(isset($options['sta_nome']))
			$this->db->set('sta_nome', $options['sta_nome']);
			
		if(isset($options['sta_ativo']))
			$this->db->set('sta_ativo', $options['sta_ativo']);
			
		$this->db->where('sta_id', $options['sta_id']);
		$this->db->update('reservasstatus');
		
		return $this->db->affected_rows();
	}
	
	function GetReservasStatus($options = array())
	{
		if(isset($options['sta_id']))
			$this->db->where('sta_id', $options['sta_id']);
			
		if(isset($options['sta_nome']))
			$this->db->where('sta_nome', $options['sta_nome']);
			
		if(isset($options['sta_ativo']))
			$this->db->where('sta_ativo', $options['sta_ativo']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('reservasstatus');

		if(isset($options['sta_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteReservasStatus($options = array())
	{
    
		if (!$this-> _required(
			Array('sta_id', 'sta_id'),
			$options)
		) return false;
		
		$this->db->where('sta_id', $options['sta_id']);
    	$this->db->delete('reservasstatus');
	}
}

?>