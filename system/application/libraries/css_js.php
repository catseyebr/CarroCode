<?php
class Css_Js {
  protected $_js = array();
  protected $_css = array();
  protected $_functions = array();
  
  public function __construct ($params = null) {
    if (!empty($params['multiple'])) {
      $this->multipleAdd($params['multiple']);
    }
  }
  
  public function add ($type, $archive, $function = NULL) {
    if (!empty ($archive)) {
      switch (strtolower($type)) {
        case 'css':
          $this->_css[] = $archive;
        break;
        case 'js':
          $this->_js[] = $archive;
        break;
        /*case 'function':
        break;*/
      }
    }
    if (!empty ($function)) {
      $this->_functions[] = $function;
    }
  }
       
  public function multipleAdd($params) {
    foreach ($params as $key => $value) {
      if (strtolower($key) == 'css' && is_array($value)) {
        for ($i = 0, $s = count($value)-1; $i <= $s; $i++) {
          $this->add($key, $value[$i]);
        }
      } else  {
        for ($i = 0, $s = count($value)-1; $i <= $s; $i++) {
          $arr = explode('|',$value[$i]);
          if (!empty ($arr[1])) {
            $this->add($key, $arr[0], $arr[1]);
          } else {
            $this->add($key, $arr[0]);
          }
        }
      }
    }
  }
  
  public function toData() {
    $data = "";
    for ($i = 0, $s = count($this->_js) -1; $i <= $s; $i++) {
      $data .= "<script src='" . $this->_js[$i] . "' type='text/javascript'></script>\r\n";
    }
		for ($i = 0, $s = count($this->_css) -1; $i <= $s; $i++) {
      $data .= "<link rel='stylesheet' type='text/css' href='" . $this->_css[$i] . "'/>\r\n";
    }
		if (count($this->_functions) > 0) {
  		$data .= "<script language='javascript'>\r\n";
      $data .= "  $(document).ready(function(){\r\n";
  	  for ($i = 0, $s = count($this->_functions) -1; $i <= $s; $i++) {
        $data .= "   " . $this->_functions[$i] . "\r\n";
      }
      $data .= "  });\r\n";
      $data .= "</script>";
    }
    return $data;
  }
}