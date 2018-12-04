/** função a ser chamada no $(document).ready para buscas **/
function loadReservaAtual() {
	$('#cliente_reserva a.excluir').bind('click', link_excluir_reserva_handler);
	$('#prosseguir_atual').parents('form').bind('submit', prosseguir_submit_handler);
	$('#mais-reserva_atual').bind('click', mais_reserva_click_handler);
	$('#cliente_reserva a.ver_detalhes').bind('click', link_detalhes_click_handler);
}

function link_excluir_reserva_handler (event) {
	event.preventDefault();
	
	var i, tmp, itens, parent, total, valor_item, valor_final;
	
	parent = $(this).parent();
	total = $('#cliente_reserva p.total strong');
	
	valor_item  = parseFloat(moeda.desformatar(parent.find('p.preco strong').html().match(/([0-9]+?[\.,])+[0-9]{2}/)[0]));
	valor_final = parseFloat(moeda.desformatar(total.html().match(/([0-9]+?[\.,])+[0-9]{2}/)[0]));
	valor_final -= valor_item;
	
	total.html('<span>R$</span> ' + moeda.formatar(valor_final));
	
	$.post('/jscom/excluirreservaatual', {id: parseInt(parent.attr('id').replace(/item_([0-9]+)/, '$1'))});
	
	parent.remove();
	
	itens = $('#cliente_reserva li.item');
	for (i = 0; i < itens.length; i++) {
		tmp = $(itens.get(i));
		tmp.attr('id', tmp.attr('id').replace(/(item_)[0-9]+/, '$1' + i));
	}
}

function prosseguir_submit_handler (event) {
	if ($('#cliente_reserva li.item').length <= 0) {
		event.preventDefault();
		alert('Nenhuma reserva ativa!');
	}
}

function mais_reserva_click_handler (event) {
	event.preventDefault();
	window.location = '/';
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