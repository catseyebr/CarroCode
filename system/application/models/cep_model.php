<?php

class Cep_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddCep($options = array())
	{
		if (!$this-> _required(
			Array('cep_city_id', 'cep_city_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cep_rua', 'cep_rua'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cep_bairro', 'cep_bairro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cep_codigo', 'cep_codigo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cep_compl', 'cep_compl'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cep_tipo', 'cep_tipo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cep_uf_id', 'cep_uf_id'),
			$options)
		) return false;
		
		$postData = array(
						//integer - cep_city_id
						'cep_city_id' => $options['cep_city_id'],
		
						//varchar - cep_rua
						'cep_rua' => $options['cep_rua'],
		
						//varchar - cep_bairro
						'cep_bairro' => $options['cep_bairro'],
		
						//char - cep_codigo
						'cep_codigo' => $options['cep_codigo'],
		
						//varchar - cep_compl
						'cep_compl' => $options['cep_compl'],
		
						//varchar - cep_tipo
						'cep_tipo' => $options['cep_tipo'],
		
						//integer - cep_uf_id
						'cep_uf_id' => $options['cep_uf_id']
						
					);
		$this->db->insert('cep', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateCep($options = array())
	{
		if (!$this-> _required(
			Array('cep_id', 'cep_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cep_city_id', 'cep_city_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cep_rua', 'cep_rua'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cep_bairro', 'cep_bairro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cep_codigo', 'cep_codigo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cep_compl', 'cep_compl'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cep_tipo', 'cep_tipo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cep_uf_id', 'cep_uf_id'),
			$options)
		) return false;
				
		if(isset($options['cep_city_id']))
			$this->db->set('cep_city_id', $options['cep_city_id']);
			
		if(isset($options['cep_rua']))
			$this->db->set('cep_rua', $options['cep_rua']);
			
		if(isset($options['cep_bairro']))
			$this->db->set('cep_bairro', $options['cep_bairro']);
			
		if(isset($options['cep_codigo']))
			$this->db->set('cep_codigo', $options['cep_codigo']);
			
		if(isset($options['cep_compl']))
			$this->db->set('cep_compl', $options['cep_compl']);
			
		if(isset($options['cep_tipo']))
			$this->db->set('cep_tipo', $options['cep_tipo']);
			
		if(isset($options['cep_uf_id']))
			$this->db->set('cep_uf_id', $options['cep_uf_id']);
			
		$this->db->where('cep_id', $options['cep_id']);
		$this->db->update('cep');
		
		return $this->db->affected_rows();
	}
	
	function GetCep($options = array())
	{
		$this->db->join('bairro', 'bai_id = cep_bairro', 'left');
		
		if(isset($options['cep_id']))
			$this->db->where('cep_id', $options['cep_id']);
			
		if(isset($options['cep_city_id']))
			$this->db->where('cep_city_id', $options['cep_city_id']);
			
		if(isset($options['cep_rua']))
			$this->db->where('cep_rua', $options['cep_rua']);
			
		if(isset($options['cep_bairro']))
			$this->db->where('cep_bairro', $options['cep_bairro']);
			
		if(isset($options['cep_codigo']))
			$this->db->where('cep_codigo', $options['cep_codigo']);
			
		if(isset($options['cep_compl']))
			$this->db->where('cep_compl', $options['cep_compl']);
			
		if(isset($options['cep_tipo']))
			$this->db->where('cep_tipo', $options['cep_tipo']);
			
		if(isset($options['cep_uf_id']))
			$this->db->where('cep_uf_id', $options['cep_uf_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('cep');

		if(isset($options['cep_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteCep($options = array())
	{
    
		if (!$this-> _required(
			Array('cep_id', 'cep_id'),
			$options)
		) return false;
		
		$this->db->where('cep_id', $options['cep_id']);
		$this->db->delete('cep');
	}
}

?>