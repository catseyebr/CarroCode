<?php

class Hotel_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddHotel($options = array())
	{
		if (!$this-> _required(
			Array('hot_id', 'hot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hot_cathot_id', 'hot_cathot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hot_dthcadastro', 'hot_dthcadastro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hot_dthatualizacao', 'hot_dthatualizacao'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hot_noshow', 'hot_noshow'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hot_idadecrianca', 'hot_idadecrianca'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hot_cnpj_id', 'hot_cnpj_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hot_permalink', 'hot_permalink'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hot_ativo', 'hot_ativo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hot_met_id', 'hot_met_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hot_nome', 'hot_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hot_descricao', 'hot_descricao'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hot_termosuso', 'hot_termosuso'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hot_checkin', 'hot_checkin'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('hot_checkout', 'hot_checkout'),
			$options)
		) return false;
		
		$postData = array(
						//integer - hot_id
						'hot_id' => $options['hot_id'],
		
						//integer - hot_cathot_id
						'hot_cathot_id' => $options['hot_cathot_id'],
		
						//date - hot_dthcadastro
						'hot_dthcadastro' => $options['hot_dthcadastro'],
		
						//date - hot_dthatualizacao
						'hot_dthatualizacao' => $options['hot_dthatualizacao'],
		
						//integer - hot_noshow
						'hot_noshow' => $options['hot_noshow'],
		
						//integer - hot_idadecrianca
						'hot_idadecrianca' => $options['hot_idadecrianca'],
		
						//integer - hot_cnpj_id
						'hot_cnpj_id' => $options['hot_cnpj_id'],
		
						//char - hot_permalink
						'hot_permalink' => $options['hot_permalink'],
		
						//boolean - hot_ativo
						'hot_ativo' => $options['hot_ativo'],
		
						//integer - hot_met_id
						'hot_met_id' => $options['hot_met_id'],
			
						//char - hot_nome
						'hot_nome' => $options['hot_nome'],
		
						//text - hot_descricao
						'hot_descricao' => $options['hot_descricao'],
		
						//text - hot_termosuso
						'hot_termosuso' => $options['hot_termosuso'],
		
						//date - hot_checkin
						'hot_checkin' => $options['hot_checkin'],
		
						//date - hot_checkout
						'hot_checkout' => $options['hot_checkout']
						
					);
		$this->db->insert('hotel', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateHotel($options = array())
	{
		if (!$this-> _required(
			Array('hot_id', 'hot_id'),
			$options)
		) return false;
				
		if(isset($options['hot_cathot_id']))
			$this->db->set('hot_cathot_id', $options['hot_cathot_id']);
		
		if(isset($options['hot_dthcadastro']))
			$this->db->set('hot_dthcadastro', $options['hot_dthcadastro']);
			
		if(isset($options['hot_dthatualizacao']))
			$this->db->set('hot_dthatualizacao', $options['hot_dthatualizacao']);
			
		if(isset($options['hot_noshow']))
			$this->db->set('hot_noshow', $options['hot_noshow']);
			
		if(isset($options['hot_idadecrianca']))
			$this->db->set('hot_idadecrianca', $options['hot_idadecrianca']);
			
		if(isset($options['hot_cnpj_id']))
			$this->db->set('hot_cnpj_id', $options['hot_cnpj_id']);
			
		if(isset($options['hot_dthatualizacao']))
			$this->db->set('hot_dthatualizacao', $options['hot_dthatualizacao']);
			
		if(isset($options['hot_dthatualizacao']))
			$this->db->set('hot_dthatualizacao', $options['hot_dthatualizacao']);
			
		if(isset($options['hot_dthatualizacao']))
			$this->db->set('hot_dthatualizacao', $options['hot_dthatualizacao']);
			
		if(isset($options['hot_dthatualizacao']))
			$this->db->set('hot_dthatualizacao', $options['hot_dthatualizacao']);
			
		if(isset($options['hot_dthatualizacao']))
			$this->db->set('hot_dthatualizacao', $options['hot_dthatualizacao']);
			
		if(isset($options['hot_dthatualizacao']))
			$this->db->set('hot_dthatualizacao', $options['hot_dthatualizacao']);
			
		if(isset($options['hot_dthatualizacao']))
			$this->db->set('hot_dthatualizacao', $options['hot_dthatualizacao']);
			
		if(isset($options['hot_dthatualizacao']))
			$this->db->set('hot_dthatualizacao', $options['hot_dthatualizacao']);
			
		if(isset($options['hot_dthatualizacao']))
			$this->db->set('hot_dthatualizacao', $options['hot_dthatualizacao']);
		
		$this->db->where('hot_id', $options['hot_id']);
		$this->db->update('hotel');
		
		return $this->db->affected_rows();
	}
	
	function GetHotel($options = array())
	{
		if(isset($options['hot_id']))
			$this->db->where('hot_id', $options['hot_id']);
			
		if(isset($options['hot_cathot_id']))
			$this->db->where('hot_cathot_id', $options['hot_cathot_id']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('hotel');

		if(isset($options['hot_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteHotel($options = array())
	{
    
		if (!$this-> _required(
			Array('hot_id', 'hot_id'),
			$options)
		) return false;
		
		$this->db->where('hot_id', $options['hot_id']);
    	$this->db->delete('hotel');
	}
}

?>