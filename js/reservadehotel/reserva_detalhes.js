/** função a ser chamada no $(document).ready para buscas **/
function loadReservasDetalhes() {
	$('#cliente_reserva a.ver_detalhes').bind('click', link_detalhes_click_handler);
}

function link_detalhes_click_handler (event) {
	var $_this, precos_diarias;
	
	event.preventDefault();
	
	$_this = $(this);
	precos_diarias = $_this.parent().parent().children('.precos_diarias');
	 
	if (precos_diarias.hasClass('inativo')) {
		precos_diarias.removeClass('inativo');
		$_this.html('fechar detalhes');
	} else {
		precos_diarias.addClass('inativo');
		$_this.html('ver detalhes');
	}
}