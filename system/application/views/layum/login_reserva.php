<?php $this->load->view(SITE.'/header'); ?>
  <body id="acesso">

    <div id="page">
      <div id="content">

          <?php
        	$this->load->view(SITE.'/topo');
        	$this->load->view(SITE.'/menu');
        ?>
                <h1>Acesse sua conta</h1>
        <p class="info">Para prosseguir com a reserva, é necessário efetuar seu cadastro.</p>

        
        <form action="" class="contemfloat tres_colunas">
          <fieldset id="acesso-login" class="box">
            <h3>Acesso Cliente</h3>
            <ul>
              <li>
                <label for="acesso-usuario">Usuário:</label>
                <input type="text" name="acesso-usuario" id="acesso-usuario" />
              </li>

              <li>
                <label for="acesso-senha">Senha:</label>
                <input type="password" name="acesso-senha" id="acesso-senha" />
              </li>
            </ul>
            <p class="esqueci"><a href="#">Esqueci minha senha</a></p>
            <button type="submit">Acessar</button>

          </fieldset>
          <fieldset id="cadastrar" class="box">
            <h3>Cadastre-se</h3>
            <p>Ainda não possui sua conta?<br />
            Clique no botão abaixo.</p>
            <button type="button">Cadastrar</button>
          </fieldset>

          <fieldset id="acesso-reserva" class="box">
            <h3>Sua Reserva</h3>
            <dl>
	            <dt>Locadora:</dt>
	            <dd>Movida</dd>
							<dt>Categoria:</dt>
							<dd>Basico com Ar</dd>

							<dt>Total de Diárias:</dt>
							<dd>1</dd> 
							<dt>Valor Diárias:</dt>
							<dd>R$ 1.000,00</dd>
							<dt>Valor Proteção:</dt>
							<dd>Incluso</dd>

							<dt>Taxa (10.00%):</dt>
							<dd>R$ 9,30</dd>
							<dt>Valor Total:</dt>
							<dd>R$ 1102.30</dd>
            </dl>
            <button type="button">Refazer</button>

          </fieldset>
        </form>

      </div>
            <?php  $this->load->view(SITE.'/rodape'); ?>
        </div>
      </div>
          </div>

  </body>
</html>