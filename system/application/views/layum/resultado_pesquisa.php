<?php $this->load->view(SITE.'/header'); ?>
  <body id="busca">
    <div id="page">
      <div id="content">
      <?php
        	$this->load->view(SITE.'/topo');
        	$this->load->view(SITE.'/menu');
        ?>
            	
    	<div id="detalhes_pesquisa" class="contemfloat">
    		<div id="banner_pesquisa">
    		</div>
    		<div id="termos_pesquisa">
	    		<div class="corner cor_e4e3e3 top_left"></div>
	    		<div class="corner cor_e4e3e3 bot_left"></div>
				<div class="corner cor_e4e3e3 top_right"></div>

				<div class="corner cor_e4e3e3 bot_right"></div>
	    		<dl class="contemfloat">
	    			<dt>Cidade Retirada:</dt>
	    			<dd><?php echo $_SESSION['pesquisa']['cid_retirada'];?></dd>
	    			
	    			<dt>Data Retirada:</dt>
	    			<dd><?php echo $_SESSION['pesquisa']['date_retirada'];?></dd>
	    			
	    			<dt>Hora Retirada:</dt>
					<dd><?php echo $_SESSION['pesquisa']['hora_retirada'];?></dd>
	    			
	    			<dt>Cidade Devolu&ccedil;&atilde;o:</dt>
	    			<dd><?php echo $_SESSION['pesquisa']['cid_devolucao'];?></dd>
	    			
	    			<dt>Data Devolu&ccedil;&atilde;o:</dt>
	    			<dd><?php echo $_SESSION['pesquisa']['date_devolucao'];?></dd>

	    			<dt>Hora Devolu&ccedil;&atilde;o:</dt>
	    			<dd><?php echo $_SESSION['pesquisa']['hora_devolucao'];?></dd>
	    			
	    			<dt>Locadora:</dt>
	    			<dd>Todas as locadoras</dd>
	    			
	    			<dt>Categoria:</dt>
	    			<dd>Todas as categorias</dd>

	    			
	    			<dt>Forma Pagamento:</dt>
	    			<dd>Cartão de Crédito</dd>
	    		</dl>
				<a id="nova_pesquisa" href="#" title="Nova Pesquisa">Nova Pesquisa</a>
	    	</div>
    	</div>
    	<div id="resultados_pesquisa">

	    	<ul id="abas_pesquisa" class="contemfloat">
	    		<li class="ativo comparacao">
	    			<div class="corner cor_e4e3e3 top_left"></div>
	    			<div class="corner cor_e4e3e3 top_right"></div>
	    			<a href="#" title="Resultados em Compara&ccedil;&atilde;o">Compara&ccedil;&atilde;o</a>
	    		</li>
	    		<li class="por_grupo">
	    			<div class="corner cor_c8c8c8 top_left"></div>

	    			<div class="corner cor_c8c8c8 top_right"></div>
	    			<a href="#" title="Resultados por Grupo">Por Grupo</a>
	    		</li>
	    		<li class="por_locadora">
	    			<div class="corner cor_c8c8c8 top_left"></div>
	    			<div class="corner cor_c8c8c8 top_right"></div>
	    			<a href="#" title="Resultados por Locadora">Por Locadora</a>
	    		</li>

	    	</ul>
	    	<div id="resultados_comparacao">
	    	<div class="corner cor_e4e3e3 top_left"></div>
	    		<div class="corner cor_e4e3e3 bot_left"></div>
				<div class="corner cor_e4e3e3 top_right"></div>
				<div class="corner cor_e4e3e3 bot_right"></div>
                <?php if($this->disponibilidade_nula == FALSE){
					if($this->disponiveis->diarias <= 30){
					?>
                    <div class="cont">
                	<div id="pag_prox"><a href="#">Próximo</a></div>

					<div id="pag_ant"><a href="#">Anterior</a></div>
			    	<p class="abstract">Foram encontradas <strong><?php echo $this->locadoras->quant ?> locadoras</strong> na pesquisa, para o per&iacute;odo, localidade e hor&aacute;rios informados.</p>
			    	<dl class="paginas contemfloat">
			    		<dt>P&aacute;ginas: </dt>

			    		<dd>
			    			<ul>
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
                <?php 
                $k = $k + 1;
                $m = $m + 6;
			} ?>
			    			</ul>
			    		</dd>
			    	</dl>
			    	<div id="legenda">

			    		<p>Legenda:</p>
			    		<dl>
			    			<dt><img src="/images/layum/indicador_online.png" alt="Indicador Online" /></dt>
			    			<dd>Reserva imediata.</dd>
			    			
			    			<dt><img src="/images/layum/indicador_solicitar.png" alt="Indicador Solicitar" /></dt>
			    			<dd>Requer confirma&ccedil;&atilde;o em hor&aacute;rio comercial.</dd>

			    			
			    			<dt><img src="/images/layum/indicador_indisponivel.png" alt="Indicador IndisponÃ­vel" /></dt>
			    			<dd>Indispon&iacute;vel no momento.</dd>
			    			
			    			<dt><img src="/images/layum/indicador_inexistente.png" alt="Indicador Inexistente" /></dt>
			    			<dd>N&atilde;o existe na frota.</dd>
			    		</dl>
			    	</div>
			    	<div id="comparacao_result">

			    	  <div id="row_locadoras">
			    	  	<div class="blank"></div>
			    	  	<ul>
			    	  		<?php 
				foreach($this->disponiveis->locadoras_disponiveis as $locadorasDispon => $value_loc){
			?>
				<li><img src="/images/locadoras/locadora_<?php echo $locadorasDispon; ?>.jpg" alt="<?php echo $value_loc['loc_nomelocadora'] ?>"/>
                <div class="diferenciais">
			    	  			dasdadasdadsadsa
			    	  			</div>
                </li>
                <?php }?>
			    
			    	  	</ul>
			    	  </div>
				      <ol>
						<?php 
						if($this->disponiveis->locadoras_disponiveis != 'Nenhuma locadora disponível no local e horários informados'){
foreach($this->disponiveis->grupos_disponiveis as $cat => $cat_value){?>
				        <li class="row primeiro"> 
				          <div class="categoria" id="cat_1">
				            <h3><?php echo $this->disponiveis->categorias_disponiveis[$cat]->nome;?></h3>
				            <img src="/images/categorias/cat_<?php echo $cat; ?>.jpg" alt="" />
				            <a href="#">ordenar por pre&ccedil;o</a>
				          </div>
				          <ul class="row_item">
							<?php 
								$menor_valor = 1000;
								foreach($cat_value as $loc_id => $loc_value){ 
									if($loc_value != 'Categoria não disponível'){
										if(reset($loc_value)->tarifas->valor_total < $menor_valor){
											$menor_valor = reset($loc_value)->tarifas->valor_total;
											$menor_valor_id = reset($loc_value)->tarifas->grupo->id;
										}
										if(reset($loc_value)->tarifas->valor_total == $menor_valor){
											$menor_valor = reset($loc_value)->tarifas->valor_total;
											$menor_valor_id2 = reset($loc_value)->tarifas->grupo->id;
										}
							?>
				            <li class="solicitar <?php if(reset($loc_value)->tarifas->valor_total <= $menor_valor){echo "menor";} ?> item" id="item_1_1">
				              <h4>Locadora Avis</h4>
				              <p class="valor_dia"><strong>R$ <?php echo number_format(reset($loc_value)->tarifas->diaria_media, '2',',','.');?></strong>/ Dia</p>
				              <p class="valor_total">Total: R$ <?php echo number_format(reset($loc_value)->tarifas->valor_total, '2',',','.');?></p>
				              <p class="link_cont"><a href="<?php echo "/pesquisa/seleciona-seguro/".reset($loc_value)->tarifas->grupo->id."/".reset($loc_value)->tarifas->protecao->id."/".$this->dadosPesquisa->dataRetirada."/".$this->dadosPesquisa->dataDevolucao."/".$this->disponiveis->locadoras_disponiveis[$loc_id]['loj_id']."/".$this->disponiveis->locadoras_disponiveis[$loc_id]['loj_id']."/".$this->disponiveis->cidadeRetirada."/".$this->disponiveis->cidadeDevolucao;?>"><img src="/images/layum/indicador_solicitar.png" alt="" /> Solicitar</a></p>
				            </li>
							
				       
						<?php }else{?>
                        	<li class="inexistente item" id="item_1_2">
				              <h4>Locadora Avis</h4>
				              <p class="link_cont"><img src="/images/layum/indicador_inexistente.png" alt="a" /> Inexistente</p>
				            </li>
                        <?php }}?>
						 </ul>
					<?php }} ?>
                    </li>
				      </ol>
			    	</div>
			    	<dl class="paginas contemfloat">
			    		<dt>P&aacute;ginas: </dt>
			    		<dd>
			    			<ul>
			    				
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
                <?php 
                $k = $k + 1;
                $m = $m + 6;
			} ?>
			    			</ul>
			    		</dd>
			    	</dl>
			    	<p class="abstract">Foram encontradas <strong><strong>7</strong> locadoras</strong> na pesquisa, para o per&iacute;odo, localidade e hor&aacute;rios informados.</p>

		    	</div>
                 <?php }else{ ?>
				
                <div class="cont">
                    	<div id="nada_encontrado">
                        	<h3>Para cotações e reservas acima de 30 dias, favor entrar em contato com nossa Central de Atendimento ao Cliente.</h3>
                        </div>
                    </div>
                <?php }}else{ ?>
                	<div class="cont">
                    	<div id="nada_encontrado">
                        	<h3>Nenhuma locadora encontrada nos locais e horários informados!</h3>
                        </div>
                    </div>
                <?php } ?>
	    	</div>
    	</div>
      </div>
            <?php  $this->load->view(SITE.'/rodape'); ?>
          </div>
  </body>
</html>