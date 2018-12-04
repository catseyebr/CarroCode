<?php $this->load->view(SITE.'/header'); ?>
  	<body id="locadora">

    <div id="page">
      <div id="content">       
         <?php
        	$this->load->view(SITE.'/topo');
        	$this->load->view(SITE.'/menu');
        ?>

           
        
        <h1><img src="/images/locadoras/medium_locadora_<?php echo $this->locadora->id;?>.jpg" alt="<?php echo $this->locadora->nome;?>" /> Locadora <?php echo $this->locadora->nome;?></h1>
        <div id="geral">
					<div id="sobre">
	        			<?php echo $this->locadora->texto_livre;?>
	        		</div>
	        
	        <h3>Tabela de Preços</h3>
	        
	        <table id="precos" cellpadding="0" cellspacing="0">
	        	<thead>
	        		<tr>
	        			<th class="grupo">Grupo</th>
	        			<th class="modelos">Modelos</th>
	        			<th class="descricao">Descrição</th>
	        			<th class="diaria">Diária</th>
	        			<th class="semanal">Semanal</th>
	        			<th class="mensal">Mensal</th>
	        			<th class="caucao">Valor da Caução</th>
	        			<th class="btn"></th>
	        		</tr>
	        	</thead>
	        	<tbody>
                <?php 
					$i = 0;
					foreach($this->locadora->grupos as $grp){?>
	        		<tr class="<?php if($i==0){echo'primeiro';}else if($i==count($this->locadora->grupos)-1){echo'ultimo';}?> <?php echo ($i%2==0)?'par':'impar'?>">
	        			<td class="grupo"><?php echo $grp->nome; ?></td>
	        			<td class="modelos"><?php foreach($grp->carros->carros as $carr){ echo " - ".$carr->car_modelo; } ?> ou similar</td>
	        			<td class="descricao">
                        	<?php if($grp->espec->duas_portas){?>
								<img src="/images/carro_icons/duas_portas_pq.png" alt="Duas portas" />
                            <?php }  if($grp->espec->quatro_portas){?>
								<img src="/images/carro_icons/quatro_portas_pq.png" alt="Quaro portas" />
                            <?php } if($grp->espec->ac){?>
								<img src="/images/carro_icons/ar_condicionado_pq.png" alt="Ar condicionado" />
                            <?php } if($grp->espec->dh){?>
                            	<img src="/images/carro_icons/direcao_pq.png" alt="Direção hidráulica" />
                            <?php } if($grp->espec->te){?>
                            	<img src="/images/carro_icons/trio_eletrico_pq.png" alt="Trio Elétrico" />
                            <?php } if($grp->espec->cd){?>
                           		<img src="/images/carro_icons/cd_player_pq.png" alt="Cd Player" />
                            <?php } ?>
						</td>
	        			<td class="diaria"><?php echo number_format($grp->tarifa_media->diaria,'2',',','.');?></td>
	        			<td class="semanal"><?php echo number_format($grp->tarifa_media->semanal,'2',',','.');?></td>
	        			<td class="mensal"><?php echo number_format($grp->tarifa_media->mensal,'2',',','.');?></td>
	        			<td class="caucao"><?php echo $grp->caucao;?></td>
	        			<td class="btn"><a href="" class="btn_reservar">Reservar</a></td>
	        		</tr>
				<?php $i++;} ?>
	        	</tbody>
	        </table>
	        
	        <div id="legenda" class="adicional-tabela">
	        	<div class="cont">
		        	<h4>Legenda</h4>
		        	<dl>
		            <dt class="duas_portas"><img title="2 portas" alt="2 portas" src="/images/carro_icons/2_portas_36.png" /></dt>
		            <dd class="duas_portas">2 Portas</dd>
		            <dt class="quatro_portas"><img title="4 portas" alt="4 portas" src="/images/carro_icons/4_portas_36.png" /></dt>
		            <dd class="quatro_portas">4 Portas</dd>
		            <dt class="ar_condicionado"><img title="Ar condicionado" alt="Ar condicionado" src="/images/carro_icons/ar_cond_36.png" /></dt>
		            <dd class="ar_condicionado">Ar condicionado</dd>
		            <dt class="direcao"><img title="Direção hidráulica" alt="Direção hidráulica" src="/images/carro_icons/dir_hidr_36.png" /></dt>
		            <dd class="direcao">Direção hidráulica</dd>
		            <dt class="trio_eletrico"><img title="Trio elétrico" alt="Trio elétrico" src="/images/carro_icons/trio_36.png" /></dt>
		            <dd class="trio_eletrico">Trio elétrico</dd>
		            <dt class="cd_player"><img title="CD Player" alt="CD Player" src="/images/carro_icons/cd_36.png" /></dt>
		            <dd class="cd_player">CD Player</dd>
		            <dt class="promocao"><img title="Tarifa promocional" alt="Tarifa promocional" src="/images/carro_icons/promocional_36.png" /></dt>
		            <dd class="promocao">Tarifa promocional</dd>
		          </dl>
		        </div>
	        </div>
	        
	        <div id="importante" class="adicional-tabela">
	        	<div class="cont">
		        	<h4>Importante</h4>
							<div><?php echo $this->locadora->mais_info;?></div>
						</div>
	        </div>
	        
	        <h3>Conheça as Proteções</h3>
	        <?php foreach ($this->protecoes_disponiveis as $prot_dispo => $prot_value){?>
					<div class="protecao box_cinza">
            <div class="corner cor_e4e3e3 top_left"></div>
            <div class="corner cor_e4e3e3 top_right"></div>
            <div class="corner cor_e4e3e3 bot_left"></div>
            <div class="corner cor_e4e3e3 bot_right"></div>
						<div class="cont">
							<h4>Proteção: <?php echo $prot_value->prot_nome;?></h4>
							<div class="subcont">
								<dl>
									<dt>Grupos Participantes:</dt>
									<dd>A,B,C</dd> 
									<dt>Descrição:</dt>
									<dd><?php echo $prot_value->prot_desc;?></dd> 
									<dt>Valor da Proteção ao dia:</dt>
									<dd><?php if($prot_value->tarifa[0]->tarprot_valor != 0){ ?>
                    	Acrescenta: R$ <?php echo number_format($prot_value->tarifa[0]->tarprot_valor,'2',',','.');?> no valor da di&aacute;ria.
                    <?php }else{?>
                    	Incluído no valor da diária<?php }?></dd>
								</dl> 
							</div>
						</div>
					</div>
	        <?php } ?>
					<div id="lojas">
						<h3>Lojas</h3>
						
						<form action="" method="get">
							<p>
                            	<label for="escolha_cidade">Escolha a cidade:</label>
                                <select name="cidade_sel">
                                	<?php foreach($this->locadora->lojasCidades as $cid_loj){?>
                                    	<option value="<?php echo $cid_loj->city_nome;?>"><?php echo $cid_loj->city_nome;?></option>
                                    <?php } ?>
                                </select>
                               	<button type="submit">Localizar</button>
                            </p>
						</form>
						<?php foreach($this->locadora->lojas as $loj){?>
						<div class="loja box_cinza">
                            <div class="corner cor_e4e3e3 top_left"></div>
                            <div class="corner cor_e4e3e3 top_right"></div>
                            <div class="corner cor_e4e3e3 bot_left"></div>
                            <div class="corner cor_e4e3e3 bot_right"></div>
							<div class="cont">
								<h4><?php echo $loj->nome;?></h4>
								<div class="subcont">
									<p class="tipo <?php if($loj->aeroporto == TRUE){echo 'aeroporto';}else{echo 'normal';}?>">Tipo de loja: <?php if($loj->aeroporto == TRUE){echo 'Aeroporto';}else{echo 'Normal';}?></p>
									<div class="mais">
										<p>Endereço: <?php echo $loj->endereco->rua;?> - Bairro: <?php echo $loj->endereco->bairro;?><br />
										Cidade: <?php echo $loj->endereco->cidade;?> - Estado: <?php echo $loj->endereco->estado;?></p>
		
										<p><strong>Horários de funcionamento:</strong><br />
										de Segunda à Sexta-Feira: das <?php echo $loj->horarios[1]->hora_inicial;?>hs às <?php echo $loj->horarios[1]->hora_final;?>hs<br>
										aos Sábados: <?php if(isset($loj->horarios[6])){echo $loj->horarios[6]->hora_inicial."hs às ".$loj->horarios[6]->hora_final."hs.";}else{echo "Fechado.";}?><br>
										aos Domingos e Feriados: <?php if(isset($loj->horarios[0])){echo $loj->horarios[0]->hora_inicial."hs às ".$loj->horarios[0]->hora_final."hs.";}else{echo "Fechado.";}?></p> 
									</div>
									<p class="btn_reservar"><a href="#" title="">Reservar</a></p>
								</div>
							</div>
						</div>
						<?php }?>
						
						
					</div>
        </div>
      </div>

			<?php  $this->load->view(SITE.'/rodape');?>
          </div>
  </body>
</html>