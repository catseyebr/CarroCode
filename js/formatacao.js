  function formataNumero(e) {  
    var tecla = (window.event)?event.keyCode:e.which;
    if ((tecla > 47 && tecla < 58)) return true;
    else{
      if (tecla == 8 || tecla == 0) return true;
      else return false;
    }
  }
  
$(document).ready(function(){
		$("#telefone").mask("(99)9999-9999");
		$("#cpf").mask("999.999.999-99");
		$("#cep").mask("99999-999");
		$("#data").mask("99/99/9999");
	});
