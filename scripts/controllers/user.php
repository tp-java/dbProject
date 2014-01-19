<?php
require_once(dirname(dirname(__FILE__)) . '../models/Clients.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function get_clients_for_user($uid) {
  if ($clients = Clients::getClientsByUid($uid))
    return $clients;
return false;
}
?>
