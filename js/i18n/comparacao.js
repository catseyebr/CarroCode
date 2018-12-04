$(document).bind('ready', initComparacao);

function initComparacao () {
	$('#abas_pesquisa li').not('.ativo').bind('mouseover.comparacao', aba_pesquisa_mouseover_handler).bind('mouseout.comparacao', aba_pesquisa_mouseout_handler).bind('click.comparacao', aba_pesquisa_click_handler);
	window.comp_cont = $('#resultados_comparacao div.cont');
	window.comp_result = $('#comparacao_result');
	window.comp_nav = $('#legenda, #pag_ant, #pag_prox');
	window.comp_m = parseInt($('#pag_ant').css('margin-top'));
	window.$self = $(window);
	$(window).bind('scroll.comparacao', window_scroll_handler);
	new ComparacaoPaginacao();
	new ComparacaoOrdenador(Mcat, '#comparacao_result');
}

function window_scroll_handler (event) {
	var win_top = window.$self.scrollTop();
	var cont_pos = window.comp_cont.offset().top;
	if (cont_pos < win_top) {
		var max_pos = (window.comp_result.height() + window.comp_result.offset().top) - window.comp_m;
		if (win_top < max_pos) {
			window.comp_nav.stop().animate({top: win_top - cont_pos}, 100);
		} else {
			window.comp_nav.stop().animate({top: max_pos - cont_pos}, 100);
		}
	} else {
		window.comp_nav.stop().animate({top: 0}, 500);
	}
}

function aba_pesquisa_mouseover_handler (event) {
	$(this).stop().animate({height: 26, top: 0});
}

function aba_pesquisa_mouseout_handler (event) {
	$(this).stop().animate({height: 16, top: 10});
}

function aba_pesquisa_click_handler (event) {
	window.location = $(this).find('a').attr('href');
}