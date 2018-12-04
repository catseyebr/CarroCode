<?php

class ReservasCarrosConf_model extends Model
{
	function _required($required, $data)
	{
		foreach($required as $field)
			if($data[$field] == '') return false;
		return true;
	}
	

	function AddReservasCarrosConf($options = array())
	{
		if (!$this-> _required(
			Array('rescarconf_id', 'rescarconf_id'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescarconf_nmbconf', 'rescarconf_nmbconf'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescarconf_nomeconf', 'rescarconf_nomeconf'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescarconf_xml_send', 'rescarconf_xml_send'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescarconf_xml_receive', 'rescarconf_xml_receive'),
			$options)
		) return false;
		if (!$this-> _required(
			Array('rescarconf_dthcadastro', 'rescarconf_dthcadastro'),
			$options)
		) return false;
		
				
		$postData = array(
						//integer - rescarconf_id
						'rescarconf_id' => $options['rescarconf_id'],
		
						//char - rescarconf_nmbconf
						'rescarconf_nmbconf' => $options['rescarconf_nmbconf'],
		
						//char - rescarconf_nomeconf
						'rescarconf_nomeconf' => $options['rescarconf_nomeconf'],
		
						//text - rescarconf_xml_send
						'rescarconf_xml_send' => $options['rescarconf_xml_send'],
		
						//text - rescarconf_xml_receive
						'rescarconf_xml_receive' => $options['rescarconf_xml_receive'],
		
						//date - rescarconf_dthcadastro
						'rescarconf_dthcadastro' => $options['rescarconf_dthcadastro'],
		
					);
		$this->db->insert('reservascarrosconf', $postData);
		return $this->db->insert_id();
	}
	
	function UpdateReservasCarrosConf($options = array())
	{
		if (!$this-> _required(
			Array('rescarconf_id', 'rescarconf_id'),
			$options)
		) return false;
		
		if(isset($options['rescarconf_nmbconf']))
			$this->db->set('rescarconf_nmbconf', $options['rescarconf_nmbconf']);
			
		if(isset($options['rescarconf_nomeconf']))
			$this->db->set('rescarconf_nomeconf', $options['rescarconf_nomeconf']);
			
		if(isset($options['rescarconf_xml_send']))
			$this->db->set('rescarconf_xml_send', $options['rescarconf_xml_send']);
			
		if(isset($options['rescarconf_xml_receive']))
			$this->db->set('rescarconf_xml_receive', $options['rescarconf_xml_receive']);
			
		if(isset($options['rescarconf_dthcadastro']))
			$this->db->set('rescarconf_dthcadastro', $options['rescarconf_dthcadastro']);
			
		$this->db->where('rescarconf_id', $options['rescarconf_id']);
		$this->db->update('reservascarrosconf');
		
		return $this->db->affected_rows();
	}
	
	function GetReservasCarrosConf($options = array())
	{
		if(isset($options['rescarconf_id']))
			$this->db->where('rescarconf_id', $options['rescarconf_id']);
			
		if(isset($options['rescarconf_nmbconf']))
			$this->db->where('rescarconf_nmbconf', $options['rescarconf_nmbconf']);
			
		if(isset($options['rescarconf_nomeconf']))
			$this->db->where('rescarconf_nomeconf', $options['rescarconf_nomeconf']);
			
		if(isset($options['rescarconf_xml_send']))
			$this->db->where('rescarconf_xml_send', $options['rescarconf_xml_send']);
			
		if(isset($options['rescarconf_xml_receive']))
			$this->db->where('rescarconf_xml_receive', $options['rescarconf_xml_receive']);
			
		if(isset($options['rescarconf_dthcadastro']))
			$this->db->where('rescarconf_dthcadastro', $options['rescarconf_dthcadastro']);
			
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);

		$query = $this->db->get('reservascarrosconf');

		if(isset($options['rescarconf_id']))
			return $query->row(0);
		return $query->result();
	}
	
	function DeleteReservasCarrosConf($options = array())
	{
    
		if (!$this-> _required(
			Array('rescarconf_id', 'rescarconf_id'),
			$options)
		) return false;
		
		$this->db->where('rescarconf_id', $options['rescarconf_id']);
    	$this->db->delete('reservascarrosconf');
	}
}

?>