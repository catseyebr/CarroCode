<?php $this->load->view(SITE.'/header'); ?>
<body class="topo_processo">
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
            	<div id="escolha">

                	<strong>01</strong>
                    <p>Pesquisa inicial
                    	<span>Retirada e devolução</span>
                    </p>
				</div>
                <div id="ativo_seguros">
                	<strong>02</strong>
                    <p>Escolha os adicionais
                    	<span>Lojas, seguro e serviços adicionais</span>

					</p>
				</div>
                <div id="identificacao">
                	<strong>03</strong>
                    <p>Identificação
                    	<span>Realize seu login e senha</span>
                    </p>
				</div>

                <div id="finalizacao">
                	<strong>04</strong>
                    <p>Finalização
                    	<span>Conclua sua reserva</span>
					</p>
				</div>
			</div>
		<!-- FIM BARRA PROCESSO -->

        <!-- INÍCIO ESCOLHA SEGURO -->
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
    <form action="/pesquisa/inserir-pesquisa" method="POST">
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
                    		<input name="id_loja_retirar" type="radio" value="<?php echo $loj_ret->loj_id;?>" <?php if ($checked_option == '1'){echo "checked=\"checked\"";} ?> />
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
                    		<input name="id_loja_devolver" type="radio" value="<?php echo $loj_ret->loj_id;?>" <?php if ($checked_option == '1'){echo "checked=\"checked\"";} ?> />
                        	<?php echo $loj_ret->loj_iata;?> | <?php echo $loj_ret->loj_nome;?> | <?php echo $loj_ret->end_endereco;?>
						</li>
                    <?php $checked_option = 0; }} ?>
				</ul>
			</div>
        </div>
        <!-- FIM RETIRADA E DEVOLUÇÃO -->
    <!-- INÍCIO JÁ INCLUSA-->
        <div id="protecao_inclusa">
        	<h3>Proteção já Inclusa</h3>
            <strong>Valor da prote&ccedil;&atilde;o j&aacute; inclu&iacute;da no valor da di&aacute;ria</strong>
			<p><span><?php echo $this->tarifa_cotacao->protecao->nome;?></span>
            <?php echo $this->tarifa_cotacao->protecao->desc;?></p>
		</div>
        <!-- FIM JÁ INCLUSA-->
        <!-- INÍCIO ADICIONE PROTEÇÃO-->
         
        <div id="add_protecao">
        <h3>Proteções</h3>
        <?php foreach ($this->protecoes_disponiveis as $prot_dispo => $prot_value){?>
			<div class="bt_add">
			<?php if($prot_value->prot_id==$this->tarifa_cotacao->protecao->id){?>
            	<img src="/images/<?php echo SITE;?>/substituir_checked.png" alt="Selecionada" />
                <?php }else{ ?>
                <a href="<?php echo "/pesquisa/seleciona-seguro/".$this->tarifa_cotacao->grupo->id."/".$prot_value->prot_id."/".$this->tarifa_cotacao->data_inicial."T".$this->tarifa_cotacao->hora_inicial."/".$this->tarifa_cotacao->data_final."T".$this->tarifa_cotacao->hora_final."/".$this->dadoPesquisado->lojareti."/".$this->dadoPesquisado->lojadev."/".$this->dadoPesquisado->city_ret->id."/".$this->dadoPesquisado->city_dev->id."/".$this->dadoPesquisado->opcionais->inc;?>" title="Adicione"><img src="/images/<?php echo SITE;?>/substituir.png" alt="Adicione" /></a>
                <?php } ?>
			</div>
            <p>
                <strong><?php echo $prot_value->prot_nome;?></strong><br />
                <?php echo $prot_value->prot_desc;?><br />
                <span>
                	<?php if($prot_value->tarifa[0]->tarprot_valor != 0){ ?>
                    	Valor: R$ <?php echo number_format($prot_value->tarifa[0]->tarprot_valor,'2',',','.');?>
                    <?php }else{?>
                    	Valor da proteção já incluído no valor da diária
                    <?php }?>
                </span>
			</p>
            <?php } ?>            
		</div>
        <div style="border:solid 1px #CCC; text-align:center; margin: 10px 0px 10px 0px;"><strong>Legenda:</strong> <img src="/images/<?php echo SITE;?>/substituir_checked.png" alt="Adicione" align="absmiddle" /> Proteção Selecionada | <img src="/images/<?php echo SITE;?>/substituir.png" alt="Adicione" align="absmiddle" /> Selecionar Proteção</div>
        <!-- FIM ADICIONE PROTEÇÃO-->
        <!-- INÍCIO PRODUTOS ADICIONAIS -->
        <div id="produtos_adicionais">

        	<h3>Selecione Produtos e Serviços Opcionais para esta Locação</h3>
            <ul>
            	<li>
					<?php if(!in_array('2',$this->dadoPesquisado->opcionais->opc)){?>
                    <a style="text-decoration:none; color:#000" title="Adicione" href="<?php echo "/pesquisa/seleciona-seguro/".$this->tarifa_cotacao->grupo->id."/".$this->tarifa_cotacao->protecao->id."/".$this->tarifa_cotacao->data_inicial."T".$this->tarifa_cotacao->hora_inicial."/".$this->tarifa_cotacao->data_final."T".$this->tarifa_cotacao->hora_final."/".$this->dadoPesquisado->lojareti."/".$this->dadoPesquisado->lojadev."/".$this->dadoPesquisado->city_ret->id."/".$this->dadoPesquisado->city_dev->id."/".$this->dadoPesquisado->opcionais->inc.":2";?>">
                        <img src="/images/<?php echo SITE;?>/mais.jpg" alt="Adicione"/>
                        Localizador GPS: <span>R$ 15,00 a diária</span>
                    </a> 
                    <?php }else{ ?>  
                    <a style="text-decoration:none; color:#000" title="Adicione" href="<?php echo "/pesquisa/seleciona-seguro/".$this->tarifa_cotacao->grupo->id."/".$this->tarifa_cotacao->protecao->id."/".$this->tarifa_cotacao->data_inicial."T".$this->tarifa_cotacao->hora_inicial."/".$this->tarifa_cotacao->data_final."T".$this->tarifa_cotacao->hora_final."/".$this->dadoPesquisado->lojareti."/".$this->dadoPesquisado->lojadev."/".$this->dadoPesquisado->city_ret->id."/".$this->dadoPesquisado->city_dev->id."/".$this->dadoPesquisado->opcionais->inc.":-2";?>">
                        <img src="/images/<?php echo SITE;?>/menos.jpg" alt="Adicione"/>
                        Localizador GPS: <span>R$ 15,00 a diária</span>
                    </a> 
                    <?php }?>           
				</li>

              
                <li>
                	                    <a style="text-decoration:none; color:#000" title="Adicione" 
                    href="escolha_seguro.php?loja_retirada=33&loja_devolucao=33&selecionaGrupo=1&op_gps=&op_entrega=&op_bb=1&op_con=&dataRetirada=04/10/2010&dataDevolucao=05/10/2010&horaRetirada=12:00&horaDevolucao=12:00&id_protect=33">
                    <img src="/images/<?php echo SITE;?>/mais.jpg" alt="Adicione"/>
                    Cadeira para criança: <span>R$ 15,00 a diária</span>
                    </a> 
                                        
				</li>
                                <li>
                	                    <a style="text-decoration:none; color:#000" title="Adicione" 
                    href="escolha_seguro.php?loja_retirada=33&loja_devolucao=33&selecionaGrupo=1&op_gps=&op_entrega=&op_bb=&op_con=1&dataRetirada=04/10/2010&dataDevolucao=05/10/2010&horaRetirada=12:00&horaDevolucao=12:00&id_protect=33">

                    <img src="/images/<?php echo SITE;?>/mais.jpg" alt="Adicione"/>
                    Condutor Adicional: <span>R$ 7,00 a di&aacute;ria</span>
                    </a> 
                                    </li>
                			</ul>
		</div>
        <div style="border:solid 1px #CCC; text-align:center; margin: 10px 0px 10px 0px;"><strong>Legenda:</strong> 
         <img src="/images/<?php echo SITE;?>/mais.jpg" alt="Adicione" align="absmiddle" /> N&atilde;o Selecionado | 
         <img src="/images/<?php echo SITE;?>/menos.jpg" alt="Retire" align="absmiddle" /> Opcional Selecionado</div>

        <!-- FIM PRODUTOS ADICIONAIS -->
        <!-- INÍCIO VALORES -->
        <div id="valor_locacao">
        	<h3> Valor da Locação:</h3>
            <div id="indique_pagina">
            	<a href="#" title="Indique esta página"
                onclick="window.open('email_indique.php?loja_retirada=33&loja_devolucao=33&selecionaGrupo=1&op_gps=&op_entrega=&op_bb=&op_con=0&dataRetirada=04/10/2010&dataDevolucao=05/10/2010&horaRetirada=12:00&horaDevolucao=12:00&id_protect=33&nome_layum=&email_layum=&id_reservafacil_layum=&id_loc=1&user_nome=&user_email=', 'Janela', 'toolbar=no, location=no, directories=no, status=no, menubar=no,scrollbars=auto,resizable=no,width=640,height=480'); return false;">
                Envie esta página por e-mail para seu
                cliente/amigo. Clique aqui!
                </a>

			</div>
            <ul>
            	<li>Total de Diárias: <?php echo $this->tarifa_cotacao->diarias; if($this->tarifa_cotacao->diarias <= 1){echo " dia";}else{echo " dias";}?></li>
                <li>Quilometragem Inclusa: <?php echo $this->tarifa_cotacao->grupo->km;?></li>
                <li>Valor Diárias: R$ <?php echo number_format($this->tarifa_cotacao->valor_diarias,'2',',','.');?></li>
                <?php if($this->tarifa_cotacao->horas_extra >= 1){?>
                	<li>Horas Extras (<?php echo $this->tarifa_cotacao->horas_extra; if($this->tarifa_cotacao->horas_extra <= 1){echo " hora";}else{echo " horas";} ?>): R$ <?php echo number_format($this->tarifa_cotacao->valor_hora_extra,'2',',','.'); ?></li>
                <?php } ?>
                <li>
					<?php if($this->tarifa_cotacao->valor_protecao != 0){ ?>
                    	Valor Proteção: R$ <?php echo number_format($this->tarifa_cotacao->valor_protecao,'2',',','.');?>
                    <?php }else{?>
                    	Valor Proteção: Valor da proteção já incluído no valor da diária
                    <?php }?>
                </li>
                <li>Taxa (<?php echo $this->tarifa_cotacao->taxa;?>%): R$ <?php echo number_format($this->tarifa_cotacao->valor_taxas,'2',',','.');?></li>
                <li>Valor Total: R$ <?php echo number_format($this->tarifa_cotacao->valor_total,'2',',','.');?></li>
			</ul>
            
		</div>
        <!-- FIM VALORES -->
        <!-- INÍCIO BOTÃO E INDIQUE -->
        <div id="container_botao" style="text-align:center;">
        

        <a href="">
        	<img src="/images/<?php echo SITE;?>/bt_refazer.jpg" alt="" width="150" height="77" border="0" />
        </a>
        	<input name="id_locadora" type="hidden" value="<?php echo $this->tarifa_cotacao->locadora->id;?>" />
            <input name="id_grupo" type="hidden" value="<?php echo $this->tarifa_cotacao->grupo->id; ?>" />
            <input name="id_protecao" type="hidden" value="<?php echo $this->tarifa_cotacao->protecao->id;?>" />
            <input name="data_retirar" type="hidden" value="<?php echo $this->tarifa_cotacao->data_inicial." ".$this->tarifa_cotacao->hora_inicial; ?>" />
			<input name="data_devolver" type="hidden" value="<?php echo $this->tarifa_cotacao->data_final." ".$this->tarifa_cotacao->hora_final; ?>" />
            <input name="diarias" type="hidden" value="<?php echo $this->tarifa_cotacao->diarias; ?>" />
            <input name="diaria_extra" type="hidden" value="<?php echo $this->tarifa_cotacao->diaria_extra; ?>" />
            <input name="hora_extra" type="hidden" value="<?php echo $this->tarifa_cotacao->horas_extra; ?>" />
            <input name="valor_horas_extra" type="hidden" value="<?php echo $this->tarifa_cotacao->valor_hora_extra; ?>" />
            <input name="valor_diarias" type="hidden" value="<?php echo $this->tarifa_cotacao->valor_diarias; ?>" />
            <input name="valor_taxas" type="hidden" value="<?php echo $this->tarifa_cotacao->valor_taxas; ?>" />
            <input name="valor_protecao" type="hidden" value="<?php echo $this->tarifa_cotacao->valor_protecao; ?>" />
            <input name="valor_total" type="hidden" value="<?php echo $this->tarifa_cotacao->valor_total; ?>" />
            <input name="opcionais" type="hidden" value="<?php echo $this->dadoPesquisado->opcionais->inc ?>" />
            
            <?php if(isset($this->tarifa_cotacao->lojas_disponiveis->retirada) && isset($this->tarifa_cotacao->lojas_disponiveis->retirada)){ ?>
            	<input name="continuar" type="image" src="/images/<?php echo SITE;?>/bt_continuar.jpg" class="bt_cont" />
			<?php } ?>
        </div>
        <!-- FIM BOTÃO E INDIQUE -->
	</div>
    </form>
<!-- FIM ESCOLHA SEGURO-->
</div>
<!-- FIM DIV PAGE -->
<img src="http://clicklogger.rm.uol.com.br/linkspatrocinados/?prd=76&grp=id.user.links:141245156;desc.label.links:opcionais;financial.value.links:0&msr=msr:1&oper=8" height="1px" width="1px"/>
    <?php $this->load->view(SITE.'/footer.php');?>