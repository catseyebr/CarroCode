<?php

class ReservasCarrosHistorico_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddReservasCarrosHistorico($options = array())
	{
		if (!$this-> _required(
			Array('rcarhist_id', 'rcarhist_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rcarhist_usu_id', 'rcarhist_usu_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rcarhist_dthcadastro', 'rcarhist_dthcadastro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rcarhist_mensagem', 'rcarhist_mensagem'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rcarhist_obs', 'rcarhist_obs'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rcarhist_sta_id', 'rcarhist_sta_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rcarhist_idrescar_id', 'rcarhist_idrescar_id'),
			$options)
		) return false;
		
				
		$postData = array(
						//integer - rcarhist_id
						'rcarhist_id' => $options['rcarhist_id'],
		
						//integer - rcarhist_usu_id
						'rcarhist_usu_id' => $options['rcarhist_usu_id'],
		
						//date - rcarhist_dthcadastro
						'rcarhist_dthcadastro' => $options['rcarhist_dthcadastro'],
		
						//text - rcarhist_mensagem
						'rcarhist_mensagem' => $options['rcarhist_mensagem'],
		
						//text - rcarhist_obs
						'rcarhist_obs' => $options['rcarhist_obs'],
		
						//integer - rcarhist_sta_id
						'rcarhist_sta_id' => $options['rcarhist_sta_id'],
		
						//integer - rcarhist_idrescar_id
						'rcarhist_idrescar_id' => $options['rcarhist_idrescar_id']
		
					);
		$this->db->insert('reservascarroshistorico', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateReservasCarrosHistorico($options = array())
	{
		if (!$this-> _required(
			Array('rcarhist_id', 'rcarhist_id'),
			$options)
		) return false;
		
		if(isset($options['rcarhist_usu_id']))
			$this->db->set('rcarhist_usu_id', $options['rcarhist_usu_id']);
			
		if(isset($options['rcarhist_dthcadastro']))
			$this->db->set('rcarhist_dthcadastro', $options['rcarhist_dthcadastro']);
			
		if(isset($options['rcarhist_mensagem']))
			$this->db->set('rcarhist_mensagem', $options['rcarhist_mensagem']);
			
		if(isset($options['rcarhist_obs']))
			$this->db->set('rcarhist_obs', $options['rcarhist_obs']);
			
		if(isset($options['rcarhist_sta_id']))
			$this->db->set('rcarhist_sta_id', $options['rcarhist_sta_id']);
			
		if(isset($options['rcarhist_idrescar_id']))
			$this->db->set('rcarhist_idrescar_id', $options['rcarhist_idrescar_id']);
			
		$this->db->where('rcarhist_id', $options['rcarhist_id']);
		$this->db->update('reservascarroshistorico');
		
		return $this->db->affected_rows();
	}
	
	function GetReservasCarrosHistorico($options = array())
	{
		if(isset($options['rcarhist_id']))
			$this->db->where('rcarhist_id', $options['rcarhist_id']);
			
		if(isset($options['rcarhist_usu_id']))
			$this->db->where('rcarhist_usu_id', $options['rcarhist_usu_id']);
			
		if(isset($options['rcarhist_dthcadastro']))
			$this->db->where('rcarhist_dthcadastro', $options['rcarhist_dthcadastro']);
			
		if(isset($options['rcarhist_mensagem']))
			$this->db->where('rcarhist_mensagem', $options['rcarhist_mensagem']);
			
		if(isset($options['rcarhist_obs']))
			$this->db->where('rcarhist_obs', $options['rcarhist_obs']);
			
		if(isset($options['rcarhist_sta_id']))
			$this->db->where('rcarhist_sta_id', $options['rcarhist_sta_id']);
			
		if(isset($options['rcarhist_idrescar_id']))
			$this->db->where('rcarhist_idrescar_id', $options['rcarhist_idrescar_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('reservascarroshistorico');

		if(isset($options['rcarhist_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteReservasCarrosHistorico($options = array())
	{
    
		if (!$this-> _required(
			Array('rcarhist_id', 'rcarhist_id'),
			$options)
		) return false;
		
		$this->db->where('rcarhist_id', $options['rcarhist_id']);
    	$this->db->delete('reservascarroshistorico');
	}
}

?>