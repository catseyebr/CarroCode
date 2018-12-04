jQuery().ready(function (){ 
	jQuery("#carros").jqGrid({
		url:'/jscom/adm_carro_lista_carros/index/?q=1', 
		datatype: "xml", 
		colNames:['Id','Nome Modelo'], 
		colModel:[ 
					{name:'car_id',index:'car', width:55,editable:false,editoptions:{readonly:true,size:10}}, 
					{name:'car_modelo',index:'car_modelo', width:200,editable:true,editoptions:{size:10}} 
				], 
		rowNum:10, 
		rowList:[10,20,30,40,50,60,70,80,90,100], 
		pager: '#pagernav',
		forceFit : true, 
		autowidth: true,  
		sortname: 'car_id', 
		viewrecords: true, 
		toolbar : [true,"top"], 
		sortorder: "asc", 
		caption:"Carros", 
		editurl:"someurl.php",
		width:"100%", 
		height:"100%" }); 
	jQuery("#carros").jqGrid('navGrid','#pagernav',{
		delfunc: function(){ 
      			window.location.href= '/adm/manutencao_niveis/editar/options/?id='+jQuery("#carros").jqGrid('getGridParam','selrow')}},
		{search:false}, //options 
		{height:280,reloadAfterSubmit:true}, // edit options 
		{height:280,reloadAfterSubmit:true} // add options 
	); 
	jQuery("#choice").click(function (){ jQuery("#carros").jqGrid('setColumns'); }); 
	jQuery("#t_carros").height(25).hide().jqGrid('filterGrid',"carros",{gridModel:true,gridToolbar:true}); 
	//jQuery("#sg_invdate").datepicker({dateFormat:"yy-mm-dd"}); 
	jQuery("#carros").jqGrid('navButtonAdd',"#pagernav",{caption:"Filtros",title:"Habilita filtros", 
		onClickButton:function(){ 
			if(jQuery("#t_carros").css("display")=="none") { 
				jQuery("#t_carros").css("display",""); } 
			else { 
				jQuery("#t_carros").css("display","none");
		}}
	}); 
});
function carregaTabs(){
	$(function() {
	    $('#container-1').tabs({ fxSlide: true, fxFade: true, fxSpeed: 'normal' });
       });
}
