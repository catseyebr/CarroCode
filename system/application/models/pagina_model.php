<?php

class Pagina_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddPagina($options = array())
	{
		if (!$this-> _required(
			Array('pag_proj_id', 'pag_proj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('pag_url', 'pag_url'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('pag_class', 'pag_class'),
			$options)
		) return false;
		
		$postData = array();
		
		$postData['pag_proj_id'] = $options['pag_proj_id'];
		
		//---------------------------------------------------
		
		$postData['pag_url'] = $options['pag_url'];
		
		//---------------------------------------------------
		
		$postData['pag_class'] = $options['pag_class'];
		
		//---------------------------------------------------
		
		if(isset($options['pag_met_id'])){
			//integer
			$postData['pag_met_id'] = $options['pag_met_id'];
		}else{
			$postData['pag_met_id'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['pag_class_tipo'])){
			//boolean
			$postData['pag_class_tipo'] = $options['pag_class_tipo'];
		}else{
			$postData['pag_class_tipo'] = 'f';
		}
		
		//---------------------------------------------------
		
		if(isset($options['pag_link_titulo'])){
			//boolean
			$postData['pag_link_titulo'] = $options['pag_link_titulo'];
		}else{
			$postData['pag_link_titulo'] = NULL;
		}
		
		//---------------------------------------------------
								
		$this->db->insert('pagina', $postData);
		return $this->db->insert_id();
	}
	
	function UpdatePagina($options = array())
	{
		if (!$this-> _required(
			Array('pag_id', 'pag_Id'),
			$options)
		) return false;
		
		if(isset($options['pag_proj_id']))
			$this->db->set('pag_proj_id', $options['pag_proj_id']);
			
		if(isset($options['pag_url']))
			$this->db->set('pag_url', $options['pag_url']);
			
		if(isset($options['pag_class']))
			$this->db->set('pag_class', $options['pag_class']);
			
		if(isset($options['pag_classtipo']))
			$this->db->set('pag_classtipo', $options['pag_classtipo']);
			
		if(isset($options['pag_link_titulo']))
			$this->db->set('pag_link_titulo', $options['pag_link_titulo']);
			
		$this->db->where('pag_id', $options['pag_id']);
		$this->db->update('pagina');
		
		return $this->db->affected_rows();
	}
	
	function GetPagina($options = array())
	{
		if(isset($options['pag_id']))
			$this->db->where('pag_id', $options['pag_id']);
			
		if(isset($options['pag_proj_id']))
			$this->db->where('pag_proj_id', $options['pag_proj_id']);
			
		if(isset($options['pag_url']))
			$this->db->where('pag_url', $options['pag_url']);
			
		if(isset($options['pag_met_id']))
			$this->db->where('pag_met_id', $options['pag_met_id']);
			
		if(isset($options['pag_class']))
			$this->db->where('pag_class', $options['pag_class']);
			
		if(isset($options['pag_classtipo']))
			$this->db->where('pag_classtipo', $options['pag_classtipo']);
		
		if(isset($options['pag_link_titulo']))
			$this->db->where('pag_link_titulo', $options['pag_link_titulo']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('pagina');

		if(isset($options['pag_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeletePagina($options = array())
	{
    
		if (!$this-> _required(
			Array('pag_id', 'pag_id'),
			$options)
		) return false;
		
		$this->db->where('pag_id', $options['pag_id']);
    	$this->db->delete('pagina');
	}
}

?>