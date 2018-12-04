<?php

class Categoria_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddCategoria($options = array())
	{
		$postData = array();
		
		if(isset($options['cat_id']))
			//integer
			$postData['cat_id'] = $options['cat_id'];
		
		//---------------------------------------------------
		
		if(isset($options['cat_met_id'])){
			//integer
			$postData['cat_met_id'] = $options['cat_met_id'];
		}else{
			$postData['cat_met_id'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cat_nome'])){
			//varchar
			$postData['cat_nome'] = $options['cat_nome'];
		}else{
			$postData['cat_nome'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['cat_ordem'])){
			//integer
			$postData['cat_ordem'] = $options['cat_ordem'];
		}else{
			$postData['cat_ordem'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['cat_desc'])){
			//varchar
			$postData['cat_desc'] = $options['cat_desc'];
		}else{
			$postData['cat_desc'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['cat_permalink'])){
			//varchar
			$postData['cat_permalink'] = $options['cat_permalink'];
		}else{
			$postData['cat_permalink'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['cat_classe'])){
			//varchar
			$postData['cat_classe'] = $options['cat_classe'];
		}else{
			$postData['cat_classe'] = '';
		}
		
		//---------------------------------------------------
		
		$this->db->insert('categoria', $postData);
		
		if(isset($options['cat_id'])){
			if($postData['cat_id'] >= $this->db->insert_id()){
				$next_sequence = $postData['cat_id']+1;
				$this->db->simple_query("ALTER SEQUENCE categoria_cat_id_seq RESTART WITH $next_sequence");
			}
			return $postData['cat_id'];
		}else{
			return $this->db->insert_id();
		}
	}
	
	function UpdateCategoria($options = array())
	{
		if (!$this-> _required(
			Array('cat_id', 'cat_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cat_met_id', 'cat_met_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cat_nome', 'cat_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cat_ordem', 'cat_ordem'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cat_desc', 'cat_desc'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cat_permalink', 'cat_permalink'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cat_classe', 'cat_classe'),
			$options)
		) return false;
				
		if(isset($options['cat_met_id']))
			$this->db->set('cat_met_id', $options['cat_met_id']);
			
		if(isset($options['cat_nome']))
			$this->db->set('cat_nome', $options['cat_nome']);
			
		if(isset($options['cat_ordem']))
			$this->db->set('cat_ordem', $options['cat_ordem']);
			
		if(isset($options['cat_desc']))
			$this->db->set('cat_desc', $options['cat_desc']);
			
		if(isset($options['cat_permalink']))
			$this->db->set('cat_permalink', $options['cat_permalink']);
			
		if(isset($options['cat_classe']))
			$this->db->set('cat_classe', $options['cat_classe']);
		
		$this->db->where('cat_id', $options['cat_id']);
		$this->db->update('categoria');
		
		return $this->db->affected_rows();
	}
	
	function GetCategoria($options = array())
	{
		if(isset($options['cat_id']))
			$this->db->where('cat_id', $options['cat_id']);
			
		if(isset($options['cat_met_id']))
			$this->db->where('cat_met_id', $options['cat_met_id']);
			
		if(isset($options['cat_nome']))
			$this->db->where('cat_nome', $options['cat_nome']);
			
		if(isset($options['cat_ordem']))
			$this->db->where('cat_ordem', $options['cat_ordem']);
			
		if(isset($options['cat_desc']))
			$this->db->where('cat_desc', $options['cat_desc']);
			
		if(isset($options['cat_permalink']))
			$this->db->where('cat_permalink', $options['cat_permalink']);
			
		if(isset($options['cat_classe']))
			$this->db->where('cat_classe', $options['cat_classe']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('categoria');

		if(isset($options['cat_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteCategoria($options = array())
	{
    
		if (!$this-> _required(
			Array('cat_id', 'cat_id'),
			$options)
		) return false;
		
		$this->db->where('cat_id', $options['cat_id']);
		$this->db->delete('categoria');
	}
}

?>