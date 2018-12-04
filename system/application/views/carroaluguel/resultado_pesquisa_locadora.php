<?php $this->load->view(SITE.'/header'); ?>
<body class="topo_internas">
<!-- INÍCIO DIV PAGE -->
	<div id="page">
		<!-- INÍCIO TOPO -->
			<?php $this->load->view(SITE.'/topo');?>
            <!-- FIM TOPO -->
        	<!-- INÍCIO MENU -->
			<?php $this->load->view(SITE.'/menu');?>
        	<!-- FIM MENU -->
        	<!-- INÍCIO CONTEÚDO RESULTADO PESQUISA -->
			<div id="geral_pesquisa_mais">
			<!-- INÍCIO PESQUISA INTERNA ATENDIMENTO TERMOS -->
                <div id="container_pesquisa">
                    <!-- INÍCIO PESQUISA INTERNA -->
					<div id="pesquisa_interna">
						<?php $this->load->view(SITE.'/pesquisa_interna');?>
                    </div>
                    <!-- FIM PESQUISA INTERNA -->
                    <!-- INÍCIO ATENDIMENTO E TERMOS -->
                    <div id="atende_termos">
                        <div id="horario">
                            <h3>Horários de Atendimento</h3>

                            <p>
                            de segunda à sexta-Feira das 08:30 às 18:15hs.
                            Reservas solicitadas fora do horário comercial
                            serão processadas no próximo dia útil.
                            </p>
                        </div>
                        <div id="termos">
                            <h3 style="font-size:18px; text-align:center">Termos e Condições para Locação</h3>
                            <img src="/images/<?php echo SITE;?>/icon_termos.jpg" alt="Termos e Condições para Locação" />
                            <p>
                            É muito fácil reservar um veículo<br />

                            através do portal Carro Aluguel,<br />
                            com toda a comodidade e segurança.
                            </p>
                            <a href="/informacoes/condicoes-gerais" title="Saiba mais sobre as vantagens">saiba mais</a>
                        </div>
                    </div>
                    <!-- FIM ATENDIMENTO E TERMOS -->
                </div>

            <!-- FIM PESQUISA INTERNA ATENDIMENTO TERMOS -->
            <!-- INÍCIO DETALHES PESQUISA -->
            <div id="container_detalhes">
            <img src="http://clicklogger.rm.uol.com.br/linkspatrocinados/?prd=76&grp=id.user.links:141245156;desc.label.links:pesquisa;financial.value.links:0&msr=msr:1&oper=8" height="1px" width="1px"/>
				<div id="detalhes_pesquisa_comparacao">
                	<div id="abas_pesquisa2">
                    	<a href="/pesquisa" title="Pesquise por comparação" class="locadora">Comparação</a>
                    	<a href="/pesquisa/grupo" title="Pesquise por grupo">Por Grupo</a>
						<span>Por Locadora</span>
                    </div>
                    <div id="geral_detalhes">
                    	<div id="master_detalhes">
							<ul id="acc1" class="ui-accordion-container">
                    			<!-- INÍCIO CATEGORIA -->
								<li>
								<a href="#" class="ui-accordion-link acc1">
                                	<span style="float:left; width:300px;">Locadora Avis Rent a Car</span>
                                    <div style="width:22px; height:22px; margin-top:3px; margin-right:3px; float:right">
                                    	<img src="/images/<?php echo SITE;?>/bt_mais.jpg" alt="Veja mais informações"/>
                                    </div>
                                    <div style="width:150px; height:18px; margin-top:0px; margin-right:3px; float:right; font-size:10px; text-align:right;">Clique para visualizar</div>
                                </a>
								<div>
								<!-- INÍCIO CARRO CATEGORIA -->
                                <div id="1CollapsiblePanel1" class="CollapsiblePanel">
                                    <div class="CollapsiblePanelTab" tabindex="0">
            							<a class="ui-accordion-link_padrao acc2">
                                            <table width="589" border="0" cellpadding="4" cellspacing="4">
                                                <tr>
                                                    <td width="41"><img src="/images/<?php echo SITE;?>/bt_mais.jpg" alt="Veja mais informações" align="absmiddle" /></td>
                                                    <td width="50"><img src="img/locadora_288.jpg" alt="Mister Car" align="absmiddle" /></td>
                                                    <td width="170" valign="middle">Palio 1.0 ou similar</td>
                                                    <td width="120" valign="middle">Básico sem Ar</td>
                                                    <td width="58" valign="middle">Grupo A</td>
                                                    <td width="64" valign="middle"><span style="color:#000;"><strong>R$ 69,00</strong></span></td>
                                                </tr>
                                            </table>
                                        </a>
									</div>
                                    <div class="CollapsiblePanelContent">
                                        <div class="info_padrao">
                                            <img src="http://www.layum.com/_carros/admin/img/palio.jpg" alt="Palio 1.0" class="carro_left" />
                                            <ul class="info">
                                                <li><strong>Veículos: </strong>  - Palio 1.0 - Celta 1.0 - Gol 1.0 ou Similar</li>
                            
                                                <li><strong>Tarifa média diária:</strong> R$ 69,00</li>
                                                <li><strong>Categoria:</strong> Básico sem Ar</li>
                                                <li><strong>Grupo:</strong> A</li>
                                                <li><strong>Tipo de tarifa:</strong> Km livre + Prote&ccedil;&atilde;o Parcial do Carro</li>
                            
                                                <li><strong>Valor total com taxas:</strong> R$ 69,00</li>
                                                <li><strong>Forma de pagamento:</strong> 
                                                    <img src="http://www.carroaluguel.com/img/opcionais/visa_50.gif" width="50" height="21" align="absmiddle" /><img src="http://www.carroaluguel.com/img/opcionais/mastercard_50.gif" width="50" height="21" align="absmiddle" /><img src="http://www.carroaluguel.com/img/opcionais/american_50.gif" width="50" height="21" align="absmiddle" />                    </li>
                                                <li><strong>Parcelamento disponível:</strong> 
                                                    Sim                    </li>
                                                <li><strong>Número de parcelas:</strong> até 3x sem juros</li>
                            
                                                <li><strong>Valor de parcela mínima:</strong> R$ 35,00</li>
                                                <li><strong>Valor de caução:</strong> R$ 800,00</li>
                                            </ul>
                                            <a href="" title="Reservar" class="reserva_left" >
                                                <img src="/images/<?php echo SITE;?>/bt_reservar.jpg" alt="Reservar" />
                                            </a>
                                            <table width="589" border="0" cellpadding="4" cellspacing="4" class="tabela_reserva">
                                                <tr>
                                                    <td align="center">
                                                        <img src="/images/icon_01.jpg" alt="2 Portas" width="40" height="40" />
                                                    </td>
                                                    <td align="center">
                                                        <img src="/images/icon_06.jpg" alt="4 Portas" width="40" height="40" />
                                                    </td>
                                                    <td align="center">
                                                        <img src="http://www.carroaluguel.com/images/icon_02.jpg" alt="Cap. 5 pessoas" />
                                                    </td>
                                                    <td align="center">
                                                        <img src="http://www.carroaluguel.com/images/icon_03.jpg" alt="2 Malas grandes" />
                                                    </td>
                                                    <td align="center">
                                                        <img src="http://www.carroaluguel.com/images/icon_04.jpg" alt="2 Malas pequenas" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">2 Portas</td>
                                                    <td align="center">4 Portas</td>
                                                    <td align="center">Cap. 5 Pessoas</td>
                                                    <td align="center">2 Malas Grandes</td>
                                                    <td align="center">2 Malas Pequenas</td>
                                                </tr>
                                            </table>
                                            </div>
                                        <!-- FIM CARRO CATEGORIA -->
                                        </div>
                                    </div>
                                </div>
                            </div>        
								<script type="text/javascript">
                                    var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("1CollapsiblePanel1", {contentIsOpen:false});
                                </script>
                            </div>
							</li>
							<!-- FIM CATEGORIA -->
							</ul>
						</div>
					</div>
				</div>
			</div>
            <!-- FIM DETALHES PESQUISA -->
		</div>
        <!-- FIM CONTEÚDO RESULTADO PESQUISA-->
	</div>
<!-- FIM DIV PAGE -->
<?php $this->load->view(SITE.'/footer.php'); ?>