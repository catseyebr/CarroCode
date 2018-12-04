<?php
class Acl {
  
  /**
   * @var $_roles | matriz de todos os roles (grupos de usuário) já inseridos
   */
  protected $_roles = array();
  
  /**
   * @var $_resources | matriz de todos os resources (tipos de página) já inseridos
   */
  protected $_resources = array();
  
  /**
   * @var $_privilege | matriz de todos os privilégios de acesso já inseridos
   * @example array(2) { ["guest"]=> array(1) { [0]=> string(9) "guestpage" } ["user"]=> array(2) { [0]=> string(9) "guestpage" [1]=> string(8) "userpage" }
   */
  protected $_privilege = array();
  
  /**
   * @var $_heritage | matriz de herancas entre roles (grupos de usuario)
   *      Para efeito de lógica:
   *        "parents" são os elementos que terão suas liberações herdadas
   *        "childs" são os elementos que herdarão as liberações
   * @example array(1) { ["parent"]=> array(2) { [0]=> string(4) "child1" [1]=> string(5) "child2" }
   */
  protected $_heritage = array();
  
  /**
   * @method __construct | Construtor da classe
   * @param [array $privileges] | array contendo matriz dos privilégios a serem adicionados no modelo array( 'guest' => 'guestpage' )
   * @param [array $heritages] | array contendo matriz das heranças a serem adicionados  no modelo array( 'child1' => 'parent1','child2' => array('parent1','parent2','parent3') )
   * @param [array $resources] | array contendo os resources a serem adicionados
   * @param [array $roles] | array contendo os roles a serem adicionados
   */
  public function __construct ($params) {
    if (!empty ($params['resources'])) {
      $this->setResources($params['resources']);
    }
    if (!empty ($params['roles'])) {
      $this->setRoles($params['roles']);
    }
    if (!empty ($params['heritages'])) {
      $this->setMultipleHeritages($params['heritages']);
    }
    if (!empty ($params['privileges'])) {
      $this->setPrivileges($params['privileges']);
    }
  }
  
  /**
   * @method setAll | Método para setar todos os privilégios de uma única vez
   * @param [array $privileges] | array contendo matriz dos privilégios a serem adicionados no modelo array( 'guest' => 'guestpage' )
   * @param [array $heritages] | array contendo matriz das heranças a serem adicionados  no modelo array( 'child1' => 'parent1','child2' => array('parent1','parent2','parent3') )
   * @param [array $resources] | array contendo os resources a serem adicionados
   * @param [array $roles] | array contendo os roles a serem adicionados
   * @return void
   */
  public function setAll ($privileges = NULL, $heritages = NULL, $resources = NULL, $roles = NULL) {
    $this->setPrivileges($privileges);
    $this->setMultipleHeritages($heritages);
    $this->setResources($resources);
    $this->setRoles($roles);
  }
  
  /**
   * @method setRole | Método para adicionar um único role
   * @param string $role | role a ser adicionado
   * @return void
   */
  public function setRole ($role) {
    if (!$this->isRole($role)) {
      $this->_roles[] = $role;
    }
  }
  
  /**
   * @method setRoles | Método para adicionar múltiplos roles de uma única vez
   * @param array $roles | array contendo os roles a serem adicionados
   * @return void
   */
  public function setRoles ($roles) {
    if (is_array($roles)) {
      for ($i = 0, $s = count ($roles) -1; $i <= $s; $i++) {
        $this->setRole($roles[$i]);
      }
    }
  }
  
  /**
   * @method setResource | Método para adicionar um único resource
   * @param string $resource | resource a ser adicionado
   * @return void
   */
  public function setResource ($resource) {
    if (!$this->isResource($resource)) {
      $this->_resources[] = $resource;
    }
  }
  
  /**
   * @method setResources | Método para adicionar múltiplos resources de uma única vez
   * @param array $resources | array contendo os resources a serem adicionados
   * @return void
   */
  public function setResources ($resources) {
    if (is_array($resources)) {
      for ($i = 0, $s = count ($resources) -1; $i <= $s; $i++) {
        $this->setResource($resources[$i]);
      }
    }
  }
  
  /**
   * @method setPrivilege | Método para adicionar um único privilégio de acesso
   * @param string $role | role referente ao privilégio
   * @param string $resource | resource referente ao privilégio
   * @return void
   */
  public function setPrivilege ($role, $resource) {
    if (!$this->isRole($role)) {
      $this->setRole($role);
    }
    
    if (!$this->isResource($resource)) {
      $this->setResource($resource);
    }
    
    if (!$this->hasPrivilege($role, $resource)) {
      $this->_privilege[$role][] = $resource;
    }
    
    $this->updateChilds($role, $resource);
  }
  
  /**
   * @method setPrivileges | Método para adicionar múltiplos privilégios de acesso de uma única vez
   * @param array $privileges | array contendo matriz dos privilégios a serem adicionados no modelo array( 'guest' => 'guestpage' )
   * @return void
   */
  public function setPrivileges ($privileges) {
    if (is_array($privileges)) {
      foreach ($privileges as $role => $resource) {
        if (is_array ($resource)){
          for ($i = 0, $s = count($resource) -1; $i <= $s; $i++) {
            $this->setPrivilege($role, $resource[$i]);
          }
        } else {
          $this->setPrivilege($role, $resource);
        }
      }
    }
  }
  
  /**
   * @method setHeritage | Método para adicionar uma única herança
   * @param string $role | o role que herdará as liberações
   * @param string $parent | o role que terá suas liberações herdadas
   * @return void
   */
  public function setHeritage ($role, $parent) {
    if (!$this->isRole($role)) {
      $this->setRole($role);
    }
    if (!$this->isRole($parent)) {
      $this->setRole($parent);
    }
    if (!$this->isChildOf($parent, $role)) {
      $this->_heritage[$parent][] = $role;
    }
    if ($this->hasPrivilege($parent)) {
      for ($i = 0, $s = count ($this->_privilege[$parent]) -1; $i <= $s; $i++) {
        if (!$this->hasPrivilege($role, $this->_privilege[$parent][$i])) {
          $this->setPrivilege($role, $this->_privilege[$parent][$i]);
        }
      }
    }
  }
  
  /**
   * @method setHeritages | Método para adicionar várias heranças a um único role
   * @param string $role | o role que herdará as liberações
   * @param array $parents | array contendo os roles que terão suas liberações herdadas
   * @return void
   */
  public function setHeritages ($role, $parents) {
    if (is_array($parents)) {
      for ($i = 0, $s = count($parents) -1; $i <= $s; $i++) {
        $this->setHeritage($role, $parents[$i]);
      }
    }
  }
  
  /**
   * @method setMultipleHeritages | Método para adicionar várias heranças a vários roles
   * @param array $heritages | array contendo matriz das heranças a serem adicionados  no modelo array( 'child1' => 'parent1','child2' => array('parent1','parent2','parent3') )
   * @return void
   */
  public function setMultipleHeritages ($heritages) {
    if (is_array($heritages)) {
      foreach ($heritages as $role => $parents) {
        if (is_array($parents)) {
          $this->setHeritages($role, $parents);
        } else {
          $this->setHeritage($role, $parents);
        }
      }
    }
  }
  
  /**
   * @method hasPrivilege | método para verificar existência de privilégios
   * @param string $role | role a ser verificado
   * @param string $resource | resource para verificação
   * @return boolean
   */
  public function hasPrivilege ($role, $resource = NULL) {
    if (array_key_exists ($role, $this->_privilege)) {
      if (!empty ($resource)) {
        if (in_array ($resource, $this->_privilege[$role])) {
          $r = true;
        } else {
          $r = false;
        }
      } else {
        $r = true;
      }
    } else {
      $r = false;
    }
    
    return $r;
  }
  
  /**
   * @method isRole | Método para verificação da existência de um role
   * @param string $role | role a ser verificado
   * @return boolean
   */
  public function isRole ($role) {
    $r = in_array ($role, $this->_roles);
    return $r;
  }
  
  /**
   * @method isResource | Método para verificação da existência de um resource
   * @param string $resource | resource a ser verificado
   * @return boolean
   */
  public function isResource ($resource) {
    $r = in_array ($resource, $this->_resources);
    return $r;
  }
  
  /**
   * @method isChildOf | Método para verificação se um role está herdando liberações de outro
   * @param string $parent | o role que possivelmente teve suas liberações herdadas
   * @param string $role | o role que possivelmente herdou liberações
   * @return boolean
   */
  protected function isChildOf ($parent, $role) {
    if ($this->hasChild($parent)) {
      if (in_array ($role, $this->_heritage[$parent])) {
        $r = true;
      } else {
        $r = false;
      }
    } else {
      $r = false;
    }
    
    return $r;
  }
  
  /**
   * @method hasChild | Método para verificação se há algum role herdando liberações do role indicado
   * @param string $role | o role a ser verificado
   * @return boolean
   */
  protected function hasChild ($role) {
    if (array_key_exists ($role, $this->_heritage)) {
      $r = true;
    } else {
      $r = false;
    }
    
    return $r;
  }
  
  /**
   * @method updateChilds | método para adicionar um resource aos roles "filhos"
   * @param string $role | role "pai", o qual vai ter as liberações herdadas
   * @param string $resource | resource a ser herdado
   * @return void
   */
  protected function updateChilds ($role, $resource) {
    if ($this->hasChild($role)) {
      for ($i = 0, $s = count ($this->_heritage[$role]) -1; $i <= $s; $i++) {
        if (!$this->hasPrivilege ($this->_heritage[$role][$i], $resource)) {
          $this->setPrivilege ($this->_heritage[$role][$i], $resource);
        }
      }
    }
  }
  
  public function toSession() {
    return array (
      'roles' => $this->_roles,
      'resources' => $this->_resources,
      'privileges' => $this->_privilege
    );
  }
}