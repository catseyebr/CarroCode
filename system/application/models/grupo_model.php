<?php

class Grupo_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}

	function AddGrupo($options = array())
	{
		if (!$this-> _required(
			Array('grp_cat_id', 'grp_cat_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('grp_loc_id', 'grp_loc_id'),
			$options)
		) return false;
		
		$postData = array();
		
		if(isset($options['grp_id']))
			//integer
			$postData['grp_id'] = $options['grp_id'];
		
		//---------------------------------------------------
		
			//integer
			$postData['grp_cat_id'] = $options['grp_cat_id'];
				
		//---------------------------------------------------
		
			//integer
			$postData['grp_loc_id'] = $options['grp_loc_id'];
				
		//---------------------------------------------------
		
		if(isset($options['grp_nome'])){
			//integer
			$postData['grp_nome'] = $options['grp_nome'];
		}else{
			$postData['grp_nome'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['grp_permalink'])){
			//integer
			$postData['grp_permalink'] = $options['grp_permalink'];
		}else{
			$postData['grp_permalink'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['grp_sipp_code'])){
			//integer
			$postData['grp_sipp_code'] = $options['grp_sipp_code'];
		}else{
			$postData['grp_sipp_code'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['grp_ota_tipo'])){
			//integer
			$postData['grp_ota_tipo'] = $options['grp_ota_tipo'];
		}else{
			$postData['grp_ota_tipo'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['grp_ota_size'])){
			//integer
			$postData['grp_ota_size'] = $options['grp_ota_size'];
		}else{
			$postData['grp_ota_size'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['grp_ota_portas'])){
			//integer
			$postData['grp_ota_portas'] = $options['grp_ota_portas'];
		}else{
			$postData['grp_ota_portas'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['grp_franquia'])){
			//integer
			$postData['grp_franquia'] = $options['grp_franquia'];
		}else{
			$postData['grp_franquia'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['grp_franquia_terceiros'])){
			//integer
			$postData['grp_franquia_terceiros'] = $options['grp_franquia_terceiros'];
		}else{
			$postData['grp_franquia_terceiros'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['grp_caucao'])){
			//integer
			$postData['grp_caucao'] = $options['grp_caucao'];
		}else{
			$postData['grp_caucao'] = NULL;
		}
		
		//---------------------------------------------------
		
		$this->db->insert('grupo', $postData);
		
		if(isset($options['grp_id'])){
			if($postData['grp_id'] >= $this->db->insert_id()){
				$next_sequence = $postData['grp_id']+1;
				$this->db->simple_query("ALTER SEQUENCE grupo_grp_id_seq RESTART WITH $next_sequence");
			}
			return $postData['grp_id'];
		}else{
			return $this->db->insert_id();
		}
	}
	
	function UpdateGrupo($options = array())
	{
		if (!$this-> _required(
			Array('grp_id', 'grp_id'),
			$options)
		) return false;
		
		if(isset($options['grp_cat_id']))
			$this->db->set('grp_cat_id', $options['grp_cat_id']);
			
		if(isset($options['grp_loc_id']))
			$this->db->set('grp_loc_id', $options['grp_loc_id']);
			
		if(isset($options['grp_nome']))
			$this->db->set('grp_nome', $options['grp_nome']);
		
		if(isset($options['grp_permalink']))
			$this->db->set('grp_permalink', $options['grp_permalink']);
			
		if(isset($options['grp_sipp_code']))
			$this->db->set('grp_sipp_code', $options['grp_sipp_code']);
			
		if(isset($options['grp_ota_tipo']))
			$this->db->set('grp_ota_tipo', $options['grp_ota_tipo']);
			
		if(isset($options['grp_ota_size']))
			$this->db->set('grp_ota_size', $options['grp_ota_size']);
			
		if(isset($options['grp_ota_portas']))
			$this->db->set('grp_ota_portas', $options['grp_ota_portas']);
			
		$this->db->where('grp_id', $options['grp_id']);
		$this->db->update('grupo');
		
		return $this->db->affected_rows();
	}
	
	function GetGrupo($options = array())
	{
		$this->db->join('categoria', 'cat_id = grp_cat_id', 'left');
		
		if(isset($options['grp_id']))
			$this->db->where('grp_id', $options['grp_id']);
			
		if(isset($options['grp_cat_id']))
			$this->db->where('grp_cat_id', $options['grp_cat_id']);
			
		if(isset($options['grp_loc_id']))
			$this->db->where('grp_loc_id', $options['grp_loc_id']);
			
		if(isset($options['grp_nome']))
			$this->db->where('grp_nome', $options['grp_nome']);
			
		if(isset($options['grp_permalink']))
			$this->db->where('grp_permalink', $options['grp_permalink']);
			
		if(isset($options['grp_sipp_code']))
			$this->db->where('grp_sipp_code', $options['grp_sipp_code']);
			
		if(isset($options['grp_ota_tipo']))
			$this->db->where('grp_ota_tipo', $options['grp_ota_tipo']);
			
		if(isset($options['grp_ota_size']))
			$this->db->where('grp_ota_size', $options['grp_ota_size']);
			
		if(isset($options['grp_ota_portas']))
			$this->db->where('grp_ota_portas', $options['grp_ota_portas']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('grupo');

		if(isset($options['grp_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function GetGrupoId($options = array())
	{
		if (!$this-> _required(
			Array('grp_nome', 'grp_nome'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('grp_loc_id', 'grp_loc_id'),
			$options)
		) return false;
		
		$this->db->where('grp_loc_id', $options['grp_loc_id']);
		$this->db->where('grp_nome', $options['grp_nome']);
			
		$query = $this->db->get('grupo');
		
		if ($query->row(0) != NULL){
			return $query->row(0)->grp_id;
		}else{
			return false;
		}
	}
	
	function DeleteGrupo($options = array())
	{
    
		if (!$this-> _required(
			Array('grp_id', 'grp_id'),
			$options)
		) return false;
		
		$this->db->where('grp_id', $options['grp_id']);
    	$this->db->delete('grupo');
	}
}

?>