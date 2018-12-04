function loadCidade () {
	/** autocomplete para cidade **/
  $("#autocompletecidade").autocomplete("jscom/cidades", {
    formatMatch: function(row, i, max) {
      return row.name + " " + row.to;  
    },
    minChars:1,
    matchSubset:0,
    matchContains:0,
    cacheLength:100,
    formatItem:formatItem,
    selectOnly:0 
  });
  
  $("#autocompletecidade").show();
  
  /** div para informar telefone **/
  $('#autocompletecidade').focus(function(){            
		$(function(){ 
        var cidade = $('#autocompletecidade').val();
		    $.post("jscom/telefones",{cidade: cidade,},function(data){
		      $("#telefone").text(data);
		    }); // fecha o $.post
		}); // fim do jquery
	}); // fim do focus

	/** CARREGA CIDADES NO CADASTRO DE CLIENTES ou CEP*/
	$('#cep').blur(
			function() {
				$.post("/jscom/cep/exibir", {cep: $(this).val()}, function(data) {
					
					if (data.erro == 'ok') {
						$('#estado').val(data.uf_cep);
						carregaCidade(data.uf_cep, data.city_cep);
						$('#bairro').val(data.bairro_cep);
						$('#complemento').val(data.complemento_cep);
						$('#endereco').val(
								data.tipo_cep + ' ' + data.rua_cep);
					} else {
						alert(data.erro);
					}
					}, "json");
				});
  
	
	$('#estado').change(
		  function() {
			  carregaCidade($(this).val())
		  });
	carregaCidade($('#estado').val(),$('#selecionado').val())
	/** FIM */
}

function carregaCidade(uf,selecionado){
	$.post("/jscom/cep/carregaCidade", {estado: uf, selected: selecionado}, function(j) {
		var options = '';
				options += '<option value=""> -- Selecione a cidade -- </option>';
	      for (var i = 0; i < j.length; i++) {
	    	options += '<option value="' + j[i].id_cidade + '">' + j[i].nome_cidade + '</option>';
	      }
	      $("select#cidade").html(options);
	      $("#cidade option[value='"+ selecionado +"']").attr('selected', 'selected');
		}, "json");
	}