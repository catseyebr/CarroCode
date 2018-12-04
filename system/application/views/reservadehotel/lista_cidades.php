<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
	<?php $this->load->view('header'); ?>	
	<body>		
		<div id="page">         			
			<?php $this->load->view('topo'); ?> 			
			<div id="content">				
				<div class="cont" id="cidades_atendidas">
					<h1>cidades atendidas</h1>
					<ul id="lista_estados">
						<?php for ($i = 0, $s = count($this->estados); $i < $s; $i++) { ?>
						<li class="item estado contemfloat">
							<h3><?php echo $this->estados[$i]->nome_estado; ?></h3>
							<?php
								for ($j = 1; $j < 4; $j++) {
									$mci = $this->estados[$i]->matriz_colunas[$j - 1];
									$mcf = $this->estados[$i]->matriz_colunas[$j];
									if ($mcf > $mci) {
							?>
										<ul class="lista_cidades">
											<?php for ($k = $mci; $k < $mcf; $k++) { ?>
											<li class="item cidade">
												<a href="/hoteis/cidade/<?php echo $this->estados[$i]->cidades[$k]->nome_cidade . ' - ' . $this->estados[$i]->abr_estado; ?>"><?php echo $this->estados[$i]->cidades[$k]->nome_cidade; ?></a>
											</li>
											<?php } ?>
										</ul>
							<?php
									}
								}
							?>
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