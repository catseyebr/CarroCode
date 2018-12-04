<?php

class Tags_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddTags($options = array())
	{
		if (!$this-> _required(
			Array('tag_nome', 'tag_nome'),
			$options)
		) return false;
				
		$postData = array(
						//char - tag_nome
						'tag_nome' => $options['tag_nome']
		
					);
		$this->db->insert('tags', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateTags($options = array())
	{
		if (!$this-> _required(
			Array('tag_id', 'tag_id'),
			$options)
		) return false;
		
		if(isset($options['tag_nome']))
			$this->db->set('tag_nome', $options['tag_nome']);
			
		$this->db->where('tag_id', $options['tag_id']);
		$this->db->update('tags');
		
		return $this->db->affected_rows();
	}
	
	function GetTags($options = array())
	{
		if(isset($options['tag_id']))
			$this->db->where('tag_id', $options['tag_id']);
			
		if(isset($options['tag_nome']))
			$this->db->where('tag_nome', $options['tag_nome']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('tags');

		if(isset($options['tag_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteTags($options = array())
	{
    
		if (!$this-> _required(
			Array('tag_id', 'tag_id'),
			$options)
		) return false;
		
		$this->db->where('tag_id', $options['tag_id']);
    	$this->db->delete('tags');
	}
}

?>