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
		  
      <!-- INICIO CONTEUDO DO APARTAMENTO -->
      <div id="content">
        <div class="cont">
        <!-- INICIO BREVE DESCRICAO APARTAMENTO-->
        <div class="interna_apartamentos">
          <div class="foto_apartamento">
            <a title="" href="#">
              <img src="/images/<?php if(isset($this->fotos[0])){
                                      echo 'apartamentos/thumbs/' . $this->fotos[0]->img_caminhoimagem;
                                  }else{ ?>hotel_padrao.gif<?php } ?>">
            </a>
            <h4>
              <a title="" href="#">Comentários (<?php echo count($this->comentarios);?>)</a>
            </h4>
          </div>
          <div class="info_hotel">
            <ul>
              <li>
                <a title="<?php echo $this->apartamento->tap_nome;?>" href="#">
                  <?php echo $this->apartamento->tap_nome; ?>
                </a>
              </li>
            </ul>
          </div>
          
          <div class="preco_apartamento">
            <ul>
              <li>
                 diárias a partir de:
              </li>
              <li>
                <strong>
                  <span>R$</span>
                  <?php 
                    echo number_format($this->apartamento->tarifa_minima,2,',','.'); 
                  ?>
                </strong>
              </li>
            </ul>
          </div>
        
        </div>
      
        <!-- INICIO INFORMACOES APARTAMENTO-->
        <div class="widget" id="tabvanilla">
          <ul class="tabnav ui-tabs-nav">
            <li class="">
              <a href="#informacoes_aba">INFORMAÇÕES</a>
            </li>
            <li class="">
              <a href="#fotos_aba">FOTOS</a>
            </li>
            <li class="">
              <a href="#comentarios_aba">COMENTÁRIOS</a>
            </li>
          </ul>
          <!-- TAB INFORMARCOES-->
          <div class="tabdiv ui-tabs-panel ui-tabs-hide" id="informacoes_aba" style="">
            <p class="informacoes_aba">
                <strong>
                  <!-- TITULO -->
                  <?php echo $this->apartamento->tap_nome; ?>
                </strong>
                <br>
                  <!-- DESCRICAO -->
                  <?php echo $this->apartamento->tap_descricao; ?>
                <br>
            </p>
						
						<h5>Dados Adicionais:</h5>
						<?php echo $this->da_exibicao; ?>
            </p>
          </div>
          <!-- TAB FOTOS-->
          <div class="tabdiv ui-tabs-panel ui-tabs-hide" id="fotos_aba">
              <?php if(isset($this->fotos[0])) { ?>
                  <p>Clique para ampliar</p>
                  <ul class="contemfloat">
                    <?php foreach($this->fotos as $foto){ ?>
                      <li>
                        <a title="APARTAMENTO" href="#">
                          <img src="/images/apartamentos/thumbs/<?php echo $foto->img_caminhoimagem; ?>">
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
                            echo $comentario->com_nome ?> |</strong>
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
  </body>
</html>  