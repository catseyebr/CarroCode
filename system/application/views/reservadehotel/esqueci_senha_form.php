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
					<p class="email"><label for="email_esqueci">E-mail: </label><input type="text" name="email_esqueci" id="email_esqueci" class="texbox" /><?php
						if (!empty($this->erro)) { echo '<span>' . $this->erro . '</span>'; }
					?></p>
					<p class="btn"><button type="submit">Iniciar recuperação</button></p>
				</form>
			</div> <!-- FIM DIV CONT-->
		</div> <!-- FIM DIV CONTENT --> 
	</div> <!-- FIM DIV PAGE -->
  <?php $this->load->view('rodape');?> <!-- FIM RODAPE -->
</body>
</html>
