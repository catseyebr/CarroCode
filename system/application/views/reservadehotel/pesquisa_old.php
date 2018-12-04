<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
  <?php $this->load->view('header'); ?>
  <body>
    <div id="page">
      <?php 
		    $this->load->view('topo');
		    $this->load->view('menu');
		    $this->load->view('form_busca');
		  ?>
      <!-- INICIO CONTEUDO BUSCA -->
      <div id="content">
        <div id="resultados">
          <p>
            Resultado da Pesquisa // <span>Total de hotéis encontrados: <?php echo count($this->result); ?> hotéis</span>
          </p>
        </div>
        <!-- INíCIO FILTRO -->
      <!--  <div id="titulo_filtro">
          <h3>Filtre os resultados de sua pesquisa:</h3>
        </div>
         <div id="filtro">
          <form action="/busca" id="contato16" method="post">
            <div id="form_filtro">
              <input type="hidden" value="-- Nome do hotel --" name="autocompletehotel"><input type="hidden" value="CURITIBA" name="autocompletecidade"><input type="hidden" value="16/03/2010" name="retiradaini"><input type="hidden" value="17/3/2010" name="retiradafim">
              <ul>
                <li>
                    <input type="text" class="texbox30" name="entrada" value="">
                </li>
                <li class="check">
                    <input type="checkbox" value="az" id="ordenacao" name="ordenacao"> Por Ordem Alfabética
                </li>
                <li class="check">
                    <input type="checkbox" value="reserva" id="ordenacaoreserva" name="ordenacaoreserva"> Os Mais Reservados
                </li>
                <li>
                  <select class="texbox3" id="bairros" name="bairros">
                    <option label="-Todos os Bairros-" value="">-Todos os Bairros-</option>
                    <?php //foreach ($this->bairros as $bairro) {?>
                      <option value="<?php //echo $bairro; ?>"><?php //echo $bairro; ?></option>
                    <?php //} ?>
                  </select>
                </li>
                <li>
                  <select class="texbox3" id="categorias" name="categorias">
                    <option label="-Cartegorias-" value="">-Cartegorias-</option>
                    <?php //foreach ($this->hot_categorias as $hot_categoria) { ?>
                      <option value="<?php //echo $hot_categoria->cat_id ?>"><?php //echo $hot_categoria->cat_nome ?></option>
                    <?php //} ?>
                  </select>
                </li>
                <li>
                  <select class="texbox3" id="valorMin" name="valorMin">
                    <option selected="selected" label="-Valor mínimo-" value="">-Valor mínimo-</option>
                    <option label="R$20,00" value="20.00">R$20,00</option>
                    <option label="R$50,00" value="50.00">R$50,00</option>
                    <option label="R$100,00" value="100.00">R$100,00</option>
                    <option label="R$150,00" value="150.00">R$150,00</option>
                    <option label="R$200,00" value="200.00">R$200,00</option>
                    <option label="R$250,00" value="250.00">R$250,00</option>
                    <option label="R$300,00" value="300.00">R$300,00</option>
                    <option label="R$350,00" value="350.00">R$350,00</option>
                    <option label="R$400,00" value="400.00">R$400,00</option>
                    <option label="R$450,00" value="450.00">R$450,00</option>
                    <option label="R$500,00" value="500.00">R$500,00</option>
                  </select>
                </li>
                <li>
                  <select class="texbox3" id="valorMax" name="valorMax">
                    <option selected="selected" label="-Valor máximo-" value="">-Valor máximo-</option>
                    <option label="R$100.00" value="100.00">R$100.00</option>
                    <option label="R$200.00" value="200.00">R$200.00</option>
                    <option label="R$300.00" value="300.00">R$300.00</option>
                    <option label="R$500.00" value="500.00">R$500.00</option>
                    <option label="R$700.00" value="700.00">R$700.00</option>
                    <option label="R$1.000,00" value="1000.00">R$1.000,00</option>
                    <option label="R$1.200,00" value="1200.00">R$1.200,00</option>
                    <option label="R$1.500,00" value="1500.00">R$1.500,00</option>
                    <option label="R$2.000,00" value="2000.00">R$2.000,00</option>
                    <option label="R$3.000,00" value="3000.00">R$3.000,00</option>
                  </select>
                </li>
              </ul>
            </div>
            <div id="botao_filtro">
              <input type="image" src="/hotel2/images/bt_filtro.jpg">
            </div>
          </form>
        </div> -->
        <!-- FIM FILTRO -->

        <div class="paginacao">
          <?php echo $this->pagination->create_links(); ?>
        </div>
        <?php foreach ($this->result as $hotel) { ?>
          <div class="hoteis contemfloat">
            <div class="foto_hotel">
              <a href="" title=""><img src="/images/hotel_padrao.gif" title="Comentários "></a><h4><a>Comentários (5)</a></h4>
            </div>
            <div class="info_hotel">
              <ul>
                <li>
                  <a href="" title=""><?php echo $hotel->hot_nome; ?></a>
        				  <!-- <img src="/images/" alt="Categoria Hotel"/> -->
        				  <strong></strong>
                </li>
                <li>
                  <strong>Endereço: </strong> <?php echo $hotel->end_logradouro . ' ' . $hotel->end_endereco . ', ' . $hotel->end_numero ?>
                  <span>|</span>
                  <strong>Bairro: </strong> <?php echo $hotel->end_bairro; ?>
                  <a href="" title="Veja o Mapa"><img src="/images/bt_mapa.gif" /></a>
                </li>
                <li class="apartamentos">
                  <?php foreach ($hotel->categorias_apa as $categoria) { ?>
                    <p class="categoria"><?php echo $categoria->cap_nome; ?></p>
                    <div class="aptos_tipo">
                      <?php foreach ($categoria->apartamentos as $key => $apartamento) {?>
                        <div class="contemfloat<?php if ($key == 0) { echo ' first"'; }?>">
                          <p class="nome">
                            <input type="radio" name="apa_<?php echo $categoria->cap_id; ?>" id="apa_<?php echo $categoria->cap_id; ?>_<?php echo $apartamento->apa_id; ?>" value="<?php echo $apartamento->apa_id; ?>" <?php if ($categoria->menor_valor_cap_id == $apartamento->apa_id) {?> checked="checked"<?php } ?> />
                            <?php echo $apartamento->tap_nome; ?>
                          </p>
                          <p class="diaria">
                            Diária média: <span>R$ <?php echo number_format($apartamento->diaria_media, 2, ',', '.'); ?></span>
                            <a href="#" class="ver_detalhes" id="apa_<?php echo $apartamento->apa_id; ?>">ver detalhes</a>
                          </p>
                          <div id="precos_apa_<?php echo $apartamento->apa_id; ?>" class="precos_diarias inativo">
                            <?php
                              $s = count ($apartamento->bloqueios);
                              if (($s % 7) > 0) {
                                $s = (($s - ($s % 7)) / 7) + 1;
                              } else {
                                $s = $s / 7;
                              }
                              for ($i = 1; $i <= $s; $i++) {
                            ?>
                            <div class="<?php if ($i == 1) {?>first<?php }?>">
                              <table align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <?php for ($j = (($i - 1) * 7); ($j < ($i * 7)) && isset($apartamento->bloqueios[$j]); $j++) {?>
                                    <th align="center" class="<?php if ($j == (($i - 1) * 7)) { ?>first<?php } ?>">
                                      <?php echo preg_replace ('/.{4}-(.{2})-(.{2})/', '$2/$1', $apartamento->bloqueios[$j]->data_ant) ?><br />
                                      a<br />
                                      <?php echo preg_replace ('/.{4}-(.{2})-(.{2})/', '$2/$1', $apartamento->bloqueios[$j]->data) ?>
                                      </th>
                                  <?php }?>
                                </tr>
                                <tr>
                                  <?php for ($j = (($i - 1) * 7); ($j < ($i * 7)) && isset($apartamento->bloqueios[$j]); $j++) {?>
                                    <td align="center" class="<?php if ($j == (($i - 1) * 7)) { ?>first<?php } ?>">
                                      <?php echo $apartamento->bloqueios[$j]->prioritario->blo_tarifa; ?>
                                    </td>
                                  <?php }?>
                                </tr>
                              </table>
                            </div>
                            <?php } ?>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  <?php } ?>
                </li>
              </ul>
            </div>
            <div class="preco_hotel">
              <ul>
                <li>
                  Valor da reserva:
                </li>
                <li>
                  <strong><span>R$</span> <?php echo number_format($hotel->menor_valor_hot, 2, ',', '.'); ?></strong>
                </li>
                <li>
                  <a href="/hotel/" title="Veja mais detalhes"><img src="/images/bt_infohotel.gif" /></a>
                </li>
              </ul>
            </div>
          </div>
        <?php } ?>
        <div class="paginacao">
          <?php echo $this->pagination->create_links(); ?>
        </div>
      </div>  
    </div> 
    <?php $this->load->view('rodape');?>
    <!-- FIM RODAPE -->
  </body>
</html>
