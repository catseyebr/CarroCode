<div id="aluguel">
    <strong>Aluguel de Carro Cidades mais reservadas:</strong>
        <p>nome_cidade |</p>
		<strong>Loca&ccedil;&atilde;o de Carros nos Aeroportos (os mais reservados):</strong>
        <p>nome_lojas |</p>
		<strong>Locadoras de carros parceiras:</strong>
        <p>
        <?php foreach($this->menu->locadoras as $locadoras_menu => $links){?>
            <a href="/<?php echo $links->link;?>"><?php echo $links->link_titulo;?> | </a>
        <?php } ?>
        </p>
		<strong>Carro Aluguel.com:</strong>
		<p><a href="/home">Home |</a>
        <a href="/empresa/layum" style="color:#666">Sobre a CarroAluguel.Com |</a>
        <a href="/informacoes/condicoes-gerais" style="color:#666">Requisitos para alugar carro |</a>
        <a href="/formas_de_pagamento" style="color:#666">Forma de pagamento |</a>
        <a href="#">Categoria de Veículos |</a>
        <a href="#">Promoções |</a>
        <a href="http://www.carroaluguel.com/blog/" style="color:#666" target="_blank">Blog |</a>
        <a href="http://twitter.com/carroaluguel" style="color:#666" target="_blank">Twitter |</a>
        <a href="javascript:void(window.open('http://www.carroaluguel.com/suporte/livezilla.php?reset=true','','width=600,height=600,left=0,top=0,resizable=yes,menubar=no,location=yes,status=yes,scrollbars=yes'))" style="color:#666">Chat online |</a>
        <a href="/hertz_internacional.php" style="color:#666">Locação internacional |</a>
        <a href="/mapas_de_locadoras.php" style="color:#666">Locadoras no Brasil |</a>
        <a href="/cadastre_sua_locadora.php" style="color:#666">Cadastre sua locadora</a></p>
</div>