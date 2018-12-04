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

                <form action="/pesquisa" method="post">
                  <fieldset>
                    <ul class="opcoes">
                      <li class="maior">
                        <label for="cityRetirada">Cidade de Retirada:</label>
                        <input value="" id="cityRetirada" name="cityRetirada" onclick="if(this.value=='Digite Cidade de Retirada'){this.value=''}" onblur="if(this.value==''){this.value='Digite Cidade de Retirada'}else{document.getElementById('cityDevolucao').value=this.value}"/>
                      </li>
                      <li class="maior">

                        <label for="cityDevolucao">Cidade de Devolução:</label>
                        <input value="" id="cityDevolucao" name="cityDevolucao" onclick="if(this.value=='Digite Cidade de Devolução'){this.value=''}" />
                      </li>
                      <li class="devolucao">
                        <ul>
                          <li>
                            <label for="mesma_cidade" class="radio">
                              <input type="radio" name="cidade" id="selecDevolucao" value="mesma_cidade" checked="checked" />

                              Devolver na mesma cidade
                            </label>
                          </li>
                          <li>
                            <label for="cidade_diferente" class="radio last">
                              <input type="radio" name="cidade" value="cidade_diferente" id="selecDevolucao" />
                              Devolver em cidade diferente
                            </label>
                          </li>
                        </ul>

                      </li>
                      <li class="menor">
                        <label for="dataRetirada">Data Retirada:</label>
                        <input type="text" id="dataRetirada" name="dataRetirada" class="data_retirada" value="" />
                      </li>
                      <li class="menor">
                        <label for="horaRetirada">Hora Retirada:</label>
                        <select name="horaRetirada" id="horaRetirada">
                        <option value="">Hora Retirada</option>
<?php foreach ($this->arrayHoras as $horas){?>
								<option value="<?php echo $horas?>"><?php echo $horas?></option>
								<?php }?>
                     </select>
                      </li>
                      <li class="menor">
                        <label for="dataDevolucao">Data Devolução:</label>
                        <input type="text" name="dataDevolucao" id="dataDevolucao" class="data_devolucao" value="" />
                      </li>
                      <li class="menor">

                        <label for="horaDevolucao">Hora Devolução:</label>
                        <select name="horaDevolucao" id="horaDevolucao">
                        <option value="">Hora Devolução</option>
                                                 <?php foreach ($this->arrayHoras as $horas){?>
								<option value="<?php echo $horas?>"><?php echo $horas?></option>
								<?php }?>
                                                </select>
                      </li>
                      <li class="maior">
                        <label for="selecionaLocadora">Locadora:</label>

                        <select name="selecionaLocadora" class="texto_padrao" id="selecionaLocadora">
                        <option value="todas">Todas as Locadoras</option>
                          <?php foreach($this->menu->locadoras as $locadoras_menu => $links){?>
                                	<option value="<?php echo $links->id;?>"><?php echo $links->link_titulo;?></option>
               					<?php } ?>
                               						</select>
                      </li>
                      <li class="maior">
                        <label for="categoriasVeiculos">Categoria:</label>

                        <select name="categoriasVeiculos" id="categoriasVeiculos">
                          <option value="todas">Todas as Categorias</option>
                                <?php foreach($this->menu->categorias as $categorias_menu => $links_cat){?>
                                	<option value="<?php echo $links_cat->cat_id;?>"><?php echo $links_cat->cat_nome;?></option>
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
                          	<?php 
							$i=0;
							foreach($this->menu->locadoras as $locadoras_menu => $links){?>
                            <li><img src="/images/locadoras/pq_locadora_<?php echo $links->id;?>.png" alt="<?php echo $links->link_titulo;?>" title="<?php echo $links->link_titulo;?>" /></li>
                            <?php $i++;if($i >= 15)break;} ?>
                          </ul>
                        </div>
                        <div id="carro-forma-f">
                          <p>Locadoras para Faturamento</p>
                          <ul>
                           <?php foreach($this->menu->locadoras as $locadoras_menu => $links){?>
                            <li><img src="/images/locadoras/pq_locadora_<?php echo $links->id;?>.png" alt="<?php echo $links->link_titulo;?>" title="<?php echo $links->link_titulo;?>" /></li>
                            <?php } ?>
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
        