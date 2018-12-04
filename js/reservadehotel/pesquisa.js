/** função a ser chamada no $(document).ready para pesquisas **/
function loadPesquisa () {
  $('.ver_detalhes').click(function(){
    if ($('#precos_' + $(this).attr('id')).hasClass('inativo')) {
      $('#precos_' + $(this).attr('id')).removeClass('inativo');
      $(this).html('fechar detalhes');
    } else {
      $('#precos_' + $(this).attr('id')).addClass('inativo');
      $(this).html('ver detalhes');
    }
    return false;
  });
  
  $('form.hoteis input').click(function(){
    $('#h_' + $(this).attr('id').replace(/(apa_[0-9]+?)_[0-9]+/i, '$1')).val($(this).val());
    var tot_dias = parseInt($('#tot_dias').val());
    var hotel    = parseInt($(this).parents('form').children('[name=hotel]').val());
    var vl_fn    = 0;
    $('form.hoteis .check_apa').each(function(){
      if ($(this).attr('checked')) {
        var _match = $(this).attr('id').match(/apa_([0-9]+)_([0-9]+)/i);
        var valor  = moeda.desformatar($('#precoapa_' + _match[2]).text().replace(/.*?([0-9\.,]+?.*)/i, '$1'));
        var qtde   = parseInt($('#qtde_cat_' + _match[1]).val());
        vl_fn += (valor * qtde * tot_dias);
      }
    });
    $('#precohotel_' + hotel).html('<span>R$</span> ' + moeda.formatar(vl_fn));
  });
}