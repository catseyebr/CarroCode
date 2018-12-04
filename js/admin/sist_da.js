function Sist_DA (contentHolderId, menuHolderId) {
  this.contentHolder;
  this.menuHolder;
  this.selected;
  this.counter = 1;
  
  this.init = function (contentHolderId, menuHolderId) {
    
    this.contentHolder = $('#' + contentHolderId);
    this.contentHolder.submit(function(){return false;});
    var html = '<div id="item1">' +
                 '<input id="item1_princ" type="text" name="item1_princ" />' +
                 '<div id="item1_holder" class="contemfloat"></div>'+
               '</div>' +
               '<div id="button_submit"><button type="submit" id="sist_da-submit">submit</button></div>';
    this.contentHolder.prepend(html);
    $('#item1 input').bind('keydown', this, this.onInputKeyDown);
    $('#sist_da-submit').bind('click', this, this.onSubmitButtonClick);
    
    
    var menu = '<div id="sist_da-menu">' + 
                 '<a class="add_bool" href="" id="sist_da-add_bool">Sim/Não</a>' + 
                 '<a class="add_qtde" href="" id="sist_da-add_qtde">Quantidade</a>' +
                 '<a class="add_value" href="" id="sist_da-add_value">Valor</a>' +
                 '<a class="add_desc" href="" id="sist_da-add_desc">Descrição</a>' + 
                 '<a class="add_list" href="" id="sist_da-add_list">Lista</a>' +
                 '<form id="sist_da-hid_form" style="display: none;" action="" method="post">' +
                 '</form>' +
               '</div>';
    this.menuHolder = $('#' + menuHolderId);
    this.menuHolder.prepend(menu);
    $('#sist_da-add_bool').bind('click', this, this.onAddBoolClick);
    $('#sist_da-add_qtde').bind('click', this, this.onAddQtdeClick);
    $('#sist_da-add_value').bind('click', this, this.onAddValueClick);
    $('#sist_da-add_desc').bind('click', this, this.onAddDescClick);
    $('#sist_da-add_list').bind('click', this, this.onAddListClick);
  }
  
  this.onInputKeyDown = function (event) {
    if (event.keyCode == 13) {
      var handler = event.data;
      handler.addOption(this);
    }
  }
  
  this.onDivClick = function (event) {
    var handler = event.data;
    handler.selectOption($(this).parent().get(0));
  }
  
  this.onDivDblClick = function (event) {
    var handler = event.data;
    handler.editOption(this);
  }
  
  this.onAddBoolClick = function (event) {
    var handler = event.data;
    handler.addBool();
    return false;
  }
  
  this.onRemoveBoolClick = function (event) {
    var handler = event.data;
    handler.removeBool(this);
    return false;
  }
  
  this.onAddQtdeClick = function (event) {
    var handler = event.data;
    handler.addQtde();
    return false;
  } 
  
  this.onRemoveQtdeClick = function (event) {
    var handler = event.data;
    handler.removeQtde(this);
    return false;
  }
  
  this.onAddValueClick = function (event) {
    var handler = event.data;
    handler.addValue();
    return false;
  }
  
  this.onRemoveValueClick = function (event) {
    var handler = event.data;
    handler.removeValue(this);
    return false;
  }
  
  this.onAddDescClick = function (event) {
    var handler = event.data;
    handler.addDesc();
    return false;
  }
  
  this.onRemoveDescClick = function (event) {
    var handler = event.data;
    handler.removeDesc(this);
    return false;
  }
  
  this.onAddListClick = function (event) {
    var handler = event.data;
    handler.addList();
    return false;
  }
  
  this.onRemoveListClick = function (event) {
    var handler = event.data;
    handler.removeList(this);
    return false;
  }
  
  this.onAddItemClick = function (event) {
    var handler = event.data;
    handler.addItem(this);
    return false;
  }
  
  this.onRemoveItemClick = function (event) {
    var handler = event.data;
    handler.removeItem(this);
    return false;
  }
  
  this.onSubmitButtonClick = function (event) {
    var handler = event.data;
    handler.submitForm();
    return false;
  }
  
  this.addOption = function (DOMinput) {
    var input = $(DOMinput);
    var id = input.attr('id');
    var val = input.val();
    var _parent = $(input.parent().get(0));
    var html = '<div id="'+ id +'" class="princ">' + val + '</div>';
    if (val != '') {
      input.remove();
      if ($('#' + id + '-remove_item').length > 0) {
          $(html).insertAfter($('#' + id + '-remove_item'));
        } else {
          _parent.prepend(html);
        }
      $('#' + id).bind('dblclick', this, this.onDivDblClick);
      $('#' + id).bind('click', this, this.onDivClick);
    }
    this.selectOption(_parent.get(0));
  }
  
  this.editOption = function (DOMdiv) {
    var div = $(DOMdiv);
    var id = div.attr('id');
    var val = div.text();
    var parent = $(div.parent().get(0));
    div.remove();
    parent.prepend('<input id="'+ id +'" type="text" name="'+ id +'" value="'+ val +'"/>');
    $('#' + id).bind('keydown', this, this.onInputKeyDown);
  }
  
  this.selectOption = function (DOMdiv) {
    if (typeof this.selected == 'object') {
      this.selected.removeClass('selected');
      $('#' + this.selected.attr('id') + '_princ').removeClass('selected');
    }
    this.selected = $(DOMdiv);
    this.selected.addClass('selected');
    $('#' + this.selected.attr('id') + '_princ').addClass('selected');
  }
  
  this.addBool = function () {
    if (typeof this.selected == 'object') {
      var id = this.selected.attr('id');
      if ($('#' + id + '_bool').length <= 0) {
        var html = '<div class="inner_item" id="' + id + '_bool">' +
                     '<div class="inner_text">(&nbsp;) Sim (&nbsp;) Não</div>' +
                     '<a class="apagar_dado" href="" id="' + id + '_bool-remove_bool"></a>' +
                   '</div>';
        $('#' + id + '_holder').prepend(html);
      }
    }
    $('#' + id + '_bool-remove_bool').bind('click', this, this.onRemoveBoolClick);
  }
                                     
  this.removeBool = function (DOMremoveBool) {
    var id = $(DOMremoveBool).attr('id').replace(/(.*?)-.*/i, '$1');
    $('#' + id).remove();
  } 

  this.addQtde = function () {
    if (typeof this.selected == 'object') {
      var id = this.selected.attr('id');
      if ($('#' + id + '_qtde').length <= 0) {
        var html = '<div class="inner_item" id="' + id + '_qtde">' +
                     '<div class="inner_text">[quantidade]</div>' +
                     '<a class="apagar_dado" href="" id="' + id + '_qtde-remove_qtde"></a>' +
                   '</div>';
        if ($('#' + id + '_bool').length > 0) {
          $(html).insertAfter($('#' + id + '_bool'));
        } else {
        	$('#' + id + '_holder').prepend(html);
        }
      }
    }
    $('#' + id + '_qtde-remove_qtde').bind('click', this, this.onRemoveQtdeClick);
  }
                                     
  this.removeQtde = function (DOMremoveQtde) {
    var id = $(DOMremoveQtde).attr('id').replace(/(.*?)-.*/i, '$1');
    $('#' + id).remove();
  } 
  
  this.addValue = function () {
    if (typeof this.selected == 'object') {
      var id = this.selected.attr('id');
      if ($('#' + id + '_value').length <= 0) {
        var html = '<div class="inner_item" id="' + id + '_value">' +
                     '<div class="inner_text">[valor]</div>' +
                     '<a class="apagar_dado" href="" id="' + id + '_value-remove_value"></a>' +
                   '</div>';
        if ($('#' + id + '_qtde').length > 0) {
          $(html).insertAfter($('#' + id + '_qtde'));
        } else if ($('#' + id + '_bool').length > 0) {
          $(html).insertAfter($('#' + id + '_bool'));
        } else {
        	$('#' + id + '_holder').prepend(html);
        }
      }
    }
    $('#' + id + '_value-remove_value').bind('click', this, this.onRemoveValueClick);
  }
                                     
  this.removeValue = function (DOMremoveValue) {
    var id = $(DOMremoveValue).attr('id').replace(/(.*?)-.*/i, '$1');
    $('#' + id).remove();
  } 
  
  this.addDesc = function () {
    if (typeof this.selected == 'object') {
      var id = this.selected.attr('id');
      if ($('#' + id + '_desc').length <= 0) {
        var html = '<div class="inner_item" id="' + id + '_desc">' +
                   '<div class="inner_text">[descrição]</div>' +
                   '<a class="apagar_dado" href="" id="' + id + '_desc-remove_desc"></a>' +
                   '</div>';
        if ($('#' + id + '_value').length > 0) {
          $(html).insertAfter($('#' + id + '_value'));
        } else if ($('#' + id + '_qtde').length > 0) {
          $(html).insertAfter($('#' + id + '_qtde'));
        } else if ($('#' + id + '_bool').length > 0) {
          $(html).insertAfter($('#' + id + '_bool'));
        } else {
        	$('#' + id + '_holder').prepend(html);
        }
      }
    }
    $('#' + id + '_desc-remove_desc').bind('click', this, this.onRemoveDescClick);
  }
  
  this.removeDesc = function (DOMremoveDesc) {
    var id = $(DOMremoveDesc).attr('id').replace(/(.*?)-.*/i, '$1');
    $('#' + id).remove();
  } 
  
  this.addList = function () {
    if (typeof this.selected == 'object') {
      var id = this.selected.attr('id');
      if ($('#' + id + '_list').length <= 0) {
        this.counter++;
        var html = '<div class="inner_item_lista contemfloat" id="' + id + '_list">' +
        			 '<div class="contemfloat toolbar_lista">'+
        			 '<a class="adicionar_dado_lista" href="" id="' + id + '_list-add_item">Adicionar item na lista</a>' +
        			 '<a class="apagar_dado_lista" href="" id="' + id + '_list-remove_list">Remover Lista</a>' +
        			 '</div>'+
                     '<div id="item' + this.counter + '" class="ref dad_' + id + '">' +
                       '<input id="item' + this.counter + '_princ" name="item' + this.counter + '_princ" />' +
                       '<div id="item' + this.counter + '_holder" class="contemfloat"></div>'+
                     '</div>' +  
                   '</div>';
        
        $(html).insertAfter($('#' + id + '_holder'));
       
        $('#item' + this.counter + ' input').bind('keydown', this, this.onInputKeyDown);
        $('#' + id + '_list-add_item').bind('click', this, this.onAddItemClick);
        $('#' + id + '_list-remove_list').bind('click', this, this.onRemoveListClick);
      }
    }
  }
  
  this.removeList = function (DOMremoveList) {
    var id = $(DOMremoveList).attr('id').replace(/(.*?)-.*/i, '$1');
    $('#' + id).remove();
  }
  
  this.addItem = function (DOMaddItem) {
    this.counter++;
    var id = $(DOMaddItem).attr('id').replace(/(.*?)-.*/i, '$1');
    var div = $('#' + id);
    var html = '<div id="item' + this.counter + '" class="ref dad_' + id.replace(/(item[0-9]*?)_list/i, '$1') + ' contemfloat">' +
    			'<a class="remove_item_list" href="" id="item' + this.counter + '-remove_item"></a>' +
    			'<input id="item' + this.counter + '_princ" type="text" name="item' + this.counter + '_princ" />' +
                 '<div id="item' + this.counter + '_holder" class="contemfloat"></div>'+
               '</div>';
    div.append(html);
    $('#item' + this.counter + ' input').bind('keydown', this, this.onInputKeyDown);
    $('#item' + this.counter + '-remove_item').bind('click', this, this.onRemoveItemClick);
  }
  
  this.removeItem = function (DOMremoveItem) {
    var id = $(DOMremoveItem).attr('id').replace(/(.*?)-.*/i, '$1');
    $('#' + id).remove();
  }
  
  this.submitForm = function () {
    var form = $('#sist_da-hid_form');
    var fields = '';
    var val = '';
    for (var i = this.counter; i > 0; i--) {
      if ($('#item' + i).length > 0) {
        val += 'id: ' + i + ';';
        val += 'princ: ' + $('#item' + i + '_princ').text() + ';';
        if ($('#item' + i).hasClass('ref')) {
          val += 'ref: ' + $('#item' + i).attr('class').replace(/ref dad_item([0-9]*?)( .*|$)/i, '$1') + ';';
        } else {
          val += 'ref: ;';
        }
        if ($('#item' + i + '_bool').length > 0) {
          val += 'bool: 1;';
        } else {
          val += 'bool: 0;';
        }
         
        if ($('#item' + i + '_qtde').length > 0) {
          val += 'qtde: 1;';
        } else {
          val += 'qtde: 0;';
        }
         
        if ($('#item' + i + '_value').length > 0) {
          val += 'value: 1;';
        } else {
          val += 'value: 0;';
        }
         
        if ($('#item' + i + '_desc').length > 0) {
          val += 'desc: 1;';
        } else {
          val += 'desc: 0;';
        }
         
        if ($('#item' + i + '_list').length > 0) {
          val += 'list: 1;';
        } else {
          val += 'list: 0;';
        }
        form.append('<input type="hidden" id="item_' + i + '" name="item_' + i + '" value="' + val + '" />');
        fields = 'item_' + i + ';' + fields;
      }
      val = '';
    }
    form.append('<input type="hidden" id="fields" name="fields" value="' + fields + '" />');
    form.submit();
  }
   
  this.init(contentHolderId, menuHolderId);
}