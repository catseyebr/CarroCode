<?php

class Apartamentos_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddApartamentos($options = array())
	{
		if (!$this-> _required(
			Array('apa_id', 'apa_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_cap_id', 'apa_cap_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_hot_id', 'apa_hot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_id_tipo', 'apa_id_tipo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_quantidade', 'apa_quantidade'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_dtini', 'apa_dtini'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_dtfim', 'apa_dtfim'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_ativo', 'apa_ativo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_dthcadastro', 'apa_dthcadastro'),
			$options)
		) return false;
		
		$postData = array(
						//serial - apa_id
						'apa_id' => $options['apa_id'],
		
						//integer - apa_cap_id
						'apa_cap_id' => $options['apa_cap_id'],
						
						//integer - apa_hot_id
						'apa_hot_id' => $options['apa_hot_id'],
		
						//integer - apa_id_tipo
						'apa_id_tipo' => $options['apa_id_tipo'],
		
						//integer - apa_quantidade
						'apa_quantidade' => $options['apa_quantidade'],
		
						//date - apa_dtini
						'apa_dtini' => $options['apa_dtini'],
		
						//date - apa_dtfim
						'apa_dtfim' => $options['apa_dtfim'],
		
						//boolean - apa_ativo
						'apa_ativo' => $options['apa_ativo'],
		
						//date - apa_dthcadastro
						'apa_dthcadastro' => $options['apa_dthcadastro']
					);
		$this->db->insert('apartamentos', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateApartamentos($options = array())
	{
		if (!$this-> _required(
			Array('apa_id', 'apa_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_cap_id', 'apa_cap_id'),
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
		) return false;if (!$this-> _required(
			Array('apa_id', 'apa_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_cap_id', 'apa_cap_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_hot_id', 'apa_hot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_id_tipo', 'apa_id_tipo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_quantidade', 'apa_quantidade'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_dtini', 'apa_dtini'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_dtfim', 'apa_dtfim'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_ativo', 'apa_ativo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('apa_dthcadastro', 'apa_dthcadastro'),
			$options)
		) return false;
		
		if(isset($options['apa_id']))
			$this->db->set('apa_id', $options['apa_id']);
		
		$this->db->where('apa_id', $options['apa_id']);
		$this->db->update('apartamentos');
		
		return $this->db->affected_rows();
	}
	
	function GetApartamentos($options = array())
	{
		if(isset($options['apa_id']))
			$this->db->where('apa_id', $options['apa_id']);
			
		if(isset($options['apa_cap_id']))
			$this->db->where('apa_cap_id', $options['apa_cap_id']);
		
		if(isset($options['apa_hot_id']))
			$this->db->where('apa_hot_id', $options['apa_hot_id']);
			
		if(isset($options['apa_id_tipo']))
			$this->db->where('apa_id_tipo', $options['apa_id_tipo']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('apartamentos');

		if(isset($options['apa_id']))
		return $query->row(0);
		return $query->result();
	}
	
	function DeleteApartamentos($options = array())
	{
    
		if (!$this-> _required(
			Array('apa_id', 'apa_id'),
			$options)
		) return false;
		
		$this->db->where('apa_id', $options['apa_id']);
    	$this->db->delete('apartamentos');
	}
}

?>