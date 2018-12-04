<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
  <?php $this->load->view('header'); ?>
  <body>
    <div id="page">
      <?php 
		    $this->load->view('topo');
		    $this->load->view('form_busca');
		  ?>
		  
      <!-- INICIO CONTEUDO DO HOTEL -->
      <div id="content">
        <div class="cont">
        <!-- INICIO BREVE DESCRICAO HOTEL-->
        <div class="interna_hoteis">
          <div class="foto_hotel">
            <a title="" href="#">
              <img src="/images/<?php if(isset($this->fotos[0])){
                                      echo 'hoteis/thumbs/' . $this->fotos[0]->img_caminhoimagem;
                                  }else{ ?>hotel_padrao.gif<?php } ?>">
            </a>
            <h4>
              <a title="" href="#">Comentários (<?php echo count($this->comentarios);?>)</a>
            </h4>
          </div>
      
          <div class="info_hotel">
            <ul>
              <li>
                <a title="<?php echo $this->hotel->hot_nome;?>" href="#">
                  <?php echo $this->hotel->hot_nome;?>
                </a>
                <img alt="Categoria Hotel" src="/images/estrela_5.gif">
              </li>
              <li>
                <strong>Endereço: </strong>
                  <?php echo $this->hotel->end_endereco . ","; ?>
                  <?php echo $this->hotel->end_numero; ?>
                <span>|</span>
                <strong>Bairro: </strong>
                  <?php echo $this->hotel->end_bairro; ?>
              </li>
              <li>
                <strong>Cidade / Estado: </strong>
                  <?php echo $this->hotel->nome_cidade." - ".$this->hotel->abr_estado; ?>
              </li>
              <li>
                <a href="#mapa_aba" title="Veja o Mapa"><img src="/images/bt_mapa.gif"></a>
              </li>
            </ul>
          </div>
          
          <div class="preco_hotel">
            <ul>
              <li>
                diárias a partir de:
              </li>
              <li>
                <strong>
                  <span>R$</span>
                  <?php 
                    echo number_format($this->hotel->tarifa_minima,2,',','.');
                  ?>
                </strong>
              </li>
            </ul>
          </div>
        
        </div>
      
        <!-- INICIO INFORMACOES HOTEL-->
        <div class="widget" id="tabvanilla">
          <ul class="tabnav ui-tabs-nav">
            <li class="ui-tabs-selected">
              <a href="#apartamentos">APARTAMENTOS DISPONÍVEIS</a>
            </li>
            <li class="">
              <a href="#informacoes_aba">INFORMAÇÕES</a>
            </li>
            <li class="">
              <a href="#mapa_aba" id="mapa">MAPA</a>
            </li>
            <li class="">
              <a href="#fotos_aba">FOTOS</a>
            </li>
            <li class="">
              <a href="#comentarios_aba">COMENTÁRIOS</a>
            </li>
          </ul>
          <!-- TAB APARTAMENTOS-->
          <form action="/reserva" method="post" id="formApartamentos" name="formApartamentos">
            <div class="tabdiv ui-tabs-panel" id="apartamentos" style="">
              <table width="788" id="tabela_apartamentos">
                <tbody>
                    <?php
                    foreach($this->categorias as $categoria)
                          { ?>
                            <tr>
                              <td colspan="5">
                                <img src="/images/linha_aba.gif">
                              </td>
                            </tr>
                            <tr>
                              <td> <strong>  <?php echo $categoria->cap_nome; ?> </strong></td>
                            </tr>
                           
                            <?php foreach($categoria->apartamentos as $apartamento)
                                  { ?>
                                    <tr>
                                      <td><a href="/hotel/index/<?php echo $this->hotel->hot_permalink . '/' . $apartamento->cap_permalink . '/' . $apartamento->tap_permalink; ?>" title="Mais Detalhes"><?php echo $apartamento->tap_nome; ?></a></td>
                                      <td>
                                          diárias a partir de:<strong> R$ 
                                          <?php echo number_format($this->apartamento->tarifa_minima = $this->apartamentos_model->GetTarifaMinima($apartamento->apa_id),2,',','.'); ?>
                                          </strong>
                                      </td>   
                                      <td> <a href="/hotel/index/<?php echo $this->hotel->hot_permalink . '/' . $apartamento->cap_permalink . '/' . $apartamento->tap_permalink; ?>" title="Mais Detalhes">+ detalhes</a> </td>
                                      <td align="right">
                                        <!-- <input type="image" class="bt_reservar" src="/images/bt_reservar.gif" title="Reservar este apartamento" style="opacity: 0.33;" disabled=""> -->
                                      </td>
                                    </tr>
                            <?php } ?>                
                    <?php } ?>
                </tbody>
              </table>
            </div>
          </form>
          <!-- TAB INFORMARCOES-->
          <div class="tabdiv ui-tabs-panel ui-tabs-hide" id="informacoes_aba" style="">
            <p class="informacoes_aba">
                <strong>
                  <!-- TITULO -->
                  <?php echo $this->hotel->hot_nome; ?>
                </strong>
                <br>
                  <!-- DESCRICAO -->
                  <?php echo $this->hotel->hot_descricao; ?>
                <br>
            </p>
						
						<h5>Dados Adicionais:</h5>
						<?php echo $this->da_exibicao; ?>
          </div>
          <!-- TAB MAPA-->
          <div class="tabdiv ui-tabs-panel ui-tabs-hide" id="mapa_aba" style="">
            <div id="gmaps_mapa" style="width: 739px; height: 525px;"></div>
          </div>
          <!-- TAB FOTOS-->
          <div class="tabdiv ui-tabs-panel ui-tabs-hide" id="fotos_aba">
              <?php if(isset($this->fotos[0])) { ?>
                  <p>Clique para ampliar</p>
                  <ul class="contemfloat">
                    <?php foreach($this->fotos as $foto){ ?>
                      <li>
                        <a title="HOTEL" href="#">
                          <img src="/images/hoteis/thumbs/<?php echo $foto->img_caminhoimagem; ?>">
                        </a>
                      </li>
                    <?php } ?>
                  </ul>
              <?php }else{ ?><p>Sem imagem</p> <?php } ?> 
          </div>
          <!-- TAB COMENTARIOS-->
          <div class="tabdiv3 ui-tabs-panel ui-tabs-hide" id="comentarios_aba">
            <?php foreach($this->comentarios as $comentario){ ?> 
              <ul class="coment">
                <li>
                  <h4><?php
                        echo substr($comentario->com_dthcadastro,8,2).'.'.substr($comentario->com_dthcadastro,5,2).'.'.substr($comentario->com_dthcadastro,0,4);
                      ?>
                  </h4>
                </li>
                <li>
                  <p>
                    <?php echo $comentario->com_mensagem; ?>
                  </p>
                </li>
                <li>
                  <strong><?php if (!empty($comentario->usu_nome))
                                echo $comentario->usu_nome; 
                                echo $comentario->com_nome; ?> |</strong>
                  <span><?php echo $comentario->com_cidade; ?></span>
                </li>
              </ul> 
            <?php } $this->load->view('form_comentario'); ?>     
          </div>
        </div>
      </div>
      </div>
    </div>
    <!-- RODAPE -->
    <?php $this->load->view('rodape');?>
    <!-- FIM RODAPE -->
    <script src='/js/gmaps.js' type='text/javascript'></script>
  </body>
</html>  