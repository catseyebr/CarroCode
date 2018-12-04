<?php
require_once 'system/libraries/Encrypt.php';
class Auth {
  protected $_authenticated = false;
  protected $_userpass;
  protected $_username;
  protected $_userid;
  protected $_model;
  protected $_method;
  protected $_session;
  
  public function __construct ($params) {
    $this->_session = $params['session'];
    $this->_model = $params['model'];
    $this->_method = $params['method'];
    $session = $this->_session->userdata('auth_params');
    if (!empty ($session)) {
      $this->_userpass = $session['_userpass'];
      $this->_username = $session['_username'];
      $this->_userid = $session['_userid'];
      $this->_authenticated = $session['_authenticated'];
    } else {
      if (!empty ($params['username'])) {
        $this->setUsername($params['username']);
      }
      if (!empty ($params['userpass'])) {
        $this->setUserpass($params['userpass']);
      }
    } 
  }
  
  public function getUserId () {
    return $this->_userid;
  }
  
  public function setUser ($username, $userpass) {
    $this->setUserpass($userpass);
    $this->setUsername($username);
  }
  
  public function setUserpass ($userpass) {
    $this->_userpass = $userpass;
    if ($this->hasUser()) {
      $this->verifyAuth();
    }
  }
  
  public function setUsername ($username) {
    $this->_username = $username;
    if ($this->hasUser()) {
      $this->verifyAuth();
    }
  }
  
  public function hasUser () {
    if ((!empty ($this->_username) && !empty ($this->_userpass))) {
      $r = true;
    } else {
      $r = false;
    }
    return $r;
  }
  
  public function hasAuth () {
    return $this->_authenticated;
  }
  
  
  /**
   *   !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
   *   !! Esse método não é genérico            !!
   *   !! Alterar em caso de mudança de projeto !!  
   *   !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
   */       
  protected function verifyAuth() {
    $crypt = new CI_Encrypt();
    if (is_object($this->_model)) {
      if (method_exists($this->_model, $this->_method)) {
        $user = $this->_model->{$this->_method}($this->_username);
        if ($this->_userpass == $crypt->decode($user->pass)) {
          $this->_userid = $user->id;
        }
        if ($this->_userid > 0) {
          $this->_authenticated = true;
        } else {
          $this->_authenticated = false;
        }
      }
    }
  }
  
  public function unsetUser () {
    $this->_userpass = NULL;
    $this->_username = NULL;
    $this->_userid = NULL;
  }
  
  public function setSession () {
    $this->_session->set_userdata(
      array(
        'auth_params' => array(
          '_userpass' => $this->_userpass,
          '_username' => $this->_username,
          '_userid'   => $this->_userid,
          '_authenticated'   => $this->_authenticated
        )
      )
    );
  }
}
?>