<?php
header('Content-Type: text/html; charset=utf-8');
class Dbconvert extends MyController {
	public $locadora;
	public $loja;
	public $old_locadoras;
	public $old_db;
	public $old_lojas;
	public $data;	
	public $titulo;
		
	function Dbconvert () {
    	parent::__construct('site');
    	$this->old_db = mysql_pconnect('localhost', 'root', '') or trigger_error(mysql_error(),E_USER_ERROR);
		mysql_set_charset('utf8',$this->old_db); 
    }
	
    function index()
	{
		$this->data = '<h3>Carro</h3';
		$this->data .= '<a href="/dbconvert/basic">Inserir Dados Iniciais</a>';
		if($this->get('projeto_model', array(NULL))){$this->data .= '<em>&nbsp;ok</em><br>';}else{$this->data .= '<br>';};
		$this->data .= '<a href="/dbconvert/carrega_cidades">Inserir Cidades</a>';
		if($this->get('cidade_model', array(NULL))){$this->data .= '<em>&nbsp;ok</em><br>';}else{$this->data .= '<br>';};
		$this->data .= '<a href="/dbconvert/carrega_bairros">Inserir Bairros</a>';
		if($this->get('bairro_model', array(NULL))){$this->data .= '<em>&nbsp;ok</em><br>';}else{$this->data .= '<br>';};
		$this->data .= '<a href="/dbconvert/carrega_ceps">Inserir CEPS</a>';
		if($this->get('cep_model', array(NULL))){$this->data .= '<em>&nbsp;ok</em><br>';}else{$this->data .= '<br>';};
		$this->data .= '<a href="/dbconvert/carrega_pessoajuridica">Inserir Pessoas Jurídicas</a>';
		if($this->get('pessoajuridica_model', array('cnpj_stur_id' => 1))){$this->data .= '<em>&nbsp;ok</em><br>';}else{$this->data .= '<br>';};
		$this->data .= '<a href="/dbconvert/carrega_pessoafisica">Inserir Pessoas Físicas</a>';
		if($this->get('pessoafisica_model', array(NULL))){$this->data .= '<em>&nbsp;ok</em><br>';}else{$this->data .= '<br>';};
		$this->data .= '<a href="/dbconvert/carrega_locadoras">Inserir Locadoras</a>';
		if($this->get('locadora_model', array(NULL))){$this->data .= '<em>&nbsp;ok</em><br>';}else{$this->data .= '<br>';};
		$this->data .= '<a href="/dbconvert/carrega_lojas">Inserir Lojas</a>';
		if($this->get('loja_model', array(NULL))){$this->data .= '<em>&nbsp;ok</em><br>';}else{$this->data .= '<br>';};
		$this->data .= '<a href="/dbconvert/carrega_categorias">Inserir Categorias</a>';
		if($this->get('categoria_model', array(NULL))){$this->data .= '<em>&nbsp;ok</em><br>';}else{$this->data .= '<br>';};
		$this->data .= '<a href="/dbconvert/carrega_carros">Inserir Carros</a>';
		if($this->get('carro_model', array(NULL))){$this->data .= '<em>&nbsp;ok</em><br>';}else{$this->data .= '<br>';};
		$this->data .= '<a href="/dbconvert/carrega_grupos">Inserir Grupos</a>';
		if($this->get('grupo_model', array(NULL))){$this->data .= '<em>&nbsp;ok</em><br>';}else{$this->data .= '<br>';};
		$this->data .= '<a href="/dbconvert/carrega_targrupos">Inserir Tarifas Grupos</a>';
		if($this->get('tarifagrupos_model', array(NULL))){$this->data .= '<em>&nbsp;ok</em><br>';}else{$this->data .= '<br>';};
		$this->data .= '<a href="/dbconvert/carrega_protecoes">Inserir Proteções</a>';
		if($this->get('protecao_model', array(NULL))){$this->data .= '<em>&nbsp;ok</em><br>';}else{$this->data .= '<br>';};
		$this->data .= '<a href="/dbconvert/carrega_tarprot">Inserir Tarifas Proteções</a>';
		if($this->get('tarifaprotecoes_model', array(NULL))){$this->data .= '<em>&nbsp;ok</em><br>';}else{$this->data .= '<br>';};
		$this->data .= '<hr>';
		$this->data .= '<h3>Hotel</h3';
		$this->data .= '<a href="/dbconvert/hotel">Banners Destaque</a>';
		if($this->get('destaques_model', array(NULL))){$this->data .= '<em>&nbsp;ok</em><br>';}else{$this->data .= '<br>';};
		$this->data .= '<hr>';
		
		$this->load->view('dbconvert');
	}
	
	function basic()
	{
		$this->insert('Projeto_model', array('proj_nome' => 'carroaluguel'));
		
		$this->insert('Projeto_model', array('proj_nome' => 'layum'));
		
		$this->insert('Projeto_model', array('proj_nome' => 'reservadehotel'));
		
		$this->insert('Dominio_model', array(
				'dom_proj_id' 	=> 1,
				'dom_name' 		=> 'carroaluguel.local'
			)
		);
		
		$this->insert('Dominio_model', array(
			  	'dom_proj_id' 	=> 1,
			  	'dom_name' 		=> 'carroaluguel.com'
			)
		);
		
		$this->insert('Dominio_model', array(
				'dom_proj_id' 	=> 1,
				'dom_name' 		=> 'www.carroaluguel.com'
			)
		);
		
		$this->insert('Dominio_model', array(
				'dom_proj_id' 	=> 2,
				'dom_name' 		=> 'layum.local'
			)
		);
		
		$this->insert('Dominio_model', array(
				'dom_proj_id' 	=> 2,
				'dom_name' 		=> 'layum.com'
			)
		);
		
		$this->insert('Dominio_model', array(
				'dom_proj_id' 	=> 2,
				'dom_name' 		=> 'www.layum.com'
			)
		);
		
		$this->insert('Dominio_model', array(
				'dom_proj_id' 	=> 3,
				'dom_name' 		=> 'reservadehotelonline.local'
			)
		);
		
		$this->insert('Dominio_model', array(
				'dom_proj_id' 	=> 3,
				'dom_name' 		=> 'reservadehotelonline.com'
			)
		);
		
		$this->insert('Dominio_model', array(
				'dom_proj_id' 	=> 3,
				'dom_name' 		=> 'www.reservadehotelonline.com'
			)
		);
		
		$this->insert('Referenciaclasse_model', array(
				'refcla_nome' 	=> 'locadora'
			)
		);
		
		$this->insert('Referenciaclasse_model', array(
				'refcla_nome' 	=> 'loja'
			)
		);
		
		$this->insert('Referenciaclasse_model', array(
				'refcla_nome' 	=> 'carro'
			)
		);
		
		$this->insert('Referenciaclasse_model', array(
				'refcla_nome' 	=> 'grupo'
			)
		);
		
		$this->insert('Referenciaclasse_model', array(
				'refcla_nome' 	=> 'tarifagrupos'
			)
		);
		
		$this->insert('Referenciaclasse_model', array(
				'refcla_nome' 	=> 'protecao'
			)
		);
		
		$this->insert('Referenciaclasse_model', array(
				'refcla_nome' 	=> 'tarifaprotecoes'
			)
		);
		
				
		$met_id = $this->insert('Metatags_model', array(
				'met_title' 		=> 'Aluguel de Carros com as melhores locadoras e Excelentes Preços. Veja!',
				'met_description' 	=> 'Alugue carro com diária a partir de R$ 67 com Km livre e seguro. Parcele até 10X no cartão. Tire dúvidas via chat. Ligue grátis. Reserve já!',
				'met_keywords' 		=> 'aluguel de carros, rent a car, locadoras de carros, locação de carros, aluguel de veiculos, locadoras de veiculos, aluguel de automovel, locação de veiculos, alugar carro em'
			)
		);
											
		$this->insert('Pagina_model', array(
				'pag_proj_id' 		=> 1,
				'pag_met_id'		=> $met_id,
				'pag_url' 			=> 'home',
				'pag_class' 		=> '/carro_home',
				'pag_class_tipo' 	=> 't'
			)
		);
		
		$this->insert('Pagina_model', array(
				'pag_proj_id' 		=> 1,
				'pag_met_id'		=> $met_id,
				'pag_url' 			=> 'pesquisa',
				'pag_class' 		=> '/carro_pesquisa/index',
				'pag_class_tipo' 	=> 't'
			)
		);
		
		$this->insert('Pagina_model', array(
				'pag_proj_id' 		=> 1,
				'pag_met_id'		=> $met_id,
				'pag_url' 			=> 'pesquisa/comparacao/:any',
				'pag_class' 		=> '/carro_pesquisa/index',
				'pag_class_tipo' 	=> 't'
			)
		);
		
		$this->insert('Pagina_model', array(
				'pag_proj_id' 		=> 1,
				'pag_met_id'		=> $met_id,
				'pag_url' 			=> 'pesquisa/grupo/:any',
				'pag_class' 		=> '/carro_pesquisa/porgrupo',
				'pag_class_tipo' 	=> 't'
			)
		);
		
		$this->insert('Pagina_model', array(
				'pag_proj_id' 		=> 1,
				'pag_met_id'		=> $met_id,
				'pag_url' 			=> 'pesquisa/locadora/:any',
				'pag_class' 		=> '/carro_pesquisa/porlocadora',
				'pag_class_tipo' 	=> 't'
			)
		);
		
		$this->insert('Pagina_model', array(
				'pag_proj_id' 		=> 1,
				'pag_met_id'		=> $met_id,
				'pag_url' 			=> 'pesquisa/seleciona-loja/:any',
				'pag_class' 		=> '/carro_pesquisa/selecionaLoja',
				'pag_class_tipo' 	=> 't'
			)
		);
		
		$this->insert('Pagina_model', array(
				'pag_proj_id' 		=> 1,
				'pag_met_id'		=> $met_id,
				'pag_url' 			=> 'pesquisa/seleciona-seguro/:any',
				'pag_class' 		=> '/carro_pesquisa/selecionaSeguro',
				'pag_class_tipo' 	=> 't'
			)
		);
		
		$this->insert('Pagina_model', array(
				'pag_proj_id' 		=> 1,
				'pag_met_id'		=> $met_id,
				'pag_url' 			=> 'pesquisa/inserir-pesquisa',
				'pag_class' 		=> '/carro_pesquisa/inserirPesquisa',
				'pag_class_tipo' 	=> 't'
			)
		);
		
		$this->insert('Pagina_model', array(
				'pag_proj_id' 		=> 1,
				'pag_met_id'		=> $met_id,
				'pag_url' 			=> 'pesquisa/login',
				'pag_class' 		=> '/carro_pesquisa/loginReserva',
				'pag_class_tipo' 	=> 't'
			)
		);
		
		$this->insert('Pagina_model', array(
				'pag_proj_id' 		=> 1,
				'pag_met_id'		=> $met_id,
				'pag_url' 			=> 'pesquisa/cadastro-cpf',
				'pag_class' 		=> '/carro_pesquisa/cadastroCpfReserva',
				'pag_class_tipo' 	=> 't'
			)
		);
		
		$this->insert('Pagina_model', array(
				'pag_proj_id' 		=> 1,
				'pag_met_id'		=> $met_id,
				'pag_url' 			=> 'pesquisa/cadastro-passaporte',
				'pag_class' 		=> '/carro_pesquisa/cadastroPassReserva',
				'pag_class_tipo' 	=> 't'
			)
		);
		
		$this->insert('Pagina_model', array(
				'pag_proj_id' 		=> 1,
				'pag_met_id'		=> $met_id,
				'pag_url' 			=> 'pesquisa/confirma',
				'pag_class' 		=> '/carro_pesquisa/confirmaReserva',
				'pag_class_tipo' 	=> 't'
			)
		);
		
		$this->insert('Pagina_model', array(
				'pag_proj_id' 		=> 1,
				'pag_met_id'		=> $met_id,
				'pag_url' 			=> 'pesquisa/reservar',
				'pag_class' 		=> '/carro_pesquisa/reservar',
				'pag_class_tipo' 	=> 't'
			)
		);
		
		$this->insert('Pagina_model', array(
				'pag_proj_id' 		=> 2,
				'pag_met_id'		=> $met_id,
				'pag_url' 			=> 'home',
				'pag_class' 		=> '/layum_home',
				'pag_class_tipo' 	=> 't'
			)
		);
		
		$this->insert('Pagina_model', array(
				'pag_proj_id' 		=> 3,
				'pag_met_id'		=> $met_id,
				'pag_url' 			=> 'home',
				'pag_class' 		=> '/hotel_home',
				'pag_class_tipo' 	=> 't'
			)
		);
				
		$this->insert('Templocstatus_model', array('tlocst_nome' => 'Não processado'));
											
		$this->insert('Contatoref_model', array('conref_nome' => 'Telefone'));
		
		$this->insert('Contatoref_model', array('conref_nome' => 'Fax'));
		
		$this->insert('Contatoref_model', array('conref_nome' => 'Email'));	
			
		$this->insert('Contatoref_model', array('conref_nome' => 'Tollfree'));
		
		$this->insert('Contatoref_model', array('conref_nome' => 'Plantao'));
		
		$this->insert('Departamento_model', array('dep_nome' => 'Administrativo'));
		
		$this->insert('Departamento_model', array('dep_nome' => 'Loja'));
		
		$this->insert('Departamento_model', array('dep_nome' => 'Financeiro'));	
		
		$this->insert('Grupoespec_model', array('grpespec_nome' => '2 portas'));
		
		$this->insert('Grupoespec_model', array('grpespec_nome' => '4 portas'));
		
		$this->insert('Grupoespec_model', array('grpespec_nome' => 'Direção Hidráulica'));
		
		$this->insert('Grupoespec_model', array('grpespec_nome' => 'Ar condicionado'));
		
		$this->insert('Grupoespec_model', array('grpespec_nome' => 'Trio Elétrico'));
		
		$this->insert('Grupoespec_model', array('grpespec_nome' => 'CD Player'));
		
		$frm_pag = $this->insert('FormaPagamento_model', array(
				'frmpag_nome' 		=> 'Visa/Cielo',
				'frmpag_classe' 	=> 'visa',
				'frmpag_desc' 		=> 'Cartão de Crédito Visa/Cielo'
			)
		);
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag,
				'projfrmpag_proj_id' 	=> 1
			)
		);
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag,
				'projfrmpag_proj_id' 	=> 2
			)
		);
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag,
				'projfrmpag_proj_id' 	=> 3
			)
		);
		
		$frm_pag2 = $this->insert('FormaPagamento_model', array(
				'frmpag_nome' 		=> 'Mastercard',
				'frmpag_classe' 	=> 'mastercard',
				'frmpag_desc' 		=> 'Cartão de Crédito Mastercard'
			)
		);
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag2,
				'projfrmpag_proj_id' 	=> 1
			)
		);
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag2,
				'projfrmpag_proj_id' 	=> 2
			)
		);
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag2,
				'projfrmpag_proj_id' 	=> 3
			)
		);
		
		$frm_pag3 = $this->insert('FormaPagamento_model', array(
				'frmpag_nome' 		=> 'American Express',
				'frmpag_classe' 	=> 'americanexpress',
				'frmpag_desc' 		=> 'Cartão de Crédito American Express'
			)
		);
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag3,
				'projfrmpag_proj_id' 	=> 1
			)
		);
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag3,
				'projfrmpag_proj_id' 	=> 2
			)
		);
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag3,
				'projfrmpag_proj_id' 	=> 3
			)
		);
		
		$frm_pag4 = $this->insert('FormaPagamento_model', array(
				'frmpag_nome' 		=> 'BrasPag',
				'frmpag_classe' 	=> 'braspag',
				'frmpag_desc' 		=> 'Integrador Braspag'
			)
		);	
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag4,
				'projfrmpag_proj_id' 	=> 1
			)
		);
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag4,
				'projfrmpag_proj_id' 	=> 2
			)
		);
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag4,
				'projfrmpag_proj_id' 	=> 3
			)
		);
		
		$frm_pag5 = $this->insert('FormaPagamento_model', array(
				'frmpag_nome' 		=> 'Hipercard',
				'frmpag_classe' 	=> 'hipercard',
				'frmpag_desc' 		=> 'Cartão Hipercard'
			)
		);	
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag5,
				'projfrmpag_proj_id' 	=> 1
			)
		);
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag5,
				'projfrmpag_proj_id' 	=> 2
			)
		);
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag5,
				'projfrmpag_proj_id' 	=> 3
			)
		);	
		
		$frm_pag6 = $this->insert('FormaPagamento_model', array(
				'frmpag_nome' 		=> 'Faturado',
				'frmpag_classe' 	=> 'faturado',
				'frmpag_desc' 		=> 'Faturamento Layum'
			)
		);	
		
		$this->insert('ProjetoFrmPag_model', array(
				'projfrmpag_frmpag_id' 	=> (integer)$frm_pag6,
				'projfrmpag_proj_id' 	=> 2
			)
		);
		
		$this->insert('Continente_model', array(
				'cont_id' 	=> 1,
				'cont_nome' => 'América do Sul'
			)
		);
		
		$this->insert('Pais_model', array(
				'pais_cont_id' 	=> 1,
				'pais_nome' 	=> 'Brasil',
				'pais_sigla' 	=> 'BR'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 1,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Acre',
				'uf_abr' 		=> 'AC'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 2,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Alagoas',
				'uf_abr' 		=> 'AL'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 3,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Amapá',
				'uf_abr' 		=> 'AP'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 4,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Amazonas',
				'uf_abr' 		=> 'AM'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 5,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Bahia',
				'uf_abr' 		=> 'BA'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 6,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Ceará',
				'uf_abr' 		=> 'CE'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 7,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Distrito Federal',
				'uf_abr' 		=> 'DF'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 8,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Espírito Santo',
				'uf_abr' 		=> 'ES'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 9,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Goiás',
				'uf_abr' 		=> 'GO'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 10,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Maranhão',
				'uf_abr' 		=> 'MA'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 11,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Mato Grosso',
				'uf_abr' 		=> 'MT'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 12,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Mato Grosso do Sul',
				'uf_abr' 		=> 'MS'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 13,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Minas Gerais',
				'uf_abr' 		=> 'MG'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 14,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Pará',
				'uf_abr' 		=> 'PA'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 15,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Paraíba',
				'uf_abr' 		=> 'PB'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 16,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Paraná',
				'uf_abr' 		=> 'PR'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 17,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Pernambuco',
				'uf_abr' 		=> 'PE'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 18,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Piauí',
				'uf_abr' 		=> 'PI'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 19,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Rio de Janeiro',
				'uf_abr' 		=> 'RJ'
			)
		);
		$this->insert('Estado_model', array(
				'uf_id' 		=> 20,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Rio Grande do Norte',
				'uf_abr' 		=> 'RN'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 21,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Rio Grande do Sul',
				'uf_abr' 		=> 'RS'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 22,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Rondônia',
				'uf_abr' 		=> 'RO'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 23,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Roraima',
				'uf_abr' 		=> 'RR'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 24,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Santa Catarina',
				'uf_abr' 		=> 'SC'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 25,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'São Paulo',
				'uf_abr' 		=> 'SP'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 26,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Sergipe',
				'uf_abr' 		=> 'SE'
			)
		);
		
		$this->insert('Estado_model', array(
				'uf_id' 		=> 27,
				'uf_pais_id' 	=> 1,
				'uf_nome' 		=> 'Tocantins',
				'uf_abr' 		=> 'TO'
			)
		);
		
		$this->insert('Produtos_model', array(
				'produ_nome' 		=> 'Reserva de Carro',
				'produ_classe' 		=> 'carro_reserva',
			)
		);
		
		$this->insert('Produtos_model', array(
				'produ_nome' 		=> 'Reserva de Hotel',
				'produ_classe' 		=> 'hotel_reserva',
			)
		);
		
		$this->insert('Produtos_model', array(
				'produ_nome' 		=> 'Vistos',
				'produ_classe' 		=> 'vistos',
			)
		);
		
		$this->insert('Reservasstatus_model', array(
				'sta_id' 		=> '1',
				'sta_nome' 		=> 'Pendente',
				'sta_titulo' 	=> 'Solicitação de Locação Nacional',
				'sta_desc' 		=> 'IMPORTANTE: E-MAIL GERADO AUTOMATICAMENTE. A LOCAÇÃO AINDA NÃO FOI CONFIRMADA. POR FAVOR, AGUARDE O ENVIO DE UMA NOVA MENSAGEM COM O DETALHAMENTO DA OPERAÇÃO.'
			)
		);
		
		$this->insert('Reservasstatus_model', array(
				'sta_id' 		=> '2',
				'sta_nome' 		=> 'Confirmado',
				'sta_titulo' 	=> 'Reserva Confirmada',
				'sta_desc' 		=> ''
			)
		);
		
		$this->insert('Reservasstatus_model', array(
				'sta_id' 		=> '3',
				'sta_nome' 		=> 'Cancelado',
				'sta_titulo' 	=> 'Reserva Cancelada',
				'sta_desc' 		=> ''
			)
		);
		
		$this->insert('Reservasstatus_model', array(
				'sta_id' 		=> '4',
				'sta_nome' 		=> 'Alterado',
				'sta_titulo' 	=> 'Reserva Alterada',
				'sta_desc' 		=> ''
			)
		);
		
		$this->insert('Reservasstatus_model', array(
				'sta_id' 		=> '5',
				'sta_nome' 		=> 'Indisponível',
				'sta_titulo' 	=> 'Reserva Cancelada por indisponibilidade',
				'sta_desc' 		=> 'Prezado Cliente, informamos que a locação solicitada em nosso sistema foi cancelada devido a indisponibilidade de veículo. Para maiores informações sobre o cancelamento desta locação, favor entrar em contato com nossa Central de Atendimento: Curitiba (41) 3026 3399, TollFree 0800 600 3399.'
			)
		);
		
		$this->insert('Reservasstatus_model', array(
				'sta_id' 		=> '6',
				'sta_nome' 		=> 'Confirmado Online',
				'sta_titulo' 	=> 'Reserva Confirmada Online',
				'sta_desc' 		=> ''
			)
		);
		
		$this->insert('Reservasstatus_model', array(
				'sta_id' 		=> '7',
				'sta_nome' 		=> 'Finalizado',
				'sta_titulo' 	=> 'Reserva Finalizada',
				'sta_desc' 		=> ''
			)
		);
		
		$this->insert('Reservasstatus_model', array(
				'sta_id' 		=> '8',
				'sta_nome' 		=> 'Em Processamento',
				'sta_titulo' 	=> 'Reserva em processamento',
				'sta_desc' 		=> ''
			)
		);
		
		$this->insert('Reservasstatus_model', array(
				'sta_id' 		=> '9',
				'sta_nome' 		=> 'No Show',
				'sta_titulo' 	=> 'Reserva Cancelada por não comparecimento',
				'sta_desc' 		=> ''
			)
		);
		
		$this->insert('Financeirostatus_model', array('finstatus_nome' => 'Pendente'));
		$this->insert('Financeirostatus_model', array('finstatus_nome' => 'Cancelado'));
		$this->insert('Financeirostatus_model', array('finstatus_nome' => 'Pago'));
		
		redirect('/dbconvert/index');
	}
	
	function carrega_locadoras(){
		mysql_select_db('layum', $this->old_db);
		$query_old_locadoras = "SELECT * FROM loc_locadoras";
		$lista_old_locadoras = mysql_query($query_old_locadoras, $this->old_db) or die(mysql_error());
		$row_oldloc = mysql_fetch_assoc($lista_old_locadoras);
		
		do{$this->old_locadoras[] = $row_oldloc;
			} while ($row_oldloc = mysql_fetch_assoc($lista_old_locadoras));
		$this->db->trans_start();
		foreach ($this->old_locadoras as $oldloc_row){
			$inserttemploc = array(
				'temploc_id'			=> (integer)$oldloc_row['id_locadora'],
				'temploc_tlocst_id' 	=> 1,
				'temploc_nome' 			=> $oldloc_row['locadora'],
				'temploc_cnpj' 			=> $oldloc_row['cnpj'],
				'temploc_telefone' 		=> $oldloc_row['telefone'],
				'temploc_fax' 			=> $oldloc_row['fax'],
				'temploc_tollfree' 		=> $oldloc_row['tollfree'],
				'temploc_email' 		=> $oldloc_row['email'],
				'temploc_nomecon' 		=> $oldloc_row['nome'],
				'temploc_funcaocon' 	=> $oldloc_row['cargo'],
				'temploc_cep' 			=> (integer)str_replace(str_replace($oldloc_row['cep'],'.',''),'-',''),
				'temploc_rua' 			=> $oldloc_row['endereco'],
				'temploc_bairro' 		=> $oldloc_row['bairro'],
				'temploc_uf' 			=> (integer)$this->get('Estado_model', array('uf_abr' => $oldloc_row['estado']), 'GetEstadoId'),
				'temploc_cidade' 		=> (integer)$this->get('Cidade_model', array('city_nome' => $oldloc_row['cidade']), 'GetCidadeId'),
				'temploc_dthcadastro'	=> ($oldloc_row['data_cadastro_locadoras']!=NULL)?$oldloc_row['data_cadastro_locadoras']:date("Y-m-d H:i:s"),
				'temploc_ativo' 		=> ($oldloc_row['ativo']==1)?'t':'f',
				'temploc_dthprocess'	=> date("Y-m-d H:i:s")
			);
			
			$this->insert('Templocadora_model', $inserttemploc);	
			
			if($oldloc_row['taxas']!=NULL){
				$end_id = 0;
				if($oldloc_row['cidade']!=NULL){
				$end_id = $this->insert('Endereco_model', array(
												'end_cep_codigo'	=> $oldloc_row['cep'],
												'end_city_id' 		=> ((integer)$this->get('Cidade_model', array('city_nome' => $oldloc_row['cidade']), 'GetCidadeId')!=0) ? (integer)$this->get('Cidade_model', array('city_nome' => $oldloc_row['cidade']), 'GetCidadeId'): NULL,
												'end_endereco' 		=> $oldloc_row['endereco'],
												'end_complemento'	=> '',
												'end_numero' 		=> $oldloc_row['endereco'],
												'end_bairro' 		=> $oldloc_row['bairro'],
												'end_latitude' 		=> '',
												'end_longitude'		=> '',)
											);
				}
				$cnpj_id = 0;	
				if($oldloc_row['cnpj']!=NULL){										
					$cnpj_id = $this->insert('Pessoajuridica_model', array(
												'cnpj_end_id' 		=> ((integer)$end_id!='') ? (integer)$end_id : NULL,
												'cnpj_nomefantasia' => $oldloc_row['locadora'],
												'cnpj_razaosoc' 	=> NULL,
												'cnpj_numero' 		=> $oldloc_row['cnpj'],
												'cnpj_ie' 			=> NULL
												)
											);
				}
				
				$loc_met_id = $this->insert('Metatags_model', array(
												'met_title' 		=> ($oldloc_row['meta_title']!='') ? $oldloc_row['meta_title'] : $oldloc_row['locadora'],
												'met_description' 	=> $oldloc_row['meta_description'],
												'met_keywords' 		=> $oldloc_row['meta_keywords'])
												);
				$dep_pj = $this->insert('Departamentopj_model', array(
												'deppj_dep_id' 		=> 1,
												'deppj_cnpj_id' 	=> (integer)$cnpj_id)
												);
				$nome = preg_split('/ /',$oldloc_row['nome'], 2);												
				$cpf_new = $this->insert('Pessoafisica_model', array(
												'cpf_nome' 			=> ($nome[0])? $nome[0] : 'Administrador',
												'cpf_sobrenome'		=> (isset($nome[1]))? $nome[1] : utf8_encode($oldloc_row['locadora']),
												'cpf_numero' 		=> '',
												'cpf_sexo' 			=> '',
												'cpf_rg' 			=> '',
												'cpf_dtnasc'		=> date("Y-m-d"),
												'cpf_ativo' 		=> 't',
												'cpf_dthcadastro'	=> date("Y-m-d H:i:s"),
												'cpf_cargo'			=> $oldloc_row['cargo'])
											);
				$this->insert('Usuario_model', array(
												'usu_login' => ($nome[0]!=NULL)? $nome[0].'_'.$oldloc_row['link_name'] : 'admin_'.$oldloc_row['link_name'],
												'usu_cpf_id'=> (integer)$cpf_new,
												'usu_senha' => '1234')
											);
				$this->insert('Pfdepartamentopj_model', array(
												'pfdeppj_deppj_id' 	=> (integer)$dep_pj,
												'pfdeppj_cpf_id' 	=> (integer)$cpf_new)
												);
				if($oldloc_row['telefone']!=0 || $oldloc_row['telefone']!=NULL){
					$contato = $this->insert('Contato_model', array(
												'con_conref_id' => (integer)$this->get('Contatoref_model', array('conref_nome' => 'Telefone'), 'GetContatoRefId'),
												'con_value' 	=> $oldloc_row['telefone'])
												);
					$this->insert('ContatoPj_model', array(
												'conpj_con_id' 	=> (integer)$contato,
												'conpj_cnpj_id' => (integer)$cnpj_id)
												);
				}
				if($oldloc_row['fax']!=0 || $oldloc_row['fax']!=NULL){
					$contato = $this->insert('Contato_model', array(
												'con_conref_id' => (integer)$this->get('Contatoref_model', array('conref_nome' => 'Fax'), 'GetContatoRefId'),
												'con_value' 	=> $oldloc_row['fax'])
												);
					$this->insert('ContatoPj_model', array(
												'conpj_con_id' 	=> (integer)$contato,
												'conpj_cnpj_id' => (integer)$cnpj_id)
												);
				}
				if($oldloc_row['tollfree']!=0 || $oldloc_row['tollfree']!=NULL){
					$contato = $this->insert('Contato_model', array(
												'con_conref_id' => (integer)$this->get('Contatoref_model', array('conref_nome' => 'Tollfree'), 'GetContatoRefId'),
												'con_value' 	=> $oldloc_row['tollfree'])
												);
					$this->insert('ContatoPj_model', array(
												'conpj_con_id' 	=> (integer)$contato,
												'conpj_cnpj_id' => (integer)$cnpj_id)
												);
				}
				if($oldloc_row['email']!=0 || $oldloc_row['email']!=NULL){
					$contato = $this->insert('Contato_model', array(
												'con_conref_id' => (integer)$this->get('Contatoref_model', array('conref_nome' => 'Email'), 'GetContatoRefId'),
												'con_value' 	=> strtolower($oldloc_row['email']))
												);
					$this->insert('ContatoPj_model', array(
												'conpj_con_id' 	=> (integer)$contato,
												'conpj_cnpj_id' => (integer)$cnpj_id)
												);
				}
				
				if($oldloc_row['cartao_visa']!=0 || $oldloc_row['cartao_visa']!=NULL){
					$this->insert('Pjformapagamento_model', array(
												'pjfrmpag_frmpag_id'=> (integer)$this->get('Formapagamento_model', array('frmpag_classe' => 'visa'), 'GetFormaPagamentoId'),
												'pjfrmpag_cnpj_id' 	=> (integer)$cnpj_id,
												'pjfrmpag_minima' 	=> $oldloc_row['parcela_min'],
												'pjfrmpag_parcelas' => $oldloc_row['num_parcelas'],
												'pjfrmpag_obs' 		=> $oldloc_row['cartoes'])
												);
				}
				if($oldloc_row['cartao_master']!=0 || $oldloc_row['cartao_master']!=NULL){
					$this->insert('Pjformapagamento_model', array(
												'pjfrmpag_frmpag_id'=> (integer)$this->get('Formapagamento_model', array('frmpag_classe' => 'mastercard'), 'GetFormaPagamentoId'),
												'pjfrmpag_cnpj_id' 	=> (integer)$cnpj_id,
												'pjfrmpag_minima' 	=> $oldloc_row['parcela_min'],
												'pjfrmpag_parcelas' => $oldloc_row['num_parcelas'],
												'pjfrmpag_obs' 		=> $oldloc_row['cartoes'])
												);
				}
				if($oldloc_row['cartao_american']!=0 || $oldloc_row['cartao_american']!=NULL){
					$this->insert('Pjformapagamento_model', array(
												'pjfrmpag_frmpag_id'=> (integer)$this->get('Formapagamento_model', array('frmpag_classe' => 'americanexpress'), 'GetFormaPagamentoId'),
												'pjfrmpag_cnpj_id' 	=> (integer)$cnpj_id,
												'pjfrmpag_minima' 	=> $oldloc_row['parcela_min'],
												'pjfrmpag_parcelas' => $oldloc_row['num_parcelas'],
												'pjfrmpag_obs' 		=> $oldloc_row['cartoes'])
												);
				}
				
				$insertloc = array(
								'loc_id'			=> (integer)$oldloc_row['id_locadora'],
								'loc_cnpj_id'		=> ((integer)$cnpj_id!=0) ? (integer)$cnpj_id : NULL,
								'loc_met_id'		=> ((integer)$loc_met_id!=0) ? (integer)$loc_met_id : NULL,
								'loc_nomelocadora'	=> $oldloc_row['locadora'],
								'loc_permalink'		=> $oldloc_row['link_name'],
								'loc_classe'		=> $oldloc_row['link_name'],
								'loc_extra_opc'		=> ($oldloc_row['extra_prop']==1)?'t':'f',
								'loc_taxas'			=> (float)$oldloc_row['taxas'],
								'loc_taxasaero'		=> (float)$oldloc_row['taxas_aero'],
								'loc_horaextra'		=> (integer)$oldloc_row['hora_extra'],
								'loc_prazodiaria'	=> $oldloc_row['prazo_diaria'],
								'loc_horacortesia'	=> (integer)$oldloc_row['hora_cortesia'],
								'loc_dthcadastro' 	=> $oldloc_row['data_cadastro_locadoras'],
								'loc_txtprazocancel'=> $oldloc_row['prazo_cancel'],
								'loc_maisinfo'		=> $oldloc_row['mais_info'],
								'loc_online'		=> ($oldloc_row['xml_parser']==1)? 't' : 'f',
								'loc_kmrodado'		=> $oldloc_row['km_rodado'],
								'loc_obs'			=> $oldloc_row['obs_locadoras'],
								'loc_texto_livre'	=> $oldloc_row['texto_livre_locadoras'],
								'loc_ativo'			=> ($oldloc_row['ativo']==1)?'t':'f'
								);
			
			
				$loc = $this->insert('Locadora_model', $insertloc);
				$this->insert('Pagina_model', array(
												'pag_proj_id' 		=> 1,
												'pag_met_id'		=> (integer)$loc_met_id,
												'pag_url' 			=> 'locadora/'.$oldloc_row['link_name'],
												'pag_class' 		=> '/locadora/'.$oldloc_row['id_locadora'],
												'pag_link_titulo' 	=> $oldloc_row['link_titulo'],
												'pag_class_tipo' 	=> 'f')
											);
				$this->insert('Pagina_model', array(
												'pag_proj_id' 		=> 2,
												'pag_met_id'		=> (integer)$loc_met_id,
												'pag_url' 			=> 'locadora/'.$oldloc_row['link_name'],
												'pag_class' 		=> '/locadora/'.$oldloc_row['id_locadora'],
												'pag_link_titulo' 	=> $oldloc_row['link_titulo'],
												'pag_class_tipo' 	=> 'f')
											);
											
				$this->insert('Projetoclasse_model', array(
						'projcla_proj_id' 	=> 1,
						'projcla_cla_id' 	=> (integer)$oldloc_row['id_locadora'],
						'projcla_refcla_id' => 1
					)
				);
				$this->insert('Projetoclasse_model', array(
						'projcla_proj_id' 	=> 2,
						'projcla_cla_id' 	=> (integer)$oldloc_row['id_locadora'],
						'projcla_refcla_id' => 1
					)
				);
			}
			$this->db->trans_complete();
		}
		redirect('/dbconvert/index');
	}
	
	function carrega_lojas(){
		mysql_select_db('layum', $this->old_db);
		$query_old_lojas = "SELECT * FROM loc_lojas";
		$lista_old_lojas = mysql_query($query_old_lojas, $this->old_db) or die(mysql_error());
		$row_oldloj = mysql_fetch_assoc($lista_old_lojas);
		
		do{
			$this->old_lojas[] = $row_oldloj;
		} while ($row_oldloj = mysql_fetch_assoc($lista_old_lojas));
		
		foreach ($this->old_lojas as $oldloj_row){
			$end_id = 0;
			if($oldloj_row['cidade']!=NULL){
				$estado_id = (integer)$this->get('Estado_model', array('uf_abr' => $oldloj_row['estado']), 'GetEstadoId');
			$end_id = $this->insert('Endereco_model', array(
												'end_cep_codigo'	=> str_replace('.','',str_replace('-','',$oldloj_row['cep'])),
												'end_city_id' 		=> ((integer)$this->get('Cidade_model', array('city_nome' => $oldloj_row['cidade'], 'city_uf_id' => $estado_id), 'GetCidadeId')!=0) ? (integer)$this->get('Cidade_model', array('city_nome' => $oldloj_row['cidade']), 'GetCidadeId'): NULL,
												'end_endereco' 		=> $oldloj_row['endereco'],
												'end_complemento'	=> '',
												'end_numero' 		=> $oldloj_row['endereco'],
												'end_bairro' 		=> $oldloj_row['bairro'],
												'end_latitude' 		=> $oldloj_row['lat_geocode'],
												'end_longitude'		=> $oldloj_row['long_geocode'])
											);
			}
			$loj_met_id = $this->insert('Metatags_model', array(
												'met_title' 		=> ($oldloj_row['meta_title']!='') ? $oldloj_row['meta_title'] : $oldloj_row['nome'],
												'met_description' 	=> $oldloj_row['meta_description'],
												'met_keywords' 		=> $oldloj_row['meta_keywords'])
												);
			$dep_pj = $this->insert('Departamentopj_model', array(
												'deppj_dep_id' 	=> 2,
												'deppj_cnpj_id' => (integer)$this->get('Locadora_model', array('loc_id' => $oldloj_row['id_locadoras']), 'GetLocCnpj'),
												'deppj_nome' 	=> $oldloj_row['nome'])
												);
												
				if($oldloj_row['telefone']!=0 || $oldloj_row['telefone']!=NULL){
					$contato = $this->insert('Contato_model', array(
												'con_conref_id' => (integer)$this->get('Contatoref_model', array('conref_nome' => 'Telefone'), 'GetContatoRefId'),
												'con_value' 	=> $oldloj_row['telefone'])
												);
					$this->insert('ContatoDep_model', array(
												'condep_con_id' 	=> (integer)$contato,
												'condep_deppj_id' 	=> (integer)$dep_pj)
												);
				}
				if($oldloj_row['fax']!=0 || $oldloj_row['fax']!=NULL){
					$contato = $this->insert('Contato_model', array(
												'con_conref_id' => (integer)$this->get('Contatoref_model', array('conref_nome' => 'Fax'), 'GetContatoRefId'),
												'con_value' 	=> $oldloj_row['fax'])
												);
					$this->insert('ContatoDep_model', array(
												'condep_con_id' 	=> (integer)$contato,
												'condep_deppj_id' 	=> (integer)$dep_pj)
												);
				}
				if($oldloj_row['tollfree']!=0 || $oldloj_row['tollfree']!=NULL){
					$contato = $this->insert('Contato_model', array(
												'con_conref_id' => (integer)$this->get('Contatoref_model', array('conref_nome' => 'Tollfree'), 'GetContatoRefId'),
												'con_value' 	=> $oldloj_row['tollfree'])
												);
					$this->insert('ContatoDep_model', array(
												'condep_con_id' 	=> (integer)$contato,
												'condep_deppj_id' 	=> (integer)$dep_pj)
												);
				}
				if($oldloj_row['plantao_lojas']!=0 || $oldloj_row['plantao_lojas']!=NULL){
					$contato = $this->insert('Contato_model', array(
												'con_conref_id' => (integer)$this->get('Contatoref_model', array('conref_nome' => 'Plantao'), 'GetContatoRefId'),
												'con_value' 	=> $oldloj_row['plantao_lojas'])
												);
					$this->insert('ContatoDep_model', array(
												'condep_con_id' 	=> (integer)$contato,
												'condep_deppj_id' 	=> (integer)$dep_pj)
												);
				}
				if($oldloj_row['email']!=0 || $oldloj_row['email']!=NULL){
					$contato = $this->insert('Contato_model', array(
												'con_conref_id' => (integer)$this->get('Contatoref_model', array('conref_nome' => 'Email'), 'GetContatoRefId'),
												'con_value' 	=> strtolower($oldloj_row['email']))
												);
					$this->insert('ContatoDep_model', array(
												'condep_con_id' 	=> (integer)$contato,
												'condep_deppj_id' 	=> (integer)$dep_pj)
												);
				}
				
			$insertloj = array(
								'loj_id'		=> (integer)$oldloj_row['id_loja'],
								'loj_met_id'	=> (integer)$loj_met_id,
								'loj_end_id'	=> (integer)$end_id,
								'loj_loc_id'	=> (integer)$oldloj_row['id_locadoras'],
								'loj_city_id'	=> ((integer)$this->get('Cidade_model', array('city_nome' => $oldloj_row['cidade'], 'city_uf_id' => $estado_id), 'GetCidadeId')!=0) ? (integer)$this->get('Cidade_model', array('city_nome' => $oldloj_row['cidade']), 'GetCidadeId'): NULL,
								'loj_nome'		=> $oldloj_row['nome'],
								'loj_iata'		=> $oldloj_row['iata_loja'],
								'loj_aero'		=> ($oldloj_row['sigla']==1) ? 't' : 'f',
								'loj_permalink'	=> ($oldloj_row['link_name']!='') ? $oldloj_row['link_name'] : strtolower(str_replace(' ', '-', $oldloj_row['nome'])),
								'loj_classe'	=> ($oldloj_row['link_name']!='') ? $oldloj_row['link_name'] : strtolower(str_replace(' ', '-', $oldloj_row['nome'])),
								'loj_obs'		=> $oldloj_row['obs_lojas'],
								'loj_ativo'		=> ($oldloj_row['ativo']==1) ? 't' : 'f',
								'loj_valorextra'=> $oldloj_row['valor_extra'],
								'loj_texto_livre'=> $oldloj_row['texto_livre_lojas']
								);
			$loc = $this->insert('Loja_model', $insertloj);
		if($oldloj_row['dom']==1){
					$this->insert('HorarioLojas_model', array(
												'hloj_loj_id' 		=> (integer)$oldloj_row['id_loja'],
												'hloj_weekday' 		=> 0,
												'hloj_horainicial' 	=> $oldloj_row['hora_ini_dom'],
												'hloj_horafinal' 	=> $oldloj_row['hora_fim_dom'],
												'hloj_ativo' 		=> 't')
												);
				}
				if($oldloj_row['seg']==1){
					$this->insert('HorarioLojas_model', array(
												'hloj_loj_id' 		=> (integer)$oldloj_row['id_loja'],
												'hloj_weekday' 		=> 1,
												'hloj_horainicial' 	=> $oldloj_row['hora_ini'],
												'hloj_horafinal' 	=> $oldloj_row['hora_fim'],
												'hloj_ativo' 		=> 't')
												);
				}
				if($oldloj_row['ter']==1){
					$this->insert('HorarioLojas_model', array(
												'hloj_loj_id' 		=> (integer)$oldloj_row['id_loja'],
												'hloj_weekday' 		=> 2,
												'hloj_horainicial' 	=> $oldloj_row['hora_ini'],
												'hloj_horafinal' 	=> $oldloj_row['hora_fim'],
												'hloj_ativo' 		=> 't')
												);
				}
				if($oldloj_row['qua']==1){
					$this->insert('HorarioLojas_model', array(
												'hloj_loj_id' 		=> (integer)$oldloj_row['id_loja'],
												'hloj_weekday' 		=> 3,
												'hloj_horainicial' 	=> $oldloj_row['hora_ini'],
												'hloj_horafinal' 	=> $oldloj_row['hora_fim'],
												'hloj_ativo' 		=> 't')
												);
				}
				if($oldloj_row['qui']==1){
					$this->insert('HorarioLojas_model', array(
												'hloj_loj_id' 		=> (integer)$oldloj_row['id_loja'],
												'hloj_weekday' 		=> 4,
												'hloj_horainicial' 	=> $oldloj_row['hora_ini'],
												'hloj_horafinal' 	=> $oldloj_row['hora_fim'],
												'hloj_ativo' 		=> 't')
												);
				}
				if($oldloj_row['sex']==1){
					$this->insert('HorarioLojas_model', array(
												'hloj_loj_id' 		=> (integer)$oldloj_row['id_loja'],
												'hloj_weekday' 		=> 5,
												'hloj_horainicial' 	=> $oldloj_row['hora_ini'],
												'hloj_horafinal' 	=> $oldloj_row['hora_fim'],
												'hloj_ativo' 		=> 't')
												);
				}
				if($oldloj_row['sab']==1){
					$this->insert('HorarioLojas_model', array(
												'hloj_loj_id' 		=> (integer)$oldloj_row['id_loja'],
												'hloj_weekday' 		=> 6,
												'hloj_horainicial' 	=> $oldloj_row['hora_ini_sab'],
												'hloj_horafinal' 	=> $oldloj_row['hora_fim_sab'],
												'hloj_ativo' 		=> 't')
												);
				}
				$this->insert('Pagina_model', array(
												'pag_proj_id' 	=> 1,
												'pag_met_id'	=> (integer)$loj_met_id,
												'pag_url' 		=> 'loja/'.$oldloj_row['link_name'],
												'pag_class' 	=> '/loja/'.$oldloj_row['id_loja'],
												'pag_class_tipo' => 'f')
											);
				$this->insert('Pagina_model', array(
												'pag_proj_id' 	=> 2,
												'pag_met_id'	=> (integer)$loj_met_id,
												'pag_url' 		=> 'loja/'.$oldloj_row['link_name'],
												'pag_class' 	=> '/loja/'.$oldloj_row['id_loja'],
												'pag_class_tipo' => 'f')
											);
				
				$this->insert('Projetoclasse_model', array(
						'projcla_proj_id' 	=> 1,
						'projcla_cla_id' 	=> (integer)$oldloj_row['id_loja'],
						'projcla_refcla_id' => 2
					)
				);
				$this->insert('Projetoclasse_model', array(
						'projcla_proj_id' 	=> 2,
						'projcla_cla_id' 	=> (integer)$oldloj_row['id_loja'],
						'projcla_refcla_id' => 2
					)
				);
		}
		redirect('/dbconvert/index');
	}
	
	function carrega_cidades(){
		mysql_select_db('cep', $this->old_db);
		$query_cidades = "SELECT DISTINCT CHVLOCAL_LOG, NOME_LOCAL, UF_LOG FROM ceps ORDER BY CHVLOCAL_LOG ASC";
		$lista_cidades = mysql_query($query_cidades, $this->old_db) or die(mysql_error());
		$row_cidades = mysql_fetch_assoc($lista_cidades);
		$totalrows_cidades = mysql_num_rows($lista_cidades);
		$total_inserted = 0;
		do{
			$city_met_id = $this->insert('Metatags_model', array(
												'met_title' 		=> $row_cidades['NOME_LOCAL'],
												'met_description' 	=> "Aluguel de carro em ".$row_cidades['NOME_LOCAL'].", ".$row_cidades['UF_LOG']." - "."Brasil",
												'met_keywords' 		=> $row_cidades['NOME_LOCAL'].", "
																	.$row_cidades['UF_LOG'].", "."Brasil"
																	.", "."aluguel de carros"
																	.", "."rent a car"
																	.", "."locadoras de carros"
																	.", "."locação de carros"
																	.", "."aluguel de veiculos"
																	.", "."locadoras de veiculos"
																	.", "."aluguel de automovel"
																	.", "."locação de veiculos"
																	.", "."alugar carro em")
												);
			$this->insert('Cidade_model', array(
												'city_id' 		=> $row_cidades['CHVLOCAL_LOG'],
												'city_pais_id' 	=> 1,
												'city_nome' 	=> $row_cidades['NOME_LOCAL'],
												'city_met_id' 	=> $city_met_id,
												'city_uf_id' 	=> (integer)$this->get('Estado_model', array('uf_abr' => $row_cidades['UF_LOG']), 'GetEstadoId'))
											);
			$tag_id = $this->insert('Tags_model', array('tag_nome' => $row_cidades['NOME_LOCAL']));
			$this->insert('Tagcidade_model', array(
												'tagcity_city_id'=> $row_cidades['CHVLOCAL_LOG'],
												'tagcity_tag_id' => $tag_id)
											);
			$total_inserted ++;
		} while ($row_cidades = mysql_fetch_assoc($lista_cidades));
		redirect('/dbconvert/index');
	}
	
	function carrega_bairros(){
		mysql_select_db('cep', $this->old_db);
		$query_bairros = "SELECT DISTINCT CHVBAI1_LOG, EXTENSO_BAI, ABREV_BAI, CHVLOCAL_LOG FROM ceps ORDER BY CHVBAI1_LOG ASC";
		$lista_bairros = mysql_query($query_bairros, $this->old_db) or die(mysql_error());
		$row_bairros = mysql_fetch_assoc($lista_bairros);
		$totalrows_bairros = mysql_num_rows($lista_bairros);
		$total_inserted = 0;
		do{
			$this->insert('Bairro_model', array(
												'bai_id' 		=> $row_bairros['CHVBAI1_LOG'],
												'bai_city_id' 	=> $row_bairros['CHVLOCAL_LOG'],
												'bai_nome' 		=> $row_bairros['EXTENSO_BAI'],
												'bai_abr' 		=> $row_bairros['ABREV_BAI'])
											);
			$tagb_id = $this->insert('Tags_model', array('tag_nome' => $row_bairros['EXTENSO_BAI']));
			$this->insert('Tagcidade_model', array(
												'tagcity_city_id'=> $row_bairros['CHVLOCAL_LOG'],
												'tagcity_tag_id' => $tagb_id)
											);
			$total_inserted ++;
		} while ($row_bairros = mysql_fetch_assoc($lista_bairros));
		redirect('/dbconvert/index');
	}
	
	function carrega_ceps(){
		mysql_select_db('cep', $this->old_db);
		$query_ceps = "SELECT * FROM ceps";
		$lista_ceps = mysql_query($query_ceps, $this->old_db) or die(mysql_error());
		$row_ceps = mysql_fetch_assoc($lista_ceps);
		$totalrows_ceps = mysql_num_rows($lista_ceps);
		$total_inserted = 0;
		do{
			$this->insert('Cep_model', array(
												'cep_city_id' 	=> $row_ceps['CHVLOCAL_LOG'],
												'cep_rua' 		=> $row_ceps['NOME_LOG'],
												'cep_bairro' 	=> $row_ceps['CHVBAI1_LOG'],
												'cep_codigo' 	=> $row_ceps['CEP8_LOG'],
												'cep_compl' 	=> $row_ceps['COMPLE_LOG'],
												'cep_tipo' 		=> $row_ceps['ABREV_TIPO'],
												'cep_uf_id' 	=> (integer)$this->get('Estado_model', array('uf_abr' => $row_ceps['UF_LOG']), 'GetEstadoId'))
											);
			$total_inserted ++;
		} while ($row_ceps = mysql_fetch_assoc($lista_ceps));
		redirect('/dbconvert/index');
	}
	
	function carrega_categorias(){
		mysql_select_db('layum', $this->old_db);
		$query_old_cat = "SELECT * FROM loc_categoria";
		$lista_old_cat = mysql_query($query_old_cat, $this->old_db) or die(mysql_error());
		$row_oldcat = mysql_fetch_assoc($lista_old_cat);
		
		do{
			$this->old_cat[] = $row_oldcat;
		} while ($row_oldcat = mysql_fetch_assoc($lista_old_cat));
		
		foreach ($this->old_cat as $oldcat_row){
			$cat_met_id = $this->insert('Metatags_model', array(
												'met_title' 		=> ($oldcat_row['meta_title']!='') ? $oldcat_row['meta_title'] : $oldcat_row['descricao'],
												'met_description' 	=> $oldcat_row['meta_description'],
												'met_keywords' 		=> $oldcat_row['meta_keywords'])
												);
			$this->insert('Categoria_model', array(
												'cat_id' 		=> $oldcat_row['id_categoria'],
												'cat_met_id'	=> (integer)$cat_met_id,
												'cat_nome' 		=> $oldcat_row['descricao'],
												'cat_ordem' 	=> $oldcat_row['ordem_categoria'],
												'cat_desc' 		=> $oldcat_row['lt_desc_categoria'],
												'cat_permalink'	=> $oldcat_row['nome_categoria'],
												'cat_classe' 	=> $oldcat_row['nome_categoria'])
											);
			$this->insert('Pagina_model', array(
												'pag_proj_id' 	=> 1,
												'pag_met_id'	=> (integer)$cat_met_id,
												'pag_url' 		=> 'categoria/'.$oldcat_row['nome_categoria'],
												'pag_class' 	=> '/categoria/'.$oldcat_row['id_categoria'],
												'pag_link_titulo' 	=> $oldcat_row['descricao'],
												'pag_class_tipo' => 'f')
											);
			$this->insert('Pagina_model', array(
												'pag_proj_id' 	=> 2,
												'pag_met_id'	=> (integer)$cat_met_id,
												'pag_url' 		=> 'categoria/'.$oldcat_row['nome_categoria'],
												'pag_class' 	=> '/categoria/'.$oldcat_row['id_categoria'],
												'pag_link_titulo' 	=> $oldcat_row['descricao'],
												'pag_class_tipo' => 'f')
											);
		}
		redirect('/dbconvert/index');
	}
	function carrega_carros(){
		mysql_select_db('layum', $this->old_db);
		$query_old_car = "SELECT * FROM loc_carros";
		$lista_old_car = mysql_query($query_old_car, $this->old_db) or die(mysql_error());
		$row_oldcar = mysql_fetch_assoc($lista_old_car);
		
		do{
			$this->old_car[] = $row_oldcar;
		} while ($row_oldcar = mysql_fetch_assoc($lista_old_car));
		
		foreach ($this->old_car as $oldcar_row){
			$car_met_id = $this->insert('Metatags_model', array(
												'met_title' 		=> ($oldcar_row['meta_title']!='') ? $oldcar_row['meta_title'] : $oldcar_row['modelo'],
												'met_description' 	=> $oldcar_row['meta_description'],
												'met_keywords' 		=> $oldcar_row['meta_keywords'])
												);
			$this->insert('Carro_model', array(
												'car_id' 			=> $oldcar_row['id_carros'],
												'car_met_id'		=> (integer)$car_met_id,
												'car_modelo' 		=> $oldcar_row['modelo'],
												'car_passageiros' 	=> $oldcar_row['pass_adulto'],
												'car_malagde' 		=> $oldcar_row['mala_gde'],
												'car_malapeq'		=> $oldcar_row['mala_peq'],
												'car_motor' 		=> $oldcar_row['motor'],
												'car_cambio' 		=> $oldcar_row['cambio'],
												'car_desc' 			=> $oldcar_row['descCarro'],
												'car_linkyoutube' 	=> $oldcar_row['youtube_carros'],
												'car_txtyoutube' 	=> $oldcar_row['txt_auth_video'])
											);
			$this->insert('Pagina_model', array(
												'pag_proj_id' 	=> 1,
												'pag_met_id'	=> (integer)$car_met_id,
												'pag_url' 		=> 'carro/'.str_replace(' ', '-', strtolower(parent::RemoveAcentos($oldcar_row['modelo']))),
												'pag_class' 	=> '/carro/'.$oldcar_row['id_carros'],
												'pag_class_tipo' => 'f')
											);
			$this->insert('Pagina_model', array(
												'pag_proj_id' 	=> 2,
												'pag_met_id'	=> (integer)$car_met_id,
												'pag_url' 		=> 'carro/'.str_replace(' ', '-', strtolower(parent::RemoveAcentos($oldcar_row['modelo']))),
												'pag_class' 	=> '/carro/'.$oldcar_row['id_carros'],
												'pag_class_tipo' => 'f')
											);
				$this->insert('Projetoclasse_model', array(
						'projcla_proj_id' 	=> 1,
						'projcla_cla_id' 	=> $oldcar_row['id_carros'],
						'projcla_refcla_id' => 3
					)
				);
				$this->insert('Projetoclasse_model', array(
						'projcla_proj_id' 	=> 2,
						'projcla_cla_id' 	=> $oldcar_row['id_carros'],
						'projcla_refcla_id' => 3
					)
				);
			
		}
		redirect('/dbconvert/index');
	}
	
	function carrega_grupos(){
		mysql_select_db('layum', $this->old_db);
		$query_old_grp = "SELECT * FROM loc_grupos";
		$lista_old_grp = mysql_query($query_old_grp, $this->old_db) or die(mysql_error());
		$row_oldgrp = mysql_fetch_assoc($lista_old_grp);
		
		do{
			$this->old_grp[] = $row_oldgrp;
		} while ($row_oldgrp = mysql_fetch_assoc($lista_old_grp));
		
		foreach ($this->old_grp as $oldgrp_row){
			$this->insert('Grupo_model', array(
												'grp_id' 			=> $oldgrp_row['id_grupo'],
												'grp_cat_id'		=> $oldgrp_row['id_categoria'],
												'grp_loc_id' 		=> $oldgrp_row['id_locadora'],
												'grp_nome' 			=> $oldgrp_row['grupo'],
												'grp_permalink' 	=> $oldgrp_row['categoria'],
												'grp_sipp_code'		=> $oldgrp_row['sipp_code'],
												'grp_ota_tipo' 		=> $oldgrp_row['ota_tipo'],
												'grp_ota_size' 		=> $oldgrp_row['ota_size'],
												'grp_ota_portas' 	=> $oldgrp_row['ota_portas'])
											);
				$this->insert('Projetoclasse_model', array(
						'projcla_proj_id' 	=> 1,
						'projcla_cla_id' 	=> $oldgrp_row['id_grupo'],
						'projcla_refcla_id' => 4
					)
				);
				$this->insert('Projetoclasse_model', array(
						'projcla_proj_id' 	=> 2,
						'projcla_cla_id' 	=> $oldgrp_row['id_grupo'],
						'projcla_refcla_id' => 4
					)
				);
			}
		foreach ($this->old_grp as $oldgrp_row){
			if($oldgrp_row['id_carro1']!=NULL){
				$this->insert('Carrosgrupo_model', array(
												'cargrp_grp_id' => $oldgrp_row['id_grupo'],
												'cargrp_car_id'	=> $oldgrp_row['id_carro1'])
											);
			}
			if($oldgrp_row['id_carro2']!=NULL){
				$this->insert('Carrosgrupo_model', array(
												'cargrp_grp_id' => $oldgrp_row['id_grupo'],
												'cargrp_car_id'	=> $oldgrp_row['id_carro2'])
											);
			}
			if($oldgrp_row['id_carro3']!=NULL){
				$this->insert('Carrosgrupo_model', array(
												'cargrp_grp_id' => $oldgrp_row['id_grupo'],
												'cargrp_car_id'	=> $oldgrp_row['id_carro3'])
											);
			}
			if($oldgrp_row['id_carro4']!=NULL){
				$this->insert('Carrosgrupo_model', array(
												'cargrp_grp_id' => $oldgrp_row['id_grupo'],
												'cargrp_car_id'	=> $oldgrp_row['id_carro4'])
											);
			}
			if($oldgrp_row['id_carro5']!=NULL){
				$this->insert('Carrosgrupo_model', array(
												'cargrp_grp_id' => $oldgrp_row['id_grupo'],
												'cargrp_car_id'	=> $oldgrp_row['id_carro5'])
											);
			}
			if($oldgrp_row['2p']==1){
				$this->insert('grpespecassoc_model', array(
												'grpespecassoc_grpespec_id' => 1,
												'grpespecassoc_grp_id'		=> $oldgrp_row['id_grupo'])
											);
			}
			if($oldgrp_row['4p']==1){
				$this->insert('grpespecassoc_model', array(
												'grpespecassoc_grpespec_id' => 2,
												'grpespecassoc_grp_id'		=> $oldgrp_row['id_grupo'])
											);
			}
			if($oldgrp_row['dh']==1){
				$this->insert('grpespecassoc_model', array(
												'grpespecassoc_grpespec_id' => 3,
												'grpespecassoc_grp_id'		=> $oldgrp_row['id_grupo'])
											);
			}
			if($oldgrp_row['ac']==1){
				$this->insert('grpespecassoc_model', array(
												'grpespecassoc_grpespec_id' => 4,
												'grpespecassoc_grp_id'		=> $oldgrp_row['id_grupo'])
											);
			}
			if($oldgrp_row['te']==1){
				$this->insert('grpespecassoc_model', array(
												'grpespecassoc_grpespec_id' => 5,
												'grpespecassoc_grp_id'		=> $oldgrp_row['id_grupo'])
											);
			}
			if($oldgrp_row['cd']==1){
				$this->insert('grpespecassoc_model', array(
												'grpespecassoc_grpespec_id' => 6,
												'grpespecassoc_grp_id'		=> $oldgrp_row['id_grupo'])
											);
			}
		}
		redirect('/dbconvert/index');
	}
	
	function carrega_targrupos(){
		mysql_select_db('layum', $this->old_db);
		$query_old_targrp = "SELECT * FROM loc_grupos_valores";
		$lista_old_targrp = mysql_query($query_old_targrp, $this->old_db) or die(mysql_error());
		$row_oldtargrp = mysql_fetch_assoc($lista_old_targrp);
		
		do{
			$this->old_targrp[] = $row_oldtargrp;
		} while ($row_oldtargrp = mysql_fetch_assoc($lista_old_targrp));
		
		foreach ($this->old_targrp as $oldtargrp_row){
			if($this->get('grupo_model', array('grp_id' => $oldtargrp_row['grupo_valores']))){
				$this->insert('Tarifagrupos_model', array(
												'targrp_id' 				=> $oldtargrp_row['id_grupos_valores'],
												'targrp_grp_id' 			=> $oldtargrp_row['grupo_valores'],
												'targrp_ndiainicial'		=> $oldtargrp_row['n_dia_inicial'],
												'targrp_ndiafinal' 			=> $oldtargrp_row['n_dia_final'],
												'targrp_valor' 				=> $oldtargrp_row['valor_valores'],
												'targrp_dia_extra'			=> $oldtargrp_row['valor_dia_extra_valores'],
												'targrp_km' 				=> $oldtargrp_row['km_valores'],
												'targrp_validadeinicial'	=> $oldtargrp_row['validade_inicial_valores'],
												'targrp_validadefinal' 		=> $oldtargrp_row['validade_final_valores'],
												'targrp_dthcadastro' 		=> $oldtargrp_row['data_cadastro_valores'],
												'targrp_dthatualizacao' 	=> $oldtargrp_row['data_atualizacao_valores'],
												'targrp_ativo' 				=> $oldtargrp_row['ativo_valores'],
												'targrp_ordem' 				=> $oldtargrp_row['ordem_grp_val'])
											);
					$this->insert('Projetoclasse_model', array(
						'projcla_proj_id' 	=> 1,
						'projcla_cla_id' 	=> $oldtargrp_row['id_grupos_valores'],
						'projcla_refcla_id' => 5
					)
				);
				$this->insert('Projetoclasse_model', array(
						'projcla_proj_id' 	=> 2,
						'projcla_cla_id' 	=> $oldtargrp_row['id_grupos_valores'],
						'projcla_refcla_id' => 5
					)
				);
		
			}
		}
		redirect('/dbconvert/index');
	}
	function carrega_protecoes(){
		mysql_select_db('layum', $this->old_db);
		$query_old_prot = "SELECT * FROM loc_protecao";
		$lista_old_prot = mysql_query($query_old_prot, $this->old_db) or die(mysql_error());
		$row_oldprot = mysql_fetch_assoc($lista_old_prot);
		
		do{
			$this->old_prot[] = $row_oldprot;
		} while ($row_oldprot = mysql_fetch_assoc($lista_old_prot));
		
		foreach ($this->old_prot as $oldprot_row){
			$this->insert('Protecao_model', array(
												'prot_id' 					=> $oldprot_row['id_protecao'],
												'prot_loc_id' 				=> $oldprot_row['id_locadora'],
												'prot_nome'					=> $oldprot_row['protecao'],
												'prot_desc' 				=> $oldprot_row['descricao'],
												'prot_franquia' 			=> $oldprot_row['franquia_protecao'],
												'prot_franquia_terceiros'	=> $oldprot_row['franquia_terceiros_protecao'],
												'prot_ota' 					=> $oldprot_row['ota_protecao'],
												'prot_ordem'				=> $oldprot_row['ordem'],
												'prot_ativo' 				=> 't')
											);
			$this->insert('Projetoclasse_model', array(
						'projcla_proj_id' 	=> 1,
						'projcla_cla_id' 	=> $oldprot_row['id_protecao'],
						'projcla_refcla_id' => 6
					)
				);
				$this->insert('Projetoclasse_model', array(
						'projcla_proj_id' 	=> 2,
						'projcla_cla_id' 	=> $oldprot_row['id_protecao'],
						'projcla_refcla_id' => 6
					)
				);
			$grupos_prot = explode(',', $oldprot_row['grupos']);
			foreach($grupos_prot as $grp){
				$grupo_sele = $this->get('Grupo_model', array('grp_loc_id' => $oldprot_row['id_locadora'], 'grp_nome' => $grp), 'GetGrupoId');
				if($grp!=NULL && $grupo_sele!=FALSE){
					$this->insert('protecoesgrupo_model', array(
												'protgrp_grp_id' 	=> $grupo_sele,
												'protgrp_prot_id'	=> $oldprot_row['id_protecao'])
											);
					
					
				}
			};
		}
		redirect('/dbconvert/index');
	}
	function carrega_tarprot(){
		mysql_select_db('layum', $this->old_db);
		$query_old_tarprot = "SELECT * FROM loc_protecao_valores";
		$lista_old_tarprot = mysql_query($query_old_tarprot, $this->old_db) or die(mysql_error());
		$row_oldtarprot = mysql_fetch_assoc($lista_old_tarprot);
		
		do{
			$this->old_tarprot[] = $row_oldtarprot;
		} while ($row_oldtarprot = mysql_fetch_assoc($lista_old_tarprot));
		
		foreach ($this->old_tarprot as $oldtarprot_row){
			if($this->get('protecao_model', array('prot_id' => $oldtarprot_row['protecao_valores']))){
				$this->insert('Tarifaprotecoes_model', array(
												'tarprot_id' 			=> $oldtarprot_row['id_protecao_valores'],
												'tarprot_prot_id' 		=> $oldtarprot_row['protecao_valores'],
												'tarprot_valor'			=> $oldtarprot_row['valor_protecao_valores'],
												'tarprot_ndiainicial' 	=> $oldtarprot_row['dia_ini_protecao'],
												'tarprot_ndiafinal' 	=> $oldtarprot_row['dia_fim_protecao'],
												'tarprot_validadeinicial' 	=> '2010-01-01',
												'tarprot_validadefinal' 	=> '2011-12-31',
												'tarprot_dthcadastro'	=> $oldtarprot_row['data_cadastro_protecao_valores'],
												'tarprot_dthatualizacao'=> $oldtarprot_row['data_atualizacao_protecao_valores'],
												'tarprot_ativo'			=> 't')
											);
			$this->insert('Projetoclasse_model', array(
						'projcla_proj_id' 	=> 1,
						'projcla_cla_id' 	=> $oldtarprot_row['id_protecao_valores'],
						'projcla_refcla_id' => 7
					)
				);
				$this->insert('Projetoclasse_model', array(
						'projcla_proj_id' 	=> 2,
						'projcla_cla_id' 	=> $oldtarprot_row['id_protecao_valores'],
						'projcla_refcla_id' => 7
					)
				);
		
			}
		}
		redirect('/dbconvert/index');
	}
	
	function carrega_pessoajuridica(){
		mysql_select_db('layum', $this->old_db);
		$query_old_pessjur = "SELECT * FROM r_empresas";
		$lista_old_pessjur = mysql_query($query_old_pessjur, $this->old_db) or die(mysql_error());
		$row_oldpessjur = mysql_fetch_assoc($lista_old_pessjur);
		
		do{
			$this->old_pessjur[] = $row_oldpessjur;
		} while ($row_oldpessjur = mysql_fetch_assoc($lista_old_pessjur));
		
		foreach ($this->old_pessjur as $oldpessjur_row){
			if($oldpessjur_row['cod_stur_empresas'] == NULL || $oldpessjur_row['cod_stur_empresas'] == ''){
				$cnpj_ag_id = $this->insert('Temppessoajuridica_model', array(
						'tempcnpj_telefone' 	=> $oldpessjur_row['telefone_empresas'],
						'tempcnpj_fax' 			=> $oldpessjur_row['fax_empresas'],
						'tempcnpj_email' 		=> $oldpessjur_row['email_empresas'],
						'tempcnpj_cep' 			=> $oldpessjur_row['cep_empresas'],
						'tempcnpj_bairro' 		=> $oldpessjur_row['bairro_empresas'],
						'tempcnpj_cidade' 		=> $oldpessjur_row['cidade_empresas'],
						'tempcnpj_uf'			=> $oldpessjur_row['uf_empresas'],
						'tempcnpj_cnpj_cod' 	=> $oldpessjur_row['cnpj_empresas'],
						'tempcnpj_nomefantasia'	=> $oldpessjur_row['nome_empresas'],
						'tempcnpj_endereco'		=> $oldpessjur_row['endereco_empresas'],
						'tempcnpj_nomeresp' 	=> $oldpessjur_row['nome_fin'],
						'tempcnpj_emailresp' 	=> $oldpessjur_row['email_fin']
					)
				);
			}
			
			$end_id = $this->insert('Endereco_model', array(
					'end_cep_codigo'	=> $oldpessjur_row['cep_empresas'],
					'end_city_id' 		=> ((integer)$this->get('Cidade_model', array('city_nome' => $oldpessjur_row['cidade_empresas']), 'GetCidadeId')!=0) ? (integer)$this->get('Cidade_model', array('city_nome' => $oldpessjur_row['cidade_empresas']), 'GetCidadeId'): NULL,
					'end_endereco' 		=> $oldpessjur_row['endereco_empresas'],
					'end_complemento'	=> '',
					'end_numero' 		=> $oldpessjur_row['endereco_empresas'],
					'end_bairro' 		=> $oldpessjur_row['bairro_empresas'],
					'end_latitude' 		=> '',
					'end_longitude'		=> '',
				)
			);
			
			$cnpj_ag_id = $this->insert('Pessoajuridica_model', array(
					'cnpj_end_id' 		=> ((integer)$end_id!='') ? (integer)$end_id : NULL,
					'cnpj_nomefantasia' => $oldpessjur_row['nome_empresas'],
					'cnpj_stur_id' 		=> $oldpessjur_row['cod_stur_empresas'],
					'cnpj_razaosoc' 	=> NULL,
					'cnpj_numero' 		=> $oldpessjur_row['cnpj_empresas'],
					'cnpj_ie' 			=> NULL,
					'cnpj_codigo_web'	=> $oldpessjur_row['codigoweb'],
					'cnpj_senha_web' 	=> $oldpessjur_row['senhaweb'],
					'cnpj_credito' 		=> $oldpessjur_row['credito']
				)
			);
			
			if($cnpj_ag_id){
				$dep_pj = $this->insert('Departamentopj_model', array(
						'deppj_dep_id' 	=> 3,
						'deppj_cnpj_id' => (integer)$cnpj_ag_id
					)
				);
			}
			
			if($oldpessjur_row['telefone_empresas']!=0 || $oldpessjur_row['telefone_empresas']!=NULL){
					$contato = $this->insert('Contato_model', array(
							'con_conref_id' => (integer)$this->get('Contatoref_model', array('conref_nome' => 'Telefone'), 'GetContatoRefId'),
							'con_value' 	=> $oldpessjur_row['telefone_empresas']
						)
					);
					$this->insert('ContatoDep_model', array(
							'condep_con_id' 	=> (integer)$contato,
							'condep_deppj_id' 	=> (integer)$dep_pj
						)
												
					);
				}
				
			if($oldpessjur_row['fax_empresas']!=0 || $oldpessjur_row['fax_empresas']!=NULL){
				$contato = $this->insert('Contato_model', array(
						'con_conref_id' => (integer)$this->get('Contatoref_model', array('conref_nome' => 'Fax'), 'GetContatoRefId'),
						'con_value' 	=> $oldpessjur_row['fax_empresas']
					)
				);
				$this->insert('ContatoDep_model', array(
						'condep_con_id' 	=> (integer)$contato,
						'condep_deppj_id' 	=> (integer)$dep_pj
					)
				);
			}
			
			if($oldpessjur_row['email_empresas']!=0 || $oldpessjur_row['email_empresas']!=NULL){
				$contato = $this->insert('Contato_model', array(
						'con_conref_id' => (integer)$this->get('Contatoref_model', array('conref_nome' => 'Email'), 'GetContatoRefId'),
						'con_value' 	=> strtolower($oldpessjur_row['email_empresas'])
					)
				);
				$this->insert('ContatoDep_model', array(
						'condep_con_id' 	=> (integer)$contato,
						'condep_deppj_id' 	=> (integer)$dep_pj
					)
				);
			}
			
			if($oldpessjur_row['email_fin']!=0 || $oldpessjur_row['email_fin']!=NULL){
				$contato = $this->insert('Contato_model', array(
						'con_conref_id' => (integer)$this->get('Contatoref_model', array('conref_nome' => 'Email'), 'GetContatoRefId'),
						'con_value' 	=> strtolower($oldpessjur_row['email_fin'])
					)
				);
				$this->insert('ContatoDep_model', array(
						'condep_con_id' 	=> (integer)$contato,
						'condep_deppj_id' 	=> (integer)$dep_pj
					)
				);
			}
		}	
		redirect('/dbconvert/index');
	}
	
	function carrega_pessoafisica(){
		mysql_select_db('layum', $this->old_db);
		$query_old_emissor = "SELECT * FROM r_emissor";
		$lista_old_emissor = mysql_query($query_old_emissor, $this->old_db) or die(mysql_error());
		$row_oldemissor = mysql_fetch_assoc($lista_old_emissor);
		
		do{
			$this->old_emissor[] = $row_oldemissor;
		} while ($row_oldemissor = mysql_fetch_assoc($lista_old_emissor));
		
		foreach ($this->old_emissor as $oldemissor_row){
			$nome = preg_split('/ /',$oldemissor_row['nome'], 2);
			$this->insert('Pessoafisica_model', array(
					'cpf_nome' 			=> strtoupper($nome[0]),
					'cpf_sobrenome'		=> (isset($nome[1])) ? strtoupper($nome[1]) : NULL,
					'cpf_passaporte'	=> $oldemissor_row['passaporte_cliente'],
					'cpf_numero' 		=> ($oldemissor_row['cpf_cliente']!=NULL) ? $oldemissor_row['cpf_cliente'] : $row_oldemissor['cpf'],
					'cpf_dtnasc'		=> ($oldemissor_row['dt_nascimento']!='0000-00-00') ? $oldemissor_row['dt_nascimento'] : NULL,
					'cpf_ativo' 		=> 't',
					'cpf_dthcadastro'	=> $oldemissor_row['data_cadastro']
				)
			);		
		}
		redirect('/dbconvert/index');
	}
	
	function hotel(){
		$this->insert('Destaques_model', array(
				'des_arquivo' 	=> 'banner_home1.swf',
				'des_conteudo'	=> '<h3><strong>Bourbon Batel Teste 1</strong></h3><p>Curitiba - PR</p><p>Di&aacute;rias a partir de R$ 100,00</p><p><a title=\"Reserve este hotel\" href=\"#\">Reserve</a></p>',
				'des_ordem'		=> 1
			)
		);
		$this->insert('Destaques_model', array(
				'des_arquivo' 	=> 'banner_home2.swf',
				'des_conteudo'	=> '<h3><strong>Bourbon Batel Teste 1</strong></h3><p>Curitiba - PR</p><p>Di&aacute;rias a partir de R$ 100,00</p><p><a title=\"Reserve este hotel\" href=\"#\">Reserve</a></p>',
				'des_ordem'		=> 2
			)
		);
		$this->insert('Destaques_model', array(
				'des_arquivo' 	=> 'banner_home3.swf',
				'des_conteudo'	=> '<h3><strong>Bourbon Batel Teste 1</strong></h3><p>Curitiba - PR</p><p>Di&aacute;rias a partir de R$ 100,00</p><p><a title=\"Reserve este hotel\" href=\"#\">Reserve</a></p>',
				'des_ordem'		=> 3
			)
		);
		redirect('/dbconvert/index');
	}
}
/* fim do arquivo dbconvert.php */
/* Location: ./system/application/controllers/dbconvert.php 
*/