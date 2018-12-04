<?php

class ProtecoesGrupo_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddProtecoesGrupo($options = array())
	{
		if (!$this-> _required(
			Array('protgrp_grp_id', 'protgrp_grp_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('protgrp_prot_id', 'protgrp_prot_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - protgrp_grp_id
						'protgrp_grp_id' => $options['protgrp_grp_id'],
		
						//integer - protgrp_prot_id
						'protgrp_prot_id' => $options['protgrp_prot_id'],
						
					);
		$this->db->insert('protecoesgrupo', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateProtecoesGrupo($options = array())
	{
		if (!$this-> _required(
			Array('protgrp_grp_id', 'protgrp_grp_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('protgrp_prot_id', 'protgrp_prot_id'),
			$options)
		) return false;
				
		if(isset($options['protgrp_grp_id']))
			$this->db->set('protgrp_grp_id', $options['protgrp_grp_id']);
			
		if(isset($options['protgrp_prot_id']))
			$this->db->set('protgrp_prot_id', $options['protgrp_prot_id']);
		
		$this->db->where('protgrp_grp_id', $options['protgrp_grp_id']);
		$this->db->where('protgrp_prot_id', $options['protgrp_prot_id']);
		$this->db->update('protecoesgrupo');
		
		return $this->db->affected_rows();
	}
	
	function GetProtecoesGrupo($options = array())
	{
		$this->db->join('protecao', 'prot_id = protgrp_prot_id', 'left');
		$this->db->join('grupo', 'grp_id = protgrp_grp_id', 'left');
		
		if(isset($options['prot_loc_id']))
			$this->db->where('prot_loc_id', $options['prot_loc_id']);
		
		if(isset($options['protgrp_grp_id']))
			$this->db->where('protgrp_grp_id', $options['protgrp_grp_id']);
			
		if(isset($options['protgrp_prot_id']))
			$this->db->where('protgrp_prot_id', $options['protgrp_prot_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('protecoesgrupo');

		return $query->result();
	}
	
	function DeleteProtecoesGrupo($options = array())
	{
    
		if (!$this-> _required(
			Array('protgrp_grp_id', 'protgrp_grp_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('protgrp_prot_id', 'protgrp_prot_id'),
			$options)
		) return false;
		
		$this->db->where('protgrp_grp_id', $options['protgrp_grp_id']);
		$this->db->where('protgrp_prot_id', $options['protgrp_prot_id']);
    	$this->db->delete('protecoesgrupo');
	}
}

?>