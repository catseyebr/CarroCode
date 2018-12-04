<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
	<?php $this->load->view('header'); ?>	
	<body>		
		<div id="page">         			
			<?php $this->load->view('topo'); ?> 			
			<div id="content">				
				<div class="cont contemfloat">				 					
					<?php $this->load->view('menu_cliente') ?> 					 					
					<div id="cliente_reserva" class="atual">						
						<ul class="reservas">
							<?php foreach ($this->reservas AS $index => $reserva) { ?>							
							<li id="item_<?php echo $index; ?>" class="item">								
								<a href="#" title="Excluir esta reserva" class="excluir">Excluir esta reserva</a>
								<div class="contemfloat">								
									<div class="info">
										<h4>
											<a title="" href="/hotel/index/<?php echo $reserva->hot_permalink; ?>"><?php echo $reserva->hot_nome; ?></a>										
											<!-- <img src="/images/" alt="Categoria Hotel"/> -->
											<strong></strong>
										</h4>                  
										<p class="endereco">
											<strong>Endereço: </strong> <?php echo $reserva->end_endereco . ', ' . $reserva->end_numero; ?>
											<span>|</span>
											<strong>Bairro: </strong> <?php echo $reserva->end_bairro; ?> 									
										</p>
										<table cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 20px;">
											<tr>
												<td width="50%"><strong>Checkin: </strong><?php echo $reserva->rsh_checkin; ?></td>
												<td width="50%"><strong>Checkout: </strong><?php echo $reserva->rsh_checkout; ?></td>
											</tr>
										</table>                      
										<p class="mapa">
											<a title="Veja o Mapa" href="/hotel/index/<?php echo $reserva->hot_permalink; ?>#mapa_aba">Veja o Mapa</a>
										</p>                  
										<p class="preco">
											Valor da reserva:<br />
											<strong>
												<span>R$</span>
												<?php echo number_format($reserva->valor_hot, 2, ',', '.'); ?>
											</strong>            			
										</p>								
									</div>								
									<div class="foto">		            	
										<p><a title="" href="/hotel/index/<?php echo $reserva->hot_permalink; ?>#fotos_aba"><img title="<?php echo $reserva->hot_nome; ?>" src="/images/hotel_padrao.gif"></a></p>		            	
										<p class="comment"><a href="/hotel/index/<?php echo $reserva->hot_permalink; ?>#comentarios_aba">Comentários (5)</a></p>		            
									</div>
								</div>		            
								<div class="apartamentos">
									<?php foreach ($reserva->categorias_apa AS $categoria) { ?>                                  
									<p class="categoria"><a href=""><?php echo $categoria->cap_nome; ?></a></p>                    
									<div class="aptos_tipo">                                              
										<div class="contemfloat first">                          
											<p class="nome">                            
												<a href="/hotel/index/<?php echo $reserva->hot_permalink . '/' . $categoria->cap_permalink . '/' . $categoria->apartamento->tap_permalink; ?>"><?php echo $categoria->apartamento->tap_nome; ?></a>                          
											</p>
											<p class="quantidade">
												Quantidade:
												<span><?php echo $categoria->qtde_apa; ?></span>
											</p>                          
											<p class="diaria">
												Diária média: 
												<span>R$ <?php echo number_format($categoria->apartamento->diaria_media * $categoria->qtde_apa, 2, ',', '.'); ?></span>                            
												<a class="ver_detalhes" href="#">ver detalhes</a>                          
											</p>                          
											<div class="precos_diarias inativo">
												<?php
													$s = count ($categoria->apartamento->bloqueios);
	                        $s = (($s % 7) > 0) ? ((($s - ($s % 7)) / 7) + 1) : ($s / 7);
	                        for ($i = 1; $i <= $s; $i++) {
												?>                                                        
												<div class="<?php if ($i == 1) {?>first<?php }?>">                              
													<table cellspacing="0" cellpadding="0" align="center">  
                              <tr>
                                <?php for ($j = (($i - 1) * 7); ($j < ($i * 7)) && isset($categoria->apartamento->bloqueios[$j]); $j++) {?>
                                  <th align="center" class="<?php if ($j == (($i - 1) * 7)) { ?>first<?php } ?>">
                                    <?php echo preg_replace ('/.{4}-(.{2})-(.{2})/', '$2/$1', $categoria->apartamento->bloqueios[$j]->data) ?>
                                    </th>
                                <?php }?>
                              </tr>
                              <tr>
                                <?php for ($j = (($i - 1) * 7); ($j < ($i * 7)) && isset($categoria->apartamento->bloqueios[$j]); $j++) {?>
                                  <td align="center" class="<?php if ($j == (($i - 1) * 7)) { ?>first<?php } ?>">
                                    R$ <?php echo number_format($categoria->apartamento->bloqueios[$j]->prioritario->blo_tarifafinal * $categoria->qtde_apa, 2, ',', '.'); ?>
                                  </td>
                                <?php }?>
                              </tr>
													</table>                            
												</div>
												<?php } ?>                                                   
											</div>                        
										</div>                                         
									</div>
									<?php } ?>                                  
								</div>							
							</li>
							<?php } ?>						
						</ul>
						<p class="total"><span>Valor Total:</span><strong><span>R$</span> <?php echo number_format($this->total, 2, ',', '.'); ?></strong></p>
	          <form class="confirmar" action="/cliente/formaPagamento" method="post">
	          	<button type="button" id="mais-reserva_atual">+ Reservas</button>
	            <button id="prosseguir_atual">Prosseguir</button>
	          </form>					
					</div>					 				
				</div>  				
				<!-- FIM DIV CONT --> 			
			</div>  			
			<!-- FIM DIV CONTENT --> 		
		</div>		
		<!-- FIM DIV PAGE -->		
		<?php $this->load->view('rodape'); ?>	
	</body>
</html>