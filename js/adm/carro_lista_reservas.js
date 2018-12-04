jQuery().ready(function (){ 
	jQuery("#reservas").jqGrid({
		url:'/jscom/adm_carro_lista_reservas/index/?q=1', 
		datatype: "xml", 
		colNames:['Reserva', 'Locadora', 'Fone Loja', 'Grupo', 'Empresa', 'Conf', 'Emissor', 'Solicitação', 'Retirada', 'Valor', 'Op', 'Status', 'Stur', 'Nr. Conf'], 
		colModel:[ 
					{name:'rescar_id',index:'rescar_id', editable:false,editoptions:{readonly:true,size:10}},
					{name:'rescar_loc_id',index:'rescar_loc_id', editable:false,editoptions:{readonly:true,size:10}},
					{name:'rescar_loj_id_retirar',index:'rescar_loj_id_retirar', editable:false,editoptions:{readonly:true,size:10}},
					{name:'rescar_grp_id',index:'rescar_grp_id', editable:false,editoptions:{readonly:true,size:10}},
					{name:'rescar_id',index:'rescar_id', editable:false,editoptions:{readonly:true,size:10}},
					{name:'rescar_cnpj_stur_id',index:'rescar_cnpj_stur_id', editable:false,editoptions:{readonly:true,size:10}},
					{name:'rescar_usuem_id',index:'rescar_usuem_id', editable:false,editoptions:{readonly:true,size:10}},
					{name:'rescar_data_retirar',index:'rescar_data_retirar', editable:false,editoptions:{readonly:true,size:10}},
					{name:'rescar_data_devolver',index:'rescar_data_devolver', editable:false,editoptions:{readonly:true,size:10}},
					{name:'rescar_vlr_diarias',index:'rescar_vlr_diarias', editable:false,editoptions:{readonly:true,size:10}},
					{name:'rescar_usu_id_operador',index:'rescar_usu_id_operador', editable:false,editoptions:{readonly:true,size:10}},
					{name:'rescar_status',index:'rescar_status', editable:false,editoptions:{readonly:true,size:10}},
					{name:'rescar_stur_id',index:'rescar_stur_id', editable:false,editoptions:{readonly:true,size:10}},
					{name:'rescarconf_nmbconf',index:'rescarconf_nmbconf', editable:false,editoptions:{readonly:true,size:10}}
				], 
		rowNum:10, 
		rowList:[10,20,30,40,50,60,70,80,90,100], 
		pager: '#pagernav',
		forceFit : true, 
		autowidth: true,  
		sortname: 'rescar_id', 
		viewrecords: true, 
		toolbar : [true,"top"], 
		sortorder: "asc", 
		caption:"Reservas", 
		editurl:"someurl.php",
		width:"100%", 
		height:"100%" }); 
	jQuery("#reservas").jqGrid('navGrid','#pagernav',{
		delfunc: function(){ 
      			window.location.href= '/adm/manutencao_niveis/editar/options/?id='+jQuery("#reservas").jqGrid('getGridParam','selrow')}},
		{search:false,edit:false}, //options 
		{height:280,reloadAfterSubmit:true}, // edit options 
		{height:280,reloadAfterSubmit:true} // add options 
	); 
	jQuery("#choice").click(function (){ jQuery("#reservas").jqGrid('setColumns'); }); 
	jQuery("#t_reservas").height(25).hide().jqGrid('filterGrid',"reservas",{gridModel:true,gridToolbar:true}); 
	//jQuery("#sg_invdate").datepicker({dateFormat:"yy-mm-dd"}); 
	jQuery("#reservas").jqGrid('navButtonAdd',"#pagernav",{caption:"Filtros",title:"Habilita filtros", 
		onClickButton:function(){ 
			if(jQuery("#t_reservas").css("display")=="none") { 
				jQuery("#t_reservas").css("display",""); } 
			else { 
				jQuery("#t_reservas").css("display","none");
		}}
	}); 
});