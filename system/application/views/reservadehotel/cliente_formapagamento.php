<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
  <?php $this->load->view('header'); ?>
<body>
  <div id="page">
        <?php 
  		    $this->load->view('topo');
  		  ?>
    <div id="content">
      <div class="cont contemfloat">
        <?php $this->load->view('menu_cliente') ?>
          	
        <div id="reservas">
          <h3>Forma de Pagamento</h3>		
          <form action="/cliente/confirmarReserva" method="post">
            <fieldset>
              <ol>
                <li>
                  <label for="forma"><input type="radio" name="forma" id="forma_cartao" value="1" /> Cartão de crédito </label>
                </li>
                <li>
                  <label for="forma"><input type="radio" name="forma" id="forma_boleto" value="2" /> Boleto </label>
                </li>
              </ol>
            </fieldset>
            <button type="submit" id="confirma_atual">Confirmar</button>
          </form>
      </div> <!-- FIM DIV CONT -->
    </div> <!-- FIM DIV CONTENT -->
  </div><!-- FIM DIV PAGE -->
<?php $this->load->view('rodape'); ?>  
</body>
</html>