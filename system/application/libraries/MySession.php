<?php
class MySession {
  public $id;
  public function __construct ($params = array()) {
    session_start();
    $this->id = session_id();
    if (count ($params) > 0) {
      $this->set_userdata($params);
    }
  }
  
  public function set_userdata ($newdata, $newval = NULL) {
    if (is_string($newdata)) {
			$newdata = array($newdata => $newval);
		}
		
    if (count($newdata) > 0) {
			foreach ($newdata as $key => $val) {
				$_SESSION[$key] = $val;
			}
		}
  }
  
  public function userdata ($data = NULL) {
    $r = NULL;
    if (!empty ($data)) {
      if (isset($_SESSION[$data])) {
        $r = $_SESSION[$data];
      }
    } else {
      $r = $_SESSION; 
    }
    return $r;
  }          
  public function teste () {
    echo 'ola';
  }
  
  public function unset_userdata ($data) {
    if (isset($_SESSION[$data])) {
      unset($_SESSION[$data]);
    }
    return !isset($_SESSION[$data]);
  }
}

//end of file