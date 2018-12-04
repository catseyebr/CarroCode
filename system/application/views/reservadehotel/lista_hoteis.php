<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
	<?php $this->load->view('header'); ?>	
	<body>		
		<div id="page">         			
			<?php $this->load->view('topo'); ?> 			
			<div id="content">				
				<div class="cont" id="lista_hoteis">
					<h1>Hotéis disponíveis para reserva:</h1>
					<form id="filtro_cidade" action="/hoteis/filtro_cidade" method="post">
						<h3>Filtre a lista de Hotéis:</h3>
						<fieldset class="contemfloat">
							<p>
								<label for="cidade">Cidade:</label>
								<input type="text" id="cidade" name="cidade" class="texbox" value="<?php echo $this->filtro; ?>" />
							</p>
							<button type="submit" id="filtrar">Filtrar</button>
						</fieldset>
					</form>
					
					<ul class="hoteis">
						<?php foreach ($this->hoteis AS $hotel) { ?>							
						<li class="item">
							<div class="contemfloat">								
								<div class="info">
									<h4>
										<a title="" href="/hotel/index/<?php echo $hotel->hot_permalink; ?>"><?php echo $hotel->hot_nome; ?></a>										
										<!-- <img src="/images/" alt="Categoria Hotel"/> -->
										<strong></strong>
									</h4>                  
									<p class="endereco">
										<strong>Endereço: </strong><?php echo $hotel->end_endereco . ', ' . $hotel->end_numero; ?> 
										<span>|</span>
										<strong>Bairro: </strong><?php echo $hotel->end_bairro; ?>
										<span>|</span>
										<strong>Cidade: </strong><?php echo $hotel->nome_cidade . ' - ' . $hotel->abr_estado; ?>  									
									</p>                   
									<p class="mapa">
										<a title="Veja o Mapa" href="/hotel/index/<?php echo $hotel->hot_permalink; ?>#mapa_aba">Veja o Mapa</a>
									</p>								
								</div>								
								<div class="foto">		            	
									<p><a title="" href="/hotel/index/<?php echo $hotel->hot_permalink; ?>#fotos_aba"><img title="" src="/images/hotel_padrao.gif"></a></p>		            	
									<p class="comment"><a href="/hotel/index/<?php echo $hotel->hot_permalink; ?>#comentarios_aba">Comentários (5)</a></p>		            
								</div>
							</div>							
						</li>
						<?php } ?>			
					</ul>					 				
				</div>  				
				<!-- FIM DIV CONT --> 			
			</div>  			
			<!-- FIM DIV CONTENT --> 		
		</div>		
		<!-- FIM DIV PAGE -->		
		<?php $this->load->view('rodape'); ?>	
	</body>
</html>