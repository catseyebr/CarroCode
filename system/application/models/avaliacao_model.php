<?php

class Avaliacao_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddAvaliacao($options = array())
	{
		if (!$this-> _required(
			Array('aval_proj_id', 'aval_proj_id'),
			$options)
		) return false;
		
		if (!$this-> _required(
			Array('aval_reserva_id', 'aval_reserva_id'),
			$options)
		) return false;
		
		if (!$this-> _required(
			Array('aval_cli_id', 'aval_cli_id'),
			$options)
		) return false;
		
		$postData = array();
		
		//integer
			$postData['aval_proj_id'] = $options['aval_proj_id'];
		
		//---------------------------------------------------
		
		//integer
			$postData['aval_reserva_id'] = $options['aval_reserva_id'];
			
		//---------------------------------------------------
		
		//integer
			$postData['aval_cli_id'] = $options['aval_cli_id'];
			
		//---------------------------------------------------
		
		if(isset($options['aval_dthcadastro'])){
			//timestamp
			$postData['aval_dthcadastro'] = $options['aval_dthcadastro'];
		}else{
			$postData['aval_dthcadastro'] = date("Y-m-d H:i:s");
		}
		
		//---------------------------------------------------
		
		if(isset($options['aval_lida'])){
			//boolean
			$postData['aval_lida'] = $options['aval_lida'];
		}else{
			$postData['aval_lida'] = 'f';
		}
		
		//---------------------------------------------------
		
		if(isset($options['aval_w_acesso'])){
			//integer
			$postData['aval_w_acesso'] = $options['aval_w_acesso'];
		}else{
			$postData['aval_w_acesso'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['aval_w_qualidade'])){
			//integer
			$postData['aval_w_qualidade'] = $options['aval_w_qualidade'];
		}else{
			$postData['aval_w_qualidade'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['aval_w_conteudo'])){
			//integer
			$postData['aval_w_conteudo'] = $options['aval_w_conteudo'];
		}else{
			$postData['aval_w_conteudo'] = NULL;
		}	
		
		//---------------------------------------------------
		
		if(isset($options['aval_w_reserva'])){
			//integer
			$postData['aval_w_reserva'] = $options['aval_w_reserva'];
		}else{
			$postData['aval_w_reserva'] = NULL;
		}	
		
		//---------------------------------------------------
		
		if(isset($options['aval_w_nota'])){
			//integer
			$postData['aval_w_nota'] = $options['aval_w_nota'];
		}else{
			$postData['aval_w_nota'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['aval_sac_tempo'])){
			//integer
			$postData['aval_sac_tempo'] = $options['aval_sac_tempo'];
		}else{
			$postData['aval_sac_tempo'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['aval_sac_info'])){
			//integer
			$postData['aval_sac_info'] = $options['aval_sac_info'];
		}else{
			$postData['aval_sac_info'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['aval_sac_nota'])){
			//integer
			$postData['aval_sac_nota'] = $options['aval_sac_nota'];
		}else{
			$postData['aval_sac_nota'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['aval_serv_retorno'])){
			//boolean
			$postData['aval_serv_retorno'] = $options['aval_serv_retorno'];
		}else{
			$postData['aval_serv_retorno'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['aval_serv_indica'])){
			//boolean
			$postData['aval_serv_indica'] = $options['aval_serv_indica'];
		}else{
			$postData['aval_serv_indica'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['aval_emp_local'])){
			//integer
			$postData['aval_emp_local'] = $options['aval_emp_local'];
		}else{
			$postData['aval_emp_local'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['aval_emp_atendimento'])){
			//integer
			$postData['aval_emp_atendimento'] = $options['aval_emp_atendimento'];
		}else{
			$postData['aval_emp_atendimento'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['aval_emp_horarios'])){
			//integer
			$postData['aval_emp_horarios'] = $options['aval_emp_horarios'];
		}else{
			$postData['aval_emp_horarios'] = NULL;
		}	
		
		//---------------------------------------------------
		
		if(isset($options['aval_emp_nota'])){
			//integer
			$postData['aval_emp_nota'] = $options['aval_emp_nota'];
		}else{
			$postData['aval_emp_nota'] = NULL;
		}	
		
		//---------------------------------------------------
		
		if(isset($options['aval_car_potencia'])){
			//integer
			$postData['aval_car_potencia'] = $options['aval_car_potencia'];
		}else{
			$postData['aval_car_potencia'] = NULL;
		}	
		
		//---------------------------------------------------
		
		if(isset($options['aval_car_consumo'])){
			//integer
			$postData['aval_car_consumo'] = $options['aval_car_consumo'];
		}else{
			$postData['aval_car_consumo'] = NULL;
		}	
		
		//---------------------------------------------------
		
		if(isset($options['aval_car_manutencao'])){
			//integer
			$postData['aval_car_manutencao'] = $options['aval_car_manutencao'];
		}else{
			$postData['aval_car_manutencao'] = NULL;
		}	
		
		//---------------------------------------------------
		
		if(isset($options['aval_car_seguranca'])){
			//integer
			$postData['aval_car_seguranca'] = $options['aval_car_seguranca'];
		}else{
			$postData['aval_car_seguranca'] = NULL;
		}	
		
		//---------------------------------------------------
		
		if(isset($options['aval_car_capacidade'])){
			//integer
			$postData['aval_car_capacidade'] = $options['aval_car_capacidade'];
		}else{
			$postData['aval_car_capacidade'] = NULL;
		}	
		
		//---------------------------------------------------
		
		if(isset($options['aval_car_limpeza'])){
			//integer
			$postData['aval_car_limpeza'] = $options['aval_car_limpeza'];
		}else{
			$postData['aval_car_limpeza'] = NULL;
		}	
		
		//---------------------------------------------------
		
		if(isset($options['aval_car_nota'])){
			//integer
			$postData['aval_car_nota'] = $options['aval_car_nota'];
		}else{
			$postData['aval_car_nota'] = NULL;
		}	
		
		//---------------------------------------------------
		
		if(isset($options['aval_depoimento'])){
			//text
			$postData['aval_depoimento'] = $options['aval_depoimento'];
		}else{
			$postData['aval_depoimento'] = NULL;
		}	
		
		//---------------------------------------------------
		
		if(isset($options['aval_depoimento_resposta'])){
			//text
			$postData['aval_depoimento_resposta'] = $options['aval_depoimento_resposta'];
		}else{
			$postData['aval_depoimento_resposta'] = NULL;
		}	
		
		//---------------------------------------------------
		
		if(isset($options['aval_mostra_site'])){
			//boolean
			$postData['aval_mostra_site'] = $options['aval_mostra_site'];
		}else{
			$postData['aval_mostra_site'] = 'f';
		}	
		
		//---------------------------------------------------
		
		if(isset($options['aval_nome_depoimento'])){
			//text
			$postData['aval_nome_depoimento'] = $options['aval_nome_depoimento'];
		}else{
			$postData['aval_nome_depoimento'] = NULL;
		}	
		
		//---------------------------------------------------
		
		$this->db->insert('avaliacao', $postData);
		
		return $this->db->insert_id();
	}
	
	function UpdateAvaliacao($options = array())
	{
		if (!$this-> _required(
			Array('aval_id', 'aval_id'),
			$options)
		) return false;
		
		if(isset($options['aval_proj_id']))
			$this->db->set('aval_proj_id', $options['aval_proj_id']);
		
		if(isset($options['aval_reserva_id']))
			$this->db->set('aval_reserva_id', $options['aval_reserva_id']);
			
		if(isset($options['aval_cli_id']))
			$this->db->set('aval_cli_id', $options['aval_cli_id']);
			
		if(isset($options['aval_dthcadastro']))
			$this->db->set('aval_dthcadastro', $options['aval_dthcadastro']);
		
		if(isset($options['aval_lida']))
			$this->db->set('aval_lida', $options['aval_lida']);
		
		if(isset($options['aval_w_acesso']))
			$this->db->set('aval_w_acesso', $options['aval_w_acesso']);
		
		if(isset($options['aval_w_qualidade']))
			$this->db->set('aval_w_qualidade', $options['aval_w_qualidade']);
			
		if(isset($options['aval_w_conteudo']))
			$this->db->set('aval_w_conteudo', $options['aval_w_conteudo']);
			
		if(isset($options['aval_w_reserva']))
			$this->db->set('aval_w_reserva', $options['aval_w_reserva']);
			
		if(isset($options['aval_w_nota']))
			$this->db->set('aval_w_nota', $options['aval_w_nota']);
			
		if(isset($options['aval_sac_tempo']))
			$this->db->set('aval_sac_tempo', $options['aval_sac_tempo']);
			
		if(isset($options['aval_sac_info']))
			$this->db->set('aval_sac_info', $options['aval_sac_info']);
			
		if(isset($options['aval_sac_nota']))
			$this->db->set('aval_sac_nota', $options['aval_sac_nota']);
			
		if(isset($options['aval_serv_retorno']))
			$this->db->set('aval_serv_retorno', $options['aval_serv_retorno']);
			
		if(isset($options['aval_serv_indica']))
			$this->db->set('aval_serv_indica', $options['aval_serv_indica']);
			
		if(isset($options['aval_emp_local']))
			$this->db->set('aval_emp_local', $options['aval_emp_local']);
			
		if(isset($options['aval_emp_atendimento']))
			$this->db->set('aval_emp_atendimento', $options['aval_emp_atendimento']);
			
		if(isset($options['aval_emp_horarios']))
			$this->db->set('aval_emp_horarios', $options['aval_emp_horarios']);
			
		if(isset($options['aval_emp_nota']))
			$this->db->set('aval_emp_nota', $options['aval_emp_nota']);
			
		if(isset($options['aval_car_potencia']))
			$this->db->set('aval_car_potencia', $options['aval_car_potencia']);
			
		if(isset($options['aval_car_consumo']))
			$this->db->set('aval_car_consumo', $options['aval_car_consumo']);
			
		if(isset($options['aval_car_manutencao']))
			$this->db->set('aval_car_manutencao', $options['aval_car_manutencao']);
			
		if(isset($options['aval_car_seguranca']))
			$this->db->set('aval_car_seguranca', $options['aval_car_seguranca']);
			
		if(isset($options['aval_car_capacidade']))
			$this->db->set('aval_car_capacidade', $options['aval_car_capacidade']);
			
		if(isset($options['aval_car_limpeza']))
			$this->db->set('aval_car_limpeza', $options['aval_car_limpeza']);
			
		if(isset($options['aval_car_nota']))
			$this->db->set('aval_car_nota', $options['aval_car_nota']);
			
		if(isset($options['aval_depoimento']))
			$this->db->set('aval_depoimento', $options['aval_depoimento']);
			
		if(isset($options['aval_depoimento_resposta']))
			$this->db->set('aval_depoimento_resposta', $options['aval_depoimento_resposta']);
			
		if(isset($options['aval_mostra_site']))
			$this->db->set('aval_mostra_site', $options['aval_mostra_site']);
			
		if(isset($options['aval_nome_depoimento']))
			$this->db->set('aval_nome_depoimento', $options['aval_nome_depoimento']);
		
			
		$this->db->where('aval_id', $options['aval_id']);
		$this->db->update('avaliacao');
		
		return $this->db->affected_rows();
	}
	
	function GetAvaliacao($options = array())
	{
		if(isset($options['aval_id']))
			$this->db->where('aval_id', $options['aval_id']);
			
		if(isset($options['aval_proj_id']))
			$this->db->where('aval_proj_id', $options['aval_proj_id']);
		
		if(isset($options['aval_reserva_id']))
			$this->db->where('aval_reserva_id', $options['aval_reserva_id']);
			
		if(isset($options['aval_cli_id']))
			$this->db->where('aval_cli_id', $options['aval_cli_id']);
			
		if(isset($options['aval_dthcadastro']))
			$this->db->where('aval_dthcadastro', $options['aval_dthcadastro']);
		
		if(isset($options['aval_lida']))
			$this->db->where('aval_lida', $options['aval_lida']);
		
		if(isset($options['aval_w_acesso']))
			$this->db->where('aval_w_acesso', $options['aval_w_acesso']);
		
		if(isset($options['aval_w_qualidade']))
			$this->db->where('aval_w_qualidade', $options['aval_w_qualidade']);
			
		if(isset($options['aval_w_conteudo']))
			$this->db->where('aval_w_conteudo', $options['aval_w_conteudo']);
			
		if(isset($options['aval_w_reserva']))
			$this->db->where('aval_w_reserva', $options['aval_w_reserva']);
			
		if(isset($options['aval_w_nota']))
			$this->db->where('aval_w_nota', $options['aval_w_nota']);
			
		if(isset($options['aval_sac_tempo']))
			$this->db->where('aval_sac_tempo', $options['aval_sac_tempo']);
			
		if(isset($options['aval_sac_info']))
			$this->db->where('aval_sac_info', $options['aval_sac_info']);
			
		if(isset($options['aval_sac_nota']))
			$this->db->where('aval_sac_nota', $options['aval_sac_nota']);
			
		if(isset($options['aval_serv_retorno']))
			$this->db->where('aval_serv_retorno', $options['aval_serv_retorno']);
			
		if(isset($options['aval_serv_indica']))
			$this->db->where('aval_serv_indica', $options['aval_serv_indica']);
			
		if(isset($options['aval_emp_local']))
			$this->db->where('aval_emp_local', $options['aval_emp_local']);
			
		if(isset($options['aval_emp_atendimento']))
			$this->db->where('aval_emp_atendimento', $options['aval_emp_atendimento']);
			
		if(isset($options['aval_emp_horarios']))
			$this->db->where('aval_emp_horarios', $options['aval_emp_horarios']);
			
		if(isset($options['aval_emp_nota']))
			$this->db->where('aval_emp_nota', $options['aval_emp_nota']);
			
		if(isset($options['aval_car_potencia']))
			$this->db->where('aval_car_potencia', $options['aval_car_potencia']);
			
		if(isset($options['aval_car_consumo']))
			$this->db->where('aval_car_consumo', $options['aval_car_consumo']);
			
		if(isset($options['aval_car_manutencao']))
			$this->db->where('aval_car_manutencao', $options['aval_car_manutencao']);
			
		if(isset($options['aval_car_seguranca']))
			$this->db->where('aval_car_seguranca', $options['aval_car_seguranca']);
			
		if(isset($options['aval_car_capacidade']))
			$this->db->where('aval_car_capacidade', $options['aval_car_capacidade']);
			
		if(isset($options['aval_car_limpeza']))
			$this->db->where('aval_car_limpeza', $options['aval_car_limpeza']);
			
		if(isset($options['aval_car_nota']))
			$this->db->where('aval_car_nota', $options['aval_car_nota']);
			
		if(isset($options['aval_depoimento']))
			$this->db->where('aval_depoimento', $options['aval_depoimento']);
			
		if(isset($options['aval_depoimento_resposta']))
			$this->db->where('aval_depoimento_resposta', $options['aval_depoimento_resposta']);
			
		if(isset($options['aval_mostra_site']))
			$this->db->where('aval_mostra_site', $options['aval_mostra_site']);
			
		if(isset($options['aval_nome_depoimento']))
			$this->db->where('aval_nome_depoimento', $options['aval_nome_depoimento']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('avaliacao');

		return $query->result();
	}
	
	function DeleteAvaliacao($options = array())
	{
    
		if (!$this-> _required(
			Array('aval_id', 'aval_id'),
			$options)
		) return false;
		
		$this->db->where('aval_id', $options['aval_id']);
    	$this->db->delete('avaliacao');
	}
}

?>