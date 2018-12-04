jQuery().ready(function (){ 
	jQuery("#niveis").jqGrid({
		url:'/jscom/adm_manutencao_lista_niveis/index/?q=1', 
		datatype: "xml", 
		colNames:['Id','Nome'], 
		colModel:[ 
					{name:'niv_id',index:'niv_id', width:20,editable:false,editoptions:{readonly:true,size:10}}, 
					{name:'niv_nome',index:'niv_nome', width:200,editable:true,editoptions:{size:100}}
				], 
		rowNum:10, 
		rowList:[10,20,30,40,50,60,70,80,90,100], 
		pager: '#pagernav',
		forceFit : true, 
		autowidth: true,  
		sortname: 'niv_id', 
		viewrecords: true, 
		toolbar : [true,"top"], 
		sortorder: "asc", 
		caption:"niveis", 
		editurl:"someurl.php",
		width:"100%", 
		height:"100%" }); 
	jQuery("#niveis").jqGrid('navGrid','#pagernav',{
		editfunc: function(){ 
      			window.location.href= '/adm/manutencao_niveis/editar/options/?id='+jQuery("#niveis").jqGrid('getGridParam','selrow')}},
		{search:false}, //options 
		{height:280,reloadAfterSubmit:true}, // edit options 
		{height:280,reloadAfterSubmit:true}, // add options 
		{reloadAfterSubmit:true} //del options
	); 
	jQuery("#choice").click(function (){ jQuery("#niveis").jqGrid('setColumns'); }); 
	jQuery("#t_niveis").height(25).hide().jqGrid('filterGrid',"niveis",{gridModel:true,gridToolbar:true}); 
	//jQuery("#sg_invdate").datepicker({dateFormat:"yy-mm-dd"}); 
	jQuery("#niveis").jqGrid('navButtonAdd',"#pagernav",{caption:"Filtros",title:"Habilita filtros", 
		onClickButton:function(){ 
			if(jQuery("#t_niveis").css("display")=="none") { 
				jQuery("#t_niveis").css("display",""); } 
			else { 
				jQuery("#t_niveis").css("display","none");
		}}
	}); 
});