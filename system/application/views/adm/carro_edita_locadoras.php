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
                        		<h2 class="adm-PostHeader">Locadora <?php echo $this->locadora->loc_nomelocadora;?></h2>
                                <div class="adm-PostContent">
                                      	
		<div id="container-1">
            <ul>
                <li><a href="#dados"><span>Dados</span></a></li>
                <li><a href="#endereco"><span>Endereço</span></a></li>
                <li><a href="#contatos"><span>Contatos</span></a></li>
                <li><a href="#seo"><span>SEO</span></a></li>
                <li><a href="#taxas"><span>Taxas e Condições</span></a></li>
                <li><a href="#lojas"><span>Lojas</span></a></li>
                <li><a href="#grupos"><span>Grupos</span></a></li>
                <li><a href="#protecoes"><span>Proteções</span></a></li>
            </ul>
            <div id="dados">

                                	<form name="edit" action="/adm/carro_locadora/salvar" method="post">
                                    <fieldset>
                                    <legend>Dados</legend>
                                	<table id="locadora_edit">
                                    	<tr>
                                        	<td class="td_head"><strong>Id:</strong></td>
                                            <td>
											<input name="loc_id" type="hidden" value="<?php echo $this->locadora->loc_id;?>">
											<?php echo $this->locadora->loc_id;?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                        	<td class="td_head"><strong>Nome:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_nomelocadora;?>"></td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                         <tr>
                                        	<td class="td_head"><strong>CNPJ:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_nomelocadora;?>"></td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                      </table>
                                      </fieldset>
                                     </form>
                                     </div>
                                     <div id="endereco">
                                      <fieldset>
                                    <legend>Endereço</legend>
                                        <table>
                                        <tr>
                                        	<td class="td_head"><strong>Endereço:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_nomelocadora;?>"></td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        <tr>
                                        	<td class="td_head"><strong>Bairro:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_nomelocadora;?>"></td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        <tr>
                                        	<td class="td_head"><strong>CEP:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_nomelocadora;?>"></td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        <tr>
                                        	<td class="td_head"><strong>Estado:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_nomelocadora;?>"></td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        <tr>
                                        	<td class="td_head"><strong>Cidade:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_nomelocadora;?>"></td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        </table>
                                        </fieldset>
                                        </div>
                                        <div id="contatos">
                                         <fieldset>
                                    <legend>Conttos da Locadora</legend>
                                    </fieldset>
                                    </div>
                                        <div id="seo">
                                         <fieldset>
                                    <legend>SEO para a página da Locadora</legend>
                                        <table>
                                        <tr>
                                        	<td class="td_head"><strong>Meta Title:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_nomelocadora;?>"></td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        <tr>
                                        	<td class="td_head"><strong>Meta Description:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_nomelocadora;?>"></td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        <tr>
                                        	<td class="td_head"><strong>Meta Keywords:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_nomelocadora;?>"></td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        <tr>
                                        	<td class="td_head"><strong>Link:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_nomelocadora;?>"></td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        <tr>
                                        	<td class="td_head"><strong>Nome do Link:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_nomelocadora;?>"></td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        </table>
                                        </fieldset>
                                        </div>
                                        <div id="taxas">
                                        <fieldset>
                                    <legend>Taxas e condições gerais de locação</legend>
                                    	<table>
                                        <tr>
                                        	<td class="td_head"><strong>Taxa para Lojas:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_taxas;?>">(%)</td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        <tr>
                                        	<td class="td_head"><strong>Taxa para aeroporto:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_taxasaero;?>">(%)</td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        <tr>
                                        	<td class="td_head"><strong>Limite de horas:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_prazodiaria;?>">(horas - ao exceder o Limite de Horas será cobrada a Hora Extra)</td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        <tr>
                                        	<td class="td_head"><strong>Cortesia de horas:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_horacortesia;?>">(horas - horas à ser abatida do cálculo de Hora Extra)</td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        <tr>
                                        	<td class="td_head"><strong>Hora Extra:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_horaextra;?>">(% divisão do valor da diária por Hora Extra)</td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        <tr>
                                        	<td class="td_head"><strong>Extra para Proteção e opcionais:</strong></td>
                                            <td><input name="niv_nome" type="text" value="<?php echo $this->locadora->loc_extra_opc;?>">(adicionar 1 proteção e/ou 1 opcional(ais) quando calcular a Hora Extra)</td>
                                            <td><div class="form_error"><?php echo form_error('niv_nome')?></div></td>
                                        </tr>
                                        
                                    </table> 
                                    </fieldset>
                                    	<table>
                                        <tr>
                                        	<td>
                                            	<span class="adm-button-wrapper">
                                    			<span class="l"> </span>
                                       			<span class="r"> </span>
                                        		<a class="adm-button" href="javascript:void(0)" onClick="edit.submit()">Salvar dados</a>
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
                                    </form>
                                    </div>
                                     <div id="lojas">
                                         <fieldset>
                                    <legend>Lojas da Locadora</legend>
                                    </fieldset>
                                    </div>
                                    <div id="grupos">
                                         <fieldset>
                                    <legend>Grupos da Locadora</legend>
                                    </fieldset>
                                    </div>
                                    <div id="protecoes">
                                         <fieldset>
                                    <legend>Proteções da Locadora</legend>
                                    </fieldset>
                                    </div>
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
