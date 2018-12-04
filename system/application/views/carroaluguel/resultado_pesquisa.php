<?php $this->load->view(SITE.'/header'); 
$xml_assincrono_js_str = '';
$js_menores_valores = '';
?>
<body class="topo_inter">
<!-- INÍCIO DIV PAGE -->
	<div id="preloader">
    	<div id="inner_pre">
        	Por favor, aguarde... Estamos processando sua solicitação.
        </div>
    </div>
	<div id="full_page">
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
                    <img src="http://clicklogger.rm.uol.com.br/linkspatrocinados/?prd=76&grp=id.user.links:141245156;desc.label.links:pesquisa;financial.value.links:0&msr=msr:1&oper=8" height="1px" width="1px"/>
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
            	<!-- INÍCIO RESULTADO DA COMPARAÇÃO -->
				<div id="container_comparacao">
					<div id="detalhes_pesquisa_comparacao">
               	  		<div id="abas_pesquisa_comparacao">
							<span>Comparação</span>
							<a href="/pesquisa/grupo" title="Pesquise por grupo">Por Grupo</a>
							<a href="/pesquisa/locadora" title="Pesquise por locadora" class="locadora">Por Locadora</a>
						</div>
                        <div id="legenda" style="padding:10px 10px 10px 10px; width:828px; background-color:#F6F6F6; border-left: solid 1px #CCC; border-right: solid 1px #CCC">
							<ul>
               	      			<li style="text-align:center"><img src="/images/<?php echo SITE;?>/rsv_on.gif" alt="" width="19" height="19" align="absmiddle" />&nbsp;<strong>Confirmação imediata.</strong> &nbsp;<img src="/images/<?php echo SITE;?>/rsv_on_blue.gif" alt="" width="19" height="19" align="absmiddle" />&nbsp;<strong>Requer processamento de nossa equipe em horário comercial, resposta em 30 minutos.</strong></li>
                            </ul>
                      	</div>
                        <?php if($this->disponibilidade_nula == FALSE){
								if($this->disponiveis->diarias <= 30){ ?>
						<div id="geral_detalhes_comparacao">
                        	<div id="container_blocos">
                           		<!-- INÍCIO PÁGINAÇÃO E MARCAS -->
								<div class="paginacao_comparacao2" style="overflow:auto">
    								<a href="#" title="Próxima Página" class="mais_comparacao lk_prox">
										<img src="/images/<?php echo SITE;?>/bt_proxima.jpg" alt="Próxima Página" />
                                    </a>
    								<ul>
                                        <li>Foram encontradas:</li>
                                        <li><strong><?php echo $this->locadoras->quant ?> locadoras na pesquisa,</strong></li>
                                        <li>para o per&iacute;odo e hor&aacute;rio informados.</li>
                                	</ul>
									<a href="#" title="Página Anterior" class="mais_comparacao lk_ant">
    								<img src="/images/<?php echo SITE;?>/bt_voltar.jpg" alt="Página Anterior" /></a>
    								<ul style="margin:0px 0px 0px 100px; padding-right:143px;">
    									<li><strong>Páginas: </strong></li>
										<?php 
                                            $k=0;
                                            $m=1;
                                            $n=$this->locadoras->quant/6;
                                            while($k<$n){
                                            $l=$n
                                        ?>
       									<li>
										<?php if($m + 5 > $this->locadoras->quant){$var1=$this->locadoras->quant;}else{$var1=$m+5;} ?>
											<a href="" class="lk_exibir ex_<?php echo $m."_".($var1); ?>">
      									<?php echo $m." - ".($var1); ?></a>
        								</li>
                                        <li>|</li>
										<?php 
                                            $k = $k + 1;
                                            $m = $m + 6;
                                        } ?>
                                    </ul>
								</div>
								<div id="resultados_pesquisa_comparacao">
									<div class="topo_locadoras2 cima">
										<div class="show_categorias cima">
      										<img src="/images/<?php echo SITE;?>/seta_cima.jpg" alt="Categorias">
    									</div>
    									<div class="numeracao_comparacao2">
        									<ul>
												<?php 
                                                    $pagN = 1;
                                                    while($pagN <= $this->locadoras->quant){
                                                ?>
            									<li <?php if($pagN == $this->locadoras->quant){echo "class='last'";} ?>>
													<?php echo $pagN;?>
            									</li>
            									<?php $pagN++;} ?>
        									</ul>
   										</div>
    									<div class="marca_cima2">
        									<ul>
												<?php $j=1;
                                                    foreach($this->disponiveis->locadoras_disponiveis as $locadorasDispon => $value_loc){?>
												<li><img src="/images/locadoras/locadora_<?php echo $locadorasDispon; ?>.jpg" alt="<?php echo $value_loc['loc_nomelocadora'] ?>"/></li>
												<?php $j++;}?>
											</ul>
    									</div>
									</div>
									<!-- FIM PÁGINAÇÃO E MARCAS -->
									<?php
										if($this->disponiveis->locadoras_disponiveis != 'Nenhuma locadora disponível no local e horários informados'){
										foreach($this->disponiveis->grupos_disponiveis as $cat => $cat_value){
										$i = 1;
									?>
									<!-- INÍCIO PREÇOS -->
									<div class="container_precos2">
    									<div class="categorias_precos" id="<?php echo $this->disponiveis->categorias_disponiveis[$cat]->classe;?>">
        									<strong><?php echo $this->disponiveis->categorias_disponiveis[$cat]->nome;?></strong>
        									<img src="/images/categorias/cat_<?php echo $cat; ?>.jpg" alt="" /><br />
											<a href="#" class="ordenar">Ordenar por pre&ccedil;o</a>
   										</div>   
   										<div class="sub_container_precos2">
										<?php 
                                            $menor_valor = 1000;
                                            foreach($cat_value as $loc_id => $loc_value){ 
                                                if($loc_value != 'Categoria não disponível'){
                                                    if(reset($loc_value)->tarifas->valor_total < $menor_valor){
                                                        $menor_valor = reset($loc_value)->tarifas->valor_total;
                                                        $menor_valor_id = $i."_".reset($loc_value)->tarifas->grupo->id;
                                                    }
                                                    if(reset($loc_value)->tarifas->valor_total == $menor_valor){
                                                        $menor_valor = reset($loc_value)->tarifas->valor_total;
                                                        $menor_valor_id2 = $i."_".reset($loc_value)->tarifas->grupo->id;
                                                    }
                                        ?>
    										<div class="preco_compativo " id="<?php echo $this->disponiveis->categorias_disponiveis[$cat]->classe."_".$loc_id;?>">
        										<ul class="" id="<?php echo $i."_".reset($loc_value)->tarifas->grupo->id; ?>">
        											<li class="precos">R$ <?php echo number_format(reset($loc_value)->tarifas->diaria_media, '2',',','.');?><span>/ Dia</span></li>
													<li class="total_comp">Preço total:</li>
            										<li class="total_comp">R$ <?php echo number_format(reset($loc_value)->tarifas->valor_total, '2',',','.');?></li>
                									<li><a style="text-decoration:none; color:#334499" href="<?php echo "/pesquisa/seleciona-seguro/".reset($loc_value)->tarifas->grupo->id."/".reset($loc_value)->tarifas->protecao->id."/".$this->dadosPesquisa->dataRetirada."/".$this->dadosPesquisa->dataDevolucao."/".$this->disponiveis->locadoras_disponiveis[$loc_id]['loj_id']."/".$this->disponiveis->locadoras_disponiveis[$loc_id]['loj_id']."/".$this->disponiveis->cidadeRetirada."/".$this->disponiveis->cidadeDevolucao."/opc";?>" title="Solicitar Reserva"><img src="/images/<?php echo SITE;?>/rsv_on_blue.gif" width="19" height="19" alt="Solicitar Reserva" align="absmiddle" />&nbsp;SOLICITAR</a></li>
        										</ul>
    										</div>
										<?php }else{ ?>
											<div class="preco_compativo " id="<?php echo $this->disponiveis->categorias_disponiveis[$cat]->classe."_".$loc_id;?>">
                                                <ul>
                                                    <li class="nao_dispo"><img src="/images/<?php echo SITE;?>/rsv_onunvail.gif" width="19" height="19" alt="Reservar Online" align="absmiddle" />&nbsp;<span>INDISPONÍVEL</span></li>
                                                </ul>
    										</div>
										<?php }$i++;} 		
										$js_menores_valores .= "document.getElementById('" . $menor_valor_id . "').className = 'menor_preco';
";
										$js_menores_valores .= "document.getElementById('" . $menor_valor_id2 . "').className = 'menor_preco';
";?>
										</div>
									</div>
									<?php }?>
									<!-- FIM PREÇOS -->
								<?php } ?>
								<!-- INÍCIO PÁGINAÇÃO E MARCAS -->
									<div class="topo_locadoras2 baixo">
    									<div class="marca_cima2">
        									<ul>
										   <?php foreach($this->disponiveis->locadoras_disponiveis as $locadorasDispon => $value_loc){?>
												<li><img src="/images/locadoras/locadora_<?php echo $locadorasDispon; ?>.jpg" alt="<?php echo $value_loc['loc_nomelocadora'] ?>"/></li>
											<?php }?>
                                            </ul>
										</div>
    									<div class="numeracao_comparacao2">
        									<ul>
												<?php 
                                                    $pagN = 1;
                                                    while($pagN <= $this->locadoras->quant){
                                                ?>
            									<li <?php if($pagN == $this->locadoras->quant){echo "class='last'";} ?>>
													<?php echo $pagN;?>
            									</li>
            									<?php $pagN++;} ?>
        									</ul>
    									</div>
     									<div class="show_categorias baixo">
      										<img src="/images/<?php echo SITE;?>/seta_baixo.jpg" alt="Categorias">
    									</div> 
									</div>
								</div>
								<div class="paginacao_comparacao" style="overflow:auto">
    								<a href="#" title="Próxima Página" class="mais_comparacao lk_prox">
									<img src="/images/<?php echo SITE;?>/bt_proxima.jpg" alt="Próxima Página" /></a>
									<ul>
										<li>Foram encontradas:</li>
        								<li><strong><?php echo $this->locadoras->quant ?> locadoras na pesquisa</strong></li>
    								</ul>
    								<a href="#" title="Página Anterior" class="mais_comparacao lk_ant">
    								<img src="/images/<?php echo SITE;?>/bt_voltar.jpg" alt="Página Anterior" /></a>
    								<ul style="margin:0px 0px 0px 100px; padding-right:143px;">
    									<li><strong>Páginas: </strong></li>
									<?php 
                                        $k=0;
                                        $m=1;
                                        $n=$this->locadoras->quant/6;
                                        while($k<$n){
                                        	$l=$n
                                    ?>
                                        <li>
                                <?php if($m + 5 > $this->locadoras->quant){$var1=$this->locadoras->quant;}else{$var1=$m+5;} ?>
                                    <a href="" class="lk_exibir ex_<?php echo $m."_".($var1); ?>">
                              <?php echo $m." - ".($var1); ?></a>
                                        </li><li>|</li>
                                    <?php 
                                        $k = $k + 1;
                                        $m = $m + 6;
                                    } ?>
    								</ul>
								</div>
								<!-- FIM PÁGINAÇÃO E MARCAS -->
<?php
foreach ($this->disponiveis->vet_ordem_valores as $key => $row) {
    $categoria[$key]  = $row['categoria'];
    $valor[$key] = $row['valor'];
    $id_loc[$key] = $row['id_loc'];	
}
array_multisort($categoria, SORT_ASC, $valor, SORT_ASC, $this->disponiveis->vet_ordem_valores);
$i=1;

$vet = "";
$vet_final = array();

foreach($this->disponiveis->grupos_disponiveis as $cat_id => $cat_val){
	$vet_id_categorias[$i] = $this->disponiveis->categorias_disponiveis[$cat_id]->classe;
	$i++;	
}

for ($i = 0, $s = count($vet_id_categorias); $i < $s; $i++) {
  $vet_final[$i]["categoria"] = $vet_id_categorias[$i + 1];
  $vet_final[$i]["locadoras"] = array();
  $valor = array();
  for ($j = 0, $c = count($this->disponiveis->vet_ordem_valores); $j < $c; $j++) {
    if ($this->disponiveis->vet_ordem_valores[$j]['categoria'] == $vet_id_categorias[$i + 1]) {
      $vet_final[$i]["locadoras"][$j]["id"] = $this->disponiveis->vet_ordem_valores[$j]['id_loc'];
      $vet_final[$i]["locadoras"][$j]["valor"] = $this->disponiveis->vet_ordem_valores[$j]['valor'];
      $valor[$j] = $this->disponiveis->vet_ordem_valores[$j]['valor'];
    }
  }
  array_multisort($valor, SORT_ASC, $vet_final[$i]["locadoras"]);
  
  if ($i == 0) {
    $vet .= "[";
  }
  $vet .= "{id: '" . $vet_final[$i]["categoria"] . "', loc: [";
  for ($j = 0, $c = count($vet_final[$i]["locadoras"]); $j < $c; $j++) {
    $vet .= "'" . $vet_final[$i]["locadoras"][$j]["id"] . "'";
    if ($j != $c - 1) {
      $vet .= ",";
    } else {
      $vet .= "]";
    }
  }
  $vet .= "}";
  if ($i != $s - 1) {
    $vet .= ",";
  } else {
    $vet .= "]";
  }
  
}
?>
<script src="/js/carroaluguel/busca2.js" type="text/javascript"></script>
<script type="text/javascript">
  <?php echo $xml_assincrono_js_str; ?>
  <?php echo $js_menores_valores; ?>
  var catM = <?php echo $vet ?>;
  pbusca.load(catM);
</script>
<script type="text/javascript">
  $($('#resultados_pesquisa_comparacao a.ordenar').get(0)).click();
</script>
							</div>
                        </div>
                        <?php }else{ ?>
							<div id="geral_detalhes_comparacao">
                            	<h3 style="text-align:center;">Para cotações e reservas acima de 30 dias, favor entrar em contato com nossa Central de Atendimento ao Cliente.</h3>
                        </div>
						<?php }}else{ ?>
                        <div id="geral_detalhes_comparacao">
                            <h3 style="text-align:center;">Nenhuma locadora encontrada nos locais e horários informados!</h3>
                        </div>
                        <?php }?>
					</div>
				</div>
			<!-- FIM RESULTADO DA COMPARAÇÃO -->
		</div>
        <!-- FIM CONTEÚDO RESULTADO PESQUISA-->
	</div>
    <!-- FIM DIV PAGE -->
    <?php $this->load->view(SITE.'/footer.php');?>