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
                      <td width="100"> <label>Nome:</label> </td>
          						<td> <?php echo $this->cliente->cli_nome; ?> </td>
          					</tr>
          					<tr>
          						<td> <label>Sobrenome:</label> </td>
          						<td> <?php echo $this->cliente->cli_sobrenome; ?> </td>
          					</tr>
          					<tr>
          						<td> <label>Sexo:</label> </td>
          						<td> 
                        <?php if ($this->cliente->cli_sexo == "M") { echo "Masculino"; }
                              elseif ($this->cliente->cli_sexo == "F") { echo "Feminino";} ?>
                      </td>
          					</tr>
          					<tr>
          						<td> <label>RG:</label> </td>
          						<td> <?php echo $this->cliente->cli_rg; ?> </td>
          					</tr>
          					<tr>
          						<td> <label>CPF:</label> </td>
          						<td> <?php echo $this->cliente->cli_cpf; ?> </td>
          					</tr>
          					<tr>
          						<td> <label>Data de Nascimento:</label> </td>
          						<td> 
                        <?php echo substr($this->cliente->cli_dtnasc,8,2)."-".substr($this->cliente->cli_dtnasc,5,2)."-".substr($this->cliente->cli_dtnasc,0,4); ?>
                      </td>
          					</tr>
          					<tr>
          						<td> <label>Telefone:</label> </td>
          						<td> <?php echo $this->cliente->tel_fone; ?> </td>
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
          		        <td width="100"> <label>E-mail:</label> </td>
          		        <td> <?php echo $this->cliente->usu_email; ?> </td>
          		      </tr>
          		      <tr>
                      <td> <label>Usu&aacute;rio</label> </td>
                      <td> <?php echo $this->cliente->usu_usuario; ?> </td>
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
                      <td width="100"> <label>Rua:</label> </td>
                      <td> <?php echo $this->cliente->end_endereco; ?> </td>
                    </tr>
                    <tr>
                      <td> <label>N&uacute;mero:</label> </td>
                      <td> <?php echo $this->cliente->end_numero; ?> </td>
                    </tr>
                    <tr>
                      <td> <label>Complemento:</label> </td>
                      <td> <?php echo $this->cliente->end_complemento; ?> </td>
                    </tr>
                    <tr>
                      <td> <label>Bairro:</label> </td>
                      <td> <?php echo $this->cliente->end_bairro; ?> </td>
                    </tr>
                    <tr>
                      <td> <label>CEP:</label> </td>
                      <td> <?php echo $this->cliente->end_cep; ?> </td>
                    </tr>
                    <tr>
                      <td> <label>Cidade:</label> </td>
                      <td> <?php echo $this->cliente->nome_cidade." - ".$this->cliente->abr_estado; ?> </td>
                    </tr>
                    <tr>
          					 <td>&nbsp;</td>
          					 <td>&nbsp;</td>
          					 <td>
                        <a href="/cliente/editar" title="Editar Cadastro">Editar<img src="/images/001_60.png" border="0"></a>
                      </td>
          				  </tr>
                  </table>
                </fieldset>  
            </form>
        </div> <!-- FIM DIV CADASTRO_CLIENTE -->
      </div> <!-- FIM DIV CONT -->
    </div> <!-- FIM DIV CONTENT -->
  </div><!-- FIM DIV PAGE -->
<?php $this->load->view('rodape'); ?>  
</body>
</html>