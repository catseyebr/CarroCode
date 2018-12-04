jQuery().ready(function (){ 
	jQuery("#cidades").jqGrid({
		url:'/jscom/adm_manutencao_lista_cidades/index/?q=1', 
		datatype: "xml", 
		colNames:['Id','UF','Nome da Cidade','País'], 
		colModel:[ 
					{name:'city_id',index:'city_id', width:20,editable:false,editoptions:{readonly:true,size:10}}, 
					{name:'city_uf_id',index:'city_uf_id', width:20,editable:true,editoptions:{size:10}},
					{name:'city_nome',index:'city_nome', width:200,editable:true,editoptions:{size:10}},
					{name:'city_pais_id',index:'city_pais_id', width:20,editable:true,editoptions:{size:10}}
				], 
		rowNum:10, 
		rowList:[10,20,30,40,50,60,70,80,90,100], 
		pager: '#pagernav',
		forceFit : true, 
		autowidth: true,  
		sortname: 'city_id', 
		viewrecords: true, 
		toolbar : [true,"top"], 
		sortorder: "asc", 
		caption:"Cidades", 
		editurl:"someurl.php",
		width:"100%", 
		height:"100%" }); 
	jQuery("#cidades").jqGrid('navGrid','#pagernav',
		{search:false}, //options 
		{height:280,reloadAfterSubmit:false}, // edit options 
		{height:280,reloadAfterSubmit:false}, // add options 
		{reloadAfterSubmit:false} //del options
	); 
	jQuery("#choice").click(function (){ jQuery("#cidades").jqGrid('setColumns'); }); 
	jQuery("#t_cidades").height(25).hide().jqGrid('filterGrid',"cidades",{gridModel:true,gridToolbar:true}); 
	//jQuery("#sg_invdate").datepicker({dateFormat:"yy-mm-dd"}); 
	jQuery("#cidades").jqGrid('navButtonAdd',"#pagernav",{caption:"Filtros",title:"Habilita filtros", 
		onClickButton:function(){ 
			if(jQuery("#t_cidades").css("display")=="none") { 
				jQuery("#t_cidades").css("display",""); } 
			else { 
				jQuery("#t_cidades").css("display","none");
		}}
	}); 
});