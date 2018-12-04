<?php include "common.php";
require_once ("Connections/carroaluguel.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">

<head>
<style>
#sua_cidade,
#outra_cidade { width: 400px; margin-top: 35px; background: #F3F3F3;}
#sua_cidade h3,
#outra_cidade h3 { font-size: 20px; color: #FFFFFF; background: #5FCCF6; }
#sua_cidade p,
#outra_cidade p { padding: 15px 20px; }
#sua_cidade label,
#outra_cidade label { font-weight: bold; margin-right: 20px; }

 
#sua_cidade { float: left; }
#sua_cidade #cont_slider { padding-top: 50px; background: url(../images/slider_fundo.gif); }
#sua_cidade input { background: #FFFFFF; border: 1px solid #5CA1BE; color: #0F69A6; font-family: Arial,Verdana,Helvetica,sans-serif; font-size: 12px; height: 20px; padding-left:5px; padding-top:3px; }

#outra_cidade { float: right; }
</style>
<title>Carro Aluguel.com - Aluguel de Carros. Excelentes tarifas. As melhores locadoras do Brasil</title>
<script src="<?php echo $server_prefix_url;?>/js/jquery-plus-jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo $server_prefix_url;?>/js/jtip.js" type="text/javascript"></script>
<script src="<?php echo $server_prefix_url;?>/js/site.js" type="text/javascript"></script>
<script src="<?php echo $server_prefix_url;?>/js/flash.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#type_val').hide();
  $("#slider").slider({
    min:1,
    max:50,
    step: 1,
    change: function(event, ui){
      $('#area').text(ui.value);
      $('#type_val').val(ui.value);
    }
  });
  $('#area').click(function(){
    $('#type_val').val($('#area').text());
    $('#area').hide();
    $('#type_val').show().focus();
  });
  $('#type_val').blur(function(){
    $('#area').text($('#type_val').val());
    $('#area').show();
    $('#type_val').hide();
  });
  $('#type_val').keyup(function(event){
  //backspace e delete
  if (event.keyCode != 8 && event.keyCode != 46) {
    
    //enter
    if (event.keyCode == 13 || event.keyCode == 27) {
      $('#area').text($('#type_val').val());
      $('#area').show();
      $('#type_val').hide();
    } else {
      var value = parseInt($('#type_val').val().replace(/[^0-9]/gi, ''));
      
      //seta para cima
      if (event.keyCode == 38) {
        value = value + 1;
      //seta para baixo
      } else if (event.keyCode == 40) {
        value = value - 1;
      }
      
      if (value < 1) {
        value = 1;
      } else if (value > 50) {
        value = 50;
      }
      $('#type_val').val(value);
    }
    $("#slider").slider('option', 'value', value);
  }
  });
});
</script>

<script src="<?php echo $server_prefix_url;?>/js/locadoras2.js" type="text/javascript"></script>
<meta http-equiv="Content-Type"  content="text/html; charset=utf-8" />
<meta name="title" content="<?php echo $row_pagina['meta_title']; ?>" />
<meta name="description" content="<?php echo $row_pagina['meta_description']; ?>" />
<meta name="keywords" content="<?php echo $row_pagina['meta_keywords']; ?>" />
<meta name="language" content="pt-br" />
<link rel="stylesheet" type="text/css" href="<?php echo $server_prefix_url;?>/css/estilo.php">
<link rel="stylesheet" type="text/css" href="<?php echo $server_prefix_url;?>/css/jquery-ui.php">
</head>
<body style="background-image:url(<?php echo $server_prefix_url;?>/images/bg_top_2.gif);">
<!-- INÍCIO DIV PAGE -->
	<div id="page">
    <!-- INÍCIO TOPO -->
	<?php include $server_prefix_url."/header.php";?>
    <!-- FIM TOPO -->
    <!-- INÍCIO MENU -->
    <?php include $server_prefix_url."/menu.php";?>
    <!-- FIM MENU -->
    <!-- INÍCIO ESCOLHA LOCADORA -->
       	
       	<form action="" method="POST" id="sua_cidade">
          <h3>Quer alugar em sua cidade?</h3>
          <p>Digite seu cep e descubra se há uma loja próxima de você.</p>
          <p>
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" />
          </p>
          <div id="cont_slider">     	
        		<div id="slider"></div>
        		<p>Seu CEP + 
              <span id="area">1</span>
              <input type="text" id="type_val" name="type_val" style="display: none;" />
              Km
            </p>
          </div>
          <p><button type="submit">Buscar</button></p>
        </form>
        
        <form action="" method="POST" id="outra_cidade">
          <h3>Quer alugar em outra cidade?</h3>
          <p>Selecione uma cidade abaixo e veja quais lojas estão disponívies.</p>
          <ul>
            <li>
              <select id="estado" name="estado">
                <option>estadoteste</option>
              </select>
            </li>
            <li>
              <select id="cidade" name="cidade">
                <option>cidadeteste</option>
              </select>
            </li>
          </ul>
          <p><button type="submit">Buscar</button></p>
        </form>
	</div>
</div>
<!-- FIM DIV PAGE -->
<!-- INÍCIO RODAPÉ -->
<div id="rodape">
    <div id="container_rodape">
    <?php include "footer.php"; ?>
    </div>
</div>
<!-- FIM RODAPÉ -->
</body>
</html>