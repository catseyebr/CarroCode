jQuery().ready(function (){ 
	jQuery("#recursos_assoc").jqGrid({
		url:'/jscom/adm_manutencao_edita_niveis/index/?q=1', 
		datatype: "xml", 
		colNames:['Nome'], 
		colModel:[ 
					{name:'rec_nome',index:'rec_nome', width:150,edittype:'select',editable:true,editoptions:{dataUrl: '/jscom/adm_combos/recursos'}}
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
		caption:"Recursos Associados", 
		editurl:"/adm/manutencao_niveis/crud",
		width:"100%", 
		height:"100%" });
	jQuery("#recursos_assoc").jqGrid('navGrid','#pagernav',
		{search:false,edit:false}, //options 
		{}, // edit options 
		{height:280,reloadAfterSubmit:true}, // add options 
		{
			caption: "Apagar",
    		msg: "Apagar registro(s)?",
   			bSubmit: "Apagar",
    		bCancel: "Cancelar",
		} //del options
	); 
	jQuery("#choice").click(function (){ jQuery("#recursos_assoc").jqGrid('setColumns'); }); 
	jQuery("#t_recursos_assoc").height(25).hide().jqGrid('filterGrid',"recursos_assoc",{gridModel:true,gridToolbar:true}); 
	//jQuery("#sg_invdate").datepicker({dateFormat:"yy-mm-dd"}); 
	jQuery("#recursos_assoc").jqGrid('navButtonAdd',"#pagernav",{caption:"Filtros",title:"Habilita filtros", 
		onClickButton:function(){ 
			if(jQuery("#t_recursos_assoc").css("display")=="none") { 
				jQuery("#t_recursos_assoc").css("display",""); } 
			else { 
				jQuery("#t_recursos_assoc").css("display","none");
		}}
	}); 
});