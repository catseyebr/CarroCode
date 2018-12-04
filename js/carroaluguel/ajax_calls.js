var xmlHttp
var id_div
var url_prefix = "/"

function carregaCidades(str,city)
{ 
xmlCity=GetXmlHttpObject()
if (xmlCity==null)
 {
 alert ("Navegador não suporta requisições HTTP")
 return
 }
var urlCity="/db/db_city_combo.php"
urlCity=urlCity+"?uf="+str+"&city="+city
urlCity=urlCity+"&sid="+Math.random()
xmlCity.onreadystatechange=stateChanged 
xmlCity.open("GET",urlCity,true)
xmlCity.send(null)
}

function stateChanged() 
{ 
if (xmlCity.readyState==4 || xmlCity.readyState=="complete")
 { 
 ClearOptionsFast("cidade");
 j = 0;
 var opt = document.createElement("option");
 	document.getElementById("cidade").options.add(opt);
 	opt.text = 'Escolha a cidade';
 	opt.value = '';
 var total_query = divide_string(xmlCity.responseText,0);
 	for (var i=2; i<=total_query;i++) {
 	var opt = document.createElement("option");
 	document.getElementById("cidade").options.add(opt);
 	opt.text = divide_string(xmlCity.responseText,i);
 	opt.value = divide_string(xmlCity.responseText,i);
	if(divide_string(xmlCity.responseText,i) == divide_string(xmlCity.responseText,1))
	{
		j = i - 1
	}
	}
	document.getElementById("cidade").options[j].selected=true;
 } 
 if (xmlCity.readyState==1 || xmlCity.readyState=="complete")
 { 
 ClearOptionsFast("cidade");
 } 
}

function carregaEstado(str)
{ 
xmlcarregaEstado=GetXmlHttpObject()
if (xmlcarregaEstado==null)
 {
 alert ("Navegador não suporta requisições HTTP")
 return
 }
var urlcarregaEstado="/db/db_uf_combo.php"
urlcarregaEstado=urlcarregaEstado+"?uf="+str
urlcarregaEstado=urlcarregaEstado+"&sid="+Math.random()
xmlcarregaEstado.onreadystatechange=stateChangedcarregaEstado
xmlcarregaEstado.open("GET",urlcarregaEstado,true)
xmlcarregaEstado.send(null)
}

function stateChangedcarregaEstado()
{ 
if (xmlcarregaEstado.readyState==4 || xmlcarregaEstado.readyState=="complete")
 { 
 ClearOptionsFast("estado");
 j = 0;
 var opt = document.createElement("option");
 	document.getElementById("estado").options.add(opt);
 	opt.text = 'Escolha o estado';
 	opt.value = '';
 var total_query = divide_string(xmlcarregaEstado.responseText,0);
 	for (var i=2; i<=total_query;i++) {
 	var opt = document.createElement("option");
 	document.getElementById("estado").options.add(opt);
 	opt.text = divide_string(xmlcarregaEstado.responseText,i);
 	opt.value = divide_string(xmlcarregaEstado.responseText,i);
	if(divide_string(xmlcarregaEstado.responseText,i) == divide_string(xmlcarregaEstado.responseText,1))
	{
		j = i - 1
	}
	}
	document.getElementById("estado").options[j].selected=true;
 } 
 if (xmlcarregaEstado.readyState==1 || xmlcarregaEstado.readyState=="complete")
 { 
 ClearOptionsFast("estado");
 } 
}


function procuraCEP(nmb_cep)
{ 
xml_busca_cep=GetXmlHttpObject()
if (xml_busca_cep==null)
 {
 alert ("Navegador não suporta requisições HTTP")
 return
 }
var url_busca_cep="/jscom/busca_cep.php"
url_busca_cep=url_busca_cep+"?nmb_cep="+nmb_cep
url_busca_cep=url_busca_cep+"&sid="+Math.random()
xml_busca_cep.onreadystatechange=stateChanged_busca_cep
xml_busca_cep.open("GET",url_busca_cep,true)
xml_busca_cep.send(null)
}

function stateChanged_busca_cep() 
{ 
if (xml_busca_cep.readyState==4 || xml_busca_cep.readyState=="complete")
 { 
 document.getElementById("endereco").value=divide_string(xml_busca_cep.responseText,0)
 document.getElementById("endereco").value = ltrim(document.getElementById("endereco").value);
 document.getElementById("bairro").value=divide_string(xml_busca_cep.responseText,1)
 carregaEstado(divide_string(xml_busca_cep.responseText,3))
 carregaCidades(divide_string(xml_busca_cep.responseText,3),divide_string(xml_busca_cep.responseText,2))
 } 
 if (xml_busca_cep.readyState==1 || xml_busca_cep.readyState=="complete")
 { 
 document.getElementById("endereco").value="Consultando..."
 document.getElementById("bairro").value="Consultando..."
 } 
}

function cliente_carregaCadastro(cliente)
{ 
xml_cliente_carregaCadastro=GetXmlHttpObject()
if (xml_cliente_carregaCadastro==null)
 {
 alert ("Navegador não suporta requisições HTTP")
 return
 }
var url_cliente_carregaCadastro="cadastro.php"
url_cliente_carregaCadastro=url_cliente_carregaCadastro+"?cliente="+cliente
url_cliente_carregaCadastro=url_cliente_carregaCadastro+"&sid="+Math.random()
xml_cliente_carregaCadastro.onreadystatechange=stateChanged_cliente_carregaCadastro
xml_cliente_carregaCadastro.open("GET",url_cliente_carregaCadastro,true)
xml_cliente_carregaCadastro.send(null)
}

function stateChanged_cliente_carregaCadastro() 
{ 
if (xml_cliente_carregaCadastro.readyState==4 || xml_cliente_carregaCadastro.readyState=="complete")
 { 
 document.getElementById("area_cliente_main").innerHTML=xml_cliente_carregaCadastro.responseText
 $("#cadastro_de_usuario").validationEngine
	({
		validationEventTriggers:"keyup blur focus change"
	})
 carregaEstado(document.getElementById("estado_db").value)
 carregaCidades(document.getElementById("estado_db").value,document.getElementById("cidade_db").value)
 } 
 if (xml_cliente_carregaCadastro.readyState==1 || xml_cliente_carregaCadastro.readyState=="complete")
 { 
 document.getElementById("area_cliente_main").innerHTML="<div class=\"ajax-loader\"></div>"
 } 
}
function cliente_carregaReservas()
{ 
xml_cliente_carregaReservas=GetXmlHttpObject()
if (xml_cliente_carregaReservas==null)
 {
 alert ("Navegador não suporta requisições HTTP")
 return
 }
var url_cliente_carregaReservas="reservas.php"
url_cliente_carregaReservas=url_cliente_carregaReservas+"?sid="+Math.random()
xml_cliente_carregaReservas.onreadystatechange=stateChanged_cliente_carregaReservas
xml_cliente_carregaReservas.open("GET",url_cliente_carregaReservas,true)
xml_cliente_carregaReservas.send(null)
}

function stateChanged_cliente_carregaReservas() 
{ 
if (xml_cliente_carregaReservas.readyState==4 || xml_cliente_carregaReservas.readyState=="complete")
 { 
 document.getElementById("area_cliente_main").innerHTML=xml_cliente_carregaReservas.responseText
 } 
 if (xml_cliente_carregaReservas.readyState==1 || xml_cliente_carregaReservas.readyState=="complete")
 { 
 document.getElementById("area_cliente_main").innerHTML="<div class=\"ajax-loader\"></div>"
 } 
}

function cliente_carregaReservasAtivas()
{ 
xml_cliente_carregaReservasAtivas=GetXmlHttpObject()
if (xml_cliente_carregaReservasAtivas==null)
 {
 alert ("Navegador não suporta requisições HTTP")
 return
 }
var url_cliente_carregaReservasAtivas="reservas_ativas.php"
url_cliente_carregaReservasAtivas=url_cliente_carregaReservasAtivas+"?sid="+Math.random()
xml_cliente_carregaReservasAtivas.onreadystatechange=stateChanged_cliente_carregaReservasAtivas
xml_cliente_carregaReservasAtivas.open("GET",url_cliente_carregaReservasAtivas,true)
xml_cliente_carregaReservasAtivas.send(null)
}

function stateChanged_cliente_carregaReservasAtivas() 
{ 
if (xml_cliente_carregaReservasAtivas.readyState==4 || xml_cliente_carregaReservasAtivas.readyState=="complete")
 { 
 document.getElementById("area_cliente_main").innerHTML=xml_cliente_carregaReservasAtivas.responseText
 } 
 if (xml_cliente_carregaReservasAtivas.readyState==1 || xml_cliente_carregaReservasAtivas.readyState=="complete")
 { 
 document.getElementById("area_cliente_main").innerHTML="<div class=\"ajax-loader\"></div>"
 } 
}

function cliente_carregaReservasConfirmadas()
{ 
xml_cliente_carregaReservasConfirmadas=GetXmlHttpObject()
if (xml_cliente_carregaReservasConfirmadas==null)
 {
 alert ("Navegador não suporta requisições HTTP")
 return
 }
var url_cliente_carregaReservasConfirmadas="reservas_confirmadas.php"
url_cliente_carregaReservasConfirmadas=url_cliente_carregaReservasConfirmadas+"?sid="+Math.random()
xml_cliente_carregaReservasConfirmadas.onreadystatechange=stateChanged_cliente_carregaReservasConfirmadas
xml_cliente_carregaReservasConfirmadas.open("GET",url_cliente_carregaReservasConfirmadas,true)
xml_cliente_carregaReservasConfirmadas.send(null)
}

function stateChanged_cliente_carregaReservasConfirmadas() 
{ 
if (xml_cliente_carregaReservasConfirmadas.readyState==4 || xml_cliente_carregaReservasConfirmadas.readyState=="complete")
 { 
 document.getElementById("area_cliente_main").innerHTML=xml_cliente_carregaReservasConfirmadas.responseText
 } 
 if (xml_cliente_carregaReservasConfirmadas.readyState==1 || xml_cliente_carregaReservasConfirmadas.readyState=="complete")
 { 
 document.getElementById("area_cliente_main").innerHTML="<div class=\"ajax-loader\"></div>"
 } 
}

function cliente_carregaReservaDetalhe(reserva)
{ 
xml_cliente_carregaReservaDetalhe=GetXmlHttpObject()
if (xml_cliente_carregaReservaDetalhe==null)
 {
 alert ("Navegador não suporta requisições HTTP")
 return
 }
var url_cliente_carregaReservaDetalhe="reserva_detalhe.php"
url_cliente_carregaReservaDetalhe=url_cliente_carregaReservaDetalhe+"?reserva="+reserva
url_cliente_carregaReservaDetalhe=url_cliente_carregaReservaDetalhe+"&sid="+Math.random()
xml_cliente_carregaReservaDetalhe.onreadystatechange=stateChanged_cliente_carregaReservaDetalhe
xml_cliente_carregaReservaDetalhe.open("GET",url_cliente_carregaReservaDetalhe,true)
xml_cliente_carregaReservaDetalhe.send(null)
}

function stateChanged_cliente_carregaReservaDetalhe() 
{ 
if (xml_cliente_carregaReservaDetalhe.readyState==4 || xml_cliente_carregaReservaDetalhe.readyState=="complete")
 { 
 document.getElementById("area_cliente_main").innerHTML=xml_cliente_carregaReservaDetalhe.responseText
 } 
 if (xml_cliente_carregaReservaDetalhe.readyState==1 || xml_cliente_carregaReservaDetalhe.readyState=="complete")
 { 
 document.getElementById("area_cliente_main").innerHTML="<div class=\"ajax-loader\"></div>"
 } 
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}

function url_encode(str) { 
    var hex_chars = "0123456789ABCDEF"; 
    var noEncode = /^([a-zA-Z0-9\_\-\.])$/; 
    var n, strCode, hex1, hex2, strEncode = ""; 

    for(n = 0; n < str.length; n++) { 
        if (noEncode.test(str.charAt(n))) { 
            strEncode += str.charAt(n); 
        } else { 
            strCode = str.charCodeAt(n); 
            hex1 = hex_chars.charAt(Math.floor(strCode / 16)); 
            hex2 = hex_chars.charAt(strCode % 16); 
            strEncode += "%" + (hex1 + hex2); 
        } 
    } 
    return strEncode; 
} 

function url_decode(str) { 
    var n, strCode, strDecode = ""; 

    for (n = 0; n < str.length; n++) { 
        if (str.charAt(n) == "%") { 
            strCode = str.charAt(n + 1) + str.charAt(n + 2); 
            strDecode += String.fromCharCode(parseInt(strCode, 16)); 
            n += 2; 
        } else { 
            strDecode += str.charAt(n); 
        } 
    } 
    return strDecode; 
}

function formatNumber(num)
{
num="" + Math.floor(num*100.0 + 0.5)/100.0;

var i=num.indexOf(".");

if ( i<0 ) num+="";
else {
num=num.substring(0,i) + "" + num.substring(i + 1);
var nDec=(num.length - i) - 1;
if ( nDec==0 ) num+="";
else if ( nDec==1 ) num+="";
else if ( nDec>2 ) num=num.substring(0,i + 3);
}

return num;
}
function divide_string(string,num)
{
var string_array = string.split(",");
return string_array[num];
}

function selectCheck(check){  
       
     if(check.checked){  
         return 1;
	 }else{  
         return 0;  
	 }  
	 
}

function disp_text(){
   var w = document.form.categoria.selectedIndex;
   var selected_text = document.form.categoria.options[w].text;
   atualizaStatusSolicitacao('','',selected_text,'','','','','')
}
function verifica_form_busca(){
   if (document.getElementById("checkIn_date").value==''){
	   alert ("Insira a data da retirada!")}
   else if (document.getElementById("checkOut_date").value==''){
	   alert ("Insira a data da devoluçao!")}
   else if (document.form.poblacionz.value==''){
	   alert ("Defina a local da retirada!")}
   else{ 
   document.form.submit()
   }
}
function numbersOnly(el)
{
   el.value = el.value.replace(/[^0-9]/g, "");
}
 function setAndExecute(divId, innerHTML)  
 {  
    var div = document.getElementById(divId);  
    div.innerHTML = innerHTML;  
    var x = div.getElementsByTagName("script");   
    for(var i=0;i<x.length;i++)  
    {  
        eval(x[i].text);  
    }  
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


function divide_string(string,num)
{
var string_array = string.split(",");
return string_array[num];
}

function LTrim(str){
    var espaco = String.fromCharCode(32);
    var tamanho = str.length;
    var temp = "";
    if(tamanho < 0)
      return "";

    var temp2 = 0;

    while(temp2 < tamanho){
      if(str.charAt(temp2) == espaco){
        // não faz nada
      }
      else{
        temp = str.substring(temp2, tamanho);
        break;
      }
      temp2++;
    }
    return temp;
  }
  
function validarCPF(cpf){
   var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
   if(!filtro.test(cpf)){
     window.alert("CPF incorreto. Tente novamente.");
	 return false;
   }
   
   cpf = remove(cpf, ".");
   cpf = remove(cpf, "-");
    
   if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
	  cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
	  cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
	  cpf == "88888888888" || cpf == "99999999999"){
	  window.alert("CPF incorreto. Tente novamente.");
	  document.getElementById("cpf").value= "";
	  return false;
   }

   soma = 0;
   for(i = 0; i < 9; i++)
   	 soma += parseInt(cpf.charAt(i)) * (10 - i);
   resto = 11 - (soma % 11);
   if(resto == 10 || resto == 11)
	 resto = 0;
   if(resto != parseInt(cpf.charAt(9))){
	 window.alert("CPF incorreto. Tente novamente.");
	 document.getElementById("cpf").value= "";
	 return false;
   }
   soma = 0;
   for(i = 0; i < 10; i ++)
	 soma += parseInt(cpf.charAt(i)) * (11 - i);
   resto = 11 - (soma % 11);
   if(resto == 10 || resto == 11)
	 resto = 0;
   if(resto != parseInt(cpf.charAt(10))){
     window.alert("CPF incorreto. Tente novamente.");
	 document.getElementById("cpf").value= "";
	 return false;
   }
   return true;
 }
 
 function remove(str, sub) {
   i = str.indexOf(sub);
   r = "";
   if (i == -1) return str;
   r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
   return r;
 }
function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}
function ltrim(stringToTrim) {
	return stringToTrim.replace(/^\s+/,"");
}
function rtrim(stringToTrim) {
	return stringToTrim.replace(/\s+$/,"");
}

function ClearOptionsFast(id)
{
	var selectObj = document.getElementById(id);
	var selectParentNode = selectObj.parentNode;
	var newSelectObj = selectObj.cloneNode(false); 
	selectParentNode.replaceChild(newSelectObj, selectObj);
	return newSelectObj;
}
function verifica_email()
{
 	if(document.getElementById("email").value != document.getElementById("email2").value)
	{document.getElementById("email2").value = ""}
}
function mudar_classe(elemento,classe1,classe2,elemento2)
{
	var verifica = selectCheck(elemento2);
 	if(verifica == 1){
		elemento.className = classe2;
		elemento.style['display'] = 'none';
	}else{
		elemento.className = classe1;
	}
	
}
function formatar_mascara(src, mascara) {
	var campo = src.value.length;
	var saida = mascara.substring(0,1);
	var texto = mascara.substring(campo);
	if(texto.substring(0,1) != saida) {
		src.value += texto.substring(0,1);
	}
}
