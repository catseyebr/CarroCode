jQuery().ready(function (){ 
	jQuery("#grupos").jqGrid({
		url:'/jscom/adm_carro_lista_grupos/index/?q=1', 
		datatype: "xml", 
		colNames:['Id','Nome Grupo'], 
		colModel:[ 
					{name:'grp_id',index:'grp_id', width:55,editable:false,editoptions:{readonly:true,size:10}}, 
					{name:'grp_nome',index:'grp_nome', width:200,editable:true,editoptions:{size:10}} 
				], 
		rowNum:10, 
		rowList:[10,20,30,40,50,60,70,80,90,100], 
		pager: '#pagernav',
		forceFit : true, 
		autowidth: true,  
		sortname: 'grp_id', 
		viewrecords: true, 
		toolbar : [true,"top"], 
		sortorder: "asc", 
		caption:"Grupos", 
		editurl:"someurl.php",
		width:"100%", 
		height:"100%" }); 
	jQuery("#grupos").jqGrid('navGrid','#pagernav',{
		delfunc: function(){ 
      			window.location.href= '/adm/manutencao_niveis/editar/options/?id='+jQuery("#grupos").jqGrid('getGridParam','selrow')}},
		{search:false}, //options 
		{height:280,reloadAfterSubmit:true}, // edit options 
		{height:280,reloadAfterSubmit:true} // add options 
	); 
	jQuery("#choice").click(function (){ jQuery("#grupos").jqGrid('setColumns'); }); 
	jQuery("#t_grupos").height(25).hide().jqGrid('filterGrid',"grupos",{gridModel:true,gridToolbar:true}); 
	//jQuery("#sg_invdate").datepicker({dateFormat:"yy-mm-dd"}); 
	jQuery("#grupos").jqGrid('navButtonAdd',"#pagernav",{caption:"Filtros",title:"Habilita filtros", 
		onClickButton:function(){ 
			if(jQuery("#t_grupos").css("display")=="none") { 
				jQuery("#t_grupos").css("display",""); } 
			else { 
				jQuery("#t_grupos").css("display","none");
		}}
	}); 
});