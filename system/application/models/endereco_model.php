<?php

class Endereco_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddEndereco($options = array())
	{
		$postData = array();
		
		
		if(isset($options['end_cep_codigo'])){
			//varchar
			$postData['end_cep_codigo'] = $options['end_cep_codigo'];
		}else{
			$postData['end_cep_codigo'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['end_city_id'])){
			//varchar
			$postData['end_city_id'] = $options['end_city_id'];
		}else{
			$postData['end_city_id'] = 1;
		}
		
		//---------------------------------------------------
		
		if(isset($options['end_endereco'])){
			//varchar
			$postData['end_endereco'] = $options['end_endereco'];
		}else{
			$postData['end_endereco'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['end_numero'])){
			//varchar
			$postData['end_numero'] = $options['end_numero'];
		}else{
			$postData['end_numero'] = '';
		}
		
		//---------------------------------------------------
				
		if(isset($options['end_bairro'])){
			//varchar
			$postData['end_bairro'] = $options['end_bairro'];
		}else{
			$postData['end_bairro'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['end_complemento'])){
			//varchar
			$postData['end_complemento'] = $options['end_complemento'];
		}else{
			$postData['end_complemento'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['end_latitude'])){
			//varchar
			$postData['end_latitude'] = $options['end_latitude'];
		}else{
			$postData['end_latitude'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['end_longitude'])){
			//varchar
			$postData['end_longitude'] = $options['end_longitude'];
		}else{
			$postData['end_longitude'] = '';
		}
		
		//---------------------------------------------------
		
		$this->db->insert('endereco', $postData);
		
		return $this->db->insert_id();
	}
	
	function UpdateEndereco($options = array())
	{
		if (!$this-> _required(
			Array('end_id', 'end_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('end_cep_id', 'end_cep_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('end_city_id', 'end_city_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('end_endereco', 'end_endereco'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('end_numero', 'end_numero'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('end_bairro', 'end_bairro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('end_complemento', 'end_complemento'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('end_latitude', 'end_latitude'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('end_longitude', 'end_longitude'),
			$options)
		) return false;
				
		if(isset($options['end_cep_id']))
			$this->db->set('end_cep_id', $options['end_cep_id']);
			
		if(isset($options['end_city_id']))
			$this->db->set('end_city_id', $options['end_city_id']);
			
		if(isset($options['end_endereco']))
			$this->db->set('end_endereco', $options['end_endereco']);
			
		if(isset($options['end_numero']))
			$this->db->set('end_numero', $options['end_numero']);
			
		if(isset($options['end_bairro']))
			$this->db->set('end_bairro', $options['end_bairro']);
			
		if(isset($options['end_complemento']))
			$this->db->set('end_complemento', $options['end_complemento']);
			
		if(isset($options['end_latitude']))
			$this->db->set('end_latitude', $options['end_latitude']);
			
		if(isset($options['end_longitude']))
			$this->db->set('end_longitude', $options['end_longitude']);
		
		$this->db->where('end_id', $options['end_id']);
		$this->db->update('endereco');
		
		return $this->db->affected_rows();
	}
	
	function GetEndereco($options = array())
	{
		$this->db->join('cidade', 'city_id = end_city_id', 'left');
		$this->db->join('estado', 'uf_id = city_uf_id', 'left');
		
		if(isset($options['end_id']))
			$this->db->where('end_id', $options['end_id']);
			
		if(isset($options['end_cep_id']))
			$this->db->where('end_cep_id', $options['end_cep_id']);
			
		if(isset($options['end_city_id']))
			$this->db->where('end_city_id', $options['end_city_id']);
			
		if(isset($options['end_endereco']))
			$this->db->where('end_endereco', $options['end_endereco']);
			
		if(isset($options['end_numero']))
			$this->db->where('end_numero', $options['end_numero']);
			
		if(isset($options['end_bairro']))
			$this->db->where('end_bairro', $options['end_bairro']);
			
		if(isset($options['end_complemento']))
			$this->db->where('end_complemento', $options['end_complemento']);
			
		if(isset($options['end_latitude']))
			$this->db->where('end_latitude', $options['end_latitude']);
			
		if(isset($options['end_longitude']))
			$this->db->where('end_longitude', $options['end_longitude']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('endereco');

		return $query->result();
	}
	
	function DeleteEndereco($options = array())
	{
    
		if (!$this-> _required(
			Array('end_id', 'end_id'),
			$options)
		) return false;
		
		$this->db->where('end_id', $options['end_id']);
    	$this->db->delete('endereco');
	}
}

?>