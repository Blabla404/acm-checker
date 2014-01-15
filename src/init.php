<?php
include_once('private_config.php');

try{
   $bdd = new PDO('mysql:host=' . $_dbHost . ';dbname=' . $_dbName, $_dbLogin, $_dbPass);
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}

$bdd->exec('DROP TABLE user');
$bdd->exec('CREATE TABLE user(id INTEGER AUTO_INCREMENT PRIMARY KEY,pseudo VARCHAR, password VARCHAR, email VARCHAR, group INT, idUva VARCHAR)');
$bdd->exec('INSERT INTO user VALUES ("Bibi", "coucou", "paf", 1, "43939")');

$bdd->exec('DROP TABLE problem');
$bdd->exec('CREATE TABLE problem(id INTEGER AUTO_INCREMENT PRIMARY KEY,title VARCHAR, url VARCHAR, site INT)');

$bdd->exec('DROP TABLE td');
$bdd->exec('CREATE TABLE td(id INTEGER AUTO_INCREMENT PRIMARY KEY,title VARCHAR, dueDate DATE)');

$bdd->exec('DROP TABLE assignement');
$bdd->exec('CREATE TABLE assignement(id INTEGER AUTO_INCREMENT PRIMARY KEY, idProblem INT, idTD INT');

header('Location: index.php'); 
?>
