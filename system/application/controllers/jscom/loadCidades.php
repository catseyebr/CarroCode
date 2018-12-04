<?php
//header('Content-type: text/html; charset=utf-8');
/*
include '../common.php';
require_once ("../Connections/carroaluguel.php");
header('Content-type: text/html; charset=utf-8');
$q = strtolower($_POST["q"]);
mysql_select_db($database_carroaluguel, $carroaluguel);
$query_combo_horas = "SELECT DISTINCT cidade, estado FROM loc_lojas Where cidade like lower('%".mysql_real_escape_string($q)."%') AND ativo = '1'";
$combo_horas = mysql_query($query_combo_horas, $carroaluguel) or die(mysql_error());
$row_combo_horas = mysql_fetch_assoc($combo_horas);
$totalRows_combo_horas = mysql_num_rows($combo_horas);

mysql_select_db($database_carroaluguel, $carroaluguel);
$query_aero = "SELECT DISTINCT cidade, estado, nome, sigla FROM loc_lojas WHERE cidade like lower('%".mysql_real_escape_string($q)."%') AND sigla = '1' AND ativo = '1'";
$aero = mysql_query($query_aero) or die(mysql_error());
$row_aero = mysql_fetch_assoc($aero);
$totalRows_aero = mysql_num_rows($aero);

if (!$q) return;
$items = array();
do {
	$cidade_select = $row_combo_horas['cidade'];
	$query_lojas = "SELECT * FROM loc_lojas WHERE cidade = '$cidade_select' AND sigla = '0' AND ativo = '1'";
	$lojas = mysql_query($query_lojas) or die(mysql_error());
	$row_lojas = mysql_fetch_assoc($lojas);
	$totalRows_lojas = mysql_num_rows($lojas);
	
$items[''.$row_combo_horas['cidade'].' - '.$row_combo_horas['estado'].', ,'.$totalRows_lojas.' lojas'] = $row_combo_horas['cidade'];
} while ($row_combo_horas = mysql_fetch_assoc($combo_horas));

do {
	$nome_select = $row_aero['nome'];
	$query_lojas = "SELECT * FROM loc_lojas WHERE nome = '$nome_select' AND ativo = '1'";
	$lojas = mysql_query($query_lojas) or die(mysql_error());
	$row_lojas = mysql_fetch_assoc($lojas);
	$totalRows_lojas = mysql_num_rows($lojas);
	
$items[''.$row_aero['cidade'].' - '.$row_aero['estado'].', '.$row_aero['nome'].', '.$totalRows_lojas.' lojas'] = $row_aero['cidade'];
} while ($row_aero = mysql_fetch_assoc($aero));

foreach ($items as $key=>$value) {
    if (strpos(strtolower($value), $q) !== false) {
        echo "$key|$value\n";
    }
}
*/
class loadCidades extends Controller {
  public function Index () {
    parent::Controller();
	$q = $this->input->post('q');
	if (!$q) return;
	$items = array();
    $this->load->model('TagCidade_Model');
    $result = $this->TagCidade_Model->getTagsAutocomplete(array('like' => $q));
    $items = array();
	$r="";
	for ($i = 0, $s = count($result) -1;$i <= $s;$i++) {
		$items[''.$result[$i]->city_nome.' - '.$result[$i]->uf_abr.', '.$result[$i]->uf_abr.', '.$result[$i]->uf_abr.' lojas'] = $result[$i]->city_nome;
    }
	
	foreach ($items as $key=>$value) {
    if (strpos(strtolower($value), $q) !== false) {
        $r = "$key|$value\n";
    }
	echo $r;
  }
}
}
?> 