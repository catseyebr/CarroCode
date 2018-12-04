function ComparacaoOrdenador (catM, base_elm) {
  this.base_elm = base_elm;
  this.catM = catM;
  this.last_base;
  this.last_cats = [];
  this.last_locs = [];
  this.last_itens = [];
  
  this.init = function () {
    window.co = this;
    $(base_elm + ' .categoria a').bind('click.co', this.link_click_handler);
  }
  
  this.sort = function (id) {    
    this.last_base = $(this.base_elm).clone();
    this.last_cats = [];
    this.last_locs = [];
    this.last_itens = [];
    
    for (i = 0; i < this.catM.length; i++) {
      this.last_cats[i] = {
        id: this.catM[i].id,
        classes: this.last_base.find('#cat_' + this.catM[i].id).attr('class'),
        html: this.last_base.find('#cat_' + this.catM[i].id).html()
      };
      
      if ('cat_' + this.last_cats[i].id == id) {
        for (j = 0; j < this.catM[i].loc.length; j++) {
          this.last_locs[j] = {
            id: this.catM[i].loc[j],
            classes: this.last_base.find('#loc_' + this.catM[i].loc[j]).attr('class'),
            html: this.last_base.find('#loc_' + this.catM[i].loc[j]).html()
          };
        }
      } 
    }
    var lil;
    for (i = 0; i < this.last_cats.length; i++) {
      for (j = 0; j < this.last_locs.length; j++) {
        lil = this.last_itens.length;
        this.last_itens[lil] = {
          id: this.last_cats[i].id + '_' + this.last_locs[j].id,
          classes: this.last_base.find('#item_' + this.last_cats[i].id + '_' + this.last_locs[j].id).attr('class'),
          html: this.last_base.find('#item_' + this.last_cats[i].id + '_' + this.last_locs[j].id).html()
        };
      }
    }
    
    var locs = this.last_base.find('.locadora').html('');
    var cats = this.last_base.find('.categoria').html('');
    var itens = this.last_base.find('.item').html('');
    
    var temp;
    
    for (i = 0; i < this.last_locs.length; i++) {
      $(locs.get(i)).attr('class', this.last_locs[i].classes).attr('id', 'loc_' + this.last_locs[i].id).html(this.last_locs[i].html);
    }
    
    for (i = 0, k = 0; i < this.last_cats.length; i++) {
      $(cats.get(i)).attr('class', this.last_cats[i].classes).attr('id', 'cat_' + this.last_cats[i].id).html(this.last_cats[i].html);
      for (j = 0; j < this.last_locs.length; j++, k++) {
        $(itens.get(k)).attr('class', this.last_itens[k].classes).attr('id', 'item_' + this.last_itens[k].id).html(this.last_itens[k].html);
      }
    }
    
    $(this.base_elm).html(this.last_base.html());
    $(this.base_elm + ' .categoria a').bind('click.co', this.link_click_handler);
    return this;
  }
  
  this.link_click_handler = function (event) {
    window.co.sort($(this).parents('.categoria').attr('id'));
    return false;
  }
  
  this.init();
}