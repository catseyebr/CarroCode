<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
  <?php $this->load->view(SITE.'/header'); ?>
  <body id="home">
    <div id="page">
      <?php 
		    $this->load->view(SITE.'/topo');
		    $this->load->view(SITE.'/form_busca');
      ?>     
      <div id="content">
        <div class="cont contemfloat">
          <!-- INÍCIO CONTEÚDO ESQUERDO -->
          <div id="conteudo_esquerda">
            <?php $this->load->view(SITE.'/tarifas_ultima_hora'); ?>
            <div id="mais_buscados"><?php $this->load->view(SITE.'/hoteisMaisBuscados');?></div>
        			</div>
  				<!-- FIM CONTEÚDO ESQUERDO -->
  				<!-- INÍCIO CONTEÚDO DIREITO -->
  				<div id="conteudo_direita">
  					<div id="tarifas_especiais">
  						<h3>Tarifas Especiais</h3>
                          <p class="subtitle">Conforto e tarifas especiais para voc&ecirc;!</p>
                          <script type="text/javascript">
  							<!-- [ arquivo, nome, largura, altura]; -->
                             	var mw = new Flash("/flash/destaque.swf", "", "354", "122"); 
                             	<!-- Swf transparente -->
  							mw.addParameter("wmode", "transparent"); 
  							<!-- esconde menu -->
  							mw.addParameter("showMenu", "false");
  							mw.write();
  						</script>
  						<div>
              	<h3><strong>Bourbon Batel Express</strong></h3>
                <p>Curitiba - PR</p>
                <p>Di&aacute;rias a partir de R$ 126,00 / Caf&eacute; da Manh&atilde; inclu&iacute;do</p>
                <p><a href="#" title="Reserve este hotel"></p>
  						</div>
  					</div>
                      <div id="central_atendimento">
  						<h3>Central de Atendimento</h3>
  						<p style="text-align:center;">
  							<a href="/sac" title="Central de Atendimento">
  							<img src="/images/telefones.gif" /></a>
  						</p>
  					</div>
  					<div id="como_reservar">
  						<h3>Como Reservar ?</h3>
  						<p>Escolha cidade, informe datas, n&uacute;mero de apartamentos e o tipo de acomoda&ccedil;&atilde;o, clique em pesquisar para obter uma r&aacute;pida e completa rela&ccedil;&atilde;o dos hot&eacute;is que trabalhamos.</p>
                      </div>
  				</div>                           
                  <div id="conteudo_baixo">
     					<!-- INICIO  ENQUETE /-->
     					<?php $this->load->view(SITE.'/form_enquete');?>
     					<!-- FIM  ENQUETE /-->
     					<!-- INICIO NEWSLETTER /-->
     					<?php $this->load->view(SITE.'/form_newsletter');?>
     					<!-- FIM  NEWSLETTER /-->   
    					<!-- INICIO ENVIEAMIGO /-->
    					<?php $this->load->view(SITE.'/form_envieamigo');?>
    					<!-- FIM ENVIEAMIGO /-->     
  				</div>
  			</div>
  		</div>
		</div>
        <?php $this->load->view(SITE.'/rodape');?>
        <!-- FIM RODAPE -->
    </body>
</html>
