function loadSac () {
  $("#escolha_cidade").autocomplete("jscom/cidades", {
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
  
  /** div para informar telefone **/
  $('#escolha_cidade').focus(function(){            
		$(function(){ 
        var cidade = $('#escolha_cidade').val();
		    $.post("jscom/telefones",{cidade: cidade,},function(data){
		      $("#telefone").text(data);
		    }); // fecha o $.post
		}); // fim do jquery
	}); // fim do focus

}