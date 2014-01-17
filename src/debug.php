<?php
include('header.php');
include_once('connectdb.php');

$res = $bdd->query('SELECT * FROM user');
while($data = $res->fetch()){
  print_r($data);
}

include('footer.php');
?>

