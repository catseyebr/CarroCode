function formatItem(row) {
	var temp = new Array();
	temp = row[0].split(',');
	return "<table width='100%'><tr><td>"+temp[0]+", "+temp[1]+"</td><td align='right'><i>" + temp[2] + "</i></td></tr></table>";
}
function comparaCidades(cidade1, cidade2) {
	var temp1 = new Array();
	temp1 = cidade1.split(',');
	var temp1A = new Array();
	temp1A = temp1[0].split(' - ');
	var temp2 = new Array();
	temp2 = cidade2.split(',');
	var temp2A = new Array();
	temp2A = temp2[0].split(' - ');
	cidade_compare1 = temp1A[0].toLowerCase();
	cidade_compare2 = temp2A[0].toLowerCase();
	if (cidade_compare2 == cidade_compare1){
		//alert('False');
		return false;
		}else{
		//alert('True');
		return true;}
}
function formatResult(row) {
		return row[0].replace(/(<.+?>)/gi, '');
	}
$(document).ready(function() {
	$("#cityRetirada").autocomplete("jscom/loadCidades", {formatMatch: function(row, i, max) {  
                return row.name + " " + row.to;  
        },  minChars:1, matchSubset:1, matchContains:1, cacheLength:100, formatItem:formatItem, selectOnly:0 });
	$("#cityDevolucao").autocomplete("jscom/loadCidades", {formatMatch: function(row, i, max) {  
                return row.name + " " + row.to;  
        },  minChars:1, matchSubset:1, matchContains:1, cacheLength:100, formatItem:formatItem, selectOnly:0 });
});

function setMinDataRe(date){
                data = date.split('/');
				//data2 = $('#dataRetirada').datepicker('getDate');
				//data3 = data2.split('/');

                if($('#dataDevolucao').val() == 'Data de Devolução')
                {
                   $('#dataDevolucao').val('');
                }

                //if (($('#dataDevolucao').val() == '') && date != '') {
                //    $('#dataDevolucao').val(AvancaDias(1, parseInt(data[0]), parseInt(data[1]), parseInt(data[2])));
               // }
                $('#dataDevolucao').datepicker('option', 'minDate', $('#dataRetirada').datepicker('getDate'));
				document.getElementById('dataDevolucao').value="Data de Devolução";
            }
            function setMinDataDe(date){
                if (date) {
                    $('#dataRetirada').datepicker('option', 'maxDate', $('#dataDevolucao').datepicker('getDate'));
                }
            }

	if(window.jQuery){jQuery(function(){
		(function(){ var target = jQuery('input.dataRetirada'); target.datepicker({dateFormat:'dd/mm/yy',dayNamesMin:['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],dayNamesShort:['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],monthNames:['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],monthNamesShort:['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],numberOfMonths: [1, 2], onClose: setMinDataRe, minDate: '-0d'}); })();
		(function(){ var target = jQuery('input.dataDevolucao'); target.datepicker({dateFormat:'dd/mm/yy',dayNamesMin:['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],dayNamesShort:['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],monthNames:['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],monthNamesShort:['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],numberOfMonths: [1, 2],onClose: setMinDataDe, minDate: '+1d'}); })();
		(function(){ jQuery('input.otherCity').bind('click', function(event, ui){var target = jQuery('<div id="dialog1" title="Importante!"><h1 style="text-align:center">Importante!</h1><p style="text-align:justify; font-size:12px"> 	Ao devolver o carro em cidade diferente da que retirou, desde que a locadora escolhida também tenha loja, será cobrada taxa de retorno, que pode variar entre R$ 0,80 e R$ 0,96 por kilômetro.  	</p>     <p style="text-align:justify; margin-top:10px; font-size:12px;"> Salientamos que esse valor não aparece em cotações, nas solicitações de reservas, mas sim nas confirmações que serão enviadas posteriormente.</p></div>'); target.show(); if(!target.dialog('isOpen')){target.dialog({autoOpen:false,bgiframe:true,modal:true,resizable:false,width:400,height:220,position:['center', 'center'],draggable:true})}; target.dialog('open');});})();
		
		(function(){ jQuery('#cityDevolucao').bind('change', function(event, ui){var target = jQuery('<div id="dialog1" title="Importante!"><h1 style="text-align:center">Importante!</h1><p style="text-align:justify; font-size:12px"> 	Ao devolver o carro em cidade diferente da que retirou, desde que a locadora escolhida também tenha loja, será cobrada taxa de retorno, que pode variar entre R$ 0,80 e R$ 0,96 por kilômetro.  	</p>     <p style="text-align:justify; margin-top:10px; font-size:12px;"> Salientamos que esse valor não aparece em cotações, nas solicitações de reservas, mas sim nas confirmações que serão enviadas posteriormente.</p></div>'); target.show(); if(!target.dialog('isOpen')){target.dialog({autoOpen:false,bgiframe:true,modal:true,resizable:false,width:400,height:220,position:['center', 'center'],draggable:true})}; 
	if(comparaCidades(document.getElementById('cityRetirada').value, document.getElementById('cityDevolucao').value)){
	target.dialog('open');
	};
	});})();
	})};

function validaCampos(){
	var myForm=document.getElementById('pesquisaForm');
	var retiraCidade=document.getElementById('cityRetirada');
	var devolucaoCidade=document.getElementById('cityDevolucao');
	var retiraData=document.getElementById('dataRetirada');
	var retiraHora=document.getElementById('horaRetirada');
	var devolucaoData=document.getElementById('dataDevolucao');
	var devolucaoHora=document.getElementById('horaDevolucao');
	if(retiraCidade.value=='Digite Cidade de Retirada'){
		alert ("Digite a cidade de Retirada");
		return false;
	}
	if(retiraCidade.value==''){
		alert ("Digite a cidade de Retirada");
		return false;
	}
	if(retiraData.value=='Data Retirada'){
		alert ("Digite a data de Retirada");
		return false;
	}
	if(retiraData.value==''){
		alert ("Digite a data de Retirada");
		return false;
	}
	if(retiraHora.value==''){
		alert ("Selecione a hora de Retirada");
		return false;
	}
	if(devolucaoData.value=='' || devolucaoData.value=='Data de Devolução'){
		alert ("Digite a data de Devolucao");
		return false;
	}
	if(devolucaoHora.value==''){
		alert ("Selecione a hora de Devolucao");
		return false;
	}
	return true;
}
function loadEnd () {
  $('#end_cep').blur(
			function() {
				$.post("/jscom/cep/exibir", {cep: $(this).val()}, function(data) {
					
					$('#end_estado').val(data.cep_uf_id);
						carregaCidade(data.cep_uf_id, data.cep_city_id);
						$('#end_bairro').val(data.bai_nome);
						$('#end_endereco').val(
								data.cep_tipo + ' ' + data.cep_rua);
					}, "json");
				});
  
  $('#end_estado').change(
		  function() {
			  carregaCidade($(this).val())
		  });
}

function carregaCidade(uf,selecionado){
	$.post("/jscom/cep/carregaCidade", {estado: uf, selected: selecionado}, function(j) {
		var options = '<option value=""><-- Selecione a Cidade --></option>';
	      for (var i = 0; i < j.length; i++) {
	    	options += '<option value="' + j[i].city_id + '">' + j[i].city_nome + '</option>';
	      }
	      $("select#end_cidade").html(options);
	      $("#end_cidade option[value='"+ selecionado +"']").attr('selected', 'selected');
	      $("#end_estado option[value='"+ uf +"']").attr('selected', 'selected');
		}, "json");
	}