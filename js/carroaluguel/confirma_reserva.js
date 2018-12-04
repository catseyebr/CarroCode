$(document).ready(function() {
    	$("#confirma_locacao_form").validationEngine()
    })
    
    
    function condutorInit () {
      $('button.novo_condutor').bind('click.novo_condutor', novo_condutor_click_handler);
      $.ajax({
          cache: false,
          data: {
            id_cliente: $('#cond_id_cliente').val()
          },
          dataType: 'json',
          error: buscar_submit_error_handler,
          success: buscar_submit_success_handler,
          type: 'POST',
          url: '/buscar_condutor.php'
      });
      $('#confirma_locacao_form').bind('submit.condutor', function(event){
        var p = $('input:checked[name=condutor_p]').length;
        var ad = $('input:checked[name=condutor_ad]').length;
        var is_ad = ($('#condutor_ad').length > 0) ? true : false;
        if (p > 0 && (is_ad ? ad > 0 : true)) {
          return true;
        } else {
          if (p <= 0 && (is_ad ? ad > 0 : true)) {
            alert('Um condutor deve ser selecionados.');
          } else if (p <= 0) {
            alert('Um condutor deve ser selecionados.');
          } else {
            alert('Um condutor adicional deve ser selecionados.');
          }
          event.preventDefault();
          return false;
        }
      });
    }
    
    function novo_condutor_click_handler (event) {
      event.preventDefault();
      var html = '<div id="novo_condutor">'+
        '<ul id="opcoes_condutor">'+
          '<li><input type="radio" name="tipo_condutor" id="tipo_condutor_nac" value="nacional" /> Brasileiro</li>'+
          '<li><input type="radio" name="tipo_condutor" id="tipo_condutor_int" value="internacional" /> Estrangeiro</li>'+
        '</ul>'+
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="cancelar_condutor" type="button" class="nl">Cancelar</button>'+
      '</div>';
      $(this).parent().append(html);
      $(this).hide();
      $('#tipo_condutor_nac').bind("click.condutor", novo_condutor_nacional_click_handler);
      $('#tipo_condutor_int').bind("click.condutor", novo_condutor_internacional_click_handler);
      $('#cancelar_condutor').bind('click.condutor',cancelar_condutor_click_handler);
    }
    
    function novo_condutor_nacional_click_handler (event) {
      event.preventDefault();
      var html = '<ul class="dados contemfloat">'+
          '<li><input name="nome_condutor" id="nome_condutor" class="campo_std validate[required,custom[condutor]]" value=" -- Primeiro nome -- " /></li>'+
          '<li><input name="sobrenome_condutor" id="sobrenome_condutor" class="campo_std validate[required,custom[condutor]]" value=" -- Sobrenome -- " /></li>'+
          '<li><input name="rg_condutor" id="rg_condutor" class="campo_std validate[required,custom[condutor]]" size="14" maxlength="14" value=" -- RG -- " /></li>'+
          '<li><input name="cpf_condutor" id="cpf_condutor" class="campo_std validate[required,custom[cpf,condutor]" onkeyup="formatar_mascara(this, \'###.###.###-##\')" size="14" maxlength="14" value=" -- CPF -- " /></li>'+
          '<li><input name="cnh_condutor" id="cnh_condutor" class="campo_std validate[required,custom[onlyNumber,condutor],length[10,11]" size="17" maxlength="11" value=" -- Registro CNH -- " /></li>'+
          '<li><input name="validade_cnh_condutor" id="validade_cnh_condutor" class="campo_std validate[required,custom[date,condutor]]" size="17" maxlength="10" value=" -- Validade CNH -- " /></li>'+
        '</ul>'+
        '<input type="hidden" name="tipo_condutor" id="tipo_condutor" value="nacional" />' +
        '<button id="inserir_condutor" type="button" class="nl">Inserir</button>'+
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="cancelar_condutor" type="button" class="nl">Cancelar</button>';
      $('#novo_condutor').html(html);
      $('#nome_condutor').bind("focus.condutor",function(){if ($(this).val() == ' -- Primeiro nome -- ') {$(this).val('')}}).bind("blur.condutor",function(){if ($(this).val() == '') {$(this).val(' -- Primeiro nome -- ')}}).bind('keyup.condutor', function(){$(this).val($(this).val().toUpperCase());});
      $('#sobrenome_condutor').bind("focus.condutor",function(){if ($(this).val() == ' -- Sobrenome -- ') {$(this).val('')}}).bind("blur.condutor",function(){if ($(this).val() == '') {$(this).val(' -- Sobrenome -- ')}}).bind('keyup.condutor', function(){$(this).val($(this).val().toUpperCase());});
      $('#rg_condutor').bind("focus.condutor",function(){if ($(this).val() == ' -- RG -- ') {$(this).val('')}}).bind("blur.condutor",function(){if ($(this).val() == '') {$(this).val(' -- RG -- ')}});
      $('#cpf_condutor').bind("focus.condutor",function(){if ($(this).val() == ' -- CPF -- ') {$(this).val('')}}).bind("blur.condutor",function(){if ($(this).val() == '') {$(this).val(' -- CPF -- ')}});
      $('#cnh_condutor').bind("focus.condutor",function(){if ($(this).val() == ' -- Registro CNH -- ') {$(this).val('')}}).bind("blur.condutor",function(){if ($(this).val() == '') {$(this).val(' -- Registro CNH -- ')}});
      $('#validade_cnh_condutor').bind("focus.condutor",function(){if ($(this).val() == ' -- Validade CNH -- ') {$(this).val('')}}).bind("blur.condutor",function(){if ($(this).val() == '') {$(this).val(' -- Validade CNH -- ')}}).bind("keyup.condutor", date_keyup_handler);
      $('#inserir_condutor').bind('click', inserir_condutor_click_handler);
      $('#cancelar_condutor').bind('click.condutor',cancelar_condutor_click_handler);
      $("#novo_condutor").validationEngine();
    }
    
    function novo_condutor_internacional_click_handler (event) {
      event.preventDefault();
      var html = '<ul class="dados contemfloat">'+
          '<li><input name="nome_condutor" id="nome_condutor" class="campo_std validate[required,custom[condutor]]" value=" -- Primeiro nome -- " /></li>'+
          '<li><input name="sobrenome_condutor" id="sobrenome_condutor" class="campo_std validate[required,custom[condutor]]" value=" -- Sobrenome -- " /></li>'+
          '<li><input name="passaporte_condutor" id="passaporte_condutor" class="campo_std validate[required,custom[condutor]]" value=" -- Passaporte -- " /></li>'+
          '<li><input name="cih_condutor" id="cih_condutor" class="campo_std validate[required,custom[condutor]" value=" -- * Cod. da Habilitação -- " size="25" /></li>'+
          '<li><input name="cih_validade_condutor" id="cih_validade_condutor" class="campo_std validate[required,custom[date,condutor]]" size="17" maxlength="10" value=" -- Validade Hab. -- " /></li>'+
        '</ul>'+
        '<p style="font-size: 10px;">* O Código da habilitação pode ser o código da Carteira de Habilitação Internacional ou o código da Habilitação do país do Condutor.</p>' +
        '<input type="hidden" name="tipo_condutor" id="tipo_condutor" value="internacional" />' +
        '<button id="inserir_condutor" type="button" class="nl">Inserir</button>'+
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="cancelar_condutor" type="button" class="nl">Cancelar</button>';
      $('#novo_condutor').html(html);
      $('#nome_condutor').bind("focus.condutor",function(){if ($(this).val() == ' -- Primeiro nome -- ') {$(this).val('')}}).bind("blur.condutor",function(){if ($(this).val() == '') {$(this).val(' -- Primeiro nome -- ')}}).bind('keyup.condutor', function(){$(this).val($(this).val().toUpperCase());});
      $('#sobrenome_condutor').bind("focus.condutor",function(){if ($(this).val() == ' -- Sobrenome -- ') {$(this).val('')}}).bind("blur.condutor",function(){if ($(this).val() == '') {$(this).val(' -- Sobrenome -- ')}}).bind('keyup.condutor', function(){$(this).val($(this).val().toUpperCase());});
      $('#passaporte_condutor').bind("focus.condutor",function(){if ($(this).val() == ' -- Passaporte -- ') {$(this).val('')}}).bind("blur.condutor",function(){if ($(this).val() == '') {$(this).val(' -- Passaporte -- ')}});
      $('#cih_condutor').bind("focus.condutor",function(){if ($(this).val() == ' -- * Cod. da Habilitação -- ') {$(this).val('')}}).bind("blur.condutor",function(){if ($(this).val() == '') {$(this).val(' -- * Cod. da Habilitação -- ')}});
      $('#cih_validade_condutor').bind("focus.condutor",function(){if ($(this).val() == ' -- Validade Hab. -- ') {$(this).val('')}}).bind("blur.condutor",function(){if ($(this).val() == '') {$(this).val(' -- Validade Hab. -- ')}}).bind("keyup.condutor", date_keyup_handler);
      $('#inserir_condutor').bind('click', inserir_condutor_click_handler);
      $('#cancelar_condutor').bind('click.condutor',cancelar_condutor_click_handler);
      $("#novo_condutor").validationEngine();
    }
    
    function inserir_condutor_click_handler (event) {
      event.preventDefault();
      var c;
      $.ajax({
          cache: false,
          data: {
            id_cliente: (c = $('#cond_id_cliente').val()) ? c : '',
            nome_condutor: (c = $('#nome_condutor').val()) ? c : '',
            sobrenome_condutor: (c = $('#sobrenome_condutor').val()) ? c : '',
            rg_condutor: (c = $('#rg_condutor').val()) ? c : '',
            cpf_condutor: (c = $('#cpf_condutor').val()) ? c : '',
            cnh_condutor: (c = $('#cnh_condutor').val()) ? c : '',
            validade_cnh_condutor: (c = $('#validade_cnh_condutor').val()) ? c : '',
            passaporte_condutor: (c = $('#passaporte_condutor').val()) ? c : '',
            cih_condutor: (c = $('#cih_condutor').val()) ? c : '',
            cih_validade_condutor: (c = $('#cih_validade_condutor').val()) ? c : '',
            tipo_condutor: (c = $('#tipo_condutor').val()) ? c : ''
          },
          dataType: 'json',
          error: inserir_submit_error_handler,
          success: inserir_submit_success_handler,
          type: 'POST',
          url: '/cadastrar_condutor.php'
      });
    }
    
    function inserir_submit_error_handler (xhr, s, et) {
      alert('Erro no sistema interno!');
    }
    
    function inserir_submit_success_handler (data, s, xhr) {
      if (data.success) {
        var html_p  = '<li><strong><input type="radio" name="condutor_p" id="condutor_p_' + data.id + '" value="' + data.id + '"> ' + data.nome + ' </strong> <a href="#" class="excluir_condutor" id="excluir_condutor_p_' + data.id + '">excluir</a></li>';
        var html_ad = '<li><strong><input type="radio" name="condutor_ad" id="condutor_ad_' + data.id + '" value="' + data.id + '"> ' + data.nome + ' </strong> <a href="#" class="excluir_condutor" id="excluir_condutor_ad_' + data.id + '">excluir</a></li>';
        $('#condutor_p ul').append(html_p);
        $('#condutor_ad ul').append(html_ad);
        $('#novo_condutor').remove();
        $('button.novo_condutor').show();
      } else {
        alert('Erro ao cadastrar condutor: ' + data.error);
      }
      $('#condutor_p a.excluir_condutor, #condutor_ad a.excluir_condutor').unbind('click', buscar_click_handler);
      $('#condutor_p a.excluir_condutor, #condutor_ad a.excluir_condutor').bind('click', buscar_click_handler);
      $('#condutor_p input[name=condutor_p]').unbind('click', condutor_p_click_handler);
      $('#condutor_p input[name=condutor_p]').bind('click', condutor_p_click_handler);
      $('#condutor_ad input[name=condutor_ad]').unbind('click', condutor_ad_click_handler);
      $('#condutor_ad input[name=condutor_ad]').bind('click', condutor_ad_click_handler);
    }
    
    function buscar_submit_error_handler (xhr, s, et) {
      alert('Erro no sistema interno!');
    }
    
    function buscar_submit_success_handler (data, s, xhr) {
      var i;
      var html_p  = '';
      var html_ad = '';
      for (i = 0; i < data.length; i++) {
        html_p  = '<li><strong><input type="radio" name="condutor_p" id="condutor_p_' + data[i].id + '" value="' + data[i].id + '"> ' + data[i].nome + ' </strong> <a href="#" class="excluir_condutor" id="excluir_condutor_p_' + data[i].id + '">excluir</a></li>';
        html_ad = '<li><strong><input type="radio" name="condutor_ad" id="condutor_ad_' + data[i].id + '" value="' + data[i].id + '"> ' + data[i].nome + ' </strong> <a href="#" class="excluir_condutor" id="excluir_condutor_ad_' + data[i].id + '">excluir</a></li>';
        $('#condutor_p ul').append(html_p);
        $('#condutor_ad ul').append(html_ad);
      }
      $('#condutor_p a.excluir_condutor, #condutor_ad a.excluir_condutor').unbind('click', buscar_click_handler);
      $('#condutor_p a.excluir_condutor, #condutor_ad a.excluir_condutor').bind('click', buscar_click_handler);
      $('#condutor_p input[name=condutor_p]').unbind('click', condutor_p_click_handler);
      $('#condutor_p input[name=condutor_p]').bind('click', condutor_p_click_handler);
      $('#condutor_ad input[name=condutor_ad]').unbind('click', condutor_ad_click_handler);
      $('#condutor_ad input[name=condutor_ad]').bind('click', condutor_ad_click_handler);
    }
    
    function buscar_click_handler (event) {
      event.preventDefault();
      $.ajax({
          cache: false,
          context: this,
          data: {
            id_condutor: parseInt($(this).attr('id').replace(/excluir_condutor_(ad|p)_([0-9]+)/, '$2'))
          },
          dataType: 'json',
          error: excluir_submit_error_handler,
          success: excluir_submit_success_handler,
          type: 'POST',
          url: '/excluir_condutor.php'
      });
    }
    
    function excluir_submit_error_handler (xhr, s, et) {
      alert('Erro no sistema interno!');
    }
    
    function excluir_submit_success_handler (data, s, xhr) {
      if (data.success) {
        var id = parseInt($(this.context).attr('id').replace(/excluir_condutor_(ad|p)_([0-9]+)/, '$2'));
        alert('Condutor excluido com sucesso!');
        $('#excluir_condutor_p_' + id + ', #excluir_condutor_ad_' + id + '').parent().remove();
        
      } else {
        alert('Erro no sistema interno!');
      }
    }
    
    function date_keyup_handler (event) {
      if((96 <= event.keyCode && event.keyCode <= 105) || (48 <= event.keyCode && event.keyCode <= 57)) {
        var value = $(this).val();
        if (value.length == 2 || value.length == 5) {
          value += '-';
        }
        $(this).val(value);
      } else {
        if (event.keyCode != 46 && event.keyCode != 8 && !(36 <= event.keyCode && event.keyCode <= 40)) {
          event.preventDefault();
          $(this).val($(this).val().replace(/^(.*?).$/, '$1'));
        }
      }
    }
    
    function cancelar_condutor_click_handler (event) {
      $('#novo_condutor').remove();
      $('button.novo_condutor').show();
    }
    
    function condutor_p_click_handler (event) {
      $('#condutor_ad input[name=condutor_ad]').attr('disabled', false);
      $('#condutor_ad_' + $(this).val()).attr('disabled', true);
    }
    
    function condutor_ad_click_handler (event) {
      $('#condutor_p input[name=condutor_p]').attr('disabled', false);
      $('#condutor_p_' + $(this).val()).attr('disabled', true);
    }
    
    $(document).bind('ready.condutor', condutorInit);

    function mostra1(){
        if (document.getElementById("campo1").style.display == "none") {
            document.getElementById("campo1").style.display = "block";
			document.getElementById("cia_aerea").value = "";
			document.getElementById("num_voo").value = "";
		} else {
            document.getElementById("campo1").style.display = "none";
			document.getElementById("cia_aerea").value = "n/a";
			document.getElementById("num_voo").value = "0000";
        }
    }