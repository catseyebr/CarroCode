<?php

class DadosAdicionaisApartamento_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddDadosAdicionaisApartamento($options = array())
	{
		if (!$this-> _required(
			Array('dap_id', 'dap_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dap_campo', 'dap_campo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dap_pai', 'dap_pai'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dap_has_valor', 'dap_has_valor'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dap_has_desc', 'dap_has_desc'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dap_has_bool', 'dap_has_bool'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dap_has_qtde', 'dap_has_qtde'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dap_has_lista', 'dap_has_lista'),
			$options)
		) return false;
		
		$postData = array(
						//integer - dap_id
						'dap_id' => $options['dap_id'],
		
						//char - dap_campo
						'dap_campo' => $options['dap_campo'],
		
						//integer - dap_pai
						'dap_pai' => $options['dap_pai'],
		
						//integer - dap_has_valor
						'dap_has_valor' => $options['dap_has_valor'],
		
						//integer - dap_has_desc
						'dap_has_desc' => $options['dap_has_desc'],
		
						//integer - dap_has_bool
						'dap_has_bool' => $options['dap_has_bool'],
		
						//integer - dap_has_qtde
						'dap_has_qtde' => $options['dap_has_qtde'],
		
						//integer - dap_has_lista
						'dap_has_lista' => $options['dap_has_lista'],
						
					);
		$this->db->insert('dadosadicionaisapartamento', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateDadosAdicionaisApartamento($options = array())
	{
		if (!$this-> _required(
			Array('dap_id', 'dap_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dap_campo', 'dap_campo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dap_pai', 'dap_pai'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dap_has_valor', 'dap_has_valor'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dap_has_desc', 'dap_has_desc'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dap_has_bool', 'dap_has_bool'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dap_has_qtde', 'dap_has_qtde'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('dap_has_lista', 'dap_has_lista'),
			$options)
		) return false;
				
		if(isset($options['dap_campo']))
			$this->db->set('dap_campo', $options['dap_campo']);
		
		if(isset($options['dap_pai']))
			$this->db->set('dap_pai', $options['dap_pai']);
			
		if(isset($options['dap_has_valor']))
			$this->db->set('dap_has_valor', $options['dap_has_valor']);
			
		if(isset($options['dap_has_desc']))
			$this->db->set('dap_has_desc', $options['dap_has_desc']);
			
		if(isset($options['dap_has_bool']))
			$this->db->set('dap_has_bool', $options['dap_has_bool']);
			
		if(isset($options['dap_has_qtde']))
			$this->db->set('dap_has_qtde', $options['dap_has_qtde']);
			
		if(isset($options['dap_has_lista']))
			$this->db->set('dap_has_lista', $options['dap_has_lista']);
		
		$this->db->where('dap_id', $options['dap_id']);
		$this->db->update('dadosadicionaisapartamento');
		
		return $this->db->affected_rows();
	}
	
	function GetDadosAdicionaisApartamento($options = array())
	{
		if(isset($options['dap_id']))
			$this->db->where('dap_id', $options['dap_id']);
			
		if(isset($options['dap_campo']))
			$this->db->where('dap_campo', $options['dap_campo']);
			
		if(isset($options['dap_pai']))
			$this->db->where('dap_pai', $options['dap_pai']);
			
		if(isset($options['dap_has_valor']))
			$this->db->where('dap_has_valor', $options['dap_has_valor']);
			
		if(isset($options['dap_has_desc']))
			$this->db->where('dap_has_desc', $options['dap_has_desc']);
			
		if(isset($options['dap_has_bool']))
			$this->db->where('dap_has_bool', $options['dap_has_bool']);
			
		if(isset($options['dap_has_qtde']))
			$this->db->where('dap_has_qtde', $options['dap_has_qtde']);
			
		if(isset($options['dap_has_lista']))
			$this->db->where('dap_has_lista', $options['dap_has_lista']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('dadosadicionaisapartamento');

		if(isset($options['dap_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteDadosAdicionaisApartamento($options = array())
	{
    
		if (!$this-> _required(
			Array('dap_id', 'dap_id'),
			$options)
		) return false;
		
		$this->db->where('dap_id', $options['dap_id']);
    	$this->db->delete('dadosadicionaisapartamento');
	}
}

?>