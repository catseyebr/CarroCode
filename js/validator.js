function Validator (baseElm, opt) {
	this.init = function (baseElm, opt) {
		this.opt = {};
		this.opt.baseElm = $(baseElm);
		this.opt.submitOnFailure = typeof opt.submitOnFailure == 'boolean' ?  opt.submitOnFailure : false;
		this.opt.realtimeValidation = typeof opt.realtimeValidation == 'boolean' ?  opt.realtimeValidation : true;
		this.opt.success = typeof opt.success == 'function' ?  opt.success : $.noop;
		this.opt.failure = typeof opt.failure == 'function' ?  opt.failure : $.noop;
		this.opt.action = typeof opt.action == 'function' ?  opt.action : this.defaultAction;
		this.opt.validations = opt.validations;
		this.initElms();
		this.validateOnSubmit();
	}
	
	this.initElms = function () {
		var i;
		var $_this;
		var validations = [];
		var l;
		this.elms = this.opt.baseElm.find('.validate');
		for (i = 0; i < this.elms.length; i++) {
			validations = [];
			$_this = $(this.elms.get(i));
			for (j = 0; j < this.opt.validations.length; j++) {
				if ($_this.hasClass(this.opt.validations[j].type)) {
					validations[validations.length] = {
						type: this.opt.validations[j].type,
						msg: this.opt.validations[j].msg,
						validate: this.opt.validations[j].validate,
						elm: $_this
					};
				}
			}
			$_this.data('validations', validations);
			if (this.opt.realtimeValidation) {
				if ($_this.is('select')) {
					$_this.bind('change.validator', {validator: this}, this.elm_validate_handler).bind('blur.validator', {validator: this}, this.elm_validate_handler);
				} else if ($_this.is(':radio, :checkbox')) {
					$_this.bind('click.validator', {validator: this}, this.elm_validate_handler).bind('blur.validator', {validator: this}, this.elm_validate_handler);
				} else if ($_this.is(':text, textarea')) {
					$_this.bind('keyup.validator', {validator: this}, this.elm_validate_handler).bind('blur.validator', {validator: this}, this.elm_validate_handler);
				}
			}
		}
	}
	
	this.validateOnSubmit = function () {
		this.forms = this.opt.baseElm.filter('form');
		if (this.forms.length <= 0) {
			this.forms = this.opt.baseElm.find('form');
		}
		if (this.forms.length > 0) {
			this.forms.bind('submit.validator', {validator: this}, this.forms_validate_submit_handler);
		}
	}
	
	this.runValidation = function (elms) {
		var i;
		if (typeof elms != 'undefined') {
			elms = $(this.elms.filter(elms));
		} else {
			elms = $(this.elms);
		}
		if (elms.length > 1) {
			var ret = true;
			for (i = 0; i < elms.length; i++) {
				if(!this.runValidation(elms.get(i))) {
					ret = false;
				}
			}
			return ret;
		} else {
			var validations = elms.data('validations');
			var msgs = [];
			for (i = 0; i < validations.length; i++) {
				if (!validations[i].validate()) {
					msgs[msgs.length] = validations[i].msg;
				}
			}
			this.opt.action(elms.get(0), msgs);
			if (msgs.length <= 0) {
				return true;
			} else {
				return false;
			}
		}
	}
	
	this.defaultAction = function (elm, errmsgs) {
		var i;
		elm = $(elm);
		if (errmsgs.length) {
			var div = elm.parent().children('.error');
			if (div.length <= 0) {
				div = $('<div class="error"></div>').appendTo(elm.parent());
			}
			div.html('');
			for (i = 0; i < errmsgs.length; i++) {
				div.append('<p>' + errmsgs[i] + '</p>');
			}
		} else {
			elm.parent().children('.error').remove();
		}
	}
	
	this.elm_validate_handler = function (event) {
		event.data.validator.runValidation(this);
	}
	
	this.forms_validate_submit_handler = function (event) {
		if (event.data.validator.runValidation()) {
			event.data.validator.opt.success();
		} else {
			event.data.validator.opt.failure();
			if (!event.data.validator.opt.submitOnFailure) {
				event.preventDefault();
			}
		}
	}	
	
	this.init(baseElm, opt);
}

function validate_cpf () {
	var i;
	var ret = false;
	var cpf = this.elm.val();
	if (cpf.charAt(3) == '.' && cpf.charAt(7) == '.' && cpf.charAt(11) == '-') {
		cpf = cpf.replace(/[^0-9]/gi, '');
		if (cpf.length == 11) {
			var c1 = 0;
			var c2 = 0;
			for (i = 10, ca = 0; i != 1; i--, ca++) { c1 += (i * cpf.charAt(ca)); }
			c1 = c1 % 11;
			c1 = (c1 < 2) ? 0 : 11 - c1;
			if (c1 == cpf.charAt(9)) {
				for (i = 11, ca = 0; i != 1; i--, ca++) { c2 += (i * cpf.charAt(ca)); }
				c2 = c2 % 11;
				c2 = (c2 < 2) ? c2 = 0 : 11 - c2;
				if (c2 == cpf.charAt(10)) {
					ret = true;
				}
			}
		}
	}
	return ret;
}

function validate_cnpj () {
	var i;
	var ret = false;
	var cnpj = this.elm.val();
	if (cnpj.charAt(2) == '.' && cnpj.charAt(6) == '.' && cnpj.charAt(10) == '/' && cnpj.charAt(15) == '-') {
		cnpj = cnpj.replace(/[^0-9]/gi, '');
		if (cnpj.length == 14) {
			var c1 = 0;
			var c2 = 0;
			for (i = 5, v = false, ca = 0; i != 1; i--, ca++) {
				c1 += (i * cnpj.charAt(ca));
				if (!v && i == 2) { i = 10; v = true; }
			}
			c1 = c1 % 11;
			c1 = (c1 < 2) ? 0 : 11 - c1;
			if (c1 == cnpj.charAt(12)) {
				for (i = 6, v = false, ca = 0; i != 1; i--, ca++) {
					c2 += (i * cnpj.charAt(ca));
					if (!v && i == 2) { i = 10; v = true; }
				}
				c2 = c2 % 11;
				c2 = (c2 < 2) ? c2 = 0 : 11 - c2;
				if (c2 == cnpj.charAt(13)) {
					ret = true;
				}
			}
		}
	}
	return ret;
}
function validate_numeric () {
	return (this.elm.val().match(/[^0-9]+/) ? false : true);
}
function validate_alpha () {
	return (this.elm.val().match(/[^ a-zÂÀÁÄÃâãàáäÊÈÉËêèéëÎÍÌÏîíìïÔÕÒÓÖôõòóöÛÙÚÜûúùüçÇ]+/i) ? false : true);
}
function validate_alphanum () {
	return (this.elm.val().match(/[^ 0-9a-zÂÀÁÄÃâãàáäÊÈÉËêèéëÎÍÌÏîíìïÔÕÒÓÖôõòóöÛÙÚÜûúùüçÇ]+/i) ? false : true);
}
function validate_word () {
	return (this.elm.val().match(/[^a-zÂÀÁÄÃâãàáäÊÈÉËêèéëÎÍÌÏîíìïÔÕÒÓÖôõòóöÛÙÚÜûúùüçÇ]+/i) ? false : true);
}
function validate_phone () {
	return (this.elm.val().match(/\([0-9]{2}\)[0-9]{4}-[0-9]{4}/i) ? true : false);
}
function validate_cep () {
	return (this.elm.val().match(/[0-9]{5}-[0-9]{3}/i) ? true : false);
}
function validate_email () {
	return (this.elm.val().match(/.+@.+\..+/) ? true : false);
}
function validate_date () {
	return (this.elm.val().match(/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/) ? true : false);
}
function validate_required () {
	return (this.elm.val() != '' && !this.elm.val().match(/-- .* --/));
}