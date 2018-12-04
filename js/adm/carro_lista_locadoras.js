jQuery().ready(function (){ 
	jQuery("#locadoras").jqGrid({
		url:'/jscom/adm_carro_lista_locadoras/index/?q=1', 
		datatype: "xml", 
		colNames:['Id','Nome Locadora', 'Ativa?'], 
		colModel:[ 
					{name:'loc_id',index:'loc_id', width:55,editable:false,editoptions:{readonly:true,size:10}}, 
					{name:'loc_nomelocadora',index:'loc_nomelocadora', width:200,editable:true,editoptions:{size:10}}, 
					{name:'loc_ativo',index:'loc_ativo', width:80,editable:true,editoptions:{size:25}}
				], 
		rowNum:10, 
		rowList:[10,20,30,40,50,60,70,80,90,100], 
		pager: '#pagernav',
		forceFit : true, 
		autowidth: true,  
		sortname: 'loc_id', 
		viewrecords: true, 
		toolbar : [true,"top"], 
		sortorder: "asc", 
		caption:"Locadoras", 
		editurl:"someurl.php",
		width:"100%", 
		height:"100%" }); 
	jQuery("#locadoras").jqGrid('navGrid','#pagernav',{
		editfunc: function(){ 
      			window.location.href= '/adm/carro_locadoras/editar/options/?id='+jQuery("#locadoras").jqGrid('getGridParam','selrow')}},
		{search:false}, //options 
		{height:280,reloadAfterSubmit:true}, // edit options 
		{height:280,reloadAfterSubmit:true} // add options 
	); 
	jQuery("#choice").click(function (){ jQuery("#locadoras").jqGrid('setColumns'); }); 
	jQuery("#t_locadoras").height(25).hide().jqGrid('filterGrid',"locadoras",{gridModel:true,gridToolbar:true}); 
	//jQuery("#sg_invdate").datepicker({dateFormat:"yy-mm-dd"}); 
	jQuery("#locadoras").jqGrid('navButtonAdd',"#pagernav",{caption:"Filtros",title:"Habilita filtros", 
		onClickButton:function(){ 
			if(jQuery("#t_locadoras").css("display")=="none") { 
				jQuery("#t_locadoras").css("display",""); } 
			else { 
				jQuery("#t_locadoras").css("display","none");
		}}
	}); 
});