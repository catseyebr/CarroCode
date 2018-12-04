<?php $this->load->view('/adm/header'); ?>
<body>
<div id="adm-page-background-simple-gradient"></div>
<div id="adm-main">
    <div class="adm-Sheet">
        <div class="adm-Sheet-tl"></div>
        <div class="adm-Sheet-tr"></div>
        <div class="adm-Sheet-bl"></div>
        <div class="adm-Sheet-br"></div>
        <div class="adm-Sheet-tc"></div>
        <div class="adm-Sheet-bc"></div>
        <div class="adm-Sheet-cl"></div>
        <div class="adm-Sheet-cr"></div>
        <div class="adm-Sheet-cc"></div>
        <div class="adm-Sheet-body">
            <div class="adm-Header">
                <div class="adm-Header-jpeg"></div>
                <div class="adm-Logo">
                    <h1 id="name-text" class="adm-Logo-name"><a href="#">Administração</a></h1>
                    <div id="slogan-text" class="adm-Logo-text">Controle de sites, reservas, banco de dados e financeiro</div>
                </div>
            </div>
            <?php $this->load->view('/adm/menu'); ?>
            <div class="adm-contentLayout">
                <div class="adm-content">
                    <div class="adm-Post">
                        <div class="adm-Post-tl"></div>
                        <div class="adm-Post-tr"></div>
                        <div class="adm-Post-bl"></div>
                        <div class="adm-Post-br"></div>
                        <div class="adm-Post-tc"></div>
                        <div class="adm-Post-bc"></div>
                        <div class="adm-Post-cl"></div>
                        <div class="adm-Post-cr"></div>
                        <div class="adm-Post-cc"></div>
                        <div class="adm-Post-body">
                    		<div class="adm-Post-inner">
                        		<h2 class="adm-PostHeader">Usuários</h2>
                                <h5><a href="#" id="choice">Mostrar/esconder colunas</a></h5>
                        		<div class="adm-PostContent">
                                	<table id="usuarios"></table> 
                                    <div id="pagernav"></div> 
                                </div>                
                    		</div>
                		</div>
            		</div>
            		<div class="cleared"></div>
            		<?php $this->load->view('/adm/footer'); ?>
            		<div class="cleared"></div>
        		</div>
    		</div>
    		<div class="cleared"></div>
    		<p class="adm-page-footer"></p>
		</div>
	</div>
</div>
</body>
</html>
