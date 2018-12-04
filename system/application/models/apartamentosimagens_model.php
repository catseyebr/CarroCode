<?php

class ApartamentosImagens_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddApartamentosImagens($options = array())
	{
		if (!$this-> _required(
			Array('aim_img_id', 'aim_img_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('aim_apa_id', 'aim_apa_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - aim_img_id
						'aim_img_id' => $options['aim_img_id'],
		
						//integer - aim_apa_id
						'aim_apa_id' => $options['aim_apa_id'],
						
						//boolean - aim_principal
						'aim_principal' => $options['aim_principal']
		
					);
		$this->db->insert('apartamentosimagens', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateApartamentosImagens($options = array())
	{
		if (!$this-> _required(
			Array('aim_img_id', 'aim_img_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('aim_apa_id', 'aim_apa_id'),
			$options)
		) return false;
				
		if(isset($options['aim_img_id']))
			$this->db->set('aim_img_id', $options['aim_img_id']);
			
		if(isset($options['aim_apa_id']))
			$this->db->set('aim_apa_id', $options['aim_apa_id']);
		
		$this->db->where('aim_img_id', $options['aim_img_id']);
		$this->db->where('aim_apa_id', $options['aim_apa_id']);
		$this->db->update('apartamentosimagens');
		
		return $this->db->affected_rows();
	}
	
	function GetApartamentosImagens($options = array())
	{
		if(isset($options['aim_img_id']))
			$this->db->where('aim_img_id', $options['aim_img_id']);
			
		if(isset($options['aim_apa_id']))
			$this->db->where('aim_apa_id', $options['aim_apa_id']);
		
		if(isset($options['aim_principal']))
			$this->db->where('aim_principal', $options['aim_principal']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('apartamentosimagens');

		if(isset($options['aim_img_id']) || isset($options['aim_apa_id']))
		return $query->row(0);
		return $query->result();
	}
	
	function DeleteApartamentosImagens($options = array())
	{
    
		if (!$this-> _required(
			Array('aim_img_id', 'aim_img_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('aim_apa_id', 'aim_apa_id'),
			$options)
		) return false;
		
		$this->db->where('aim_img_id', $options['aim_img_id']);
		$this->db->where('aim_apa_id', $options['aim_apa_id']);
    	$this->db->delete('apartamentosimagens');
	}
}

?>