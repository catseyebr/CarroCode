<?php

class ProjetoFrmPag_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddProjetoFrmPag($options = array())
	{
		if (!$this-> _required(
			Array('projfrmpag_frmpag_id', 'projfrmpag_frmpag_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('projfrmpag_proj_id', 'projfrmpag_proj_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - projfrmpag_frmpag_id
						'projfrmpag_frmpag_id' => $options['projfrmpag_frmpag_id'],
		
						//integer - projfrmpag_proj_id
						'projfrmpag_proj_id' => $options['projfrmpag_proj_id'],
						
					);
		$this->db->insert('projetofrmpag', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateProjetoFrmPag($options = array())
	{
		if (!$this-> _required(
			Array('projfrmpag_frmpag_id', 'projfrmpag_frmpag_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('projfrmpag_proj_id', 'projfrmpag_proj_id'),
			$options)
		) return false;
				
		if(isset($options['projfrmpag_frmpag_id']))
			$this->db->set('projfrmpag_frmpag_id', $options['projfrmpag_frmpag_id']);
			
		if(isset($options['projfrmpag_proj_id']))
			$this->db->set('projfrmpag_proj_id', $options['projfrmpag_proj_id']);
		
		$this->db->where('projfrmpag_frmpag_id', $options['projfrmpag_frmpag_id']);
		$this->db->where('projfrmpag_proj_id', $options['projfrmpag_proj_id']);
		$this->db->update('projetofrmpag');
		
		return $this->db->affected_rows();
	}
	
	function GetProjetoFrmPag($options = array())
	{
		if(isset($options['projfrmpag_frmpag_id']))
			$this->db->where('projfrmpag_frmpag_id', $options['projfrmpag_frmpag_id']);
			
		if(isset($options['projfrmpag_proj_id']))
			$this->db->where('projfrmpag_proj_id', $options['projfrmpag_proj_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('projetofrmpag');

		return $query->row(0);
	}
	
	function DeleteProjetoFrmPag($options = array())
	{
    
		if (!$this-> _required(
			Array('projfrmpag_frmpag_id', 'projfrmpag_frmpag_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('projfrmpag_proj_id', 'projfrmpag_proj_id'),
			$options)
		) return false;
		
		$this->db->where('projfrmpag_frmpag_id', $options['projfrmpag_frmpag_id']);
		$this->db->where('projfrmpag_proj_id', $options['projfrmpag_proj_id']);
    	$this->db->delete('projetofrmpag');
	}
}

?>