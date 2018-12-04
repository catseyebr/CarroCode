<?php

class TarifaGrupos_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddTarifaGrupos($options = array())
	{
		if (!$this-> _required(
			Array('targrp_grp_id', 'targrp_grp_id'),
			$options)
		) return false;
		
		$postData = array();
		
		if(isset($options['targrp_id']))
			//integer
			$postData['targrp_id'] = $options['targrp_id'];
		
		//---------------------------------------------------
		
			//integer
			$postData['targrp_grp_id'] = $options['targrp_grp_id'];
				
		//---------------------------------------------------
		
		if(isset($options['targrp_ndiainicial'])){
			//integer
			$postData['targrp_ndiainicial'] = $options['targrp_ndiainicial'];
		}else{
			$postData['targrp_ndiainicial'] = '1';
		}
		
		//---------------------------------------------------
		
		if(isset($options['targrp_ndiafinal'])){
			//integer
			$postData['targrp_ndiafinal'] = $options['targrp_ndiafinal'];
		}else{
			$postData['targrp_ndiafinal'] = '1';
		}
		
		//---------------------------------------------------
		
		if(isset($options['targrp_valor'])){
			//integer
			$postData['targrp_valor'] = $options['targrp_valor'];
		}else{
			$postData['targrp_valor'] = 0.00;
		}
		
		//---------------------------------------------------
		
		if(isset($options['targrp_dia_extra'])){
			//integer
			$postData['targrp_dia_extra'] = $options['targrp_dia_extra'];
		}else{
			$postData['targrp_dia_extra'] = 0.00;
		}
		
		//---------------------------------------------------
		
		if(isset($options['targrp_km'])){
			//integer
			$postData['targrp_km'] = $options['targrp_km'];
		}else{
			$postData['targrp_km'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['targrp_validadeinicial'])){
			//integer
			$postData['targrp_validadeinicial'] = $options['targrp_validadeinicial'];
		}else{
			$postData['targrp_validadeinicial'] = date("Y-m-d");
		}
		
		//---------------------------------------------------
		
		if(isset($options['targrp_validadefinal'])){
			//integer
			$postData['targrp_validadefinal'] = $options['targrp_validadefinal'];
		}else{
			$postData['targrp_validadefinal'] = date("Y-m-d");
		}
		
		//---------------------------------------------------
		
		if(isset($options['targrp_dthcadastro'])){
			//integer
			$postData['targrp_dthcadastro'] = $options['targrp_dthcadastro'];
		}else{
			$postData['targrp_dthcadastro'] = date("Y-m-d H:i:s");
		}
		
		//---------------------------------------------------
		
		if(isset($options['targrp_dthatualizacao'])){
			//integer
			$postData['targrp_dthatualizacao'] = $options['targrp_dthatualizacao'];
		}else{
			$postData['targrp_dthatualizacao'] = date("Y-m-d H:i:s");
		}
		
		//---------------------------------------------------
		
		if(isset($options['targrp_ativo'])){
			//boolean
			$postData['targrp_ativo'] = $options['targrp_ativo'];
		}else{
			$postData['targrp_ativo'] = 'f';
		}
		
		//---------------------------------------------------
		
		if(isset($options['targrp_ordem'])){
			//boolean
			$postData['targrp_ordem'] = $options['targrp_ordem'];
		}else{
			$postData['targrp_ordem'] = 2;
		}
		
		//---------------------------------------------------
		
		$this->db->insert('tarifagrupos', $postData);
		
		if(isset($options['targrp_id'])){
			if($postData['targrp_id'] > $this->db->insert_id()){
				$next_sequence = $options['targrp_id']+1;
				$this->db->simple_query("ALTER SEQUENCE tarifagrupos_targrp_id_seq RESTART WITH $next_sequence");
			}
			return $postData['targrp_id'];
		}else{
			return $this->db->insert_id();
		}
	}
	
	function UpdateTarifaGrupos($options = array())
	{
		if (!$this-> _required(
			Array('targrp_id', 'targrp_id'),
			$options)
		) return false;
		
		if(isset($options['targrp_grp_id']))
			$this->db->set('targrp_grp_id', $options['targrp_grp_id']);
			
		if(isset($options['targrp_ndiainicial']))
			$this->db->set('targrp_ndiainicial', $options['targrp_ndiainicial']);
			
		if(isset($options['targrp_ndiafinal']))
			$this->db->set('targrp_ndiafinal', $options['targrp_ndiafinal']);
			
		if(isset($options['targrp_valor']))
			$this->db->set('targrp_valor', $options['targrp_valor']);
			
		if(isset($options['targrp_km']))
			$this->db->set('targrp_km', $options['targrp_km']);
			
		if(isset($options['targrp_validadeinicial']))
			$this->db->set('targrp_validadeinicial', $options['targrp_validadeinicial']);
			
		if(isset($options['targrp_validadefinal']))
			$this->db->set('targrp_validadefinal', $options['targrp_validadefinal']);
			
		if(isset($options['targrp_dthcadastro']))
			$this->db->set('targrp_dthcadastro', $options['targrp_dthcadastro']);
			
		if(isset($options['targrp_dthatualizacao']))
			$this->db->set('targrp_dthatualizacao', $options['targrp_dthatualizacao']);
			
		if(isset($options['targrp_ativo']))
			$this->db->set('targrp_ativo', $options['targrp_ativo']);
			
		$this->db->where('targrp_id', $options['targrp_id']);
		$this->db->update('tarifagrupos');
		
		return $this->db->affected_rows();
	}
	
	function GetTarifaGrupos($options = array())
	{
		if(isset($options['targrp_id']))
			$this->db->where('targrp_id', $options['targrp_id']);
			
		if(isset($options['targrp_grp_id']))
			$this->db->where('targrp_grp_id', $options['targrp_grp_id']);
			
		if(isset($options['targrp_ndiainicial']))
			$this->db->where('targrp_ndiainicial <=', $options['targrp_ndiainicial']);
			
		if(isset($options['targrp_ndiafinal']))
			$this->db->where('targrp_ndiafinal >=', $options['targrp_ndiafinal']);
			
		if(isset($options['targrp_valor']))
			$this->db->where('targrp_valor', $options['targrp_valor']);
			
		if(isset($options['targrp_km']))
			$this->db->where('targrp_km', $options['targrp_km']);
			
		if(isset($options['targrp_validadeinicial']))
			$this->db->where('targrp_validadeinicial <=', $options['targrp_validadeinicial']);
			
		if(isset($options['targrp_validadefinal']))
			$this->db->where('targrp_validadefinal >=', $options['targrp_validadefinal']);
			
		if(isset($options['targrp_dthcadastro']))
			$this->db->where('targrp_dthcadastro', $options['targrp_dthcadastro']);
			
		if(isset($options['targrp_dthatualizacao']))
			$this->db->where('targrp_dthatualizacao', $options['targrp_dthatualizacao']);
			
		if(isset($options['targrp_ativo']))
			$this->db->where('targrp_ativo', $options['targrp_ativo']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('tarifagrupos');

		if(isset($options['targrp_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteTarifaGrupos($options = array())
	{
    
		if (!$this-> _required(
			Array('targrp_id', 'targrp_id'),
			$options)
		) return false;
		
		$this->db->where('targrp_id', $options['targrp_id']);
    	$this->db->delete('tarifagrupos');
	}
}

?>