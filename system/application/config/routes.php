<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
| 	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['scaffolding_trigger'] = 'scaffolding';
|
| This route lets you set a "secret" word that will trigger the
| scaffolding feature for added security. Note: Scaffolding must be
| enabled in the controller in which you intend to use it.   The reserved 
| routes must come before any wildcard or regular expression routes.
|
*/

$route['scaffolding_trigger'] = "layum";

$con_string = "host=localhost port=5432 dbname=layum user=postgres password=layum1234";
//$con_string = "host=189.126.99.222 port=5432 dbname=layum_main user=layum_main password=pgl*ger4i5-lch";
$bdcon = pg_connect($con_string);
$projeto_id = PROJETO;
$query = "SELECT pag_url, pag_class FROM pagina LEFT JOIN projeto on pag_proj_id = proj_id WHERE proj_id = $projeto_id";
$result = pg_query ($bdcon, $query);
$route['default_controller'] = 'home';
while ($row = pg_fetch_row($result)) {
  	$pagina_url = $row['0'];
	$pagina_controller = $row['1'];
	$route[$pagina_url] = $pagina_controller;
}
pg_close($bdcon);


/* End of file routes.php */
/* Location: ./system/application/config/routes.php */