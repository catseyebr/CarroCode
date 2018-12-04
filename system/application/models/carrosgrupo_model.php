<?php

class CarrosGrupo_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddCarrosGrupo($options = array())
	{
		if (!$this-> _required(
			Array('cargrp_grp_id', 'cargrp_grp_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cargrp_car_id', 'cargrp_car_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - car_id
						'cargrp_grp_id' => $options['cargrp_grp_id'],
		
						//integer - car_met_id
						'cargrp_car_id' => $options['cargrp_car_id'],
						
					);
		$this->db->insert('carrosgrupo', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateCarrosGrupo($options = array())
	{
		if (!$this-> _required(
			Array('cargrp_grp_id', 'cargrp_grp_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cargrp_car_id', 'cargrp_car_id'),
			$options)
		) return false;
				
		if(isset($options['cargrp_grp_id']))
			$this->db->set('cargrp_grp_id', $options['cargrp_grp_id']);
			
		if(isset($options['cargrp_car_id']))
			$this->db->set('cargrp_car_id', $options['cargrp_car_id']);
		
		$this->db->where('cargrp_grp_id', $options['cargrp_grp_id']);
		$this->db->where('cargrp_car_id', $options['cargrp_car_id']);
		$this->db->update('carrosgrupo');
		
		return $this->db->affected_rows();
	}
	
	function GetCarrosGrupo($options = array())
	{
		$this->db->join('carro', 'car_id = cargrp_car_id', 'left');
		
		if(isset($options['cargrp_grp_id']))
			$this->db->where('cargrp_grp_id', $options['cargrp_grp_id']);
			
		if(isset($options['cargrp_car_id']))
			$this->db->where('cargrp_car_id', $options['cargrp_car_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('carrosgrupo');

		return $query->result();
	}
	
	function DeleteCarrosGrupo($options = array())
	{
    
		if (!$this-> _required(
			Array('cargrp_grp_id', 'cargrp_grp_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cargrp_car_id', 'cargrp_car_id'),
			$options)
		) return false;
		
		$this->db->where('cargrp_grp_id', $options['cargrp_grp_id']);
		$this->db->where('cargrp_car_id', $options['cargrp_car_id']);
    	$this->db->delete('carrosgrupo');
	}
}

?>