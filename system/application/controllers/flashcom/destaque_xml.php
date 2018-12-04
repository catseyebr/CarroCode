<?php
class Destaque_XML extends MyController {
  private $dados;
  
  public function Destaque_XML () {
    parent::__construct();
    
    $this->load->library('fileparser');
    
    $this->dados = $this->get(
        'Destaques_model',
        array(
            'sortBy' => 'des_ordem',
            'sortDirection' => 'ASC',
            'limit' => 3,
        )
    );
    
    echo $this->fileparser->setFile('./flashdata/destaque.xml')
                          ->setData(array('dados' => $this->dados))
                          ->getContent();
  }
  
  public function index () {
  
  }
  
}

//end of file