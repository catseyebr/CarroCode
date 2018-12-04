<?php

class ReservasHotel_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddReservasHotel($options = array())
	{
		//Campos Obrigatórios
		if (!$this-> _required(
			Array('rsh_idreserva', 'rsh_idreserva'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rsh_idhotel', 'rsh_idhotel'),
			$options)
		) return false;
		
		$postData = array(
						//int(11) - reservas.res_id
						'rsh_idreserva' => $options['rsh_idreserva'],
		
						//int(11) - hoteis.hot_id
						'rsh_idhotel' => $options['rsh_idhotel'],
						
						//datetime
						'rsh_checkin' => $options['rsh_checkin'],
						
            //datetime
						'rsh_checkout' => $options['rsh_checkout'],
					);
		
		$this->db->insert('reservas_hotel', $postData);
		return $this->db->insert_id();
		
	}
	function UpdateReservasHotel($options = array())
	{
		if (!$this-> _required(
			Array('rsh_id'),
			$options)
		) return false;
		
		if(isset($options['rsh_idreserva']))
			$this->db->set('rsh_idreserva', $options['rsh_idreserva']);
			
		if(isset($options['rsh_idhotel']))
			$this->db->set('rsh_idhotel', $options['rsa_idhotel']);
		
		if(isset($options['rsh_checkin']))
			$this->db->set('rsa_checkin', $options['rsa_checkin']);
		
		if(isset($options['rsh_checkout']))
			$this->db->set('rsa_checkout', $options['rsh_checkout']);
		
		$this->db->where('rsh_id', $options['rsh_id']);	
		$this->db->update('reservas_hotel');
		
		return $this->db->affected_rows();
	}
	function GetReservasHotel($options = array())
	{
		//Funções para unir as tabelas referentes com a atual
		if(isset($options['_join']) && is_array($options['_join'])){			
			if(in_array("reservas", $options['_join']))
				$this->db->join('reservas', 'rsh_idreserva = res_id', 'left');
			
			if(in_array("hoteis", $options['_join']))
				$this->db->join('hoteis', 'rsh_idhotel = hot_id', 'left');
			
			if(in_array("reservas_formasdepagamento", $options['_join']))
				$this->db->join('reservas_formasdepagamento', 'res_idformadepagamento = fpg_id', 'left');
				
			if(in_array("hoteis_enderecos", $options['_join']))
				$this->db->join('hoteis_enderecos', 'hen_idhotel = hot_id', 'left');
			
			if(in_array("enderecos", $options['_join']))
				$this->db->join('enderecos', 'hen_idendereco = end_id', 'left');
			
			}
	//
		
    	if(isset($options['rsh_id']))
			$this->db->where('rsh_id', $options['rsh_id']);
			
		if(isset($options['rsh_idreserva']))
			$this->db->where('rsh_idreserva', $options['rsh_idreserva']);
		
		if(isset($options['rsh_idhotel']))
			$this->db->where('rsh_idhotel', $options['rsh_idhotel']);
			
		if(isset($options['rsh_idhotel_in']))
			$this->db->where_in('rsh_idhotel', $options['rsh_idhotel_in']);
			
		if(isset($options['rsh_checkin']))
			$this->db->where('rsh_checkin', $options['rsh_checkin']);
		
		if(isset($options['rsh_checkout']))
			$this->db->where('rsh_checkout', $options['rsh_checkout']);
		
		if(isset($options['rsh_idreserva_in']))
			$this->db->where_in('rsh_idreserva', $options['rsh_idreserva_in']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('reservas_hotel');

		if(isset($options['rsh_id'])){
    			return $query->row(0);
    		}else{
    		  return $query->result();
    	}
	}
	function DeleteReservasHotel($options = array())
	{
    
		if(!$this->_required(array('rsh_id'), $options)) return false;
   
    		$this->db->where('rsh_id', $options['rsh_id']);
    		$this->db->delete('reservas_hotel');
	}
  
  function GetMaisBuscados($options = array())
	{
		//Funções para unir as tabelas referentes com a atual
		if(isset($options['_join']) && is_array($options['_join'])){			
			if(in_array("reservas", $options['_join']))
				$this->db->join('reservas', 'rsh_idreserva = res_id', 'left');
			
			if(in_array("hoteis", $options['_join']))
				$this->db->join('hoteis', 'rsh_idhotel = hot_id', 'left');
			
			}
	//
		
    	if(isset($options['rsh_id']))
			$this->db->where('rsh_id', $options['rsh_id']);
			
		if(isset($options['rsh_idreserva']))
			$this->db->where('rsh_idreserva', $options['rsh_idreserva']);
		
		if(isset($options['rsh_idhotel']))
			$this->db->where('rsh_idhotel', $options['rsh_idhotel']);
			
		if(isset($options['rsh_checkin']))
			$this->db->where('rsh_checkin', $options['rsh_checkin']);
		
		if(isset($options['rsh_checkout']))
			$this->db->where('rsh_checkout', $options['rsh_checkout']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		$this->db->select('*, (count(rsh_id)) as count');
    $this->db->order_by('count', 'DESC');
    $this->db->group_by('rsh_idhotel');
     
    if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);
		
		$query = $this->db->get('reservas_hotel');

		if(isset($options['rsh_id'])){
    			return $query->row(0);
    		}else{
    		  return $query->result();
    	}
	}
  
}

?>
