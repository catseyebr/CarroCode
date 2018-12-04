jQuery(function(){
			jQuery('ul.sf-menu').superfish();
		});

function loadFilters () {
  $('a.sort_sist').click(function(){
    var c = $(this).attr('class');
    var field = c.replace(/.*?f_(.*?)( .*|$)/i, '$1');
    var value = c.replace(/.*?v_(.*?)( .*|$)/i, '$1');
    if (value != 'd' && value != 'a') {
      value = 'a';
    }
    $('#sortby').val(field);
    $('#sortdir').val(value);
    $('#filter_sist').submit();
    return false;
  });
}

function carregaTabs(){
	$(function() {
	    $('#container-1').tabs({ fxSlide: true, fxFade: true, fxSpeed: 'normal' });
       });
}
function apagar() {
	var ciente = confirm('Tem certeza de que deseja apagar este dado?');
	if(!ciente){
		return false;
	}else{
		return true;
	}
}


function loadAdmin () {
  $('.bttn').mouseover(function(){
    $(this).removeClass('button');
    $(this).addClass('btnhov');
  });
  
  $('.bttn').mouseout(function(){
    $(this).removeClass('btnhov');
    $(this).addClass('button');
  });
  
  $('.excluir input').mouseout(function(){
    $(this).removeClass('btt_apagarh');
    $(this).addClass('btt_apagar');
  });
  
  $('.exibir input').mouseover(function(){
    $(this).removeClass('btt_exibir');
    $(this).addClass('btt_exibirh');
  });
  
  $('.exibir input').mouseout(function(){
    $(this).removeClass('btt_exibirh');
    $(this).addClass('btt_exibir');
  });

  $('.editar input').mouseover(function(){
    $(this).removeClass('btt_editar');
    $(this).addClass('btt_editarh');
  });
  
  $('.editar input').mouseout(function(){
    $(this).removeClass('btt_editarh');
    $(this).addClass('btt_editar');
  });
  
  $('.excluir input').mouseover(function(){
    $(this).removeClass('btt_apagar');
    $(this).addClass('btt_apagarh');
  });
  
  $('.excluir input').mouseout(function(){
    $(this).removeClass('btt_apagarh');
    $(this).addClass('btt_apagar');
  });
  
  $('.excluir').submit(function(){
    apagar();
  });
  
  $('#end_cep').blur(
			function() {
				$.post("/jscom/cep/exibir", {cep: $(this).val()}, function(data) {
					
					if (data.erro == 'ok') {
						$('#end_estado').val(data.uf_cep);
						carregaCidade(data.uf_cep, data.city_cep);
						$('#end_bairro').val(data.bairro_cep);
						$('#end_complemento').val(data.complemento_cep);
						$('#end_endereco').val(
								data.tipo_cep + ' ' + data.rua_cep);
					} else {
						alert(data.erro);
					}
					}, "json");
				});
  
  $('#end_estado').change(
		  function() {
			  carregaCidade($(this).val())
		  });
  
  $('#autocompletetipoapartamento').autocomplete("/jscom/admin_tipoapartamento", {
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
  
  $('#autocompletehotel').autocomplete("/jscom/admin_hoteis", {
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
  
  $('#autocompletecidade').autocomplete("/jscom/admin_cidades", {
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
  
  $('input.data').keyup(function(event){
    //backspace | home | end | delete
    if (event.keyCode != 8 && event.keyCode != 35 && event.keyCode != 36 && event.keyCode != 46) {
      var value = $(this).val().replace(/[^0-9/]/i, '');
      // barra | barra
      if (event.keyCode == 111 || event.keyCode == 193) {
        value = value.replace(/(.*)\/$/i, '$1');
      }
          
      var splitdata = value.split('/');
      if (splitdata.length == 0) {
        splitdata[0] = value;
      }
      
      if (splitdata[0].length > 2) {
        _match = splitdata[0].match(/(.{2})(.*)/i, '');
        splitdata[0] = _match[1];
        splitdata[1] = _match[2];
      }
      
      if (splitdata[1]) {
        if (splitdata[1].length > 2) {
          _match = splitdata[1].match(/(.{2})(.*)/i, '');
          splitdata[1] = _match[1];
          splitdata[2] = _match[2];
        }
        
        if (splitdata[1].length = 2) {
          if (splitdata[1] > 12) {
            splitdata[1] = '12';
          } else if (splitdata[1] == '00') {
            splitdata[1] = '01';
          }
        }
        
        if (splitdata[0] == '00') {
          splitdata[0] = '01';
        } else if (splitdata[0] > 29 && splitdata[1] == '02') {
          splitdata[0] = '29';
        } else if (splitdata[0] > 30 && (splitdata[1] == '04' || splitdata[1] == '06' || splitdata[1] == '09' || splitdata[1] == '11')) {
          splitdata[0] = '30';
        } else if (splitdata[0] > 31) {
          splitdata[0] = '31';
        }
      }
      
      if (splitdata[2]) {
        if (splitdata[2].length > 4) {
          splitdata[2] = splitdata[2].replace(/(.{4}).*/i, '$1');
        } else if (splitdata[2].length == 4) {
          if (splitdata[2] < 1900) {
            splitdata[2] = 1900;
          } else if (splitdata[2] > 2200) {
            splitdata[2] = 2200;
          }
        }
        splitdata[2] = splitdata[2].replace(/[^0-9]/i, '');
      }
      
      if (splitdata.length >= 3) {
        value = splitdata[0] + '/' + splitdata[1] + '/' + splitdata[2];
      } else if (splitdata.length == 2) {
        if (splitdata[1].length == 2) {
          value = splitdata[0] + '/' + splitdata[1] +  '/';
        } else {
          value = splitdata[0] + '/' + splitdata[1];
        }
      } else {
        if (splitdata[0].length == 2) {
          value = splitdata[0] + '/';
        } else {
          value = splitdata[0];
        }
      }
      $(this).val(value);
    }
  });
  
  $('input.inteiro').keyup(function(){
    $(this).val($(this).val().replace(/[^0-9]/i, ''));
  });
  
   
  carregaTabs();
  loadFilters();

}

function loadAdminLista (controler) {
  $('#inserir').click(function(){
    document.location='/admin/' + controler + '/inserir';
  });
}

function loadAdminExibir (controler) {
  $('#voltar').click(function(){
    document.location='/admin/' + controler + '/lista';
  });
  
  $('#editar').click(function(){
    document.location='/admin/' + controler + '/editar/' + $(this).attr('class').replace(/.*id_([0-9]*?)( .*|$)/i, '$1');
  });
}

function loadAdminEditar (controler) {
  $('#voltar').click(function(){
    document.location='/admin/' + controler + '/lista';
  });
}

function loadAdminInserir (controler) {
  $('#voltar').click(function(){
    document.location='/admin/' + controler + '/lista';
  });
}

/* callback do autocomplete */
function formatResult(row) {
  return row[0].replace(/(<.+?>)/gi, '');
}

/* callback do autocomplete */
function formatItem(row) {
  return "<div>"+row[0]+"</div>";
}
function carregaCidade(uf,selecionado){
	$.post("/jscom/cep/carregaCidade", {estado: uf, selected: selecionado}, function(j) {
		var options = '<option value=""><-- Selecione a Cidade --></option>';
	      for (var i = 0; i < j.length; i++) {
	    	options += '<option value="' + j[i].id_cidade + '">' + j[i].nome_cidade + '</option>';
	      }
	      $("select#end_cidade").html(options);
	      $("#end_cidade option[value='"+ selecionado +"']").attr('selected', 'selected');
	      $("#end_estado option[value='"+ uf +"']").attr('selected', 'selected');
		}, "json");
	}