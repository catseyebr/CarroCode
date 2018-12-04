<?php

class TarifaProtecoes_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddTarifaProtecoes($options = array())
	{
		if (!$this-> _required(
			Array('tarprot_prot_id', 'tarprot_prot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tarprot_valor', 'tarprot_valor'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tarprot_ndiainicial', 'tarprot_ndiainicial'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tarprot_ndiafinal', 'tarprot_ndiafinal'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tarprot_dthcadastro', 'tarprot_dthcadastro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tarprot_dthatualizacao', 'tarprot_dthatualizacao'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tarprot_ativo', 'tarprot_ativo'),
			$options)
		) return false;
		
		$postData = array();
		
		if(isset($options['tarprot_id'])){
			//integer
			$postData['tarprot_id'] = $options['tarprot_id'];
		}
		
		//---------------------------------------------------
		
			//integer
			$postData['tarprot_prot_id'] = $options['tarprot_prot_id'];
		
		//---------------------------------------------------
		
			//float
			$postData['tarprot_valor'] = $options['tarprot_valor'];
		
		//---------------------------------------------------
		
			//integer
			$postData['tarprot_ndiainicial'] = $options['tarprot_ndiainicial'];
		
		//---------------------------------------------------
		
			//integer
			$postData['tarprot_ndiafinal'] = $options['tarprot_ndiafinal'];
		
		//---------------------------------------------------
		
			//integer
			$postData['tarprot_validadeinicial'] = $options['tarprot_validadeinicial'];
		
		//---------------------------------------------------
		
			//integer
			$postData['tarprot_validadefinal'] = $options['tarprot_validadefinal'];
		
		//---------------------------------------------------
		
			//timestamp
			$postData['tarprot_dthcadastro'] = $options['tarprot_dthcadastro'];
		
		//---------------------------------------------------
		
			//timestamp
			$postData['tarprot_dthatualizacao'] = $options['tarprot_dthatualizacao'];
		
		//---------------------------------------------------
		
			//boolean
			$postData['tarprot_ativo'] = $options['tarprot_ativo'];
		
		//---------------------------------------------------
		
		$this->db->insert('tarifaprotecoes', $postData);
		
		if(isset($options['tarprot_id'])){
			if($postData['tarprot_id'] > $this->db->insert_id()){
				$next_sequence = $postData['tarprot_id']+1;
				$this->db->simple_query("ALTER SEQUENCE tarifaprotecoes_tarprot_id_seq RESTART WITH $next_sequence");
			}
			return $postData['tarprot_id'];
		}else{
			return $this->db->insert_id();
		}
	}
	
	function UpdateTarifaProtecoes($options = array())
	{
		if (!$this-> _required(
			Array('tarprot_id', 'tarprot_id'),
			$options)
		) return false;
		
		if(isset($options['tarprot_prot_id']))
			$this->db->set('tarprot_prot_id', $options['tarprot_prot_id']);
			
		if(isset($options['tarprot_valor']))
			$this->db->set('tarprot_valor', $options['tarprot_valor']);
			
		if(isset($options['tarprot_ndiainicial']))
			$this->db->set('tarprot_ndiainicial', $options['tarprot_ndiainicial']);
			
		if(isset($options['tarprot_ndiafinal']))
			$this->db->set('tarprot_ndiafinal', $options['tarprot_ndiafinal']);
			
		if(isset($options['tarprot_validadeinicial']))
			$this->db->set('tarprot_validadeinicial', $options['tarprot_validadeinicial']);
			
		if(isset($options['tarprot_validadefinal']))
			$this->db->set('tarprot_validadefinal', $options['tarprot_validadefinal']);
			
		if(isset($options['tarprot_dthcadastro']))
			$this->db->set('tarprot_dthcadastro', $options['tarprot_dthcadastro']);
			
		if(isset($options['tarprot_dthatualizacao']))
			$this->db->set('tarprot_dthatualizacao', $options['tarprot_dthatualizacao']);
			
		if(isset($options['tarprot_ativo']))
			$this->db->set('tarprot_ativo', $options['tarprot_ativo']);
			
		$this->db->where('tarprot_id', $options['tarprot_id']);
		$this->db->update('tarifaprotecoes');
		
		return $this->db->affected_rows();
	}
	
	function GetTarifaProtecoes($options = array())
	{
		
		if(isset($options['tarprot_id']))
			$this->db->where('tarprot_id', $options['tarprot_id']);
			
		if(isset($options['tarprot_prot_id']))
			$this->db->where('tarprot_prot_id', $options['tarprot_prot_id']);
			
		if(isset($options['tarprot_valor']))
			$this->db->where('tarprot_valor', $options['tarprot_valor']);
			
		if(isset($options['tarprot_ndiainicial']))
			$this->db->where('tarprot_ndiainicial <=', $options['tarprot_ndiainicial']);
			
		if(isset($options['tarprot_ndiafinal']))
			$this->db->where('tarprot_ndiafinal >=', $options['tarprot_ndiafinal']);
			
		if(isset($options['tarprot_validadeinicial']))
			$this->db->where('tarprot_validadeinicial <=', $options['tarprot_validadeinicial']);
			
		if(isset($options['tarprot_validadefinal']))
			$this->db->where('tarprot_validadefinal >=', $options['tarprot_validadefinal']);
			
		if(isset($options['tarprot_dthcadastro']))
			$this->db->where('tarprot_dthcadastro', $options['tarprot_dthcadastro']);
			
		if(isset($options['tarprot_dthatualizacao']))
			$this->db->where('tarprot_dthatualizacao', $options['tarprot_dthatualizacao']);
			
		if(isset($options['tarprot_ativo']))
			$this->db->where('tarprot_ativo', $options['tarprot_ativo']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('tarifaprotecoes');

		if(isset($options['tarprot_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteTarifaProtecoes($options = array())
	{
    
		if (!$this-> _required(
			Array('tarprot_id', 'tarprot_id'),
			$options)
		) return false;
		
		$this->db->where('tarprot_id', $options['tarprot_id']);
    	$this->db->delete('tarifaprotecoes');
	}
}

?>