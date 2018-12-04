<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

  <?php $this->load->view(SITE.'/header'); ?>
  
  <body id="cotacao">
    <div id="page">
      <div id="content">

        <?php
        $this->load->view(SITE.'/topo');
        $this->load->view(SITE.'/menu');
        ?>

        <form id="info" action="">
	        <fieldset>
	          <div class="corner cor_e4e3e3 top_left"></div>
	          <div class="corner cor_e4e3e3 top_right"></div>
	          <div class="corner cor_e4e3e3 bot_left"></div>
	          <div class="corner cor_e4e3e3 bot_right"></div>
	          <div class="cont">
		          <h1>Informa&ccedil;&otilde;es da reserva</h1> 
		          <dl id="cartoes">
		            <dt>Cart&otilde;es Aceitos:</dt>
		            <dd>
		              <ul>
		               <?php foreach ($this->tarifa_cotacao->locadora->formas_pagamento->forma as $frm_id => $frm_nome){?>
                    		<li><img src="/images/formas_pagamento/<?php echo $frm_id;?>_50.gif" width="50" height="21" align="absmiddle" /></li>
                        <?php } ?>
			            </ul>
		            </dd>
		          </dl>
		          
		          <div class="tarja veiculo">
		            <h3>Ve&iacute;culo</h3>
		            <p><?php foreach($this->tarifa_cotacao->carros->carros as $carr){ echo " - ".$carr->car_modelo; } ?> ou similar</p>
		          </div>
		          
		          <p class="foto"><img src="/images/carros/carro_<?php echo $this->tarifa_cotacao->carros->carros[0]->car_id;?>.png" alt="<?php echo $carr->car_modelo;?>" /></p>
		          
		          <dl id="grupo_info">
		            <dt>Categoria:</dt>
		            <dd><?php echo $this->tarifa_cotacao->grupo->categoria_nome;?></dd>
		            <dt>Grupo:</dt>
		            <dd><?php echo $this->tarifa_cotacao->grupo->nome;?></dd>
		            <dt>Quilometragem:</dt>
		            <dd><?php echo $this->tarifa_cotacao->grupo->km;?></dd>
		            <dt>Parcelamento:</dt>
		            <dd>At&eacute; <?php echo $this->tarifa_cotacao->locadora->formas_pagamento->parcelamento?>x sem juros</dd>
		            <dt>Parcela M&iacute;nima:</dt>
		            <dd><?php echo $this->tarifa_cotacao->locadora->formas_pagamento->parc_minima?></dd>
		            <dt>Cau&ccedil;&atilde;o <a href="" class="info_icon">(?)</a>:</dt>
		            <dd><?php echo $this->tarifa_cotacao->grupo->caucao;?></dd>
		            <dt>Franquia do carro:</dt>
		            <dd><?php echo $this->tarifa_cotacao->grupo->franquia;?></dd>
		            <dt>Franquia para terceiros:</dt>
		            <dd><?php echo $this->tarifa_cotacao->grupo->franquia_terceiros;?></dd>
		          </dl>
		          
		          <ul id="veiculo_info">
							<?php if($this->tarifa_cotacao->grupo->espec->quatro_portas){?>
								<li class="quatro_portas">4 portas</li>
                            <?php } if($this->tarifa_cotacao->grupo->espec->ac){?>
								<li class="ar_condicionado">Ar cond.</li>
                            <?php } if($this->tarifa_cotacao->grupo->espec->dh){?>
                            	<li class="dir_hidraulica">Dir. hidr.</li>
                            <?php } if($this->tarifa_cotacao->grupo->espec->te){?>
                            	<li class="trio_eletrico">Trio el&eacute;trico</li>
                            <?php } if($this->tarifa_cotacao->grupo->espec->cd){?>
                           		<li class="cd_player">CD Player</li>
                            <?php } ?>
								<li class="cambio_automatico">C&acirc;mb auto.</li>
								<li class="capacidade">5 pessoas</li>
								<li class="km_livre">Km livre</li>
								<li class="mala_grande">2 malas grandes</li>
								<li class="mala_pequena">2 malas pequenas</li>
								<li class="motor">motor 1.0</li>
								<li class="promocional">Promo&ccedil;&atilde;o</li>
								
		          </ul>
		          
		          <div class="tarja">
		            <h3>Selecione as lojas de Retirada e Devolu&ccedil;&atilde;o</h3>
		          </div>
		          
		          <div id="locais">
			          <p><strong>Data e Hora de Retirada: <?php echo $this->str_data_retirada;?> - <?php if(isset($this->dadoPesquisado->city_ret->nome)){echo $this->dadoPesquisado->city_ret->nome;}else{echo "<em>Cidade Inválida</em>";}?></strong></p>
			          <ul>
                      <?php
						if (!isset($this->tarifa_cotacao->lojas_disponiveis->retirada)){
							echo "Desculpe, não há lojas em funcionamento no dia ou horário solicitado para retirada"; 
							$show_button = 0;
						}else{
							$checked_option = '1';
							foreach($this->tarifa_cotacao->lojas_disponiveis->retirada as $loj_ret){ ?>
			            <li><input type="radio" name="id_loja_retirar" value="<?php echo $loj_ret->loj_id;?>" <?php if ($checked_option == '1'){echo "checked=\"checked\"";} ?> /> <?php echo $loj_ret->loj_iata;?> | <?php echo $loj_ret->loj_nome;?> | <?php echo $loj_ret->end_endereco;?></li>
			            <?php $checked_option = 0; }} ?>
			          </ul>
			          
			          <p><strong>Data e Hora de Devolu&ccedil;&atilde;o: <?php echo $this->str_data_devolucao;?> - <?php if(isset($this->dadoPesquisado->city_dev->nome)){ echo $this->dadoPesquisado->city_dev->nome;}else{echo "<em>Cidade Inválida</em>";}?></strong></p>
			          <ul>
                      	<?php
						if (!isset($this->tarifa_cotacao->lojas_disponiveis->devolucao)){
							echo "Desculpe, não há lojas em funcionamento no dia ou horário solicitado para retirada"; 
							$show_button = 0;
						}else{
							$checked_option = '1';
							foreach($this->tarifa_cotacao->lojas_disponiveis->devolucao as $loj_ret){ ?>
			            <li><input type="radio" name="id_loja_devolver" value="<?php echo $loj_ret->loj_id;?>" <?php if ($checked_option == '1'){echo "checked=\"checked\"";} ?> /> <?php echo $loj_ret->loj_iata;?> | <?php echo $loj_ret->loj_nome;?> | <?php echo $loj_ret->end_endereco;?></li>
			            <?php $checked_option = 0; }} ?>
			          </ul>
		          </div>
		          
		          <div class="tarja">
		            <h3>Prote&ccedil;&otilde;es</h3>
		          </div>
		          
		          <ul id="protecoes">
                  <?php foreach ($this->protecoes_disponiveis as $prot_dispo => $prot_value){?>
		            <li>
		              <label for="protecao_2"><input type="radio" name="protecao" id="protecao_1" /> <?php echo $prot_value->prot_nome;?></label>
		              <p><?php echo $prot_value->prot_desc;?> <strong>[<?php if($prot_value->tarifa[0]->tarprot_valor != 0){ ?>
                    	Acrescenta: R$ <?php echo number_format($prot_value->tarifa[0]->tarprot_valor,'2',',','.');?> no valor da di&aacute;ria.
                    <?php }else{?>
                    	Incluído no valor da diária
                    <?php }?>]</strong></p>
		            </li>
                   <?php } ?>
		            
		          </ul>
		          
		          <div class="tarja">
		            <h3>Selecione Produtos e Servi&ccedil;os Opcionais para esta Loca&ccedil;&atilde;o</h3>
		          </div>
		          
		          <ul id="opcionais">
                <li>
                  <label for="opcional_1"><input type="checkbox" name="opcional_1" id="opcional_1" /> Localizador GPS <strong>[R$ 10,00 à di&aacute;ria]</strong></label>
                </li>
                <li>
                  <label for="opcional_2"><input type="checkbox" name="opcional_2" id="opcional_2" /> Cadeira para crian&ccedil;a <strong>[R$ 10,00 à di&aacute;ria]</strong></label>
                </li>
                <li>
                  <label for="opcional_3"><input type="checkbox" name="opcional_3" id="opcional_3" /> Condutor Adicional <strong>[R$ 10,00 por per&iacute;odo]</strong></label>
                </li>
		          </ul>
		          
		          <div id="valores">
		            <ul id="valores-display">
		              <li><a href="#" id="valores-display-mover">Mover</a></li>
		              <li><a href="#" id="valores-display-locker">Fixar</a></li>
		            </ul>
		            <dl class="contemfloat">
		              <dt>Locadora:</dt>
		              <dd><img src="/images/locadoras/locadora_<?php echo $this->tarifa_cotacao->locadora->id;?>.jpg" alt="<?php echo $this->tarifa_cotacao->locadora->nome;?>" align="absmiddle" /></dd>
		              <dt>Total de Di&aacute;rias:</dt>
		              <dd><?php echo $this->tarifa_cotacao->diarias; if($this->tarifa_cotacao->diarias <= 1){echo " dia";}else{echo " dias";}?></dd>
		              <dt>Valor Di&aacute;rias:</dt>
		              <dd><?php echo number_format($this->tarifa_cotacao->valor_diarias,'2',',','.');?></dd>
		              <dt>Valor Prote&ccedil;&atilde;o:</dt>
		              <dd>
					  <?php if($this->tarifa_cotacao->valor_protecao != 0){ 
					  	 	echo number_format($this->tarifa_cotacao->valor_protecao,'2',',','.'); }else{
                    		echo "Valor da proteção já incluído no valor da diária"; }?></dd>
		              <dt>Taxa (<?php echo $this->tarifa_cotacao->taxa;?>%):</dt>
		              <dd>R$ <?php echo number_format($this->tarifa_cotacao->valor_taxas,'2',',','.');?></dd>
		            </dl>
		            <p class="total"><strong>Valor Total: </strong> R$ <?php echo number_format($this->tarifa_cotacao->valor_total,'2',',','.');?></p>
		          </div>
		          
		          <div id="botoes">
		            <p><button type="button" id="retornar">Retornar</button></p>
		            <p><button type="button" id="indicar">Indicar a um amigo</button></p>
		            <p><button type="submit" id="reservar">Reservar</button></p>
		          </div>
	          </div>
          </fieldset>
        </form>

      </div>
      <?php $this->load->view(SITE.'/rodape'); ?>
    </div>
  </body>
</html>