<?php

class CiSessions_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddLogs($options = array()) {
	//Campos Obrigatórios
		if (!$this-> _required(
			Array('log_ip', 'log_ip'),
			$options)
		) return false;
		
		$postData = array(
			'log_idusuario'    => $options['log_idusuario'],
            'log_nomeusuario'  => $options['log_nomeusuario'],
            'log_emailusuario' => $options['log_emailusuario'],
            'log_tipo'         => $options['log_tipo'],
            'log_url'          => $options['log_url'],
            'log_data'         => $options['log_data'],
            'log_ip'           => $options['log_ip'],
            'log_useragent'    => $options['log_useragent'],
            'log_tabela'        => $options['log_tabela'],
            'log_campo'        => $options['log_campo'],
            'log_valor_antigo' => $options['log_valor_antigo'],
            'log_valor_novo'   => $options['log_valor_novo'],
				);
                                       
		$this->db->insert('logs', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateLogs($options = array())
	{
		if (!$this-> _required(
			Array('log_id', 'log_id'),
			$options)
		) return false;
				
		if(isset($options['log_idusuario']))
			$this->db->set('log_idusuario', $options['log_idusuario']);
			
		if(isset($options['log_data']))
			$this->db->set('log_data', $options['log_data']);
			
		if(isset($options['log_mensagem']))
			$this->db->set('log_mensagem', $options['log_mensagem']);
			
		if(isset($options['log_ip']))
			$this->db->set('log_ip', $options['log_ip']);
		
		$this->db->where('log_id', $options['log_id']);
		$this->db->update('logs');
		
		return $this->db->affected_rows();
	}
	
	function GetCiSessions($options = array())
	{
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('ci_sessions');

		return $query->result();
	}
	
	function DeleteLogs($options = array())
	{
    
		if (!$this-> _required(
			Array('log_id', 'log_id'),
			$options)
		) return false;
   
    	$this->db->where('log_id', $options['log_id']);
    	$this->db->delete('logs');
	}
}

?>