<?php

class Classificacao_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddClassificacao($options = array())
	{
		if (!$this-> _required(
			Array('cla_id', 'cla_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cla_nome', 'cla_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cla_valor', 'cla_valor'),
			$options)
		) return false;
				
		$postData = array(
						//integer - cla_id
						'cla_id' => $options['cla_id'],
		
						//char - cla_nome
						'cla_nome' => $options['cla_nome'],
		
						//integer - cla_valor
						'cla_valor' => $options['cla_valor']
						
					);
		$this->db->insert('classificacao', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateClassificacao($options = array())
	{
		if (!$this-> _required(
			Array('cla_id', 'cla_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cla_nome', 'cla_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cla_valor', 'cla_valor'),
			$options)
		) return false;
				
		if(isset($options['cla_nome']))
			$this->db->set('cla_nome', $options['cla_nome']);
			
		if(isset($options['cla_valor']))
			$this->db->set('cla_valor', $options['cla_valor']);
			
		$this->db->where('cla_id', $options['cla_id']);
		$this->db->update('classificacao');
		
		return $this->db->affected_rows();
	}
	
	function GetClassificacao($options = array())
	{
		if(isset($options['cla_id']))
			$this->db->where('cla_id', $options['cla_id']);
			
		if(isset($options['cla_nome']))
			$this->db->where('cla_nome', $options['cla_nome']);
			
		if(isset($options['cla_valor']))
			$this->db->where('cla_valor', $options['cla_valor']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('classificacao');

		if(isset($options['cla_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteClassificacao($options = array())
	{
    
		if (!$this-> _required(
			Array('cla_id', 'cla_id'),
			$options)
		) return false;
		
		$this->db->where('cla_id', $options['cla_id']);
		$this->db->delete('classificacao');
	}
}

?>