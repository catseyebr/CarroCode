<?php
class Adm_Carro_Lista_Carros extends MyController {
	
	public $get_vars;
	
 	function Adm_Carro_Lista_carros () {
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
		
		$carros_count = $this->get('carro_model', NULL);
		$count = count($carros_count);
		if($count > 0){
			$total_pages = ceil($count/$limit); 
		}else{
			$total_pages = 0; 
		} 
		if ($page > $total_pages) 
			$page=$total_pages; 
		
		$start = $limit*$page - $limit;
		
		if($search == TRUE){
			$carros = $this->get('carro_model', array(
					'sortBy' => $sidx,
					'sortDirection' => $sord,
					'limit' => $limit,
					'offset' => $start,
					$searchField => $searchString
				)
			);	
		}else{
			$carros = $this->get('carro_model', array(
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
		foreach($carros as $car){
			echo "<row id='". $car->car_id."'>"; 
			echo "<cell>". $car->car_id."</cell>"; 
			echo "<cell><![CDATA[". $car->car_modelo."]]></cell>"; 
			echo "</row>"; 
		} 
		echo "</rows>";
	}
	
}