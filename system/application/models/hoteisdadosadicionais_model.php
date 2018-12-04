<?php

class HoteisDadosAdicionais_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddHoteisDadosAdicionais($options = array())
	{
		if (!$this-> _required(
			Array('hda_hot_id', 'hda_hot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hda_dad_id', 'hda_dad_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hda_valor', 'hda_valor'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hda_desc', 'hda_desc'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hda_bool', 'hda_bool'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hda_qtde', 'hda_qtde'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hda_lista', 'hda_lista'),
			$options)
		) return false;
		
		$postData = array(
						//integer - hda_hot_id
						'hda_hot_id' => $options['hda_hot_id'],
		
						//integer - hda_dad_id
						'hda_dad_id' => $options['hda_dad_id'],
						
						//numeric(10,2) - hda_valor
						'hda_valor' => $options['hda_valor'],
		
						//text - hda_desc
						'hda_desc' => $options['hda_desc'],
		
						//integer - hda_bool
						'hda_bool' => $options['hda_bool'],
		
						//integer - hda_qtde
						'hda_qtde' => $options['hda_qtde'],
		
						//text - hda_lista
						'hda_lista' => $options['hda_lista']
					);
		$this->db->insert('hoteisdadosadicionais', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateHoteisDadosAdicionais($options = array())
	{
		if (!$this-> _required(
			Array('hda_hot_id', 'hda_hot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hda_dad_id', 'hda_dad_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hda_valor', 'hda_valor'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hda_desc', 'hda_desc'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hda_bool', 'hda_bool'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hda_qtde', 'hda_qtde'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hda_lista', 'hda_lista'),
			$options)
		) return false;
		
		if(isset($options['hda_valor']))
			$this->db->set('hda_valor', $options['hda_valor']);
		
		if(isset($options['hda_desc']))
			$this->db->set('hda_desc', $options['hda_desc']);
			
		if(isset($options['hda_bool']))
			$this->db->set('hda_bool', $options['hda_bool']);
			
		if(isset($options['hda_qtde']))
			$this->db->set('hda_qtde', $options['hda_qtde']);
			
		if(isset($options['hda_lista']))
			$this->db->set('hda_lista', $options['hda_lista']);
			
		$this->db->where('hda_hot_id', $options['hda_hot_id']);
		$this->db->where('hda_dad_id', $options['hda_dad_id']);
		$this->db->update('hoteisdadosadicionais');
		
		return $this->db->affected_rows();
	}
	
	function GetHoteisDadosAdicionais($options = array())
	{
		if(isset($options['hda_hot_id']))
			$this->db->where('hda_hot_id', $options['hda_hot_id']);
			
		if(isset($options['hda_dad_id']))
			$this->db->where('hda_dad_id', $options['hda_dad_id']);
			
		if(isset($options['hda_valor']))
			$this->db->where('hda_valor', $options['hda_valor']);
			
		if(isset($options['hda_desc']))
			$this->db->where('hda_desc', $options['hda_desc']);
			
		if(isset($options['hda_bool']))
			$this->db->where('hda_bool', $options['hda_bool']);
			
		if(isset($options['hda_qtde']))
			$this->db->where('hda_qtde', $options['hda_qtde']);
			
		if(isset($options['hda_lista']))
			$this->db->where('hda_lista', $options['hda_lista']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('hoteisdadosadicionais');

		if(isset($options['hda_hot_id']) && isset($options['hda_dad_id']))
		return $query->row(0);
		return $query->result();
	}
	
	function DeleteHoteisDadosAdicionais($options = array())
	{
    
		if (!$this-> _required(
			Array('hda_hot_id', 'hda_hot_id'),
			$options)
		) return false;
		
		if (!$this-> _required(
			Array('hda_dad_id', 'hda_dad_id'),
			$options)
		) return false;
		
		$this->db->where('hda_hot_id', $options['hda_hot_id']);
		$this->db->where('hda_dad_id', $options['hda_dad_id']);
    	$this->db->delete('hoteisdadosadicionais');
	}
}

?>