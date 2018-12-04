/** função a ser chamada no $(document).ready para buscas **/
function loadBusca () {
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
  
  /** autocomplete para hotel **/
  $("#autocompletehotel").autocomplete("jscom/hoteis", {
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
  
  /** seleção de modelo de busca (cidade|hotel) **/
  $('.pesquisar').click(function () {
    if ($(this).val() == 'c') {
      $("#autocompletecidade").show();
      $("#autocompletehotel").hide();
    } else {
      $("#autocompletecidade").hide();
      $("#autocompletehotel").show();
    }
  });
  
  /** calendário de seleção de data inicial **/
  $('#retiradaini').datepicker({
      minDate: 0,
      onClose: setMinDate1,
      numberOfMonths: 2,
      buttonImage : '/images/calendario.jpg',
      showOn: 'both',
      buttonImageOnly: true
  });

  /** calendário de seleção de data final **/
  $('#retiradafim').datepicker({
      minDate: 0,
      onClose: setMinDate2,
      numberOfMonths: 2,
      buttonImage : '/images/calendario.jpg',
      showOn: 'both',
      buttonImageOnly: true
  });
  
  /** combo para seleção de quantidade de aps **/
  $('#quantidade_apartamentos').change(function(){
    var html = '';
    var qtde_nova = parseInt($(this).val());
    var qtde_atual = $('.tipo_ap').length;
    if (qtde_nova > qtde_atual) {
      for (i = qtde_atual + 1; i <= qtde_nova; i++) {
        html += '<select id="tipo_apartamento_' + i + '" name="tipo_apartamento[]" class="tipo_ap">';
        html += $('#tipo_apartamento_1').html();
        html += '</select>';
      }
      $('#tipo_apartamento_1').after(html);
    } else {
      for (i = qtde_atual; i > qtde_nova; i--) {
        $('#tipo_apartamento_' + i).remove();
      }
    }
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

/* callback do datepicker para data mínima em data inicial  */
function setMinDate1(date){
  data = date.split('/');
  if($('#retiradafim').val() == 'Data de Saída') {
    $('#retiradafim').val('');
  }
  if (($('#retiradafim').val() == '') && date != '') {
    $('#retiradafim').val(AvancaDias(1, parseInt(data[0],10), parseInt(data[1],10), parseInt(data[2],10)));
  }
  $('#retiradafim').datepicker('option', 'minDate', $('#retiradaini').datepicker('getDate'));
}

/* callback do datepicker para data mínima em data final */
function setMinDate2(date){
   if (date) {
    $('#retiradaini').datepicker('option', 'maxDate', $('#retiradafim').datepicker('getDate'));
  }
}