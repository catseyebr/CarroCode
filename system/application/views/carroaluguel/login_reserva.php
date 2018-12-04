<?php $this->load->view(SITE.'/header'); ?>
<body class="topo_processo">
<!-- INÍCIO DIV PAGE -->
	<!-- INÍCIO DIV PAGE -->
	<div id="page">
	<!-- INÍCIO TOPO -->
			<?php $this->load->view(SITE.'/topo');?>
            <!-- FIM TOPO -->
        	<!-- INÍCIO MENU -->
			<?php $this->load->view(SITE.'/menu');?>
        	<!-- FIM MENU -->
        	<!-- INÍCIO ESCOLHA LOCADORA -->
    	<div id="geral_escolha">

        <!-- INÍCIO BARRA PROCESSO -->
        	<div id="barra_processo">
            	<div id="escolha">
                	<strong>01</strong>
                    <p>Pesquisa inicial
                    	<span>Retirada e devolução</span>
                    </p>
				</div>

                <div id="seguros">
                	<strong>02</strong>
                    <p>Escolha os adicionais
                    	<span>Lojas, seguro e serviços adicionais</span>

					</p>
				</div>
                <div id="ativo_identificacao">
                	<strong>03</strong>

                    <p>Identificação
                    	<span>Realize seu login e senha</span>
                    </p>
				</div>
                <div id="finalizacao">
                	<strong>04</strong>
                    <p>Finalização
                    	<span>Conclua sua reserva</span>

					</p>
				</div>
			</div>
		<!-- FIM BARRA PROCESSO -->
        <!-- INÍCIO INFORMAÇÕES LOGIN -->
        <div id="lojas_seguro">
        	<div id="escolha_login">
        		<strong>Para prosseguir com seu pedido de reserva é necessário identificar-se.</strong><br /><br />

                Se você já possui cadastro junto a CarroAluguel.com, preencha o campo abaixo com seu CPF (999.999.999-99) e E-Mail (nome@email.com).<br />
                Caso não seja cadastrado, clique no link ao lado.
			</div>
        
            	<div id="loja_retirada">
                <form name="login_de_usuario" id="login_de_usuario" action="autenticacao.php" method="POST">
                	<ul>
                    	<li class="first"><strong>Acesso Cliente</strong></li>
                        <li>

                        	<table><tr><td width="50"><strong>CPF: </strong></td><td><input type="text" id="cpf" name="cpf" class="campo_std validate[required,custom[cpf]]" size="30" maxlength="14" onKeyUp="formatar_mascara(this, '###.###.###-##')"/><br /><a href="login-passaporte">Não sou brasileiro / não possuo CPF.</a></td></tr></table>
                        </li>
                        <li><table><tr><td width="50"><strong>Email: </strong></td><td><input type="text" id="email" name="email" class="campo_std validate[required,custom[email]]" size="30"/></td></tr></table></li>
                        <input name="pack" type="hidden" value="61707" />
                        <input value="Acessar" class="botao_login" style="width: 100px; height: 35px; padding-top: 0px; padding-left: 0px; margin-top:5px;" type="submit" />
					</ul>
                 </form>

				</div>
                <div id="loja_devolucao">
                	<ul>
                    	<li class="first"><strong>Cadastre-se</strong></li>
                        <li style="height:10px;">&nbsp;</li>
                        <li><strong>Ainda não possui sua conta? Clique no botão abaixo</strong></li>
                        <li style="height:10px;">&nbsp;</li>
                        <li><a href="/pesquisa/cadastro-cpf" title="Cadastre-se" class="botao_login_cadastro" style="cursor:pointer">Cadastre-se</a></li>

                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
					</ul>
                    
				</div>
		</div>
		<!-- FIM INFORMAÇÕES LOGIN -->
</div>

</div>
<!-- FIM DIV PAGE -->
<?php $this->load->view(SITE.'/footer.php'); ?>