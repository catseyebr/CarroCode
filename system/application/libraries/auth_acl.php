<?php
require_once 'auth.php';
require_once 'acl.php';
class Auth_Acl extends Auth {
  protected $_method_acl;
  public $_acl;
  protected $_accessto;
  
  public function __construct ($params) {
    parent::__construct($params);
    $this->_method_acl = $params['method_acl'];
    $this->_accessto = $params['accessto'];
    $this->callAcl();
  }
  
  protected function callAcl ($new = FALSE) {
    $session = NULL;
    if (!$new) {
      $session = $this->_session->userdata('acl_params');
    }
    if (!empty ($session)) {
      $this->_acl = new Acl($session);
    } else {
      if (is_object($this->_model)) {
        if (method_exists($this->_model, $this->_method_acl)) {
          $acl = $this->_model->{$this->_method_acl}($this->_userid);
          $this->_acl = new Acl($acl);
          $this->_acl->setHeritages('thisuser', $acl['userrole']);
        }
      }
    }
  }
  
  protected function verifyAuth() {
    parent::verifyAuth();
    $this->callAcl(TRUE);
  }
  
  public function setAccessTo ($resource) {
    if ($this->acl->isResource($resource)) {
      $this->_accessto = $resource;
    }
  }
  
  public function hasAuth ($resource = NULL) {
    $r = false;
    if (parent::hasAuth()) {
      if (!empty ($resource)) {
        if ($this->_acl->isResource($resource)) {
          $r = $this->_acl->hasPrivilege('thisuser', $resource);
        }
      } else {
        if ($this->_acl->isResource($this->_accessto)) {
          $r = $this->_acl->hasPrivilege('thisuser', $this->_accessto);
        }
      }
    }
    return $r;
  }
  
  public function unsetUser () {
    parent::unsetUser();
    $this->callAcl(TRUE);
  }
  
  public function setSession () {
    parent::setSession();
    $this->_session->set_userdata(
      array(
        'acl_params' => $this->_acl->toSession()
      )
    );
  }
}