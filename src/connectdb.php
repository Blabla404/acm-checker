<?php
include_once('private_config.php');

try{
   $bdd = new PDO('mysql:host=' . $_dbHost . ';dbname=' . $_dbName, $_dbLogin, $_dbPass);
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}
?>
