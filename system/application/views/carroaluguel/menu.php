<div id="menu_principal">
	<ul class="menu">
		<li><a href="/home" title="Página Inicial" class="home">Home</a></li>
		<li><img src="/images/<?php echo SITE;?>/separador.gif" alt="CarroAluguel.com" /></li>
		<li><a href="#" title="Veja as lojas disponíveis" class="locadoras">Locadoras<img src="/images/<?php echo SITE;?>/seta_menu.gif" alt="CarroAluguel.com" /></a>
			<ul>
				<li><strong>Locações Nacionais</strong></li>
                <?php foreach($this->menu->locadoras as $locadoras_menu => $links){?>
          			<li><a href="/<?php echo $links->link;?>"><?php echo $links->link_titulo;?></a></li>
               	<?php } ?>
 		  		<li><strong>Locações Internacionais</strong></li>
				<li><a href="/hertz_internacional">Hertz</a></li>
			</ul>
		</li>
		<li><img src="/images/<?php echo SITE;?>/separador.gif" alt="CarroAluguel.com" /></li>
		<li><a href="#" title="O carro que você procura está aqui" class="categorias">Categorias<img src="/images/<?php echo SITE;?>/seta_menu.gif" alt="CarroAluguel.com" /></a>
			<ul>
            <?php foreach($this->menu->categorias as $categorias_menu => $links_cat){?>
          		<li><a href="/<?php echo $links_cat->cat_id;?>"><?php echo $links_cat->cat_nome;?></a></li>
            <?php } ?>
            </ul>
		</li>
        <li><img src="/images/<?php echo SITE;?>/separador.gif" alt="CarroAluguel.com" /></li>
		<li><a href="/mapa_aluguel_carros_busca" title="O carro que você procura está aqui" class="cidades">Cidades Atendidas</a></li>
        <li><img src="/images/<?php echo SITE;?>/separador.gif" alt="CarroAluguel.com" /></li>
        <li><a href="/informacoes/dicas-locacao-de-carro" title="Duração das diárias, taxas, Seguros, etc." class="dicas">Dicas</a></li>
		<li><img src="/images/<?php echo SITE;?>/separador.gif" alt="CarroAluguel.com" /></li>
		<li><a href="/informacoes/condicoes-gerais" title="Locações OnLine, saiba mais" class="gerais">Condições Gerais</a></li>
		<li><img src="/images/<?php echo SITE;?>/separador.gif" alt="CarroAluguel.com" /></li>
		<li><a href="#" title="Fique por dentro dos acontecimentos do CarroAluguel.com" class="noticias">Notícias<img src="/images/<?php echo SITE;?>/seta_menu.gif" alt="CarroAluguel.com" /></a>
			<ul>
				<li><a href="http://www.carroaluguel.com/blog">Blog</a></li>
				<li><a href="http://www.carroaluguel.com/newsletter/index.php">Newsletter</a></li>
			</ul>
		</li>
		<li><img src="/images/<?php echo SITE;?>/separador.gif" alt="CarroAluguel.com" /></li>
		<li><a href="#" title="Fale conosco" class="contato">Contato<img src="/images/<?php echo SITE;?>/seta_menu.gif" alt="CarroAluguel.com" /></a>
			<ul>
				<li><a href="http://www.layum.com/supportdesk/index.php?_m=tickets&amp;_a=submit">Formulário de Contato</a></li>
				<li><a href="/contato/telefones">Telefones</a></li>
				<li><a href="#" onclick="javascript:void(window.open('http://www.carroaluguel.com/suporte/livezilla.php?reset=true','','width=600,height=600,left=0,top=0,resizable=yes,menubar=no,location=yes,status=yes,scrollbars=yes'))">Atendimento OnLine</a></li>
				<li><a href="/cadastre_sua_locadora">Cadastre sua Locadora</a></li>
			</ul>
		</li>
		
        <li><img src="/images/<?php echo SITE;?>/separador.gif" alt="CarroAluguel.com" /></li>
		<li><a href="/cadastre_sua_locadora" title="Cadastre sua locadora" class="formas">Cadastre sua locadora</a></li>
	</ul>
</div>