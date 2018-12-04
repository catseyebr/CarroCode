<?php

class Logs_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddLogs($options = array())
	{
		if (!$this-> _required(
			Array('log_proj_id', 'log_proj_id'),
			$options)
		) return false;
		
		if (!$this-> _required(
			Array('log_usu_id', 'log_usu_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - log_proj_id
						'log_proj_id' => $options['log_proj_id'],
		
						//integer - log_usu_id
						'log_usu_id' => $options['log_usu_id'],
		
						//varchar - log_nomeusuario
						'log_nomeusuario' => $options['log_nomeusuario'],
		
						//varchar - log_emailusuario
						'log_emailusuario' => $options['log_emailusuario'],
		
						//varchar - log_tipo
						'log_tipo' => $options['log_tipo'],
		
						//varchar - log_url
						'log_url' => $options['log_url'],
		
						//date - log_data
						'log_data' => $options['log_data'],
		
						//varchar - log_ip
						'log_ip' => $options['log_ip'],
		
						//varchar - log_useragent
						'log_useragent' => $options['log_useragent'],
		
						//varchar - log_tabela
						'log_tabela' => $options['log_tabela'],
		
						//varchar - log_campo
						'log_campo' => $options['log_campo'],
		
						//varchar - log_valor_antigo
						'log_valor_antigo' => $options['log_valor_antigo'],
		
						//varchar - log_valor_novo
						'log_valor_novo' => $options['log_valor_novo']
						
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
		
		if(isset($options['log_proj_id']))
			$this->db->set('log_proj_id', $options['log_proj_id']);
			
		if(isset($options['log_usu_id']))
			$this->db->set('log_usu_id', $options['log_usu_id']);
			
		if(isset($options['log_nomeusuario']))
			$this->db->set('log_nomeusuario', $options['log_nomeusuario']);
			
		if(isset($options['log_emailusuario']))
			$this->db->set('log_emailusuario', $options['log_emailusuario']);
			
		if(isset($options['log_tipo']))
			$this->db->set('log_tipo', $options['log_tipo']);
			
		if(isset($options['log_url']))
			$this->db->set('log_url', $options['log_url']);
			
		if(isset($options['log_data']))
			$this->db->set('log_data', $options['log_data']);
			
		if(isset($options['log_ip']))
			$this->db->set('log_ip', $options['log_ip']);
			
		if(isset($options['log_useragent']))
			$this->db->set('log_useragent', $options['log_useragent']);
			
		if(isset($options['log_tabela']))
			$this->db->set('log_tabela', $options['log_tabela']);
			
		if(isset($options['log_campo']))
			$this->db->set('log_campo', $options['log_campo']);
			
		if(isset($options['log_valor_antigo']))
			$this->db->set('log_valor_antigo', $options['log_valor_antigo']);
			
		if(isset($options['log_valor_novo']))
			$this->db->set('log_valor_novo', $options['log_valor_novo']);
			
		$this->db->where('log_id', $options['log_id']);
		$this->db->update('logs');
		
		return $this->db->affected_rows();
	}
	
	function GetLogs($options = array())
	{
		if(isset($options['log_id']))
			$this->db->where('log_id', $options['log_id']);
			
		if(isset($options['log_proj_id']))
			$this->db->where('log_proj_id', $options['log_proj_id']);
			
		if(isset($options['log_usu_id']))
			$this->db->where('log_usu_id', $options['log_usu_id']);
			
		if(isset($options['log_nomeusuario']))
			$this->db->where('log_nomeusuario', $options['log_nomeusuario']);
			
		if(isset($options['log_emailusuario']))
			$this->db->where('log_emailusuario', $options['log_emailusuario']);
			
		if(isset($options['log_tipo']))
			$this->db->where('log_tipo', $options['log_tipo']);
			
		if(isset($options['log_url']))
			$this->db->where('log_url', $options['log_url']);
			
		if(isset($options['log_data']))
			$this->db->where('log_data', $options['log_data']);
			
		if(isset($options['log_ip']))
			$this->db->where('log_ip', $options['log_ip']);
			
		if(isset($options['log_useragent']))
			$this->db->where('log_useragent', $options['log_useragent']);
			
		if(isset($options['log_tabela']))
			$this->db->where('log_tabela', $options['log_tabela']);
			
		if(isset($options['log_campo']))
			$this->db->where('log_campo', $options['log_campo']);
			
		if(isset($options['log_valor_antigo']))
			$this->db->where('log_valor_antigo', $options['log_valor_antigo']);
			
		if(isset($options['log_valor_novo']))
			$this->db->where('log_valor_novo', $options['log_valor_novo']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('logs');

		if(isset($options['log_id']))
			return $query->row(0);
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