<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
	<?php $this->load->view('header'); ?>	
	<body>		
		<div id="page">         			
			<?php $this->load->view('topo'); ?> 			
			<div id="content">				
				<div class="cont contemfloat">				 					
					<?php $this->load->view('menu_cliente') ?> 					 					
					<div id="cliente_reservas">
						<h1><?php echo $this->titulo; ?></h1>
						<ul>
							<?php foreach ($this->reservas AS $reserva) { ?>
							<li class="item">
								<h3>Reserva n° <span><?php echo $reserva->res_id; ?></span></h3>
								<table cellpadding="0" cellspacing="0">
									<thead>
										<tr>
											<th class="hotel">Hotel</th>
											<th class="checkin">Checkin</th>
											<th class="checkout">Checkout</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($reserva->hoteis AS $index => $hotel) { ?>
										<tr class="<?php echo ($index == 0) ? 'primeiro': ''; ?>">
											<td class="hotel"><?php echo $hotel->hot_nome; ?></td>
											<td class="checkin"><?php echo DBDateToVeiwDate($hotel->rsh_checkin); ?></td>
											<td class="checkout"><?php echo DBDateToVeiwDate($hotel->rsh_checkout); ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<div class="contemfloat">
									<dl>
										<dt>Forma de Pagamento:</dt>
										<dd><?php echo $reserva->fpg_nome; ?></dd>
										<dt>Status:</dt>
										<dd><?php echo $reserva->srs_nome; ?></dd>
									</dl>
									<p class="valor"><span>Valor das Reservas</span><strong><span>R$</span> <?php echo number_format($reserva->res_valor, 2, ',', '.') ?></strong></p>
								</div>
								<p class="detalhes"><a href="/cliente/reservas/detalhes/<?php echo $reserva->res_id; ?>" title="Mais detalhes">+ Detalhes</a></p>
							</li>
							<?php } ?>
						</ul>
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