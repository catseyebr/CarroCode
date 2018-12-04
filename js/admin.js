$(function() {

	$('input, textarea').livequery('focus', function() {
		if ($(this).val() == $(this).attr('defaultvalue')) {
			$(this).val('');
		}
	});

	$('input, textarea').livequery('blur', function() {
		if ($(this).val() == '') {
			// $(this).val($(this).attr('defaultvalue'));
		}
	});

	$('input.money').livequery('focus', function() {
		$('input.money').each(function() {
			$(this).maskMoney( {
				symbol : "",
				decimal : ".",
				thousands : "",
				precision : 2
			});
		});
		$('input.money').expire('focus');
	});

	$('input.date').livequery('focus', function() {
		$('input.date').each(function() {
			$(this).mask('99/99/9999');
			;
		});
		$('input.date').expire('focus');
	});

	$('button.add').livequery('click', function() {

		idTr = $(this).attr('id').replace('add', 'clone');
		idTab = $(this).attr('id').replace('add', 'tab');
		$('#' + idTab).append('<tr>' + $('#' + idTr).html() + '</tr>');

	});

	$('button.remove').livequery('click', function() {

		$(this).parents('tr').each(function() {

			$(this).remove();
			return false;

		});

	});

	$('input.autocomplete').livequery('focus', function() {
		$('input.autocomplete').each(function() {
			$(this).autocomplete("/hotel2/admin/autocomplete/tiposervico", {
				delay : 10,
				minChars : 1,
				matchSubset : 1,
				matchContains : 1,
				cacheLength : 0,
				autoFill : false
			});
		});
		$('input.autocomplete').expire('focus');
	});

	/*
	 * Hoteis
	 */
	$('#fieldset-dados-adcionais, #fieldset-dados-adcionais_ap')
			.find('input')
			.each(
					function() {

						$(this)
								.click(
										function() {
											if ($(this).attr('checked') == true) {

												html = $(
														'#opcoes' + ($(this)
																.attr('id'))
																.replace('-',
																		'') + '-element')
														.html();
												$(this).parent().after(html);
											} else {
												$(
														'#fieldset-opcoes' + ($(this)
																.attr('id'))
																.replace('-',
																		''))
														.remove();
											}
										});
					});

	$('#estacionamento-1').livequery(
			'click',
			function() {
				$('#formhotel').find(
						'#fieldset-opcoesdados_adcionaiscutoestacionamento')
						.each(function() {
							$(this).remove();
						});
				html = $('#opcoesdados_adcionaiscutoestacionamento-element')
						.html();
				$(this).parent().after(html);
			});

	$('#estacionamento-0').livequery(
			'click',
			function() {
				$('#formhotel').find(
						'#fieldset-opcoesdados_adcionaiscutoestacionamento')
						.each(function() {
							$(this).remove();
						});
			});

	$('#passeiocavalo-2').livequery(
			'click',
			function() {
				$('#formhotel').find(
						'#fieldset-opcoesdados_adcionaisginaasticavalor').each(
						function() {
							$(this).remove();
						});
				html = $('#opcoesdados_adcionaisginaasticavalor-element')
						.html();
				$(this).parent().after(html);
			});

	$('#passeiocavalo-1').livequery(
			'click',
			function() {
				$('#formhotel').find(
						'#fieldset-opcoesdados_adcionaisginaasticavalor').each(
						function() {
							$(this).remove();
						});
			});

	$('#charrete-2').livequery(
			'click',
			function() {
				$('#formhotel').find(
						'#fieldset-opcoesdados_adcionaischerretevalor').each(
						function() {
							$(this).remove();
						});
				html = $('#opcoesdados_adcionaischerretevalor-element').html();
				$(this).parent().after(html);
			});

	$('#charrete-1').livequery(
			'click',
			function() {
				$('#formhotel').find(
						'#fieldset-opcoesdados_adcionaischerretevalor').each(
						function() {
							$(this).remove();
						});
			});

	$('#internet-2').livequery(
			'click',
			function() {
				$('#formhotel').find(
						'#fieldset-opcoesdados_adcionaisinternetvalor').each(
						function() {
							$(this).remove();
						});
				html = $('#opcoesdados_adcionaisinternetvalor-element').html();
				$(this).parent().after(html);
			});

	$('#internet-1').livequery(
			'click',
			function() {
				$('#formhotel').find(
						'#fieldset-opcoesdados_adcionaisinternetvalor').each(
						function() {
							$(this).remove();
						});
			});

	$('#sauna_-2').livequery(
			'click',
			function() {
				$('#formhotel').find(
						'#fieldset-opcoesdados_adcionaissaunavalor').each(
						function() {
							$(this).remove();
						});
				html = $('#opcoesdados_adcionaissaunavalor-element').html();
				$(this).parent().after(html);
			});

	$('#sauna_-1').livequery(
			'click',
			function() {
				$('#formhotel').find(
						'#fieldset-opcoesdados_adcionaissaunavalor').each(
						function() {
							$(this).remove();
						});
			});

	$('#ginastica-2').livequery(
			'click',
			function() {
				$('#formhotel').find(
						'#fieldset-opcoesdados_adcionaisginaasticavalor').each(
						function() {
							$(this).remove();
						});
				html = $('#opcoesdados_adcionaisginaasticavalor-element')
						.html();
				$(this).parent().after(html);
			});

	$('#ginastica-1').livequery(
			'click',
			function() {
				$('#formhotel').find(
						'#fieldset-opcoesdados_adcionaisginaasticavalor').each(
						function() {
							$(this).remove();
						});
			});

	$('#estacionamento-1').livequery('click', function() {
		if ($(this).attr('checked') == true) {

		}
		$(this).expire('click');
	});

	$('#estacionamento-0').livequery('click', function() {
		if ($(this).attr('checked') == true) {

		}
		$(this).expire('click');
	});

	$('#end_cep').blur(
			function() {
				if ($(this).val().length == 9) {
					$.getJSON(window.location + "/../../cep/buscar/cep/"
							+ $(this).val(), function(data) {
						if (data.erro == 'ok') {
							$('#end_cidade').val(data.nome_cidade);
							$('#end_estado').val(data.nome_estado);
							$('#end_bairro').val(data.bairro_cep);
							$('#end_complemento').val(data.complemento_cep);
							$('#end_endereco').val(
									data.tipo_cep + ' ' + data.rua_cep);
						} else {
							alert(data.erro);
						}
					});
				} else {

				}
			});

	$('#hca_idcategoria').attr('disabled', 'disabled');

	$('#categoria_hotel').change(function() {
		if ($(this).val() == 18) {
			$('#hca_idcategoria').attr('disabled', false);
		} else {
			$('#hca_idcategoria').attr('disabled', true);
		}

	});

	if (document.getElementById('formhotel')) {

		/**
		 * SPRY
		 */
		var sprytextfield1 = new Spry.Widget.ValidationTextField("valida_nome",
				"none", {
					validateOn : [ "blur", "change" ],
					hint : "Nome do hotel",
					minChars : 3
				});
		var sprytextfield2 = new Spry.Widget.ValidationTextField("valida_cnpj",
				"none", {
					validateOn : [ "blur", "change" ],
					pattern : "00.000.000/0000-00",
					useCharacterMasking : true,
					hint : "00.000.000/0000-00"
				});
		var sprytextfield3 = new Spry.Widget.ValidationTextField("valida_cep",
				"zip_code", {
					validateOn : [ "blur", "change" ],
					useCharacterMasking : true,
					format : "zip_custom",
					pattern : "00000-000",
					hint : "00000-000"
				});
		var sprytextfield4 = new Spry.Widget.ValidationTextField(
				"valida_endereco", "none", {
					validateOn : [ "blur", "change" ],
					minChars : 3
				});
		var sprytextfield5 = new Spry.Widget.ValidationTextField(
				"valida_numero", "none", {
					validateOn : [ "blur", "change" ]
				});
		var sprytextfield5 = new Spry.Widget.ValidationTextField(
				"valida_cidade", "none", {
					validateOn : [ "blur", "change" ]
				});
		var sprytextfield5 = new Spry.Widget.ValidationTextField(
				"valida_estado", "none", {
					validateOn : [ "blur", "change" ]
				});
		var sprytextfield6 = new Spry.Widget.ValidationTextField(
				"valida_telefone", "custom", {
					validateOn : [ "blur", "change" ],
					pattern : "00 0000-0000",
					useCharacterMasking : true,
					hint : "00 0000-0000"
				});
		var sprytextfield7 = new Spry.Widget.ValidationTextField("valida_fax",
				"custom", {
					validateOn : [ "blur", "change" ],
					pattern : "00 0000-0000",
					useCharacterMasking : true,
					hint : "00 0000-0000",
					isRequired : false
				});
		var sprytextfield8 = new Spry.Widget.ValidationTextField(
				"valida_toolfree", "custom", {
					validateOn : [ "blur", "change" ],
					useCharacterMasking : true,
					pattern : "0800 000 0000",
					isRequired : false,
					hint : "0800 000 0000"
				});
		var sprytextfield9 = new Spry.Widget.ValidationTextField(
				"valida_email_recep", "email", {
					validateOn : [ "blur", "change" ],
					isRequired : false
				});
		var sprytextfield10 = new Spry.Widget.ValidationTextField(
				"valida_email_gerente", "email", {
					validateOn : [ "blur", "change" ],
					isRequired : false
				});
		var sprytextfield11 = new Spry.Widget.ValidationTextField(
				"valida_email_reservas", "email", {
					validateOn : [ "blur", "change" ],
					isRequired : false
				});
		var sprytextfield12 = new Spry.Widget.ValidationTextField(
				"valida_email_comercial", "email", {
					validateOn : [ "blur", "change" ],
					isRequired : false
				});
		var sprytextfield13 = new Spry.Widget.ValidationTextField(
				"valida_email_financeiro", "email", {
					validateOn : [ "blur", "change" ],
					isRequired : false
				});
		var sprytextfield14 = new Spry.Widget.ValidationTextField(
				"valida_fone_gerente", "custom", {
					validateOn : [ "blur", "change" ],
					pattern : "00 0000-0000",
					useCharacterMasking : true,
					hint : "00 0000-0000",
					isRequired : false
				});
		var sprytextfield15 = new Spry.Widget.ValidationTextField(
				"valida_fone_reservas", "custom", {
					validateOn : [ "blur", "change" ],
					pattern : "00 0000-0000",
					useCharacterMasking : true,
					hint : "00 0000-0000",
					isRequired : false
				});
		var sprytextfield16 = new Spry.Widget.ValidationTextField(
				"valida_fone_comercial", "custom", {
					validateOn : [ "blur", "change" ],
					pattern : "00 0000-0000",
					useCharacterMasking : true,
					hint : "00 0000-0000",
					isRequired : false
				});
		var sprytextfield17 = new Spry.Widget.ValidationTextField(
				"valida_fone_financeiro", "custom", {
					validateOn : [ "blur", "change" ],
					pattern : "00 0000-0000",
					useCharacterMasking : true,
					hint : "00 0000-0000",
					isRequired : false
				});
		var sprytextfield18 = new Spry.Widget.ValidationTextField(
				"valida_homepage", "url", {
					validateOn : [ "blur", "change" ],
					isRequired : false
				});
		var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1",
				{
					minChars : 5,
					validateOn : [ "blur", "change" ],
					minAlphaChars : 2,
					minNumbers : 3
				});
		var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1",
				"senha", {
					validateOn : [ "blur", "change" ]
				});
		var sprytextarea1 = new Spry.Widget.ValidationTextarea(
				"valida_descricao", {
					counterType : "chars_count",
					counterId : "countsprytextarea1",
					hint : "Descricao",
					validateOn : [ "blur", "change" ],
					isRequired : false
				});
		var sprytextarea2 = new Spry.Widget.ValidationTextarea(
				"valida_termouso", {
					counterType : "chars_count",
					counterId : "countsprytextarea2",
					hint : "Termos de Uso",
					validateOn : [ "blur", "change" ],
					isRequired : false
				});
		var sprytextarea3 = new Spry.Widget.ValidationTextarea(
				"valida_metadescription", {
					counterType : "chars_count",
					counterId : "countsprytextarea3",
					hint : "Meta description",
					validateOn : [ "blur", "change" ],
					isRequired : false
				});
		var sprytextarea4 = new Spry.Widget.ValidationTextarea(
				"valida_metakeywords", {
					counterType : "chars_count",
					counterId : "countsprytextarea4",
					hint : "Meta keywords",
					validateOn : [ "blur", "change" ],
					isRequired : false
				});
		var sprytextfield19 = new Spry.Widget.ValidationTextField(
				"valida_gerente", "none", {
					validateOn : [ "blur", "change" ],
					hint : "Nome do gerente",
					minChars : 3,
					isRequired : true
				});
		var sprytextfield20 = new Spry.Widget.ValidationTextField(
				"valida_reserva", "none", {
					validateOn : [ "blur", "change" ],
					hint : "Nome do responsavel pela reserva",
					minChars : 3,
					isRequired : true
				});
		var sprytextfield21 = new Spry.Widget.ValidationTextField(
				"valida_comercial", "none", {
					validateOn : [ "blur", "change" ],
					hint : "Nome do responsavel comercial",
					minChars : 3,
					isRequired : true
				});
		var sprytextfield22 = new Spry.Widget.ValidationTextField(
				"valida_financeiro", "none", {
					validateOn : [ "blur", "change" ],
					hint : "Nome do responsavel financeiro",
					minChars : 3,
					isRequired : true
				});
		var sprytextfield6 = new Spry.Widget.ValidationTextField(
				"valida_checkin", "custom", {
					validateOn : [ "blur", "change" ],
					pattern : "00:00",
					useCharacterMasking : true,
					hint : "00:00"
				});
		var sprytextfield6 = new Spry.Widget.ValidationTextField(
				"valida_checkout", "custom", {
					validateOn : [ "blur", "change" ],
					pattern : "00:00",
					useCharacterMasking : true,
					hint : "00:00"
				});
		var sprytextfield6 = new Spry.Widget.ValidationTextField(
				"valida_hot_idadecrianca", "custom", {
					validateOn : [ "blur", "change" ],
					pattern : "00",
					useCharacterMasking : true,
					hint : "00"
				});

	}
});