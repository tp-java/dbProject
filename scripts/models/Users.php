<?php
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
      $result = $this->conn->query("SELECT users.* FROM sessions LEFT JOIN users ON uid=users.id WHERE hash = '". $sess_id ."'");
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
      $this->conn->query("INSERT INTO sessions (uid, hash) VALUES (" . $this->id . ", '" . $hash . "')");
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
  
  private function assignFieldsFromResult($result) {
    $this->id = $result[0]->id;
    $this->username = $result[0]->username;
    $this->f_name = $result[0]->f_name?$result[0]->f_name:'';
    $this->s_name = $result[0]->s_name?$result[0]->s_name:'';
    $this->l_name = $result[0]->l_name?$result[0]->l_name:'';
    $this->role = $result[0]->role?$result[0]->role:'';
    $this->comment = $result[0]->comment?$result[0]->comment:'';
    $this->initialized = true;
  }
  
  public static function getAllUsersByManager($manager) {
    //TODO:
  }
}

?>
