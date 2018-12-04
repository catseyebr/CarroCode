$(document).ready(function() {
    	$("#cadastro_de_locadora").validationEngine
		({
			validationEventTriggers:"keyup focus change"
		})
	})
	$('input').blur(function(){alert("pa");});