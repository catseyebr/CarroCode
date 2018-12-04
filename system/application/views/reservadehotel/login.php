<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
  <?php $this->load->view('header'); ?>
  <body>
    <div id="page">
      <?php 
		    $this->load->view('topo');
		  ?>
      <!-- INICIO CONTEUDO BUSCA -->
      <div id="content">
        <div class="cont">
        <div id="content_login">
          <div id="login_senha">
            <div id="login">                                          
              <h3>Já Sou Cadastrado</h3>                                          
              <form method="post" id="contato11" action="">                              
                <fieldset>
                  <label>
                    <input value="" name="user" id="user" class="box_login" type="text" /><br />
                  </label>
                  <label>
                    <input value="" name="pass" id="pass" class="box_login" type="password" /><br /><br />
                  </label>
                </fieldset>
                <a href="/login/esqueci" title="Recupere a sua senha">// Esqueci minha senha</a><br /><br />
                <input src="/images/entrar.png" type="image" />
              </form>
            </div>                                                          
            <div id="fazer_cadastro">                                                          
              <h3>Não Estou Cadastrado</h3>
              <p>O cadastro é simples e rápido. Obrigado.</p>
              <a href="/cliente/inserir" title="Iniciar cadastro">
                <img src="/images/prossiga_seta_laranja.png">
              </a>
            </div>
          </div>
				</div>
      </div>
      </div>  
    </div> 
    <?php $this->load->view('rodape');?>
    <!-- FIM RODAPE -->
  </body>
</html>
