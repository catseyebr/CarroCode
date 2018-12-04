jQuery().ready(function (){ 
	jQuery("#usuarios").jqGrid({
		url:'/jscom/adm_manutencao_lista_usuarios/index/?q=1', 
		datatype: "xml", 
		colNames:['Id','Login','CPF','Senha','Ativo','Cadastro'], 
		colModel:[ 
					{name:'usu_id',index:'usu_id', width:20,editable:false,editoptions:{readonly:true,size:10}}, 
					{name:'usu_login',index:'usu_login', width:200,editable:true,editoptions:{size:10}},
					{name:'usu_cpf_id',index:'usu_cpf_id', width:20,editable:true,editoptions:{size:10}},
					{name:'usu_senha',index:'usu_senha', width:200,editable:true,editoptions:{size:10}},
					{name:'usu_ativo',index:'usu_ativo', width:20,editable:true,editoptions:{size:10}},
					{name:'usu_dthcadastro',index:'usu_dthcadastro', width:100,editable:true,editoptions:{size:10}}
				], 
		rowNum:10, 
		rowList:[10,20,30,40,50,60,70,80,90,100], 
		pager: '#pagernav',
		forceFit : true, 
		autowidth: true,  
		sortname: 'usu_id', 
		viewrecords: true, 
		toolbar : [true,"top"], 
		sortorder: "asc", 
		caption:"usuarios", 
		editurl:"someurl.php",
		width:"100%", 
		height:"100%" }); 
	jQuery("#usuarios").jqGrid('navGrid','#pagernav',
		{search:false}, //options 
		{height:280,reloadAfterSubmit:false}, // edit options 
		{height:280,reloadAfterSubmit:false}, // add options 
		{reloadAfterSubmit:false} //del options
	); 
	jQuery("#choice").click(function (){ jQuery("#usuarios").jqGrid('setColumns'); }); 
	jQuery("#t_usuarios").height(25).hide().jqGrid('filterGrid',"usuarios",{gridModel:true,gridToolbar:true}); 
	//jQuery("#sg_invdate").datepicker({dateFormat:"yy-mm-dd"}); 
	jQuery("#usuarios").jqGrid('navButtonAdd',"#pagernav",{caption:"Filtros",title:"Habilita filtros", 
		onClickButton:function(){ 
			if(jQuery("#t_usuarios").css("display")=="none") { 
				jQuery("#t_usuarios").css("display",""); } 
			else { 
				jQuery("#t_usuarios").css("display","none");
		}}
	}); 
});