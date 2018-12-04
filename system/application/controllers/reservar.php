<?php
class Reservar extends MyController {
  
  public function Reservar () {
    parent::__construct();
    
    if ($this->session->userdata('post_reserva') != NULL) {
      $post = $this->session->userdata('post_reserva');
    } else if ($this->input->post('hotel') != FALSE) {
      $post = new stdClass();
      $post->apa = $this->input->post('apartamento'); 
      $post->hot = $this->input->post('hotel');
    }
    
    if (isset($post->apa) && isset($post->hot)) {
      if ($this->auth_acl->hasAuth('cliente')) {
				$hoteis   = $this->session->userdata('hoteis');
				$qtde_apa = $this->session->userdata('qtde_apa');
        
        $hotel = NULL;
        for ($i = 0, $s = count($hoteis); $i < $s; $i++) {
          if ($hoteis[$i]->hot_id == $post->hot) {
            $hotel = $hoteis[$i];
            
						$valor_hot = 0;
						for ($j = 0, $c = count($hotel->categorias_apa); $j < $c; $j++) {
		          for ($k = 0, $t = count($hotel->categorias_apa[$j]->apartamentos); $k < $t; $k++) {
		            if (in_array($hotel->categorias_apa[$j]->apartamentos[$k]->apa_id,$post->apa)) {
		            	$cap_id = $hotel->categorias_apa[$j]->cap_id;
		            	$hotel->categorias_apa[$j]->valor_cap = ($qtde_apa[$cap_id] * $hotel->categorias_apa[$j]->apartamentos[$k]->valor_apa);
		            	$hotel->categorias_apa[$j]->qtde_apa = $qtde_apa[$cap_id];
		            	$hotel->categorias_apa[$j]->apartamento = $hotel->categorias_apa[$j]->apartamentos[$k];
		            	
									$valor_hot += $hotel->categorias_apa[$j]->valor_cap;
		            	
		            	/* TIRANDO INFO DESNECESSÁRIA */
		            	unset($hotel->categorias_apa[$j]->apartamentos);
									unset($hotel->categorias_apa[$j]->menor_valor_cap);
									unset($hotel->categorias_apa[$j]->menor_valor_cap_id);
									for ($l = 0, $q = count($hotel->categorias_apa[$j]->apartamento->bloqueios); $l < $q; $l++) {
										unset($hotel->categorias_apa[$j]->apartamento->bloqueios[$l]->validos);
										unset($hotel->categorias_apa[$j]->apartamento->bloqueios[$l]->invalidos);
									}
									break;
								} 
		          } 
		        }
						
						$hotel->valor_hot = $valor_hot;
            $hotel->rsh_checkin  = preg_replace('/(.{2})\/(.{2})\/(.{4})/i', '$3-$2-$1', $this->session->userdata('fbusca_retiradaini'));
            $hotel->rsh_checkout = preg_replace('/(.{2})\/(.{2})\/(.{4})/i', '$3-$2-$1', $this->session->userdata('fbusca_retiradafim'));
            
						unset($hotel->menor_valor_hot);
						
            break;
          }
        }
        
        $reservas = $this->session->userdata('reservas') != NULL ? $this->session->userdata('reservas') : array();
        $reservas[] = $hotel;
        $this->session->set_userdata('reservas', $reservas);
        
        $this->session->unset_userdata('hoteis');
        $this->session->unset_userdata('qtde_apa');
        $this->session->unset_userdata('categorias_apa');
        $this->session->unset_userdata('dataini');
        $this->session->unset_userdata('datafim');
        $this->session->unset_userdata('datas');
        $this->session->unset_userdata('fbusca_pesquisar_por');
        $this->session->unset_userdata('fbusca_autocompletecidade');
        $this->session->unset_userdata('fbusca_autocompletehotel');
        $this->session->unset_userdata('fbusca_retiradaini');
        $this->session->unset_userdata('fbusca_retiradafim');
        $this->session->unset_userdata('fbusca_quantidade_apartamentos');
        $this->session->unset_userdata('fbusca_tipo_apartamento');
        
        if ($this->session->userdata('post_reserva')){
      		$this->session->unset_userdata('post_reserva');
				}
        
        redirect('/cliente/reservaAtual');
      } else {
        $this->session->set_userdata('post_reserva', $post);
        redirect('/login/reserva');
      }
    } else {
      redirect('/');
    }
  }
  
  public function index () {
  }
}

//end of file