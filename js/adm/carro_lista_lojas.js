jQuery().ready(function (){ 
	jQuery("#lojas").jqGrid({
		url:'/jscom/adm_carro_lista_lojas/index/?q=1', 
		datatype: "xml", 
		colNames:['Id','Nome Loja'], 
		colModel:[ 
					{name:'loj_id',index:'loj_id', width:55,editable:false,editoptions:{readonly:true,size:10}}, 
					{name:'loj_nome',index:'loj_nome', width:200,editable:true,editoptions:{size:10}} 
				], 
		rowNum:10, 
		rowList:[10,20,30,40,50,60,70,80,90,100], 
		pager: '#pagernav',
		forceFit : true, 
		autowidth: true,  
		sortname: 'loj_id', 
		viewrecords: true, 
		toolbar : [true,"top"], 
		sortorder: "asc", 
		caption:"Lojas", 
		editurl:"someurl.php",
		width:"100%", 
		height:"100%" }); 
	jQuery("#lojas").jqGrid('navGrid','#pagernav',{
		delfunc: function(){ 
      			window.location.href= '/adm/manutencao_niveis/editar/options/?id='+jQuery("#lojas").jqGrid('getGridParam','selrow')}},
		{search:false}, //options 
		{height:280,reloadAfterSubmit:true}, // edit options 
		{height:280,reloadAfterSubmit:true} // add options 
	); 
	jQuery("#choice").click(function (){ jQuery("#lojas").jqGrid('setColumns'); }); 
	jQuery("#t_lojas").height(25).hide().jqGrid('filterGrid',"lojas",{gridModel:true,gridToolbar:true}); 
	//jQuery("#sg_invdate").datepicker({dateFormat:"yy-mm-dd"}); 
	jQuery("#lojas").jqGrid('navButtonAdd',"#pagernav",{caption:"Filtros",title:"Habilita filtros", 
		onClickButton:function(){ 
			if(jQuery("#t_lojas").css("display")=="none") { 
				jQuery("#t_lojas").css("display",""); } 
			else { 
				jQuery("#t_lojas").css("display","none");
		}}
	}); 
});