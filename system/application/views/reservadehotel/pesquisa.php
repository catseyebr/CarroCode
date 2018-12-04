<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
  <?php $this->load->view('header'); ?>
  <body id="pesquisa">
    <div id="page">
      <?php 
		    $this->load->view('topo');
		    $this->load->view('form_busca');
		  ?>
      <!-- INICIO CONTEUDO BUSCA -->
      <div id="content">
        <div class="cont">
        <div id="resultados">
          <p>
            Resultado da Pesquisa // <span>Total de hotéis encontrados: <?php echo count($this->result); ?> hotéis</span>
          </p>
        </div>
        <div id="titulo_filtro">
          <h3>Filtre os resultados de sua pesquisa:</h3>
        </div>
         <div id="filtro">
          <form action="" id="contato16" method="post">
            <div id="form_filtro">
              <ol>
                <li>
                  <ul>
                    <li>
                      <input type="radio" value="az" id="ordenacaoaz" name="ordenacao"<?php if ($this->input->post('ordenacao') == 'az') { ?> checked="checked"<?php } ?>> Por Ordem Alfabética
                    </li>
                    <li>
                      <input type="radio" value="reserva" id="ordenacaoreserva" name="ordenacao"<?php if ($this->input->post('ordenacao') == 'reserva') { ?> checked="checked"<?php } ?>> Os Mais Reservados
                    </li>
                  </ul>
                </li>
                <li>
                  <select class="texbox3" id="bairros" name="bairros">
                    <option label="-Todos os Bairros-" value="">-Todos os Bairros-</option>
                    <?php foreach ($this->bairros as $bairro) {?>
                      <option value="<?php echo $bairro; ?>" <?php if ($this->input->post('bairros') == $bairro) { ?> selected="selected"<?php } ?>><?php echo $bairro; ?></option>
                    <?php } ?>
                  </select>
                </li>
                <li>
                  <select class="texbox3" id="categorias" name="categorias">
                    <option label="-Categorias-" value="">-Categorias-</option>
                    <?php foreach ($this->hot_categorias as $hot_categoria) { ?>
                      <option value="<?php echo $hot_categoria->cat_id ?>" <?php if ($this->input->post('categorias') == $hot_categoria->cat_id) { ?> selected="selected"<?php } ?>><?php echo $hot_categoria->cat_nome ?></option>
                    <?php } ?>
                  </select>
                </li>
                <li>
                  <select class="texbox3" id="valorMin" name="valorMin">
                    <option selected="selected" label="-Valor mínimo-" value="">-Valor mínimo-</option>
                    <option label="R$20,00" value="20.00"<?php if ($this->input->post('valorMin') == '20.00') { ?> selected="selected"<?php } ?>>R$20,00</option>
                    <option label="R$50,00" value="50.00"<?php if ($this->input->post('valorMin') == '50.00') { ?> selected="selected"<?php } ?>>R$50,00</option>
                    <option label="R$100,00" value="100.00"<?php if ($this->input->post('valorMin') == '100.00') { ?> selected="selected"<?php } ?>>R$100,00</option>
                    <option label="R$150,00" value="150.00"<?php if ($this->input->post('valorMin') == '150.00') { ?> selected="selected"<?php } ?>>R$150,00</option>
                    <option label="R$200,00" value="200.00"<?php if ($this->input->post('valorMin') == '200.00') { ?> selected="selected"<?php } ?>>R$200,00</option>
                    <option label="R$250,00" value="250.00"<?php if ($this->input->post('valorMin') == '250.00') { ?> selected="selected"<?php } ?>>R$250,00</option>
                    <option label="R$300,00" value="300.00"<?php if ($this->input->post('valorMin') == '300.00') { ?> selected="selected"<?php } ?>>R$300,00</option>
                    <option label="R$350,00" value="350.00"<?php if ($this->input->post('valorMin') == '350.00') { ?> selected="selected"<?php } ?>>R$350,00</option>
                    <option label="R$400,00" value="400.00"<?php if ($this->input->post('valorMin') == '400.00') { ?> selected="selected"<?php } ?>>R$400,00</option>
                    <option label="R$450,00" value="450.00"<?php if ($this->input->post('valorMin') == '450.00') { ?> selected="selected"<?php } ?>>R$450,00</option>
                    <option label="R$500,00" value="500.00"<?php if ($this->input->post('valorMin') == '500.00') { ?> selected="selected"<?php } ?>>R$500,00</option>
                  </select>
                </li>
                <li>
                  <select class="texbox3" id="valorMax" name="valorMax">
                    <option selected="selected" label="-Valor máximo-" value="">-Valor máximo-</option>
                    <option label="R$100.00" value="100.00"<?php if ($this->input->post('valorMax') == '100.00') { ?> selected="selected"<?php } ?>>R$100.00</option>
                    <option label="R$200.00" value="200.00"<?php if ($this->input->post('valorMax') == '200.00') { ?> selected="selected"<?php } ?>>R$200.00</option>
                    <option label="R$300.00" value="300.00"<?php if ($this->input->post('valorMax') == '300.00') { ?> selected="selected"<?php } ?>>R$300.00</option>
                    <option label="R$500.00" value="500.00"<?php if ($this->input->post('valorMax') == '500.00') { ?> selected="selected"<?php } ?>>R$500.00</option>
                    <option label="R$700.00" value="700.00"<?php if ($this->input->post('valorMax') == '700.00') { ?> selected="selected"<?php } ?>>R$700.00</option>
                    <option label="R$1.000,00" value="1000.00"<?php if ($this->input->post('valorMax') == '1000.00') { ?> selected="selected"<?php } ?>>R$1.000,00</option>
                    <option label="R$1.200,00" value="1200.00"<?php if ($this->input->post('valorMax') == '1200.00') { ?> selected="selected"<?php } ?>>R$1.200,00</option>
                    <option label="R$1.500,00" value="1500.00"<?php if ($this->input->post('valorMax') == '1500.00') { ?> selected="selected"<?php } ?>>R$1.500,00</option>
                    <option label="R$2.000,00" value="2000.00"<?php if ($this->input->post('valorMax') == '2000.00') { ?> selected="selected"<?php } ?>>R$2.000,00</option>
                    <option label="R$3.000,00" value="3000.00"<?php if ($this->input->post('valorMax') == '3000.00') { ?> selected="selected"<?php } ?>>R$3.000,00</option>
                  </select>
                </li>
              </ol>
            </div>
            <div id="botao_filtro">
              <input type="image" src="/images/bt_filtro.jpg">
            </div>
          </form>
        </div>
        <div class="paginacao">
          <?php echo $this->pagination->create_links(); ?>
        </div>
        <input type="hidden" name="tot_dias" id="tot_dias" value="<?php echo count($this->datas); ?>" />
        <?php foreach ($this->result as $hotel) { ?>
          <form class="hoteis contemfloat" action="/reservar" method="post">
            <input type="hidden" name="hotel" id="hot_<?php echo $hotel->hot_id; ?>" value="<?php echo $hotel->hot_id; ?>" />
            <div class="foto_hotel">
              <a href="/hotel/index/<?php echo $hotel->hot_permalink; ?>#fotos_aba" title=""><img src="/images/hotel_padrao.gif" title="<?php echo $hotel->hot_nome; ?>"></a>
              <h4><a href="/hotel/index/<?php echo $hotel->hot_permalink; ?>#comentarios_aba">Comentários (5)</a></h4>
            </div>
            <div class="info_hotel">
              <ul>
                <li>
                  <a href="/hotel/index/<?php echo $hotel->hot_permalink; ?>" title=""><?php echo $hotel->hot_nome; ?></a>
        				  <!-- <img src="/images/" alt="Categoria Hotel"/> -->
        				  <strong></strong>
                </li>
                <li class="endereco contemfloat">
                  <p>
                    <strong>Endereço: </strong> <?php echo $hotel->end_endereco . ', ' . $hotel->end_numero ?>
                    <span>|</span>
                    <strong>Bairro: </strong> <?php echo $hotel->end_bairro; ?>
                  </p>
                  <a href="/hotel/index/<?php echo $hotel->hot_permalink; ?>#mapa_aba" title="Veja o Mapa" class="mapa">Veja o Mapa</a>
                </li>
                <li class="apartamentos">
                  <?php foreach ($hotel->categorias_apa as $categoria) { ?>
                    <p class="categoria"><a href=""><?php echo $categoria->cap_nome; ?></a></p>
                    <input type="hidden" name="apartamento[]" value="<?php echo $categoria->menor_valor_cap_id; ?>" id="h_apa_<?php echo $categoria->cap_id; ?>" />
                    <div class="aptos_tipo">
                      <input type="hidden" id="qtde_cat_<?php echo $categoria->cap_id; ?>" value="<?php echo $this->qtde_apa[$categoria->cap_id]; ?>">
                      <?php foreach ($categoria->apartamentos as $key => $apartamento) {?>
                        <div class="contemfloat<?php if ($key == 0) { echo ' first"'; }?>">
                          <p class="nome">
                            <input type="radio" class="check_apa" name="apa_<?php echo $categoria->cap_id; ?>" id="apa_<?php echo $categoria->cap_id; ?>_<?php echo $apartamento->apa_id; ?>" value="<?php echo $apartamento->apa_id; ?>" <?php if ($categoria->menor_valor_cap_id == $apartamento->apa_id) {?> checked="checked"<?php } ?> value="<?php echo $apartamento->apa_id; ?>" />
                            <a href="/hotel/index/<?php echo $hotel->hot_permalink . '/' . $categoria->cap_permalink . '/' . $apartamento->tap_permalink; ?>"><?php echo $apartamento->tap_nome; ?></a>
                          </p>
                          <p class="diaria">
                            Diária média: <span id="precoapa_<?php echo $apartamento->apa_id; ?>">R$ <?php echo number_format($apartamento->diaria_media, 2, ',', '.'); ?></span>
                            <a id="apa_<?php echo $apartamento->apa_id; ?>" href="#" class="ver_detalhes">ver detalhes</a>
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
                                      <?php echo preg_replace ('/.{4}-(.{2})-(.{2})/', '$2/$1', $apartamento->bloqueios[$j]->data) ?>
                                      </th>
                                  <?php }?>
                                </tr>
                                <tr>
                                  <?php for ($j = (($i - 1) * 7); ($j < ($i * 7)) && isset($apartamento->bloqueios[$j]); $j++) {?>
                                    <td align="center" class="<?php if ($j == (($i - 1) * 7)) { ?>first<?php } ?>">
                                      R$ <?php echo $apartamento->bloqueios[$j]->prioritario->blo_tarifafinal; ?>
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
                  <strong id="precohotel_<?php echo $hotel->hot_id ?>"><span>R$</span> <?php echo number_format($hotel->menor_valor_hot, 2, ',', '.'); ?></strong>
                </li>
                <li>
                  <button type="submit">Reservar</button>
                </li>
              </ul>
            </div>
          </form>
        <?php } ?>
        <div class="paginacao">
          <?php echo $this->pagination->create_links(); ?>
        </div>
      </div>
      </div>  
    </div> 
    <?php $this->load->view('rodape');?>
    <!-- FIM RODAPE -->
  </body>
</html>
