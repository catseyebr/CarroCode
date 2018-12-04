<?php
class Cidades extends Controller {
  public function Index () {
    parent::Controller();
    $this->load->model('TagCidade_Model');
    $result = $this->TagCidade_Model->getTagsAutocomplete(array('like' => $this->input->post('q')));
    $r = "";
    for ($i = 0, $s = count($result) -1;$i <= $s;$i++) {
      $r .= $result[$i]->city_nome . " - " . $result[$i]->uf_abr;
      $r .= "|";
      $r .= $result[$i]->city_nome . " - " . $result[$i]->uf_abr;
      $r .= "\n";
    }
    echo $r;
  }
}