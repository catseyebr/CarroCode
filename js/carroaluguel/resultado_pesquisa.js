//use $(window).load(fn) if you need to load "all" page content including images, frames, etc.
    $(document).ready(function(){ 
        $("#preloader").css("display","none");
        $("#full_page").css("display","block");
		$("body").removeClass('topo_inter');
		$("body").addClass('topo_internas');
      });
	  function verifyDispoMain (post_data) {
		$.post(
				"disponibilidade.php",
				post_data,
				function(j) {
					if (j.status == 0) {
						html = '<img src="images/rsv_unavail.gif" width="19" height="19" alt="Reservar Online" align="absmiddle" />&nbsp;<span>INDISPONÍVEL</span>';
					} else if (j.status == 1) {
						html = '<a style="color:#090; text-decoration:none" href="http://www.carroaluguel.com/escolha_loja.php?cityRetirada=Curitiba - PR, ,12 lojas&selecDevolucao=&cityDevolucao=Curitiba - PR, ,12 lojas&dataRetirada=04/10/2010&horaRetirada=12:00&categoriasVeiculos=&dataDevolucao=05/10/2010&horaDevolucao=12:00&selecionaLocadora='+j.nome_loc+'&selecionaGrupo='+j.grupo_id+'&valor_xml=&true_xml=1&teste_xml=0&rate_qual='+j.rate_qual+'" title="Reservar online"><img src="images/rsv_online.gif" width="80" height="23" alt="Reservar Online" align="absmiddle" /></a>';
					} else if (j.status == 4) {
						html = '<img src="images/rsv_onunvail.gif" width="18" height="17" alt="Grupo Inexistente" align="absmiddle" />&nbsp;<span>INEXISTENTE</span>';
					} else {
						html = '<a style="text-decoration:none; color:#334499" href="http://www.carroaluguel.com/escolha_loja.php?cityRetirada=Curitiba - PR, ,12 lojas&selecDevolucao=&cityDevolucao=Curitiba - PR, ,12 lojas&dataRetirada=04/10/2010&horaRetirada=12:00&categoriasVeiculos=&dataDevolucao=05/10/2010&horaDevolucao=12:00&selecionaLocadora='+j.nome_loc+'&selecionaGrupo='+j.grupo_id+'"title="Não disponível no momento"><img src="images/rsv_on_blue.gif" width="19" height="19" alt="Não disponível no momento" align="absmiddle" />&nbsp;SOLICITAR</a>';
					}
					$('#'+j.id_retorno).attr('class', 'dispo_loaded');
					$('#'+j.id_retorno).html(html);
				},
				"json"
		);
                    
	}