

(function($) {
	$.fn.validationEngineLanguage = function() {};
	$.validationEngineLanguage = {
		newLang: function() {
			$.validationEngineLanguage.allRules = 	{"required":{    			// Add your regex rules here, you can take telephone as an example
						"regex":"none",
						"alertText":"* Campo necess&aacute;rio",
						"alertTextCheckboxMultiple":"* Selecione uma op&ccedil;&atilde;o",
						"alertTextCheckboxe":"* &Eacute; necess&aacute;rio aceitar os termos para prosseguir"},
					"length":{
						"regex":"none",
						"alertText":"*Entre ",
						"alertText2":" e ",
						"alertText3": " caracteres permitidos"},
					"primeiroNome":{
						"regex":"/^.+$/",
						"alertText":"* Digitar somente o primeiro nome"},
					"sobrenome":{
						"regex":"/^.+$/",
						"alertText":"* Digitar somente sobrenome, exceto casos como \"filho\", \"j&uacute;nior\", \"neto\", etc."},
					"maxCheckbox":{
						"regex":"none",
						"alertText":"* Máximo selecionado"},	
					"minCheckbox":{
						"regex":"none",
						"alertText":"* Por favor, selecione ",
						"alertText2":" op&ccedil;&otilde;es"},	
					"confirm":{
						"regex":"none",
						"alertText":"* Email n&atilde;o confere"},		
					"telephone":{
						"regex":"/^[0-9]{2}\-\[0-9]{8}$/",
						"alertText":"* N&uacute;mero de telefone inv&aacute;lido, formato: 00-00000000 (ddd+n&uacute;mero)"},	
					"email":{
						"regex":"/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/",
						"alertText":"* Endere&ccedil;o de email inv&aacute;lido"},	
					"date":{
                         "regex":"/^[0-9]{1,2}\-\[0-9]{1,2}\-\[0-9]{4}$/",
                         "alertText":"* Data inv&aacute;lida, deve ser no formato dd-mm-aaaa"},
					"cpf":{
                         "regex":"/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/",
                         "alertText":"* CPF inv&aacute;lido, formato: 000.000.000-00"},
					"onlyNumber":{
						"regex":"/^[0-9\ ]+$/",
						"alertText":"* Somente n&uacute;meros"},	
					"vooNumber":{
						"regex":"/^[0-9\ ]+$/",
						"alertText":"* Somente os 4 &uacute;ltimos d&iacute;gitos (ex: Voo G33564, digite: 3564)"},	
					"noSpecialCaracters":{
						"regex":"/^[0-9a-zA-Z]+$/",
						"alertText":"* Caracteres especiais n&atilde;o permitidos"},	
					"ajaxUser":{
						"file":"validateUser.php",
						"extraData":"name=eric",
						"alertTextOk":"* This user is available",	
						"alertTextLoad":"* Loading, please wait",
						"alertText":"* This user is already taken"},	
					"ajaxName":{
						"file":"validateUser.php",
						"alertText":"* This name is already taken",
						"alertTextOk":"* This name is available",	
						"alertTextLoad":"* Loading, please wait"},		
					"onlyLetter":{
						"regex":"/^[a-zA-Z\ \']+$/",
						"alertText":"* Somente letras"},
          
          "condutor":{
                         "regex":"/^(?! -- .*? -- ).+$/",
                         "alertText":"* Campo Obrigat&oacute;rio"}
                         
      }	
		}
	}
})(jQuery);

$(document).ready(function() {	
	$.validationEngineLanguage.newLang()
});