<?php
/**
 * Description of Clients
 *
 * @author r.polunin
 */
class Clients {
  
  private $id;
  private $f_name;
  private $s_name;
  private $l_name;
  private $address;
  private $comment;
  private $status;
  private $employer;
  
  private $calls;
  private $offers;
  private $tel_numbers;
  
  private $initialized = false;
  
  public function __construct() {
    require_once dirname(dirname(__FILE__)) . '/db_singleton/DBprovider.php';
    $this->conn = DBProvider::getInstance();
  }
  
   public function getId() {
    if (!$this->check_init())
      return false;
    return $this->id;
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
  
  public function getAddress() {
    if (!$this->check_init())
      return false;
    return $this->address;
  }
    
  public function getComment() {
    if (!$this->check_init())
      return false;
    return $this->comment;
  }
  
  public function getStatus() {
    if (!$this->check_init())
      return false;
    return $this->status;
  }
  
  public function getEmployerId() {
    if (!$this->check_init())
      return false;
    return $this->employer;
  }
  //TODO:
  public function getCalls() {
    if (!$this->check_init())
      return false;
    if (!$this->calls) {
      $this->calls = $this->getCallsFromDb();
    }
    return $this->calls;
  }
  
  public function getOffers() {
    if (!$this->check_init())
      return false;
    if (!$this->offers) {
      $this->offers = $this->getOffersFromDb();
    }
    return $this->offers;
  }
  
  public function getTelNumbers() {
    if (!$this->check_init())
      return false;
    return $this->tel_numbers;
  }
  
  public function loadClientById($id) {
    try {
      $result = $this->conn->query("SELECT * FROM clients WHERE idClients = '" . $id . "'");
    } catch (Exception $e) {
      $this->error = $e->getMessage();
      return false;
    }
    if ($result) {
      $this->assignFieldsFromResult($result);
      return true;
    } else {
      $this->error = 'Wrong clientId';
      return false;
    }
  }
  
  public static function getClientsByUid($uid) {
    try {
      require_once dirname(dirname(__FILE__)) . '/db_singleton/DBprovider.php';
      $result = DBProvider::getInstance()->query("SELECT clients.* FROM clients WHERE employer = '" . $uid . "'");
    } catch (Exception $e) {
      return false;
    }
    if ($result) {
      $clients_array = array();
      foreach ($result as $client) {
        $tmp = Clients::getClientByResultSet($client);
        array_push($clients_array, $tmp);
      }
      return $clients_array;
    } else {
      return false;
    }
       
  }
  
  private static function getClientByResultSet($result) {
    $client = new Clients();
    $client->assignFieldsFromResult(array($result));
    return $client;
  }
  
  private function assignFieldsFromResult($result) {
    $this->id = $result[0]->idClients;
    $this->f_name = $result[0]->f_name?$result[0]->f_name:'';
    $this->s_name = $result[0]->s_name?$result[0]->s_name:'';
    $this->l_name = $result[0]->l_name?$result[0]->l_name:'';
    $this->address = $result[0]->address?$result[0]->address:'';
    $this->comment = $result[0]->comment?$result[0]->comment:'';
    $this->status = $result[0]->status?$result[0]->status:'';
    $this->employer = $result[0]->employer?$result[0]->employer:'';
    $this->tel_numbers = ($numbs = $this->getTelNumbersFromDb())?$numbs:array();
    
    $this->initialized = true;
  }
  
  private function getTelNumbersFromDb() {
    try {
      $result = $this->conn->query("SELECT * FROM tel_numbers WHERE client = '" . $this->id . "'");
    } catch (Exception $e) {
      $this->error = $e->getMessage();
      return false;
    }
    if ($result) {
      return $result;
    } else {
      $this->error = 'Wrong clientId, fetching phone numbers failed';
      return false;
    }
  }
  
  private function getOffersFromDb() {
    try {
      $result = $this->conn->query("SELECT offers.*, offers_types.type as title FROM offers INNER JOIN offers_types ON offers.type = offers_types.idOffers_types WHERE clientID = " . $this->id);
    } catch (Exception $e) {
      $this->error = $e->getMessage();
      return false;
    }
    if ($result) {
      return $result;
    } else {
      $this->error = 'Something went wrong with offers';
      return false;
    }
  }
  
  private function getCallsFromDb() {
    try {
      $result = $this->conn->query("SELECT users.f_name as employer, calls.result as call_result, duration, calls.comment as call_comment, time FROM calls INNER JOIN clients ON client=idClients INNER JOIN users ON employer = idUsers WHERE client = " . $this->id . "");
    } catch (Exception $e) {
      $this->error = $e->getMessage();
      return false;
    }
    if ($result) {
      return $result;
    } else {
      $this->error = 'Something went wrong with calls';
      return false;
    }
  }
   
  private function check_init() {
    if (!$this->initialized) {
      $this->error = 'User is not loaded from db';      
    }
    return $this->initialized;
  }
}

?>
