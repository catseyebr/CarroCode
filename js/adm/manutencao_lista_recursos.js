jQuery().ready(function (){ 
	jQuery("#recursos").jqGrid({
		url:'/jscom/adm_manutencao_lista_recursos/index/?q=1', 
		datatype: "xml", 
		colNames:['Id','Nome'], 
		colModel:[ 
					{name:'rec_id',index:'rec_id', width:20,editable:false,editoptions:{readonly:true,size:10}}, 
					{name:'rec_nome',index:'rec_nome', width:200,editable:true,editoptions:{size:40}}
				], 
		rowNum:10, 
		rowList:[10,20,30,40,50,60,70,80,90,100], 
		pager: '#pagernav',
		forceFit : true, 
		autowidth: true,  
		sortname: 'rec_id', 
		viewrecords: true, 
		toolbar : [true,"top"], 
		sortorder: "asc", 
		caption:"recursos", 
		editurl:"/adm/manutencao_recursos/crud",
		width:"100%", 
		height:"100%" }); 
	jQuery("#recursos").jqGrid('navGrid','#pagernav',
		{search:false}, //options 
		{height:280,reloadAfterSubmit:true}, // edit options 
		{height:280,reloadAfterSubmit:true}, // add options 
		{
			caption: "Apagar",
    		msg: "Apagar registro(s)?",
   			bSubmit: "Apagar",
    		bCancel: "Cancelar",
		} //del options
	); 
	jQuery("#choice").click(function (){ jQuery("#recursos").jqGrid('setColumns'); }); 
	jQuery("#t_recursos").height(25).hide().jqGrid('filterGrid',"recursos",{gridModel:true,gridToolbar:true}); 
	//jQuery("#sg_invdate").datepicker({dateFormat:"yy-mm-dd"}); 
	jQuery("#recursos").jqGrid('navButtonAdd',"#pagernav",{caption:"Filtros",title:"Habilita filtros", 
		onClickButton:function(){ 
			if(jQuery("#t_recursos").css("display")=="none") { 
				jQuery("#t_recursos").css("display",""); } 
			else { 
				jQuery("#t_recursos").css("display","none");
		}}
	}); 
});