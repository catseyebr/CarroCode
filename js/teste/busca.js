$(document).bind('ready', initBusca);

function initBusca () {
	window.autocompleter.add($('#busca-carro .autocomplete-cidade'), {url: '/jscom/teste_cidade', teste: 1});
	$('#busca h3 a').bind('mouseover', aba_mouseover).bind('mouseout', aba_mouseout).bind('click', aba_click);
}

function aba_mouseover (event) {
	var $this = $(this);
	var $h3_atual = $this.parent();
	var $li_atual = $h3_atual.parent();
	if (!$li_atual.hasClass('active')) {
		$h3_atual.stop().animate({top: -20});
		$this.stop().animate({paddingTop: 10, height: 29});
	}
}

function aba_mouseout (event) {
	var $this = $(this);
	var $h3_atual = $this.parent();
	var $li_atual = $h3_atual.parent();
	if (!$li_atual.hasClass('active')) {
		$h3_atual.stop().animate({top: -8});
		$this.stop().animate({paddingTop: 4, height: 23});
	}
}

function aba_click (event) {
	var i;
	var $li_busca = $('#busca .busca-item');
	var $item_atual;
	var $link_atual;
	for (i = 0; i < $li_busca.length; i++) {
		$item_atual = $($li_busca.get(i));
		$item_atual.removeClass('active');
		$link_atual = $item_atual.children('h3').children(); 
		if ($link_atual.get(0) == this) {
			$item_atual.addClass('active');
		} else {
			$link_atual.mouseout();
		}
	}
	return false;
}

