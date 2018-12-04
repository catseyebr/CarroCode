
	var carro = {
		init: function(){
			this.menuInit();
		},
		menuInit: function() {
			$('div#menu_principal ul.menu > li.contato').hover(
				function() {
					$(this).find('ul').fadeIn(500);
				},
				function() {
					$(this).find('ul').hide();
				}
			);	
		}
	};
	
	$(document).ready(function(){carro.init();});