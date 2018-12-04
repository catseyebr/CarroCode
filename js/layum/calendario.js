function setMinDataRe(date){
                data = date.split('/');
				if($('#data_devolucao').val() == 'Data de Devolução')
                {
                   $('#data_devolucao').val('');
                }

                $('#data_devolucao').datepicker('option', 'minDate', $('#data_retirada').datepicker('getDate'));
				document.getElementById('data_devolucao').value="";
            }
            function setMinDataDe(date){
                if (date) {
                    $('#data_retirada').datepicker('option', 'maxDate', $('#data_devolucao').datepicker('getDate'));
                }
            }

	if(window.jQuery){jQuery(function(){
		(function(){ var target = jQuery('input.data_retirada'); target.datepicker({dateFormat:'dd/mm/yy',dayNamesMin:['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],dayNamesShort:['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],monthNames:['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],monthNamesShort:['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],numberOfMonths: [1, 2], onClose: setMinDataRe, minDate: '-0d'}); })();
		(function(){ var target = jQuery('input.data_devolucao'); target.datepicker({dateFormat:'dd/mm/yy',dayNamesMin:['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],dayNamesShort:['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],monthNames:['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],monthNamesShort:['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],numberOfMonths: [1, 2],onClose: setMinDataDe, minDate: '+1d'}); })();
		
})};