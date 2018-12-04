<?php
class Carro_Lojas extends MyController {
	
	public $metatags;
	public $menu_sel;
	public $loja;
	
	function Carro_lojas()
	{
		parent::__construct('admin');
		$this->css_js->add('js', '/js/adm/carro_lista_lojas.js');
		$menu_uri = explode('_',$this->uri->segment(2));
		$this->menu_sel = $menu_uri[0];
	}
	
	function index()
	{
		$this->lista();
	}
	
	function lista()
	{
		$this->metatags->met_title = "Administração Layum - Veículos - Lojas";
		$this->load->view('adm/carro_lista_lojas');
	}
	
	function editar(){
		$this->css_js->add('js', '/js/adm/jquery.history_remote.pack.js');
		$this->css_js->add('js', '/js/adm/jquery.tabs.pack.js');
		$this->css_js->add('js', '/js/adm/jquery.tabs.pack.js');
		$this->css_js->add('css', '/css/adm/jquery.tabs.css');
		$this->css_js->add("function", NULL, "carregaTabs()");
		$this->metatags->met_title = "Administração Layum - Veículo - Loja Editar";
		$get_vars = $this->uri->ruri_to_assoc(3);
		$vars = explode ('&',$get_vars['options']);
		$vars = str_replace('?','',$vars);
		foreach($vars as $param){
			$values = explode('=',$param);
			$this->get_vars[$values[0]] = $values[1];
		}
		$loj_id = $this->get_vars['id'];
		$this->session->set_userdata('edit_id', $loj_id);
		$locadora = $this->get('Loja_model', array('loj_id' => $loj_id));
		$this->loja = $loja[0];
		$this->load->view('adm/carro_edita_lojas');
	}
}

/* End of file carro_locadoras.php */
/* Location: ./system/application/controllers/adm/carro_lojas.php */