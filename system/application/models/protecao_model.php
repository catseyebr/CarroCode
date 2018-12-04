<?php

class Protecao_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddProtecao($options = array())
	{
		if (!$this-> _required(
			Array('prot_loc_id', 'prot_loc_id'),
			$options)
		) return false;
		
		$postData = array();
		
		if(isset($options['prot_id']))
			//integer
			$postData['prot_id'] = $options['prot_id'];
		
		//---------------------------------------------------
		
			//integer
			$postData['prot_loc_id'] = $options['prot_loc_id'];
		
		//---------------------------------------------------
		
		if(isset($options['prot_nome'])){
			//varchar
			$postData['prot_nome'] = $options['prot_nome'];
		}else{
			$postData['prot_nome'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['prot_desc'])){
			//text
			$postData['prot_desc'] = $options['prot_desc'];
		}else{
			$postData['prot_desc'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['prot_franquia'])){
			//varchar
			$postData['prot_franquia'] = $options['prot_franquia'];
		}else{
			$postData['prot_franquia'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['prot_franquia_terceiros'])){
			//varchar
			$postData['prot_franquia_terceiros'] = $options['prot_franquia_terceiros'];
		}else{
			$postData['prot_franquia_terceiros'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['prot_ota'])){
			//varchar
			$postData['prot_ota'] = $options['prot_ota'];
		}else{
			$postData['prot_ota'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['prot_ordem'])){
			//integer
			$postData['prot_ordem'] = $options['prot_ordem'];
		}else{
			$postData['prot_ordem'] = 1;
		}
		
		//---------------------------------------------------
		
		if(isset($options['prot_ativo'])){
			//boolean
			$postData['prot_ativo'] = $options['prot_ativo'];
		}else{
			$postData['prot_ativo'] = 'f';
		}
		
		//---------------------------------------------------
		
		$this->db->insert('protecao', $postData);
		
		if(isset($options['prot_id'])){
			if($postData['prot_id'] >= $this->db->insert_id()){
				$next_sequence = $postData['prot_id']+1;
				$this->db->simple_query("ALTER SEQUENCE protecao_prot_id_seq RESTART WITH $next_sequence");
			}
			return $postData['prot_id'];
		}else{
			return $this->db->insert_id();
		}
	}
	
	function UpdateProtecao($options = array())
	{
		if (!$this-> _required(
			Array('prot_id', 'prot_id'),
			$options)
		) return false;
		
		if(isset($options['prot_loc_id']))
			$this->db->set('prot_loc_id', $options['prot_loc_id']);
			
		if(isset($options['prot_nome']))
			$this->db->set('prot_nome', $options['prot_nome']);
			
		if(isset($options['prot_desc']))
			$this->db->set('prot_desc', $options['prot_desc']);
			
		if(isset($options['prot_franquia']))
			$this->db->set('prot_franquia', $options['prot_franquia']);
			
		if(isset($options['prot_franquia_terceiros']))
			$this->db->set('prot_franquia_terceiros', $options['prot_franquia_terceiros']);
		
		if(isset($options['prot_ordem']))
			$this->db->set('prot_ordem', $options['prot_ordem']);
		
		if(isset($options['prot_ativo']))
			$this->db->set('prot_ativo', $options['prot_ativo']);
			
		$this->db->where('prot_id', $options['prot_id']);
		$this->db->update('protecao');
		
		return $this->db->affected_rows();
	}
	
	function GetProtecao($options = array())
	{
		if(isset($options['grp_id'])){
			$this->db->join('protecoesgrupo', 'protgrp_prot_id = prot_id', 'left');
			$this->db->where('protgrp_grp_id', $options['grp_id']);
		}
		
		if(isset($options['prot_id']))
			$this->db->where('prot_id', $options['prot_id']);
			
		if(isset($options['prot_loc_id']))
			$this->db->where('prot_loc_id', $options['prot_loc_id']);
			
		if(isset($options['prot_nome']))
			$this->db->where('prot_nome', $options['prot_nome']);
			
		if(isset($options['prot_desc']))
			$this->db->where('prot_desc', $options['prot_desc']);
			
		if(isset($options['prot_franquia']))
			$this->db->where('prot_franquia', $options['prot_franquia']);
			
		if(isset($options['prot_franquia_terceiros']))
			$this->db->where('prot_franquia_terceiros', $options['prot_franquia_terceiros']);
			
		if(isset($options['prot_ordem']))
			$this->db->where('prot_ordem', $options['prot_ordem']);
			
		if(isset($options['prot_ativo']))
			$this->db->where('prot_ativo', $options['prot_ativo']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('protecao');

		if(isset($options['prot_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteProtecao($options = array())
	{
    
		if (!$this-> _required(
			Array('prot_id', 'prot_id'),
			$options)
		) return false;
		
		$this->db->where('prot_id', $options['prot_id']);
    	$this->db->delete('protecao');
	}
}

?>