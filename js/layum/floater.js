function Floater (elm, dimensions, locker, mover) {
  this.init = function (elm, dimensions, locker, mover) {
    if ($.browser.msie) {
      this.rel = $(document.body);
    } else {
      this.rel = $(window);
    }
    this.elm = $(elm);
    this.minY = (dimensions.minY > 0) ? dimensions.minY : 0;
    this.maxY = (dimensions.maxY > 0) ? dimensions.maxY : null;
    this.baseY = this.elm.offset().top;
    this.relY = 0;
    this.minX  = (dimensions.minX > 0) ? dimensions.minX : 0;
    this.maxX = (dimensions.maxX > 0) ? dimensions.maxX : null;
    this.baseX = this.elm.offset().left;
    this.relX = 0;
    this.lock = false;
    
    var parent = this.elm;
    var pos;
    var os;
    while (parent = parent.parent()) {
      if (parent.get(0) == document) {
        break;
      }
      pos = parent.css('position');
      if (pos == 'absolute' || pos == 'relative') {
        os = parent.offset();
        this.relY = os.top;
        this.relX = os.left;
        break;
      }
    }
    
    
    $(window).bind('scroll.floater', {_this: this}, this.floater_scroll_handler);
    if (locker) {
      this.locker = $(locker);
      this.locker.bind('click.floater', {_this: this}, this.locker_click_handler);
    }
    if (mover) {
      this.mover = $(mover);
      this.mover.bind('mousedown.floater', {_this: this}, this.mover_mousedown_handler);
    }
  }
  
  this.scroll = function () {
    if (!this.lock) {
      var top = $(window).scrollTop();
      var left = $(window).scrollLeft();
      this.elm.stop().animate({
          top: this.top(top + this.baseY),
          left: this.left(left + this.baseX)
        }, 100);
    }
  }
  
  this.drag = function (X, Y) {
    var offset = this.mover.offset();
    this.moverX = X - offset.left;
    this.moverY = Y - offset.top;
    this.rel.bind('mousemove.floater', {_this: this}, this.mover_mousemove_handler);
    this.rel.bind('mouseup.floater', {_this: this}, this.mover_mouseup_handler);
    $(window).bind('scroll.floater_move', function(event){event.preventDefault();});
  }
  
  this.move = function (X, Y) {
    this.baseY = Y - this.moverY;
    this.baseY = (this.baseY > this.minY) ? this.baseY : this.minY;
    this.baseX = X - this.moverX;
    this.baseX = (this.baseX > this.minX) ? this.baseX : this.minX;
    this.elm.stop().animate({top: this.top(this.baseY), left: this.left(this.baseX)}, 7);
    this.baseY -= $(window).scrollTop();
    this.baseY = (this.baseY > 0) ? this.baseY : 0;
    this.baseX -= $(window).scrollLeft();
    this.baseX = (this.baseX > 0) ? this.baseX : 0;
  }
  
  this.drop = function () {
    this.rel.unbind('mousemove.floater');
    this.rel.unbind('mouseup.floater');
    $(window).unbind('scroll.floater_move');
  }
  
  this.top = function (vref) {
	var scroll = $(window).scrollTop();
    var top;
    var maxY = (this.maxY != null) ? (this.maxY - this.elm.outerHeight(true)) : ($(document.body).outerHeight(true) - this.elm.outerHeight(true));
    if (vref > this.minY) {
      if (vref < maxY) {
        top = vref;
      } else {
        top = maxY;
      }
    } else {
      top = this.minY;
    }
    return top - this.relY;
  }
  
  this.left = function (vref) {
	var scroll = $(window).scrollLeft();
    var left;
    var maxX = (this.maxX != null) ? (this.maxX - this.elm.outerWidth(true)) : ($(document.body).outerWidth(true) - this.elm.outerWidth(true));
    if (vref > this.minX) {
      if (vref < maxX) {
        left = vref;
      } else {
        left = maxX;
      }
    } else {
      left = this.minX;
    }
    return left - this.relX;
  }
  
  this.floater_scroll_handler = function (event) {
    event.data._this.scroll();
  }
  
  this.locker_click_handler = function (event) {
    event.preventDefault();
    if (event.data._this.lock == true) {
      event.data._this.lock = false;
    } else {
      event.data._this.lock = true;
    }
  }
  
  this.mover_mousedown_handler = function (event) {
    if (event.which == 1) {
      event.preventDefault();
      event.data._this.drag(event.pageX, event.pageY);
    }
  }
  
  this.mover_mousemove_handler = function (event) {
    event.data._this.move(event.pageX, event.pageY);
  }
  
  this.mover_mouseup_handler = function (event) {
    event.data._this.drop();
  }
  
  this.init(elm, dimensions, locker, mover);
}