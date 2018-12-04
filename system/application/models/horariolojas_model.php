<?php

class HorarioLojas_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}

	function AddHorarioLojas($options = array())
	{
		$postData = array();
		
		if(isset($options['hloj_id']))
			//integer
			$postData['hloj_id'] = $options['hloj_id'];
		
		//---------------------------------------------------
		
			//integer
			$postData['hloj_loj_id'] = $options['hloj_loj_id'];
				
		//---------------------------------------------------
		
			//integer
			$postData['hloj_weekday'] = $options['hloj_weekday'];
				
		//---------------------------------------------------
		
			//time
			$postData['hloj_horainicial'] = $options['hloj_horainicial'];
				
		//---------------------------------------------------
		
			//time
			$postData['hloj_horafinal'] = $options['hloj_horafinal'];
				
		//---------------------------------------------------
		
		if(isset($options['hloj_ativo'])){
			//boolean
			$postData['hloj_ativo'] = $options['hloj_ativo'];
		}else{
			$postData['hloj_ativo'] = 'f';
		}
		
		//---------------------------------------------------
		
		
		$this->db->insert('horariolojas', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateHorarioLojas($options = array())
	{
		if (!$this-> _required(
			Array('hloj_id', 'hloj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hloj_loj_id', 'hloj_loj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hloj_weekday', 'hloj_weekday'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hloj_horainicial', 'hloj_horainicial'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hloj_horafinal', 'hloj_horafinal'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hloj_ativo', 'hloj_ativo'),
			$options)
		) return false;
										
		if(isset($options['hloj_loj_id']))
			$this->db->set('hloj_loj_id', $options['hloj_loj_id']);
			
		if(isset($options['hloj_weekday']))
			$this->db->set('hloj_weekday', $options['hloj_weekday']);
			
		if(isset($options['hloj_horainicial']))
			$this->db->set('hloj_horainicial', $options['hloj_horainicial']);
			
		if(isset($options['hloj_horafinal']))
			$this->db->set('hloj_horafinal', $options['hloj_horafinal']);
			
		if(isset($options['hloj_ativo']))
			$this->db->set('hloj_ativo', $options['hloj_ativo']);
			
		$this->db->where('hloj_id', $options['hloj_id']);
		$this->db->update('horariolojas');
		
		return $this->db->affected_rows();
	}
	
	function GetHorarioLojas($options = array())
	{
		if(isset($options['loj_city_id'])){
			$this->db->join('loja', 'loj_id = hloj_loj_id', 'left');
			$this->db->where('loj_city_id', $options['loj_city_id']);
			$this->db->where('loj_ativo', 't');
			$this->db->join('locadora', 'loc_id = loj_loc_id', 'left');
			$this->db->where('loc_ativo', 't');
			if(isset($options['loc_id']))
				$this->db->where('loj_loc_id', $options['loc_id']);
		}
		
		if(isset($options['loj_id_horas'])){
			$this->db->join('loja', 'loj_id = hloj_loj_id', 'left');
			$this->db->where('loj_id', $options['loj_id_horas']);
			$this->db->where('hloj_ativo', 't');
			$this->db->select('hloj_weekday,hloj_horainicial,hloj_horafinal');
		}
		
		if(isset($options['join_endereco']))
			$this->db->join('endereco', 'end_id = loj_end_id', 'left');
		
		if(isset($options['hloj_id']))
			$this->db->where('hloj_id', $options['hloj_id']);
			
		if(isset($options['hloj_loj_id']))
			$this->db->where('hloj_loj_id', $options['hloj_loj_id']);
		
		if(isset($options['hloj_weekday']))
			$this->db->where('hloj_weekday', $options['hloj_weekday']);
			
		if(isset($options['hloj_horainicial']))
			$this->db->where('hloj_horainicial <=', $options['hloj_horainicial']);
			
		if(isset($options['hloj_horafinal']))
			$this->db->where('hloj_horafinal >=', $options['hloj_horafinal']);
			
		if(isset($options['hloj_ativo']))
			$this->db->where('hloj_ativo', $options['hloj_ativo']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('horariolojas');

		if(isset($options['hloj_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteHorarioLojas($options = array())
	{
    
		if (!$this-> _required(
			Array('hloj_id', 'hloj_id'),
			$options)
		) return false;
		
		$this->db->where('hloj_id', $options['hloj_id']);
    	$this->db->delete('horariolojas');
	}
}

?>