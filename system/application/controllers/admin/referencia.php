<?php
class Referencia extends MyController {
	public $data = array();
	public $hotel = array();
	public $referencia= array();
	function Referencia()
	{
		parent::__construct('Admin');
	}
	
	function index()
	{
		redirect('/admin/referencia/lista');
	}
	
	function lista()
	{
		redirect('/admin/hoteis/exibir/'.$this->uri->segment(4).'#referencia');
	}
	
	function inserir()
	{
		$this->setHotel();
		if ($this->hotel != NULL && $this->hotel != FALSE) {
			$this->metatags['title'] = "Adicionar refer&ecirc;ncia - Lista de Hot&eacute;is - Administra&ccedil;&atilde;o Reserva de Hotel Online";
			$this->form_validation->set_rules('ref_nome', 'Nome', 'required');
			$this->form_validation->set_rules('ref_distancia', 'Dist&acirc;ncia', 'required');
			$this->form_validation->set_rules('ref_tipo', 'Tipo', 'required');
			if($this->form_validation->run())
			{
				$adicionar_referencia = $this->insert('Referencias_model', array(
																				'ref_nome' => $this->input->post('ref_nome'),
																				'ref_distancia' => $this->input->post('ref_distancia'),
																				'ref_tipo' => $this->input->post('ref_tipo')
																				));
				if($adicionar_referencia){
					$adicionar_hotelReferencia = $this->insert('HoteisReferencias_model', array(
																				'hre_idhotel' => $this->input->post('hot_id'),
																				'hre_idreferencia' => $adicionar_referencia
																				));
				}																		
				if($adicionar_hotelReferencia){
						redirect(site_url('admin/hoteis/exibir')."/".$this->hotel->hot_id."#referencias");
				}
				
			}
			$this->load->view('admin/referencias_inserir');
		}else{
			redirect('/admin/hoteis/lista');
		}
	}
	
	function editar()
	{
		$this->setHotel();
		if ($this->hotel != NULL && $this->hotel != FALSE) {
			$this->metatags['title'] = "Atualizar refer&ecirc;ncia - Lista de Hot&eacute;is - Administra&ccedil;&atilde;o Reserva de Hotel Online";
			$this->referencia = $this->get('Referencias_model', array('ref_id' => $this->uri->segment(5)));
    		$this->form_validation->set_rules('ref_nome', 'Nome', 'required');
			$this->form_validation->set_rules('ref_distancia', 'Dist&acirc;ncia', 'required');
			$this->form_validation->set_rules('ref_tipo', 'Tipo', 'required');
			if($this->form_validation->run())
			{
				$novo = clone $this->referencia;
	    		$novo->ref_nome = $this->input->post('ref_nome');
	    		$novo->ref_distancia = $this->input->post('ref_distancia');
	    		$novo->ref_tipo = $this->input->post('ref_tipo');
				$atualizar_referencia = $this->update('Referencias_model', $novo, $this->referencia);
				if($atualizar_referencia){
					redirect(site_url('admin/hoteis/exibir')."/".$this->hotel->hot_id."#referencias");
				}
			}
			$this->load->view('admin/referencias_editar');
		}else{
			redirect('/admin/hoteis/lista');
		}
	}
	
	function excluir()
	{
		$this->setHotel();
		if ($this->hotel != NULL && $this->hotel != FALSE) {     
	      if ($this->delete('HoteisReferencias_model', array(
															'hre_idhotel' => $this->hotel->hot_id,
															'hre_idreferencia' => $this->uri->segment(5)
															)) != '')
			{
				if ($this->delete('Referencias_model', array(
															'ref_id' => $this->uri->segment(5)
															)) != '')
				{
	        		$this->session->set_userdata('msg', 'Referência excluída com sucesso!');
	      		} else {
	        		$this->session->set_userdata('msg', 'Erro ao excluir referência!');
	      		}
	    	}
	    redirect(site_url('admin/hoteis/exibir')."/".$this->hotel->hot_id."#referencias");
		}
	}
	
	private function setHotel () {
    	$hot_id = intval($this->uri->segment(4));
      
    	if ($hot_id > 0) {
    		$this->hotel = $this->get('Hoteis_model', array(
                                                        'hot_id' => $hot_id
    													));
    		}
    	if (!$this->auth_acl->hasAuth('superadmin')) {
      		if (!in_array($this->hotel->hot_id, $this->hoteis_acesso)) {
        		redirect('/admin/hoteis/lista');
      		}
    	}
  	}
}
/* End of file referencia.php */
/* Location: ./system/application/controllers/admin/referencia.php */