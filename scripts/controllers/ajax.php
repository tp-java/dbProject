<?php
require_once(dirname(dirname(__FILE__)) . '../models/Clients.php');
function get_client_by_cid($cid) {
    $client = new Clients();
    $client->loadClientById($cid);
    return $client;
}
?>
