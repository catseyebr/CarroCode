<?php

class VendasProdutos_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddVendasProdutos($options = array())
	{
		if (!$this-> _required(
			Array('venprodu_produ_id', 'venprodu_produ_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('venprodu_ven_id', 'venprodu_ven_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - venprodu_produ_id
						'venprodu_produ_id' => $options['venprodu_produ_id'],
		
						//integer - venprodu_ven_id
						'venprodu_ven_id' => $options['venprodu_ven_id'],
						
					);
		$this->db->insert('vendasprodutos', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateVendasProdutos($options = array())
	{
		if (!$this-> _required(
			Array('venprodu_produ_id', 'venprodu_produ_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('venprodu_ven_id', 'venprodu_ven_id'),
			$options)
		) return false;
				
		if(isset($options['venprodu_produ_id']))
			$this->db->set('venprodu_produ_id', $options['venprodu_produ_id']);
			
		if(isset($options['venprodu_ven_id']))
			$this->db->set('venprodu_ven_id', $options['venprodu_ven_id']);
		
		$this->db->where('venprodu_produ_id', $options['venprodu_produ_id']);
		$this->db->where('venprodu_ven_id', $options['venprodu_ven_id']);
		$this->db->update('vendasprodutos');
		
		return $this->db->affected_rows();
	}
	
	function GetVendasProdutos($options = array())
	{
		if(isset($options['venprodu_produ_id']))
			$this->db->where('venprodu_produ_id', $options['venprodu_produ_id']);
			
		if(isset($options['venprodu_ven_id']))
			$this->db->where('venprodu_ven_id', $options['venprodu_ven_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('vendasprodutos');

		return $query->row(0);
	}
	
	function DeleteVendasProdutos($options = array())
	{
    
		if (!$this-> _required(
			Array('venprodu_produ_id', 'venprodu_produ_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('venprodu_ven_id', 'venprodu_ven_id'),
			$options)
		) return false;
		
		$this->db->where('venprodu_produ_id', $options['venprodu_produ_id']);
		$this->db->where('venprodu_ven_id', $options['venprodu_ven_id']);
    	$this->db->delete('vendasprodutos');
	}
}

?>