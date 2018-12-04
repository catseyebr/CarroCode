/** função a ser chamada no $(document).ready para buscas **/
function loadHome() {
	$('#new_email').focus(function(){if($(this).val() == '-- Seu Email --'){$(this).val('');}}).blur(function(){if($(this).val() == ''){$(this).val('-- Seu Email --');}}).blur();
	$('#sender').focus(function(){if($(this).val() == '-- Seu Nome --'){ $(this).val('')}}).blur(function(){if($(this).val() == ''){$(this).val('-- Seu Nome --');}}).blur();
	$('#email_sender').focus(function(){if($(this).val() == '-- Seu Email --') {$(this).val('');}}).blur(function(){if($(this).val() == '') {$(this).val('-- Seu Email --');}}).blur();
	$('#nome').focus(function(){if($(this).val() == '-- Nome do Amigo --'){$(this).val('');}}).blur(function(){if($(this).val() == ''){$(this).val('-- Nome do Amigo --');}}).blur();
	$('#email').focus(function(){if($(this).val() == '-- Email do Amigo --'){$(this).val('');}}).blur(function(){if($(this).val() == ''){$(this).val('-- Email do Amigo --')}}).blur();
	
	new Validator('#envie_amigo', {validations: [
					{type: 'email', validate: validate_email, msg: 'Email inválido.'},
					{type: 'alpha', validate: validate_alpha, msg: 'Somente letras'},
					{type: 'required', validate: validate_required, msg: 'Campo obrigatório!'}
				]});
	new Validator('#newsletter', {validations: [
					{type: 'email', validate: validate_email, msg: 'Email inválido.'},
					{type: 'required', validate: validate_required, msg: 'Campo obrigatório!'}
				]});
}