<div id="busca">
  <form method="post" id="frmBusca" action="/pesquisa">
    <fieldset class="contemfloat">
      <ol>
        <li class="por contemfloat">
          <p>Pesquisar por:</p>
          <label><input name="pesquisar_por" id="busca_cidade" type="radio" value="c" <?php if ($this->session->userdata('fbusca_pesquisar_por') != 'h') { ?> checked="checked" <?php }?> class="pesquisar" /> Cidade</label>
          <label><input name="pesquisar_por" id="busca_hotel" type="radio" value="h" <?php if ($this->session->userdata('fbusca_pesquisar_por') == 'h') { ?> checked="checked" <?php }?>class="pesquisar" /> Hotel</label>
        </li>
        <li>
          <input type="text" id="autocompletehotel"  value="<?php echo $this->session->userdata('fbusca_autocompletehotel') ?>" name="autocompletehotel" class="texbox" <?php if ($this->session->userdata('fbusca_pesquisar_por') != 'h') { ?> style="display: none;" <?php }?> />
          <input type="text" id="autocompletecidade"  value="<?php echo $this->session->userdata('fbusca_autocompletecidade'); ?>" name="autocompletecidade" class="texbox" <?php if ($this->session->userdata('fbusca_pesquisar_por') == "h") { ?> style="display: none;" <?php }?> />
        </li>
        <li class="checkin">
          <label>Check In</label>
          <input type="text" value="<?php echo $this->session->userdata('fbusca_retiradaini'); ?>" name="retiradaini" id="retiradaini" class="texbox" />
        </li>
        <li class="checkout">
          <label>Check Out</label>
          <input type="text" value="<?php echo $this->session->userdata('fbusca_retiradafim'); ?>" name="retiradafim" id="retiradafim" class="texbox" />
        </li>
        <li class="apartamentos">
          <div class="contemfloat">
            <div class="quantidade">
              <p>Quantidade</p>
              <select id="quantidade_apartamentos" name="quantidade_apartamentos">
                <?php for ($i = 1; $i <= 5; $i++) {?> 
                  <option value="<?php echo $i?>" <?php if ($this->session->userdata('fbusca_quantidade_apartamentos') == $i) {?> selected="selected" <?php } ?>><?php echo $i?> apartamento(s)</option>
                <?php } ?>
              </select>
            </div>
            <div>
              <p>Apartamento</p>
              <div class="item_1">
                <div>
                  <?php if (intval($this->session->userdata('fbusca_quantidade_apartamentos')) > 0) {
                      $fbusca_tipo_apartamento = $this->session->userdata('fbusca_tipo_apartamento');
                      for ($i = 1, $s = intval($this->session->userdata('fbusca_quantidade_apartamentos')); $i <= $s; $i++) {
                  ?>
                  <select id="tipo_apartamento_<?php echo $i; ?>" name="tipo_apartamento[]" class="tipo_ap">
                    <?php for ($j = 0, $c = count($this->cat_aptos) -1; $j <= $c; $j++) {?> 
                      <option value="<?php echo $this->cat_aptos[$j]->cap_id?>" <?php if ($this->cat_aptos[$j]->cap_id == $fbusca_tipo_apartamento[$i - 1]) {?> selected="selected" <?php }?>><?php echo $this->cat_aptos[$j]->cap_nome ?></option>
                    <?php } ?>
                  </select>
                  <?php }} else { ?>
                  <select id="tipo_apartamento_1" name="tipo_apartamento[]" class="tipo_ap">
                    <?php for ($i = 0, $s = count($this->cat_aptos) -1; $i <= $s; $i++) {?> 
                      <option value="<?php echo $this->cat_aptos[$i]->cap_id?>"><?php echo $this->cat_aptos[$i]->cap_nome ?></option>
                    <?php } ?>
                  </select>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <p class="mais">* Para reservas de mais de 5 apartamentos, por favor entre em contato pela <a href="/sac">central telefônica</a>.</p>
        </li>
      </ol>
      <button type="submit">Pesquisar Hotel</button>
      <input type="hidden" name="np" id="np" value="1" />
      <div class="enfeite"></div>
    </fieldset>
  </form>
</div>