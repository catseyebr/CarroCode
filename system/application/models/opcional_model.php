<?php

class Opcional_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddOpcional($options = array())
	{
		if (!$this-> _required(
			Array('opc_loc_id', 'opc_loc_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('opc_valor', 'opc_valor'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('opc_nome', 'opc_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('opc_valorextra', 'opc_valorextra'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('opc_diaria', 'opc_diaria'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('opc_todaslojas', 'opc_todaslojas'),
			$options)
		) return false;
				
		$postData = array(
						//integer - opc_id
						'opc_id' => $options['opc_id'],
		
						//integer - opc_loc_id
						'opc_loc_id' => $options['opc_loc_id'],
		
						//numeric - opc_valor
						'opc_valor' => $options['opc_valor'],
		
						//char - opc_nome
						'opc_nome' => $options['opc_nome'],
		
						//float - opc_valorextra
						'opc_valorextra' => $options['opc_valorextra'],
		
						//boolean - opc_diaria
						'opc_diaria' => $options['opc_diaria'],
		
						//boolean - opc_todaslojas
						'opc_todaslojas' => $options['opc_todaslojas'],
		
					);
		$this->db->insert('opcional', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateOpcional($options = array())
	{
		if (!$this-> _required(
			Array('opc_id', 'opc_id'),
			$options)
		) return false;
		
		if(isset($options['opc_loc_id']))
			$this->db->set('opc_loc_id', $options['opc_loc_id']);
			
		if(isset($options['opc_valor']))
			$this->db->set('opc_valor', $options['opc_valor']);
			
		if(isset($options['opc_nome']))
			$this->db->set('opc_nome', $options['opc_nome']);
			
		if(isset($options['opc_valorextra']))
			$this->db->set('opc_valorextra', $options['opc_valorextra']);
			
		if(isset($options['opc_diaria']))
			$this->db->set('opc_diaria', $options['opc_diaria']);
			
		if(isset($options['opc_todaslojas']))
			$this->db->set('opc_todaslojas', $options['opc_todaslojas']);
			
		$this->db->where('opc_id', $options['opc_id']);
		$this->db->update('opcional');
		
		return $this->db->affected_rows();
	}
	
	function GetOpcional($options = array())
	{
		if(isset($options['opc_id']))
			$this->db->where('opc_id', $options['opc_id']);
			
		if(isset($options['opc_loc_id']))
			$this->db->where('opc_loc_id', $options['opc_loc_id']);
			
		if(isset($options['opc_valor']))
			$this->db->where('opc_valor', $options['opc_valor']);
			
		if(isset($options['opc_nome']))
			$this->db->where('opc_nome', $options['opc_nome']);
			
		if(isset($options['opc_valorextra']))
			$this->db->where('opc_valorextra', $options['opc_valorextra']);
			
		if(isset($options['opc_diaria']))
			$this->db->where('opc_diaria', $options['opc_diaria']);
			
		if(isset($options['opc_todaslojas']))
			$this->db->where('opc_todaslojas', $options['opc_todaslojas']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('opcional');

		if(isset($options['opc_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteOpcional($options = array())
	{
    
		if (!$this-> _required(
			Array('opc_id', 'opc_id'),
			$options)
		) return false;
		
		$this->db->where('opc_id', $options['opc_id']);
    	$this->db->delete('opcional');
	}
}

?>