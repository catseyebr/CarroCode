<?php
class ImagensApartamentos extends MyController {
	public $data = array();
	public $apartamento = array();
	public $imagens= array();
	public $imagem= array();
	
	function ImagensApartamentos()
	{
		parent::__construct('admin');
	}
	
	function index()
	{
		redirect('/admin/imagensapartamentos/lista');
	}
	
	function lista()
	{
		redirect('/admin/apartamentos/exibir/'.$this->uri->segment(4).'#imagens');
	}
	
	function inserir()
	{
		$this->setApartamento();
       	if ($this->apartamento != NULL && $this->apartamento != FALSE) {
			$this->metatags['title'] = "Adicionar imagem - Lista de Apartamentos - Administra&ccedil;&atilde;o Reserva de Hotel Online";
			$config['upload_path'] = './images/apartamentos/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1000';
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			$config['remove_spaces']  = 'TRUE';
			$config['file_name']  = "apa_".$this->apartamento->apa_id."_".strtolower($this->apartamento->hot_nome);		
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload())
			{
				$info = array('info' => $this->upload->display_errors());
				$this->load->view('/admin/imagensapartamentos_inserir', $info);
			}	
			else
			{
				$info = array('info' => $this->upload->data());
				$adicionar_imagem = $this->insert('Imagens_model', array(
																	'img_caminhoimagem' => $info['info']['raw_name'].".jpg"
																	));
				if($adicionar_imagem){
				$adicionar_hoteisImagens = $this->insert('ApartamentosImagens_model', array(
																			'aim_idapartamento' => $this->apartamento->apa_id,
																			'aim_idimagem' => $adicionar_imagem,
																			'aim_principal' => "0"
																		));
				}			
				$opt_img['dx']=140; 
				$opt_img['dy']=140;
				$opt_img['inputWidth']  = $info['info']['image_width']."px"; 
        		$opt_img['inputHeight'] = $info['info']['image_height']."px";
        		$opt_img['file_path'] = $info['info']['file_path'];
        		$opt_img['file_ext'] = $info['info']['file_ext'];
        		$opt_img['file'] = $info['info']['raw_name'];
        		$config['quality'] = '100';
        		$config['source_image'] = $opt_img['file_path'].$opt_img['file'].$opt_img['file_ext'];
        		$config['width'] = '768';
        		$config['maintain_ratio'] = true;
        		$this->load->library('image_lib', $config);
        		$this->image_lib->initialize($config);
        		$this->image_lib->resize();
        		if($this->crop_resize($opt_img))
        			redirect(site_url('/admin/apartamentos/exibir')."/".$this->apartamento->apa_id."#imagens");
               	$this->load->view('/admin/imagensapartamentos_inserir', $info);
			}
		}else{
    		redirect('/admin/apartamentos/lista');
		}
	}
	
	public function excluir () {
		$this->setApartamento();
		$this->setImagem();
			  
    	if ($this->imagem != NULL && $this->imagem != FALSE) {     
    		if ($this->delete('ApartamentosImagens_model', array('aim_idimagem' => $this->imagem->img_id, 'aim_idapartamento' => $this->apartamento->apa_id)) != ''){
      			if ($this->delete('Imagens_model', array('img_id' => $this->imagem->img_id)) != '') {
      				unlink('images/apartamentos/'.$this->imagem->img_caminhoimagem); 
    				unlink('images/apartamentos/thumbs/'.$this->imagem->img_caminhoimagem);
        			$this->session->set_userdata('msg', 'Imagem excluída com sucesso!');
      			} 
      		}
      	}else{
        	$this->session->set_userdata('msg', 'Erro ao excluir imagem!');
    	}
    	redirect(site_url('admin/apartamentos/exibir')."/".$this->apartamento->apa_id."#imagens");
	}
	
	private function setApartamento () {
    $apa_id = intval($this->uri->segment(4));
      
    if ($apa_id > 0) {
      $this->apartamento = $this->get('Apartamentos_model', array(
                                                        'apa_id' => $apa_id,
                                                        '_join' => array('hoteis',
                                                                        'tipos_apartamentos',
                                                                        'categorias_apartamentos',
                                                                        'comentarios')
                                                        ));
    }
    
    if (!$this->auth_acl->hasAuth('superadmin')) {
      if (!in_array($this->apartamento->hot_id, $this->hoteis_acesso)) {
        redirect('/admin/apartamentos/lista');
      }
    }
  }
	
  	private function setImagem () {
    	$img_id = intval($this->uri->segment(5));
      
    	if ($img_id > 0) {
    		$this->imagem = $this->get('Imagens_model', array(
                                                        'img_id' => $img_id
    													));
    	}
    }
}
/* End of file imagensapartamentos.php */
/* Location: ./system/application/controllers/admin/imagensapartamentos.php */