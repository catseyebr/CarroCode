<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
  <?php $this->load->view('header'); ?>
<body>
  <div id="page">
        <?php 
  		    $this->load->view('topo');
  		  ?>
    <div id="content">
  		<div class="cont">
        <?php $this->load->view('menu_cliente') ?>
  	
        <div id="cadastro_cliente">
          <h3>Minha Conta</h3>		
            <form action="" method="POST">  	
              <fieldset>
          			<legend>Dados Pessoais</legend>
          				<table width="100%">
          					<tr>
                      <td width="200"> <label>Nome:</label> </td>
          						<td> <input id="nome" value="<?php echo $this->cliente->cli_nome; ?>" name="nome" class="box_cadastro" type="text" maxlength="64" /> </td>
          						<td> <div class="form_error"><?php echo form_error('nome')?></div> </td>
          					</tr>
          					<tr>
          						<td> <label>Sobrenome:</label> </td>
          						<td> <input id="sobrenome" value="<?php echo $this->cliente->cli_sobrenome; ?>" name="sobrenome" class="box_cadastro" type="text" maxlength="64" /> </td>
          					  <td> <div class="form_error"><?php echo form_error('sobrenome')?></div> </td>
                    </tr>
          					<tr>
          						<td><label>Sexo:</label></td>
          						<td> 
                        <select id="sexo" value="" name="sexo" class="box_cadastro" type="text" />
                          <option <?php if ($this->cliente->cli_sexo == "M") { ?> selected <?php } ?> value="M">Maculino</option>
                          <option <?php if ($this->cliente->cli_sexo == "F") { ?> selected <?php } ?> value="F">Feminino</option>
                        </select>
                      </td>
                      <td> <div class="form_error"><?php echo form_error('sexo')?></div> </td>
          					</tr>
          					<tr>
          						<td> <label>RG:</label> </td>
          						<td> <input id="rg" value="<?php echo $this->cliente->cli_rg; ?>" name="rg" class="box_cadastro" type="text" maxlength="18" onkeypress="javascript:return formataNumero(event);" /> </td>
          						<td> <div class="form_error"><?php echo form_error('rg')?></div> </td>
          					</tr>
          					<tr>
          						<td> <label>CPF:</label> </td>
          						<td> <input id="cpf" value="<?php echo $this->cliente->cli_cpf; ?>" name="cpf" class="box_cadastro" type="text" maxlength="14" /> </td>
          					  <td> <div class="form_error"><?php echo form_error('cpf')?></div> </td>
                    </tr>
          					<tr>
          						<td> <label>Data de Nascimento:</label> </td>
          						<td> 
                        <input id="data" value="<?php echo substr($this->cliente->cli_dtnasc,8,2)."/".substr($this->cliente->cli_dtnasc,5,2)."/".substr($this->cliente->cli_dtnasc,0,4); ?>" 
                               name="nascimento" id="data" class="box_cadastro" type="text" maxlength="10" />
                      </td>
                      <td> <div class="form_error"><?php echo form_error('nascimento')?></div> </td>
          					</tr>
          					<tr>
          						<td> <label>Telefone:</label> </td>
          						<td> <input id="telefone" value="<?php echo $this->cliente->tel_fone; ?>" name="telefone" class="box_cadastro" type="text" maxlength="32" /> </td>
          					  <td> <div class="form_error"><?php echo form_error('telefone')?></div> </td>
                    </tr>
          					<tr>
          					 <td>&nbsp;</td>
          					 <td>&nbsp;</td>
          				  </tr>
          				</table>
          		</fieldset>
          		<fieldset>
          		  <legend>Dados do Usu&aacute;rio</legend>
          		    <table>
          		      <tr>
          		        <td width="200"> <label>E-mail:</label> </td>
          		        <td> <input id="email" value="<?php echo $this->cliente->usu_email; ?>" name="email" class="box_cadastro" type="text" maxlength="140" /> </td>
          		        <td> <div class="form_error"><?php echo form_error('email')?></div> </td>
          		      </tr>
          		      <tr>
                      <td> <label>Usu&aacute;rio:</label> </td>
                      <td> <input disabled id="usuario" value="<?php echo $this->cliente->usu_usuario; ?>" name="usuario" class="box_cadastro" type="text" maxlength="70" /> </td>
                    </tr>
                    <tr>
                      <td> <label>Senha Atual:</label> </td>
                      <td> <input id="senha" value="" name="senha" class="box_cadastro" type="password" maxlength="30" /> </td>
                      <td> <div class="form_error"><?php echo form_error('senha')?></div> </td>
                    </tr>
                    <tr>
                      <td> <label>Nova Senha:</label> </td>
                      <td> <input id="nova_senha" value="" name="nova_senha" class="box_cadastro" type="password" maxlength="30" /> </td>
                      <td> <div class="form_error"><?php echo form_error('nova_senha')?></div> </td>
                    </tr>
                    <tr>
                      <td> <label>Confirmar Senha:</label> </td>
                      <td> <input id="confirmar_senha" value="" name="confirmar_senha" class="box_cadastro" type="password" maxlength="30" /> </td>
                      <td> <div class="form_error"><?php echo form_error('confirmar_senha')?></div> </td>
                    </tr>
                    <tr>
          					 <td>&nbsp;</td>
          					 <td>&nbsp;</td>
          				  </tr>
          		    </table>
              </fieldset>
              <fieldset>
                <legend>Dados de Endere&ccedil;o</legend>
                  <table>
                    <tr>
                      <td width="200"> <label>CEP:</label> </td>
                      <td> <input id="cep" value="<?php echo $this->cliente->end_cep; ?>" name="cep" class="box_cadastro" type="text" maxlength="8" /> </td>
                      <td> <div class="form_error"><?php echo form_error('cep')?></div> </td>
                    </tr>
                    <tr>
                      <td> <label>Rua:</label> </td>
                      <td> <input id="endereco" value="<?php echo $this->cliente->end_endereco; ?>" name="endereco" class="box_cadastro" type="text" maxlength="32" /> </td>
                      <td> <div class="form_error"><?php echo form_error('endereco')?></div> </td>
                    </tr>
                    <tr>
                      <td> <label>N&uacute;mero:</label> </td>
                      <td> <input id="numero" value="<?php echo $this->cliente->end_numero; ?>" name="numero" class="box_cadastro" type="text" maxlength="8" onkeypress="javascript:return formataNumero(event);" /> </td>
                      <td> <div class="form_error"><?php echo form_error('numero')?></div> </td>
                    </tr>
                    <tr>
                      <td> <label>Complemento:</label> </td>
                      <td> <input id="complemento" value="<?php echo $this->cliente->end_complemento; ?>" name="complemento" class="box_cadastro" type="text" maxlength="255" /> </td>
                      <td> <div class="form_error"><?php echo form_error('complemento')?></div> </td>
                    </tr>
                    <tr>
                      <td> <label>Bairro:</label> </td>
                      <td> <input id="bairro" value="<?php echo $this->cliente->end_bairro; ?>" name="bairro" class="box_cadastro" type="text" maxlength="128" /> </td>
                      <td> <div class="form_error"><?php echo form_error('bairro')?></div> </td>
                    </tr>
                    <tr>
                      <td><label> Estado: </label></td>
                      <td>
                        <select name="estado" id="estado">
                          <?php foreach ($this->estados as $estado) {?>
                            <option <?php if ($this->cliente->id_estado == $estado->id_estado){ ?> selected <?php } ?> value="<?php echo $estado->id_estado?>"><?php echo $estado->abr_estado?></option>
                          <?php  } ?>
          							</select>
          						</td>
          						<td><div class="form_error"><?php echo form_error('estado')?></div></td>
                    </tr>
                    <tr>
                      <td><label>Cidade:</label></td>
                      <td>
                        <input type="hidden" id="selecionado" value="<?php echo $this->cliente->id_cidade;?>">
                        <select name="cidade" id="cidade">
                          
                        </select>
                      </td>
                      <td><div class="form_error"><?php echo form_error('cidade')?></div></td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                      <td><input title="Enviar dados" type="image" src="/images/enviar.jpg" /></a></td>
                    </tr>
                  </table>
                </fieldset>  
            </form>
      	</div> <!-- FIM DIV CADASTRO_CLIENTE-->
      </div> <!-- FIM DIV CONT -->
    </div> <!-- FIM DIV CONTENT -->
  </div> <!-- FIM DIV PAGE -->
<?php $this->load->view('rodape'); ?>  
</body>
</html>