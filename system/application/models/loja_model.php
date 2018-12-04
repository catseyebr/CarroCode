<?php

class Loja_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddLoja($options = array())
	{
		if (!$this-> _required(
			Array('loj_nome', 'loj_nome'),
			$options)
		) return false;
		
		if(isset($options['loj_id']))
			//integer
			$postData['loj_id'] = $options['loj_id'];
		
		//---------------------------------------------------
		
		if(isset($options['loj_met_id'])){
			//integer
			$postData['loj_met_id'] = $options['loj_met_id'];
		}else{
			$postData['loj_met_id'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loj_end_id'])){
			//integer
			$postData['loj_end_id'] = $options['loj_end_id'];
		}else{
			$postData['loj_end_id'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loj_loc_id'])){
			//integer
			$postData['loj_loc_id'] = $options['loj_loc_id'];
		}else{
			$postData['loj_loc_id'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loj_city_id'])){
			//integer
			$postData['loj_city_id'] = $options['loj_city_id'];
		}else{
			$postData['loj_city_id'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loj_nome'])){
			//integer
			$postData['loj_nome'] = $options['loj_nome'];
		}else{
			$postData['loj_nome'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loj_iata'])){
			//integer
			$postData['loj_iata'] = $options['loj_iata'];
		}else{
			$postData['loj_iata'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loj_aero'])){
			//integer
			$postData['loj_aero'] = $options['loj_aero'];
		}else{
			$postData['loj_aero'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loj_permalink'])){
			//integer
			$postData['loj_permalink'] = $options['loj_permalink'];
		}else{
			$postData['loj_permalink'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loj_classe'])){
			//integer
			$postData['loj_classe'] = $options['loj_classe'];
		}else{
			$postData['loj_classe'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loj_obs'])){
			//integer
			$postData['loj_obs'] = $options['loj_obs'];
		}else{
			$postData['loj_obs'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loj_ativo'])){
			//integer
			$postData['loj_ativo'] = $options['loj_ativo'];
		}else{
			$postData['loj_ativo'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loj_valorextra'])){
			//integer
			$postData['loj_valorextra'] = $options['loj_valorextra'];
		}else{
			$postData['loj_valorextra'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['loj_dthcadastro'])){
			//integer
			$postData['loj_dthcadastro'] = $options['loj_dthcadastro'];
		}else{
			$postData['loj_dthcadastro'] = date("Y-m-d H:i:s");
		}
		
		//---------------------------------------------------
		
		if(isset($options['loj_texto_livre'])){
			//integer
			$postData['loj_texto_livre'] = $options['loj_texto_livre'];
		}else{
			$postData['loj_texto_livre'] = '';
		}
		
		//---------------------------------------------------
		
		
		$this->db->insert('loja', $postData);
		
		if(isset($options['loj_id'])){
			if($postData['loj_id'] >= $this->db->insert_id()){
				$next_sequence = $postData['loj_id']+1;
				$this->db->simple_query("ALTER SEQUENCE loja_loj_id_seq RESTART WITH $next_sequence");
			}
			return $postData['loj_id'];
		}else{
			return $this->db->insert_id();
		}
	}
	
	function UpdateLoja($options = array())
	{
		if (!$this-> _required(
			Array('loj_id', 'loj_id'),
			$options)
		) return false;
		
		if(isset($options['loj_met_id']))
			$this->db->set('loj_met_id', $options['loj_met_id']);
			
		if(isset($options['loj_end_id']))
			$this->db->set('loj_end_id', $options['loj_end_id']);
			
		if(isset($options['loj_loc_id']))
			$this->db->set('loj_loc_id', $options['loj_loc_id']);
			
		if(isset($options['loj_city_id']))
			$this->db->set('loj_city_id', $options['loj_city_id']);
			
		if(isset($options['loj_nome']))
			$this->db->set('loj_nome', $options['loj_nome']);
			
		if(isset($options['loj_iata']))
			$this->db->set('loj_iata', $options['loj_iata']);
			
		if(isset($options['loj_aero']))
			$this->db->set('loj_aero', $options['loj_aero']);
			
		if(isset($options['loj_permalink']))
			$this->db->set('loj_permalink', $options['loj_permalink']);
			
		if(isset($options['loj_classe']))
			$this->db->set('loj_classe', $options['loj_classe']);
			
		if(isset($options['loj_obs']))
			$this->db->set('loj_obs', $options['loj_obs']);
			
		if(isset($options['loj_ativo']))
			$this->db->set('loj_ativo', $options['loj_ativo']);
			
		if(isset($options['loj_valorextra']))
			$this->db->set('loj_valorextra', $options['loj_valorextra']);
			
		$this->db->where('loj_id', $options['loj_id']);
		$this->db->update('loja');
		
		return $this->db->affected_rows();
	}
	
	function GetCidades($options = array())
	{
		$this->db->join('locadora', 'loc_id = loj_loc_id', 'left');
		$this->db->join('cidade', 'city_id = loj_city_id', 'left');
		$this->db->select('city_nome');
		$this->db->where('loc_id', $options['loc_id']);
		$this->db->group_by("city_nome"); 
		$this->db->order_by('city_nome', 'ASC');
		$query = $this->db->get('loja');
		return $query->result();
	}
	
	function GetLoja($options = array())
	{
		if(isset($options['city_nome'])){
			$like = "%".$options['city_nome']."%";
			$this->db->join('cidade', 'city_id = loj_city_id', 'left');
			$this->db->where('city_nome ILIKE', $like);
		}
		if(isset($options['loj_id']))
			$this->db->where('loj_id', $options['loj_id']);
			
		if(isset($options['loj_met_id']))
			$this->db->where('loj_met_id', $options['loj_met_id']);
			
		if(isset($options['loj_end_id']))
			$this->db->where('loj_end_id', $options['loj_end_id']);
			
		if(isset($options['loj_loc_id']))
			$this->db->where('loj_loc_id', $options['loj_loc_id']);
			
		if(isset($options['loj_city_id']))
			$this->db->where('loj_city_id', $options['loj_city_id']);
			
		if(isset($options['loj_nome']))
			$this->db->where('loj_nome', $options['loj_nome']);
			
		if(isset($options['loj_iata']))
			$this->db->where('loj_iata', $options['loj_iata']);
			
		if(isset($options['loj_aero']))
			$this->db->where('loj_aero', $options['loj_aero']);
			
		if(isset($options['loj_permalink']))
			$this->db->where('loj_permalink', $options['loj_permalink']);
			
		if(isset($options['loj_classe']))
			$this->db->where('loj_classe', $options['loj_classe']);
			
		if(isset($options['loj_obs']))
			$this->db->where('loj_obs', $options['loj_obs']);
			
		if(isset($options['loj_ativo']))
			$this->db->where('loj_ativo', $options['loj_ativo']);
			
		if(isset($options['loj_valorextra']))
			$this->db->where('loj_valorextra', $options['loj_valorextra']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('loja');

		return $query->result();
	}
	
	function DeleteLoja($options = array())
	{
    
		if (!$this-> _required(
			Array('loj_id', 'loj_id'),
			$options)
		) return false;
		
		$this->db->where('loj_id', $options['loj_id']);
    	$this->db->delete('loja');
	}
}

?>