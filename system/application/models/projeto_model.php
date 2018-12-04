<?php

class Projeto_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddProjeto($options = array())
	{
		$postData = array();
		
		if(isset($options['proj_id']))
			//integer
			$postData['proj_id'] = $options['proj_id'];
		
		//---------------------------------------------------
		
		if(isset($options['proj_nome'])){
			//varchar
			$postData['proj_nome'] = $options['proj_nome'];
		}else{
			$postData['proj_nome'] = '';
		}
		
		//---------------------------------------------------
				
		$this->db->insert('projeto', $postData);
		
		if(isset($options['proj_id'])){
			if($postData['proj_id'] > $this->db->insert_id()){
				$next_sequence = $options['proj_id']+1;
				$this->db->simple_query("ALTER SEQUENCE projeto_proj_id_seq RESTART WITH $next_sequence");
			}
			return $options['proj_id'];
		}else{
			return $this->db->insert_id();
		}
	}
	
	function UpdateProjeto($options = array())
	{
		if (!$this-> _required(
			Array('proj_id', 'proj_id'),
			$options)
		) return false;
		
		if(isset($options['proj_nome']))
			$this->db->set('proj_nome', $options['proj_nome']);
			
		$this->db->where('proj_id', $options['proj_id']);
		$this->db->update('projeto');
		
		return $this->db->affected_rows();
	}
	
	function GetProjeto($options = array())
	{
		if(isset($options['proj_id']))
			$this->db->where('proj_id', $options['proj_id']);
			
		if(isset($options['proj_nome']))
			$this->db->where('proj_nome', $options['proj_nome']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('projeto');

		if(isset($options['proj_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteProjeto($options = array())
	{
    
		if (!$this-> _required(
			Array('proj_id', 'proj_id'),
			$options)
		) return false;
		
		$this->db->where('proj_id', $options['proj_id']);
    	$this->db->delete('projeto');
	}
}

?>