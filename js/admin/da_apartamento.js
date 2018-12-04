function loadDAApartamento () {
  $('input.radio_bool').click(function(){
    var value = $(this).val();
    var id = $(this).attr('id').replace(/(item_[0-9]*?)_bool_(s|n)/i, '$1')
    var campos_extra = $('#' + id + ' div div.campos_extra:first');
    var lista = $('#' + id + ' div.childs:first');
    if (value == 1) {
      if (campos_extra.hasClass('inativo')) {
        campos_extra.removeClass('inativo');
      }
      if (lista.hasClass('inativo')) {
        lista.removeClass('inativo');
      }
    } else {
      $('#' + id + ' div.childs input:checkbox').each(function(){
        $(this).attr('checked', false);
      });
      $('#' + id + ' div.childs input:radio').each(function(){
        if ($(this).attr('id').match(/item_[0-9]*?_bool_s/i)) {
          $(this).attr('checked', false);
        } else if ($(this).attr('id').match(/item_[0-9]*?_bool_n/i)) {
          $(this).attr('checked', false);
        }
      });
      $('#' + id + ' div.childs').each(function(){
        if (!$(this).hasClass('inativo')) {
          $(this).addClass('inativo');
        }
      });
      if (!campos_extra.hasClass('inativo')) {
        campos_extra.addClass('inativo');
      }
      if (!lista.hasClass('inativo')) {
        lista.addClass('inativo');
      }
    }
  });
  $('input.check_bool').click(function(){
    var value = $(this).attr('checked');
    var id = $(this).attr('id').replace(/(item_[0-9]*?)_check/i, '$1');
    var campos_extra = $('#' + id + ' div div.campos_extra:first');
    var lista = $('#' + id + ' div.childs:first');
    if (value) {
      if (campos_extra.hasClass('inativo')) {
        campos_extra.removeClass('inativo');
      }
      if (lista.hasClass('inativo')) {
        lista.removeClass('inativo');
      }
    } else {
      if (!campos_extra.hasClass('inativo')) {
        campos_extra.addClass('inativo');
      }
      if (!lista.hasClass('inativo')) {
        lista.addClass('inativo');
      }
    }
  });
}