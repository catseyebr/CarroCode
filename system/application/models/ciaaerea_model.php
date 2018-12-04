<?php

class CiaAerea_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddCiaAerea($options = array())
	{
		if (!$this-> _required(
			Array('ciaaerea_cod', 'ciaaerea_cod'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ciaaerea_nome', 'ciaaerea_nome'),
			$options)
		) return false;
		
		$postData = array(
						//char - ciaaerea_cod
						'ciaaerea_cod' => $options['ciaaerea_cod'],
		
						//char - ciaaerea_nome
						'ciaaerea_nome' => $options['ciaaerea_nome'],
						
					);
		$this->db->insert('ciaaerea', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateCiaAerea($options = array())
	{
		if (!$this-> _required(
			Array('ciaaerea_cod', 'ciaaerea_cod'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('ciaaerea_nome', 'ciaaerea_nome'),
			$options)
		) return false;
				
		if(isset($options['ciaaerea_cod']))
			$this->db->set('ciaaerea_cod', $options['ciaaerea_cod']);
			
		if(isset($options['ciaaerea_nome']))
			$this->db->set('ciaaerea_nome', $options['ciaaerea_nome']);
		
		$this->db->where('ciaaerea_cod', $options['ciaaerea_cod']);
		$this->db->update('ciaaerea');
		
		return $this->db->affected_rows();
	}
	
	function GetCiaAerea($options = array())
	{
		if(isset($options['ciaaerea_cod']))
			$this->db->where('ciaaerea_cod', $options['ciaaerea_cod']);
			
		if(isset($options['ciaaerea_cod']))
			$this->db->where('ciaaerea_cod', $options['ciaaerea_cod']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('ciaaerea');

		return $query->row(0);
	}
	
	function DeleteCiaAerea($options = array())
	{
    
		if (!$this-> _required(
			Array('ciaaerea_cod', 'ciaaerea_cod'),
			$options)
		) return false;
		
		$this->db->where('ciaaerea_cod', $options['ciaaerea_cod']);
		$this->db->delete('ciaaerea');
	}
}

?>