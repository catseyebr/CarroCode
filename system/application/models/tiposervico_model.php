<?php

class TipoServico_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddTipoServico($options = array())
	{
		if (!$this-> _required(
			Array('tse_id', 'tse_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tse_nome', 'tse_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tse_descricao', 'tse_descricao'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('tse_ativo', 'tse_ativo'),
			$options)
		) return false;
						
		$postData = array(
						//integer - tse_id
						'tse_id' => $options['tse_id'],
		
						//char - tse_nome
						'tse_nome' => $options['tse_nome'],
		
						//char - tse_descricao
						'tse_descricao' => $options['tse_descricao'],
		
						//boolean - tse_ativo
						'tse_ativo' => $options['tse_ativo']
		
					);
		$this->db->insert('tiposervico', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateTipoServico($options = array())
	{
		if (!$this-> _required(
			Array('tse_id', 'tse_id'),
			$options)
		) return false;
		
		if(isset($options['tse_nome']))
			$this->db->set('tse_nome', $options['tse_nome']);
			
		if(isset($options['tse_descricao']))
			$this->db->set('tse_descricao', $options['tse_descricao']);
			
		if(isset($options['tse_ativo']))
			$this->db->set('tse_ativo', $options['tse_ativo']);
			
		$this->db->where('tse_id', $options['tse_id']);
		$this->db->update('tiposervico');
		
		return $this->db->affected_rows();
	}
	
	function GetTipoServico($options = array())
	{
		if(isset($options['tse_id']))
			$this->db->where('tse_id', $options['tse_id']);
			
		if(isset($options['tse_nome']))
			$this->db->where('tse_nome', $options['tse_nome']);
			
		if(isset($options['tse_descricao']))
			$this->db->where('tse_descricao', $options['tse_descricao']);
			
		if(isset($options['tse_ativo']))
			$this->db->where('tse_ativo', $options['tse_ativo']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('tiposervico');

		if(isset($options['tse_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteTipoServico($options = array())
	{
    
		if (!$this-> _required(
			Array('tse_id', 'tse_id'),
			$options)
		) return false;
		
		$this->db->where('tse_id', $options['tse_id']);
    	$this->db->delete('tiposervico');
	}
}

?>