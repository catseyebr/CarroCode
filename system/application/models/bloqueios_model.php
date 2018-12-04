<?php

class Bloqueios_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddBloqueios($options = array())
	{
		if (!$this-> _required(
			Array('blo_id', 'blo_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_bca_id', 'blo_bca_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_vigenciaini', 'blo_vigenciaini'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_vigenciafim', 'blo_vigenciafim'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_tarifa', 'blo_tarifa'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_tarifafinal', 'blo_tarifafinal'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_taxaservico', 'blo_taxaservico'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_apa_id', 'blo_apa_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_iss', 'blo_iss'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_taxaturismo', 'blo_taxaturismo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_qtdebloqueios', 'blo_qtdebloqueios'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_deadline', 'blo_deadline'),
			$options)
		) return false;
		
		$postData = array(
						//integer - blo_id
						'blo_id' => $options['blo_id'],
		
						//integer - blo_bca_id
						'blo_bca_id' => $options['blo_bca_id'],
						
						//date - blo_vigenciaini
						'blo_vigenciaini' => $options['blo_vigenciaini'],
		
						//date - blo_vigenciafim
						'blo_vigenciafim' => $options['blo_vigenciafim'],
		
						//numeric(10,2) - blo_tarifa
						'blo_tarifa' => $options['blo_tarifa'],
		
						//numeric(10,2) - blo_tarifafinal
						'blo_tarifafinal' => $options['blo_tarifafinal'],
		
						//numeric(10,2) - blo_taxaservico
						'blo_taxaservico' => $options['blo_taxaservico'],
		
						//integer - blo_apa_id
						'blo_apa_id' => $options['blo_apa_id'],
		
						//numeric(10,2) - blo_iss
						'blo_iss' => $options['blo_iss'],
		
						//numeric(10,2) - blo_taxaturismo
						'blo_taxaturismo' => $options['blo_taxaturismo'],
		
						//integer - blo_qtdebloqueios
						'blo_qtdebloqueios' => $options['blo_qtdebloqueios'],
		
						//integer - blo_deadline
						'blo_deadline' => $options['blo_deadline']
		
					);
		$this->db->insert('bloqueios', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateBloqueios($options = array())
	{
		if (!$this-> _required(
			Array('blo_id', 'blo_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_bca_id', 'blo_bca_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_vigenciaini', 'blo_vigenciaini'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_vigenciafim', 'blo_vigenciafim'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_tarifa', 'blo_tarifa'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_tarifafinal', 'blo_tarifafinal'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_taxaservico', 'blo_taxaservico'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_apa_id', 'blo_apa_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_iss', 'blo_iss'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_taxaturismo', 'blo_taxaturismo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_qtdebloqueios', 'blo_qtdebloqueios'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('blo_deadline', 'blo_deadline'),
			$options)
		) return false;
				
		if(isset($options['blo_bca_id']))
			$this->db->set('blo_bca_id', $options['blo_bca_id']);
			
		if(isset($options['blo_vigenciaini']))
			$this->db->set('blo_vigenciaini', $options['blo_vigenciaini']);
		
		if(isset($options['blo_vigenciafim']))
			$this->db->set('blo_vigenciafim', $options['blo_vigenciafim']);
			
		if(isset($options['blo_tarifa']))
			$this->db->set('blo_tarifa', $options['blo_tarifa']);
			
		if(isset($options['blo_tarifafinal']))
			$this->db->set('blo_tarifafinal', $options['blo_tarifafinal']);
			
		if(isset($options['blo_taxaservico']))
			$this->db->set('blo_taxaservico', $options['blo_taxaservico']);
			
		if(isset($options['blo_apa_id']))
			$this->db->set('blo_apa_id', $options['blo_apa_id']);
			
		if(isset($options['blo_iss']))
			$this->db->set('blo_iss', $options['blo_iss']);
			
		if(isset($options['blo_taxaturismo']))
			$this->db->set('blo_taxaturismo', $options['blo_taxaturismo']);
			
		if(isset($options['blo_qtdebloqueios']))
			$this->db->set('blo_qtdebloqueios', $options['blo_qtdebloqueios']);
			
		if(isset($options['blo_deadline']))
			$this->db->set('blo_deadline', $options['blo_deadline']);
		
		$this->db->where('blo_id', $options['blo_id']);
		$this->db->update('bloqueios');
		
		return $this->db->affected_rows();
	}
	
	function GetBloqueios($options = array())
	{
		if(isset($options['blo_id']))
			$this->db->where('blo_id', $options['blo_id']);
			
		if(isset($options['blo_bca_id']))
			$this->db->where('blo_bca_id', $options['blo_bca_id']);
		
		if(isset($options['blo_vigenciaini']))
			$this->db->where('blo_vigenciaini', $options['blo_vigenciaini']);
			
		if(isset($options['blo_vigenciafim']))
			$this->db->where('blo_vigenciafim', $options['blo_vigenciafim']);
			
		if(isset($options['blo_tarifa']))
			$this->db->where('blo_tarifa', $options['blo_tarifa']);
			
		if(isset($options['blo_tarifafinal']))
			$this->db->where('blo_tarifafinal', $options['blo_tarifafinal']);
			
		if(isset($options['blo_taxaservico']))
			$this->db->where('blo_taxaservico', $options['blo_taxaservico']);
			
		if(isset($options['blo_apa_id']))
			$this->db->where('blo_apa_id', $options['blo_apa_id']);
			
		if(isset($options['blo_iss']))
			$this->db->where('blo_iss', $options['blo_iss']);
			
		if(isset($options['blo_taxaturismo']))
			$this->db->where('blo_taxaturismo', $options['blo_taxaturismo']);
			
		if(isset($options['blo_qtdebloqueios']))
			$this->db->where('blo_qtdebloqueios', $options['blo_qtdebloqueios']);
			
		if(isset($options['blo_deadline']))
			$this->db->where('blo_deadline', $options['blo_deadline']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('bloqueios');

		if(isset($options['blo_id']))
		return $query->row(0);
		return $query->result();
	}
	
	function DeleteBloqueios($options = array())
	{
    
		if (!$this-> _required(
			Array('blo_id', 'blo_id'),
			$options)
		) return false;
		
		$this->db->where('blo_id', $options['blo_id']);
    	$this->db->delete('bloqueios');
	}
}

?>