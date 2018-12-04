<?php $this->load->view(SITE.'/header'); ?>
<body class="topo_processo">
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
                    <p>Escolha a loja
                    	<span>Loja de retirada e devolução</span>
                    </p>
				</div>

                <div id="seguros">
                	<strong>02</strong>
                    <p>Escolha os seguros
                    	<span>Seguro, produtos e serviços adicionais</span>
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
        <div id="info_reserva">
            	<h3>Cadastro de Cliente - Pessoa Física</h3>
    </div>

        <div id="lojas_seguro">
        	<div id="escolha_login">
        		<strong>Preencha seus dados pessoais no formulário abaixo para continuar.</strong><br />
Se você é brasileiro, clique <a href="/pesquisa/cadastro-cpf">aqui</a>.
			</div>
            <form name="cadastro_de_usuario" id="cadastro_de_usuario" action="/pesquisa/cadastrar" method="POST">
            	<div class="cadastro_cliente_left">
                	<fieldset>

                        <legend>Dados Pessoais</legend>
                        <table width="100%" border="0" cellspacing="3" cellpadding="3">
                            <tr>
                                <td width="150"><label>Nome:</label></td>
                                <td>
                                    <input name="nome" id="nome" type="text" class="campo_std validate[required,length[0,100]]" onkeyup="formata_nome('nome')" size="45"/>
                                    <input name="pack" id="pack" type="hidden" value="61707" />
                                </td>

                            </tr>
                            <tr>
                                <td width="150"><label>Nro. do Passaporte:</label></td>
                                <td><input name="passport" id="passport" type="text" class="campo_std validate[required]" size="15"/></td>
                            </tr>
                            <tr>
                                <td width="150"><label>Data de Nascimento:</label></td>
                                <td><input name="dt_nascimento" id="dt_nascimento" type="text" class="campo_std validate[required,custom[date]]" size="15" onkeyup="formatar_mascara(this, '##-##-####')"/></td>

                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div class="cadastro_cliente_right">
                    <fieldset>
                        <legend>Endereço</legend>
                        <table width="100%" border="0" cellspacing="3" cellpadding="3">

                         	<tr>
                                <td width="150"><strong>País:</strong></td>
                                <td><input name="pais" id="pais" type="text" class="campo_std" size="45"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="150"><strong>CEP:</strong></td>
                                <td><input name="cep" id="cep" type="text" class="campo_std" size="10" maxlength="10"/></td>

                            </tr>
                            <tr>
                                <td width="150"><strong>Rua:</strong></td>
                                <td><input name="endereco" id="endereco" type="text" class="campo_std" size="45"/></td>
                            </tr>
                            <tr>
                                <td width="150"><strong>Número:</strong></td>
                                <td><input name="numero" id="numero" type="text" class="campo_std" size="15"/></td>

                            </tr>
                            <tr>
                                <td width="150"><strong>Complemento:</strong></td>
                                <td><input name="complemento" id="complemento" type="text" class="campo_std" size="20"/></td>
                            </tr>
                            <tr>
                                <td width="150"><strong>Bairro:</strong></td>
                                <td><input name="bairro" id="bairro" type="text" class="campo_std" size="20"/></td>

                            </tr>
                            <tr>
                                <td width="150"><strong>Estado:</strong></td>
                                <td><input name="estado" id="estado" type="text" class="campo_std" size="20"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="150"><strong>Cidade:</strong></td>

                                <td><input name="cidade" id="cidade" type="text" class="campo_std" size="20"/>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div class="cadastro_cliente_left">
                    <fieldset>
                        <legend>Dados de Contato</legend>

                        <table width="100%" border="0" cellspacing="3" cellpadding="3">
                            <tr>
                                <td width="150"><label>Telefone:</label></td>
                                <td><input name="telefone" id="telefone" type="text" class="campo_std validate[required]" size="15"/></td>
                            </tr>
                            <tr>
                                <td width="150"><label>Fax:</label></td>
                                <td><input name="fax" id="fax" type="text" class="campo_std" size="15"/></td>

                            </tr>
                            <tr>
                                <td width="150"><label>Celular:</label></td>
                                <td><input name="celular" id="celular" type="text" class="campo_std" size="15"/></td>
                            </tr>
                            <tr>
                                <td width="150"><label>Email:</label></td>
                                <td><input name="email" id="email" type="text" class="campo_std validate[required,custom[email]]" size="30"/></td>

                            </tr>
                            <tr>
                                <td width="150"><label>Repita seu email:</label></td>
                                <td><input name="email2" id="email2" type="text" class="validate[required,confirm[email]] campo_std" size="30"/></td>
                            </tr>
                        </table>
                    </fieldset>
                
            </div>

            <div class="cadastro_cliente_right">
            	<input value="Enviar" class="botao_login" style="width: 100px; height: 35px; padding-top: 0px; padding-left: 0px;" type="submit" />
            </div>
</div>            	
		<!-- FIM INFORMAÇÕES LOGIN -->
</div>
</div>
</form>
<!-- FIM DIV PAGE -->
<?php $this->load->view(SITE.'/footer.php'); ?>