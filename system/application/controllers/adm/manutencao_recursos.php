<?php
class Manutencao_Recursos extends MyController {
	
	public $metatags;
	public $menu_sel;
	public $recurso;
	
	function Manutencao_Recursos()
	{
		parent::__construct('admin');
		$this->css_js->add('js', '/js/adm/manutencao_lista_recursos.js');
		$menu_uri = explode('_',$this->uri->segment(2));
		$this->menu_sel = $menu_uri[0];
	}
	
	function index()
	{
		$this->lista();
	}
	
	function lista()
	{
		$this->metatags->met_title = "Administração Layum - Manutenção - Recursos";
		$this->load->view('adm/manutencao_lista_recursos');
	}
	
	function crud()
	{
		switch($this->input->post('oper')){
			case 'add':
				$this->inserir();
				break;
			case 'del':
				$this->excluir();
				break;
			case 'edit':
				$this->editar();
				break;
		}
	}
	
	function inserir(){
		if($this->auth_acl->hasAuth('manutencao_recursos-inserir')){
			$this->insert('Recursos_model', array(
					'rec_nome' 	=> $this->input->post('rec_nome')
				)
			);
		}else{
			return false;
		}
	}
	
	function excluir(){
		if($this->auth_acl->hasAuth('manutencao_recursos-excluir')){
			$this->delete('Recursos_model', array(
					'rec_id' 	=> $this->input->post('id')
				)
			);
		}else{
			return false;
		}
	}
	
	function editar(){
		if($this->auth_acl->hasAuth('manutencao_recursos-editar')){
			$this->recurso = $this->get('Recursos_model', array('rec_id' => $this->input->post('id')));
			$novo = clone $this->recurso;
			$novo->rec_nome = $this->input->post('rec_nome');
			$this->update('Recursos_model', $novo, $this->recurso);
		}else{
			return false;
		}
	}
}

/* End of file manutencao_recursos.php */
/* Location: ./system/application/controllers/adm/manutencao_recursos.php */