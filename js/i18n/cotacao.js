$(document).bind('ready', initCotacao);

function initCotacao () {
	var p = $('#info div.cont');
	var p_os = p.offset();
	var p_w = p.outerWidth();
	var p_h = p.outerHeight();
	var dimensions = {
			minY: p_os.top,
			minX: p_os.left,
			maxY: p_h + p_os.top,
			maxX: p_w + p_os.left
	};
	window.f = new Floater('#valores', dimensions, '#valores-display-locker', '#valores-display-mover');
}