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
      <div class="cont" id="esqueci">
				<h1>Esqueci minha senha.</h1>
				<form action="" method="post" class="contemfloat">
					<h3>Digite seu e-mail abaixo para iniciar o processo de recuperação de conta.</h3>
					<div class="senhas">
						<p><label for="nova_senha">Senha: </label><input type="password" name="nova_senha" id="nova_senha" class="texbox" /></p>
						<p><label for="nova_senha_repetir">Confirme a senha: </label><input type="password" name="nova_senha_repetir" id="nova_senha_repetir" class="texbox" /></p>
						<?php if (!empty($this->erro)) { echo '<p class="erro">' . $this->erro . '</p>'; }?>
					</div>
					<p class="btn"><input type="hidden" name="p" id="p" value="1" /><button type="submit">Iniciar recuperação</button></p>
				</form>
			</div> <!-- FIM DIV CONT-->
		</div> <!-- FIM DIV CONTENT --> 
	</div> <!-- FIM DIV PAGE -->
  <?php $this->load->view('rodape');?> <!-- FIM RODAPE -->
</body>
</html>
