<?php

class SatisfacaoComplementos_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddSatisfacaoComplementos($options = array())
	{
		if (!$this-> _required(
			Array('sco_cla_id', 'sco_cla_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('sco_csa_id', 'sco_csa_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('sco_sat_id', 'sco_sat_id'),
			$options)
		) return false;
				
		$postData = array(
						//integer - sco_cla_id
						'sco_cla_id' => $options['sco_cla_id'],
		
						//integer - sco_csa_id
						'sco_csa_id' => $options['sco_csa_id'],
		
						//integer - sco_sat_id
						'sco_sat_id' => $options['sco_sat_id'],
		
					);
		$this->db->insert('satisfacaocomplementos', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateSatisfacaoComplementos($options = array())
	{
		if (!$this-> _required(
			Array('sco_cla_id', 'sco_cla_id'),
			$options)
		) return false;
		
		if(isset($options['sco_csa_id']))
			$this->db->set('sco_csa_id', $options['sco_csa_id']);
			
		if(isset($options['sco_sat_id']))
			$this->db->set('sco_sat_id', $options['sco_sat_id']);
			
		$this->db->where('sco_cla_id', $options['sco_cla_id']);
		$this->db->update('satisfacaocomplementos');
		
		return $this->db->affected_rows();
	}
	
	function GetSatisfacaoComplementos($options = array())
	{
		if(isset($options['sco_cla_id']))
			$this->db->where('sco_cla_id', $options['sco_cla_id']);
			
		if(isset($options['sco_csa_id']))
			$this->db->where('sco_csa_id', $options['sco_csa_id']);
			
		if(isset($options['sco_sat_id']))
			$this->db->where('sco_sat_id', $options['sco_sat_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('satisfacaocomplementos');

		if(isset($options['sco_cla_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteSatisfacaoComplementos($options = array())
	{
    
		if (!$this-> _required(
			Array('sco_cla_id', 'sco_cla_id'),
			$options)
		) return false;
		
		$this->db->where('sco_cla_id', $options['sco_cla_id']);
    	$this->db->delete('satisfacaocomplementos');
	}
}

?>