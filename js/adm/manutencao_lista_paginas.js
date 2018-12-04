jQuery().ready(function (){ 
	jQuery("#paginas").jqGrid({
		url:'/jscom/adm_manutencao_lista_paginas/index/?q=1', 
		datatype: "xml", 
		colNames:['Id','Projeto','Url','Classe'], 
		colModel:[ 
					{name:'pag_id',index:'pag_id', width:20,editable:false,editoptions:{readonly:true,size:10}}, 
					{name:'pag_proj_id',index:'pag_proj_id', width:20,editable:true,editoptions:{size:10}},
					{name:'pag_url',index:'pag_url', width:200,editable:true,editoptions:{size:10}},
					{name:'pag_class',index:'pag_class', width:200,editable:true,editoptions:{size:10}}
				], 
		rowNum:10, 
		rowList:[10,20,30,40,50,60,70,80,90,100], 
		pager: '#pagernav',
		forceFit : true, 
		autowidth: true,  
		sortname: 'pag_id', 
		viewrecords: true, 
		toolbar : [true,"top"], 
		sortorder: "asc", 
		caption:"Paginas", 
		editurl:"someurl.php",
		width:"100%", 
		height:"100%" }); 
	jQuery("#paginas").jqGrid('navGrid','#pagernav',
		{search:false}, //options 
		{height:280,reloadAfterSubmit:false}, // edit options 
		{height:280,reloadAfterSubmit:false}, // add options 
		{reloadAfterSubmit:false} //del options
	); 
	jQuery("#choice").click(function (){ jQuery("#paginas").jqGrid('setColumns'); }); 
	jQuery("#t_paginas").height(25).hide().jqGrid('filterGrid',"paginas",{gridModel:true,gridToolbar:true}); 
	//jQuery("#sg_invdate").datepicker({dateFormat:"yy-mm-dd"}); 
	jQuery("#paginas").jqGrid('navButtonAdd',"#pagernav",{caption:"Filtros",title:"Habilita filtros", 
		onClickButton:function(){ 
			if(jQuery("#t_paginas").css("display")=="none") { 
				jQuery("#t_paginas").css("display",""); } 
			else { 
				jQuery("#t_paginas").css("display","none");
		}}
	}); 
});