<?php
define ('MANAGER', 'manager');
define ('EMPLOYER', 'employer');
/**
 * Description of Users
 *
 * @author r.polunin
 */
class Users {
  private $conn;
  private $initialized = false;
  private $error = '';
  
  private $id;
  private $username;
  private $f_name;
  private $s_name;
  private $l_name;
  private $role;
  private $comment;
  private $boss_id;
    
  private $employers;
  private $clients;
  
  public function __construct() {
    require_once dirname(dirname(__FILE__)) . '/db_singleton/DBprovider.php';
    $this->conn = DBProvider::getInstance();
  }
  
  public function getId() {
    if (!$this->check_init())
      return false;
    return $this->id;
  }
  
  public function getUsername() {
    if (!$this->check_init())
      return false;
    return $this->username;
  }
  
  public function getFirstName() {
    if (!$this->check_init())
      return false;
    return $this->f_name;
  }
  
  public function getSecondName() {
    if (!$this->check_init())
      return false;
    return $this->s_name;
  }
  
  public function getLastName() {
    if (!$this->check_init())
      return false;
    return $this->l_name;
  }
  
  public function getRole() {
    if (!$this->check_init())
      return false;
    return $this->role;
  }
  
  public function getComment() {
    if (!$this->check_init())
      return false;
    return $this->comment;
  }
  
  public function getBossId() {
    if (!$this->check_init() || $this->role == MANAGER)
      return false;
    return $this->boss_id;
  }
  
  public function getClients() {
    if (!$this->check_init())
      return false;
    if (!$this->clients) {
      require_once('Clients.php');
      $this->clients = Clients::getClientsByUid($uid);
    }
    return $this->clients;
  }
  
  public function getEmployers() {
    if (!$this->check_init() || $this->role == EMPLOYER)
      return false;
    if ($employers = getAllUsersByManager($this->id)) {
      return $this->employers;
    }
    return false;
  }
    
  public function updateUser() {
    //TODO:
  }
  
  public function saveUser() {
    //TODO:
  }
  
  public function loadUserByLoginPass($username, $password) {
    //Здесь тримы, prepare и прочая безопасная лабуда
    try {
      $result = $this->conn->query("SELECT * FROM users WHERE username = '". $username ."' AND password = '" . $password . "'");
    } catch (Exception $e) {
      $this->error = $e->getMessage();
      return false;
    }
    if ($result) {
      $this->assignFieldsFromResult($result);
      return true;
    } else {
      $this->error = 'Wrong username or password';
      return false;
    }
  }
  
  public function loadUserByUsername($username) {
    //TODO:
  }
  
  public function loadUserByUid($uid) {
    //TODO:
  }
  
  public function loadUserBySessId($sess_id) {
    try {
      //TODO:
      $result = $this->conn->query("SELECT users.* FROM sessions LEFT JOIN users ON userID=users.idUsers WHERE cookie = '". $sess_id ."'");
    } catch (Exception $e) {
      $this->error = $e->getMessage();
      return false;
    }
     if ($result) {
      $this->assignFieldsFromResult($result);
      return true;
    } else {
      $this->error = 'Wrong session';
      return false;
    }
  }
  
  public function loadUserParamsAsArray() {
    //TODO:
  }
  
  public function generateNewSessionId() {
    if(!$this->check_init())
      return false;
    //TODO:
    try {
      $hash = md5($this->id . time());
      $this->conn->query("INSERT INTO sessions (userID, cookie) VALUES (" . $this->id . ", '" . $hash . "')");
      return $hash;
    } catch (Exception $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }
  
  private function check_init() {
    if (!$this->initialized) {
      $this->error = 'User is not loaded from db';      
    }
    return $this->initialized;
  }
  
  private static function getUsersByResultSet($result) {
    $user = new Users();
    $user->assignFieldsFromResult(array($result));
    return $user;
  }
  
  private function assignFieldsFromResult($result) {
    $this->id = $result[0]->idUsers;
    $this->username = $result[0]->username;
    $this->f_name = $result[0]->f_name?$result[0]->f_name:'';
    $this->s_name = $result[0]->s_name?$result[0]->s_name:'';
    $this->l_name = $result[0]->l_name?$result[0]->l_name:'';
    $this->role = $result[0]->role?$result[0]->role:'';
    $this->comment = $result[0]->comment?$result[0]->comment:'';
    $this->boss_id = $result[0]->bossID?$result[0]->bossID:'';
    $this->initialized = true;
  }
  
  public static function getAllUsersByManager($uid) {
    try {
      require_once dirname(dirname(__FILE__)) . '/db_singleton/DBprovider.php';
      $result = DBProvider::getInstance()->query("SELECT * FROM users WHERE bossID = '". $uid ."'");
    } catch (Exception $e) {
      return false;
    }
     if ($result) {
      $users_array = array();
      foreach ($result as $user) {
        array_push($users_array, Users::getUsersByResultSet($user));
      }
      return $users_array;
      
    } else {
      return false;
    }
  }
}

?>
