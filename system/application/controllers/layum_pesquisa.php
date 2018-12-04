<?php
class Layum_pesquisa extends MyController {
	
	public $data = array();
	public $nivel1_def;
  	public $nivel2_def;
	public $metatags;
	public $depoimento;
	public $maisReservados;
	public $arrayHoras = array();
	public $pagina;
	public $locadoras;
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
	
	function Layum_pesquisa()
	{
		parent::__construct('site');
		$this->load->library('locadora');
		$this->pagina = $this->getPage('home');
		$this->metatags = $this->get('Metatags_model', array('met_id' => $this->pagina[0]->pag_met_id));
		$this->metatags->author = 'Layum Travel';
    	$this->metatags->copyright = 'Layum Travel - '.date('Y');
		$this->css_js->add('css', '/css/'.SITE.'/home.css');
		$this->css_js->add('css', '/css/'.SITE.'/topo.css');
		$this->css_js->add('css', '/css/'.SITE.'/menu.css');
		$this->css_js->add('css', '/css/'.SITE.'/rodape.css');
		$this->css_js->add('css', '/css/'.SITE.'/jquery-ui-1.8.2.custom.css');
		$this->css_js->add('js', '/js/'.SITE.'/jquery-1.4.2.min.js');
		$this->css_js->add('js', '/js/'.SITE.'/jquery-ui-1.8.2.custom.min.js');
		$this->css_js->add('js', '/js/'.SITE.'/menu.js');
		$this->css_js->add('js', '/js/'.SITE.'/jquery.scrollTo-min.js');
		
		
		$locadoras_ativas = $this->get('locadora_model', NULL, 'GetLocAtivas');
		foreach($locadoras_ativas as $active => $id){
			$loc[$active] = new Locadora();
			$loc[$active]->setLocadora($id->loc_id);
		}
		$this->menu->locadoras = $loc;
		$categorias_ativas = $this->get('categoria_model', array('sortBy' => 'cat_ordem', 'sortDirection' => 'ASC'));
		$this->menu->categorias = $categorias_ativas;
		
		$this->nivel1_def = 1;
      	$this->nivel2_def = 2;
		
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
				'categoria' 		=> NULL,
				'pagamento'			=> NULL
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
		$this->css_js->add('js', '/js/'.SITE.'/floater.js');
		$this->css_js->add('js', '/js/'.SITE.'/cotacao.js');
		$this->css_js->add('css', '/css/'.SITE.'/cotacao.css');
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
					'rsvcarp_opcionais_array'	=> NULL,
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
		$this->css_js->add('css', '/css/'.SITE.'/login.css');
		$this->load->view(SITE.'/login_reserva');
	}
	
	function cadastroCpfReserva()
	{
		$this->css_js->add('js', '/js/'.SITE.'/jquery.validationEngine-br.js');
		$this->css_js->add('js', '/js/'.SITE.'/jquery.validationEngine.js');
		$this->css_js->add('js', '/js/'.SITE.'/ajax_calls.js');
		$this->css_js->add('js', '/js/'.SITE.'/validation_cadastro_cpf.js');
		$this->css_js->add('css', '/css/'.SITE.'/validationEngine.jquery.css');
		$this->css_js->add('css', '/css/'.SITE.'/cadastro.css');
		$this->load->view(SITE.'/cadastro_cpf');
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
		$this->css_js->add('js', '/js/'.SITE.'/jquery.validationEngine-br.js');
		$this->css_js->add('js', '/js/'.SITE.'/jquery.validationEngine.js');
		$this->css_js->add('js', '/js/'.SITE.'/confirma_reserva.js');
		$this->css_js->add('css', '/css/'.SITE.'/validationEngine.jquery.css');
		$this->css_js->add('css', '/css/'.SITE.'/finalizacao.css');
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
	}
	
	private function dadosPesquisa(){
		$this->css_js->add('css', '/css/'.SITE.'/busca.css');
		
		
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
				'categoria' 		=> $this->dadosPesquisa->selCategoria,
				'pagamento'			=> NULL
			)
		);
			$this->css_js->add('js', '/js/'.SITE.'/autocomplete.js');
			$this->css_js->add('js', '/js/'.SITE.'/busca.js');
			$this->css_js->add('js', '/js/'.SITE.'/comparacao.js');
			$this->css_js->add('js', '/js/'.SITE.'/comparacao_paginacao.js');
			$this->css_js->add('js', '/js/'.SITE.'/comparacao_ordenador.js');
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
		}
	}
}

/* End of file layum_home.php */
/* Location: ./system/application/controllers/layum_home.php */