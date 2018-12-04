$(document).bind('ready', initMenu);

function initMenu () {
  $('#menu .nivel1').bind('mouseover', nivel1_mouseover).bind('mouseout', nivel1_mouseout);
  $('#menu .nivel2').bind('mouseover', nivel2_mouseover).bind('mouseout', nivel2_mouseout);
  window.menu_nivel1_default = $('#menu .nivel1.default').get(0);
  window.menu_nivel2_default = $('#menu .nivel2.default').get(0);
  nivel1_animate(window.menu_nivel1_default);
  nivel2_animate(window.menu_nivel2_default);
}

function nivel1_mouseover (event) {
  if (window.menu_nivel1_active.get(0) != this) {
    nivel1_animate(this);
  }
}

function nivel1_mouseout (event) {
  if (typeof window.menu_nivel1_default == 'object') {
    if (window.menu_nivel1_default != this) {
      if ($(event.relatedTarget).parents('.' + $(this).attr('class').replace(/ /g, '.')).length <= 0) {
        nivel1_animate(window.menu_nivel1_default);
      }
    }
  }
}

function nivel1_animate (elm) {
  if (window.menu_nivel1_active) {
    window.menu_nivel1_active.removeClass('active');
  }
  window.menu_nivel1_active = $(elm);
  if (!elm.hpos) {
    elm.hleft  = window.menu_nivel1_active.position().left - 16;
    elm.hwidth = window.menu_nivel1_active.width() + 32;
  }
  $('#menu-hover').stop().animate({
      left: elm.hleft,
      width: elm.hwidth
  }, 450, function (){
    window.menu_nivel1_active.addClass('active');
    nivel2_activate(window.menu_nivel1_active);
  });
}

function nivel2_mouseover (event) {
  if (window.menu_nivel2_active.get(0) != this) {
    nivel2_animate(this);
  }
}

function nivel2_mouseout (event) {
  if (typeof window.menu_nivel2_default == 'object') {
    if (window.menu_nivel1_default != this) {
      if ($(event.relatedTarget).parents('.' + $(this).attr('class').replace(/ /g, '.')).length <= 0) {
        nivel2_animate(window.menu_nivel2_default);
      }
    }
  } else {
    if ($(event.relatedTarget).parents('.' + $(this).attr('class').replace(/ /g, '.')).length <= 0) {
      nivel2_animate();
    }
  }
}

function nivel2_animate (elm) {
  if (window.menu_nivel2_active) {
    window.menu_nivel2_active.removeClass('active');
  }
  window.menu_nivel2_active = $(elm);
  window.menu_nivel2_active.addClass('active');
  nivel3_activate(window.menu_nivel2_active);
}

function nivel2_activate (prnt) {
  if (window.nivel2_parent) {
    window.nivel2_parent.css({opacity: 0, display: 'none'});
  }
  window.nivel2_parent = prnt.children('.nivel2_parent');
  window.nivel2_parent.css({opacity: 0, display: 'block'}).animate({
      opacity: 1
  }, 450);
}

function nivel3_activate (prnt) {
  if (window.nivel3_parent) {
    window.nivel3_parent.css({opacity: 0, display: 'none'});
  }
  window.nivel3_parent = prnt.children('.nivel3_parent');
  window.nivel3_parent.css({opacity: 0, display: 'block'}).animate({
      opacity: 1
  }, 350);
}
