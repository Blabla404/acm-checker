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

$bdd->exec('INSERT INTO problem VALUES ("", "357", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=293", 1, 0, 3)');
$bdd->exec('INSERT INTO problem VALUES ("", "10405", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&page=show_problem&problem=1346", 1, 0, 3)');
$bdd->exec('INSERT INTO problem VALUES ("", "10130", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=114&page=show_problem&problem=1071", 1, 0, 3)');
$bdd->exec('INSERT INTO problem VALUES ("", "10616", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=1557", 1, 0, 3)');
$bdd->exec('INSERT INTO problem VALUES ("", "12182", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=275&page=show_problem&problem=3334", 1, 1, 3)');
$bdd->exec('INSERT INTO problem VALUES ("", "12200", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=276&page=show_problem&problem=3352", 1, 1, 3)');

$bdd->exec('INSERT INTO problem VALUES ("", "12086", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&page=show_problem&problem=3238", 1, 0, 4)');
$bdd->exec('INSERT INTO problem VALUES ("", "12684", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=822&page=show_problem&problem=4422", 1, 0, 4)');

$bdd->exec('INSERT INTO problem VALUES ("", "1230", "http://uva.onlinejudge.org/index.php?option=onlinejudge&page=show_problem&problem=3671", 1, 0, 5)');
$bdd->exec('INSERT INTO problem VALUES ("", "10229", "http://uva.onlinejudge.org/index.php?option=onlinejudge&page=show_problem&problem=1170", 1, 0, 5)');
$bdd->exec('INSERT INTO problem VALUES ("", "12184", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=275&page=show_problem&problem=3336", 1, 0, 5)');
$bdd->exec('INSERT INTO problem VALUES ("", "10539", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=1480", 1, 0, 5)');
$bdd->exec('INSERT INTO problem VALUES ("", "108", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=44", 1, 0, 5)');
$bdd->exec('INSERT INTO problem VALUES ("", "12546", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=443&page=show_problem&problem=3991", 1, 1, 5)');
$bdd->exec('INSERT INTO problem VALUES ("", "12185", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=275&page=show_problem&problem=3337", 1, 1, 5)');

$bdd->exec('INSERT INTO problem VALUES ("", "42", "", 2, 0, 6)');

$bdd->exec('DROP TABLE td');
$bdd->exec('CREATE TABLE td(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(255), dueDate DATE)');

$bdd->exec('INSERT INTO td VALUES ("", "TD01", "2014-02-09")');
$bdd->exec('INSERT INTO td VALUES ("", "TD02", "2014-02-16")');
$bdd->exec('INSERT INTO td VALUES ("", "TD03", "2014-02-23")');
$bdd->exec('INSERT INTO td VALUES ("", "TD04", "2014-03-02")');
$bdd->exec('INSERT INTO td VALUES ("", "TD05", "2014-03-16")');
$bdd->exec('INSERT INTO td VALUES ("", "TD06", "2014-03-12")');

//$bdd->exec('DROP TABLE submission');
//$bdd->exec('CREATE TABLE submission(id INT AUTO_INCREMENT PRIMARY KEY,idUser INTEGER, idProblem INTEGER, date DATETIME, valid BOOL)');


header('Location: index.php');
?>
