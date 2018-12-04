<?php

class ReservasHoteisHistorico_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddReservasHoteisHistorico($options = array())
	{
		if (!$this-> _required(
			Array('rhothist_id', 'rhothist_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rhothist_reshot_id', 'rhothist_reshot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rhothist_sta_id', 'rhothist_sta_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rhothist_usu_id', 'rhothist_usu_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rhothist_dthcadastro', 'rhothist_dthcadastro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rhothist_mensagem', 'rhothist_mensagem'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rhothist_obs', 'rhothist_obs'),
			$options)
		) return false;		
				
		$postData = array(
						//integer - rhothist_id
						'rhothist_id' => $options['rhothist_id'],
		
						//integer - rhothist_reshot_id
						'rhothist_reshot_id' => $options['rhothist_reshot_id'],
		
						//integer - rhothist_sta_id
						'rhothist_sta_id' => $options['rhothist_sta_id'],
		
						//integer - rhothist_usu_id
						'rhothist_usu_id' => $options['rhothist_usu_id'],
		
						//date - rhothist_dthcadastro
						'rhothist_dthcadastro' => $options['rhothist_dthcadastro'],
		
						//text - rhothist_mensagem
						'rhothist_mensagem' => $options['rhothist_mensagem'],
		
						//integer - rhothist_obs
						'rhothist_obs' => $options['rhothist_obs']
		
					);
		$this->db->insert('reservashoteishistorico', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateReservasHoteisHistorico($options = array())
	{
		if (!$this-> _required(
			Array('rhothist_id', 'rhothist_id'),
			$options)
		) return false;
		
		if(isset($options['rhothist_reshot_id']))
			$this->db->set('rhothist_reshot_id', $options['rhothist_reshot_id']);
			
		if(isset($options['rhothist_sta_id']))
			$this->db->set('rhothist_sta_id', $options['rhothist_sta_id']);
			
		if(isset($options['rhothist_usu_id']))
			$this->db->set('rhothist_usu_id', $options['rhothist_usu_id']);
			
		if(isset($options['rhothist_dthcadastro']))
			$this->db->set('rhothist_dthcadastro', $options['rhothist_dthcadastro']);
			
		if(isset($options['rhothist_mensagem']))
			$this->db->set('rhothist_mensagem', $options['rhothist_mensagem']);
			
		if(isset($options['rhothist_obs']))
			$this->db->set('rhothist_obs', $options['rhothist_obs']);
			
		$this->db->where('rhothist_id', $options['rhothist_id']);
		$this->db->update('reservashoteishistorico');
		
		return $this->db->affected_rows();
	}
	
	function GetReservasHoteisHistorico($options = array())
	{
		if(isset($options['rhothist_id']))
			$this->db->where('rhothist_id', $options['rhothist_id']);
			
		if(isset($options['rhothist_reshot_id']))
			$this->db->where('rhothist_reshot_id', $options['rhothist_reshot_id']);
			
		if(isset($options['rhothist_sta_id']))
			$this->db->where('rhothist_sta_id', $options['rhothist_sta_id']);
			
		if(isset($options['rhothist_usu_id']))
			$this->db->where('rhothist_usu_id', $options['rhothist_usu_id']);
			
		if(isset($options['rhothist_dthcadastro']))
			$this->db->where('rhothist_dthcadastro', $options['rhothist_dthcadastro']);
			
		if(isset($options['rhothist_mensagem']))
			$this->db->where('rhothist_mensagem', $options['rhothist_mensagem']);
			
		if(isset($options['rhothist_obs']))
			$this->db->where('rhothist_obs', $options['rhothist_obs']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('reservashoteishistorico');

		if(isset($options['rhothist_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteReservasHoteisHistorico($options = array())
	{
    
		if (!$this-> _required(
			Array('rhothist_id', 'rhothist_id'),
			$options)
		) return false;
		
		$this->db->where('rhothist_id', $options['rhothist_id']);
    	$this->db->delete('reservashoteishistorico');
	}
}

?>