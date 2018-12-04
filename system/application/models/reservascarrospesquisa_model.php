<?php

class ReservasCarrosPesquisa_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddReservasCarrosPesquisa($options = array())
	{
		if (!$this-> _required(
			Array('rsvcarp_loj_id_retirar', 'rsvcarp_loj_id_retirar'),
			$options)
		) return false;
		
		if (!$this-> _required(
			Array('rsvcarp_loj_id_devolver', 'rsvcarp_loj_id_devolver'),
			$options)
		) return false;
		
		$postData = array();
		
		//integer
		$postData['rsvcarp_loj_id_retirar'] = $options['rsvcarp_loj_id_retirar'];
		
		//---------------------------------------------------
		//integer
		$postData['rsvcarp_loj_id_devolver'] = $options['rsvcarp_loj_id_devolver'];
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_prot_id'])){
			//integer
			$postData['rsvcarp_prot_id'] = $options['rsvcarp_prot_id'];
		}else{
			$postData['rsvcarp_prot_id'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_grp_id'])){
			//integer
			$postData['rsvcarp_grp_id'] = $options['rsvcarp_grp_id'];
		}else{
			$postData['rsvcarp_grp_id'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_loc_id'])){
			//integer
			$postData['rsvcarp_loc_id'] = $options['rsvcarp_loc_id'];
		}else{
			$postData['rsvcarp_loc_id'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_data_retirar'])){
			//timestamp
			$postData['rsvcarp_data_retirar'] = $options['rsvcarp_data_retirar'];
		}else{
			$postData['rsvcarp_data_retirar'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_data_devolver'])){
			//timestamp
			$postData['rsvcarp_data_devolver'] = $options['rsvcarp_data_devolver'];
		}else{
			$postData['rsvcarp_data_devolver'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_diarias'])){
			//integer
			$postData['rsvcarp_diarias'] = $options['rsvcarp_diarias'];
		}else{
			$postData['rsvcarp_diarias'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_horas_extra'])){
			//integer
			$postData['rsvcarp_horas_extra'] = $options['rsvcarp_horas_extra'];
		}else{
			$postData['rsvcarp_horas_extra'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_diaria_extra'])){
			//boolean
			$postData['rsvcarp_diaria_extra'] = $options['rsvcarp_diaria_extra'];
		}else{
			$postData['rsvcarp_diaria_extra'] = 'f';
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_opcionais_array'])){
			//text
			$postData['rsvcarp_opcionais_array'] = $options['rsvcarp_opcionais_array'];
		}else{
			$postData['rsvcarp_opcionais_array'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_vlr_diarias'])){
			//float
			$postData['rsvcarp_vlr_diarias'] = $options['rsvcarp_vlr_diarias'];
		}else{
			$postData['rsvcarp_vlr_diarias'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_vlr_protecao'])){
			//float
			$postData['rsvcarp_vlr_protecao'] = $options['rsvcarp_vlr_protecao'];
		}else{
			$postData['rsvcarp_vlr_protecao'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_vlr_horas_extra'])){
			//float
			$postData['rsvcarp_vlr_horas_extra'] = $options['rsvcarp_vlr_horas_extra'];
		}else{
			$postData['rsvcarp_vlr_horas_extra'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_vlr_taxas'])){
			//float
			$postData['rsvcarp_vlr_taxas'] = $options['rsvcarp_vlr_taxas'];
		}else{
			$postData['rsvcarp_vlr_taxas'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_vlr_opcionais'])){
			//float
			$postData['rsvcarp_vlr_opcionais'] = $options['rsvcarp_vlr_opcionais'];
		}else{
			$postData['rsvcarp_vlr_opcionais'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_vlr_total'])){
			//float
			$postData['rsvcarp_vlr_total'] = $options['rsvcarp_vlr_total'];
		}else{
			$postData['rsvcarp_vlr_total'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_dthcadastro'])){
			//timestamp
			$postData['rsvcarp_dthcadastro'] = $options['rsvcarp_dthcadastro'];
		}else{
			$postData['rsvcarp_dthcadastro'] = date("Y-m-d H:i:s");
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_dthatualizacao'])){
			//timestamp
			$postData['rsvcarp_dthatualizacao'] = $options['rsvcarp_dthatualizacao'];
		}else{
			$postData['rsvcarp_dthatualizacao'] = date("Y-m-d H:i:s");
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_referencia'])){
			//text
			$postData['rsvcarp_referencia'] = $options['rsvcarp_referencia'];
		}else{
			$postData['rsvcarp_referencia'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_useragent'])){
			//text
			$postData['rsvcarp_useragent'] = $options['rsvcarp_useragent'];
		}else{
			$postData['rsvcarp_useragent'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_hostip'])){
			//text
			$postData['rsvcarp_hostip'] = $options['rsvcarp_hostip'];
		}else{
			$postData['rsvcarp_hostip'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['rsvcarp_access_key'])){
			//text
			$postData['rsvcarp_access_key'] = $options['rsvcarp_access_key'];
		}else{
			$postData['rsvcarp_access_key'] = NULL;
		}
		
		//---------------------------------------------------
				
		$this->db->insert('reservascarrospesquisa', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateReservasCarrosPesquisa($options = array())
	{
		if (!$this-> _required(
			Array('rsvcarp_id', 'rsvcarp_id'),
			$options)
		) return false;
		
		if(isset($options['rsvcarp_loj_id_retirar']))
			$this->db->set('rsvcarp_loj_id_retirar', $options['rsvcarp_loj_id_retirar']);
			
		if(isset($options['rsvcarp_loj_id_devolver']))
			$this->db->set('rsvcarp_loj_id_devolver', $options['rsvcarp_loj_id_devolver']);
			
		if(isset($options['rsvcarp_prot_id']))
			$this->db->set('rsvcarp_prot_id', $options['rsvcarp_prot_id']);
			
		if(isset($options['rsvcarp_grp_id']))
			$this->db->set('rsvcarp_grp_id', $options['rsvcarp_grp_id']);
			
		if(isset($options['rsvcarp_loc_id']))
			$this->db->set('rsvcarp_loc_id', $options['rsvcarp_loc_id']);
			
		if(isset($options['rsvcarp_data_retirar']))
			$this->db->set('rsvcarp_data_retirar', $options['rsvcarp_data_retirar']);
			
		if(isset($options['rsvcarp_data_devolver']))
			$this->db->set('rsvcarp_data_devolver', $options['rsvcarp_data_devolver']);
			
		if(isset($options['rsvcarp_diarias']))
			$this->db->set('rsvcarp_diarias', $options['rsvcarp_diarias']);
			
		if(isset($options['rsvcarp_horas_extra']))
			$this->db->set('rsvcarp_horas_extra', $options['rsvcarp_horas_extra']);
			
		if(isset($options['rsvcarp_diaria_extra']))
			$this->db->set('rsvcarp_diaria_extra', $options['rsvcarp_diaria_extra']);
			
		if(isset($options['rsvcarp_opcionais_array']))
			$this->db->set('rsvcarp_opcionais_array', $options['rsvcarp_opcionais_array']);
			
		if(isset($options['rsvcarp_vlr_diarias']))
			$this->db->set('rsvcarp_vlr_diarias', $options['rsvcarp_vlr_diarias']);
			
		if(isset($options['rsvcarp_vlr_protecao']))
			$this->db->set('rsvcarp_vlr_protecao', $options['rsvcarp_vlr_protecao']);
			
		if(isset($options['rsvcarp_vlr_horas_extra']))
			$this->db->set('rsvcarp_vlr_horas_extra', $options['rsvcarp_vlr_horas_extra']);
			
		if(isset($options['rsvcarp_vlr_taxas']))
			$this->db->set('rsvcarp_vlr_taxas', $options['rsvcarp_vlr_taxas']);
			
		if(isset($options['rsvcarp_vlr_opcionais']))
			$this->db->set('rsvcarp_vlr_opcionais', $options['rsvcarp_vlr_opcionais']);
			
		if(isset($options['rsvcarp_vlr_total']))
			$this->db->set('rsvcarp_vlr_total', $options['rsvcarp_vlr_total']);
			
		if(isset($options['rsvcarp_dthcadastro']))
			$this->db->set('rsvcarp_dthcadastro', $options['rsvcarp_dthcadastro']);
			
		if(isset($options['rsvcarp_dthatualizacao']))
			$this->db->set('rsvcarp_dthatualizacao', $options['rsvcarp_dthatualizacao']);
			
		if(isset($options['rsvcarp_referencia']))
			$this->db->set('rsvcarp_referencia', $options['rsvcarp_referencia']);
			
		if(isset($options['rsvcarp_useragent']))
			$this->db->set('rsvcarp_useragent', $options['rsvcarp_useragent']);
			
		if(isset($options['rsvcarp_hostip']))
			$this->db->set('rsvcarp_hostip', $options['rsvcarp_hostip']);
			
		if(isset($options['rsvcarp_access_key']))
			$this->db->set('rsvcarp_access_key', $options['rsvcarp_access_key']);
			
		$this->db->where('rsvcarp_id', $options['rsvcarp_id']);
		$this->db->update('reservascarrospesquisa');
		
		return $this->db->affected_rows();
	}
	
	function GetReservasCarrosPesquisa($options = array())
	{
		if(isset($options['rsvcarp_id']))
			$this->db->where('rsvcarp_id', $options['rsvcarp_id']);
			
		if(isset($options['rsvcarp_loj_id_retirar']))
			$this->db->where('rsvcarp_loj_id_retirar', $options['rsvcarp_loj_id_retirar']);
			
		if(isset($options['rsvcarp_loj_id_devolver']))
			$this->db->where('rsvcarp_loj_id_devolver', $options['rsvcarp_loj_id_devolver']);
			
		if(isset($options['rsvcarp_prot_id']))
			$this->db->where('rsvcarp_prot_id', $options['rsvcarp_prot_id']);
			
		if(isset($options['rsvcarp_grp_id']))
			$this->db->where('rsvcarp_grp_id', $options['rsvcarp_grp_id']);
			
		if(isset($options['rsvcarp_loc_id']))
			$this->db->where('rsvcarp_loc_id', $options['rsvcarp_loc_id']);
			
		if(isset($options['rsvcarp_data_retirar']))
			$this->db->where('rsvcarp_data_retirar', $options['rsvcarp_data_retirar']);
			
		if(isset($options['rsvcarp_data_devolver']))
			$this->db->where('rsvcarp_data_devolver', $options['rsvcarp_data_devolver']);
			
		if(isset($options['rsvcarp_diarias']))
			$this->db->where('rsvcarp_diarias', $options['rsvcarp_diarias']);
			
		if(isset($options['rsvcarp_horas_extra']))
			$this->db->where('rsvcarp_horas_extra', $options['rsvcarp_horas_extra']);
			
		if(isset($options['rsvcarp_diaria_extra']))
			$this->db->where('rsvcarp_diaria_extra', $options['rsvcarp_diaria_extra']);
			
		if(isset($options['rsvcarp_opcionais_array']))
			$this->db->where('rsvcarp_opcionais_array', $options['rsvcarp_opcionais_array']);
			
		if(isset($options['rsvcarp_vlr_diarias']))
			$this->db->where('rsvcarp_vlr_diarias', $options['rsvcarp_vlr_diarias']);
			
		if(isset($options['rsvcarp_vlr_protecao']))
			$this->db->where('rsvcarp_vlr_protecao', $options['rsvcarp_vlr_protecao']);
			
		if(isset($options['rsvcarp_vlr_horas_extra']))
			$this->db->where('rsvcarp_vlr_horas_extra', $options['rsvcarp_vlr_horas_extra']);
			
		if(isset($options['rsvcarp_vlr_taxas']))
			$this->db->where('rsvcarp_vlr_taxas', $options['rsvcarp_vlr_taxas']);
			
		if(isset($options['rsvcarp_vlr_opcionais']))
			$this->db->where('rsvcarp_vlr_opcionais', $options['rsvcarp_vlr_opcionais']);
			
		if(isset($options['rsvcarp_vlr_total']))
			$this->db->where('rsvcarp_vlr_total', $options['rsvcarp_vlr_total']);
			
		if(isset($options['rsvcarp_dthcadastro']))
			$this->db->where('rsvcarp_dthcadastro', $options['rsvcarp_dthcadastro']);
			
		if(isset($options['rsvcarp_dthatualizacao']))
			$this->db->where('rsvcarp_dthatualizacao', $options['rsvcarp_dthatualizacao']);
			
		if(isset($options['rsvcarp_referencia']))
			$this->db->where('rsvcarp_referencia', $options['rsvcarp_referencia']);
			
		if(isset($options['rsvcarp_useragent']))
			$this->db->where('rsvcarp_useragent', $options['rsvcarp_useragent']);
			
		if(isset($options['rsvcarp_hostip']))
			$this->db->where('rsvcarp_hostip', $options['rsvcarp_hostip']);
			
		if(isset($options['rsvcarp_access_key']))
			$this->db->where('rsvcarp_access_key', $options['rsvcarp_access_key']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('reservascarrospesquisa');

		return $query->result();
	}
	
	function DeleteReservasCarrosPesquisa($options = array())
	{
    
		if (!$this-> _required(
			Array('rsvcarp_id', 'rsvcarp_id'),
			$options)
		) return false;
		
		$this->db->where('rsvcarp_id', $options['rsvcarp_id']);
    	$this->db->delete('reservascarrospesquisa');
	}
}
?>