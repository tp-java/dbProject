<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBProvider
 *
 * @author r.polunin
 */
class DBProvider {
  
  protected static $instance;
  
 
  private $conn;
  
  private function __construct() {
    require_once('Settings.php');
    $settings = Settings::$db_config;
    $this->conn = new mysqli($settings['HOST'], $settings['USER'], $settings['PASS'], $settings['DB_NAME'], $settings['PORT']);
     if(mysqli_connect_errno()) {
       throw new Exception('Ошибка соединения: '.mysqli_connect_error());
     }
  }
  
  static public function getInstance() {
    if (self::$instance == null)
      self::$instance = new self();
    
    return self::$instance;
  }
  
  public function query($string) {
    if ($result = $this->conn->query($string)) {
      if (is_object($result)) {
        $fetched_res = array();
        while($obj = $result->fetch_object()){
          array_push($fetched_res, $obj);
        }
        $result->close();
        return $fetched_res;
      } else {
        return $result;
      }
    } else {
      throw new Exception('Ошибка: ' . $this->conn->error);
    }
  }
  
  private function __clone() {
    
  }
  
  private function __wakeup() {
    
  }
  



}

?>
