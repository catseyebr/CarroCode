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
        <div id="sac" class="cont contemfloat">
        	<h3>Horário de Atendimento: de segunda à sexta-feira, das 08:30hs às 18:15hs.</h3>
					<div class="esquerda">
						<form action="" id="telefone_cidade">
							<h1>TELEFONES EM SUA CIDADE:</h1>
							<fieldset>
								<p class="escolha">
									<label for="escolha_cidade">Escolha a Cidade:</label>
									<input type="text" name="escolha_cidade" id="escolha_cidade" class="texbox" />
								</p>
								<p class="result">
									<span>Telefone para</span>
									<strong id="telefone"> </strong>
								</p>
							</fieldset>
						</form>
						<div id="contato_chat">
							<h4>CONTATO VIA CHAT</h4>
							<p>Você também pode nos contatar pelo <a href="javascript:void(window.open('http://www.carroaluguel.com/suporte/livezilla.php','','width=600,height=600,left=0,top=0,resizable=yes,menubar=no,location=yes,status=yes,scrollbars=yes'));" title="Fale via chat">CHAT</a>, sem custo, falando diretamente com nossos atendentes online.</p>
						</div>
					</div>
					<div class="direita">
						<script type="text/javascript">
  							<!-- [ arquivo, nome, largura, altura]; -->
                             	var mw = new Flash("/flash/vono_ligar.swf", "", "350", "370"); 
                             	<!-- Swf transparente -->
  							mw.addParameter("wmode", "transparent"); 
  							<!-- esconde menu -->
  							mw.addParameter("showMenu", "false");
  							mw.write();
  						</script>
					</div>
				</div>
			</div>
		</div>
        <?php $this->load->view('rodape');?>
        <!-- FIM RODAPE -->
    </body>
</html>
