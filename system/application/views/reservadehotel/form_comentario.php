<h5>Envie seu coment&aacute;rio 
  <?php if (!empty($this->usuario->usu_id)) { ?>
    <span>(usu&aacute;rio registrado)</span>
  <?php } ?>
</h5>  
<form action="" id="frmComentarioHotel" method="post" class="contemfloat">
  <div id="form_esq">
    <fieldset>
      <?php if (!empty($this->usuario->usu_id)) { ?>  
        
          <p>Nome: </p> <?php echo $this->usuario->usu_nome; ?> <br>
          <p>E-mail: </p> <?php echo $this->usuario->usu_email; ?> <br>
        
          <?php if(!empty($this->cliente)) { ?> 
              <p>Cidade: </p> <?php echo $this->cliente->nome_cidade . " - " . $this->cliente->abr_estado; 
          } else { ?>
              <p>Cidade / Estado:</p>
                <label>
                  <input type="text" class="texbox50" id="cidade" name="cidade" value=""> <br>
                </label>
          <?php } ?>
                     
      <?php } else { ?>  
    
          <p>Nome:</p>
            <label> 
              <input type="text" class="texbox50" id="nome" name="nome" value=""> <br>
            </label>
    
          <p>E-mail:</p>
            <label>
              <input type="text" class="texbox50" id="email" name="email" value=""> <br>
            </label>
         
          <p>Cidade / Estado:</p>
            <label>
              <input type="text" class="texbox50" id="cidade" name="cidade" value=""> <br>
            </label>
    
      <?php } ?>
          <label>
            <br><br>
            <input type="image" src="/images/enviar_coment.jpg">
          </label>
    </fieldset>
  </div>
  
  <div id="form_dir">
    <fieldset>
      <p>Mensagem:</p>
        <label>
            <textarea id="mensagem" class="texbox60" rows="7" name="mensagem"></textarea>                        </textarea>
        </label>
        <br>
    </fieldset>
  </div>
</form>
          