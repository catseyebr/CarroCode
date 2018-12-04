<?php $this->load->view(SITE.'/header'); ?>
  <body id="finalizacao">

    <div id="page">
      <div id="content">
		<?php
        	$this->load->view(SITE.'/topo');
        	$this->load->view(SITE.'/menu');
        ?>
        
        <form action="">
          <fieldset>
            <div class="corner cor_e4e3e3 top_left"></div>

            <div class="corner cor_e4e3e3 top_right"></div>
            <div class="corner cor_e4e3e3 bot_left"></div>
            <div class="corner cor_e4e3e3 bot_right"></div>
            <div class="cont">
	            <h3>InformaÃ§Ãµes do condutor</h3>
	            <h4>Dados do Cliente</h4>
	            <div id="dados_cliente" class="subcont">
		            <dl>

			            <dt class="nl">Nome:</dt>
									<dd>Abreu Castro</dd>
									<dt>CPF:</dt>
									<dd>058.452.985-46</dd>
									<dt class="nl">EndereÃ§o:</dt>
									<dd>Av. Nossa Senhora da Luz, nÂº 2014, ap 35</dd>

									<dt>Bairro:</dt>
									<dd>Bacacheri</dd>
									<dt class="nl">Cidade - UF:</dt>
									<dd>Curitiba - PR</dd>
									<dt>CEP:</dt>
									<dd>80045-620</dd>

									<dt class="nl">Telefone:</dt>
									<dd>(41) 3030-3030</dd>
									<dt>Celular:</dt>
									<dd>(41) 9191-9191</dd>
									<dt class="nl">Email:</dt>
									<dd>abreucastro@gmail.com</dd>

		            </dl>
	            </div>
              <h4>Dados do Condutor</h4>
              <div id="condutor" class="condutores subcont">
	              <ul>
                    <li>
                      <label><input type="radio" name="condutor" id="condutor_1" value="1" /> NOME DO CONDUTOR</label>

                    </li>
                    <li>
                      <label><input type="radio" name="condutor" id="condutor_2" value="2" /> NOME DO CONDUTOR</label>
                    </li>
                    <li>
                      <label><input type="radio" name="condutor" id="condutor_3" value="3" /> NOME DO CONDUTOR</label>
                    </li>

	              </ul>
                <button type="button" class="cadastrar">Cadastrar</button>
              </div>
              <h4>Dados do Condutor Adicional</h4>
              <div id="condutor_ad" class="condutores subcont">
                <div class="novo">
                  <p><input type="text" /></p>
                  <p><input type="text" /></p>

                </div>
	              <button type="button" class="inserir">Inserir</button>
	              <button type="button" class="cancelar">Cancelar</button>
	            </div>
	            <h4>InformaÃ§Ãµes da Chegada</h4>
	            <div id="info_voo" class="subcont">
		            <p>A informaÃ§Ã£o de chegada em aeroporto atravÃ©s de companhia aÃ©rea Ã© fundamental para que a locadora saiba o horÃ¡rio e mantenha sua reserva no caso de atrasos. Se nÃ£o houver a informaÃ§Ã£o do voo, a reserva serÃ¡ mantida por apenas 1 hora em relaÃ§Ã£o ao horÃ¡rio de retirada informado.</p>

		            <p id="nao_voo_cont"><label><input type="checkbox" name="nao_voo" id="nao_voo" /> NÃ£o chegarei de aviÃ£o / NÃ£o tenho informaÃ§Ã£o de chegada no momento.</label></p>
		            <div class="dados_voo">
		              <ul>
		                <li>
		                  <label for="companhia_aerea">Companhia AÃ©rea:</label>
		                  <input type="text" name="companhia_aerea" id="companhia_aerea" />
		                </li>

		                <li>
		                  <label for="num_voo">Voo:</label>
		                  <input type="text" name="num_voo" id="num_voo" />
		                </li>
		              </ul>
		            </div>
		          </div>
	          </div>

          </fieldset>
          <fieldset>
            <div class="corner cor_e4e3e3 top_left"></div>
            <div class="corner cor_e4e3e3 top_right"></div>
            <div class="corner cor_e4e3e3 bot_left"></div>
            <div class="corner cor_e4e3e3 bot_right"></div>
            <div class="cont">
	            <h3>InformaÃ§Ãµes da reserva</h3>

	            <h4>Geral</h4>
	              <div id="dados_gerais" class="subcont contemfloat">
		              <dl id="geral-valores">
		                <dt>Total de DiÃ¡rias:</dt>
		                <dd>1</dd> 
		                <dt>Valor DiÃ¡rias:</dt>
		                <dd>R$ 1.000,00</dd>

		                <dt>Valor ProteÃ§Ã£o:</dt>
		                <dd>Incluso</dd>
		                <dt>Taxa (10.00%):</dt>
										<dd>R$ 9,30</dd>
		              </dl>
		              <div id="geral-dir">
			              <p><strong>Locadora:</strong> <img src="aaa.aaa" alt="aaa" /></p>

			              <p>
			               <strong>CartÃµes aceitos:</strong>
			               <img src="aaa.aaa" alt="" />
			               <img src="aaa.aaa" alt="" />
			               <img src="aaa.aaa" alt="" />
			              </p>
		                <p id="geral-total"><strong>Valor Total:</strong> <span>R$ 1102,30</span></p>

                  </div>
		            </div>
              <h4>VeÃ­culo</h4>
              <div id="veiculo" class="subcont contemfloat">
	              <dl>
		              <dt>Categoria:</dt>
		              <dd>BÃ¡sico com Ar</dd>

		              <dt>Grupo:</dt>
		              <dd>B</dd>
		              <dt>Kilometragem:</dt>
		              <dd>Km Livre</dd>
		              <dt>Parcelamento:</dt>
		              <dd>atÃ© 6x sem juros</dd>

		              <dt>Parcela mÃ­nima:</dt>
		              <dd>R$ 40,00</dd>
		              <dt>CauÃ§Ã£o <a href="#" class="info_icon">(?)</a>:</dt>
		              <dd>R$ 1.000,00</dd>
		              <dt>Franquia do carro:</dt>

		              <dd>R$ 1.000,00</dd>
		              <dt>Franquia para terceiros:</dt>
		              <dd>R$ 2.000,00</dd>
	              </dl>
	              <img src="aaa.aaa" alt="" />
	              <ul>
	                <li class="quatro_portas">4 portas</li>

	                <li class="ar_condicionado">Ar cond.</li>
	                <li class="cambio_automatico">C&acirc;mb auto.</li>
	                <li class="capacidade">5 pessoas</li>
	                <li class="cd_player">CD Player</li>
	                <li class="dir_hidraulica">Dir. hidr.</li>
	                <li class="km_livre">Km livre</li>

	                <li class="mala_grande">2 malas grandes</li>
	                <li class="mala_pequena">2 malas pequenas</li>
	                <li class="motor">motor 1.0</li>
	                <li class="promocional">Promo&ccedil;&atilde;o</li>
	                <li class="trio_eletrico">Trio el&eacute;trico</li>

	              </ul>
	            </div>
              <h4>Locais de Retirada e DevoluÃ§Ã£o</h4>
              <div id="locais" class="subcont">
	              <p class="retirada"><strong>Data e Hora de Retirada: 09/07/2010, Sexta-feira, 12:15 - Rio de Janeiro</strong><br />
	              GIG | Aeroporto Internacional AntÃ´nio Carlos Jobim/GaleÃ£o | Av. Vinte de Janeiro, s/n - (terminal 1 - Setor Verde)</p>
	              <p class="devolucao"><strong>Data e Hora de Retirada: 09/07/2010, Sexta-feira, 12:15 - Rio de Janeiro</strong><br />

	              GIG | Aeroporto Internacional AntÃ´nio Carlos Jobim/GaleÃ£o | Av. Vinte de Janeiro, s/n - (terminal 1 - Setor Verde)</p>
	            </div>
              <h4>ProteÃ§Ã£o</h4>
              <div id="protecao" class="subcont">
	              <p><strong>Ampliada Movida</strong><br /> 
	              LDW: ProteÃ§Ã£o contra roubo, furto, incÃªndio e perda total do veÃ­culo, danos e ou avarias causados ao veÃ­culo por colisÃµes ou acidentes, cabendo ao locatÃ¡rio, arcar apenas com a co-participaÃ§Ã£o estabelecida no contrato de locaÃ§Ã£o de R$ 1.000,00. ALI: proteÃ§Ã£o contra danos materiais e pessoais causados a terceiros em razÃ£o de acidentes com o veÃ­culo locado, cabendo ao locatÃ¡rio, arcar apenas com a co-participaÃ§Ã£o estabelecida no contrato de locaÃ§Ã£o de R$ 2.000,00. Cobertura de danos materiais R$ 150.000,00 e danos pessoais R$ 300.000,00.</p>
	            </div>

              <h4>Opcionais</h4>
              <div id="opcionais" class="subcont">
	              <ul>
	                <li>Localizador GPS</li>
	              </ul>
	            </div>
            </div>
          </fieldset>

          <fieldset>
            <div class="corner cor_e4e3e3 top_left"></div>
            <div class="corner cor_e4e3e3 top_right"></div>
            <div class="corner cor_e4e3e3 bot_left"></div>
            <div class="corner cor_e4e3e3 bot_right"></div>
            <div class="cont">
	            <h3>InformaÃ§Ãµes finais</h3>
	            <h4>Importante</h4>

	            <div id="importante" class="subcont">
		            <ol>
		              <li><span>O condutor deverÃ¡ ser o titular do cartÃ£o de crÃ©dito.</span></li>
		              <li><span>O pagamento atravÃ©s de cartÃ£o de crÃ©dito serÃ¡ realizado diretamente na loja, no momento da retirada do veÃ­culo.</span></li>
		              <li><span>Taxa de retorno poderÃ¡ ser aplicada no caso de devoluÃ§Ã£o do veÃ­culo em cidades diferentes da cidade de retirada: variam entre R$0,80 a R$ 0,96 por km rodado.</span></li>
		            </ol>
		          </div>

	            <h4>Termos e condiÃ§Ãµes gerais de locaÃ§Ã£o</h4>
	            <div id="termos" class="subcont">
		            <div class="corner cor_ffffff top_left"></div>
		            <div class="corner cor_ffffff top_right"></div>
		            <div class="corner cor_ffffff bot_left"></div>
		            <div class="corner cor_ffffff bot_right"></div>
		            <div class="subsubcont">
		              <div class="text">

										<h5>LocaÃ§Ã£o</h5>
										<p>Os veÃ­culos sÃ£o reservados por grupo e nÃ£o por marca ou modelo.</p>
										<p>Se, por ocasiÃ£o da locaÃ§Ã£o do veÃ­culo, o grupo reservado nÃ£o estiver disponÃ­vel, o cliente poderÃ¡ receber um veÃ­culo de grupo superior, sem nenhum custo adicional.</p>
										<h5>ExigÃªncias para LocaÃ§Ã£o</h5>
										<ol>
											<li>Idade MÃ­nima: 21 anos;</li>

											<li>Possuir carteira de habilitaÃ§Ã£o hÃ¡ pelo menos 2 anos;</li>
											<li>Apresentar CPF e RG;</li>
											<li>
												Apresentar, impreterivelmente, um cartÃ£o de crÃ©dito, onde:
												<ol>
													<li>O locatÃ¡rio/condutor deverÃ¡ ser o titular do cartÃ£o de crÃ©dito apresentado;</li>
													<li>A tÃ­tulo de garantia, a locadora solicitarÃ¡ valor cauÃ§Ã£o no momento da retirada do veÃ­culo, realizando o bloqueio ou dÃ©bito no cartÃ£o de crÃ©dito informado, no valor aproximado de R$ 1.200,00 . Este valor cauÃ§Ã£o serÃ¡ devolvido/desbloqueado ao cartÃ£o de crÃ©dito do cliente ao final da locaÃ§Ã£o.</li>

											  </ol>
											</li>
											<li>LocaÃ§Ã£o sujeita a confirmaÃ§Ã£o das informaÃ§Ãµes cadastrais;</li>
											<li>O valor da diÃ¡ria inclui kilometragem livre;</li>
											<li>EstÃ£o incluÃ­das na diÃ¡ria o valor da proteÃ§Ã£o e taxas administrativas informadas;</li>
											<li>NÃ£o estÃ£o incluÃ­dos na diÃ¡ria e serÃ£o cobrados a parte: multas de trÃ¢nsito, combustÃ­vel e produtos e serviÃ§os opcionais. A cobranÃ§a de taxa aeroportuÃ¡ria poderÃ¡ ser aplicada em algumas localidades;</li>
											<li>ApÃ³s 59 minutos do horÃ¡rio estipulado para devoluÃ§Ã£o do veÃ­culo, serÃ¡ cobrada taxa estipulada pela locadora para cada hora adicional;</li>

											<li>O LocatÃ¡rio poderÃ¡ declarar e pagar a taxa para motorista adicional no momento do aluguel do veÃ­culo, indispensÃ¡vel para efeito de seguro. Motoristas adicionais estÃ£o sujeitos Ã s mesmas regras do locatÃ¡rio no que se refere Ã  idade do condutor, tempo de habilitaÃ§Ã£o e apresentaÃ§Ã£o de documentos. A locadora se reserva no direito de cobrar taxas por motorista adicional.</li>
											<li>Caso o veÃ­culo nÃ£o seja devolvido na loja da cidade em que o mesmo foi retirado, haverÃ¡ a possibilidade de cobranÃ§a de taxa de devoluÃ§Ã£o.</li>
											<li>Multas de trÃ¢nsito, avarias ou danos causados ao veÃ­culo locado serÃ£o consideradas extras e nÃ£o estÃ£o inclusas na tarifa, bem como taxas administrativas para cobranÃ§as referentes a esses itens.</li>
											<li>A existÃªncia de restriÃ§Ãµes contidas em consulta aos orgÃ£os SPC e Serasa, em nome do locatÃ¡rio e/ou condutor adicional, poderÃ£o ser verificadas pelas locadoras autorizando ou nÃ£o a liberaÃ§Ã£o da locaÃ§Ã£o.</li>
										</ol>
									</div>
		            </div>

		          </div>
		          <p id="aceitar_termos"><label><input type="checkbox" name="aceito" id="aceito" /> Li e aceito os termos e condiÃ§Ãµes.</label></p>
		          <div id="botoes">
			          <button type="button" id="retornar">Retornar</button>
			          <button type="submit" id="reservar">Reservar</button>
		          </div>
	           </div>

          </fieldset>
        </form>

      </div>
           <?php  $this->load->view(SITE.'/rodape'); ?>
          </div>

  </body>
</html>