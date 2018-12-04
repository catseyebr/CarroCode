<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
  <?php $this->load->view('header'); ?>
<body>
  <div id="page">
      <?php 
		    $this->load->view('topo');
		  ?>
      <!-- INICIO CADASTRO -->
    <div id="content">
      <div class="cont">                                       
        <div id="cadastro_cliente"> 
              <h3>Cadastro de Clientes</h3>                                          
              <form action="" method="POST">                              
                <fieldset>
                  <legend>Dados Pessoais</legend>
                  <table width="100%">                   
                    <tr>
                      <td width="200"> <label> Nome: </label> </td>
                      <td> <input value="" name="nome" id="nome" class="box_cadastro validate required val_nome" type="text" maxlength="64" /><br />
                      <div class="error"><p><?php echo form_error('nome')?></p></div>
											</td>
                    </tr>
                    <tr>
                      <td> <label> Sobrenome: </label> </td>
                      <td> <input value="" name="sobrenome" id="sobrenome" class="box_cadastro validate required val_sobrenome" type="text" maxlength="64" /><br />
											<div class="error"><p><?php echo form_error('sobrenome')?></p></div></td>
                    </tr>
                    <tr>
                      <td> <label> Sexo: </label> </td>
                      <td>
                        <select value="" name="sexo" id="sexo" class="box_cadastro validate required" type="text" />
                          <option value="M">Maculino</option>
                          <option value="F">Feminino</option>
                        </select>
                        <div class="error"><p><?php echo form_error('sexo')?></p></div>
                      </td>
                    </tr>
                    <tr>
                      <td> <label> RG: </label> </td>
                      <td> <input value="" name="rg" id="rg" class="box_cadastro validate required" type="text" maxlength="18" /><br />
											<div class="error"><p><?php echo form_error('rg')?></p></div></td>
                    </tr> 
                    <tr>
                      <td> <label> CPF: </label> </td>
                      <td> <input value="" name="cpf" id="cpf" class="box_cadastro validate required val_cpf" type="text" maxlength="14" /><br />
											<div class="error"><p><?php echo form_error('cpf')?></p></div></td>
                    </tr>
                    <tr>
                      <td> <label> Data de Nascimento: </label> </td>
                      <td> <input value="" name="nascimento" id="data" class="box_cadastro validate required val_data" type="text" maxlength="10" /><br />
											<div class="error"><p><?php echo form_error('nascimento')?></p></div></td>
                    </tr>
                    <tr>
                      <td> <label> Telefone: </label> </td>
                      <td> <input value="" name="telefone" id="telefone" class="box_cadastro validate required val_telefone" type="text" maxlength="32" /><br />
											<div class="error"><p><?php echo form_error('telefone')?></p></div></td>
                    </tr>
                  </table>
                </fieldset>
                <fieldset>
                  <legend>Dados do Usu&aacute;rio</legend>  
                  <table width="100%">
                    <tr>
                      <td> <label> E-mail: </label> </td>
                      <td> <input value="" name="email" id="email" class="box_cadastro validate required val_email" type="text" maxlength="140" /><br />
											<div class="error"><p><?php echo form_error('email')?></p></div></td>
                    </tr>
                    <tr>
                      <td width="200"> <label> Usu&aacute;rio: </label> </td>
                      <td> <input value="" name="usuario" id="usuario" class="box_cadastro validate required" type="text" maxlength="70" /><br /> 
											<div class="error"><p><?php echo form_error('usuario')?></p></div></td>
                    </tr>
                    <tr>
                      <td> <label> Senha: </label> </td>
                      <td> <input value="" name="senha" id="senha" class="box_cadastro validate required" type="password" maxlength="12" /><br />
											<div class="error"><p><?php echo form_error('senha')?></p></div></td>
                    </tr>
                  </table>
                </fieldset>
                <fieldset>
                  <legend>Dados de Endere&ccedil;o</legend>  
                  <table width="100%">
                    <tr>
                      <td> <label> CEP: </label> </td>
                      <td> <input value="" name="cep" id="cep" class="box_cadastro validate required val_cep" type="text" maxlength="8" /><br />
											<div class="error"><p><?php echo form_error('cep')?></p></div></td>
                    </tr>
                    <tr>
                      <td width="200"> <label> Rua: </label> </td>
                      <td> <input value="" name="endereco" id="endereco" class="box_cadastro validate required" type="text" maxlength="32" /><br />
											<div class="error"><p><?php echo form_error('endereco')?></p></div></td>
                    </tr>
                    <tr>
                      <td> <label> N&uacute;mero: </label> </td>
                      <td> <input value="" name="numero" id="numero" class="box_cadastro validate required val_num" type="text" maxlength="8" onkeypress="javascript:return formataNumero(event);" /><br />
											<div class="error"><p><?php echo form_error('numero')?></p></div></td>
                    </tr>
                    <tr>
                      <td> <label> Complemento: </label> </td>
                      <td> <input value="" name="complemento" id="complemento" class="box_cadastro" type="text" maxlength="255" /><br /> 
											<div class="error"><p><?php echo form_error('complemento')?></p></div></td>
                    </tr>
                    <tr>
                      <td> <label> Bairro: </label> </td>
                      <td> <input value="" name="bairro" id="bairro" class="box_cadastro validate required" type="text" maxlength="128" /><br />
											<div class="error"><p><?php echo form_error('bairro')?></p></div></td>
                    </tr>
                    <tr>
                      <td><label> Estado: </label></td>
                      <td>
                        <select name="estado" id="estado" class="validate required">
                          <option value=""> <-- Selecione o Estado --> </option>
                          <?php foreach ($this->estados as $estado) {?>
                            <option value="<?php echo $estado->id_estado?>"><?php echo $estado->abr_estado?></option>
    								      <?php } ?>
    							      </select>
    							      <div class="error"><p><?php echo form_error('estado')?></p></div>
    							    </td>
                    </tr>
                    <tr>
                      <td><label>Cidade:</label></td>
    						      <td>
                        <select name="cidade" id="cidade" class="validate required val_cidade">
    								      <option value=""> <-- Selecione a Cidade --></option>
                        </select>
                        <div class="error"><p><?php echo form_error('cidade')?></p></div>
							        </td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                      <td><input title="Enviar cadastro" type="image" src="/images/enviar.jpg" /></a></td>
                    </tr>
                  </table>
                </fieldset>
              </form> <!-- FIM FORM CADASTRO CLIENTE -->                                                           
				    </div> <!-- FIM DIV cadastro cliente -->    
        </div> <!-- FIM DIV CONT-->
      </div> <!-- FIM DIV CONTENT --> 
    </div> <!-- FIM DIV PAGE -->
  <?php $this->load->view('rodape');?> <!-- FIM RODAPE -->
</body>
</html>
