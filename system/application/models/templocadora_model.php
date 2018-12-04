<?php

class TempLocadora_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddTempLocadora($options = array())
	{
		/*
		if (!$this-> _required(
			Array('temploc_id', 'temploc_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_tlocst_id', 'temploc_tlocst_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_nome', 'temploc_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_cnpj', 'temploc_cnpj'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_telefone', 'temploc_telefone'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_fax', 'temploc_fax'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_tollfree', 'temploc_tollfree'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_email', 'temploc_email'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_nomecon', 'temploc_nomecon'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_funcaocon', 'temploc_funcaocon'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_cep', 'temploc_cep'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_rua', 'temploc_rua'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_bairro', 'temploc_bairro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_uf', 'temploc_uf'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_cidade', 'temploc_cidade'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_dthcadastro', 'temploc_dthcadastro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_ativo', 'temploc_ativo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('temploc_dthprocess', 'temploc_dthprocess'),
			$options)
		) return false;
		*/		
		$postData = array(
						//integer - temploc_tlocst_id
						'temploc_tlocst_id' => $options['temploc_tlocst_id'],
		
						//integer - temploc_nome
						'temploc_nome' => $options['temploc_nome'],
		
						//integer - temploc_cnpj
						'temploc_cnpj' => $options['temploc_cnpj'],
		
						//integer - temploc_telefone
						'temploc_telefone' => $options['temploc_telefone'],
		
						//integer - temploc_fax
						'temploc_fax' => $options['temploc_fax'],
		
						//integer - temploc_tollfree
						'temploc_tollfree' => $options['temploc_tollfree'],
		
						//integer - temploc_email
						'temploc_email' => $options['temploc_email'],
		
						//integer - temploc_nomecon
						'temploc_nomecon' => $options['temploc_nomecon'],
		
						//integer - temploc_funcaocon
						'temploc_funcaocon' => $options['temploc_funcaocon'],
		
						//integer - temploc_cep
						'temploc_cep' => $options['temploc_cep'],
		
						//integer - temploc_rua
						'temploc_rua' => $options['temploc_rua'],
		
						//integer - temploc_bairro
						'temploc_bairro' => $options['temploc_bairro'],
		
						//integer - temploc_uf
						'temploc_uf' => $options['temploc_uf'],
		
						//integer - temploc_cidade
						'temploc_cidade' => $options['temploc_cidade'],
						
						//integer - temploc_dthcadastro
						'temploc_dthcadastro' => $options['temploc_dthcadastro'],
		
						//integer - temploc_ativo
						'temploc_ativo' => $options['temploc_ativo'],
		
						//integer - temploc_dthprocess
						'temploc_dthprocess' => $options['temploc_dthprocess']
		
					);
		$this->db->insert('templocadora', $postData);
		//return $this->db->insert_id();
	}
	
	function UpdateTempLocadora($options = array())
	{
		if (!$this-> _required(
			Array('temploc_id', 'temploc_id'),
			$options)
		) return false;
		
		if(isset($options['temploc_nome']))
			$this->db->set('temploc_nome', $options['temploc_nome']);
			
		$this->db->where('temploc_id', $options['temploc_id']);
		$this->db->update('templocadora');
		
		return $this->db->affected_rows();
	}
	
	function GetTempLocadora($options = array())
	{
		if(isset($options['temploc_id']))
			$this->db->where('temploc_id', $options['temploc_id']);
			
		if(isset($options['temploc_nome']))
			$this->db->where('temploc_nome', $options['temploc_nome']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('templocadora');

		if(isset($options['temploc_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteTempLocadora($options = array())
	{
    
		if (!$this-> _required(
			Array('temploc_id', 'temploc_id'),
			$options)
		) return false;
		
		$this->db->where('temploc_id', $options['temploc_id']);
    	$this->db->delete('templocadora');
	}
}

?>