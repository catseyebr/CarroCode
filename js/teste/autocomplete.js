function Autocompleter () {
	
	this.init = function () {
		window.autocompleter = this;
		
		$('body').append('<div id="autocomplete-cont" style="position: absolute; z-index: 2000; display: none;"></div>');	
		$('#autocomplete-cont li').live('mousedown', this.item_mousedown_handler).live('click', this.item_click_handler);
		
		this.onSelect = false;				
		this.lista = new Array();
		this.xhr = {abort: function(){}};
		this.currelm;
		this.currres;
		this.cont = $('#autocomplete-cont');	
	}
	
	this.add = function ($elm, postdata) {
		if ($elm.length > 1) {
			$elm.each(function(){
				window.autocompleter.add($(this), postdata);
			});
		} else {
			if (typeof postdata == 'object') {
				$elm.postdata = postdata;
			} else {
				$elm.postdata = {};
			}
			$elm.cache = new Array();
			$elm.after('<input type="hidden" id="' + $elm.attr('name') + '-val" name="' + $elm.attr('name') + '-val" />');
			$elm.after('<input type="hidden" id="' + $elm.attr('name') + '-ref" name="' + $elm.attr('name') + '-ref" />');
			$elm.bind('keyup', this.elm_keyup_handler).bind('focus', {item: this.lista.length}, this.elm_focus_handler).bind('blur', this.elm_blur_handler).bind('dblclick', this.elm_dblclick_handler);
			$elm.attr('autocomplete', 'off');
			this.lista[this.lista.length] = $elm;
		}
	}
	
	this.item_mousedown_handler = function (event) {
		window.autocompleter.onSelect = true;
	}
	
	this.item_click_handler = function (event) {
		window.autocompleter.cont.find('.active').removeClass('active');
		$(this).addClass('active');
		window.autocompleter.define();
		window.autocompleter.close();
		window.autocompleter.onSelect = false;
	}
	
	this.elm_focus_handler = function (event) {
		window.autocompleter.currelm = window.autocompleter.lista[event.data.item];
		window.autocompleter.currelm.parents('form').bind('submit.autocomplete', function(){ return false; });
	}
	
	this.elm_blur_handler = function (event) {
		if (!window.autocompleter.onSelect) {
			window.autocompleter.select();
		}
	}
	
	this.elm_keyup_handler = function (event) {
		if (!(event.keyCode >= 37 && event.keyCode <= 40) && event.keyCode != 13) {
			window.autocompleter.getData();
		} else {
			if (event.keyCode == 13 && window.autocompleter.cont.html() != '') {
				event.preventDefault();
			}
			window.autocompleter.navigate(event.keyCode);
		}
	}
	
	this.elm_dblclick_handler = function (event) {
		window.autocompleter.getData();
	}
	
	this.getData = function () {
		var i;
		var cache_index;
		var elm_val = this.currelm.val();
		
		this.xhr.abort();
		
		for (i = 0; i < this.currelm.cache.length; i++) {
			if (elm_val == this.currelm.cache[i].origem) {
				cache_index = i;
			}
		}
		
		if (typeof cache_index == 'undefined' || cache_index == null) {
			this.currelm.postdata.origem = elm_val;
			this.xhr = $.ajax({data: this.currelm.postdata, dataType: 'json', type: 'POST', url: this.currelm.postdata.url, success: this.post_request_handler});
		} else {
			this.processCache(cache_index);
		}
	}
	
	this.post_request_handler = function (data) {
		if (data != null && typeof data != 'undefined') {
			window.autocompleter.processRequest(data);
		}
	}
	
	this.processRequest = function (data) {
		var cache_length = this.currelm.cache.length;
		this.currelm.cache[cache_length] = data;
		this.currelm.cache[cache_length].origem = this.currelm.val();
		this.processCache(cache_length);
	}
	
	this.processCache = function (cache_index) {
		var i;
		var html;
		var cache = this.currelm.cache[cache_index];
		var elm_pos = this.currelm.offset();
		var elm_outer_height = this.currelm.outerHeight();
		var elm_outer_width = this.currelm.outerWidth();
		this.cont.css({top: elm_pos.top + elm_outer_height, left: elm_pos.left, height: 150, width: elm_outer_width, display: 'block'});
		html = '<ul>';
		for (i = 0; i < cache.result.length; i++) {
			html += '<li id="resultset-item_' + i + '" class="' + ((i % 2 == 0) ? 'par' : 'impar') + '">' + cache.result[i].val + '</li>';
		}
		html += '</ul>';
		this.cont.html(html);
		this.currelm.cache[cache_index].origem;
		this.currres = this.currelm.cache[cache_index];
	}
	
	this.navigate = function (key_code) {
		if (key_code == 40) {
			this.navigateDown();
		} else if (key_code == 38) {
			this.navigateUp();
		} else if (key_code == 13) {
			this.select();
		}
	}
	
	this.navigateDown = function () {
		if (this.cont.html() == '') {
			this.getData();
		} 
		var item;
		var elm = this.cont.find('.active');
		var nelm;
		if (elm.length > 0) {
			item = parseInt(elm.attr('id').replace(/resultset-item_([0-9]+)/, '$1')) + 1;
			if (this.currres.result.length <= item) {
				item = 0;
			}
		} else {
			item = 0;
		}
		elm.removeClass('active');
		nelm = $('#resultset-item_' + (item));
		nelm.addClass('active');
		nelm.parent().scrollTo(nelm);
		this.define();
	}
	
	this.navigateUp = function () {
		if (this.cont.html() == '') {
			this.getData();
		} 
		var item;
		var elm = this.cont.find('.active');
		var nelm;
		if (elm.length > 0) {
			item = parseInt(elm.attr('id').replace(/resultset-item_([0-9]+)/, '$1')) - 1;
			if (-1 == item) {
				item = this.currres.result.length - 1;
			}
		} else {
			item = this.currres.result.length - 1;
		}
		elm.removeClass('active');
		nelm = $('#resultset-item_' + (item));
		nelm.addClass('active');
		nelm.parent().scrollTo(nelm);
		this.define();
	}
	
	this.select = function () {
		this.define();
		this.close();
	}
	
	this.define = function () {
		var item;
		if (this.cont.html() != '') {
			var elm = this.cont.find('.active');
			if (elm.length > 0) {
				item = parseInt(elm.attr('id').replace(/resultset-item_([0-9]+)/, '$1'));
			} else {
				item = 0;
			}
			$('#' + this.currelm.attr('id') + '-val').val(this.currres.result[item].id);
			$('#' + this.currelm.attr('id') + '-ref').val(this.currres.result[item].ref);
			this.currelm.val(this.currres.result[item].val);
		}
	}
	
	this.close = function () {
		this.currelm.parents('form').unbind('submit.autocomplete');
		this.cont.html('').css({display: 'none'});
	}
	
	this.init();
}
$(document).bind('ready.autocompleter', function(){ new Autocompleter(); });