<?php

class CategoriasApartamentos_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddCategoriasApartamentos($options = array())
	{
		if (!$this-> _required(
			Array('cap_id', 'cap_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cap_nome', 'cap_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cap_descricao', 'cap_descricao'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cap_ativo', 'cap_ativo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cap_qtdpessoas', 'cap_qtdpessoas'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cap_ordem', 'cap_ordem'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cap_permalink', 'cap_permalink'),
			$options)
		) return false;
		
		$postData = array(
						//integer - cap_id
						'cap_id' => $options['cap_id'],
		
						//text - cap_nome
						'cap_nome' => $options['cap_nome'],
		
						//text - cap_descricao
						'cap_descricao' => $options['cap_descricao'],
		
						//boolean - cap_ativo
						'cap_ativo' => $options['cap_ativo'],
		
						//integer - cap_qtdpessoas
						'cap_qtdpessoas' => $options['cap_qtdpessoas'],
		
						//integer - cap_ordem
						'cap_ordem' => $options['cap_ordem'],
		
						//char - cap_permalink
						'cap_permalink' => $options['cap_permalink']
						
					);
		$this->db->insert('categoriasapartamentos', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateCategoriasApartamentos($options = array())
	{
		if (!$this-> _required(
			Array('cap_id', 'cap_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cap_nome', 'cap_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cap_descricao', 'cap_descricao'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cap_ativo', 'cap_ativo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cap_qtdpessoas', 'cap_qtdpessoas'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cap_ordem', 'cap_ordem'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cap_permalink', 'cap_permalink'),
			$options)
		) return false;
				
		if(isset($options['cap_nome']))
			$this->db->set('cap_nome', $options['cap_nome']);
			
		if(isset($options['cap_descricao']))
			$this->db->set('cap_descricao', $options['cap_descricao']);
			
		if(isset($options['cap_ativo']))
			$this->db->set('cap_ativo', $options['cap_ativo']);
			
		if(isset($options['cap_qtdpessoas']))
			$this->db->set('cap_qtdpessoas', $options['cap_qtdpessoas']);
			
		if(isset($options['cap_ordem']))
			$this->db->set('cap_ordem', $options['cap_ordem']);
			
		if(isset($options['cap_permalink']))
			$this->db->set('cap_permalink', $options['cap_permalink']);
			
		$this->db->where('cap_id', $options['cap_id']);
		$this->db->update('categoriasapartamentos');
		
		return $this->db->affected_rows();
	}
	
	function GetCategoriasApartamentos($options = array())
	{
		if(isset($options['cap_id']))
			$this->db->where('cap_id', $options['cap_id']);
			
		if(isset($options['cap_nome']))
			$this->db->where('cap_nome', $options['cap_nome']);
			
		if(isset($options['cap_descricao']))
			$this->db->where('cap_descricao', $options['cap_descricao']);
			
		if(isset($options['cap_ativo']))
			$this->db->where('cap_ativo', $options['cap_ativo']);
			
		if(isset($options['cap_qtdepessoas']))
			$this->db->where('cap_qtdepessoas', $options['cap_qtdepessoas']);
			
		if(isset($options['cap_ordem']))
			$this->db->where('cap_ordem', $options['cap_ordem']);
			
		if(isset($options['cap_permalink']))
			$this->db->where('cap_permalink', $options['cap_permalink']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('categoriasapartamentos');

		if(isset($options['cap_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteCategoriasApartamentos($options = array())
	{
    
		if (!$this-> _required(
			Array('cap_id', 'cap_id'),
			$options)
		) return false;
		
		$this->db->where('cap_id', $options['cap_id']);
		$this->db->delete('categoriasapartamentos');
	}
}

?>