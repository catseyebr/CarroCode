<?php

class Fatura_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddFatura($options = array())
	{
		if (!$this-> _required(
			Array('fat_id', 'fat_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('fat_cli_id', 'fat_cli_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('fat_dthemissao', 'fat_dthemissao'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('fat_dthvencimento', 'fat_dthvencimento'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('fat_frmpag_id', 'fat_frmpag_id'),
			$options)
		) return false;
			
		$postData = array(
						//integer - fat_id
						'fat_id' => $options['fat_id'],
		
						//integer - fat_cli_id
						'fat_cli_id' => $options['fat_cli_id'],
		
						//date - fat_dthemissao
						'fat_dthemissao' => $options['fat_dthemissao'],
		
						//date - fat_dthvencimento
						'fat_dthvencimento' => $options['fat_dthvencimento'],
		
						//integer - fat_frmpag_id
						'fat_frmpag_id' => $options['fat_frmpag_id'],
		
					);
		$this->db->insert('fatura', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateFatura($options = array())
	{
		if (!$this-> _required(
			Array('fat_id', 'fat_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('fat_cli_id', 'fat_cli_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('fat_dthemissao', 'fat_dthemissao'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('fat_dthvencimento', 'fat_dthvencimento'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('fat_frmpag_id', 'fat_frmpag_id'),
			$options)
		) return false;
				
		if(isset($options['fat_cli_id']))
			$this->db->set('fat_cli_id', $options['fat_cli_id']);
			
		if(isset($options['fat_dthemissao']))
			$this->db->set('fat_dthemissao', $options['fat_dthemissao']);
			
		if(isset($options['fat_dthvencimento']))
			$this->db->set('fat_dthvencimento', $options['fat_dthvencimento']);
			
		if(isset($options['fat_frmpag_id']))
			$this->db->set('fat_frmpag_id', $options['fat_frmpag_id']);
			
		$this->db->where('fat_id', $options['fat_id']);
		$this->db->update('fatura');
		
		return $this->db->affected_rows();
	}
	
	function GetFatura($options = array())
	{
		if(isset($options['fat_id']))
			$this->db->where('fat_id', $options['fat_id']);
			
		if(isset($options['fat_cli_id']))
			$this->db->where('fat_cli_id', $options['fat_cli_id']);
			
		if(isset($options['fat_dthemissao']))
			$this->db->where('fat_dthemissao', $options['fat_dthemissao']);
			
		if(isset($options['fat_dthvencimento']))
			$this->db->where('fat_dthvencimento', $options['fat_dthvencimento']);
			
		if(isset($options['fat_frmpag_id']))
			$this->db->where('fat_frmpag_id', $options['fat_frmpag_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('fatura');

		if(isset($options['fat_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteFatura($options = array())
	{
    
		if (!$this-> _required(
			Array('fat_id', 'fat_id'),
			$options)
		) return false;
		
		$this->db->where('fat_id', $options['fat_id']);
    	$this->db->delete('fatura');
	}
}

?>