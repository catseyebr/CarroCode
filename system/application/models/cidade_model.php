<?php

class Cidade_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddCidade($options = array())
	{
		$postData = array();
		
		if(isset($options['city_id']))
			//integer
			$postData['city_id'] = $options['city_id'];
		
		//---------------------------------------------------
		
		if(isset($options['city_pais_id'])){
			//integer
			$postData['city_pais_id'] = $options['city_pais_id'];
		}else{
			$postData['city_pais_id'] = 1;
		}
		
		//---------------------------------------------------
		
		if(isset($options['city_met_id'])){
			//integer
			$postData['city_met_id'] = $options['city_met_id'];
		}else{
			$postData['city_met_id'] = 1;
		}
		
		//---------------------------------------------------
		
		if(isset($options['city_uf_id'])){
			//integer
			$postData['city_uf_id'] = $options['city_uf_id'];
		}else{
			$postData['city_uf_id'] = 1;
		}
		
		//---------------------------------------------------
		
		if(isset($options['city_nome'])){
			//varchar
			$postData['city_nome'] = $options['city_nome'];
		}else{
			$postData['city_nome'] = '';
		}
		
		//---------------------------------------------------
		
		$this->db->insert('cidade', $postData);
		
		if(isset($options['city_id'])){
			if($postData['city_id'] > $this->db->insert_id()){
				$next_sequence = $postData['city_id']+1;
				$this->db->simple_query("ALTER SEQUENCE cidade_city_id_seq RESTART WITH $next_sequence");
			}
			return $postData['city_id'];
		}else{
			return $this->db->insert_id();
		}
	}
	
	function UpdateCidade($options = array())
	{
		if (!$this-> _required(
			Array('city_id', 'city_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('city_pais_id', 'city_pais_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('city_met_id', 'city_met_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('city_uf_id', 'city_uf_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('city_nome', 'city_nome'),
			$options)
		) return false;
				
		if(isset($options['city_pais_id']))
			$this->db->set('city_pais_id', $options['city_pais_id']);
			
		if(isset($options['city_met_id']))
			$this->db->set('city_met_id', $options['city_met_id']);
			
		if(isset($options['city_uf_id']))
			$this->db->set('city_uf_id', $options['city_uf_id']);
			
		if(isset($options['city_nome']))
			$this->db->set('city_nome', $options['city_nome']);
			
		$this->db->where('city_id', $options['city_id']);
		$this->db->update('cidade');
		
		return $this->db->affected_rows();
	}
	
	function GetCidade($options = array())
	{
		if(isset($options['city_id']))
			$this->db->where('city_id', $options['city_id']);
			
		if(isset($options['city_pais_id']))
			$this->db->where('city_pais_id', $options['city_pais_id']);
			
		if(isset($options['city_met_id']))
			$this->db->where('city_met_id', $options['city_met_id']);
			
		if(isset($options['city_uf_id']))
			$this->db->where('city_uf_id', $options['city_uf_id']);
			
		if(isset($options['city_nome']))
			$this->db->where('city_nome', $options['city_nome']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('cidade');

		if(isset($options['city_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function GetCidadeId($options = array())
	{
		if(isset($options['city_nome']))
			$this->db->where('city_nome', $options['city_nome']);
		
		if(isset($options['city_uf_id']))
			$this->db->where('city_uf_id', $options['city_uf_id']);
			
		$query = $this->db->get('cidade');
		
		if($query->row(0)!=NULL){
			return (integer)$query->row(0)->city_id;
		}
	}
	
	function DeleteCidade($options = array())
	{
    
		if (!$this-> _required(
			Array('city_id', 'city_id'),
			$options)
		) return false;
		
		$this->db->where('city_id', $options['city_id']);
		$this->db->delete('cidade');
	}
}

?>