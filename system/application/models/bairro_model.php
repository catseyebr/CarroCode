<?php

class Bairro_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddBairro($options = array())
	{
		$postData = array();
				
		if(isset($options['bai_id']))
			//integer
			$postData['bai_id'] = $options['bai_id'];
		
		//---------------------------------------------------
		
		if(isset($options['bai_city_id'])){
			//integer
			$postData['bai_city_id'] = $options['bai_city_id'];
		}else{
			$postData['bai_city_id'] = 1;
		}
		
		//---------------------------------------------------
		
		if(isset($options['bai_nome'])){
			//varchar
			$postData['bai_nome'] = $options['bai_nome'];
		}else{
			$postData['bai_nome'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['bai_abr'])){
			//varchar
			$postData['bai_abr'] = $options['bai_abr'];
		}else{
			$postData['bai_abr'] = '';
		}
		
		//---------------------------------------------------
		
		$this->db->insert('bairro', $postData);
		
		if(isset($options['bai_id'])){
			if($postData['bai_id'] > $this->db->insert_id()){
				$next_sequence = $postData['bai_id']+1;
				$this->db->simple_query("ALTER SEQUENCE bairro_bai_id_seq RESTART WITH $next_sequence");
			}
			return $postData['bai_id'];
		}else{
			return $this->db->insert_id();
		}
	}
	
	function UpdateBairro($options = array())
	{
		if (!$this-> _required(
			Array('bai_id', 'bai_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bai_city_id', 'bai_city_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bai_nome', 'bai_nome'),
			$options)
		) return false;
				
		if(isset($options['bai_city_id']))
			$this->db->set('bai_city_id', $options['bai_city_id']);
			
		if(isset($options['bai_nome']))
			$this->db->set('bai_nome', $options['bai_nome']);
			
		if(isset($options['bai_abr']))
			$this->db->set('bai_abr', $options['bai_abr']);
			
		$this->db->where('bai_id', $options['bai_id']);
		$this->db->update('bairro');
		
		return $this->db->affected_rows();
	}
	
	function GetBairro($options = array())
	{
		if(isset($options['bai_id']))
			$this->db->where('bai_id', $options['bai_id']);
			
		if(isset($options['bai_city_id']))
			$this->db->where('bai_city_id', $options['bai_city_id']);
			
		if(isset($options['bai_nome']))
			$this->db->where('bai_nome', $options['bai_nome']);
			
		if(isset($options['bai_abr']))
			$this->db->where('bai_abr', $options['bai_abr']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('bairro');

		if(isset($options['bai_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteBairro($options = array())
	{
    
		if (!$this-> _required(
			Array('bai_id', 'bai_id'),
			$options)
		) return false;
		
		$this->db->where('bai_id', $options['bai_id']);
		$this->db->delete('bairro');
	}
}

?>