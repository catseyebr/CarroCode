<?php $this->load->view(SITE.'/header'); ?>
<body class="topo_processo">
<!-- INÍCIO DIV PAGE -->
	<form name="confirma_locacao_form" id="confirma_locacao_form" action="/pesquisa/reservar" method="POST">
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
Caso você não seja brasileiro, clique <a href="/escolha_cadastro_pass.php?pack=61707">aqui</a> e informe o nº. de seu passaporte.
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
                                <td width="150"><label>CPF:</label></td>
                                <td><input name="cpf" id="cpf" type="text" class="campo_std validate[required,custom[cpf]]" size="15" maxlength="14" onkeyup="formatar_mascara(this, '###.###.###-##')" onblur="validarCPF(this.value)"/></td>
                            </tr><!--
                            <tr>
                                <td width="150"><label>Registro CNH:</label></td>
                                <td><input name="cnh" id="cnh" type="text" class="campo_std validate[custom[onlyNumber]]" size="11" maxlength="11" /></td>
                            </tr> -->
                            <tr>
                                <td width="150"><label>Data de Nascimento:</label></td>
                                <td><input name="dt_nascimento" id="dt_nascimento" type="text" class="campo_std validate[required,custom[date]]" size="15" maxlength="10" onkeyup="formatar_mascara(this, '##-##-####')"/></td>

                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div class="cadastro_cliente_right">
                    <fieldset>
                        <legend>Endereço</legend>
                        <table width="100%" border="0" cellspacing="3" cellpadding="3">

                            <tr>
                                <td width="150"><strong>CEP:</strong></td>
                                <td><input name="cep" id="cep" type="text" class="campo_std validate[required,custom[onlyNumber],length[8,8]]" size="8" maxlength="8" onchange="procuraCEP(this.value)"/></td>
                            </tr>
                            <tr>
                                <td width="150"><strong>Rua:</strong></td>
                                <td><input name="endereco" id="endereco" type="text" class="campo_std validate[required,length[0,100]]" size="45"/></td>
                            </tr>

                            <tr>
                                <td width="150"><strong>Número:</strong></td>
                                <td><input name="numero" id="numero" type="text" class="campo_std validate[required,custom[onlyNumber],length[0,10]]" size="15"/></td>
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
                                <td><select name="estado" id="estado" class="campo_estadoCidade validate[required]" onchange="carregaCidades(this.value)">
                                        <option value="">Escolha o Estado</option>

                                                                                <option value="AC">AC</option>
                                                                                <option value="AL">AL</option>
                                                                                <option value="AM">AM</option>
                                                                                <option value="AP">AP</option>
                                                                                <option value="BA">BA</option>
                                                                                <option value="CE">CE</option>

                                                                                <option value="DF">DF</option>
                                                                                <option value="ES">ES</option>
                                                                                <option value="GO">GO</option>
                                                                                <option value="MA">MA</option>
                                                                                <option value="MG">MG</option>
                                                                                <option value="MS">MS</option>

                                                                                <option value="MT">MT</option>
                                                                                <option value="PA">PA</option>
                                                                                <option value="PB">PB</option>
                                                                                <option value="PE">PE</option>
                                                                                <option value="PI">PI</option>
                                                                                <option value="PR">PR</option>

                                                                                <option value="RJ">RJ</option>
                                                                                <option value="RN">RN</option>
                                                                                <option value="RO">RO</option>
                                                                                <option value="RR">RR</option>
                                                                                <option value="RS">RS</option>
                                                                                <option value="SC">SC</option>

                                                                                <option value="SE">SE</option>
                                                                                <option value="SP">SP</option>
                                                                                <option value="TO">TO</option>
                                                                            </select>
                                </td>
                            </tr>
                            <tr>

                                <td width="150"><strong>Cidade:</strong></td>
                                <td>
                                    <select name="cidade" id="cidade" class="campo_estadoCidade validate[required]">
                                        <option value="">Escolha a cidade</option>
                                    </select>
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

                                <td><input name="telefone" id="telefone" type="text" class="campo_std validate[required,custom[telephone]]" size="15" maxlength="11" onkeyup="formatar_mascara(this, '##-########')"/></td>
                            </tr>
                            <tr>
                                <td width="150"><label>Fax:</label></td>
                                <td><input name="fax" id="fax" type="text" class="campo_std validate[optional,custom[telephone]]" size="15" maxlength="11" onkeyup="formatar_mascara(this, '##-########')"/></td>
                            </tr>
                            <tr>
                                <td width="150"><label>Celular:</label></td>

                                <td><input name="celular" id="celular" type="text" class="campo_std validate[optional,custom[telephone]]" size="15" maxlength="11" onkeyup="formatar_mascara(this, '##-########')"/></td>
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