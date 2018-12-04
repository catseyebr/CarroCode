<?php
class Carro_paginas extends MyController {
	
	public $metatags;
	public $depoimento;
	public $maisReservados;
	public $arrayHoras = array();
	public $pagina;
	public $locadoras;
	public $menu;
	public $cidade_definida;
	public $cidade_definida2;
	
	function Carro_paginas()
	{
		parent::__construct('site');
		
		$this->load->library('locadora');
		$this->pagina = $this->getPage('home');
		$this->metatags = $this->get('Metatags_model', array('met_id' => $this->pagina[0]->pag_met_id));
		$this->metatags->author = 'Layum Travel';
    	$this->metatags->copyright = 'Layum Travel - '.date('Y');
    	$this->css_js->add('js', '/js/jquery-plus-jquery-ui.js');
    	$this->css_js->add('js', '/js/jtip.js');
    	$this->css_js->add('js', '/js/flash.js');
    	$this->css_js->add('js', '/js/SpryValidationTextField.js');
    	$this->css_js->add('js', '/js/'.SITE.'/site_js.js');
    	$this->css_js->add('js', '/js/jquery.autocomplete.js');
    	$this->css_js->add('js', '/js/jquery.datePickerMultiMonth.js');
    	$this->css_js->add('js', '/js/SpryValidationSelect.js');
    	$this->css_js->add('js', '/js/'.SITE.'/pesquisa.js');
		$this->css_js->add('css', '/css/'.SITE.'/jquery-ui.css');
		
		$locadoras_ativas = $this->get('locadora_model', NULL, 'GetLocAtivas');
		foreach($locadoras_ativas as $active => $id){
			$loc[$active] = new Locadora();
			$loc[$active]->setLocadora($id->loc_id);
		}
		$this->menu->locadoras = $loc;
		$categorias_ativas = $this->get('categoria_model', array('sortBy' => 'cat_ordem', 'sortDirection' => 'ASC'));
		$this->menu->categorias = $categorias_ativas;
	}
	
	function dicas()
	{
		$this->load->view(SITE.'/dicas');
	}
	
	function condicoes()
	{
		$this->load->view(SITE.'/condicoes');
	}
	
	function cadastroLocadora()
	{
		$this->css_js->add('js', '/js/'.SITE.'/jquery.validationEngine-br.js');
		$this->css_js->add('js', '/js/'.SITE.'/jquery.validationEngine.js');
		$this->css_js->add('js', '/js/'.SITE.'/ajax_calls.js');
		$this->css_js->add('js', '/js/'.SITE.'/validation_cadastro_locadora.js');
		$this->css_js->add("function", NULL, "loadEnd()");
		$this->css_js->add('css', '/css/'.SITE.'/validationEngine.jquery.css');
		$this->estados = $this->get('estado_model', NULL, 'GetEstdo');
		$this->load->view(SITE.'/cadastro_locadora');
	}
	
	function cadastro_locadora()
	{
		$inserttemploc = array(
			'temploc_tlocst_id' 	=> 1,
			'temploc_nome' 			=> $this->input->post('locadora'),
			'temploc_cnpj' 			=> $this->input->post('cnpj'),
			'temploc_telefone' 		=> $this->input->post('telefone'),
			'temploc_fax' 			=> $this->input->post('fax'),
			'temploc_tollfree' 		=> $this->input->post('tollfree'),
			'temploc_email' 		=> $this->input->post('email'),
			'temploc_nomecon' 		=> $this->input->post('nome_contato'),
			'temploc_funcaocon' 	=> $this->input->post('cargo'),
			'temploc_cep' 			=> $this->input->post('end_cep'),
			'temploc_rua' 			=> $this->input->post('end_endereco'),
			'temploc_bairro' 		=> $this->input->post('end_bairro'),
			'temploc_uf' 			=> $this->input->post('end_estado'),
			'temploc_cidade' 		=> $this->input->post('end_cidade'),
			'temploc_dthcadastro'	=> date("Y-m-d H:i:s"),
			'temploc_ativo' 		=> 'f',
			'temploc_dthprocess'	=> date("Y-m-d H:i:s")
		);
		$this->insert('Templocadora_model', $inserttemploc);	
		redirect('/home');	
	}
}

/* End of file carro_home.php */
/* Location: ./system/application/controllers/carro_home.php */