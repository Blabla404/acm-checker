<?php
include_once('connectdb.php');

$bdd->exec('DROP TABLE user');
$bdd->exec('CREATE TABLE user(id INT AUTO_INCREMENT PRIMARY KEY,pseudo VARCHAR(255), password VARCHAR(255), email VARCHAR(255), admin BOOL, idUva VARCHAR(255))');
$bdd->exec('INSERT INTO user VALUES ("Bibi", "coucou", "paf", 1, "43939")');

$bdd->exec('DROP TABLE problem');
$bdd->exec('CREATE TABLE problem(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(255), url VARCHAR(255), site INT)');

$bdd->exec('DROP TABLE td');
$bdd->exec('CREATE TABLE td(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(255), dueDate DATE)');

$bdd->exec('DROP TABLE assignement');
$bdd->exec('CREATE TABLE assignement(id INT AUTO_INCREMENT PRIMARY KEY, idProblem INT, idTD INT)');



header('Location: index.php'); 
?>
