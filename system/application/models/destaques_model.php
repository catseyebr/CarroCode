<?php

class Destaques_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddDestaques($options = array()) {
		if (!$this-> _required(
			Array('des_arquivo', 'des_arquivo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('des_conteudo', 'des_conteudo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('des_ordem', 'des_ordem'),
			$options)
		) return false;
		
		$postData = array();
		
		//---------------------------------------------------

			//integer
			$postData['des_arquivo'] = $options['des_arquivo'];
		
		//---------------------------------------------------
		
			//varchar
			$postData['des_conteudo'] = $options['des_conteudo'];
		
		//---------------------------------------------------
		
			//integer
			$postData['des_ordem'] = $options['des_ordem'];
		
		//---------------------------------------------------
		
		$this->db->insert('destaques', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateDestaques($options = array()) {
		if (!$this-> _required(
			Array('des_id'),
			$options)
		) return false;
		
		if(isset($options['des_arquivo']))
			$this->db->set('des_arquivo', $options['des_arquivo']);
			
		if(isset($options['des_conteudo']))
			$this->db->set('des_conteudo', $options['des_conteudo']);
		if(isset($options['des_ordem']))
			$this->db->set('des_ordem', $options['des_ordem']);

		$this->db->where('des_id', $options['des_id']);
		$this->db->update('destaques');
		
		return $this->db->affected_rows();
	}
	
	function GetDestaques($options = array()) {
  	if(isset($options['des_id']))
			$this->db->where('des_id', $options['des_id']);
			
  	if(isset($options['des_arquivo']))
			$this->db->like('des_arquivo', $options['des_arquivo']);
			
  	if(isset($options['des_conteudo']))
			$this->db->like('des_conteudo', $options['des_conteudo']);
			
  	if(isset($options['des_ordem']))
			$this->db->where('des_ordem', $options['des_ordem']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('destaques');
				
		if(
    isset($options['des_id']) || isset($options['des_ordem'])
    )
		return $query->row(0);
		return $query->result();
	}
	
	function DeleteDestaques($options = array()) {
    
		if(!$this->_required(array('des_id'), $options)) return false;
   
    		$this->db->where('des_id', $options['des_id']);
    		$this->db->delete('des');
	}
  
}

?>