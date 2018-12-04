<?php

class PjFormaPagamento_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddPjFormaPagamento($options = array())
	{
		if (!$this-> _required(
			Array('pjfrmpag_frmpag_id', 'pjfrmpag_frmpag_id'),
			$options)
		) return false;
		
		if (!$this-> _required(
			Array('pjfrmpag_cnpj_id', 'pjfrmpag_cnpj_id'),
			$options)
		) return false;
		
		$postData = array();
		
		$postData['pjfrmpag_frmpag_id'] = $options['pjfrmpag_frmpag_id'];
		
		//---------------------------------------------------
		
		$postData['pjfrmpag_cnpj_id'] = $options['pjfrmpag_cnpj_id'];
		
		//---------------------------------------------------
		
		if(isset($options['pjfrmpag_minima'])){
			//float
			$postData['pjfrmpag_minima'] = $options['pjfrmpag_minima'];
		}else{
			$postData['pjfrmpag_minima'] = NULL;
		}
		
		//---------------------------------------------------
		if(isset($options['pjfrmpag_parcelas'])){
			//integer
			$postData['pjfrmpag_parcelas'] = $options['pjfrmpag_parcelas'];
		}else{
			$postData['pjfrmpag_parcelas'] = NULL;
		}
		
		//---------------------------------------------------
		if(isset($options['pjfrmpag_obs'])){
			//text
			$postData['pjfrmpag_obs'] = $options['pjfrmpag_obs'];
		}else{
			$postData['pjfrmpag_obs'] = NULL;
		}
		
		//---------------------------------------------------
		
		$this->db->insert('pjformapagamento', $postData);
		return $this->db->insert_id();
	}
	
	function UpdatePjFormaPagamento($options = array())
	{
		if (!$this-> _required(
			Array('pjfrmpag_frmpag_id', 'pjfrmpag_frmpag_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('pjfrmpag_cnpj_id', 'pjfrmpag_cnpj_id'),
			$options)
		) return false;
				
		if(isset($options['pjfrmpag_frmpag_id']))
			$this->db->set('pjfrmpag_frmpag_id', $options['pjfrmpag_frmpag_id']);
			
		if(isset($options['pjfrmpag_cnpj_id']))
			$this->db->set('pjfrmpag_cnpj_id', $options['pjfrmpag_cnpj_id']);
		
		$this->db->where('pjfrmpag_frmpag_id', $options['pjfrmpag_frmpag_id']);
		$this->db->where('pjfrmpag_cnpj_id', $options['pjfrmpag_cnpj_id']);
		$this->db->update('pjformapagamento');
		
		return $this->db->affected_rows();
	}
	
	function GetPjFormaPagamento($options = array())
	{
		$this->db->join('formapagamento', 'frmpag_id = pjfrmpag_frmpag_id', 'left');
		
		if(isset($options['pjfrmpag_frmpag_id']))
			$this->db->where('pjfrmpag_frmpag_id', $options['pjfrmpag_frmpag_id']);
			
		if(isset($options['pjfrmpag_cnpj_id']))
			$this->db->where('pjfrmpag_cnpj_id', $options['pjfrmpag_cnpj_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('pjformapagamento');

		return $query->result();
	}
	
	function DeletePjFormaPagamento($options = array())
	{
    
		if (!$this-> _required(
			Array('pjfrmpag_frmpag_id', 'pjfrmpag_frmpag_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('pjfrmpag_cnpj_id', 'pjfrmpag_cnpj_id'),
			$options)
		) return false;
		
		$this->db->where('pjfrmpag_frmpag_id', $options['pjfrmpag_frmpag_id']);
		$this->db->where('pjfrmpag_cnpj_id', $options['pjfrmpag_cnpj_id']);
    	$this->db->delete('pjformapagamento');
	}
}

?>