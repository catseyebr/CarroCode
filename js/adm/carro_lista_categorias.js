jQuery().ready(function (){ 
	jQuery("#categorias").jqGrid({
		url:'/jscom/adm_carro_lista_categorias/index/?q=1', 
		datatype: "xml", 
		colNames:['Id','Nome Categoria'], 
		colModel:[ 
					{name:'cat_id',index:'cat_id', width:55,editable:false,editoptions:{readonly:true,size:10}}, 
					{name:'cat_nome',index:'cat_nome', width:200,editable:true,editoptions:{size:10}} 
				], 
		rowNum:10, 
		rowList:[10,20,30,40,50,60,70,80,90,100], 
		pager: '#pagernav',
		forceFit : true, 
		autowidth: true,  
		sortname: 'cat_id', 
		viewrecords: true, 
		toolbar : [true,"top"], 
		sortorder: "asc", 
		caption:"Categorias", 
		editurl:"someurl.php",
		width:"100%", 
		height:"100%" }); 
	jQuery("#categorias").jqGrid('navGrid','#pagernav',{
		delfunc: function(){ 
      			window.location.href= '/adm/manutencao_niveis/editar/options/?id='+jQuery("#categorias").jqGrid('getGridParam','selrow')}},
		{search:false}, //options 
		{height:280,reloadAfterSubmit:true}, // edit options 
		{height:280,reloadAfterSubmit:true} // add options 
	); 
	jQuery("#choice").click(function (){ jQuery("#categorias").jqGrid('setColumns'); }); 
	jQuery("#t_categorias").height(25).hide().jqGrid('filterGrid',"categorias",{gridModel:true,gridToolbar:true}); 
	//jQuery("#sg_invdate").datepicker({dateFormat:"yy-mm-dd"}); 
	jQuery("#categorias").jqGrid('navButtonAdd',"#pagernav",{caption:"Filtros",title:"Habilita filtros", 
		onClickButton:function(){ 
			if(jQuery("#t_categorias").css("display")=="none") { 
				jQuery("#t_categorias").css("display",""); } 
			else { 
				jQuery("#t_categorias").css("display","none");
		}}
	}); 
});