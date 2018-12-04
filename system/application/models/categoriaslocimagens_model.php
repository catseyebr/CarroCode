<?php

class CategoriasLocImagens_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddCategoriasLocImagens($options = array())
	{
		if (!$this-> _required(
			Array('catim_img_id', 'catim_img_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('catim_cat_id', 'catim_cat_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - catim_img_id
						'catim_img_id' => $options['catim_img_id'],
		
						//integer - catim_cat_id
						'catim_cat_id' => $options['catim_cat_id'],
						
					);
		$this->db->insert('categoriaslocimagens', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateCategoriasLocImagens($options = array())
	{
		if (!$this-> _required(
			Array('catim_img_id', 'catim_img_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('catim_cat_id', 'catim_cat_id'),
			$options)
		) return false;
				
		if(isset($options['catim_img_id']))
			$this->db->set('catim_img_id', $options['catim_img_id']);
			
		if(isset($options['catim_cat_id']))
			$this->db->set('catim_cat_id', $options['catim_cat_id']);
		
		$this->db->where('catim_img_id', $options['catim_img_id']);
		$this->db->where('catim_cat_id', $options['catim_cat_id']);
		$this->db->update('categoriaslocimagens');
		
		return $this->db->affected_rows();
	}
	
	function GetCategoriasLocImagens($options = array())
	{
		if(isset($options['catim_img_id']))
			$this->db->where('catim_img_id', $options['catim_img_id']);
			
		if(isset($options['catim_cat_id']))
			$this->db->where('catim_cat_id', $options['catim_cat_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('categoriaslocimagens');

		return $query->row(0);
	}
	
	function DeleteCategoriasLocImagens($options = array())
	{
    
		if (!$this-> _required(
			Array('catim_img_id', 'catim_img_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('catim_cat_id', 'catim_cat_id'),
			$options)
		) return false;
		
		$this->db->where('catim_img_id', $options['catim_img_id']);
		$this->db->where('catim_cat_id', $options['catim_cat_id']);
    	$this->db->delete('categoriaslocimagens');
	}
}

?>