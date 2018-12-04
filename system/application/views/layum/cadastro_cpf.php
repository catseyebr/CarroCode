<?php $this->load->view(SITE.'/header'); ?>
  <body id="cadastro_pessoafisica" class="cadastro">

    <div id="page">
      <div id="content">
      <?php
        	$this->load->view(SITE.'/topo');
        	$this->load->view(SITE.'/menu');
        ?>
        <h1>Cadastro de Pessoa Física</h1>
        
        <form action="" id="novo-cliente">
					<ul id="tipos_cadastro_pf">
						<li>
							<label>
								<input type="radio" name="tipo" id="tipo_nac" value="nacional" />
								Brasileiro
							</label>
						</li>
						<li>
							<label>
								<input type="radio" name="tipo" id="tipo_internac" value="internacional" />
								Estrangeiro
							</label>
						</li>
					</ul>
          <fieldset id="pessoal">
            <div class="cont">
	            <h3>Informações Pessoais</h3>
	            
	            <ul class="contemfloat">
	              <li class="primeiro  linha">
	                <label for="sexo">Sexo:</label>
	                <ul id="sexo">
	                  <li>
	                    <label>
	                      <input type="radio" name="sexo" id="sexo_m" />
	                      Masc.
	                    </label>
	                  </li>
	                  <li>
	                    <label>
	                      <input type="radio" name="sexo" id="sexo_f" />
	                      Fem.
	                    </label>
	                  </li>
	                </ul>
	              </li>
	              <li class="primeiro">
	                <label for="nome">Nome:</label>
	                <input type="text" name="nome" id="nome" />
	              </li>
	              <li>
	                <label for="sobrenome">Sobrenome:</label>
	                <input type="text" name="sobrenome" id="sobrenome" />
	              </li>
	              <li class="primeiro linha">
	                <label for="nascimento">Data de nascimento:</label>
	                <input type="text" name="nascimento" id="nascimento" />
	              </li>
	              <li class="primeiro cont-rg">
	                <label for="rg">RG:</label>
	                <input type="text" name="rg" id="rg" />
	              </li>
	              <li class="cont-cpf">
	                <label for="cpf">CPF:</label>
	                <input type="text" name="cpf" id="cpf" />
	              </li>
	            </ul>
	          </div>
          </fieldset>
					          
          <fieldset id="endereco" class="nac">
            <div class="cont">
            <h3>Endere&ccedil;o</h3>
	            <ul class="contemfloat">
	              <li id="cep-cont" class="primeiro">
	                <label for="cep">CEP:</label>
	                <input type="text" name="cep" id="cep" />

	              </li>
	              <li>
	                <label for="logradouro">Endere&ccedil;o:</label>
	                <input type="text" name="logradouro" id="logradouro" />
	              </li>
	              <li class="primeiro">
	                <label for="numero">N&uacute;mero:</label>

	                <input type="text" name="numero" id="numero" />
	              </li>
	              <li>
	                <label for="complemento">Complemento:</label>
	                <input type="text" name="complemento" id="complemento" />
	              </li>
	              <li>
	                <label for="bairro">Bairro:</label>

	                <input type="text" name="bairro" id="bairro" />
	              </li>
	              <li class="primeiro">
	                <label for="pais">Pa&iacute;s:</label>
	                <select name="pais" id="pais" disabled="disabled">
	                   <option value="1">Brasil</option>
	                </select>

	              </li>
	              <li>
	                <label for="estado">Estado:</label>
	                <select name="estado" id="estado">
	                   <option value=""></option>
	                </select>
	              </li>
	              <li>

	                <label for="cidade">Cidade:</label>
	                <select name="cidade" id="cidade">
	                   <option value=""></option>
	                </select>
	              </li>
	            </ul>
            </div>
          </fieldset>

          <fieldset id="contatos">
            <div class="cont">      
            <h3>Telefones</h3>
            	<ul class="contemfloat">
            		<li class="primeiro">
            			<label for="tel-residencial">Tel. Residencial</label><input type="text" name="tel-residencial" id="tel-residencial" />
								</li>
            		<li>
            			<label for="tel-comercial">Tel. Comercial</label><input type="text" name="tel-comercial" id="tel-comercial" />
								</li>
            		<li class="primeiro">
            			<label for="tel-celular">Tel. Celular</label><input type="text" name="tel-celular" id="tel-celular" />
								</li>
            	</ul>
	          </div>
          </fieldset>
					<fieldset id="novo-usuario">
						<div class="cont">
	            <h3>Informações de acesso</h3>
	            <ul class="contemfloat dados-acesso">
	              <li class="primeiro">
	                <label for="email">E-mail:</label><input type="text"  name="email" id="email" />
	              </li>
	              <li>
	                <label for="conf_email">Confirmar e-mail:</label><input type="text" name="conf_email" id="conf_email" />
	              </li>
	              <li class="primeiro linha">
	                <label for="usuario-cadastro">Usu&aacute;rio:</label><input type="text" name="usuario-cadastro" id="usuario-cadastro" />
	              </li>
	              <li class="primeiro"><label for="senha-cadastro">Senha:</label><input type="text" name="senha-cadastro" id="senha-cadastro" /></li>
	              <li><label for="conf_senha-cadastro">Confirmar senha:</label><input type="text" name="conf_senha-cadastro" id="conf_senha-cadastro" /></li>
	            </ul>
						</div>
					</fieldset>
					<p class="botoes contemfloat"><button type="button" id="btn_cancelar">CANCELAR</button><button type="submit" id="btn_cadastrar">CADASTRAR</button></p>
        </form>
      </div>

            <?php  $this->load->view(SITE.'/rodape'); ?>
        </div>
      </div>
          </div>
  </body>
</html>