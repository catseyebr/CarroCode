function Busca () {
  this.point = 0;
  this.maxPoint = 0;
  this.leftAtual;
  this.catM;
  
  this.load = function (catM) {
    this.sliderBuscaLoad();
    this.sortCatLoad(catM);
  }
  
  this.sliderBuscaLoad = function () {
    this.setMaxPoint();
    this.exibirProxAnt();
    
    $('.lk_exibir').click(function(){
      pbusca.setPoint(this);
      $('.marca_cima2').css('left', -(pbusca.point * 119));
      $('.numeracao_comparacao2').css('left', -(pbusca.point * 119));
      $('.sub_container_precos2').css('left', -(pbusca.point * 119));
      pbusca.exibirProxAnt();
      return false;
    });
    
    $('.lk_prox').click(function(){
      pbusca.setMaxPoint();
      pbusca.setPoint(null,'+');
      $('.marca_cima2').css('left',  - (pbusca.point * 119));
      $('.numeracao_comparacao2').css('left', - (pbusca.point * 119));
      $('.sub_container_precos2').css('left', - (pbusca.point * 119));
      pbusca.exibirProxAnt();
      return false;
    });
  
    $('.lk_ant').click(function(){
      pbusca.setPoint(null,'-');
      $('.marca_cima2').css('left', -(pbusca.point * 119));
      $('.numeracao_comparacao2').css('left', -(pbusca.point * 119));
      $('.sub_container_precos2').css('left', -(pbusca.point * 119));
      pbusca.exibirProxAnt();
      return false;
    });
  }
  
  this.setPoint = function (elm, type) {
    if (elm != null) {
      this.point = (parseInt($(elm).attr('class').replace(/lk_exibir ex_(.*)?_.*/i,'$1'))) -1;
    } else if (type != null) {
      if (type == '+') {
        if (this.point + 6 <= this.maxPoint) {
          this.point += 6;
        } else {          
          this.point = this.maxPoint;
        }
      } else if (type == '-'){
        if (this.point - 6 >= 0) {
          this.point -= 6;
        } else {
          this.point = 0;
        }
      } 
    }
  }
  
  this.setMaxPoint = function () {
    this.maxPoint = (parseInt($($('.lk_exibir').get($('.lk_exibir').length - 1)).attr('class').replace(/lk_exibir ex_(.*)?_.*/i,'$1'))) - 1;
  }
  
  this.exibirProxAnt = function () {
    if (pbusca.point == pbusca.maxPoint) {
      if (!$('.lk_prox').hasClass('inativo')) {
        $('.lk_prox').addClass('inativo');
      }
      if ($('.box_1').hasClass('inativo')){
        $('.box_1').removeClass('inativo');
      }
    }
    if (pbusca.point < pbusca.maxPoint) {
      if ($('.lk_prox').hasClass('inativo')) {
        $('.lk_prox').removeClass('inativo');
      }
      if (!$('.box_1').hasClass('inativo')){
        $('.box_1').addClass('inativo');
      }
    }      
    if (pbusca.point > 0) {
      if ($('.lk_ant').hasClass('inativo')) {
        $('.lk_ant').removeClass('inativo');
      }
    }
    if (pbusca.point == 0) {
      if (!$('.lk_ant').hasClass('inativo')) {
        $('.lk_ant').addClass('inativo');
      }
    }
  }
  
  this.sortCatLoad = function(catM){
    this.catM = catM;
    $('a.ordenar').click(function(){
      pbusca.sort(this);
      return false;
    });
  } 
  
  this.sort = function  (elm) {
    var catS = $(elm).parent().attr('id');
    var catI = 0;
    var locS = '';
    var html = '';
    var html_numeracao = $('.topo_locadoras2.cima .numeracao_comparacao2').html();
    var html_logos = '';
    var html_categoria = '';
    var destaque = '';
  
    for (i = 0; i < this.catM.length; i++) {
      if (this.catM[i].id == catS) {
        catI = i;
        break;
      }
    }
    
    for (j = 0; j < this.catM[catI].loc.length; j++) {
      html_logos += '<li><img src="img/locadora_' + this.catM[catI].loc[j] + '.jpg"></li>';
    }
    
    html += '<div class="topo_locadoras2 cima"><div class="show_categorias cima"><img alt="Categorias" src="images/seta_cima.jpg"></div><div class="show_categorias cima"><img alt="Categorias" src="images/seta_cima.jpg"></div><div class="numeracao_comparacao2">' + html_numeracao + '</div><div class="marca_cima2"><ul>' + html_logos + '</ul></div></div>';
    
                    
    for (i = 0; i < this.catM.length; i++) {
      if (catI == i) {
        destaque = 'destaque';
        html_categoria = $('#' + this.catM[i].id).html().replace(/(cat_[0-9]*)(\.jpg)/gi, "$1_am$2");
      } else {
        destaque = '';
        html_categoria = $('#' + this.catM[i].id).html().replace(/(cat_[0-9]*)_am(\.jpg)/gi, "$1$2");;
      }
      html += '<div class="container_precos2 ' + destaque + '"><div class="categorias_precos" id="' + this.catM[i].id + '">' + html_categoria + '</div><div class="sub_container_precos2">';
          
      for (j = 0; j < this.catM[catI].loc.length; j++) {
        locS = this.catM[i].id + '_' + this.catM[catI].loc[j];
        html += '<div class="preco_compativo " id="' + locS + '">'+$('#' + locS).html() + '</div>';
      }
      
      html += '</div></div>';
    }
    html += '<div class="topo_locadoras2 baixo"><div class="marca_cima2" style="left: 0px;"><ul>' +  html_logos + '</ul></div><div class="numeracao_comparacao2" style="left: 0px;">' + html_numeracao + '</div><div class="show_categorias baixo"><img alt="Categorias" src="images/seta_baixo.jpg"></div></div>';
    $('#resultados_pesquisa_comparacao').html(html);
    //var $resp_comp = $('#resultados_pesquisa_comparacao');
    //$resp_comp.html(html);
    $('a.ordenar').click(function(){
      pbusca.sort(this);
      return false;
    });
    return false;
  } 
}
var pbusca = new Busca();