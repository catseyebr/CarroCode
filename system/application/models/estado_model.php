<?php

class Estado_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddEstado($options = array())
	{
		$postData = array();
		
		if(isset($options['uf_id']))
			//integer
			$postData['uf_id'] = $options['uf_id'];
		
		//---------------------------------------------------
		
		if(isset($options['uf_pais_id'])){
			//varchar
			$postData['uf_pais_id'] = $options['uf_pais_id'];
		}else{
			$postData['uf_pais_id'] = 1;
		}
		
		//---------------------------------------------------
		
		if(isset($options['uf_nome'])){
			//varchar
			$postData['uf_nome'] = $options['uf_nome'];
		}else{
			$postData['uf_nome'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['uf_abr'])){
			//varchar
			$postData['uf_abr'] = $options['uf_abr'];
		}else{
			$postData['uf_abr'] = '';
		}
		
		//---------------------------------------------------
			
		$this->db->insert('estado', $postData);
		if(isset($options['uf_id'])){
			if($postData['uf_id'] >= $this->db->insert_id()){
				$next_sequence = $postData['uf_id']+1;
				$this->db->simple_query("ALTER SEQUENCE estado_uf_id_seq RESTART WITH $next_sequence");
			}
			return $postData['uf_id'];
		}else{
			return $this->db->insert_id();
		}
	}
	
	function UpdateEstado($options = array())
	{
		if (!$this-> _required(
			Array('uf_id', 'uf_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('uf_pais_id', 'uf_pais_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('uf_nome', 'uf_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('uf_abr', 'uf_abr'),
			$options)
		) return false;
				
		if(isset($options['uf_id']))
			$this->db->set('uf_id', $options['uf_id']);
			
		if(isset($options['uf_pais_id']))
			$this->db->set('uf_pais_id', $options['uf_pais_id']);
			
		if(isset($options['uf_nome']))
			$this->db->set('uf_nome', $options['uf_nome']);
			
		if(isset($options['uf_abr']))
			$this->db->set('uf_abr', $options['uf_abr']);
			
		$this->db->where('uf_id', $options['uf_id']);
		$this->db->update('estado');
		
		return $this->db->affected_rows();
	}
	
	function GetEstado($options = array())
	{
		if(isset($options['uf_id']))
			$this->db->where('uf_id', $options['uf_id']);
			
		if(isset($options['uf_pais_id']))
			$this->db->where('uf_pais_id', $options['uf_pais_id']);
			
		if(isset($options['uf_nome']))
			$this->db->where('uf_nome', $options['uf_nome']);
			
		if(isset($options['uf_abr']))
			$this->db->where('uf_abr', $options['uf_abr']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('estado');

		return $query->result();
	}
	
	function GetEstadoId($options = array())
	{
		if(isset($options['uf_nome']))
			$this->db->where('uf_nome', $options['uf_nome']);
			
		if(isset($options['uf_abr']))
			$this->db->where('uf_abr', $options['uf_abr']);
		
		$query = $this->db->get('estado');
		
		if ($query->row(0) != NULL)
		return $query->row(0)->uf_id;
	}
	
	function DeleteEstado($options = array())
	{
    
		if (!$this-> _required(
			Array('uf_id', 'uf_id'),
			$options)
		) return false;
		
		$this->db->where('uf_id', $options['uf_id']);
    	$this->db->delete('estado');
	}
}

?>