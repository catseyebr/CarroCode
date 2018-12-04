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
				<p class="msg_enviada">Uma mensagem foi enviada para o e-mail informado com instruções para a criação de uma nova senha.
				<br />Por favor verifique sua caixa de e-mails e siga os passos informados.</p>
			</div> <!-- FIM DIV CONT-->
		</div> <!-- FIM DIV CONTENT --> 
	</div> <!-- FIM DIV PAGE -->
  <?php $this->load->view('rodape');?> <!-- FIM RODAPE -->
</body>
</html>
