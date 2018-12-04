<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">

<head>
<title><?php echo $this->loja->meta_title; ?></title>
<script src="/js/jquery-plus-jquery-ui.js" type="text/javascript"></script>
<script src="/js/jtip.js" type="text/javascript"></script>
<script src="/js/site.js" type="text/javascript"></script>
<script src="/js/flash.js" type="text/javascript"></script>
<script src="/js/smooth.pack.js" type="text/javascript"></script>
<!-- Start Google Maps //-->
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAABk4cCH4Mo8rd0JDAUB62mRScnT9qiWB1A-UAZ20OGyLdA1t7fRSh6-V0xrfrSHICWPSiMLd2owh4Kw" type="text/javascript"></script>
<!-- End Google Maps //-->
<SCRIPT type=text/JavaScript>
function changewidth(x){
 e=document.getElementById("map");
 e.style.width = x + 'px';
  t=setTimeout("changewidth();",0);
}

function changeheight(y){
 e=document.getElementById("map");
 e.style.height = y + 'px';
  t=setTimeout("changeheight();",0);
}
</SCRIPT>
<meta http-equiv="Content-Type"  content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $this->loja->meta_description; ?>" />
<meta name="keywords" content="<?php echo $this->loja->meta_keywords; ?>" />
<meta name="title" content="<?php echo $this->loja->meta_title; ?>" />
<meta name="language" content="pt-br" />
<link rel="stylesheet" type="text/css" href="/css/estilo.php">
<link rel="stylesheet" type="text/css" href="/<?php echo $this->_view_path; ?>/css/estilo_locadora.css">
</head>
<body class="topo_internas" >
<!-- INÍCIO DIV PAGE -->
	<div id="page">
        <!-- INÍCIO TOPO -->
        <?php include $server_prefix_url."./header.php";?>
        <!-- FIM TOPO -->
        <!-- INÍCIO MENU -->
        <?php include $server_prefix_url."./menu.php";?>
        <!-- FIM MENU -->
        <!-- INÍCIO LOCADORAS -->
        <div id="geral_locadoras">
        	<!-- INÍCIO TOPO LOCADORAS -->
			<div id="topo_locadora">
            	<h2>Locadora <?php echo $this->dados_gerais->meta_title;?> - Aluguel de Carros</h2>
			</div>
            
			<!-- FIM TOPO LOCADORAS -->
            <?php if ($this->loja->lat_geocode !="" && $this->loja->long_geocode !=""){?>
            <div id="map" style="width: 862px; height: 200px" onmouseover="changewidth(862), changeheight(200)" onmouseout="changewidth(862), changeheight(50)"></div>
            <div><strong>Passe o mouse sobre o mapa para expandir</strong></div>
            <?php } ?>
            <!-- INÍCIO LOJAS -->
            <div id="titulo_lojas">
                <a name="lojas" id="lojas"></a>
                <h3><?php echo $this->loja->nome; ?></h3>
            </div>
            <div class="container_lojas">
                <div class="lojas_locadoras">
                	<?php if ($this->loja->sigla == "1") { ?>
                    	<img src="/images/icon_aviao.jpg" alt="Loja <?php echo $this->dados_gerais->locadora; ?> em <?php echo $this->loja->nome; ?>" class="icones_lojas" />
                    <?php } else {?>
                    	<img src="/images/icon_casa.jpg" alt="Loja <?php echo $this->dados_gerais->locadora; ?> no bairro <?php echo $this->loja->bairro; ?>" class="icones_lojas" />
                    <?php }?>
                    <p>
                        <strong><?php echo $this->loja->nome; ?></strong>
                        <?php echo $this->loja->endereco; ?> - Bairro: <?php echo $this->loja->bairro; ?> - Cidade: <?php echo $this->loja->cidade; ?> - Estado: <?php echo $this->loja->estado; ?>
                        <span>Horários de Funcionamento:</span>
                        de Segunda à Sexta-Feira: das <?php echo $this->loja->hora_ini; ?>hs às <?php echo $this->loja->hora_fim; ?>hs<br />
                        aos Sábados:
						<?php if ($this->loja->sab == "1") { ?>
                        	das <?php echo $this->loja->hora_ini_sab; ?>hs  às 
							<?php echo $this->loja->hora_fim_sab; ?>hs <?php } else { ?>fechado<?php } ?><br />
                        aos Domingos e Feriados: 
						<?php if ($this->loja->dom == "1") { ?>
                          	das <?php echo $this->loja->hora_ini_dom; ?>hs  às 
							<?php echo $this->loja->hora_fim_dom; ?>hs <?php } else { ?>fechado<?php } ?>
                    </p>
                </div>
                <div class="reserva_locadora">
                    <a href="/index.php?cidade_definida=<?php echo $this->loja->cidade;?>&amp;seleciona_locadora=<?php echo $this->dados_gerais->locadora?>"><img src="/images/bt_gr.jpg" alt="CarroAluguel.com" /></a>
                </div>
            </div>
            <!-- FIM LOJAS -->
            <!-- INÍCIO BARRA MENU -->
            <div id="container_menu_locadora">
            	<a name="menu_locacao" id="menu_loca"></a>
            	<div id="menu_locadora">
            		<a href="#tarifas" title="Confira os valores" class="tar">Tarifas</a>
            		<a href="#quem" title="Conheça a locadora" class="desc">Descrição da Locadora</a>
                	<a href="#protecao" title="Produtos" class="seg">Seguros/Proteções</a>
                </div>
			</div>
            <!-- FIM BARRA MENU -->
            <!-- INÍCIO TARIFA -->
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
                        	<td><img src="/images/linha_locadora.gif" alt="CarroAluguel.com" /></td>
						</tr>
                        <?php 
						$tabela_class = 0;
						for ($i = 0, $s = count($this->grupos); $i < $s; $i++) { ?>
                        <tr>
                        	<td>
                            	<table width="100%" border="0" cellpadding="5" cellspacing="5" class="<?php if ($tabela_class==0){echo "tabela_claro";}else{echo "tabela_escura";} ?>">
                                	<tr id="<?php echo $this->grupos[$i]->grupo; ?>">
                                    	<td width="39" align="center"><?php echo $this->grupos[$i]->grupo; ?></td>
                                        <td width="165">
                                        	<?php echo $this->grupos[$i]->modelo_1; 
											if ($this->grupos[$i]->modelo_2 != "") { echo ", "; }
											echo $this->grupos[$i]->modelo_2; 
											if ($this->grupos[$i]->modelo_3 != "") { echo ", "; }
											echo $this->grupos[$i]->modelo_3;
											if ($this->grupos[$i]->modelo_4 != "") { echo ", "; }
											echo $this->grupos[$i]->modelo_4;
											if ($this->grupos[$i]->modelo_5 != "") { echo ", "; }
											echo $this->grupos[$i]->modelo_5; echo ", ou similar"; ?>
                      					</td>
                                        <td width="145">
                                        	<?php if ($this->grupos[$i]->duas_portas == "1") { ?>
                                        	<img src="/images/opcionais/2p.gif" alt="CarroAluguel.com" />
                                            <?php } 
											if ($this->grupos[$i]->quatro_portas == "1") { ?>
                                            <img src="/images/opcionais/4p.gif" alt="CarroAluguel.com" />
                                            <?php } 
											if ($this->grupos[$i]->dh == "1") { ?>
                                            <img src="/images/opcionais/dh.gif" alt="CarroAluguel.com" />
                                            <?php } 
											if ($this->grupos[$i]->ac == "1") { ?>
                                            <img src="/images/opcionais/ac.gif" alt="CarroAluguel.com" />
                                            <?php } 
											if ($this->grupos[$i]->te == "1") { ?>
                                            <img src="/images/opcionais/te.gif" alt="CarroAluguel.com" />
                                             <?php } 
											 if ($this->grupos[$i]->cd == "1") { ?>
                                            <img src="/images/opcionais/cd.gif" alt="CarroAluguel.com" />
                                            <?php } ?>
										</td>
                                        <td width="70">R$ <?php echo $this->grupos[$i]->diaria; ?></td>
                                        <td width="70">R$ <?php echo $this->grupos[$i]->semanal; ?></td>
                                        <td width="70">R$ <?php echo $this->grupos[$i]->quinzenal; ?></td>
                                        <td width="70"><?php if($this->grupos[$i]->mensal != ''){echo "R$ ".$this->grupos[$i]->mensal;}else{echo "Consulte"; } ?></td>
                                        <td width="70"><?php if($this->grupos[$i]->valor_caucao_real != ''){echo "R$ ".$this->grupos[$i]->valor_caucao_real;}else{echo "Consulte"; } ?></td>
                                        <td width="90">
                                            <a href="/index.php?seleciona_locadora=<?=$this->dados_gerais->locadora?>&seleciona_categoria=<?=$this->grupos[$i]->categoria;?>" title="Reservar esta locação">
                                            <img src="/images/bt_reservar_locadora.gif" alt="Reservar esta locação" />
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
            <!-- INÍCIO LEGENDA -->
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
                            <td align="center"><img src="/images/icon_2portas.gif" alt="CarroAluguel.com" /></td>
                            <td align="center"><img src="/images/icon_4portas.gif" alt="CarroAluguel.com" /></td>
                            <td align="center"><img src="/images/icon_ar.gif" alt="CarroAluguel.com" /></td>
                            <td align="center"><img src="/images/icon_direcao.gif" alt="CarroAluguel.com" /></td>
                            <td align="center"><img src="/images/icon_trio.gif" alt="CarroAluguel.com" /></td>
                            <td align="center"><img src="/images/icon_cd.gif" alt="CarroAluguel.com" /></td>
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
                            <td align="center"><img src="/images/icon_km.gif" alt="CarroAluguel.com" /></td>
                            <td align="center"><img src="/images/icon_tarifa.gif" alt="CarroAluguel.com" /></td>
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
            <!-- INÍCIO IMPORTANTE -->
            <div id="importante_locadoras">
                <h3>Importante</h3>
                <p>
                    <?php echo $this->dados_gerais->mais_info; ?>
                </p>
                <p>
                    Acrescentar  taxas de <?php echo $this->dados_gerais->taxas; ?>% para retirada em lojas e  <?php echo $this->dados_gerais->taxas_aero; ?>% para retirada em aeroportos.<br />
                    Valores sujeitos a alterações sem prévio aviso.
                </p>
            </div>
            <!-- FIM IMPORTANTE -->
            <!-- INÍCIO CONHEÇA AS PROTEÇÕES -->
            <div id="titulo_protecao">
                <a name="protecao" id="protecao"></a>
                <h3>Conheça as Proteções</h3>
                <a href="#menu_locacao" title="Volte ao menu" class="volta">voltar ao topo</a>
            </div>
            <?php for ($i = 0, $s = count($this->protecoes); $i < $s; $i++) { ?>
            <div class="container_protecoes">
                <h4>Proteção: <?php echo $this->protecoes[$i]->protecao; ?></h4>
                <p>
                    <strong>Grupos Participantes:</strong>
                    <?php echo trim($this->protecoes[$i]->grupos, ","); ?>
                </p>
                <p>
                    <strong>Descrição:</strong>
                    <?php echo $this->protecoes[$i]->descricao; ?>
                </p>
                <p>
                    <strong>Valor da Proteção ao dia:</strong>
                    <?php if ($this->protecoes[$i]->valores[0]->valor_protecao_valores > "0") { ?>
                      R$ <?php echo $this->protecoes[$i]->valores[0]->valor_protecao_valores;?>
                    <?php } else { ?>
                      Valor da prote&ccedil;&atilde;o inclu&iacute;da no valor da di&aacute;ria
                    <?php } ?>
                </p>
            </div>
            <?php } ?>
            <!-- FIM CONHEÇA AS PROTEÇÕES -->
            
            <?php if ($this->dados_gerais->texto_livre_locadoras != ''){?>
            <!-- INÍCIO QUEM SOMOS -->
            <div id="titulo_somos">
                
                <h3>Conheça um pouco mais da <?php echo $this->dados_gerais->link_titulo; ?></h3>
                <a href="#menu_locacao" title="Volte ao menu" class="volta">voltar ao topo</a><a name="quem" id="quem" class="volta"></a>
            </div>
            <div id="conteudo_somos">
                <?php echo $this->dados_gerais->texto_livre_locadoras; ?>
            </div>
            <!-- FIM QUEM SOMOS -->
            <?php } ?>
        </div>
        <!-- FIM LOCADORAS -->
    </div>
        <!-- FIM DIV PAGE -->
    <!-- INÍCIO RODAPÉ -->
	<div id="rodape">
    	<div id="container_rodape">
        	<?php include "./footer.php"; ?>
        </div>
	</div>
	<!-- FIM RODAPÉ -->
    <script type="text/javascript">
    //<![CDATA[
   var geocoder;
   var map;
   // On page load, call this function
   function load(address)
   {
      // Create new map object
      map = new GMap2(document.getElementById("map"));
      // Create new geocoding object
      geocoder = new GClientGeocoder();
      // Retrieve location information, pass it to addToMap()
      geocoder.getLocations(address, addToMap);
   }
   // This function adds the point to the map
   function addToMap(response)
   {
      // Retrieve the object
      place = response.Placemark[0];
      // Retrieve the latitude and longitude
      point = new GLatLng(<?php echo $this->loja->lat_geocode;?>,
                          <?php echo $this->loja->long_geocode;?>);
	  // Center the map on this point
      map.setCenter(point, 15);
      // Create a marker
      marker = new GMarker(point);
      // Add the marker to map
      map.addOverlay(marker);
	  map.addControl(new GMapTypeControl());
   }
    //]]>
	load('<?php echo $this->loja->endereco." - ".$this->loja->cidade.", ".$this->loja->estado; ?>');
	changewidth(862);
	changeheight(50);
    </script>
    
</body>
</html>