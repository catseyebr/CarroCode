<?php
class Carro_pesquisa extends MyController {
	
	public $metatags;
	public $depoimento;
	public $maisReservados;
	public $arrayHoras = array();
	public $pagina;
	public $locadoras;
	public $locadora;
	public $menu;
	public $dadosPesquisa;
	public $dadoPesquisado;
	public $formPesquisa;
	public $disponiveis;
	public $tarifa_cotacao;
	public $str_data_retirada;
	public $str_data_devolucao;
	public $city_ret;
	public $city_dev;
	public $protecoes_disponiveis;
	public $id_pesquisa;
	public $disponibilidade_nula;
	public $estados;
	public $pesquisa_values;
	public $cliente;
	public $end_cliente;
	public $contatos_cliente;
	public $protecao;
	public $grupo;
	
	function Carro_pesquisa()
	{
		parent::__construct('site');
		
		$this->load->library('locadora');
		$this->load->library('encrypt');
		$this->pagina = $this->getPage('home');
		$this->metatags = $this->get('Metatags_model', array('met_id' => $this->pagina[0]->pag_met_id));
		$this->metatags->author = 'Layum Travel';
    	$this->metatags->copyright = date('Y').' Layum Travel';
    	$this->css_js->add('js', '/js/'.SITE.'/jquery-plus-jquery-ui.js');
    	$this->css_js->add('js', '/js/'.SITE.'/jtip.js');
    	$this->css_js->add('js', '/js/'.SITE.'/flash.js');
    	$this->css_js->add('js', '/js/'.SITE.'/site_js.js');
    	$this->css_js->add('js', '/js/'.SITE.'/jquery.autocomplete.js');
    	$this->css_js->add('js', '/js/'.SITE.'/jquery.datePickerMultiMonth.js');
    	$this->css_js->add('js', '/js/'.SITE.'/SpryValidationTextField.js');
		$this->css_js->add('js', '/js/'.SITE.'/SpryValidationSelect.js');
		$this->css_js->add('js', '/js/'.SITE.'/resultado_pesquisa.js');
    	$this->css_js->add('js', '/js/'.SITE.'/pesquisa.js');
		$this->css_js->add('js', '/js/'.SITE.'/jquery.dimensions.js');
		$this->css_js->add('js', '/js/'.SITE.'/jquery.accordion.js');
		$this->css_js->add('js', '/js/'.SITE.'/SpryCollapsiblePanel.js');
		$this->css_js->add('js', '/js/'.SITE.'/google_head.js');
		
    	$this->css_js->add('css', '/css/'.SITE.'/jquery-ui.css');
		$this->css_js->add('css', '/css/'.SITE.'/resultado_pesquisa.css');
		$this->css_js->add('css', '/css/'.SITE.'/flora.accordion.css');
		$this->css_js->add('css', '/css/'.SITE.'/SpryValidationTextField.css');
		$this->css_js->add('css', '/css/'.SITE.'/SpryValidationSelect.css');
		
		$locadoras_ativas = $this->get('locadora_model', NULL, 'GetLocAtivas');
		foreach($locadoras_ativas as $active => $id){
			$loc[$active] = new Locadora();
			$loc[$active]->setLocadora($id->loc_id);
		}
		$this->menu->locadoras = $loc;
		$categorias_ativas = $this->get('categoria_model', array('sortBy' => 'cat_ordem', 'sortDirection' => 'ASC'));
		$this->menu->categorias = $categorias_ativas;
		
		for($i = 0; $i < 96; $i++){
			$add = $i * 15;
			$this->arrayHoras[] = date('H:i', mktime('00','00'+$add,'00','12','25','2010'));
		}
		
		$this->disponibilidade_nula = FALSE;
		$this->session->set_userdata('pesquisa', array(
				'id' 				=> NULL,
				'cid_retirada' 		=> NULL,
				'cid_devolucao' 	=> NULL,
				'date_retirada' 	=> NULL,
				'date_devolucao' 	=> NULL,
				'hora_retirada' 	=> NULL,
				'hora_devolucao' 	=> NULL,
				'locadora' 			=> NULL,
				'categoria' 		=> NULL
			)
		);
		
	}
	
	function index()
	{
		$this->comparacao();
	}
	
	function comparacao()
	{
		$this->dadosPesquisa();
		$this->load->view(SITE.'/resultado_pesquisa');
	}
	
	function porgrupo()
	{
		$this->dadosPesquisa();
		$this->css_js->add('js', '/js/'.SITE.'/resultado_pesquisa_grupo.js');
		$this->load->view(SITE.'/resultado_pesquisa_grupo');
	}
	
	function porlocadora()
	{
		$this->dadosPesquisa();
		$this->load->view(SITE.'/resultado_pesquisa_locadora');
	}
	
	function selecionaLoja()
	{
		$this->dadoPesquisado();
		$this->load->library('tarifacarro');
		$this->tarifa_cotacao = new TarifaCarro();
		$this->tarifa_cotacao->setTarifa($this->dadoPesquisado->grupo,$this->dadoPesquisado->protecao,$this->dadoPesquisado->data_ret,$this->dadoPesquisado->data_dev,$this->dadoPesquisado->lojareti);
		if(isset($this->dadoPesquisado->city_ret->id) && isset($this->dadoPesquisado->city_ret->id)){
			$this->tarifa_cotacao->getLojasDisponiveis($this->dadoPesquisado->city_ret->id, $this->dadoPesquisado->city_dev->id);
		}
		$this->str_data_retirada = parent::dateStdToBr($this->tarifa_cotacao->data_inicial)." ".$this->tarifa_cotacao->hora_inicial." ".parent::getNomeSemana($this->tarifa_cotacao->week_inicial);
		$this->str_data_devolucao = parent::dateStdToBr($this->tarifa_cotacao->data_final)." ".$this->tarifa_cotacao->hora_final." ".parent::getNomeSemana($this->tarifa_cotacao->week_final);
		$this->load->view(SITE.'/seleciona_loja');
	}
	
	function selecionaSeguro()
	{
		$this->session->set_userdata('pesquisa_id', NULL);
		$this->dadoPesquisado();
		$this->load->library('tarifacarro');
		$this->tarifa_cotacao = new TarifaCarro();
		$this->tarifa_cotacao->setTarifa($this->dadoPesquisado->grupo,$this->dadoPesquisado->protecao,$this->dadoPesquisado->data_ret,$this->dadoPesquisado->data_dev,$this->dadoPesquisado->lojareti);
		if(isset($this->dadoPesquisado->city_ret->id) && isset($this->dadoPesquisado->city_ret->id)){
			$this->tarifa_cotacao->getLojasDisponiveis($this->dadoPesquisado->city_ret->id, $this->dadoPesquisado->city_dev->id);
		}
		$this->str_data_retirada = parent::dateStdToBr($this->tarifa_cotacao->data_inicial)." ".$this->tarifa_cotacao->hora_inicial." ".parent::getNomeSemana($this->tarifa_cotacao->week_inicial);
		$this->str_data_devolucao = parent::dateStdToBr($this->tarifa_cotacao->data_final)." ".$this->tarifa_cotacao->hora_final." ".parent::getNomeSemana($this->tarifa_cotacao->week_final);
		$this->protecoes_disponiveis = $this->get('protecoesgrupo_model', array('protgrp_grp_id' => $this->dadoPesquisado->grupo,'sortBy' => 'prot_ordem', 'sortDirection' => 'ASC'));
		foreach ($this->protecoes_disponiveis as $prot_dispo => $prot_value){
			$prot_value->tarifa = $this->get('tarifaprotecoes_model', array(
					'tarprot_prot_id' 			=> $prot_value->prot_id,
					'tarprot_ativo' 			=> 't',
					'tarprot_ndiainicial' 		=> 1,
					'tarprot_ndiafinal' 		=> 1,
					'tarprot_validadeinicial' 	=> $this->tarifa_cotacao->data_inicial,
					'tarprot_validadefinal' 	=> $this->tarifa_cotacao->data_final
				)
			);
		}
		$this->load->view(SITE.'/seleciona_seguro');
	}
	
	function inserirPesquisa()
	{
		if(!isset($_SESSION['pesquisa_id'])){
			$inserepesquisa = $this->insert('Reservascarrospesquisa_model', array(
					'rsvcarp_loj_id_retirar' 	=> $this->input->post('id_loja_retirar'),
					'rsvcarp_loj_id_devolver'	=> $this->input->post('id_loja_devolver'),
					'rsvcarp_prot_id'			=> $this->input->post('id_protecao'),
					'rsvcarp_grp_id'			=> $this->input->post('id_grupo'),
					'rsvcarp_loc_id'			=> $this->input->post('id_locadora'),
					'rsvcarp_data_retirar'		=> $this->input->post('data_retirar'),
					'rsvcarp_data_devolver'		=> $this->input->post('data_devolver'),
					'rsvcarp_diarias'			=> $this->input->post('diarias'),
					'rsvcarp_horas_extra'		=> $this->input->post('hora_extra'),
					'rsvcarp_diaria_extra'		=> ($this->input->post('diaria_extra')==TRUE)?'t':'f',
					'rsvcarp_opcionais_array'	=> $this->input->post('opcionais'),
					'rsvcarp_vlr_diarias'		=> (float)$this->input->post('valor_diarias'),
					'rsvcarp_vlr_protecao'		=> (float)$this->input->post('valor_protecao'),
					'rsvcarp_vlr_horas_extra'	=> (float)$this->input->post('valor_horas_extra'),
					'rsvcarp_vlr_taxas'			=> (float)$this->input->post('valor_taxas'),
					'rsvcarp_vlr_opcionais'		=> NULL,
					'rsvcarp_vlr_total'			=> (float)$this->input->post('valor_total'),
					'rsvcarp_referencia'		=> $this->agent->referrer(),
					'rsvcarp_useragent'			=> $this->agent->agent_string(),
					'rsvcarp_hostip'			=> $this->input->ip_address(),
					'rsvcarp_access_key'		=> md5($this->input->post('id_loja_retirar')."-".$this->input->post('id_loja_devolver')."-".$this->input->post('id_grupo')."-".$this->input->post('data_retirar')."-".$this->input->post('data_devolver'))
				)
			);
		}
		if(!isset($inserepesquisa) && $_SESSION['pesquisa_id']!=NULL){
			$inserepesquisa = $_SESSION['pesquisa_id'];
		}else{
			$this->session->set_userdata('pesquisa_id', $inserepesquisa);
		}
		$this->loginReserva();
	}
	
	function loginReserva()
	{
		$this->css_js->add('js', '/js/'.SITE.'/jquery.validationEngine-br.js');
		$this->css_js->add('js', '/js/'.SITE.'/jquery.validationEngine.js');
		$this->css_js->add('js', '/js/'.SITE.'/ajax_calls.js');
		$this->css_js->add('js', '/js/'.SITE.'/validation_login.js');
		$this->css_js->add('css', '/css/'.SITE.'/validationEngine.jquery.css');
		$this->load->view(SITE.'/login_reserva');
	}
	
	function cadastroCpfReserva()
	{
		$this->css_js->add('js', '/js/'.SITE.'/jquery.validationEngine-br.js');
		$this->css_js->add('js', '/js/'.SITE.'/jquery.validationEngine.js');
		$this->css_js->add('js', '/js/'.SITE.'/ajax_calls.js');
		$this->css_js->add('js', '/js/'.SITE.'/validation_cadastro_cpf.js');
		$this->css_js->add("function", NULL, "loadEnd()");
		$this->css_js->add('css', '/css/'.SITE.'/validationEngine.jquery.css');
		$this->estados = $this->get('estado_model', NULL, 'GetEstdo');
		$this->load->view(SITE.'/cadastro_cpf');
	}
	
	function inserirCpf()
	{
		$crypt = new CI_Encrypt();
		$senha = $crypt->encode($this->input->post('email'));
		$nome = preg_split('/ /',$this->input->post('nome'), 2);
		$cpf_endereco = $this->insert('endereco_model', array(
				'end_endereco' 		=> $this->input->post('end_endereco'),
				'end_numero' 		=> $this->input->post('numero'),
				'end_bairro' 		=> $this->input->post('end_bairro'),
				'end_complemento' 	=> $this->input->post('end_complemento'),
				'end_city_id' 		=> $this->input->post('end_cidade'),
				'end_cep_codigo'	=> $this->input->post('end_cep')
			)
		);
		$novo_usuario = $this->insert('Pessoafisica_model', array(
				'cpf_nome' 			=> (isset($nome[0]))?$nome[0]:'',
				'cpf_end_id'		=> $cpf_endereco,
				'cpf_sobrenome'		=> (isset($nome[1]))?$nome[1]:'',
				'cpf_numero' 		=> $this->input->post('cpf'),
				'cpf_dtnasc'		=> parent::dateBrToStd2($this->input->post('dt_nascimento')),
				'cpf_ativo' 		=> 't',
				'cpf_dthcadastro'	=> date("Y-m-d H:i:s")
			)
		);
		$user_login = $this->insert('Usuario_model', array(
				'usu_login' => $this->input->post('cpf'),
				'usu_cpf_id'=> (integer)$novo_usuario,
				'usu_senha' => $senha
			)
		);
		$cliente = $this->insert('Cliente_model', array(
				'cli_usu_id'	=> $user_login,
				'cli_ref_id'	=> $user_login,
				'cli_tipo_id' 	=> $user_login
			)
		);
		$this->insert('Usuariocliente_model', array(
				'usucli_cli_id'	=> $cliente,
				'usucli_usu_id'	=> $user_login
			)
		);
		$telefone = $this->insert('Contato_model', array(
				'con_conref_id' 	=> (integer)$this->get('Contatoref_model', array('conref_nome' => 'Telefone'), 'GetContatoRefId'),
				'con_value'			=> $this->input->post('telefone')
			)
		);
		$this->insert('Contatopf_model', array(
				'conpf_con_id' 	=> $telefone,
				'conpf_cpf_id'	=> $novo_usuario
			)
		);
		if($this->input->post('fax')!=''){
			$fax = $this->insert('Contato_model', array(
					'con_conref_id' 	=> (integer)$this->get('Contatoref_model', array('conref_nome' => 'Fax'), 'GetContatoRefId'),
					'con_value'			=> $this->input->post('fax')
				)
			);
			$this->insert('Contatopf_model', array(
					'conpf_con_id' 	=> $fax,
					'conpf_cpf_id'	=> $novo_usuario
				)
			);
		}
		$email = $this->insert('Contato_model', array(
				'con_conref_id' 	=> (integer)$this->get('Contatoref_model', array('conref_nome' => 'Email'), 'GetContatoRefId'),
				'con_value'			=> $this->input->post('email')
			)
		);
		$this->insert('Contatopf_model', array(
				'conpf_con_id' 	=> $email,
				'conpf_cpf_id'	=> $novo_usuario
			)
		);
		if($this->input->post('celular')!=''){
			$celular = $this->insert('Contato_model', array(
					'con_conref_id' 	=> (integer)$this->get('Contatoref_model', array('conref_nome' => 'Celular'), 'GetContatoRefId'),
					'con_value'			=> $this->input->post('celular')
				)
			);
			$this->insert('Contatopf_model', array(
					'conpf_con_id' 	=> $celular,
					'conpf_cpf_id'	=> $novo_usuario
				)
			);
		}
		$this->session->set_userdata('cliente_id', $cliente);
		redirect('pesquisa/confirma');
	}
	
	function cadastroPassReserva()
	{
		$this->css_js->add('js', '/js/'.SITE.'/jquery.validationEngine-br.js');
		$this->css_js->add('js', '/js/'.SITE.'/jquery.validationEngine.js');
		$this->css_js->add('js', '/js/'.SITE.'/ajax_calls.js');
		$this->css_js->add('js', '/js/'.SITE.'/validation_cadastro_cpf.js');
		$this->css_js->add('css', '/css/'.SITE.'/validationEngine.jquery.css');
		$this->load->view(SITE.'/cadastro_passaporte');
	}
	
	function confirmaReserva()
	{
		$pesquisa_id = $_SESSION['pesquisa_id'];
		$cliente_id = $_SESSION['cliente_id'];
		$pesquisa_values = $this->get('reservascarrospesquisa_model', array('rsvcarp_id' => $pesquisa_id), 'GetReservasCarrosPesquisa');
		$this->pesquisa_values = $pesquisa_values[0];
		$cliente = $this->get('cliente_model', array('rsvcarp_id' => $pesquisa_id), 'GetCliente');
		$this->cliente = $cliente[0];
		$end_cliente = $this->get('endereco_model', array('end_id' => $this->cliente->cpf_end_id), 'GetEndereco');
		$this->end_cliente = $end_cliente[0];
		$this->contatos_cliente = $this->get('contatopf_model', array('conpf_cpf_id' => $this->cliente->cpf_id), 'GetContatoPf');
		$this->load->library('Tarifacarro');
		$this->tarifa_cotacao = new TarifaCarro();
		$this->tarifa_cotacao->setTarifa($this->pesquisa_values->rsvcarp_grp_id,$this->pesquisa_values->rsvcarp_prot_id,str_replace(' ','T',$this->pesquisa_values->rsvcarp_data_retirar),str_replace(' ','T',$this->pesquisa_values->rsvcarp_data_devolver),$this->pesquisa_values->rsvcarp_loj_id_retirar);
		$this->css_js->add('js', '/js/'.SITE.'/jquery.validationEngine-br.js');
		$this->css_js->add('js', '/js/'.SITE.'/jquery.validationEngine.js');
		$this->css_js->add('js', '/js/'.SITE.'/confirma_reserva.js');
		$this->css_js->add('css', '/css/'.SITE.'/validationEngine.jquery.css');
		$this->css_js->add('css', '/css/'.SITE.'/confirma_reserva.css');
		$this->load->view(SITE.'/confirma_reserva');
	}
	
	function reservar()
	{
		
	}
	
	private function dadoPesquisado(){
		if($this->input->post('grupo')){
			$this->dadoPesquisado->grupo = $this->input->post('grupo');
		}else{
			$this->dadoPesquisado->grupo = $this->uri->segment(3);
		};
		
		if($this->input->post('protecao')){
			$this->dadoPesquisado->protecao = $this->input->post('protecao');
		}else{
			$this->dadoPesquisado->protecao = $this->uri->segment(4);
		};
		
		if($this->input->post('dataRetirada')){
			$this->dadoPesquisado->data_ret = $this->input->post('dataRetirada')."T".$this->input->post('horaRetirada');
		}else{
			$this->dadoPesquisado->data_ret = $this->uri->segment(5);
		};
		
		if($this->input->post('dataDevolucao')){
			$this->dadoPesquisado->data_dev = $this->input->post('dataDevolucao')."T".$this->input->post('horaDevolucao');
		}else{
			$this->dadoPesquisado->data_dev = $this->uri->segment(6);
		};
		
		if($this->input->post('lojareti')){
			$this->dadoPesquisado->lojareti = $this->input->post('lojareti');
		}else{
			$this->dadoPesquisado->lojareti = $this->uri->segment(7);
		};
		
		if($this->input->post('lojadev')){
			$this->dadoPesquisado->lojadev = $this->input->post('lojadev');
		}else{
			$this->dadoPesquisado->lojadev = $this->uri->segment(8);
		};
		
		if($this->input->post('cityRet')){
			$this->dadoPesquisado->city_ret->id  = $this->input->post('cityRet');
			$this->dadoPesquisado->city_ret->nome = $this->get('cidade_model', array('city_id' => $this->dadoPesquisado->city_ret->id))->city_nome;
		}else{
			if($this->uri->segment(9) != NULL){
				$this->dadoPesquisado->city_ret->id  = $this->uri->segment(9);
				$this->dadoPesquisado->city_ret->nome = $this->get('cidade_model', array('city_id' => $this->dadoPesquisado->city_ret->id))->city_nome;
			}
		};
		
		if($this->input->post('cityDev')){
			$this->dadoPesquisado->city_dev->id  = $this->input->post('cityDev');
			$this->dadoPesquisado->city_dev->nome = $this->get('cidade_model', array('city_id' => $this->dadoPesquisado->city_dev->id))->city_nome;
		}else{
			if($this->uri->segment(10) != NULL){
				$this->dadoPesquisado->city_dev->id  = $this->uri->segment(10);
				$this->dadoPesquisado->city_dev->nome = $this->get('cidade_model', array('city_id' => $this->dadoPesquisado->city_dev->id))->city_nome;
			}
		};
		if($this->input->post('opcionais')){
			$this->dadoPesquisado->opcionais->inc = $this->input->post('opcionais');
		}else{
			$this->dadoPesquisado->opcionais->inc = $this->uri->segment(11);
		};
			$this->dadoPesquisado->opcionais->opc = explode(":",$this->dadoPesquisado->opcionais->inc);
			foreach($this->dadoPesquisado->opcionais->opc as $opc => $opc_value){
				if(substr($opc_value, 0, 1) == '-'){
					$chave = array_search(substr($opc_value, 1, 2), $this->dadoPesquisado->opcionais->opc);
					unset($this->dadoPesquisado->opcionais->opc[$chave]);
					$chave = array_search($opc_value, $this->dadoPesquisado->opcionais->opc);
					unset($this->dadoPesquisado->opcionais->opc[$chave]);
				}
			}
			
	}
	
	private function dadosPesquisa(){
		//Cidade de Retirada
		if($this->input->post('cityRetirada')){
			$this->dadosPesquisa->cityRetirada 		= $this->trataCidade($this->input->post('cityRetirada'));
		}else{
			$this->dadosPesquisa->cityRetirada 		= str_replace('_',' ',$this->uri->segment(3));
		}
		
		//Cidade de Devolução
		if($this->input->post('cityDevolucao')){
			$this->dadosPesquisa->cityDevolucao 	= $this->trataCidade($this->input->post('cityDevolucao'));
		}else{
			$this->dadosPesquisa->cityDevolucao 	= str_replace('_',' ',$this->uri->segment(4));
		}
		
		
		//Data de Retirada
		if($this->input->post('dataRetirada')){
			$this->dadosPesquisa->dataRetirada 		= parent::dateBrToStd($this->input->post('dataRetirada'))."T".$this->input->post('horaRetirada');
			$form_retirada = explode('T',$this->dadosPesquisa->dataRetirada);
			$data_reti = parent::dateStdToBr($form_retirada[0]);
			$hora_reti = $form_retirada[1];
			$this->formPesquisa->dataRetirada		= $data_reti;
			$this->formPesquisa->horaRetirada		= $hora_reti;
		}else{
			$this->dadosPesquisa->dataRetirada 		= $this->uri->segment(5);
			if($this->dadosPesquisa->dataRetirada != NULL){
				$form_retirada = explode('T',$this->dadosPesquisa->dataRetirada);
				$data_reti = parent::dateStdToBr($form_retirada[0]);
				$hora_reti = $form_retirada[1];
				$this->formPesquisa->dataRetirada		= $data_reti;
				$this->formPesquisa->horaRetirada		= $hora_reti;
			}
		}
		
		//Data de Devolução
		if($this->input->post('dataDevolucao')){
			$this->dadosPesquisa->dataDevolucao 	= parent::dateBrToStd($this->input->post('dataDevolucao'))."T".$this->input->post('horaDevolucao');
			$form_devolucao = explode('T',$this->dadosPesquisa->dataDevolucao);
			$data_devo = parent::dateStdToBr($form_devolucao[0]);
			$hora_devo = $form_devolucao[1];
			$this->formPesquisa->dataDevolucao		= $data_devo;
			$this->formPesquisa->horaDevolucao		= $hora_devo;
		}else{
			$this->dadosPesquisa->dataDevolucao 	= $this->uri->segment(6);
			if($this->dadosPesquisa->dataDevolucao != NULL){
				$form_devolucao = explode('T',$this->dadosPesquisa->dataDevolucao);
				$data_devo = parent::dateStdToBr($form_devolucao[0]);
				$hora_devo = $form_devolucao[1];
				$this->formPesquisa->dataDevolucao		= $data_devo;
				$this->formPesquisa->horaDevolucao		= $hora_devo;
			}
		}
		
		if($this->input->post('selecDevolucao')){
			$this->dadosPesquisa->selDevolucao		= $this->input->post('selecDevolucao');
		}
		
		if($this->input->post('categoriasVeiculos')){
			$this->dadosPesquisa->selCategoria 		= $this->input->post('categoriasVeiculos');
		}else{
			$this->dadosPesquisa->selCategoria 		= $this->uri->segment(8);
		}
		
		if($this->input->post('selecionaLocadora')){
			$this->dadosPesquisa->selLocadora 		= $this->input->post('selecionaLocadora');
		}else{
			$this->dadosPesquisa->selLocadora 		= $this->uri->segment(7);
		}
			
		if($this->dadosPesquisa->cityRetirada != '' && $this->dadosPesquisa->cityDevolucao != '' && $this->dadosPesquisa->dataRetirada != FALSE && $this->dadosPesquisa->dataDevolucao != FALSE){
			$this->disponibilidade_nula = FALSE;
			$this->session->set_userdata('pesquisa', array(
					'id' 				=> NULL,
					'cid_retirada' 		=> $this->dadosPesquisa->cityRetirada,
					'cid_devolucao' 	=> $this->dadosPesquisa->cityDevolucao,
					'date_retirada' 	=> $this->formPesquisa->dataRetirada,
					'date_devolucao' 	=> $this->formPesquisa->dataDevolucao,
					'hora_retirada' 	=> $this->formPesquisa->horaRetirada,
					'hora_devolucao' 	=> $this->formPesquisa->horaDevolucao,
					'locadora' 			=> $this->dadosPesquisa->selLocadora,
					'categoria' 		=> $this->dadosPesquisa->selCategoria
				)
			);
			$this->carregaDisponiveis();
		}else{
			$this->disponibilidade_nula = TRUE;
		}
	}
	
	private function trataCidade($data){
		$cidade = explode('-',$data);
		$returnCidade = trim($cidade[0]);
		return $returnCidade;
	}
	
	private function carregaDisponiveis(){
		$this->load->library('disponibilidadecarro');
		$this->disponiveis = new DisponibilidadeCarro();
		$this->disponiveis->setDisponibilidade(array(
				'data_inicial' 			=> $this->dadosPesquisa->dataRetirada,
				'data_final'			=> $this->dadosPesquisa->dataDevolucao,
				'cidadeRetirada_id'		=> NULL,
				'cidadeRetirada_nome'	=> $this->dadosPesquisa->cityRetirada,
				'estadoRetirada_id'		=> 16,
				'cidadeDevolucao_id'	=> NULL,
				'cidadeDevolucao_nome'	=> $this->dadosPesquisa->cityDevolucao,
				'estadoDevolucao_id'	=> 16,
				//'categoriaSelecionada'	=> 2
			)
		);
		if($this->disponiveis->locadoras_disponiveis != 'Nenhuma locadora disponível no local e horários informados'){
			$this->locadoras->quant = count($this->disponiveis->locadoras_disponiveis);
		}else{
			$this->disponibilidade_nula = TRUE;	
		}
	}
}

/* End of file carro_pesquisa.php */
/* Location: ./system/application/controllers/carro_pesquisa.php */