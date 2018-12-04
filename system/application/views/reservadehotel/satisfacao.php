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
        <div id="msg_reserva">
					<div class="subcont">
						<?php if ($this->tipo == 'ok') { ?>
						<div id="msg_ok">
							<h1>Reserva n° <?php echo $this->id_reserva; ?> concluída com sucesso!</h1>
							<p>Para acompanhar a sua nova reserva, utilize a <a href="/cliente/reservas/futuras" title="Área do cliente">área do cliente</a> ou entre em contato pela nossa <a href="/sac" title="Central de atendimento telefônico">central de atendimento</a>.</p>
						</div>
						<?php } ?>
					</div>
				</div>
				<div id="qst_satisfacao">
					<h3>Qual foi sua experiência ao navegar pelo nosso site?</h3>
					<form action="/satisfacao/submit" method="post">
						<ul class="contemfloat">
							<li class="otimo"><label for="opiniao_otimo"><input type="radio" name="opiniao" id="opiniao_otimo" value="otimo" />Ótima</label></li>
							<li class="bom"><label for="opiniao_bom"><input type="radio" name="opiniao" id="opiniao_bom" value="bom" />Boa</label></li>
							<li class="rasoavel"><label for="opiniao_rasoavel"><input type="radio" name="opiniao" id="opiniao_rasoavel" value="razoavel" />Rasoável</label></li>
							<li class="ruim"><label for="opiniao_ruim"><input type="radio" name="opiniao" id="opiniao_ruim" value="ruim" />Ruim</label></li>
						</ul>
						<p>
							<label for="sugestao">O que podemos melhorar? Dê sua sugestão:</label>
							<textarea id="sugestao" name="sugestao"></textarea>
						</p>
						
						<p>
							<input type="hidden" name="reserva" value="<?php echo $this->id_reserva; ?>" />
							<button type="submit">Enviar</button>
						</p>
					</form>
				</div>			
      </div> <!-- FIM DIV CONT-->
    </div> <!-- FIM DIV CONTENT --> 
  </div> <!-- FIM DIV PAGE -->
  <?php $this->load->view('rodape');?> <!-- FIM RODAPE -->
</body>
</html>
