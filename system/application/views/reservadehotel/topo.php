<div id="topo" class="contemfloat">
  <div class="cont">
    <div id="menun_cima" class="contemfloat">
        <ul>
            <li class="first"><a href="#" title="Conheça Reserva de Hotel OnLine">Institucional</a></li>
            <li><a href="#" title="Conheça nossa política">Política do Site</a></li>
            <li class="last"><a href="/sac" title="Entre em contato">Fale Conosco</a></li>
            <!-- <li><a href="#" title="Escolha a versão do site"><img src="/images/linguas.jpg" /></a></li> -->
        </ul>
    </div>
    <div id="atendimento">
        <!-- http://www.LiveZilla.net Chat Button Link Code --><a href="javascript:void(window.open('http://www.carroaluguel.com/suporte/livezilla.php','','width=600,height=600,left=0,top=0,resizable=yes,menubar=no,location=yes,status=yes,scrollbars=yes'))"><img src="/images/icon_chat_over.png" /></a><noscript><div><a href="http://www.carroaluguel.com/suporte/livezilla.php" target="_blank">Start Live Help Chat</a></div></noscript><!-- http://www.LiveZilla.net Chat Button Link Code --><!-- http://www.LiveZilla.net Tracking Code --><div id="livezilla_tracking" style="display:none"></div><script language="JavaScript" type="text/javascript">var script = document.createElement("script");script.type="text/javascript";var src = "http://www.carroaluguel.com/suporte/server.php?request=track&output=jcrpt&nse="+Math.random();setTimeout("script.src=src;document.getElementById('livezilla_tracking').appendChild(script)",1);</script><!-- http://www.LiveZilla.net Tracking Code -->
    </div>
    <?php if (!empty ($this->usuario->usu_id)) { ?>
    <div id="usuario-logado">
      Olá <?php echo $this->usuario->usu_nome ?>. <a href="/logout">sair</a>
    </div>
    <?php } ?>
  </div>
  <?php $this->load->view(SITE.'/menu'); ?>
</div>