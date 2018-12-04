<?php

class TagLocadora_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddTagLocadora($options = array())
	{
		if (!$this-> _required(
			Array('tagloc_loj_id', 'tagloc_loj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tagloc_tag_id', 'tagloc_tag_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - tagloc_loj_id
						'tagloc_loj_id' => $options['tagloc_loj_id'],
		
						//integer - tagloc_tag_id
						'tagloc_tag_id' => $options['tagloc_tag_id'],
						
					);
		$this->db->insert('taglocadora', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateTagLocadora($options = array())
	{
		if (!$this-> _required(
			Array('tagloc_loj_id', 'tagloc_loj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tagloc_tag_id', 'tagloc_tag_id'),
			$options)
		) return false;
				
		if(isset($options['tagloc_loj_id']))
			$this->db->set('tagloc_loj_id', $options['tagloc_loj_id']);
			
		if(isset($options['tagloc_tag_id']))
			$this->db->set('tagloc_tag_id', $options['tagloc_tag_id']);
		
		$this->db->where('tagloc_loj_id', $options['tagloc_loj_id']);
		$this->db->where('tagloc_tag_id', $options['tagloc_tag_id']);
		$this->db->update('taglocadora');
		
		return $this->db->affected_rows();
	}
	
	function GetTagLocadora($options = array())
	{
		if(isset($options['tagloc_loj_id']))
			$this->db->where('tagloc_loj_id', $options['tagloc_loj_id']);
			
		if(isset($options['tagloc_tag_id']))
			$this->db->where('tagloc_tag_id', $options['tagloc_tag_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('taglocadora');

		return $query->row(0);
	}
	
	function DeleteTagLocadora($options = array())
	{
    
		if (!$this-> _required(
			Array('tagloc_loj_id', 'tagloc_loj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tagloc_tag_id', 'tagloc_tag_id'),
			$options)
		) return false;
		
		$this->db->where('tagloc_loj_id', $options['tagloc_loj_id']);
		$this->db->where('tagloc_tag_id', $options['tagloc_tag_id']);
    	$this->db->delete('taglocadora');
	}
}

?>