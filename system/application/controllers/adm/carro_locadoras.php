<?php
class Carro_Locadoras extends MyController {
	
	public $metatags;
	public $menu_sel;
	public $locadora;
	
	function Carro_Locadoras()
	{
		parent::__construct('admin');
		$this->css_js->add('js', '/js/adm/carro_lista_locadoras.js');
		$menu_uri = explode('_',$this->uri->segment(2));
		$this->menu_sel = $menu_uri[0];
	}
	
	function index()
	{
		$this->lista();
	}
	
	function lista()
	{
		$this->metatags->met_title = "Administração Layum - Veículos - Locadoras";
		$this->load->view('adm/carro_lista_locadoras');
	}
	
	function editar(){
		$this->css_js->add('js', '/js/adm/jquery.history_remote.pack.js');
		$this->css_js->add('js', '/js/adm/jquery.tabs.pack.js');
		$this->css_js->add('js', '/js/adm/jquery.tabs.pack.js');
		$this->css_js->add('css', '/css/adm/jquery.tabs.css');
		$this->css_js->add("function", NULL, "carregaTabs()");
		$this->metatags->met_title = "Administração Layum - Veículo - Locadora Editar";
		$get_vars = $this->uri->ruri_to_assoc(3);
		$vars = explode ('&',$get_vars['options']);
		$vars = str_replace('?','',$vars);
		foreach($vars as $param){
			$values = explode('=',$param);
			$this->get_vars[$values[0]] = $values[1];
		}
		$loc_id = $this->get_vars['id'];
		$this->session->set_userdata('edit_id', $loc_id);
		$locadora = $this->get('Locadora_model', array('loc_id' => $loc_id));
		$this->locadora = $locadora[0];
		$this->load->view('adm/carro_edita_locadoras');
	}
}

/* End of file carro_locadoras.php */
/* Location: ./system/application/controllers/adm/carro_locadoras.php */