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
                        		<h2 class="adm-PostHeader">Editar nível <?php echo $this->nivel->niv_nome;?></h2>
                                <div class="adm-PostContent">
                                	<form name="edit" action="/adm/manutencao_niveis/salvar" method="post">
                                    <fieldset>
                                    <legend>Dados</legend>
                                	<table id="niveis_edit">
                                    	<tr>
                                        	<td>Id</td>
                                            <td>
											<input name="niv_id" type="hidden" value="<?php echo $this->nivel->niv_id;?>">
											<?php echo $this->nivel->niv_id;?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                        	<td>Nome</td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->nivel->niv_nome;?>"></td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                         <tr>
                                        	<td>
                                            	<span class="adm-button-wrapper">
                                    			<span class="l"> </span>
                                       			<span class="r"> </span>
                                        		<a class="adm-button" href="javascript:void(0)" onClick="edit.submit()">Enviar dados</a>
                                    			</span>
                                    		</td>
                                            <td>
                                            	<span class="adm-button-wrapper">
                                    			<span class="l"> </span>
                                       			<span class="r"> </span>
                                        		<a class="adm-button" href="javascript:void(0)" onClick="history.go(-1)">Voltar</a>
                                    			</span>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </table> 
                                    </fieldset>
                                    </form>
                                </div>
                                <h2 class="adm-PostHeader">Recursos associados</h2>
                                <h5><a href="#" id="choice">Mostrar/esconder colunas</a></h5>
                        		<div class="adm-PostContent">
                                	<table id="recursos_assoc"></table> 
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
