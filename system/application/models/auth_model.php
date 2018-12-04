<?php
class Auth_Model extends Model {
  public function Fake () {
    parent::Model();
  }
  public function getPass ($username) {
    $r = 0;
    
    $this->db->where('usuario.usu_login', $username);
    $query = $this->db->get('usuario');
    if ($query->num_rows() > 0){
      $rs = $query->row(0);
      $r = new stdClass();
      $r->id = $rs->usu_id;
      $r->user = $rs->usu_login;
      $r->pass = $rs->usu_senha;
    }
    return $r;
  }
  public function getAcl ($userid = 0) {
    $params = array();
    $params['roles'] = array();
    $params['resources'] = array();
    $params['privileges'] = array();
    $params['userrole'][] = 'guest';
    
    $this->db->join('recursos', 'niveisrecursos.nre_rec_id = recursos.rec_id')
             ->join('niveis', 'niveisrecursos.nre_niv_id = niveis.niv_id');
    $query = $this->db->get('niveisrecursos');
    $rs = $query->result();
    for ($i = 0, $s = count($rs) -1; $i <= $s; $i++) {
      $params['roles'][] = $rs[$i]->niv_nome;
      $params['resources'][] = $rs[$i]->rec_nome;
      $check = $rs[$i]->niv_nome;
      $params['privileges'][$rs[$i]->niv_nome][] = $rs[$i]->rec_nome;
    }
    
    $this->db->join('usuario', 'usuariosniveis.uni_usu_id = usuario.usu_id')
             ->join('niveis', 'usuariosniveis.uni_niv_id = niveis.niv_id')
             ->where('usu_id', $userid);
    $query = $this->db->get('usuariosniveis');
    $rs_nr = $query->num_rows();
    if ($rs_nr > 0){
      $rs = $query->result();
      for ($i = 0; $i <= $rs_nr -1; $i++) {
        $params['userrole'][] = $rs[$i]->niv_nome;
      }
    }
    return $params;
  } 
}
?>