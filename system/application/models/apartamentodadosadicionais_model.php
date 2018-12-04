<?php

class ApartamentoDadosAdicionais_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddApartamentoDadosAdicionais($options = array())
	{
		if (!$this-> _required(
			Array('ada_apa_id', 'ada_apa_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ada_dap_id', 'ada_dap_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ada_qtde', 'ada_qtde'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ada_valor', 'ada_valor'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ada_desc', 'ada_desc'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ada_bool', 'ada_bool'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ada_lista', 'ada_lista'),
			$options)
		) return false;
		
		$postData = array(
						//integer - ada_apa_id
						'ada_apa_id' => $options['ada_apa_id'],
		
						//integer - ada_dap_id
						'ada_dap_id' => $options['ada_dap_id'],
						
						//integer - ada_qtde
						'ada_qtde' => $options['ada_qtde'],
		
						//numeric(10,2) - ada_valor
						'ada_valor' => $options['ada_valor'],
		
						//text - ada_desc
						'ada_desc' => $options['ada_desc'],
		
						//integer - ada_bool
						'ada_bool' => $options['ada_bool'],
		
						//text - ada_lista
						'ada_lista' => $options['ada_lista']
					);
		$this->db->insert('apartamentodadosadicionais', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateApartamentoDadosAdicionais($options = array())
	{
		if (!$this-> _required(
			Array('ada_apa_id', 'ada_apa_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ada_dap_id', 'ada_dap_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ada_qtde', 'ada_qtde'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ada_valor', 'ada_valor'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ada_desc', 'ada_desc'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ada_bool', 'ada_bool'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ada_lista', 'ada_lista'),
			$options)
		) return false;
		
		if(isset($options['ada_apa_id']))
			$this->db->set('ada_apa_id', $options['ada_apa_id']);
		
		if(isset($options['ada_dap_id']))
			$this->db->set('ada_dap_id', $options['ada_dap_id']);
			
		$this->db->where('ada_apa_id', $options['ada_apa_id']);
		$this->db->where('ada_dap_id', $options['ada_dap_id']);
		$this->db->update('apartamentodadosadicionais');
		
		return $this->db->affected_rows();
	}
	
	function GetApartamentoDadosAdicionais($options = array())
	{
		if(isset($options['ada_apa_id']))
			$this->db->where('ada_apa_id', $options['ada_apa_id']);
			
		if(isset($options['ada_dap_id']))
			$this->db->where('ada_dap_id', $options['ada_dap_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('apartamentodadosadicionais');

		if(isset($options['ada_apa_id']) || isset($options['ada_dap_id']))
		return $query->row(0);
		return $query->result();
	}
	
	function DeleteApartamentoDadosAdicionais($options = array())
	{
    
		if (!$this-> _required(
			Array('ada_apa_id', 'ada_apa_id'),
			$options)
		) return false;
		
		if (!$this-> _required(
			Array('ada_dap_id', 'ada_dap_id'),
			$options)
		) return false;
		
		$this->db->where('ada_apa_id', $options['ada_apa_id']);
		$this->db->where('ada_dap_id', $options['ada_dap_id']);
    	$this->db->delete('apartamentodadosadicionais');
	}
}

?>