<?php

class CategoriaHotel_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddCategoriaHotel($options = array())
	{
		if (!$this-> _required(
			Array('cathot_id', 'cathot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cathot_nome', 'cathot_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cathot_ativo', 'cathot_ativo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cathot_nivel', 'cathot_nivel'),
			$options)
		) return false;
		
		$postData = array(
						//integer - cathot_id
						'cathot_id' => $options['cathot_id'],
		
						//char - cathot_nome
						'cathot_nome' => $options['cathot_nome'],
		
						//boolean - cathot_ativo
						'cathot_ativo' => $options['cathot_ativo'],
		
						//integer - cathot_nivel
						'cathot_nivel' => $options['cathot_nivel']
						
					);
		$this->db->insert('categoriahotel', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateCategoriaHotel($options = array())
	{
		if (!$this-> _required(
			Array('cathot_id', 'cathot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cathot_nome', 'cathot_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cathot_ativo', 'cathot_ativo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('cathot_nivel', 'cathot_nivel'),
			$options)
		) return false;
				
		if(isset($options['cathot_nome']))
			$this->db->set('cathot_nome', $options['cathot_nome']);
			
		if(isset($options['cathot_ativo']))
			$this->db->set('cathot_ativo', $options['cathot_ativo']);
			
		if(isset($options['cathot_nivel']))
			$this->db->set('cathot_nivel', $options['cathot_nivel']);
			
		$this->db->where('cathot_id', $options['cathot_id']);
		$this->db->update('categoriahotel');
		
		return $this->db->affected_rows();
	}
	
	function GetCategoriaHotel($options = array())
	{
		if(isset($options['cathot_id']))
			$this->db->where('cathot_id', $options['cathot_id']);
			
		if(isset($options['cathot_nome']))
			$this->db->where('cathot_nome', $options['cathot_nome']);
			
		if(isset($options['cathot_ativo']))
			$this->db->where('cathot_ativo', $options['cathot_ativo']);
			
		if(isset($options['cathot_nivel']))
			$this->db->where('cathot_nivel', $options['cathot_nivel']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('categoriahotel');

		if(isset($options['cathot_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteCategoriaHotel($options = array())
	{
    
		if (!$this-> _required(
			Array('cathot_id', 'cathot_id'),
			$options)
		) return false;
		
		$this->db->where('cathot_id', $options['cathot_id']);
		$this->db->delete('categoriahotel');
	}
}

?>