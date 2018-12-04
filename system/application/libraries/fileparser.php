<?php
Class FileParser {
  private $file;
  public function __construct () {
  }
  
  public function setFile($file) {
    if (!file_exists($file)) {
      throw new Exception("\r\n ----- Erro na leitura do arquivo! ----- \r\n"); 
    }
    
    $this->file = $file;
    return $this;
  }
  
  public function setData ($data) {
    if (is_array($data)) {
      foreach ($data as $key => $value) {
        $this->{$key} = $value;
      }
    }
    
    return $this;
  }
  
  public function getContent () {
    if (empty($this->file)) {
      throw new Exception("\r\n ----- É necessário informar um arquivo para leitura arquivo! ----- \r\n");
    }
    ob_start();
    $fgc = file_get_contents($this->file);
    eval("?>" . $fgc . "<?php echo '';"); //"
    $buffer = ob_get_contents();
    @ob_end_clean();
    return $buffer;
  }
}
?>
