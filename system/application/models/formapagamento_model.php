<?php

class FormaPagamento_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddFormaPagamento($options = array())
	{
		$postData = array();
		
		if(isset($options['frmpag_id']))
			//integer
			$postData['frmpag_id'] = $options['frmpag_id'];
		
		//---------------------------------------------------
		
		if(isset($options['frmpag_nome'])){
			//varchar
			$postData['frmpag_nome'] = $options['frmpag_nome'];
		}else{
			$postData['frmpag_nome'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['frmpag_classe'])){
			//varchar
			$postData['frmpag_classe'] = $options['frmpag_classe'];
		}else{
			$postData['frmpag_classe'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['frmpag_desc'])){
			//varchar
			$postData['frmpag_desc'] = $options['frmpag_desc'];
		}else{
			$postData['frmpag_desc'] = '';
		}
		
		//---------------------------------------------------
		
		if(isset($options['frmpag_ativo'])){
			//varchar
			$postData['frmpag_ativo'] = $options['frmpag_ativo'];
		}else{
			$postData['frmpag_ativo'] = 'f';
		}
		
		//---------------------------------------------------
		
		$this->db->insert('formapagamento', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateFormaPagamento($options = array())
	{
		if (!$this-> _required(
			Array('frmpag_id', 'frmpag_id'),
			$options)
		) return false;
			
		if(isset($options['frmpag_nome']))
			$this->db->set('frmpag_nome', $options['frmpag_nome']);
			
		if(isset($options['frmpag_classe']))
			$this->db->set('frmpag_classe', $options['frmpag_classe']);
		
		if(isset($options['frmpag_desc']))
			$this->db->set('frmpag_desc', $options['frmpag_desc']);
			
		if(isset($options['frmpag_ativo']))
			$this->db->set('frmpag_ativo', $options['frmpag_ativo']);
			
		$this->db->where('frmpag_id', $options['frmpag_id']);
		$this->db->update('formapagamento');
		
		return $this->db->affected_rows();
	}
	
	function GetFormaPagamento($options = array())
	{
		if(isset($options['frmpag_id']))
			$this->db->where('frmpag_id', $options['frmpag_id']);
			
		if(isset($options['frmpag_nome']))
			$this->db->where('frmpag_nome', $options['frmpag_nome']);
			
		if(isset($options['frmpag_classe']))
			$this->db->where('frmpag_classe', $options['frmpag_classe']);
			
		if(isset($options['frmpag_desc']))
			$this->db->where('frmpag_desc', $options['frmpag_desc']);
			
		if(isset($options['frmpag_ativo']))
			$this->db->where('frmpag_ativo', $options['frmpag_ativo']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('formapagamento');

		if(isset($options['frmpag_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function GetFormaPagamentoId($options = array())
	{
		if(isset($options['frmpag_classe']))
			$this->db->like('frmpag_classe', $options['frmpag_classe']);
			
		$query = $this->db->get('formapagamento');
		
		if ($query->row(0) != NULL){
			return $query->row(0)->frmpag_id;
		}else{
			return false;
		}
	}
	
	function DeleteFormaPagamento($options = array())
	{
    
		if (!$this-> _required(
			Array('frmpag_id', 'frmpag_id'),
			$options)
		) return false;
		
		$this->db->where('frmpag_id', $options['frmpag_id']);
    	$this->db->delete('formapagamento');
	}
}

?>