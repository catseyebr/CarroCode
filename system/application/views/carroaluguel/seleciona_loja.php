<?php $this->load->view(SITE.'/header'); ?>
<body class="topo_processo">
<!-- INÍCIO DIV PAGE -->
	<!-- INÍCIO DIV PAGE -->
	<div id="page">
	<!-- INÍCIO TOPO -->
			<?php $this->load->view(SITE.'/topo');?>
            <!-- FIM TOPO -->
        	<!-- INÍCIO MENU -->
			<?php $this->load->view(SITE.'/menu');?>
        	<!-- FIM MENU -->
        	<!-- INÍCIO ESCOLHA LOCADORA -->
	<div id="geral_escolha">

    <!-- INÍCIO BARRA PROCESSO -->
    	<div id="barra_processo">
        	<div id="ativo_escolha">
            	<strong>01</strong>
                <p>Escolha a loja
                <span>Loja de retirada e devolução</span></p>
			</div>
            <div id="seguros">

            	<strong>02</strong>
                <p>Escolha os seguros
                <span>Seguro, produtos e serviços adicionais</span></p>
			</div>
            <div id="identificacao">
            	<strong>03</strong>
                <p>Identificação
                <span>Informe seu login e senha</span></p>

			</div>
            <div id="finalizacao">
            	<strong>04</strong>
                <p>Finalização
                <span>Conclua sua reserva</span></p>
			</div>
		</div>
	<!-- FIM BARRA PROCESSO -->

    <!-- INÍCIO ESCOLHA LOCADORA -->
    	<div id="escolha_logo">
        	<strong>Locadora escolhida:</strong>
            <img src="/images/locadoras/medium_locadora_<?php echo $this->tarifa_cotacao->locadora->id;?>.jpg" alt="<?php echo $this->tarifa_cotacao->locadora->nome;?>" align="absmiddle" />
		</div>
	<!-- FIM ESCOLHA LOCADORA -->
    <!-- INÍCIO INFORMAÇÕES RESERVA -->
    	<div id="info_reserva">

        	<h3>Informações da reserva</h3>
            <div id="tabela_info">
            	<ul>
                	<li><strong>Categoria:</strong> <?php echo $this->tarifa_cotacao->grupo->categoria_nome;?> </li>
                    <li><strong>Grupo:</strong>
						<?php echo $this->tarifa_cotacao->grupo->nome;?>&nbsp;| &nbsp;<strong>Quilometragem Inclusa:&nbsp;</strong><?php echo $this->tarifa_cotacao->grupo->km;?>                    </li>

                    <li style="padding-top:3px; padding-bottom:3px;"><strong>Cartões aceitos:</strong> 
                    	<?php foreach ($this->tarifa_cotacao->locadora->formas_pagamento->forma as $frm_id => $frm_nome){?>
                    		<img src="/images/formas_pagamento/<?php echo $frm_id;?>_50.gif" width="50" height="21" align="absmiddle" />
                        <?php } ?>
                    <li><strong>Parcelamento:</strong> até <?php echo $this->tarifa_cotacao->locadora->formas_pagamento->parcelamento?>x sem juros</li>
                    <li><strong>Parcela mínima:</strong> <?php echo $this->tarifa_cotacao->locadora->formas_pagamento->parc_minima?></li>
                    <li><strong>Caução:</strong> <?php echo $this->tarifa_cotacao->grupo->caucao;?></li>

                    <li><strong>Franquia do carro:</strong> <?php echo $this->tarifa_cotacao->grupo->franquia;?></li>
                    <li><strong>Franquia para terceiros:</strong> <?php echo $this->tarifa_cotacao->grupo->franquia_terceiros;?></li>
				</ul>
			</div>
            <div id="veiculos_disponiveis">
            	<h4><strong>Veículos: </strong>
                	<?php foreach($this->tarifa_cotacao->carros->carros as $carr){ echo " - ".$carr->car_modelo; } ?> ou similar </h4>
                <table width="458" border="0" cellpadding="6" cellspacing="6" class="tabela_reserva">
                    <tr>
                        <td colspan="9">
                            <table width="100%" border="0" cellpadding="5" cellspacing="5">
                                <tr>
                                <?php 
									$i = 0;
									foreach($this->tarifa_cotacao->carros->carros as $carr){?>
                                	<td><img src="/images/carros/carro_<?php echo $carr->car_id;?>.gif" alt="<?php echo $carr->car_modelo;?>" /></td>
                                <?php 
									if (++$i == 3) break;
								} ?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                    <?php if($this->tarifa_cotacao->grupo->espec->duas_portas){?>
                    	<td align="center"><img src="/images/carroaluguel/icones/icon_01.jpg" alt="2 Portas" width="40" height="40" /></td>
                    <?php } if($this->tarifa_cotacao->grupo->espec->quatro_portas){?>
				  	  	<td align="center"><img src="/images/carroaluguel/icones/icon_06.jpg" alt="4 Portas" width="40" height="40" /></td>
                    <?php } if($this->tarifa_cotacao->grupo->espec->ac){?>
				  	  	<td align="center"><img src="/images/carroaluguel/icones/icon_08.jpg" alt="Ar Condicionado" width="40" height="40" /></td>
                    <?php } if($this->tarifa_cotacao->grupo->espec->dh){?>
				  	  	<td align="center"><img src="/images/carroaluguel/icones/icon_05.jpg" alt="Direção Hidráulica" width="40" height="40" /></td>
                    <?php } if($this->tarifa_cotacao->grupo->espec->te){?>
				  	  	<td align="center"><img src="/images/carroaluguel/icones/icon_07.jpg" alt="Trio Elétrico" width="40" height="40" /></td>
                    <?php } if($this->tarifa_cotacao->grupo->espec->cd){?>
				  	  	<td align="center"><img src="/images/carroaluguel/icones/icon_09.jpg" alt="Cd Player" width="40" height="40" /></td>
                    <?php } ?>
                        <td align="center"><img src="/images/carroaluguel/icones/icon_02.jpg" alt="Cap. <?php echo reset($this->tarifa_cotacao->carros->carros)->car_passageiros;?> pessoas" /></td>
                        <td align="center"><img src="/images/carroaluguel/icones/icon_03.jpg" alt="<?php echo reset($this->tarifa_cotacao->carros->carros)->car_malagde;?> Malas grandes" /></td>
                        <td align="center"><img src="/images/carroaluguel/icones/icon_04.jpg" alt="<?php echo reset($this->tarifa_cotacao->carros->carros)->car_malapeq;?> Malas pequenas" /></td>
                        <td align="center"><img src="/images/carroaluguel/icones/icon_10.jpg" alt="Motor <?php echo reset($this->tarifa_cotacao->carros->carros)->car_motor;?>" /></td>
                        <td align="center"><img src="/images/carroaluguel/icones/icon_11.jpg" alt="cambio <?php echo reset($this->tarifa_cotacao->carros->carros)->car_cambio;?>" /></td>
                    </tr>
                    <tr>
                    <?php if($this->tarifa_cotacao->grupo->espec->duas_portas){?>	
                    	<td align="center">2 Portas</td>
                    <?php } if($this->tarifa_cotacao->grupo->espec->quatro_portas){?>
						<td align="center">4 Portas</td>
                    <?php } if($this->tarifa_cotacao->grupo->espec->ac){?>
                    	<td align="center">Ar condicionado</td>
                    <?php } if($this->tarifa_cotacao->grupo->espec->dh){?>
                    	<td align="center">Direção hidráulica</td>
                    <?php } if($this->tarifa_cotacao->grupo->espec->te){?>
                    	<td align="center">Trio elétrico</td>
                    <?php } if($this->tarifa_cotacao->grupo->espec->cd){?>
                    	<td align="center">Cd Player</td>
                    <?php } ?>
                        <td align="center">Cap. <?php echo reset($this->tarifa_cotacao->carros->carros)->car_passageiros;?> Pessoas</td>
                        <td align="center"><?php echo reset($this->tarifa_cotacao->carros->carros)->car_malagde;?> Malas Grandes</td>
                        <td align="center"><?php echo reset($this->tarifa_cotacao->carros->carros)->car_malapeq;?> Malas Pequenas</td>
                        <td align="center">Motor <?php echo reset($this->tarifa_cotacao->carros->carros)->car_motor;?></td>
                        <td align="center">Câmbio <?php echo reset($this->tarifa_cotacao->carros->carros)->car_cambio;?></td>
					</tr>
                </table>
            </div>
        </div>
	<!-- FIM INFORMAÇÕES RESERVA -->
    <!-- INÍCIO RETIRADA E DEVOLUÇÃO -->
        <form name="escolha_de_lojas" action="/pesquisa/seleciona-seguro" method="post">
    	<div id="container_retirada_devolucao">
        	<h3>Selecione a Loja de Retirada em <?php if(isset($this->dadoPesquisado->city_ret->nome)){echo $this->dadoPesquisado->city_ret->nome;}else{echo "<em>Cidade Inválida</em>";}?></h3>

            <div id="retirada">
            	<strong> Data/Hora da Retirada: <?php echo $this->str_data_retirada;?></strong>
                <ul><?php
						if (!isset($this->tarifa_cotacao->lojas_disponiveis->retirada)){
							echo "Desculpe, não há lojas em funcionamento no dia ou horário solicitado para retirada"; 
							$show_button = 0;
						}else{
							$checked_option = '1';
							foreach($this->tarifa_cotacao->lojas_disponiveis->retirada as $loj_ret){ ?>
                    	<li>
                    		<input name="lojareti" type="radio" value="<?php echo $loj_ret->loj_id;?>" <?php if ($checked_option == '1'){echo "checked=\"checked\"";} ?> />
                        	<?php echo $loj_ret->loj_iata;?> | <?php echo $loj_ret->loj_nome;?> | <?php echo $loj_ret->end_endereco;?> - <span style='color:#009900;'>DISPONÍVEL</span>
						</li>
                    <?php $checked_option = 0; }} ?>
				</ul>
			</div>
            <h3 class="devolucao"> Selecione a Loja de Devolução em <?php if(isset($this->dadoPesquisado->city_dev->nome)){ echo $this->dadoPesquisado->city_dev->nome;}else{echo "<em>Cidade Inválida</em>";}?></h3>

                         <div id="devolucao">
            
            	<strong>Data/Hora da Devolução: <?php echo $this->str_data_devolucao;?></strong>
                <ul><?php
						if (!isset($this->tarifa_cotacao->lojas_disponiveis->devolucao)){
							echo "Desculpe, não há lojas em funcionamento no dia ou horário solicitado para retirada"; 
							$show_button = 0;
						}else{
							$checked_option = '1';
							foreach($this->tarifa_cotacao->lojas_disponiveis->devolucao as $loj_ret){ ?>
                    	<li>
                    		<input name="lojadev" type="radio" value="<?php echo $loj_ret->loj_id;?>" <?php if ($checked_option == '1'){echo "checked=\"checked\"";} ?> />
                        	<?php echo $loj_ret->loj_iata;?> | <?php echo $loj_ret->loj_nome;?> | <?php echo $loj_ret->end_endereco;?>
						</li>
                    <?php $checked_option = 0; }} ?>
				</ul>
			</div>
        </div>
        <?php if(isset($this->tarifa_cotacao->lojas_disponiveis->retirada) && isset($this->tarifa_cotacao->lojas_disponiveis->retirada)){ ?>
                <a href="#" title="Reservar" class="reserva_left" onClick="escolha_de_lojas.submit()" ><img src="/images/<?php echo SITE;?>/bt_continuar.jpg" alt="Reservar" /></a>
        <?php } ?>
        <input type="hidden" name="grupo" value="<?php echo $this->tarifa_cotacao->grupo->id; ?>" />
        <input type="hidden" name="dataRetirada" value="<?php echo $this->tarifa_cotacao->data_inicial; ?>" />
        <input type="hidden" name="dataDevolucao" value="<?php echo $this->tarifa_cotacao->data_final; ?>" />
        <input type="hidden" name="horaRetirada" value="<?php echo $this->tarifa_cotacao->hora_inicial; ?>" />
        <input type="hidden" name="horaDevolucao" value="<?php echo $this->tarifa_cotacao->hora_final; ?>" />
        <input type="hidden" name="cityRet" value="<?php echo $this->dadoPesquisado->city_ret->id; ?>" />
        <input type="hidden" name="cityDev" value="<?php echo $this->dadoPesquisado->city_dev->id; ?>" />
        </form>
        	<!-- FIM RETIRADA E DEVOLUÇÃO -->

    </div>
    <!-- FIM ESCOLHA LOCADORA -->
</div>
<!-- FIM DIV PAGE -->
    <?php $this->load->view(SITE.'/footer.php');?>