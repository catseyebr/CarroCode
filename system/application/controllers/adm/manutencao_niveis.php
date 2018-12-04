<?php
class Manutencao_Niveis extends MyController {
	
	public $metatags;
	public $menu_sel;
	public $get_vars;
	public $nivel;
	
	function Manutencao_Niveis()
	{
		parent::__construct('admin');
		$this->css_js->add('js', '/js/adm/manutencao_lista_niveis.js');
		$menu_uri = explode('_',$this->uri->segment(2));
		$this->menu_sel = $menu_uri[0];
	}
	
	function index()
	{
		$this->lista();
	}
	
	function lista()
	{
		$this->metatags->met_title = "Administração Layum - Manutenção - Níveis Editar";
		$this->load->view('adm/manutencao_lista_niveis');
	}
	
	function crud()
	{
		switch($this->input->post('oper')){
			case 'add':
				$this->recursos_inserir();
				break;
			case 'del':
				$this->recursos_excluir();
				break;
		}
	}
	
	function recursos_inserir(){
		if($this->auth_acl->hasAuth('manutencao_niveis-inserir')){
			$this->insert('Recursos_model', array(
					'nre_rec_id' 	=> $this->input->post('rec_id'),
					'nre_niv_id'	=> $this->input->post('niv_id')
				)
			);
		}else{
			return false;
		}
	}
	
	function recursos_excluir(){
		if($this->auth_acl->hasAuth('manutencao_niveis-excluir')){
			$this->delete('Recursos_model', array(
					'rec_id' 	=> $this->input->post('id')
				)
			);
		}else{
			return false;
		}
	}
	
	function editar(){
		$this->css_js->add('js', '/js/adm/manutencao_edita_niveis.js');
		$this->metatags->met_title = "Administração Layum - Manutenção - Níveis Editar";
		$get_vars = $this->uri->ruri_to_assoc(3);
		$vars = explode ('&',$get_vars['options']);
		$vars = str_replace('?','',$vars);
		foreach($vars as $param){
			$values = explode('=',$param);
			$this->get_vars[$values[0]] = $values[1];
		}
		$niv_id = $this->get_vars['id'];
		$this->session->set_userdata('edit_id', $niv_id);
		$this->nivel = $this->get('Niveis_model', array('niv_id' => $niv_id));
		$this->load->view('adm/manutencao_edita_niveis');
	}
	
	function salvar(){
		$this->nivel = $this->get('Niveis_model', array('niv_id' => $this->input->post('niv_id')));
		$this->form_validation->set_rules('niv_nome', 'Nome do Nível', 'required');
		if ($this->form_validation->run()) {
			$novo = clone $this->nivel;
			$novo->niv_nome = $this->input->post('niv_nome');
			$atualizar_nivel = $this->update('Niveis_model', $novo, $this->nivel);
			if($atualizar_nivel){
				$this->css_js->add("function", NULL, "alert('Dados atualizados com sucesso!');");
				$this->nivel = $novo;
			} else {
				$this->css_js->add("function", NULL, "alert('Nenhum dado salvo!');");
			}
		}
		redirect('/adm/manutencao_niveis/lista');
	}
}

/* End of file manutencao_niveis.php */
/* Location: ./system/application/controllers/adm/manutencao_niveis.php */