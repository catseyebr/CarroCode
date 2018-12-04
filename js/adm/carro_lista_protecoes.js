jQuery().ready(function (){ 
	jQuery("#protecoes").jqGrid({
		url:'/jscom/adm_carro_lista_protecoes/index/?q=1', 
		datatype: "xml", 
		colNames:['Id','Nome Proteção'], 
		colModel:[ 
					{name:'prot_id',index:'prot_id', width:55,editable:false,editoptions:{readonly:true,size:10}}, 
					{name:'prot_nome',index:'prot_nome', width:200,editable:true,editoptions:{size:10}} 
				], 
		rowNum:10, 
		rowList:[10,20,30,40,50,60,70,80,90,100], 
		pager: '#pagernav',
		forceFit : true, 
		autowidth: true,  
		sortname: 'prot_id', 
		viewrecords: true, 
		toolbar : [true,"top"], 
		sortorder: "asc", 
		caption:"Proteções", 
		editurl:"someurl.php",
		width:"100%", 
		height:"100%" }); 
	jQuery("#protecoes").jqGrid('navGrid','#pagernav',{
		delfunc: function(){ 
      			window.location.href= '/adm/manutencao_niveis/editar/options/?id='+jQuery("#protecoes").jqGrid('getGridParam','selrow')}},
		{search:false}, //options 
		{height:280,reloadAfterSubmit:true}, // edit options 
		{height:280,reloadAfterSubmit:true} // add options 
	); 
	jQuery("#choice").click(function (){ jQuery("#protecoes").jqGrid('setColumns'); }); 
	jQuery("#t_protecoes").height(25).hide().jqGrid('filterGrid',"protecoes",{gridModel:true,gridToolbar:true}); 
	//jQuery("#sg_invdate").datepicker({dateFormat:"yy-mm-dd"}); 
	jQuery("#protecoes").jqGrid('navButtonAdd',"#pagernav",{caption:"Filtros",title:"Habilita filtros", 
		onClickButton:function(){ 
			if(jQuery("#t_protecoes").css("display")=="none") { 
				jQuery("#t_protecoes").css("display",""); } 
			else { 
				jQuery("#t_protecoes").css("display","none");
		}}
	}); 
});