<?php

class DadosAdicionais_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddDadosAdicionais($options = array())
	{
		if (!$this-> _required(
			Array('dad_id', 'dad_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dad_campo', 'dad_campo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dad_pai', 'dad_pai'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dad_has_valor', 'dad_has_valor'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dad_has_desc', 'dad_has_desc'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dad_has_bool', 'dad_has_bool'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dad_has_qtde', 'dad_has_qtde'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dad_has_lista', 'dad_has_lista'),
			$options)
		) return false;
		
		$postData = array(
						//integer - dad_id
						'dad_id' => $options['dad_id'],
		
						//char - dad_campo
						'dad_campo' => $options['dad_campo'],
		
						//integer - dad_pai
						'dad_pai' => $options['dad_pai'],
		
						//integer - dad_has_valor
						'dad_has_valor' => $options['dad_has_valor'],
		
						//integer - dad_has_desc
						'dad_has_desc' => $options['dad_has_desc'],
		
						//integer - dad_has_bool
						'dad_has_bool' => $options['dad_has_bool'],
		
						//integer - dad_has_qtde
						'dad_has_qtde' => $options['dad_has_qtde'],
		
						//integer - dad_has_lista
						'dad_has_lista' => $options['dad_has_lista'],
						
					);
		$this->db->insert('dadosadicionais', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateDadosAdicionais($options = array())
	{
		if (!$this-> _required(
			Array('dad_id', 'dad_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dad_campo', 'dad_campo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dad_pai', 'dad_pai'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dad_has_valor', 'dad_has_valor'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dad_has_desc', 'dad_has_desc'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dad_has_bool', 'dad_has_bool'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dad_has_qtde', 'dad_has_qtde'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dad_has_lista', 'dad_has_lista'),
			$options)
		) return false;
				
		if(isset($options['dad_campo']))
			$this->db->set('dad_campo', $options['dad_campo']);
		
		if(isset($options['dad_pai']))
			$this->db->set('dad_pai', $options['dad_pai']);
			
		if(isset($options['dad_has_valor']))
			$this->db->set('dad_has_valor', $options['dad_has_valor']);
			
		if(isset($options['dad_has_desc']))
			$this->db->set('dad_has_desc', $options['dad_has_desc']);
			
		if(isset($options['dad_has_bool']))
			$this->db->set('dad_has_bool', $options['dad_has_bool']);
			
		if(isset($options['dad_has_qtde']))
			$this->db->set('dad_has_qtde', $options['dad_has_qtde']);
			
		if(isset($options['dad_has_lista']))
			$this->db->set('dad_has_lista', $options['dad_has_lista']);
		
		$this->db->where('dad_id', $options['dad_id']);
		$this->db->update('dadosadicionais');
		
		return $this->db->affected_rows();
	}
	
	function GetDadosAdicionais($options = array())
	{
		if(isset($options['dad_id']))
			$this->db->where('dad_id', $options['dad_id']);
			
		if(isset($options['dad_campo']))
			$this->db->where('dad_campo', $options['dad_campo']);
			
		if(isset($options['dad_pai']))
			$this->db->where('dad_pai', $options['dad_pai']);
			
		if(isset($options['dad_has_valor']))
			$this->db->where('dad_has_valor', $options['dad_has_valor']);
			
		if(isset($options['dad_has_desc']))
			$this->db->where('dad_has_desc', $options['dad_has_desc']);
			
		if(isset($options['dad_has_bool']))
			$this->db->where('dad_has_bool', $options['dad_has_bool']);
			
		if(isset($options['dad_has_qtde']))
			$this->db->where('dad_has_qtde', $options['dad_has_qtde']);
			
		if(isset($options['dad_has_lista']))
			$this->db->where('dad_has_lista', $options['dad_has_lista']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('dadosadicionais');

		if(isset($options['dad_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteDadosAdicionais($options = array())
	{
    
		if (!$this-> _required(
			Array('dad_id', 'dad_id'),
			$options)
		) return false;
		
		$this->db->where('dad_id', $options['dad_id']);
    	$this->db->delete('dadosadicionais');
	}
}

?>