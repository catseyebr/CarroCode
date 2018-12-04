<?php $this->load->view(SITE.'/header'); ?>
<body class="topo_processo">
<!-- INÍCIO DIV PAGE -->
	<form name="confirma_locacao_form" id="confirma_locacao_form" action="/pesquisa/reservar" method="POST">
	<div id="page">
	<!-- INÍCIO TOPO -->
			<?php $this->load->view(SITE.'/topo');?>
            <!-- FIM TOPO -->
        	<!-- INÍCIO MENU -->
			<?php $this->load->view(SITE.'/menu');?>
        	<!-- FIM MENU -->
        	<!-- FIM MENU -->
    <!-- INÍCIO ESCOLHA LOCADORA -->
    	<div id="geral_escolha">
        <!-- INÍCIO BARRA PROCESSO -->
        	<div id="barra_processo">
            	<div id="escolha">
                	<strong>01</strong>
                    <p>Escolha a loja
                    	<span>Loja de retirada e devolução</span>

                    </p>
				</div>
                <div id="seguros">
                	<strong>02</strong>
                    <p>Escolha os seguros
                    	<span>Seguro, produtos e serviços adicionais</span>
					</p>
				</div>

                <div id="identificacao">
                	<strong>03</strong>
                    <p>Identificação
                    	<span>Realize seu login e senha</span>
                    </p>
				</div>
                <div id="ativo_finalizacao">
                	<strong>04</strong>

                    <p>Finalização
                    	<span>Conclua sua reserva</span>
					</p>
				</div>
			</div>
		<!-- FIM BARRA PROCESSO -->
        <div id="cliente_dados">
          <input type="hidden" id="cond_id_cliente" name="cond_id_cliente" value="7524 " />
        	<h3>Dados do cliente</h3>

            <ul>
                <li>
                	<strong>Nome:</strong> <?php echo $this->cliente->cpf_nome." ".$this->cliente->cpf_sobrenome;?> | 
                	<strong>CPF:</strong> <?php echo $this->cliente->cpf_numero;?>
                </li>
                <li>
                	<strong>Endereço:</strong> <?php echo $this->end_cliente->end_endereco.", ".$this->end_cliente->end_numero." - ".$this->end_cliente->end_complemento;?> | 
                    <strong>Bairro:</strong> <?php echo $this->end_cliente->end_bairro;?> | 
                    <strong>Cidade:</strong> <?php echo $this->end_cliente->city_nome;?> | 
                    <strong>Estado:</strong> <?php echo $this->end_cliente->uf_nome;?> | 
                    <strong>CEP:</strong> <?php echo $this->end_cliente->end_cep_codigo;?>
                </li>
				<li>
                	<?php foreach($this->contatos_cliente as $con){?>
                	<strong><?php echo $con->conref_nome;?>:</strong> <?php echo $con->con_value;?> | 
                    <?php } ?>
                </li>
            </ul>
            <h3>Dados do Condutor</h3>
            <div class="condutor" id="condutor_p">

              <ul>
              </ul>
              <button id="novo_condutor_p" class="novo_condutor" type="button">Cadastrar</button>
            </div>
            </div>
                   <div id="cliente_dados">
        	<h3>Informações da Chegada</h3>
            <p>A informação de chegada em aeroporto através de companhia aérea é fundamental para que a locadora saiba o horário e mantenha sua reserva no caso de atrasos. Se não houver a informação do voo, a reserva será mantida por apenas 1 hora em relação ao horário de retirada informado.</p>

            <p><strong><input name="sem_voo" type="checkbox" value="" onClick="mostra1()" />&nbsp;Não chegarei de avião / Não tenho informação de chegada no momento.</strong></p>
            <div id="campo1">
                <div id="dados_cli_3">
                    <ul>
                        <li><strong>Companhia A&eacute;rea: 
                        <select id="cia_aerea" name="cia_aerea" class="campo_estadoCidade validate[required]">
                        	<option value="">Escolha a Cia Aérea</option>
                            <option value="6M">Air Minas Linhas Aéreas</option>

                            <option value="AD">Azul Linhas Aéreas Brasileiras</option>
                            <option value="G3">Gol Transportes Aereos</option>
                            <option value="O6">Oceanair</option>
                            <option value="P8">Pantanal Linhas Aereas</option>
                            <option value="Y8">Passaredo Transportes Aéreos</option>
                            <option value="P9">Puma Air Linhas Aéreas</option>

                            <option value="C7">Rico Linhas Aereas</option>
                            <option value="R9">TAF Linhas Aéreas</option>
                            <option value="JJ">TAM Linhas Aereas</option>
                            <option value="TE">TEAM Linhas Aéreas</option>
                            <option value="8R">Trip Linhas Aereas</option>
                            <!-- <option value="T4">TRIP Linhas Aéreas</option> -->

                            <option value="RG">Varig Brasil</option>
                            <option value="WH">WebJet Linhas Aéreas</option>
                            <option value="n/a">--Cia Aérea não listada--</option>
                        </select>
                        </strong></li>
                    </ul>
                </div>

                <div id="dados_cli_4">
                    <ul>
                        <li><strong>N&uacute;mero do Voo: <input name="num_voo" id="num_voo" type="text" class="campo_std validate[required,custom[vooNumber]]" size="4" maxlength="4" onKeyUp="formatar_mascara(this, '####')"/></strong></li>
                    </ul>
                </div>
            </div>
		</div>
        
        <!-- INÍCIO ESCOLHA SEGURO -->

        <!-- FIM ESCOLHA LOCADORA -->
    	<!-- INÍCIO INFORMAÇÕES RESERVA -->
        	<div id="info_reserva">
            	<h3>Informações da reserva</h3>
                
                <div id="tabela_info">
                    <ul>
                        <li style="padding-top:3px; padding-bottom:3px;"><strong>Formas de pagamento:</strong>
                        <?php foreach ($this->tarifa_cotacao->locadora->formas_pagamento->forma as $frm_id => $frm_nome){?>
                    		<img src="/images/formas_pagamento/<?php echo $frm_id;?>_50.gif" width="50" height="21" align="absmiddle" />
                        <?php } ?></li>

                        <li><strong>Parcelamento:</strong> até <?php echo $this->tarifa_cotacao->locadora->formas_pagamento->parcelamento?>x sem juros</li>
                        <li><strong>Parcela mínima:</strong> <?php echo $this->tarifa_cotacao->locadora->formas_pagamento->parc_minima?></li>
                        <li><strong>Caução:</strong> <?php echo $this->tarifa_cotacao->grupo->caucao;?></li>
                        <li><strong>Franquia do carro:</strong> <?php echo $this->tarifa_cotacao->grupo->franquia;?></li>
                   		<li><strong>Franquia para terceiros:</strong> <?php echo $this->tarifa_cotacao->grupo->franquia_terceiros;?></li>
                        <li><strong>Total de Diárias: </strong><?php echo $this->tarifa_cotacao->diarias; if($this->tarifa_cotacao->diarias <= 1){echo " dia";}else{echo " dias";}?></li>
                		<li><strong>Tarifa média diária:</strong> R$ <?php echo number_format($this->tarifa_cotacao->diaria_media,'2',',','.');?></li>
                        <li><strong>Valor total das diárias:</strong> <?php echo number_format($this->tarifa_cotacao->valor_diarias,'2',',','.');?></li>

                		<li><strong>Proteção:</strong><?php if($this->tarifa_cotacao->valor_protecao != 0){ ?>
                    	Valor Proteção: R$ <?php echo number_format($this->tarifa_cotacao->valor_protecao,'2',',','.');?>
                    <?php }else{?>
                    	Valor Proteção: Valor da proteção já incluído no valor da diária
                    <?php }?>
  </li>
  				                <li><strong>Taxa (<?php echo $this->tarifa_cotacao->taxa;?>%):</strong> R$ <?php echo number_format($this->tarifa_cotacao->valor_taxas,'2',',','.');?></li>
                <li><strong>Valor Total:</strong> R$ <?php echo number_format($this->tarifa_cotacao->valor_total,'2',',','.');?></li>

                    </ul>
                </div>
                <div id="veiculos_disponiveis">
                	<div id="escolha_logo" style="width:350px;">
            	<strong>Locadora escolhida:</strong>
                <img src="/images/locadoras/medium_locadora_<?php echo $this->tarifa_cotacao->locadora->id;?>.jpg" alt="<?php echo $this->tarifa_cotacao->locadora->nome;?>" align="absmiddle" />
				</div>
                	<h4>&nbsp;</h4>

                	<div id="title_veicleft">Veículos do grupo <?php echo $this->tarifa_cotacao->grupo->nome;?></div>
                  	<div id="title_veicright">Categoria:<?php echo $this->tarifa_cotacao->grupo->categoria_nome;?></div>
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
                                                                          </tr>
                                </table>
                                 <h5>&nbsp;</h5>
                    
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
            <div id="lojas_seguro">
            	<div id="loja_retirada">

                	<ul>
                    	<li class="first"><strong>Loja de Retirada:</strong> Aeroporto Internacional Afonso Pena</li>
                        <li class="horas">Data/Hora da Retirada: 04/10/2010 12:00:00</li>
                        <li><strong>Endereço:</strong> Av. Cmte. José Paulo Lipinski, 881</li>
                        <li><strong>Bairro:</strong> Jardim Aeroporto</li>

                        <li><strong>Cidade:</strong> Curitiba</li>
                        <li><strong>Estado:</strong> PR</li>
                        <li><strong>Observações:</strong> Nenhuma observação</li>
					</ul>

				</div>
                <div id="loja_devolucao">
                	<ul>
                    	<li class="first"><strong>Loja de Devolução:</strong> Aeroporto Internacional Afonso Pena</li>
                        <li class="horas">Data/Hora da Devolução: 05/10/2010 12:00:00</li>
                        <li><strong>Endereço:</strong> Av. Cmte. José Paulo Lipinski, 881</li>

                        <li><strong>Bairro:</strong> Jardim Aeroporto</li>
                        <li><strong>Cidade:</strong> Curitiba</li>
                        <li><strong>Estado:</strong> PR</li>
                        <li><strong>Observações:</strong> Nenhuma observação</li>

					</ul>
                    
                    			</div>
            
		</div>
       	<!-- FIM INFORMAÇÕES RESERVA -->
        <!-- INÍCIO JÁ INCLUSA-->
        <div id="protecao_inclusa">
        	<h3>Proteção:</h3>
            <strong>                Valor da prote&ccedil;&atilde;o j&aacute; inclu&iacute;da no valor da di&aacute;ria
            </strong>

            <p><span>Hertz</span>
            As tarifas apresentadas  incluem: A) Proteção total ao veículo (LDW) em caso de colisão, incêndio, roubo, furto e perda total, com participação obrigatória do cliente, de acordo com o grupo do veículo locado: R$ 1.000,00 – do grupo A ao D; R$ 2.000,00 – demais grupos; B) Proteção a terceiros com cobertura até o limite de R$ 40.000,00 para danos materiais e R$ 40.000,00 para danos corporais por ocorrência. As proteções somente serão válidas, caso não ocorra nenhuma infração das cláusulas contratuais do Contrato Público de Locação de Veículos (que encontra-se disponível para consulta, em todas as lojas Hertz) e mediante apresentação do Boletim de Ocorrência (sem a apresentação do mesmo, as proteções não se aplicam).             </p>
		</div>
        <!-- FIM JÁ INCLUSA-->
        <div id="info_importante">
       	  <h3>Importante</h3>
                <ol type="a">

                	<li>O condutor deverá ser o titular do cartão de crédito.</li>
                    <li>O pagamento através de cartão de crédito será realizado diretamente na loja, no momento da retirada do veículo.</li>
                    <li>Taxa de retorno poder&aacute; ser aplicada no caso de devolu&ccedil;&atilde;o do ve&iacute;culo em cidades diferentes da cidade de retirada: variam entre R$0,80 a R$ 0,96 por km rodado.</li>
                </ol>
        </div>

        <div id="protecao_inclusa">
        	<h3>Termos e condições gerais de locação</h3>
            <div style="height:150px; overflow:auto; border: solid 1px #09F">
           	  <p><strong>Loca&ccedil;&atilde;o</strong></p>
                <p>Os ve&iacute;culos s&atilde;o   reservados por grupo e n&atilde;o por marca ou modelo. </p>

                <p> Se,   por ocasi&atilde;o da loca&ccedil;&atilde;o do ve&iacute;culo, o grupo reservado n&atilde;o estiver dispon&iacute;vel, o   cliente poder&aacute; receber um ve&iacute;culo de grupo superior, sem nenhum custo   adicional.</p>
                <p><strong>Exig&ecirc;ncias   para Loca&ccedil;&atilde;o</strong></p>

                <p>1.1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Idade   M&iacute;nima: 21 anos; </p>
                <p>1.2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Possuir carteira de habilita&ccedil;&atilde;o h&aacute; pelo menos 2 anos; </p>
                <p>1.3 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Apresentar CPF e RG;</p>

                <p>1.4 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Apresentar, impreterivelmente, um cart&atilde;o de cr&eacute;dito, onde:</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; a)   O locat&aacute;rio/condutor dever&aacute; ser o titular do cart&atilde;o de cr&eacute;dito   apresentado;</p>

                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b)   A t&iacute;tulo de garantia, a locadora solicitar&aacute; valor cau&ccedil;&atilde;o no momento da retirada   do ve&iacute;culo, realizando o bloqueio ou d&eacute;bito no cart&atilde;o de cr&eacute;dito informado, no   valor aproximado de 30% sobre o valor total da locação (mínimo R$ 700,00)                                    . Este valor cau&ccedil;&atilde;o ser&aacute; devolvido/desbloqueado ao cart&atilde;o de cr&eacute;dito   do cliente ao final da loca&ccedil;&atilde;o.</p>

                <p>1.5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Loca&ccedil;&atilde;o sujeita a confirma&ccedil;&atilde;o das informa&ccedil;&otilde;es cadastrais; </p>
                <p>1.6 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O   valor da di&aacute;ria inclui kilometragem livre;</p>
                <p>1.7 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Est&atilde;o   inclu&iacute;das na di&aacute;ria o valor da prote&ccedil;&atilde;o e taxas administrativas   informadas;</p>

                <p>1.8 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N&atilde;o   est&atilde;o inclu&iacute;dos na di&aacute;ria e ser&atilde;o cobrados a parte: multas de tr&acirc;nsito, combust&iacute;vel e   produtos e servi&ccedil;os opcionais. A cobran&ccedil;a de taxa aeroportu&aacute;ria poder&aacute; ser   aplicada em algumas localidades; </p>

                <p>1.9 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ap&oacute;s   59 minutos do hor&aacute;rio estipulado para devolu&ccedil;&atilde;o do ve&iacute;culo, ser&aacute; cobrada taxa estipulada pela locadora para   cada hora adicional; </p>
                <p>1.10 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O   Locat&aacute;rio poder&aacute; declarar e pagar a taxa para motorista adicional no momento do   aluguel do ve&iacute;culo, indispens&aacute;vel para efeito de seguro. Motoristas adicionais est&atilde;o sujeitos &agrave;s mesmas   regras do locat&aacute;rio no que se refere &agrave; idade do condutor, tempo de habilita&ccedil;&atilde;o e apresenta&ccedil;&atilde;o de documentos. A locadora se reserva no direito de cobrar taxas por motorista adicional. </p>

                <p>1.11 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Caso o   ve&iacute;culo n&atilde;o seja devolvido na loja da cidade em que o mesmo foi retirado, haver&aacute; a possibilidade de cobran&ccedil;a de taxa de devolu&ccedil;&atilde;o. </p>
                <p>1.12 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Multas de tr&acirc;nsito, avarias ou danos causados ao ve&iacute;culo locado ser&atilde;o consideradas extras e n&atilde;o est&atilde;o inclusas na tarifa, bem como taxas administrativas para cobran&ccedil;as referentes a esses itens.</p>

                <p>1.13 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  A exist&ecirc;ncia de restri&ccedil;&otilde;es contidas em   consulta aos org&atilde;os SPC e Serasa, em nome do locat&aacute;rio e/ou condutor adicional,   poder&atilde;o ser verificadas pelas locadoras autorizando ou n&atilde;o a libera&ccedil;&atilde;o da   loca&ccedil;&atilde;o.</p>
            </div>
            <p style="padding-left:0px;"><strong style="color:#000"><input class="validate[required] checkbox" type="checkbox"  id="agree"  name="agree"/>

&nbsp;Li e aceito os termos e condições</strong></p>
        </div>
        <!-- INÍCIO BOTÃO E INDIQUE -->
        <div id="container_botao">
           	<input id="id_locadora" name="id_locadora" type="hidden" value="1" />
            <input id="id_loja_retirar" name="id_loja_retirar" type="hidden" value="33" />
            <input id="id_loja_devolver" name="id_loja_devolver" type="hidden" value="33" />
            <input id="id_grupo" name="id_grupo" type="hidden" value="1" />
            <input id="id_protecao" name="id_protecao" type="hidden" value="33" />

            <input id="id_emissor" name="id_emissor" type="hidden" value="7524" />
            <input id="data_retirar" name="data_retirar" type="hidden" value="2010-10-04" />
            <input id="hora_retirar" name="hora_retirar" type="hidden" value="12:00:00" />
            <input id="data_devolver" name="data_devolver" type="hidden" value="2010-10-05" />
            <input id="hora_devolver" name="hora_devolver" type="hidden" value="12:00:00" />
            <input id="diarias" name="diarias" type="hidden" value="1" />
            <input id="hora_extra" name="hora_extra" type="hidden" value="0" />
            <input id="valor_diarias" name="valor_diarias" type="hidden" value="74.00" />
            <input id="valor_taxas" name="valor_taxas" type="hidden" value="8.07" />

            <input id="valor_protecao" name="valor_protecao" type="hidden" value="0.00" />
            <input id="op_gps" name="op_gps" type="hidden" value="0.00" />
            <input id="op_entrega" name="op_entrega" type="hidden" value="" />
            <input id="op_cadeira" name="op_cadeira" type="hidden" value="" />
            <input id="op_condutor" name="op_condutor" type="hidden" value="" />
            <input id="ca_conjuge" name="ca_conjuge" type="hidden" value="" />
            <input id="valor_total" name="valor_total" type="hidden" value="82.07" />
            <input id="promocao_diaria" name="promocao_diaria" type="hidden" value="0" />
            <input id="pagamento" name="pagamento" type="hidden" value="Cartão de Crédito" />

            <input id="rate_qual" name="rate_qual" type="hidden" value="" />
            <input id="continuar" type="image" src="/images/<?php echo SITE;?>/bt_continuar.jpg" class="bt_cont" />
       </div>
        <!-- FIM BOTÃO E INDIQUE -->
	</div>
<!-- FIM ESCOLHA SEGURO-->
</div>
 </form>
<!-- FIM DIV PAGE -->
<img src="http://clicklogger.rm.uol.com.br/linkspatrocinados/?prd=76&grp=id.user.links:141245156;desc.label.links:confirma_locacao;financial.value.links:82.07&msr=msr:1&oper=8" height="1px" width="1px"/>
<?php $this->load->view(SITE.'/footer.php'); ?>