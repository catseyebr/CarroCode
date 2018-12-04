<?php $this->load->view(SITE.'/header'); ?>
<body class="topo_internas" >
<!-- INICIO DIV PAGE -->
	<div id="page">
        <!-- INICIO TOPO -->
        <?php $this->load->view(SITE.'/topo');?>
        <!-- FIM TOPO -->
        <!-- INICIO MENU -->
        <?php $this->load->view(SITE.'/menu');?>
        <!-- FIM MENU -->
        <!-- INICIO LOCADORAS -->
        <div id="geral_locadoras">
        	<!-- INICIO TOPO LOCADORAS -->
			<div id="topo_locadora">
            	<h2>Locadora <?php echo $this->locadora->nome;?> - Aluguel de Carros</h2>
			</div>
            <div id="promocoes_locadoras">
            	<strong>Promoções Especiais</strong>
			</div>
            <div id="promocoes_link">
            	<a href="#" title="Veja todas as ofertas">+ Ver todas as locações</a>
			</div>
			<!-- FIM TOPO LOCADORAS -->
            <!-- INICIO PROMOCOES -->
            <div id="locadoras_promocoes">
            	<div id="container_promo">
					<?php $i=0; foreach($this->locadora->grupos as $grp){ ?>
                <div class="box_locadoras <?php if ($i == 0){ echo "first_locadora";} ?>">
                  <span>Grupo <?php echo $grp->nome; ?></span>
                        	<p><?php foreach($grp->carros->carros as $carr){ echo " - ".$carr->car_modelo; } ?> ou similar
                            </p>
                        	<strong>A partir de: R$ <?php echo number_format($grp->tarifa_media->diaria,'2',',','.');?></strong>
                        	<a href="#" title="Reserva Já!" class="bt_reserva">+ Reservar</a> 
						  </div>
          		<?php $i++; if($i==4) break;} ?>
				</div>
			</div>
            <!-- FIM PROMOCOES -->
            <!-- INICIO BANNER PAGAMENTO -->
            <div id="container_pagamento">
            	<div id="banner_locadora">
                	<p><?php /*
                    	<strong><?php echo $this->dados_gerais->dif_title; ?></strong>
                        <?php echo $this->dados_gerais->dif_frase1 . "<br />";
						if($this->dados_gerais->dif_frase2 != ''){
							echo $this->dados_gerais->dif_frase2 . "<br />";}
						if($this->dados_gerais->dif_frase3 != ''){
							echo $this->dados_gerais->dif_frase3 . "<br />";}
						if($this->dados_gerais->dif_frase4 != ''){
							echo $this->dados_gerais->dif_frase4;}?>
                    </p> */?>
				</div>
                <div id="pagamento_locadoras">
                	<strong>Formas de Pagamento</strong>
                    <ul>
                    	<?php foreach ($this->locadora->formas_pagamento->forma as $frm_id => $frm_nome){?>
                        <img src="/images/formas_pagamento/<?php echo $frm_id;?>_50.gif" width="50" height="21" align="absmiddle" />
                        <?php } ?>
					</ul>
                    <p>Em até  <?php echo $this->locadora->formas_pagamento->parcelamento;?>x sem juros - <?php 
					  if ($this->locadora->formas_pagamento->parc_minima != ''){
					  echo " Parcelas mínimas de R$ ".$this->locadora->formas_pagamento->parc_minima."";
					  }else{echo "Consulte-nos sobre a parcela mínima";}
					  ?>
                    </p>
				</div>
			</div>
            <!-- FIM BANNER PAGAMENTO -->
            <!-- INICIO BARRA MENU -->
            <div id="container_menu_locadora">
            	<a name="menu_locacao" id="menu_loca"></a>
            	<div id="menu_locadora">
            		<a href="#tarifas" title="Confira os valores" class="tar">Tarifas</a>
            		<a href="#quem" title="Conheça a locadora" class="desc">Descrição da Locadora</a>
                	<a href="#protecao" title="Produtos" class="seg">Seguros/Proteções</a>
                	<a href="#lojas" title="Encontre a loja" class="disp">Lojas Disponíveis</a>
				</div>
			</div>
            <!-- FIM BARRA MENU -->
            <!-- INICIO TARIFA -->
            <div id="tarifas_locadoras">
            	<a name="tarifas" id="tarifas"></a>
                <h3>Tarifas</h3>
                <div id="tabela_locadora">
                	<table width="860" border="0">
                    	<tr>
                        	<td>
                            	<table width="100%" border="0" cellpadding="5" cellspacing="5" class="titulos_desc">
                                	<tr>
                                    	<td width="39">Grupo</td>
                                        <td width="165">Modelos</td>
                                        <td width="145">Descrição</td>
                                        <td width="70">Diária<br />
                                        	(1-6 dias)</td>
										<td width="70">Semanal<br />
                                        	(7 dias)</td>
										<td width="70">Quinzenal<br />
                                        	(15 dias)</td>
										<td width="70">Mensal<br />
                                        	(30 dias)</td>
										<td width="70">Valor da<br />
                                        	Caução</td>
										<td width="90"><p>img_bt</p></td>
									</tr>
								</table>
							</td>
						</tr>
                        <tr>
                        	<td><img src="/images/carroaluguel/linha_locadora.gif" alt="CarroAluguel.com" /></td>
						</tr>
                        <?php 
						$tabela_class = 0;
						foreach($this->locadora->grupos as $grp) { ?>
                        <tr>
                        	<td>
                            	<table width="100%" border="0" cellpadding="5" cellspacing="5" class="<?php if ($tabela_class==0){echo "tabela_claro";}else{echo "tabela_escura";} ?>">
                                	<tr id="<?php echo $grp->id; ?>">
                                    	<td width="39" align="center"><?php echo $grp->nome; ?></td>
                                        <td width="165">
											<?php foreach($grp->carros->carros as $carr){ echo " - ".$carr->car_modelo; } ?> ou similar
                                        </td>
                                        <td width="145">
                                        	<?php if($grp->espec->duas_portas){?>
                                                <img src="/images/carroaluguel/opcionais/2p.gif" alt="Duas portas" />
                                            <?php }  if($grp->espec->quatro_portas){?>
                                                <img src="/images/carroaluguel/opcionais/4p.gif" alt="Quaro portas" />
                                            <?php } if($grp->espec->ac){?>
                                                <img src="/images/carroaluguel/opcionais/ac.gif" alt="Ar condicionado" />
                                            <?php } if($grp->espec->dh){?>
                                                <img src="/images/carroaluguel/opcionais/dh.gif" alt="Direção hidráulica" />
                                            <?php } if($grp->espec->te){?>
                                                <img src="/images/carroaluguel/opcionais/te.gif" alt="Trio Elétrico" />
                                            <?php } if($grp->espec->cd){?>
                                                <img src="/images/carroaluguel/opcionais/cd.gif" alt="Cd Player" />
                                            <?php } ?>
                                        </td>
                                        <td width="70">R$ <?php echo number_format($grp->tarifa_media->diaria,'2',',','.');?></td>
                                        <td width="70">R$ <?php echo number_format($grp->tarifa_media->semanal,'2',',','.');?></td>
                                        <td width="70">R$ <?php echo number_format($grp->tarifa_media->quinzenal,'2',',','.');?></td>
                                        <td width="70"><?php if($grp->tarifa_media->mensal!=NULL){echo "R$ ".number_format($grp->tarifa_media->mensal,'2',',','.');}else{echo "Consulte";}?></td>
                                        <td width="70"><?php if($grp->caucao != ''){echo $grp->caucao;}else{echo "Consulte"; } ?></td>
                                        <td width="90">
                                            <a href="#" title="Reservar esta locação">
                                            <img src="/images/carroaluguel/bt_reservar_locadora.gif" alt="Reservar esta locação" />
                                            </a>
                                        </td>
									</tr>
                                </table>
							</td>
						</tr>
                        <?php 
						if ($tabela_class==0){$tabela_class=1;}else{$tabela_class=0;}
						} ?>
                        <tr>
                        	<td>&nbsp;</td>
						</tr>
					</table>
				</div>
			</div>
            <!-- FIM TARIFA -->
            <!-- INICIO LEGENDA -->
            <div id="legenda">
            	<h3>Legenda</h3>
                <div id="icones_legenda">
                    <table width="787" border="0" class="icons_legenda">
                        <tr>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center"><img src="/images/carroaluguel/icon_2portas.gif" alt="CarroAluguel.com" /></td>
                            <td align="center"><img src="/images/carroaluguel/icon_4portas.gif" alt="CarroAluguel.com" /></td>
                            <td align="center"><img src="/images/carroaluguel/icon_ar.gif" alt="CarroAluguel.com" /></td>
                            <td align="center"><img src="/images/carroaluguel/icon_direcao.gif" alt="CarroAluguel.com" /></td>
                            <td align="center"><img src="/images/carroaluguel/icon_trio.gif" alt="CarroAluguel.com" /></td>
                            <td align="center"><img src="/images/carroaluguel/icon_cd.gif" alt="CarroAluguel.com" /></td>
                        </tr>
                        <tr>
                            <td align="center">2 portas</td>
                            <td align="center">4 portas</td>
                            <td align="center">Ar Condicionado</td>
                            <td align="center">Dire&ccedil;&atilde;o Hidr&aacute;ulica</td>
                            <td align="center">Trio El&eacute;trico</td>
                            <td align="center">CD Player</td>
                        </tr>
                        <tr>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center"><img src="/images/carroaluguel/icon_km.gif" alt="CarroAluguel.com" /></td>
                            <td align="center"><img src="/images/carroaluguel/icon_tarifa.gif" alt="CarroAluguel.com" /></td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center">Km Livre!</td>
                            <td align="center">Tarifa Promocional</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- FIM LEGENDA -->
            <!-- INICIO IMPORTANTE -->
            <div id="importante_locadoras">
                <h3>Importante</h3>
                <p>
                    <?php echo $this->locadora->mais_info;?>
                </p>
                <p>
                    Acrescentar  taxas de <?php echo $this->locadora->taxa; ?>% para retirada em lojas e  <?php echo $this->locadora->taxa_aero; ?>% para retirada em aeroportos.<br />
                    Valores sujeitos a alterações sem prévio aviso.
                </p>
            </div>
            <!-- FIM IMPORTANTE -->
            <!-- INICIO CONHECA AS PROTECOES -->
            <div id="titulo_protecao">
                <a name="protecao" id="protecao"></a>
                <h3>Conheça as Proteções</h3>
                <a href="#menu_locacao" title="Volte ao menu" class="volta">voltar ao topo</a>
            </div>
            <?php foreach ($this->protecoes_disponiveis as $prot_dispo => $prot_value){?>
            <div class="container_protecoes">
                <h4>Proteção: <?php echo $prot_value->prot_nome;?></h4>
                <p>
                    <strong>Grupos Participantes:</strong>
                    <?php //echo trim($this->protecoes[$i]->grupos, ","); ?>
                </p>
                <p>
                    <strong>Descrição:</strong>
                    <?php echo $prot_value->prot_desc;?>
                </p>
                <p>
                    <strong>Valor da Proteção ao dia:</strong>
                    <?php if($prot_value->tarifa[0]->tarprot_valor != 0){ ?>
                    	Acrescenta: R$ <?php echo number_format($prot_value->tarifa[0]->tarprot_valor,'2',',','.');?> no valor da di&aacute;ria.
                    <?php }else{?>
                    	Incluído no valor da diária<?php }?>
                </p>
            </div>
            <?php } ?>
            <!-- FIM CONHEÇA AS PROTECOES -->
            <!-- INICIO LOJAS -->
            <div id="titulo_lojas">
                <a name="lojas" id="lojas"></a>
                <h3>Principais Lojas</h3>
                <a href="#menu_locacao" title="Volte ao menu" class="volta">voltar ao topo</a>
            </div>
            <div id="busca_lojas">
                <table width="520" border="0" class="tabela_busca">
                        <tr>
                            <td><img src="/images/carroaluguel//icon_lup.jpg" alt="CarroAluguel.com" class="lupa_left"/></td>
                            <td>Escolha a Cidade </td>
                            <td><select id="cod_link_cidade" class="campo_locadora">
                                    <option value="Selecione">Selecione</option>
                                    <?php foreach($this->locadora->lojasCidades as $cid_loj){?>
                                    <option value="<?php echo $cid_loj->city_nome;?>">
										<?php echo $cid_loj->city_nome;?>
                                    </option>
                                    <?php } ?>
                                </select></td>
                            <td><input type="image" src="/images/carroaluguel/bt_localiza.jpg" onClick="#" /></td>
                        </tr>
                    </table>
            </div>
            <?php foreach($this->locadora->lojas as $loj){?>
            <div class="container_lojas">
                <div class="lojas_locadoras">
                	<?php if($loj->aeroporto == TRUE){?>
                		<a href="#">
                        	<img src="/images/carroaluguel/icon_aviao.jpg" alt="Loja <?php echo $this->locadora->nome; ?> em <?php echo $loj->nome;?>" class="icones_lojas" />
                         </a>
                    <?php } else {?>
                    	<a href="#">
                        	<img src="/images/carroaluguel/icon_casa.jpg" alt="Loja <?php echo $this->locadora->nome; ?> no bairro em <?php echo $loj->nome;?>" class="icones_lojas" />
                        </a>
                    <?php }?>
                    <p>
                        <strong><a href=""><?php echo $loj->nome;?></a></strong>
                        <?php echo $loj->endereco->rua; ?> - Bairro: <?php echo $loj->endereco->bairro;?> - Cidade: <?php echo $loj->endereco->cidade;?> - Estado: <?php echo $loj->endereco->estado;?>
                        <span>Horários de Funcionamento:</span>
                        de Segunda à Sexta-Feira: das <?php echo $loj->horarios[1]->hora_inicial;?>hs às <?php echo $loj->horarios[1]->hora_final;?>hs<br>
										aos Sábados: <?php if(isset($loj->horarios[6])){echo $loj->horarios[6]->hora_inicial."hs às ".$loj->horarios[6]->hora_final."hs.";}else{echo "Fechado.";}?><br>
										aos Domingos e Feriados: <?php if(isset($loj->horarios[0])){echo $loj->horarios[0]->hora_inicial."hs às ".$loj->horarios[0]->hora_final."hs.";}else{echo "Fechado.";}?>
                    </p>
                </div>
                <div class="reserva_locadora">
                    <a href="#"><img src="/images/carroaluguel/bt_gr.jpg" alt="CarroAluguel.com" /></a>
                </div>
            </div>
            <?php } ?>
            <!-- FIM LOJAS -->
            <?php if ($this->locadora->texto_livre != ''){?>
            <!-- INICIO QUEM SOMOS -->
            <div id="titulo_somos">
                
                <h3>Conheça um pouco mais da <?php echo $this->locadora->nome;?></h3>
                <a href="#menu_locacao" title="Volte ao menu" class="volta">voltar ao topo</a><a name="quem" id="quem" class="volta"></a>
            </div>
            <div id="conteudo_somos">
                <?php echo $this->locadora->texto_livre;?>
            </div>
            <!-- FIM QUEM SOMOS -->
            <?php } ?>
        </div>
        <!-- FIM LOCADORAS -->
    </div>
        <!-- FIM DIV PAGE -->
   <?php $this->load->view(SITE.'/footer.php'); ?>