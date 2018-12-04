function ComparacaoPaginacao () {
	
	this.init = function () {
		this.elm        = $('.row_item');
		this.base_left  = parseInt(this.elm.css('left'));
		this.item_width = this.elm.children().outerWidth();
		this.atual      = 0;
		this.total      = Math.ceil(this.elm.first().children().length/6) - 1;
		
		this.$pag_ant  = $('#pag_ant');
		this.$pag_prox = $('#pag_prox');
		
		if (this.total < 0) {
			this.total = 0;
		}
		this.defineLinks().move(0);
	}
	
	this.move = function (index_pagina) {
		this.elm = $('.row_item');
		if (index_pagina <= this.total) {
			this.atual = index_pagina;
			if (this.total != 0) {
				if (index_pagina == 0) {
					this.$pag_ant.hide();
					this.$pag_prox.show();
				} else if (index_pagina == this.total) {
					this.$pag_ant.show();
					this.$pag_prox.hide();
				} else {
					this.$pag_ant.show();
					this.$pag_prox.show();
				}
			} else {
				this.$pag_ant.hide();
				this.$pag_prox.hide();
			}
			this.elm.css('left', (index_pagina * (- (this.item_width * 6))) + this.base_left);		
		}
		return this;
	}
	
	this.defineLinks = function () {
		$('.links_index').bind('click.cp', {_this: this}, this.links_index_click_handler);
		$('#pag_ant').bind('click.cp', {_this: this}, this.pag_ant_click_handler);
		$('#pag_prox').bind('click.cp', {_this: this}, this.pag_prox_click_handler);
		return this;
	}
	
	this.links_index_click_handler = function (event) {
		event.preventDefault();
		var index = $(this).attr('class').replace(/.*?(^| )index_([0-9]+).*?($| )/, '$2')
		if (event.data._this.atual != index) {
			event.data._this.move(index);
		}
	}
	
	this.pag_ant_click_handler = function (event) {
		event.preventDefault();
		var index = event.data._this.atual - 1;
		if (index >= 0) {
			event.data._this.move(index);
		}
	}
	
	this.pag_prox_click_handler = function (event) {
		event.preventDefault();
		var index = event.data._this.atual + 1;
		if (index <= event.data._this.total) {
			event.data._this.move(index);
		}
	}
	
	this.init();
}