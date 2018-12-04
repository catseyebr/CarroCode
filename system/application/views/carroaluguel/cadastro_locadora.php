<?php $this->load->view(SITE.'/header'); ?>
<body style="background-image: url('/images/carroaluguel/bg_processo.gif');">
<!-- INÍCIO DIV PAGE -->
	<!-- INÍCIO DIV PAGE -->
	<div id="page">
	<!-- INÍCIO TOPO -->
			<?php $this->load->view(SITE.'/topo');?>
            <!-- FIM TOPO -->
        	<!-- INÍCIO MENU -->
			<?php $this->load->view(SITE.'/menu');?>
        	<!-- FIM MENU -->
        	<div id="geral_escolha">
        
        <div id="lojas_seguro">
        	<div id="login_cliente">
        			<strong>Aluguel de Carro: a melhor maneira de aumentar suas locações!</strong><br />
A CarroAluguel.Com recebe diariamente milhares de acessos todos os dias, atendendo clientes de todo Brasil e também do exterior.
    			</div>
                <div id="info_reserva">
            	<h3>Cadastro de Locadora</h3>
    </div>
        		<div id="info_cadastro_locadora">Solicite a inclusão de sua locadora em nosso sistema de locações online. <br />
Preencha o formulário abaixo com os dados da locadora.<br />
Seus dados serão encaminhados ao nosso Departamento Administrativo e Financeiro para avaliação e aprovação.
			</div>
            <form name="cadastro_de_locadora" id="cadastro_de_locadora" action="/cadastro_locadora" method="POST">
            	<div class="cadastro_cliente_left">
                	<fieldset>
                        <legend>Dados da Locadora</legend>
                        <table width="100%" border="0" cellspacing="3" cellpadding="3">
                            <tr>
                                <td width="150"><label>Nome:</label></td>
                                <td>
                                    <input name="locadora" id="locadora" type="text" class="campo_std validate[required,length[0,100]]" onKeyUp="formata_nome('locadora')" size="45"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="150"><label>CNPJ:</label></td>
                                <td><input name="cnpj" id="cnpj" type="text" class="campo_std validate[required]" size="20" maxlength="18" onKeyUp="formatar_mascara(this, '##.###.###/####-##')"/></td>
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
                                <td><input name="end_cep" id="end_cep" type="text" class="campo_std validate[required,custom[onlyNumber],length[8,8]]" size="8" maxlength="8" /></td>
                            </tr>
                            <tr>
                                <td width="150"><strong>Rua:</strong></td>
                                <td><input name="end_endereco" id="end_endereco" type="text" class="campo_std validate[required,length[0,100]]" size="45"/></td>
                            </tr>
                            <tr>
                                <td width="150"><strong>Bairro:</strong></td>
                                <td><input name="end_bairro" id="end_bairro" type="text" class="campo_std" size="20"/></td>
                            </tr>
                            <tr>
                                <td width="150"><strong>Estado:</strong></td>
                                <td><select name="end_estado" id="end_estado" class="campo_estadoCidade validate[required]">
                                        <option value="">Escolha o Estado</option>
                                       <?php foreach($this->estados as $uf){?>
                                        <option value="<?php echo $uf->uf_id;?>"><?php echo $uf->uf_nome;?></option>
										<?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150"><strong>Cidade:</strong></td>
                                <td>
                                    <select name="end_cidade" id="end_cidade" class="campo_estadoCidade validate[required]">
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
                                <td><input name="telefone" id="telefone" type="text" class="campo_std validate[required,custom[telephone]]" size="15" maxlength="11" onKeyUp="formatar_mascara(this, '##-########')"/></td>
                            </tr>
                            <tr>
                                <td width="150"><label>Fax:</label></td>
                                <td><input name="fax" id="fax" type="text" class="campo_std validate[optional,custom[telephone]]" size="15" maxlength="11" onKeyUp="formatar_mascara(this, '##-########')"/></td>
                            </tr>
                            <tr>
                                <td width="150"><label>Tollfree:</label></td>
                                <td><input name="tollfree" id="tollfree" type="text" class="campo_std validate[optional,custom[onlyNumber]]" size="15" maxlength="13" onKeyUp="formatar_mascara(this, '#### ### ####')"/></td>
                            </tr>
                            <tr>
                                <td width="150"><label>Email:</label></td>
                                <td><input name="email" id="email" type="text" class="campo_std validate[required,custom[email]]" size="30"/></td>
                            </tr>
                            <tr>
                                <td width="150"><label>Repita seu email:</label></td>
                                <td><input name="email2" id="email2" type="text" class="validate[required,confirm[email]] campo_std" size="30"/></td>
                            </tr>
                            <tr>
                                <td width="150"><label>Seu nome:</label></td>
                                <td>
                                    <input name="nome_contato" id="nome_contato" type="text" class="campo_std validate[required,custom[onlyLetter],length[0,100]]" onKeyUp="formata_nome('nome_contato')" size="45"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="150"><label>Cargo ou função:</label></td>
                                <td>
                                    <input name="cargo" id="cargo" type="text" class="campo_std validate[required]" size="45"/>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                
            </div>
            <div class="cadastro_cliente_right">
            	<input value="Enviar" class="botao_login" style="width: 100px; height: 35px; padding-top: 0px; padding-left: 0px;" type="submit" />
            </div></form>
</div>            	
		<!-- FIM INFORMAÇÕES LOGIN -->
</div>
	</div>
</div>
<!-- FIM DIV PAGE -->
<?php $this->load->view(SITE.'/footer.php'); ?>