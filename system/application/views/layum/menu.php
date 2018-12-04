 <div id="menu">
          <div id="menu-esq"></div>
          <div id="menu-hover">
            <div id="menu-hover-esq"></div>
            <div id="menu-hover-dir"></div>
          </div>

          <ul>
            <li class="principal nivel1 default">
              <a href="/" title="Página Inicial">Layum Travel</a>
              <div class="nivel2_parent principal">
                <ul>
                  <li class="nivel2 "><a href="/sistema-rhlv" title="Sistema RHLV">Sistema RHLV</a></li>
                  <li class="nivel2 "><a href="/noticias" title="Blog de Notícias">Blog de Notícias</a></li>

                  <li class="nivel2 "><a href="/newsletters" title="Newsletters">Newsletters</a></li>
                  <li class="nivel2 "><a href="/contato" title="Entre em Contato">Entre em Contato</a></li>
                  <li class="nivel2 "><a href="/sac" title="SAC / Suporte">SAC / Suporte</a></li>
                </ul>
              </div>
            </li>
            <li class="hoteis nivel1 ">

              <a href="/embreve" title="Reservas de Hotéis - Em breve!">Reservas de Hotéis</a>
            </li>
            <li class="carros nivel1 ">
              <a href="#" title="Locações de Carros">Locações de Carros</a>
              <div class="nivel2_parent carros">
                <ul>
                  <li class="nivel2 ">
                    <a href="#" title="Nacionais">Nacionais</a>

                    <div class="nivel3_parent">
                          <ul>
                            <?php foreach($this->menu->locadoras as $locadoras_menu => $links){?>
                                <li><a href="/<?php echo $links->link;?>"><?php echo $links->link_titulo;?></a></li>
                            <?php } ?>
                         </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </li>

            <li class="aereo nivel1 ">
              <a href="/embreve" title="Passagens Aéreas - Em breve!">Passagens Aéreas</a>
            </li>
            <li class="vistos nivel1 ">
              <a href="/embreve" title="Vistos &amp; Passaportes - Em breve!">Vistos &amp; Passaportes</a>
            </li>
            <li class="cruzeiro nivel1 ">

              <a href="/embreve" title="Cruzeiros Marítmos - Em breve!">Cruzeiros Marítmos</a>
            </li>
          </ul>
          <div id="menu-dir"></div>
        </div>