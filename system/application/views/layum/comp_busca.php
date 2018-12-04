
        <div id="busca">
          <ul>
            <li id="busca-carro" class="busca-item active">
              <div class="busca-esq">
                <div class="busca-esq-in"></div>
              </div>
              <div class="busca-dir">
                <div class="busca-dir-in"></div>
              </div>
              <h3><a href="#" title="">Aluguel de Carros</a></h3>
              <div class="form-cont">
                <form action="" method="get">
                  <fieldset>
                    <ul class="opcoes">
                      <li class="maior">
                        <label for="cidade_retirada">Cidade de Retirada:</label>
                        <input type="text" id="cidade_retirada" name="cidade_retirada" value="" class="autocomplete-cidade" />
                      </li>
                      <li class="maior">
                        <label for="cidade_devolucao">Cidade de Devolução:</label>
                        <input type="text" id="cidade_devolucao" name="cidade_devolucao" value="" class="autocomplete-cidade" />
                      </li>
                      <li class="devolucao">
                        <ul>
                          <li>
                            <label for="mesma_cidade" class="radio">
                              <input type="radio" name="cidade" id="mesma_cidade" value="mesma_cidade" checked="checked" />
                              Devolver na mesma cidade
                            </label>
                          </li>
                          <li>
                            <label for="cidade_diferente" class="radio last">
                              <input type="radio" name="cidade" value="cidade_diferente" id="cidade_diferente" />
                              Devolver em cidade diferente
                            </label>
                          </li>
                        </ul>
                      </li>
                      <li class="menor">
                        <label for="data_retirada">Data Retirada:</label>
                        <input type="text" id="data_retirada" name="data_retirada" class="data_retirada" value="" />
                      </li>
                      <li class="menor">
                        <label for="hora_retirada">Hora Retirada:</label>
                        <select name="hora_retirada" id="hora_retirada">
                        <?php for($i = 0; $i <= 96; $i++){
                                $add = $i * 15;
                                $hora = date('H:i', mktime('00','00'+$add,'00','12','25','2010'));
                        ?>
                          <option <?php if($hora=="12:00"){echo 'selected="selected"';}?> value="<?php echo $hora;?>"><?php echo $hora;?></option>
                        <?php }?>
                        </select>
                      </li>
                      <li class="menor">
                        <label for="data_devolucao">Data Devolução:</label>
                        <input type="text" name="data_devolucao" id="data_devolucao" class="data_devolucao" value="" />
                      </li>
                      <li class="menor">
                        <label for="hora_devolucao">Hora Devolução:</label>
                        <select name="hora_devolucao" id="hora_devolucao">
                        <?php for($i = 0; $i <= 96; $i++){
                                $add = $i * 15;
                                $hora = date('H:i', mktime('00','00'+$add,'00','12','25','2010'));
                        ?>
                          <option <?php if($hora=="12:00"){echo 'selected="selected"';}?> value="<?php echo $hora;?>"><?php echo $hora;?></option>
                        <?php }?>
                        </select>
                      </li>
                      <li class="maior">
                        <label for="locadora">Locadora:</label>
                        <select name="locadora" class="texto_padrao" id="locadora">
                          <option value="">Todas</option>
   							<?php foreach ($this->loc_combo as $id => $nome) { ?>
                          		<option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
                            <?php } ?>
   						</select>
                      </li>
                      <li class="maior">
                        <label for="categoria">Categoria:</label>
                        <select name="categoria" id="categoria">
                          <option value="">Todas</option>
                          <?php foreach ($this->cat_combo as $id => $nome) { ?>
                          		<option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
                          <?php } ?>
                        </select>
                      </li>
                    </ul>
                    <ul class="forma">
                      <li>
                        <label>Forma de Pagamento:</label>
                        <ul>
                          <li>
                            <label for="cartao" class="radio">
                              <input type="radio" name="pagamento" id="cartao" value="cartao" checked="checked" />
                              Cartão de Crédito
                            </label>
                          </li>
                          <li>
                            <label for="faturamento" class="radio last">
                              <input type="radio" id="faturamento" name="pagamento" value="faturamento" />
                              Faturamento
                            </label>
                          </li>
                        </ul>
                        <div id="carro-forma-cc" class="active">
                          <p>Locadoras para Cartão de Crédito</p>
                          <ul>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                          </ul>
                        </div>
                        <div id="carro-forma-f">
                          <p>Locadoras para Faturamento</p>
                          <ul>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                            <li><img src="" alt="" title="" /></li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                    <button type="submit">Pesquisar</button>
                  </fieldset>
                </form>
              </div>
            </li>
            <li id="busca-hotel" class="busca-item">
              <div class="busca-esq">
                <div class="busca-esq-in"></div>
              </div>
              <div class="busca-dir">
                <div class="busca-dir-in"></div>
              </div>
              <h3><a href="##hoteis" title="">Hotéis</a></h3>
              <div class="form-cont">
	            <form action="" method="get">
	              <fieldset>
	                <p><strong>Em atualização.</strong></p>
	              </fieldset>
	            </form>
              </div>
            </li>
            <li id="busca-passagem" class="busca-item">
              <div class="busca-esq">
                <div class="busca-esq-in"></div>
              </div>
              <div class="busca-dir">
                <div class="busca-dir-in"></div>
              </div>
              <h3><a href="##hoteis" title="">Passagens</a></h3>
              <div class="form-cont">
	              <form action="" method="get">
	                <fieldset>
	                  <p><strong>Em atualização.</strong></p>
	                </fieldset>
	              </form>
              </div>
            </li>
          </ul>
        </div>
        