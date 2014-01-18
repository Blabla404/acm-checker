<?php
include('header.php');
include_once('connectdb.php');

$res = $bdd->query('SELECT * FROM user');
while($data = $res->fetch()){
  print_r($data);
  echo('<br/>');
}

echo('<br/><br/>');

$res = $bdd->query('SELECT * FROM problem');
while($data = $res->fetch()){
  print_r($data);
  echo('<br/>');
}

include('footer.php');
?>

