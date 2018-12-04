<?php

class ReservasCarros_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddReservasCarros($options = array())
	{
		if (!$this-> _required(
			Array('rescar_id', 'rescar_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_status', 'rescar_status'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_rescarconf_id', 'rescar_rescarconf_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_ciaarea_cod', 'rescar_ciaarea_cod'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_cli_id', 'rescar_cli_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_usu_id_operador', 'rescar_usu_id_operador'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_usuem_id', 'rescar_usuem_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_loj_id_retirar', 'rescar_loj_id_retirar'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_loj_id_devolver', 'rescar_loj_id_devolver'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_prot_id', 'rescar_prot_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_grp_id', 'rescar_grp_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_loc_id', 'rescar_loc_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_data_retirar', 'rescar_data_retirar'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_obs', 'rescar_obs'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_data_devolver', 'rescar_data_devolver'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_diarias', 'rescar_diarias'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_horas_extra', 'rescar_horas_extra'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_diarias_extra', 'rescar_diarias_extra'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_opcionais_array', 'rescar_opcionais_array'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_vlr_diarias', 'rescar_vlr_diarias'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_vlr_protecao', 'rescar_vlr_protecao'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_vlr_hora_extra', 'rescar_vlr_hora_extra'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_vlr_taxas', 'rescar_vlr_taxas'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_vlr_opcionais', 'rescar_vlr_opcionais'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_vlr_total', 'rescar_vlr_total'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_dthcadastro', 'rescar_dthcadastro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_dthatualizacao', 'rescar_dthatualizacao'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_stur', 'rescar_stur'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescar_voo_nmb', 'rescar_voo_nmb'),
			$options)
		) return false;
				
		$postData = array(
						//integer - rescar_id
						'rescar_id' => $options['rescar_id'],
		
						//integer - rescar_status
						'rescar_status' => $options['rescar_status'],
		
						//integer - rescasr_rescarconf_id
						'rescar_rescarconf_id' => $options['rescar_rescarconf_id'],
		
						//char - rescar_ciaaerea_cod
						'rescar_ciaaerea_cod' => $options['rescar_ciaaerea_cod'],
		
						//integer - rescar_cli_id
						'rescar_cli_id' => $options['rescar_cli_id'],
		
						//integer - rescar_usu_id_operador
						'rescar_usu_id_operador' => $options['rescar_usu_id_operador'],
		
						//integer - rescar_usuem_id
						'rescar_usuem_id' => $options['rescar_usuem_id'],
		
						//integer - rescar_loj_id_retirar
						'rescar_loj_id_retirar' => $options['rescar_loj_id_retirar'],
		
						//integer - rescar_loj_id_devolver
						'rescar_loj_id_devolver' => $options['rescar_loj_id_devolver'],
		
						//integer - rescar_prot_id
						'rescar_prot_id' => $options['rescar_prot_id'],
		
						//integer - rescar_grp_id
						'rescar_grp_id' => $options['rescar_grp_id'],
		
						//integer - rescar_loc_id
						'rescar_loc_id' => $options['rescar_loc_id'],
		
						//date - rescar_data_retirar
						'rescar_data_retirar' => $options['rescar_data_retirar'],
		
						//date - rescar_data_devolver
						'rescar_data_devolver' => $options['rescar_data_devolver'],
		
						//integer - rescar_diarias
						'rescar_diarias' => $options['rescar_diarias'],
		
						//integer - rescar_horas_extra
						'rescar_horas_extra' => $options['rescar_horas_extra'],
		
						//integer - rescar_diarias_extra
						'rescar_diarias_extra' => $options['rescar_diarias_extra'],
		
						//varchar - rescar_opcionais_array
						'rescar_opcionais_array' => $options['rescar_opcionais_array'],
		
						//numeric(10,2) - rescar_vlr_diarias
						'rescar_vlr_diarias' => $options['rescar_vlr_diarias'],
		
						//numeric(10,2) - rescar_vlr_protecao
						'rescar_vlr_protecao' => $options['rescar_vlr_protecao'],
		
						//numeric(10,2) - rescar_vlr_hora_extra
						'rescar_vlr_hora_extra' => $options['rescar_vlr_hora_extra'],
		
						//numeric(10,2) - rescar_vlr_taxas
						'rescar_vlr_taxas' => $options['rescar_vlr_taxas'],
		
						//numeric(10,2) - rescar_vlr_opcionais
						'rescar_vlr_opcionais' => $options['rescar_vlr_opcionais'],
		
						//numeric(10,2) - rescar_vlr_total
						'rescar_vlr_total' => $options['rescar_vlr_total'],
		
						//date - rescar_dthcadastro
						'rescar_dthcadastro' => $options['rescar_dthcadastro'],
		
						//date - rescar_dthatualizacao
						'rescar_dthatualizacao' => $options['rescar_dthatualizacao'],
		
						//integer - rescar_stur
						'rescar_stur' => $options['rescar_stur'],
		
						//integer - rescar_voo_nmb
						'rescar_voo_nmb' => $options['rescar_voo_nmb'],
		
					);
		$this->db->insert('reservascarros', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateReservasCarros($options = array())
	{
		if (!$this-> _required(
			Array('rescar_id', 'rescar_id'),
			$options)
		) return false;
		
		if(isset($options['rescar_status']))
			$this->db->set('rescar_status', $options['rescar_status']);
			
		if(isset($options['rescar_rescarconf_id']))
			$this->db->set('rescar_rescarconf_id', $options['rescar_rescarconf_id']);
			
		if(isset($options['rescar_ciaaerea_cod']))
			$this->db->set('rescar_ciaaerea_cod', $options['rescar_ciaaerea_cod']);
			
		if(isset($options['rescar_cli_id']))
			$this->db->set('rescar_cli_id', $options['rescar_cli_id']);
			
		if(isset($options['rescar_usu_id_operador']))
			$this->db->set('rescar_usu_id_operador', $options['rescar_usu_id_operador']);
			
		if(isset($options['rescar_usuem_id']))
			$this->db->set('rescar_usuem_id', $options['rescar_usuem_id']);
			
		if(isset($options['rescar_loj_id_retirar']))
			$this->db->set('rescar_loj_id_retirar', $options['rescar_loj_id_retirar']);
			
		if(isset($options['rescar_loj_id_devolver']))
			$this->db->set('rescar_loj_id_devolver', $options['rescar_loj_id_devolver']);
			
		if(isset($options['rescar_prot_id']))
			$this->db->set('rescar_prot_id', $options['rescar_prot_id']);
			
		if(isset($options['rescar_grp_id']))
			$this->db->set('rescar_grp_id', $options['rescar_grp_id']);
			
		if(isset($options['rescar_loc_id']))
			$this->db->set('rescar_loc_id', $options['rescar_loc_id']);
			
		if(isset($options['rescar_data_retirar']))
			$this->db->set('rescar_data_retirar', $options['rescar_data_retirar']);
			
		if(isset($options['rescar_data_devolver']))
			$this->db->set('rescar_data_devolver', $options['rescar_data_devolver']);
			
		if(isset($options['rescar_diarias']))
			$this->db->set('rescar_diarias', $options['rescar_diarias']);
			
		if(isset($options['rescar_horas_extra']))
			$this->db->set('rescar_horas_extra', $options['rescar_horas_extra']);
			
		if(isset($options['rescar_diarias_extra']))
			$this->db->set('rescar_diarias_extra', $options['rescar_diarias_extra']);
			
		if(isset($options['rescar_opcionais_array']))
			$this->db->set('rescar_opcionais_array', $options['rescar_opcionais_array']);
			
		if(isset($options['rescar_vlr_diarias']))
			$this->db->set('rescar_vlr_diarias', $options['rescar_vlr_diarias']);
			
		if(isset($options['rescar_vlr_protecao']))
			$this->db->set('rescar_vlr_protecao', $options['rescar_vlr_protecao']);
			
		if(isset($options['rescar_vlr_hora_extra']))
			$this->db->set('rescar_vlr_hora_extra', $options['rescar_vlr_hora_extra']);
			
		if(isset($options['rescar_vlr_taxas']))
			$this->db->set('rescar_vlr_taxas', $options['rescar_vlr_taxas']);
			
		if(isset($options['rescar_vlr_opcionais']))
			$this->db->set('rescar_vlr_opcionais', $options['rescar_vlr_opcionais']);
			
		if(isset($options['rescar_vlr_total']))
			$this->db->set('rescar_vlr_total', $options['rescar_vlr_total']);
			
		if(isset($options['rescar_dthcadastro']))
			$this->db->set('rescar_dthcadastro', $options['rescar_dthcadastro']);
			
		if(isset($options['rescar_dthatualizacao']))
			$this->db->set('rescar_dthatualizacao', $options['rescar_dthatualizacao']);
			
		if(isset($options['rescar_stur']))
			$this->db->set('rescar_stur', $options['rescar_stur']);
			
		if(isset($options['rescar_voo_nmb']))
			$this->db->set('rescar_voo_nmb', $options['rescar_voo_nmb']);
			
		$this->db->where('rescar_id', $options['rescar_id']);
		$this->db->update('reservascarros');
		
		return $this->db->affected_rows();
	}
	
	function GetReservasCarros($options = array())
	{
		if(isset($options['rescar_id']))
			$this->db->where('rescar_id', $options['rescar_id']);
			
		if(isset($options['rescar_status']))
			$this->db->where('rescar_status', $options['rescar_status']);
			
		if(isset($options['rescar_rescarconf_id']))
			$this->db->where('rescar_rescarconf_id', $options['rescar_rescarconf_id']);
			
		if(isset($options['rescar_ciaaerea_cod']))
			$this->db->where('rescar_ciaaerea_cod', $options['rescar_ciaaerea_cod']);
			
		if(isset($options['rescar_cli_id']))
			$this->db->where('rescar_cli_id', $options['rescar_cli_id']);
			
		if(isset($options['rescar_usu_id_operador']))
			$this->db->where('rescar_usu_id_operador', $options['rescar_usu_id_operador']);
			
		if(isset($options['rescar_usuem_id']))
			$this->db->where('rescar_usuem_id', $options['rescar_usuem_id']);
			
		if(isset($options['rescar_loj_id_retirar']))
			$this->db->where('rescar_loj_id_retirar', $options['rescar_loj_id_retirar']);
			
		if(isset($options['rescar_loj_id_devolver']))
			$this->db->where('rescar_loj_id_devolver', $options['rescar_loj_id_devolver']);
			
		if(isset($options['rescar_prot_id']))
			$this->db->where('rescar_prot_id', $options['rescar_prot_id']);
			
		if(isset($options['rescar_grp_id']))
			$this->db->where('rescar_grp_id', $options['rescar_grp_id']);
			
		if(isset($options['rescar_loc_id']))
			$this->db->where('rescar_loc_id', $options['rescar_loc_id']);
			
		if(isset($options['rescar_data_retirar']))
			$this->db->where('rescar_data_retirar', $options['rescar_data_retirar']);
			
		if(isset($options['rescar_data_devolver']))
			$this->db->where('rescar_data_devolver', $options['rescar_data_devolver']);
			
		if(isset($options['rescar_diarias']))
			$this->db->where('rescar_diarias', $options['rescar_diarias']);
			
		if(isset($options['rescar_horas_extra']))
			$this->db->where('rescar_horas_extra', $options['rescar_horas_extra']);
			
		if(isset($options['rescar_diarias_extra']))
			$this->db->where('rescar_diarias_extra', $options['rescar_diarias_extra']);
			
		if(isset($options['rescar_opcionais_array']))
			$this->db->where('rescar_opcionais_array', $options['rescar_opcionais_array']);
			
		if(isset($options['rescar_vlr_diarias']))
			$this->db->where('rescar_vlr_diarias', $options['rescar_vlr_diarias']);
			
		if(isset($options['rescar_vlr_protecao']))
			$this->db->where('rescar_vlr_protecao', $options['rescar_vlr_protecao']);
			
		if(isset($options['rescar_vlr_hora_extra']))
			$this->db->where('rescar_vlr_hora_extra', $options['rescar_vlr_hora_extra']);
			
		if(isset($options['rescar_vlr_taxas']))
			$this->db->where('rescar_vlr_taxas', $options['rescar_vlr_taxas']);
			
		if(isset($options['rescar_vlr_opcionais']))
			$this->db->where('rescar_vlr_opcionais', $options['rescar_vlr_opcionais']);
			
		if(isset($options['rescar_vlr_total']))
			$this->db->where('rescar_vlr_total', $options['rescar_vlr_total']);
			
		if(isset($options['rescar_dthcadastro']))
			$this->db->where('rescar_dthcadastro', $options['rescar_dthcadastro']);
			
		if(isset($options['rescar_dthatualizacao']))
			$this->db->where('rescar_dthatualizacao', $options['rescar_dthatualizacao']);
			
		if(isset($options['rescar_stur']))
			$this->db->where('rescar_stur', $options['rescar_stur']);
			
		if(isset($options['rescar_voo_nmb']))
			$this->db->where('rescar_voo_nmb', $options['rescar_voo_nmb']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('reservascarros');

		if(isset($options['rescar_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteReservasCarros($options = array())
	{
    
		if (!$this-> _required(
			Array('rescar_id', 'rescar_id'),
			$options)
		) return false;
		
		$this->db->where('rescar_id', $options['rescar_id']);
    	$this->db->delete('reservascarros');
	}
}

?>