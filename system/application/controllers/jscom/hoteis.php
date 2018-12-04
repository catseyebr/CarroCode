<?php
class Hoteis extends Controller {
  public function Index () {
    $this->load->model('TagsHoteis_Model');
    $result = $this->TagsHoteis_Model->getTagsAutocomplete(array('like' => $this->input->post('q')));
    $r = "";
    for ($i = 0, $s = count($result) -1;$i <= $s;$i++) {
      $r .= $result[$i]->hot_nome;
      $r .= "|";
      $r .= $result[$i]->hot_nome;
      $r .= "\r\n";
    }
    echo $r;
  }
}