<?php
class Telefones extends MyController {
	public $cidade = array();
	public $telefone;
	
  function Telefones()
	{
		parent::__construct('Jscom');		
	}
	
  public function Index () {
    
    $cidade = $this->input->post('cidade');
    $cidade = preg_replace('/ - .*?$/', '', $cidade);
    
    $_join = array('portal_estados','telefones_atendimentocidades','telefones_atendimento');
    $this->cidade           = $this->get('PortalCidades_model', array(
    																	'nome_cidade' => $cidade,
																			'_join' => $_join
    																	));
    if($cidade != "")
    {
      foreach($this->cidade as $cidade)
      {
        $this->telefone         = $this->get('telefonesAtendimentocidades_model', array(
                                      'tac_idcidade' => $cidade->id_cidade,
                                      '_join' => $_join
                                      ));
        if($this->telefone){                                      
          echo 'Cidade: '.$cidade->nome_cidade.' - ';
          echo 'Telefone: '.$this->telefone->tat_fone;
        }else
        {
          echo 'Outras Localidades: (41) 3083 9750';
        }
      break;
      }
    }
  
  }
}