<?php

class ReservasApartamentos_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddReservasApartamentos($options = array())
	{
		if (!$this-> _required(
			Array('rsa_id', 'rsa_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rsa_bca_id', 'rsa_bca_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rsa_blo_id', 'rsa_blo_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rsa_apa_id', 'rsa_apa_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rsa_reshot_id', 'rsa_reshot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rsa_tipoapartamento', 'rsa_tipoapartamento'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rsa_categoriaapartamento', 'rsa_categoriaapartamento'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rsa_dthreserva', 'rsa_dthreserva'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rsa_dthcadastro', 'rsa_dthcadastro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rsa_tarifa', 'rsa_tarifa'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rsa_tarifafinal', 'rsa_tarifafinal'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rsa_taxaturismo', 'rsa_taxaturismo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rsa_taxaservico', 'rsa_taxaservico'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rsa_iss', 'rsa_iss'),
			$options)
		) return false;
				
		$postData = array(
						//integer - rsa_id
						'rsa_id' => $options['rsa_id'],
		
						//integer - rsa_bca_id
						'rsa_bca_id' => $options['rsa_bca_id'],
		
						//integer - rsa_blo_id
						'rsa_blo_id' => $options['rsa_blo_id'],
		
						//integer - rsa_apa_id
						'rsa_apa_id' => $options['rsa_apa_id'],
		
						//integer - rsa_reshot_id
						'rsa_reshot_id' => $options['rsa_reshot_id'],
		
						//char - rsa_tipoapartamento
						'rsa_tipoapartamento' => $options['rsa_tipoapartamento'],
		
						//char - rsa_categoriaapartamento
						'rsa_categoriaapartamento' => $options['rsa_categoriaapartamento'],
		
						//date - rsa_dthreserva
						'rsa_dthreserva' => $options['rsa_dthreserva'],
		
						//date - rsa_dthcadastro
						'rsa_dthcadastro' => $options['rsa_dthcadastro'],
		
						//numeric(10,2) - rsa_tarifa
						'rsa_tarifa' => $options['rsa_tarifa'],
		
						//numeric(10,2) - rsa_tarifafinal
						'rsa_tarifafinal' => $options['rsa_tarifafinal'],
		
						//numeric(10,2) - rsa_taxaturismo
						'rsa_taxaturismo' => $options['rsa_taxaturismo'],
		
						//numeric(10,2) - rsa_taxaservico
						'rsa_taxaservico' => $options['rsa_taxaservico'],
		
						//numeric(10,2) - rsa_iss
						'rsa_iss' => $options['rsa_iss']
		
					);
		$this->db->insert('reservasapartamentos', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateReservasApartamentos($options = array())
	{
		if (!$this-> _required(
			Array('rsa_id', 'rsa_id'),
			$options)
		) return false;
		
		if(isset($options['rsa_bca_id']))
			$this->db->set('rsa_bca_id', $options['rsa_bca_id']);
			
		if(isset($options['rsa_blo_id']))
			$this->db->set('rsa_blo_id', $options['rsa_blo_id']);
			
		if(isset($options['rsa_apa_id']))
			$this->db->set('rsa_apa_id', $options['rsa_apa_id']);
			
		if(isset($options['rsa_reshot_id']))
			$this->db->set('rsa_reshot_id', $options['rsa_reshot_id']);
			
		if(isset($options['rsa_tipoapartamento']))
			$this->db->set('rsa_tipoapartamento', $options['rsa_tipoapartamento']);
			
		if(isset($options['rsa_categoriaapartamento']))
			$this->db->set('rsa_categoriaapartamento', $options['rsa_categoriaapartamento']);
			
		if(isset($options['rsa_dthreserva']))
			$this->db->set('rsa_dthreserva', $options['rsa_dthreserva']);
			
		if(isset($options['rsa_dthcadastro']))
			$this->db->set('rsa_dthcadastro', $options['rsa_dthcadastro']);
			
		if(isset($options['rsa_tarifa']))
			$this->db->set('rsa_tarifa', $options['rsa_tarifa']);
			
		if(isset($options['rsa_tarifafinal']))
			$this->db->set('rsa_tarifafinal', $options['rsa_tarifafinal']);
			
		if(isset($options['rsa_taxaturismo']))
			$this->db->set('rsa_taxaturismo', $options['rsa_taxaturismo']);
			
		if(isset($options['rsa_taxaservico']))
			$this->db->set('rsa_taxaservico', $options['rsa_taxaservico']);
			
		if(isset($options['rsa_iss']))
			$this->db->set('rsa_iss', $options['rsa_iss']);
			
		$this->db->where('rsa_id', $options['rsa_id']);
		$this->db->update('reservasapartamentos');
		
		return $this->db->affected_rows();
	}
	
	function GetReservasApartamentos($options = array())
	{
		if(isset($options['rsa_id']))
			$this->db->where('rsa_id', $options['rsa_id']);
			
		if(isset($options['rsa_blo_id']))
			$this->db->where('rsa_blo_id', $options['rsa_blo_id']);
			
		if(isset($options['rsa_apa_id']))
			$this->db->where('rsa_apa_id', $options['rsa_apa_id']);
			
		if(isset($options['rsa_reshot_id']))
			$this->db->where('rsa_reshot_id', $options['rsa_reshot_id']);
			
		if(isset($options['rsa_tipoapartamento']))
			$this->db->where('rsa_tipoapartamento', $options['rsa_tipoapartamento']);
			
		if(isset($options['rsa_categoriaapartamento']))
			$this->db->where('rsa_categoriaapartamento', $options['rsa_categoriaapartamento']);
			
		if(isset($options['rsa_dthreserva']))
			$this->db->where('rsa_dthreserva', $options['rsa_dthreserva']);
			
		if(isset($options['rsa_dthcadastro']))
			$this->db->where('rsa_dthcadastro', $options['rsa_dthcadastro']);
			
		if(isset($options['rsa_tarifa']))
			$this->db->where('rsa_tarifa', $options['rsa_tarifa']);
			
		if(isset($options['rsa_tarifafinal']))
			$this->db->where('rsa_tarifafinal', $options['rsa_tarifafinal']);
			
		if(isset($options['rsa_taxaturismo']))
			$this->db->where('rsa_taxaturismo', $options['rsa_taxaturismo']);
			
		if(isset($options['rsa_taxaservico']))
			$this->db->where('rsa_taxaservico', $options['rsa_taxaservico']);
			
		if(isset($options['rsa_iss']))
			$this->db->where('rsa_iss', $options['rsa_iss']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('reservasapartamentos');

		if(isset($options['rsa_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteReservasApartamentos($options = array())
	{
    
		if (!$this-> _required(
			Array('rsa_id', 'rsa_id'),
			$options)
		) return false;
		
		$this->db->where('rsa_id', $options['rsa_id']);
    	$this->db->delete('reservasapartamentos');
	}
}

?>