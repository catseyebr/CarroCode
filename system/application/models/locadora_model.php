<?php

class Locadora_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddLocadora($options = array())
	{
		if (!$this-> _required(
			Array('loc_nomelocadora', 'loc_nomelocadora'),
			$options)
		) return false;
		
		$postData = array();
		
		if(isset($options['loc_id']))
			//integer
			$postData['loc_id'] = $options['loc_id'];
		
		//---------------------------------------------------
		
		if(isset($options['loc_cnpj_id'])){
			//integer
			$postData['loc_cnpj_id'] = $options['loc_cnpj_id'];
		}else{
			$postData['loc_cnpj_id'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loc_dthcadastro'])){
			//timestamp
			$postData['loc_dthcadastro'] = $options['loc_dthcadastro'];
		}else{
			$postData['loc_dthcadastro'] = date("Y-m-d H:i:s");
		}
		
		//---------------------------------------------------
		
		if(isset($options['loc_met_id'])){
			//integer
			$postData['loc_met_id'] = $options['loc_met_id'];
		}else{
			$postData['loc_met_id'] = NULL;
		}
		
		//---------------------------------------------------
			
		$postData['loc_nomelocadora'] = $options['loc_nomelocadora'];
				
		//---------------------------------------------------
			
		if(isset($options['loc_permalink'])){
			//varchar
			$postData['loc_permalink'] = $options['loc_permalink'];
		}else{
			$postData['loc_permalink'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loc_classe'])){
			//varchar
			$postData['loc_classe'] = $options['loc_classe'];
		}else{
			$postData['loc_classe'] = NULL;
		}
		
		//---------------------------------------------------
			
		if(isset($options['loc_extra_opc'])){
			//boolean
			$postData['loc_extra_opc'] = $options['loc_extra_opc'];
		}else{
			$postData['loc_extra_opc'] = 'f';
		}
		
		//---------------------------------------------------
		
		if(isset($options['loc_taxas'])){
			//float
			$postData['loc_taxas'] = $options['loc_taxas'];
		}else{
			$postData['loc_taxas'] = 0;
		}
		
		//---------------------------------------------------
				
		if(isset($options['loc_taxasaero'])){
			//float
			$postData['loc_taxasaero'] = $options['loc_taxasaero'];
		}else{
			$postData['loc_taxasaero'] = 0;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loc_horaextra'])){
			//integer
			$postData['loc_horaextra'] = $options['loc_horaextra'];
		}else{
			$postData['loc_horaextra'] = 0;
		}
		
		//---------------------------------------------------
			
		if(isset($options['loc_prazodiaria'])){
			//integer
			$postData['loc_prazodiaria'] = $options['loc_prazodiaria'];
		}else{
			$postData['loc_prazodiaria'] = 0;
		}
		
		//---------------------------------------------------
			
		if(isset($options['loc_horacortesia'])){
			//integer
			$postData['loc_horacortesia'] = $options['loc_horacortesia'];
		}else{
			$postData['loc_horacortesia'] = 0;
		}
		
		//---------------------------------------------------
			
		if(isset($options['loc_txtprazocancel'])){
			//text
			$postData['loc_txtprazocancel'] = $options['loc_txtprazocancel'];
		}else{
			$postData['loc_txtprazocancel'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loc_maisinfo'])){
			//text
			$postData['loc_maisinfo'] = $options['loc_maisinfo'];
		}else{
			$postData['loc_maisinfo'] = NULL;
		}
		
		//---------------------------------------------------
			
		if(isset($options['loc_kmrodado'])){
			//decimal (10,2)
			$postData['loc_kmrodado'] = $options['loc_kmrodado'];
		}else{
			$postData['loc_kmrodado'] = NULL;
		}
		
		//---------------------------------------------------
			
		if(isset($options['loc_obs'])){
			//text
			$postData['loc_obs'] = $options['loc_obs'];
		}else{
			$postData['loc_obs'] = NULL;
		}
		
		//---------------------------------------------------
			
		if(isset($options['loc_texto_livre'])){
			//text
			$postData['loc_texto_livre'] = $options['loc_texto_livre'];
		}else{
			$postData['loc_texto_livre'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loc_ativo'])){
			//boolean
			$postData['loc_ativo'] = $options['loc_ativo'];
		}else{
			$postData['loc_ativo'] = 'f';
		}
		
		//---------------------------------------------------
		
		if(isset($options['loc_online'])){
			//boolean
			$postData['loc_online'] = $options['loc_online'];
		}else{
			$postData['loc_online'] = 'f';
		}
		
		//---------------------------------------------------
		
		$this->db->insert('locadora', $postData);
		
		if(isset($options['loc_id'])){
			if($postData['loc_id'] >= $this->db->insert_id()){
				$next_sequence = $postData['loc_id']+1;
				$this->db->simple_query("ALTER SEQUENCE locadora_loc_id_seq RESTART WITH $next_sequence");
			}
			return $postData['loc_id'];
		}else{
			return $this->db->insert_id();
		}
	}
	
	function UpdateLocadora($options = array())
	{
		if (!$this-> _required(
			Array('loc_id', 'loc_id'),
			$options)
		) return false;
		
		if(isset($options['loc_cnpj_id']))
			$this->db->set('loc_cnpj_id', $options['loc_cnpj_id']);
			
		if(isset($options['loc_met_id']))
			$this->db->set('loc_met_id', $options['loc_met_id']);
			
		if(isset($options['loc_nomelocadora']))
			$this->db->set('loc_nomelocadora', $options['loc_nomelocadora']);
			
		if(isset($options['loc_permalink']))
			$this->db->set('loc_permalink', $options['loc_permalink']);
			
		if(isset($options['loc_classe']))
			$this->db->set('loc_classe', $options['loc_classe']);
			
		if(isset($options['loc_extra_opc']))
			$this->db->set('loc_extra_opc', $options['loc_extra_opc']);
			
		if(isset($options['loc_taxas']))
			$this->db->set('loc_taxas', $options['loc_taxas']);
			
		if(isset($options['loc_taxasaero']))
			$this->db->set('loc_taxasaero', $options['loc_taxasaero']);
			
		if(isset($options['loc_horaextra']))
			$this->db->set('loc_horaextra', $options['loc_horaextra']);
			
		if(isset($options['loc_prazodiaria']))
			$this->db->set('loc_prazodiaria', $options['loc_prazodiaria']);
			
		if(isset($options['loc_horacortesia']))
			$this->db->set('loc_horacortesia', $options['loc_horacortesia']);
			
		if(isset($options['loc_txtprazocancel']))
			$this->db->set('loc_txtprazocancel', $options['loc_txtprazocancel']);
			
		if(isset($options['loc_maisinfo']))
			$this->db->set('loc_maisinfo', $options['loc_maisinfo']);
			
		if(isset($options['loc_kmrodado']))
			$this->db->set('loc_kmrodado', $options['loc_kmrodado']);
			
		if(isset($options['loc_obs']))
			$this->db->set('loc_obs', $options['loc_obs']);
			
		if(isset($options['loc_ativo']))
			$this->db->set('loc_ativo', $options['loc_ativo']);
		
		$this->db->where('loc_id', $options['loc_id']);
		$this->db->update('locadora');
		
		return $this->db->affected_rows();
	}
	
	function GetLocadora($options = array())
	{
		if(isset($options['loc_id']))
			$this->db->where('loc_id', $options['loc_id']);
			
		if(isset($options['loc_cnpj_id']))
			$this->db->where('loc_cnpj_id', $options['loc_cnpj_id']);
			
		if(isset($options['loc_met_id']))
			$this->db->where('loc_met_id', $options['loc_met_id']);
		
		if(isset($options['loc_nomelocadora'])){
			$like_nomelocadora = "%".$options['loc_nomelocadora']."%";
			$this->db->where('loc_nomelocadora ILIKE', $like_nomelocadora);
		}
		
		if(isset($options['loc_permalink']))
			$this->db->where('loc_permalink', $options['loc_permalink']);
			
		if(isset($options['loc_classe']))
			$this->db->where('loc_classe', $options['loc_classe']);
			
		if(isset($options['loc_extra_opc']))
			$this->db->where('loc_extra_opc', $options['loc_extra_opc']);
			
		if(isset($options['loc_taxas']))
			$this->db->where('loc_taxas', $options['loc_taxas']);
			
		if(isset($options['loc_taxasaero']))
			$this->db->where('loc_taxasaero', $options['loc_taxasaero']);
			
		if(isset($options['loc_horaextra']))
			$this->db->where('loc_horaextra', $options['loc_horaextra']);
			
		if(isset($options['loc_prazodiaria']))
			$this->db->where('loc_prazodiaria', $options['loc_prazodiaria']);
			
		if(isset($options['loc_horacortesia']))
			$this->db->where('loc_horacortesia', $options['loc_horacortesia']);
			
		if(isset($options['loc_txtprazocancel']))
			$this->db->where('loc_txtprazocancel', $options['loc_txtprazocancel']);
			
		if(isset($options['loc_maisinfo']))
			$this->db->where('loc_maisinfo', $options['loc_maisinfo']);
			
		if(isset($options['loc_kmrodado']))
			$this->db->where('loc_kmrodado', $options['loc_kmrodado']);
			
		if(isset($options['loc_obs']))
			$this->db->where('loc_obs', $options['loc_obs']);
			
		if(isset($options['loc_ativo']))
			$this->db->where('loc_ativo', $options['loc_ativo']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('locadora');

		return $query->result();
	}
	
	function GetLocCnpj($options = array())
	{
		if(isset($options['loc_id']))
			$this->db->where('loc_id', $options['loc_id']);
			
		$query = $this->db->get('locadora');

	if ($query->row(0) != NULL){
			return $query->row(0)->loc_cnpj_id;
		}else{
			return false;
		}
	}
	
	function GetLocAtivas()
	{
		$this->db->select('loc_id');
		$this->db->order_by('loc_nomelocadora', 'ASC');
		$this->db->where('loc_ativo', 't');
			
		$query = $this->db->get('locadora');

		return $query->result();
	}
	
	function DeleteLocadora($options = array())
	{
    
		if (!$this-> _required(
			Array('loc_id', 'loc_id'),
			$options)
		) return false;
		
		$this->db->where('loc_id', $options['loc_id']);
    	$this->db->delete('locadora');
	}
}

?>