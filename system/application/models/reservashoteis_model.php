<?php

class ReservasHoteis_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddReservasHoteis($options = array())
	{
		if (!$this-> _required(
			Array('reshot_id', 'reshot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('reshot_usu_id_operador', 'reshot_usu_id_operador'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('reshot_checkin', 'reshot_checkin'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('reshot_checkout', 'reshot_checkout'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('reshot_dthcadastro', 'reshot_dthcadastro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('reshot_valor', 'reshot_valor'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('reshot_sta_id', 'reshot_sta_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('reshot_cli_id', 'reshot_cli_id'),
			$options)
		) return false;
		
				
		$postData = array(
						//integer - reshot_id
						'reshot_id' => $options['reshot_id'],
		
						//integer - reshot_usu_id_operador
						'reshot_usu_id_operador' => $options['reshot_usu_id_operador'],
		
						//date - reshot_checkin
						'reshot_checkin' => $options['reshot_checkin'],
		
						//date - reshot_checkout
						'reshot_checkout' => $options['reshot_checkout'],
		
						//date - reshot_dthcadastro
						'reshot_dthcadastro' => $options['reshot_dthcadastro'],
		
						//numeric(10,2) - reshot_valor
						'reshot_valor' => $options['reshot_valor'],
		
						//integer - reshot_sta_id
						'reshot_sta_id' => $options['reshot_sta_id'],
		
						//integer - reshot_cli_id
						'reshot_cli_id' => $options['reshot_cli_id']
		
					);
		$this->db->insert('reservashoteis', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateReservasHoteis($options = array())
	{
		if (!$this-> _required(
			Array('reshot_id', 'reshot_id'),
			$options)
		) return false;
		
		if(isset($options['reshot_usu_id_operador']))
			$this->db->set('reshot_usu_id_operador', $options['reshot_usu_id_operador']);
			
		if(isset($options['reshot_checkin']))
			$this->db->set('reshot_checkin', $options['reshot_checkin']);
			
		if(isset($options['reshot_checkout']))
			$this->db->set('reshot_checkout', $options['reshot_checkout']);
			
		if(isset($options['reshot_dthcadastro']))
			$this->db->set('reshot_dthcadastro', $options['reshot_dthcadastro']);
			
		if(isset($options['reshot_valor']))
			$this->db->set('reshot_valor', $options['reshot_valor']);
			
		if(isset($options['reshot_sta_id']))
			$this->db->set('reshot_sta_id', $options['reshot_sta_id']);
			
		if(isset($options['reshot_cli_id']))
			$this->db->set('reshot_cli_id', $options['reshot_cli_id']);
			
		$this->db->where('reshot_id', $options['reshot_id']);
		$this->db->update('reservashoteis');
		
		return $this->db->affected_rows();
	}
	
	function GetReservasHoteis($options = array())
	{
		if(isset($options['reshot_id']))
			$this->db->where('reshot_id', $options['reshot_id']);
			
		if(isset($options['reshot_usu_id_operador']))
			$this->db->where('reshot_usu_id_operador', $options['reshot_usu_id_operador']);
			
		if(isset($options['reshot_checkin']))
			$this->db->where('reshot_checkin', $options['reshot_checkin']);
			
		if(isset($options['reshot_checkout']))
			$this->db->where('reshot_checkout', $options['reshot_checkout']);
			
		if(isset($options['reshot_dthcadastro']))
			$this->db->where('reshot_dthcadastro', $options['reshot_dthcadastro']);
			
		if(isset($options['reshot_valor']))
			$this->db->where('reshot_valor', $options['reshot_valor']);
			
		if(isset($options['reshot_sta_id']))
			$this->db->where('reshot_sta_id', $options['reshot_sta_id']);
			
		if(isset($options['reshot_cli_id']))
			$this->db->where('reshot_cli_id', $options['reshot_cli_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('reservashoteis');

		if(isset($options['reshot_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteReservasHoteis($options = array())
	{
    
		if (!$this-> _required(
			Array('reshot_id', 'reshot_id'),
			$options)
		) return false;
		
		$this->db->where('reshot_id', $options['reshot_id']);
    	$this->db->delete('reservashoteis');
	}
}

?>