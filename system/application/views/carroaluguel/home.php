<?php $this->load->view(SITE.'/header'); ?>
<body>
	<div id="page">
		<!-- INÍCIO TOPO -->
		<?php $this->load->view(SITE.'/topo');?>
		<!-- FIM TOPO -->
        <!-- INÍCIO MENU -->
        <?php $this->load->view(SITE.'/menu');?>
        <!-- FIM MENU -->
        <!-- INÍCIO BANNER FLASH -->
		<div id="banner_publicidade">
			<script type="text/javascript">
				<!-- [ arquivo    , nome     , largura, altura]; -->
				var mw = new Flash("/images/<?php echo SITE;?>/banner_flash.swf", "", "860", "120"); 
                <!-- Swf transparente -->
				mw.addParameter("wmode", "transparent"); 
                <!-- esconde menu -->
				mw.addParameter("showMenu", "false");
                mw.write();
			</script>
		</div>
		<!-- FIM BANNER FLASH -->
		<!-- INÍCIO CONTEÚDO HOME -->
		<div id="geral_pesquisa_mais">
        <!-- INÍCIO PESQUISA -->
		<div id="pesquisa_carros">
			<?php $this->load->view(SITE.'/pesquisa');?>
        </div>
        <!-- FIM PESQUISA -->
        <!-- INÍCIO MAIS RESERVADOS -->
		<div id="mais_reservados">
			<?php $this->load->view(SITE.'/mais_reservados');?>
		</div>        
		<!-- FIM MAIS RESERVADOS -->
        <!-- INÍCIO DEPOIMENTOS -->
        <div id="depoimentos">
			<?php $this->load->view(SITE.'/carrega_depoimentos');?>
		</div>
		<!-- FIM DEPOIMENTOS -->
		<!-- INÍCIO REQUISITOS, ENQUETE E NEWS -->
		<div id="box_requisitos">
			<h3>Requisitos para Aluguel</h3>
			<ul>
				<li><strong>1.</strong> RG e CPF (obrigat&oacute;rio para brasileiros);</li>
				<li><strong>2.</strong> Ser&atilde;o aceitos apenas documentos originais;</li>
				<li><strong>3.</strong> Locat&aacute;rio dever&aacute; portar cart&atilde;o de cr&eacute;dito pr&oacute;prio, com limite dispon&iacute;vel para d&eacute;bito de cau&ccedil;&atilde;o/garantia;</li>
				<li><strong>4.</strong> N&atilde;o ter restri&ccedil;&otilde;es financeiras no CPF (an&aacute;lise ser&aacute; feita na retirada do ve&iacute;culo);</li>
				<li><strong>5.</strong> Habilita&ccedil;&atilde;o v&aacute;lida e emitida h&aacute; pelo menos 2 anos;</li>
				<li><strong>6.</strong> Estrangeiros dever&atilde;o apresentar passaporte e habilita&ccedil;&atilde;o v&aacute;lida;</li>
				<li><strong>7.</strong>  Idade m&iacute;nima de 21 anos;</li>
				<li><strong>8.</strong>  Desejável que o cliente porte um comprovante de endereço original.</li>

			</ul>
		</div>
		<div id="box_enquete">
			<script type="text/javascript" charset="utf-8" src="http://static.polldaddy.com/p/2629764.js"></script>
			<noscript>
				<a href="http://answers.polldaddy.com/poll/2629764/">Você costuma reservar carro para:</a><span style="font-size:9px;">(<a href="http://www.polldaddy.com">poll</a>)</span>
			</noscript> 
		</div>
		<div id="box_news">
       	  <form id="email_newsletter" name="email_newsletter" method="post" action="http://www.carroaluguel.com/newsletter.php">
			<h3>Newsletter</h3>
			  <ul>
				  <li class="chamada">Receba em seu e-mail nossas promo&ccedil;&otilde;es e not&iacute;cias atualizadas.</li>
				  <li><span id="valida_news">
                  <input type="text" value="Digite seu e-mail" name="email" id="email" class="campo_news" onClick="if(this.value=='Digite seu e-mail'){this.value=''}" />
                  <span class="textfieldRequiredMsg">Obrigatório.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span></span></li>
				  <li><a title="Assine o informativo CarroAluguel.com" class="botao_news" onClick="validateonsubmit(document.getElementById('email_newsletter'));" style="cursor:pointer">Assinar</a></li>
				  <li class="cancela">Caso queira cancelar sua news clique no link abaixo.</li>
				  <li><a href="#" title=" Clique para cancelar Informativo">CANCELAR</a></li>
			  </ul>
			</form>
		</div>
		<!-- FIM REQUISITOS, ENQUETE E NEWS -->
		<div id="geral_boxs">
            <!-- INÍCIO COMO FAZER UMA RESERVA -->
            <div id="box_como_fazer">
                <h4>Como fazer uma reserva de carro</h4>
                <a href="/informacoes/como-fazer-uma-reserva-de-carro"><img src="/images/<?php echo SITE;?>/icon_video.jpg" alt="Como fazer uma reserva de carro" class="left_video"/></a>
                <a href="/informacoes/como-fazer-uma-reserva-de-carro" title="Clique e veja o vídeo">Passo-a-passo como fazer uma reserva de carro</a>
            </div>
            <!-- FIM COMO FAZER UMA RESERVA -->
            <!-- INÍCIO TARIFAS EXCLUSIVAS -->
            <div id="tarifas">
                <h4>Tarifas Exclusivas</h4>
                <p>Aqui voc&ecirc; encontra as melhores op&ccedil;&otilde;es em loca&ccedil;&otilde;es de ve&iacute;culos para todo Brasil e com tarifas exclusivas!</p>
                <a href="/alugueldecarros/locadora" title="Veja mais detalhes" class="link_saiba">+ Saiba Mais</a>
            </div>
            <!-- FIM TARIFAS EXCLUSIVAS -->
            <!-- INÍCIO UTILIZE SEU CARTÃO -->
            <div id="utilize">
                <h4>Utilize seu Cart&atilde;o de Crédito</h4>
                <p>Utilize seu Cart&atilde;o Mastercard, Visa, Visa Eletron, American Express para pagar sua loca&ccedil;&atilde;o. </p>
                <a href="/formas_de_pagamento" title="Veja mais detalhes" class="link_saiba">+ Saiba Mais</a>
            </div>
            <!-- FIM UTILIZE SEU CARTÃO -->
            </div>       
            <!-- INÍCIO NUVEM DE TAGS -->
            <div id="nuvem_tags">
                <?php $this->load->view(SITE.'/nuvem.php'); ?>
            </div>
            <!-- FIM NUVEM DE TAGS -->
            <!-- INÍCIO LISTA INDEXAÇÃO -->
            <div id="lista_indexacao">
                <?php $this->load->view(SITE.'/indexacao.php'); ?>
            </div>
            <!-- FIM LISTA INDEXAÇÃO -->
        </div>
    <!-- FIM CONTEÚDO HOME -->
	</div>
	<!-- FIM DIV PAGE -->
	<?php $this->load->view(SITE.'/footer.php'); ?>