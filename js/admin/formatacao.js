  function formataNumero(e) {  
    var tecla = (window.event)?event.keyCode:e.which;
    if ((tecla > 47 && tecla < 58)) return true;
    else{
      if (tecla == 8 || tecla == 0) return true;
      else return false;
    }
  }
  
$(document).ready(function(){
		$("#end_cep").mask("99999-999");
		$(".hora").mask("99:99:99");
	});

function formata_nome_min(id){
    var palavras=document.getElementById(id).value;
    palavras=palavras.split("");
    var tmp="";
    for(i=0;i<palavras.length;i++){
		palavras[i]=palavras[i].replace(palavras[i],palavras[i].toLowerCase());
        tmp+=palavras[i];
    }
    document.getElementById(id).value=tmp;
}
function formata_nome(id){
    var palavras=document.getElementById(id).value;
    palavras=palavras.split("");
    var tmp="";
    for(i=0;i<palavras.length;i++){
		palavras[i]=palavras[i].replace(palavras[i],palavras[i].toUpperCase());
        tmp+=palavras[i];
    }
    document.getElementById(id).value=tmp;
}