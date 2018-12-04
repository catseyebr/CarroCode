<?php

class Carro_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddCarro($options = array())
	{
		
		if(isset($options['car_id']))
			//integer
			$postData['car_id'] = $options['car_id'];
		
		//---------------------------------------------------
		
		if(isset($options['car_met_id'])){
			//integer
			$postData['car_met_id'] = $options['car_met_id'];
		}else{
			$postData['car_met_id'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['car_modelo'])){
			//varchar
			$postData['car_modelo'] = $options['car_modelo'];
		}else{
			$postData['car_modelo'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['car_passageiros'])){
			//integer
			$postData['car_passageiros'] = $options['car_passageiros'];
		}else{
			$postData['car_passageiros'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['car_malagde'])){
			//integer
			$postData['car_malagde'] = $options['car_malagde'];
		}else{
			$postData['car_malagde'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['car_malapeq'])){
			//integer
			$postData['car_malapeq'] = $options['car_malapeq'];
		}else{
			$postData['car_malapeq'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['car_motor'])){
			//varchar
			$postData['car_motor'] = $options['car_motor'];
		}else{
			$postData['car_motor'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['car_cambio'])){
			//varchar
			$postData['car_cambio'] = $options['car_cambio'];
		}else{
			$postData['car_cambio'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['car_desc'])){
			//text
			$postData['car_desc'] = $options['car_desc'];
		}else{
			$postData['car_desc'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['car_linkyoutube'])){
			//text
			$postData['car_linkyoutube'] = $options['car_linkyoutube'];
		}else{
			$postData['car_linkyoutube'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['car_txtyoutube'])){
			//text
			$postData['car_txtyoutube'] = $options['car_txtyoutube'];
		}else{
			$postData['car_txtyoutube'] = '';
		}
		
		//---------------------------------------------------
		
		
		$this->db->insert('carro', $postData);
		
		if(isset($options['car_id'])){
			if($postData['car_id'] > $this->db->insert_id()){
				$next_sequence = $postData['car_id']+1;
				$this->db->simple_query("ALTER SEQUENCE carro_car_id_seq RESTART WITH $next_sequence");
			}
			return $postData['car_id'];
		}else{
			return $this->db->insert_id();
		}	
	}
	
	function UpdateCarro($options = array())
	{
		if (!$this-> _required(
			Array('car_id', 'car_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('car_met_id', 'car_met_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('car_modelo', 'car_modelo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('car_passageiros', 'car_passageiros'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('car_malagde', 'car_malagde'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('car_malapeq', 'car_malapeq'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('car_motor', 'car_motor'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('car_cambio', 'car_cambio'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('car_desc', 'car_desc'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('car_linkyoutube', 'car_likyoutube'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('car_txtyoutube', 'car_txtyoutube'),
			$options)
		) return false;
				
		if(isset($options['car_met_id']))
			$this->db->set('car_met_id', $options['car_met_id']);
			
		if(isset($options['car_modelo']))
			$this->db->set('car_modelo', $options['car_modelo']);
		
		if(isset($options['car_passageiros']))
			$this->db->set('car_passageiros', $options['car_passageiros']);
			
		if(isset($options['car_malagde']))
			$this->db->set('car_malagde', $options['car_malagde']);
			
		if(isset($options['car_malapeq']))
			$this->db->set('car_malapeq', $options['car_malapeq']);
			
		if(isset($options['car_motor']))
			$this->db->set('car_motor', $options['car_motor']);
			
		if(isset($options['car_cambio']))
			$this->db->set('car_cambio', $options['car_cambio']);
			
		if(isset($options['car_desc']))
			$this->db->set('car_desc', $options['car_desc']);
			
		if(isset($options['car_linkyoutube']))
			$this->db->set('car_linkyoutube', $options['car_linkyoutube']);
			
		if(isset($options['car_txtyoutube']))
			$this->db->set('car_txtyoutube', $options['car_txtyoutube']);
			
		$this->db->where('car_id', $options['car_id']);
		$this->db->update('carro');
		
		return $this->db->affected_rows();
	}
	
	function GetCarro($options = array())
	{
		if(isset($options['car_id']))
			$this->db->where('car_id', $options['car_id']);
			
		if(isset($options['car_met_id']))
			$this->db->where('car_met_id', $options['car_met_id']);
		
		if(isset($options['car_modelo']))
			$this->db->where('car_modelo', $options['car_modelo']);
			
		if(isset($options['car_passageiros']))
			$this->db->where('car_passageiros', $options['car_passageiros']);
			
		if(isset($options['car_malagde']))
			$this->db->where('car_malagde', $options['car_malagde']);
			
		if(isset($options['car_malapeq']))
			$this->db->where('car_malapeq', $options['car_malapeq']);
			
		if(isset($options['car_motor']))
			$this->db->where('car_motor', $options['car_motor']);
			
		if(isset($options['car_cambio']))
			$this->db->where('car_cambio', $options['car_cambio']);
			
		if(isset($options['car_desc']))
			$this->db->where('car_desc', $options['car_desc']);
			
		if(isset($options['car_linkyoutube']))
			$this->db->where('car_linkyoutube', $options['car_linkyoutube']);
			
		if(isset($options['car_txtyoutube']))
			$this->db->where('car_txtyoutube', $options['car_txtyoutube']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('carro');

		if(isset($options['car_id']))
		return $query->row(0);
		return $query->result();
	}
	
	function DeleteCarro($options = array())
	{
    
		if (!$this-> _required(
			Array('car_id', 'car_id'),
			$options)
		) return false;
		
		$this->db->where('car_id', $options['car_id']);
    	$this->db->delete('carro');
	}
}

?>