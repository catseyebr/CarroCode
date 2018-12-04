<?php

class BloqueiosCategorias_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddBloqueiosCategorias($options = array())
	{
		if (!$this-> _required(
			Array('bca_id', 'bca_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_nome', 'bca_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_qtdmindiaria', 'bca_qtdmindiaria'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_qtdescontodiaria', 'bca_qtdescontodiaria'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_dthcadastro', 'bcadthcadastro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_dthatualizacao', 'bca_dthatualizacao'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_ativo', 'bca_ativo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_prioridade', 'bca_prioridade'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_dom', 'bca_dom'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_seg', 'bca_seg'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_ter', 'bca_ter'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_qua', 'bca_qua'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_qui', 'bca_qui'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_sex', 'bca_sex'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_sab', 'bca_sab'),
			$options)
		) return false;
		
		$postData = array(
						//integer - bca_id
						'bca_id' => $options['bca_id'],
		
						//char - bca_nome
						'bca_nome' => $options['bca_nome'],
						
						//integer - bca_qtdmindiaria
						'bca_qtdmindiaria' => $options['bca_qtdmindiaria'],
		
						//integer - bca_qtdescontodiaria
						'bca_qtdescontodiaria' => $options['bca_qtdescontodiaria'],
		
						//date - bca_dthcadastro
						'blo_tarifa' => $options['blo_tarifa'],
		
						//date - bca_dthatualizacao
						'bca_dthatualizacao' => $options['bca_dthatualizacao'],
		
						//boolean - bca_ativo
						'bca_ativo' => $options['bca_ativo'],
		
						//integer - bca_prioridade
						'bca_prioridade' => $options['bca_prioridade'],
		
						//boolean - bca_dom
						'bca_dom' => $options['bca_dom'],
		
						//boolean - bca_seg
						'bca_seg' => $options['bca_seg'],
		
						//boolean - bca_ter
						'bca_ter' => $options['bca_ter'],
		
						//boolean - bca_qua
						'bca_qua' => $options['bca_qua'],
		
						//boolean - bca_qui
						'bca_qui' => $options['bca_qui'],
		
						//boolean - bca_sex
						'bca_sex' => $options['bca_sex'],
		
						//boolean - bca_sab
						'bca_sab' => $options['bca_sab']
		
					);
		$this->db->insert('bloqueioscategorias', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateBloqueiosCategorias($options = array())
	{
		if (!$this-> _required(
			Array('bca_id', 'bca_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_nome', 'bca_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_qtdmindiaria', 'bca_qtdmindiaria'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_qtdescontodiaria', 'bca_qtdescontodiaria'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_dthcadastro', 'bcadthcadastro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_dthatualizacao', 'bca_dthatualizacao'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_ativo', 'bca_ativo'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_prioridade', 'bca_prioridade'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_dom', 'bca_dom'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_seg', 'bca_seg'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_ter', 'bca_ter'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_qua', 'bca_qua'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_qui', 'bca_qui'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_sex', 'bca_sex'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('bca_sab', 'bca_sab'),
			$options)
		) return false;
				
		if(isset($options['bca_nome']))
			$this->db->set('bca_nome', $options['bca_nome']);
			
		if(isset($options['bca_qtdmindiaria']))
			$this->db->set('bca_qtdmindiaria', $options['bca_qtdmindiaria']);
		
		if(isset($options['bca_qtdescontodiaria']))
			$this->db->set('bca_qtdescontodiaria', $options['bca_qtdescontodiaria']);
			
		if(isset($options['bca_dthcadastro']))
			$this->db->set('bca_dthcadastro', $options['bca_dthcadastro']);
			
		if(isset($options['bca_dthatualizacao']))
			$this->db->set('bca_dthatualizacao', $options['bca_dthatualizacao']);
			
		if(isset($options['blo_taxaservico']))
			$this->db->set('blo_taxaservico', $options['blo_taxaservico']);
			
		if(isset($options['bca_ativo']))
			$this->db->set('bca_ativo', $options['bca_ativo']);
			
		if(isset($options['bca_prioridade']))
			$this->db->set('bca_prioridade', $options['bca_prioridade']);
			
		if(isset($options['bca_dom']))
			$this->db->set('bca_dom', $options['bca_dom']);
			
		if(isset($options['bca_seg']))
			$this->db->set('bca_seg', $options['bca_seg']);
			
		if(isset($options['bca_ter']))
			$this->db->set('bca_ter', $options['bca_ter']);
			
		if(isset($options['bca_qua']))
			$this->db->set('bca_qua', $options['bca_qua']);
			
		if(isset($options['bca_qui']))
			$this->db->set('bca_qui', $options['bca_qui']);
			
		if(isset($options['bca_sex']))
			$this->db->set('bca_sex', $options['bca_sex']);
			
		if(isset($options['bca_sab']))
			$this->db->set('bca_sab', $options['bca_sab']);
		
		$this->db->where('bca_id', $options['bca_id']);
		$this->db->update('bloqueioscategorias');
		
		return $this->db->affected_rows();
	}
	
	function GetBloqueiosCategorias($options = array())
	{
		if(isset($options['bca_id']))
			$this->db->where('bca_id', $options['bca_id']);
			
		if(isset($options['bca_nome']))
			$this->db->where('bca_nome', $options['bca_nome']);
		
		if(isset($options['bca_qtdmindiaria']))
			$this->db->where('bca_qtdmindiaria', $options['bca_qtdmindiaria']);
			
		if(isset($options['bca_qtdescontodiaria']))
			$this->db->where('bca_qtdescontodiaria', $options['bca_qtdescontodiaria']);
			
		if(isset($options['bca_dthcadastro']))
			$this->db->where('bca_dthcadastro', $options['bca_dthcadastro']);
			
		if(isset($options['bca_dthatualizacao']))
			$this->db->where('bca_dthatualizacao', $options['bca_dthatualizacao']);
			
		if(isset($options['bca_ativo']))
			$this->db->where('bca_ativo', $options['bca_ativo']);
			
		if(isset($options['bca_prioridade']))
			$this->db->where('bca_prioridade', $options['bca_prioridade']);
			
		if(isset($options['bca_dom']))
			$this->db->where('bca_dom', $options['bca_dom']);
			
		if(isset($options['bca_seg']))
			$this->db->where('bca_seg', $options['bca_seg']);
			
		if(isset($options['bca_ter']))
			$this->db->where('bca_ter', $options['bca_ter']);
			
		if(isset($options['bca_qua']))
			$this->db->where('bca_qua', $options['bca_qua']);
			
		if(isset($options['bca_qui']))
			$this->db->where('bca_qui', $options['bca_qui']);
		
		if(isset($options['bca_sex']))
			$this->db->where('bca_sex', $options['bca_sex']);
		
		if(isset($options['bca_sab']))
			$this->db->where('bca_sab', $options['bca_sab']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('bloqueioscategorias');

		if(isset($options['bca_id']))
		return $query->row(0);
		return $query->result();
	}
	
	function DeleteBloqueiosCategorias($options = array())
	{
    
		if (!$this-> _required(
			Array('bca_id', 'bca_id'),
			$options)
		) return false;
		
		$this->db->where('bca_id', $options['bca_id']);
    	$this->db->delete('bloqueioscategorias');
	}
}

?>