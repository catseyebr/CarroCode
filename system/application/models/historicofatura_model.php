<?php

class HistoricoFatura_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}

	function AddHistoricoFatura($options = array())
	{
		if (!$this-> _required(
			Array('histfat_id', 'histfat_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('histfat_fat_id', 'histfat_fat_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('histfat_dthcadastro', 'histfat_dthcadastro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('histfat_finstatus_id', 'histfat_finstatus_id'),
			$options)
		) return false;
					
		$postData = array(
						//integer - histfat_id
						'histfat_id' => $options['histfat_id'],
		
						//integer - histfat_fat_id
						'histfat_fat_id' => $options['histfat_fat_id'],
		
						//date - histfat_dthcadastro
						'histfat_dthcadastro' => $options['histfat_dthcadastro'],
		
						//integer - histfat_finstatus_id
						'histfat_finstatus_id' => $options['histfat_finstatus_id']
		
					);
		$this->db->insert('historicofatura', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateHistoricoFatura($options = array())
	{
		if (!$this-> _required(
			Array('histfat_id', 'histfat_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('histfat_fat_id', 'histfat_fat_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('histfat_dthcadastro', 'histfat_dthcadastro'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('histfat_finstatus_id', 'histfat_finstatus_id'),
			$options)
		) return false;
										
		if(isset($options['histfat_fat_id']))
			$this->db->set('histfat_fat_id', $options['histfat_fat_id']);
			
		if(isset($options['histfat_dthcadastro']))
			$this->db->set('histfat_dthcadastro', $options['histfat_dthcadastro']);
			
		if(isset($options['histfat_finstatus_id']))
			$this->db->set('histfat_finstatus_id', $options['histfat_finstatus_id']);
			
		$this->db->where('histfat_id', $options['histfat_id']);
		$this->db->update('historicofatura');
		
		return $this->db->affected_rows();
	}
	
	function GetHistoricoFatura($options = array())
	{
		if(isset($options['histfat_id']))
			$this->db->where('histfat_id', $options['histfat_id']);
			
		if(isset($options['histfat_fat_id']))
			$this->db->where('histfat_fat_id', $options['histfat_fat_id']);
		
		if(isset($options['histfat_dthcadastro']))
			$this->db->where('histfat_dthcadastro', $options['histfat_dthcadastro']);
			
		if(isset($options['histfat_finstatus_id']))
			$this->db->where('histfat_finstatus_id', $options['histfat_finstatus_id']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('historicofatura');

		if(isset($options['histfat_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteHistoricoFatura($options = array())
	{
    
		if (!$this-> _required(
			Array('histfat_id', 'histfat_id'),
			$options)
		) return false;
		
		$this->db->where('histfat_id', $options['histfat_id']);
    	$this->db->delete('historicofatura');
	}
}

?>