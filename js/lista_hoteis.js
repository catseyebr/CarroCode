/** função a ser chamada no $(document).ready para lista de hoteis **/
function loadListaHoteis () {
  /** autocomplete para cidade **/
  $("#cidade").autocomplete("/jscom/cidades", {
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
}