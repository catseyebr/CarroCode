<?php

class Imagens_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddImagens($options = array())
	{
		if (!$this-> _required(
			Array('img_id', 'img_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('img_caminhoimagem', 'img_caminhoimagem'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('img_width', 'img_width'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('img_height', 'img_height'),
			$options)
		) return false;
		
		$postData = array(
						//integer - img_id
						'img_id' => $options['img_id'],
		
						//varchar - img_caminhoimagem
						'img_caminhoimagem' => $options['img_caminhoimagem'],
		
						//integer - img_width
						'img_width' => $options['img_width'],
		
						//integer - img_height
						'img_height' => $options['img_height'],
						
					);
		$this->db->insert('imagens', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateImagens($options = array())
	{
		if (!$this-> _required(
			Array('img_id', 'img_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('img_caminhoimagem', 'img_caminhoimagem'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('img_width', 'img_width'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('img_height', 'img_height'),
			$options)
		) return false;
				
		if(isset($options['img_caminhoimagem']))
			$this->db->set('img_caminhoimagem', $options['img_caminhoimagem']);
			
		if(isset($options['img_width']))
			$this->db->set('img_width', $options['img_width']);
			
		if(isset($options['img_height']))
			$this->db->set('img_height', $options['img_height']);
		
		$this->db->where('img_id', $options['img_id']);
		$this->db->update('imagens');
		
		return $this->db->affected_rows();
	}
	
	function GetImagens($options = array())
	{
		if(isset($options['img_id']))
			$this->db->where('img_id', $options['img_id']);
			
		if(isset($options['img_caminhoimagem']))
			$this->db->where('img_caminhoimagem', $options['img_caminhoimagem']);
			
		if(isset($options['img_width']))
			$this->db->where('img_width', $options['img_width']);
			
		if(isset($options['img_height']))
			$this->db->where('img_height', $options['img_height']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('imagens');

		if(isset($options['img_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteImagens($options = array())
	{
    
		if (!$this-> _required(
			Array('img_id', 'img_id'),
			$options)
		) return false;
		
		$this->db->where('img_id', $options['img_id']);
    	$this->db->delete('imagens');
	}
}

?>