/** função a ser chamada no $(document).ready para buscas **/
function loadLog () {
  /** calendário de seleção de data inicial **/
  $('#datainicial').datepicker({
      minDate: 0,
      onClose: setMinDate1,
      numberOfMonths: 2,
      buttonImage : '/images/calendario.jpg',
      showOn: 'both',
      buttonImageOnly: true
  });

  /** calendário de seleção de data final **/
  $('#datafinal').datepicker({
      minDate: 0,
      onClose: setMinDate2,
      numberOfMonths: 2,
      buttonImage : '/images/calendario.jpg',
      showOn: 'both',
      buttonImageOnly: true
  });
}


/* callback do datepicker para data mínima em data inicial  */
function setMinDate1(date){
  data = date.split('/');
  if($('#datafinal').val() == 'Data Final') {
    $('#datafinal').val('');
  }
  if (($('#datafinal').val() == '') && date != '') {
    $('#datafinal').val(AvancaDias(1, parseInt(data[0]), parseInt(data[1]), parseInt(data[2])));
  }
  $('#datafinal').datepicker('option', 'minDate', $('#datainicial').datepicker('getDate'));
}

/* callback do datepicker para data mínima em data final */
function setMinDate2(date){
   if (date) {
    $('#datainicial').datepicker('option', 'maxDate', $('#datafinal').datepicker('getDate'));
  }
}