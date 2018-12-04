<?php
class Adm_Manutencao_Lista_Cidades extends MyController {
	
	public $get_vars;
	
 	function Adm_Manutencao_Lista_Cidades () {
		parent::__construct('Jscom');	
			
	}
	
  	public function index () {
		$get_vars = $this->uri->ruri_to_assoc(2);
		$vars = explode ('&',$get_vars['index']);
		$vars = str_replace('?','',$vars);
		foreach($vars as $param){
			$values = explode('=',$param);
			$this->get_vars[$values[0]] = $values[1];
		}
		$page 			= $this->get_vars['page'];
		$limit 			= $this->get_vars['rows']; 
		$sidx 			= $this->get_vars['sidx']; 
		$sord 			= $this->get_vars['sord']; 
		$search 		= ($this->get_vars['_search']=='true')? TRUE : FALSE;
		
		if(isset($this->get_vars['searchField']))
			$searchField 	= $this->get_vars['searchField'];
		
		if(isset($this->get_vars['searchString']))
			$searchString 	= $this->get_vars['searchString'];
			
		if(isset($this->get_vars['searchOper']))
			$searchOper		= $this->get_vars['searchOper'];
		
		if(!$sidx) $sidx = 1; 
		
		$cidades_count = $this->get('cidade_model', NULL);
		$count = count($cidades_count);
		if($count > 0){
			$total_pages = ceil($count/$limit); 
		}else{
			$total_pages = 0; 
		} 
		if ($page > $total_pages) 
			$page=$total_pages; 
		
		$start = $limit*$page - $limit;
		
		if($search == TRUE){
			$cidades = $this->get('cidade_model', array(
					'sortBy' => $sidx,
					'sortDirection' => $sord,
					'limit' => $limit,
					'offset' => $start,
					$searchField => $searchString
				)
			);	
		}else{
			$cidades = $this->get('cidade_model', array(
					'sortBy' => $sidx,
					'sortDirection' => $sord,
					'limit' => $limit,
					'offset' => $start
				)
			);
		}
		
		
		if ( stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml")){
			header("Content-type: application/xhtml+xml;charset=utf-8"); 
		}else{
			header("Content-type: text/xml;charset=utf-8");
		} 
		$et = ">"; 
		echo "<?xml version='1.0' encoding='utf-8'?$et\n"; 
		echo "<rows>"; 
		echo "<page>".$page."</page>"; 
		echo "<total>".$total_pages."</total>"; 
		echo "<records>".$count."</records>"; 
		// be sure to put text data in CDATA 
		foreach($cidades as $cid){
			echo "<row id='". $cid->city_id."'>"; 
			echo "<cell>". $cid->city_id."</cell>"; 
			echo "<cell>". $cid->city_uf_id."</cell>"; 
			echo "<cell><![CDATA[". $cid->city_nome."]]></cell>";
			echo "<cell>". $cid->city_pais_id."</cell>";
			echo "</row>"; 
		} 
		echo "</rows>";
	}
	
}