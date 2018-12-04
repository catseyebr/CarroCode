<?php
class Imagens extends MyController {
	public $data = array();
	public $hotel = array();
	public $apartamento = array();
	public $imagens= array();
	public $imagem= array();
	
	function Imagens()
	{
		parent::__construct('Admin');
	}
	
	function index()
	{
		redirect('/admin/imagens/lista');
	}
	
	function lista()
	{
		redirect('/admin/hoteis/exibir/'.$this->uri->segment(4).'#imagens');
	}
	
	function inserir()
	{
		$this->setHotel();
       	if ($this->hotel != NULL && $this->hotel != FALSE) {
			$_join = array('hoteis_enderecos','enderecos','portal_cidades','portal_estados');  
			$this->metatags['title'] = "Adicionar imagem - Lista de Hot&eacute;is - Administra&ccedil;&atilde;o Reserva de Hotel Online";
			$this->form_validation->set_rules('con_nome', 'Nome', 'required');
		
			$config['upload_path'] = './images/hoteis/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1000';
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			$config['remove_spaces']  = 'TRUE';
			$config['file_name']  = $this->hotel->hot_id."_".strtolower($this->hotel->hot_nome);		
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload())
			{
				$info = array('info' => $this->upload->display_errors());
				$this->load->view('admin/imagens_inserir', $info);
			}	
			else
			{
				$info = array('info' => $this->upload->data());
				$adicionar_imagem = $this->insert('Imagens_model', array(
																	'img_caminhoimagem' => $info['info']['raw_name'].".jpg"
																	));
				if($adicionar_imagem){
				$adicionar_hoteisImagens = $this->insert('HoteisImagens_model', array(
																			'him_idhotel' => $this->hotel->hot_id,
																			'him_idimagem' => $adicionar_imagem,
																			'him_principal' => "0"
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
        			redirect(site_url('admin/hoteis/exibir')."/".$this->hotel->hot_id."#imagens");
               	$this->load->view('admin/imagens_inserir', $info);
			}
		}else{
    		redirect('/admin/hoteis/lista');
		}
	}
	
	public function excluir () {
		$this->setHotel();
		$this->setImagem();
			  
    	if ($this->imagem != NULL && $this->imagem != FALSE) {     
    		if ($this->delete('HoteisImagens_model', array('him_idimagem' => $this->imagem->img_id, 'him_idhotel' => $this->hotel->hot_id)) != ''){
      			if ($this->delete('Imagens_model', array('img_id' => $this->imagem->img_id)) != '') {
      				unlink('images/hoteis/'.$this->imagem->img_caminhoimagem); 
    				unlink('images/hoteis/thumbs/'.$this->imagem->img_caminhoimagem);
        			$this->session->set_userdata('msg', 'Imagem excluída com sucesso!');
      			} 
      		}
      	}else{
        	$this->session->set_userdata('msg', 'Erro ao excluir imagem!');
    	}
    	redirect(site_url('admin/hoteis/exibir')."/".$this->hotel->hot_id."#imagens");
	}
	
	private function setHotel () {
    	$hot_id = intval($this->uri->segment(4));
      
    	if ($hot_id > 0) {
    		$this->hotel = $this->get('Hoteis_model', array(
                                                        'hot_id' => $hot_id
    													));
    		}
    	if (!$this->auth_acl->hasAuth('superadmin')) {
      		if (!in_array($this->hotel->hot_id, $this->hoteis_acesso)) {
        		redirect('/admin/hoteis/lista');
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
/* End of file imagens.php */
/* Location: ./system/application/controllers/admin/imagens.php */