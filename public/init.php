<?php
include_once('connectdb.php');

require('lib/password.php');

//$bdd->exec('DROP TABLE user');
//$bdd->exec('CREATE TABLE user(id INT AUTO_INCREMENT PRIMARY KEY,pseudo VARCHAR(255), password VARCHAR(255), email VARCHAR(255), admin BOOL, idUva VARCHAR(255))');
//$bdd->exec('INSERT INTO user VALUES ("", "admin", "'. password_hash('admin', PASSWORD_DEFAULT). '", "admin@admin.com", 1, 43939)');

$bdd->exec('DROP TABLE problem');
$bdd->exec('CREATE TABLE problem(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(255), url VARCHAR(255), site INT, bonus BOOL, idTD INT)');

$bdd->exec('INSERT INTO problem VALUES ("", "10055", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=996", 1, 0, 1)');
$bdd->exec('INSERT INTO problem VALUES ("", "272", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=208", 1, 0, 1)');
$bdd->exec('INSERT INTO problem VALUES ("", "11559", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=2595", 1, 0, 1)');
$bdd->exec('INSERT INTO problem VALUES ("", "10420", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=1361", 1, 0, 1)');
$bdd->exec('INSERT INTO problem VALUES ("", "12205", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=276&page=show_problem&problem=3357", 1, 0, 1)');
$bdd->exec('INSERT INTO problem VALUES ("", "12394", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=280&page=show_problem&problem=3816", 1, 1, 1)');
$bdd->exec('INSERT INTO problem VALUES ("", "12550", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=443&page=show_problem&problem=3995", 1, 1, 1)');

$bdd->exec('INSERT INTO problem VALUES ("", "231", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=167", 1, 0, 2)');
$bdd->exec('INSERT INTO problem VALUES ("", "11413", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=2408", 1, 0, 2)');
$bdd->exec('INSERT INTO problem VALUES ("", "11205", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=2146", 1, 0, 2)');
$bdd->exec('INSERT INTO problem VALUES ("", "524", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=465", 1, 0, 2)');
$bdd->exec('INSERT INTO problem VALUES ("", "12197", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=276&page=show_problem&problem=3349", 1, 1, 2)');
$bdd->exec('INSERT INTO problem VALUES ("", "12392", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=280&page=show_problem&problem=3814", 1, 1, 2)');
$bdd->exec('INSERT INTO problem VALUES ("", "12684", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=822&page=show_problem&problem=4422", 1, 1, 2)');


$bdd->exec('DROP TABLE td');
$bdd->exec('CREATE TABLE td(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(255), dueDate DATE)');

$bdd->exec('INSERT INTO td VALUES ("", "TD01", "2014-02-09")');
$bdd->exec('INSERT INTO td VALUES ("", "TD02", "2014-02-16")');

//$bdd->exec('DROP TABLE submission');
//$bdd->exec('CREATE TABLE submission(id INT AUTO_INCREMENT PRIMARY KEY,idUser INTEGER, idProblem INTEGER, date DATE, valid BOOL)');


header('Location: index.php');
?>
