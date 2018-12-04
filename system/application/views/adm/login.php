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
                        		<h2 class="adm-PostHeader">Bem vindo!</h2>
                                <form method="post" action="/adm/login/efetualogin" name="login">                              
                                    <fieldset>
                                        <table>
                                            <tr>
                                                <td>Usuário:</td>
                                                <td><input value="" name="user" id="user" class="box_login" type="text" /></td>
                                            </tr>
                                            <tr>
                                                <td>Senha:</td>
                                                <td><input value="" name="pass" id="pass" class="box_login" type="password" /></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td><span class="adm-button-wrapper">
                                                        <span class="l"> </span>
                                                        <span class="r"> </span>
                                                        <a class="adm-button" href="javascript:void(0)" onClick="login.submit()">Entrar</a>
                                    				</span>
                                            	</td>
                                            </tr>
                                        </table>
                                  	</fieldset>
                                  </form> 
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
