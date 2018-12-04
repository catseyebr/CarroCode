<?php

class TempPessoaJuridica_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddTempPessoaJuridica($options = array())
	{
		$postData = array();
		
		if(isset($options['tempcnpj_telefone'])){
			//integer
			$postData['tempcnpj_telefone'] = $options['tempcnpj_telefone'];
		}else{
			$postData['tempcnpj_telefone'] = NULL;
		}
		
		//---------------------------------------------------
				
		if(isset($options['tempcnpj_fax'])){
			//integer
			$postData['tempcnpj_fax'] = $options['tempcnpj_fax'];
		}else{
			$postData['tempcnpj_fax'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['tempcnpj_email'])){
			//varchar
			$postData['tempcnpj_email'] = $options['tempcnpj_email'];
		}else{
			$postData['tempcnpj_email'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['tempcnpj_cep'])){
			//varchar
			$postData['tempcnpj_cep'] = $options['tempcnpj_cep'];
		}else{
			$postData['tempcnpj_cep'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['tempcnpj_bairro'])){
			//varchar
			$postData['tempcnpj_bairro'] = $options['tempcnpj_bairro'];
		}else{
			$postData['tempcnpj_bairro'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['tempcnpj_cidade'])){
			//varchar
			$postData['tempcnpj_cidade'] = $options['tempcnpj_cidade'];
		}else{
			$postData['tempcnpj_cidade'] = NULL;
		}
				
		//---------------------------------------------------
		
		if(isset($options['tempcnpj_uf'])){
			//timestamp
			$postData['tempcnpj_uf'] = $options['tempcnpj_uf'];
		}else{
			$postData['tempcnpj_uf'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['tempcnpj_cnpj_cod'])){
			//timestamp
			$postData['tempcnpj_cnpj_cod'] = $options['tempcnpj_cnpj_cod'];
		}else{
			$postData['tempcnpj_cnpj_cod'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['tempcnpj_nomefantasia'])){
			//timestamp
			$postData['tempcnpj_nomefantasia'] = $options['tempcnpj_nomefantasia'];
		}else{
			$postData['tempcnpj_nomefantasia'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['tempcnpj_endereco'])){
			//timestamp
			$postData['tempcnpj_endereco'] = $options['tempcnpj_endereco'];
		}else{
			$postData['tempcnpj_endereco'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['tempcnpj_nomeresp'])){
			//timestamp
			$postData['tempcnpj_nomeresp'] = $options['tempcnpj_nomeresp'];
		}else{
			$postData['tempcnpj_nomeresp'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['tempcnpj_emailresp'])){
			//timestamp
			$postData['tempcnpj_emailresp'] = $options['tempcnpj_emailresp'];
		}else{
			$postData['tempcnpj_emailresp'] = NULL;
		}
		
		//---------------------------------------------------
		
		if(isset($options['tempcnpj_dthcadastro'])){
			//timestamp
			$postData['tempcnpj_dthcadastro'] = $options['tempcnpj_dthcadastro'];
		}else{
			$postData['tempcnpj_dthcadastro'] = date("Y-m-d H:i:s");
		}
		
		//---------------------------------------------------
				
		if(isset($options['tempcnpj_ativo'])){
			//timestamp
			$postData['tempcnpj_ativo'] = $options['tempcnpj_ativo'];
		}else{
			$postData['tempcnpj_ativo'] = 'f';
		}
		
		//---------------------------------------------------
		
		if(isset($options['tempcnpj_dthprocess'])){
			//timestamp
			$postData['tempcnpj_dthprocess'] = $options['tempcnpj_dthprocess'];
		}else{
			$postData['tempcnpj_dthprocess'] = date("Y-m-d H:i:s");
		}
		
		//---------------------------------------------------
				
		$this->db->insert('temppessoajuridica', $postData);
		
		return $this->db->insert_id();
	}
	
	function UpdateTempPessoaJuridica($options = array())
	{
		if (!$this-> _required(
			Array('tempcnpj_id', 'tempcnpj_id'),
			$options)
		) return false;
		
		if(isset($options['tempcnpj_telefone']))
			$this->db->set('tempcnpj_telefone', $options['tempcnpj_telefone']);
			
		if(isset($options['tempcnpj_fax']))
			$this->db->set('tempcnpj_fax', $options['tempcnpj_fax']);
			
		if(isset($options['tempcnpj_email']))
			$this->db->set('tempcnpj_email', $options['tempcnpj_email']);
			
		if(isset($options['tempcnpj_cep']))
			$this->db->set('tempcnpj_cep', $options['tempcnpj_cep']);
			
		if(isset($options['tempcnpj_bairro']))
			$this->db->set('tempcnpj_bairro', $options['tempcnpj_bairro']);
			
		if(isset($options['tempcnpj_cidade']))
			$this->db->set('tempcnpj_cidade', $options['tempcnpj_cidade']);
			
		if(isset($options['tempcnpj_uf']))
			$this->db->set('tempcnpj_uf', $options['tempcnpj_uf']);
		
		if(isset($options['tempcnpj_cnpj_cod']))
			$this->db->set('tempcnpj_cnpj_cod', $options['tempcnpj_cnpj_cod']);
			
		if(isset($options['tempcnpj_nomefantasia']))
			$this->db->set('tempcnpj_nomefantasia', $options['tempcnpj_nomefantasia']);
			
		if(isset($options['tempcnpj_endereco']))
			$this->db->set('tempcnpj_endereco', $options['tempcnpj_endereco']);
			
		if(isset($options['tempcnpj_nomeresp']))
			$this->db->set('tempcnpj_nomeresp', $options['tempcnpj_nomeresp']);
			
		if(isset($options['tempcnpj_emailresp']))
			$this->db->set('tempcnpj_emailresp', $options['tempcnpj_emailresp']);
			
		if(isset($options['tempcnpj_dthcadastro']))
			$this->db->set('tempcnpj_dthcadastro', $options['tempcnpj_dthcadastro']);
			
		if(isset($options['tempcnpj_ativo']))
			$this->db->set('tempcnpj_ativo', $options['tempcnpj_ativo']);
			
		if(isset($options['tempcnpj_dthprocess']))
			$this->db->set('tempcnpj_dthprocess', $options['tempcnpj_dthprocess']);
			
		$this->db->where('tempcnpj_id', $options['tempcnpj_id']);
		$this->db->update('temppessoajuridica');
		
		return $this->db->affected_rows();
	}
	
	function GetTempPessoaJuridica($options = array())
	{
		if(isset($options['tempcnpj_telefone']))
			$this->db->where('tempcnpj_telefone', $options['tempcnpj_telefone']);
			
		if(isset($options['tempcnpj_fax']))
			$this->db->where('tempcnpj_fax', $options['tempcnpj_fax']);
			
		if(isset($options['tempcnpj_email']))
			$this->db->where('tempcnpj_email', $options['tempcnpj_email']);
			
		if(isset($options['tempcnpj_cep']))
			$this->db->where('tempcnpj_cep', $options['tempcnpj_cep']);
			
		if(isset($options['tempcnpj_bairro']))
			$this->db->where('tempcnpj_bairro', $options['tempcnpj_bairro']);
			
		if(isset($options['tempcnpj_cidade']))
			$this->db->where('tempcnpj_cidade', $options['tempcnpj_cidade']);
			
		if(isset($options['tempcnpj_uf']))
			$this->db->where('tempcnpj_uf', $options['tempcnpj_uf']);
		
		if(isset($options['tempcnpj_cnpj_cod']))
			$this->db->where('tempcnpj_cnpj_cod', $options['tempcnpj_cnpj_cod']);
			
		if(isset($options['tempcnpj_nomefantasia']))
			$this->db->where('tempcnpj_nomefantasia', $options['tempcnpj_nomefantasia']);
			
		if(isset($options['tempcnpj_endereco']))
			$this->db->where('tempcnpj_endereco', $options['tempcnpj_endereco']);
			
		if(isset($options['tempcnpj_nomeresp']))
			$this->db->where('tempcnpj_nomeresp', $options['tempcnpj_nomeresp']);
			
		if(isset($options['tempcnpj_emailresp']))
			$this->db->where('tempcnpj_emailresp', $options['tempcnpj_emailresp']);
			
		if(isset($options['tempcnpj_dthcadastro']))
			$this->db->where('tempcnpj_dthcadastro', $options['tempcnpj_dthcadastro']);
			
		if(isset($options['tempcnpj_ativo']))
			$this->db->where('tempcnpj_ativo', $options['tempcnpj_ativo']);
			
		if(isset($options['tempcnpj_dthprocess']))
			$this->db->where('tempcnpj_dthprocess', $options['tempcnpj_dthprocess']);
		
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('temppessoajuridica');

		if(isset($options['tempcnpj_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteTempPessoaJuridica($options = array())
	{
    
		if (!$this-> _required(
			Array('tempcnpj_id', 'tempcnpj_id'),
			$options)
		) return false;
		
		$this->db->where('tempcnpj_id', $options['tempcnpj_id']);
    	$this->db->delete('temppessoajuridica');
	}
}

?>