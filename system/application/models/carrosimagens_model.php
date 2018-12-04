<?php

class CarrosImagens_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddCarrosImagens($options = array())
	{
		if (!$this-> _required(
			Array('carimg_id', 'carimg_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('carimg_img_id', 'carimg_img_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('carimg_car_id', 'carimg_car_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('carimg_principal', 'carimg_principal'),
			$options)
		) return false;
		
		$postData = array(
						//integer - carimg_id
						'carimg_id' => $options['carimg_id'],
		
						//integer - carimg_img_id
						'carimg_img_id' => $options['carimg_img_id'],
		
						//integer - carimg_car_id
						'carimg_car_id' => $options['carimg_car_id'],
		
						//boolean - carimg_principal
						'carimg_principal' => $options['carimg_principal']
						
					);
		$this->db->insert('carrosimagens', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateCarrosImagens($options = array())
	{
		if (!$this-> _required(
			Array('carimg_id', 'carimg_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('carimg_img_id', 'carimg_img_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('carimg_car_id', 'carimg_car_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('carimg_principal', 'carimg_principal'),
			$options)
		) return false;
				
		if(isset($options['carimg_img_id']))
			$this->db->set('carimg_img_id', $options['carimg_img_id']);
			
		if(isset($options['carimg_car_id']))
			$this->db->set('carimg_car_id', $options['carimg_car_id']);
			
		if(isset($options['carimg_principal']))
			$this->db->set('carimg_principal', $options['carimg_principal']);
		
		$this->db->where('carimg_id', $options['carimg_id']);
		$this->db->update('carrosgrupo');
		
		return $this->db->affected_rows();
	}
	
	function GetCarrosImagens($options = array())
	{
		if(isset($options['carimg_id']))
			$this->db->where('carimg_id', $options['carimg_id']);
			
		if(isset($options['carimg_img_id']))
			$this->db->where('carimg_img_id', $options['carimg_img_id']);
			
		if(isset($options['carimg_car_id']))
			$this->db->where('carimg_car_id', $options['carimg_car_id']);
			
		if(isset($options['carimg_principal']))
			$this->db->where('carimg_principal', $options['carimg_principal']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('carrosimagens');

		if(isset($options['carimg_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteCarrosImagens($options = array())
	{
    
		if (!$this-> _required(
			Array('carimg_id', 'carimg_id'),
			$options)
		) return false;
		
		$this->db->where('carimg_id', $options['carimg_id']);
		$this->db->delete('carrosimagens');
	}
}

?>