<?php

class TagCidade_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddTagCidade($options = array())
	{
		if (!$this-> _required(
			Array('tagcity_city_id', 'tagcity_city_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tagcity_tag_id', 'tagcity_tag_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - tagcity_city_id
						'tagcity_city_id' => $options['tagcity_city_id'],
		
						//integer - tagcity_tag_id
						'tagcity_tag_id' => $options['tagcity_tag_id'],
						
					);
		$this->db->insert('tagcidade', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateTagCidade($options = array())
	{
		if (!$this-> _required(
			Array('tagcity_city_id', 'tagcity_city_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tagcity_tag_id', 'tagcity_tag_id'),
			$options)
		) return false;
				
		if(isset($options['tagcity_city_id']))
			$this->db->set('tagcity_city_id', $options['tagcity_city_id']);
			
		if(isset($options['tagcity_tag_id']))
			$this->db->set('tagcity_tag_id', $options['tagcity_tag_id']);
		
		$this->db->where('tagcity_city_id', $options['tagcity_city_id']);
		$this->db->where('tagcity_tag_id', $options['tagcity_tag_id']);
		$this->db->update('tagcidade');
		
		return $this->db->affected_rows();
	}
	
	function GetTagCidade($options = array())
	{
		if(isset($options['tagcity_city_id']))
			$this->db->where('tagcity_city_id', $options['tagcity_city_id']);
			
		if(isset($options['tagcity_tag_id']))
			$this->db->where('tagcity_tag_id', $options['tagcity_tag_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('tagcidade');

		return $query->row(0);
	}
	
	function DeleteTagCidade($options = array())
	{
    
		if (!$this-> _required(
			Array('tagcity_city_id', 'tagcity_city_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tagcity_tag_id', 'tagcity_tag_id'),
			$options)
		) return false;
		
		$this->db->where('tagcity_city_id', $options['tagcity_city_id']);
		$this->db->where('tagcity_tag_id', $options['tagcity_tag_id']);
    	$this->db->delete('tagcidade');
	}
	
	public function getTagsAutocomplete ($options = array()) {
	    $like = "%".$options['like']."%";
	    $this->db->select('city_nome, city_id, uf_abr, uf_id')
	             ->distinct()
	             ->join('cidade', 'city_id = loj_city_id', 'left')
				 ->join('estado', 'uf_id = city_uf_id', 'left')
	             ->where('city_nome ILIKE', $like)
				 ->order_by('city_nome', 'ASC');
	    $query1 = $this->db->get('loja');
		$rs1 = $query1->result();
	    $rs1_rc = $query1->num_rows();
	    return $rs1;
	  }
}

?>