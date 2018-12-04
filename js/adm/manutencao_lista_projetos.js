jQuery().ready(function (){ 
	jQuery("#projetos").jqGrid({
		url:'/jscom/adm_manutencao_lista_projetos/index/?q=1', 
		datatype: "xml", 
		colNames:['Id','Nome Projeto'], 
		colModel:[ 
					{name:'proj_id',index:'proj_id', width:55,editable:false,editoptions:{readonly:true,size:10}}, 
					{name:'proj_nome',index:'proj_nome', width:200,editable:true,editoptions:{size:10}}
				], 
		rowNum:10, 
		rowList:[10,20,30,40,50,60,70,80,90,100], 
		pager: '#pagernav',
		forceFit : true, 
		autowidth: true,  
		sortname: 'proj_id', 
		viewrecords: true, 
		toolbar : [true,"top"], 
		sortorder: "asc", 
		caption:"Projetos", 
		editurl:"someurl.php",
		width:"100%", 
		height:"100%" }); 
	jQuery("#projetos").jqGrid('navGrid','#pagernav',
		{search:false}, //options 
		{height:280,reloadAfterSubmit:false}, // edit options 
		{height:280,reloadAfterSubmit:false}, // add options 
		{reloadAfterSubmit:false} //del options
	); 
	jQuery("#choice").click(function (){ jQuery("#projetos").jqGrid('setColumns'); }); 
	jQuery("#t_projetos").height(25).hide().jqGrid('filterGrid',"projetos",{gridModel:true,gridToolbar:true}); 
	//jQuery("#sg_invdate").datepicker({dateFormat:"yy-mm-dd"}); 
	jQuery("#projetos").jqGrid('navButtonAdd',"#pagernav",{caption:"Filtros",title:"Habilita filtros", 
		onClickButton:function(){ 
			if(jQuery("#t_projetos").css("display")=="none") { 
				jQuery("#t_projetos").css("display",""); } 
			else { 
				jQuery("#t_projetos").css("display","none");
		}}
	}); 
});