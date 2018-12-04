<div class="adm-nav">
    <div class="l"></div>
    <div class="r"></div>
    <ul class="adm-menu">
        <li>
        	<?php if ($this->menu_sel == 'home'){?>
                <a href="/adm/home" class=" active"><span class="l"></span><span class="r"></span><span class="t">Administração</span></a>
            <?php }else{ ?>    
            	<a href="/adm/home"><span class="l"></span><span class="r"></span><span class="t">Administração</span></a>
            <?php }?>
            <ul>
                <li><a href="/adm/home">Home</a></li>
                <li><a href="/adm/login/sair">Sair</a></li>
            </ul>
        </li>
       <li>
            <?php if ($this->menu_sel == 'carro'){?>
       			<a href="/adm/carro_locadoras" class=" active"><span class="l"></span><span class="r"></span><span class="t">Veículos</span></a>
       		<?php }else{ ?>
        		<a href="/adm/carro_locadoras"><span class="l"></span><span class="r"></span><span class="t">Veículos</span></a>
			<?php }?>
       		<ul>
            	<li><a href="/adm/carro_reservas">Reservas Carros</a></li>
               	<li><a href="/adm/carro_locadoras">Locadoras</a></li>
                <li><a href="/adm/carro_lojas">Lojas</a></li>
                <li><a href="/adm/carro_categorias">Categorias</a></li>
                <li><a href="/adm/carro_grupos">Grupos</a></li>
                <li><a href="/adm/carro_carros">Carros</a></li>
                <li><a href="/adm/carro_protecoes">Proteções</a></li>
            </ul>
        </li>		
        <li>
        	<?php if ($this->menu_sel == 'pessoa'){?>
       			<a href="#" class=" active"><span class="l"></span><span class="r"></span><span class="t">Pessoas</span></a>
       		<?php }else{ ?>
        		<a href="#"><span class="l"></span><span class="r"></span><span class="t">Pessoas</span></a>
			<?php }?>
            <ul>
                <li><a href="#">Pessoas Físicas</a></li>
                <li><a href="#">Pessoas Jurídicas</a></li>
                <li><a href="#">Usuários</a></li>
            </ul>
        </li>
        <li>
        	<?php if ($this->menu_sel == 'manutencao'){?>
       			<a href="#" class=" active"><span class="l"></span><span class="r"></span><span class="t">Manutenção</span></a>
       		<?php }else{ ?>
        		<a href="#"><span class="l"></span><span class="r"></span><span class="t">Manutenção</span></a>
			<?php }?>
            <ul>
            	<li><a href="#">Controle de Accesso</a>
                	<ul>
                    	<li><a href="/adm/manutencao_niveis">Níveis</a></li>
                        <li><a href="/adm/manutencao_recursos">Recursos</a></li>
                        <li><a href="/adm/manutencao_usuarios">Usuários</a></li>
                    </ul>
                </li>
            	<li><a href="/adm/manutencao_projetos">Projetos/Sites</a></li>
                <li><a href="/adm/manutencao_paginas">Páginas</a></li>
                <li><a href="/adm/manutencao_cidades">Cidades</a></li>
                <li><a href="/adm/manutencao_estados">Estados</a></li>
                <li><a href="/adm/manutencao_paises">Países</a></li>
            </ul>
        </li>
    </ul>
</div>