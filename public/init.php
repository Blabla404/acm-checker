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

$bdd->exec('INSERT INTO problem VALUES ("", "print_42", "http://perso.ens-lyon.fr/theophile.trunck/ACM2014/problems.php?id=print_42", 2, 0, 6)');
$bdd->exec('INSERT INTO problem VALUES ("", "kmp", "http://perso.ens-lyon.fr/theophile.trunck/ACM2014/problems.php?id=kmp", 2, 0, 6)');
$bdd->exec('INSERT INTO problem VALUES ("", "suffix_array", "http://perso.ens-lyon.fr/theophile.trunck/ACM2014/problems.php?id=suffix_array", 2, 0, 6)');
$bdd->exec('INSERT INTO problem VALUES ("", "11107", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=209&page=show_problem&problem=2048", 1, 1, 6)');
$bdd->exec('INSERT INTO problem VALUES ("", "164", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=100", 1, 0, 6)');
$bdd->exec('INSERT INTO problem VALUES ("", "760", "http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=335&page=show_problem&problem=701", 1, 0, 6)');

$bdd->exec('INSERT INTO problem VALUES ("", "alien_language", "http://perso.ens-lyon.fr/theophile.trunck/ACM2014/problems.php?id=alien_language", 2, 0, 7)');
$bdd->exec('INSERT INTO problem VALUES ("", "all_your_base", "http://perso.ens-lyon.fr/theophile.trunck/ACM2014/problems.php?id=all_your_base", 2, 0, 7)');
$bdd->exec('INSERT INTO problem VALUES ("", "file_fix-it", "http://perso.ens-lyon.fr/theophile.trunck/ACM2014/problems.php?id=file_fix-it", 2, 0, 7)');
$bdd->exec('INSERT INTO problem VALUES ("", "reverse_word", "http://perso.ens-lyon.fr/theophile.trunck/ACM2014/problems.php?id=reverse_word", 2, 0, 7)');
$bdd->exec('INSERT INTO problem VALUES ("", "rope_intranet", "http://perso.ens-lyon.fr/theophile.trunck/ACM2014/problems.php?id=rope_intranet", 2, 0, 7)');
$bdd->exec('INSERT INTO problem VALUES ("", "rotate", "http://perso.ens-lyon.fr/theophile.trunck/ACM2014/problems.php?id=rotate", 2, 0, 7)');
$bdd->exec('INSERT INTO problem VALUES ("", "scalar_product", "http://perso.ens-lyon.fr/theophile.trunck/ACM2014/problems.php?id=scalar_product", 2, 0, 7)');
$bdd->exec('INSERT INTO problem VALUES ("", "store_credit", "http://perso.ens-lyon.fr/theophile.trunck/ACM2014/problems.php?id=store_credit", 2, 0, 7)');

$bdd->exec('DROP TABLE td');
$bdd->exec('CREATE TABLE td(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(255), dueDate DATE)');

$bdd->exec('INSERT INTO td VALUES ("", "TD01", "2014-02-09")');
$bdd->exec('INSERT INTO td VALUES ("", "TD02", "2014-02-16")');
$bdd->exec('INSERT INTO td VALUES ("", "TD03", "2014-02-23")');
$bdd->exec('INSERT INTO td VALUES ("", "TD04", "2014-03-02")');
$bdd->exec('INSERT INTO td VALUES ("", "TD05", "2014-03-16")');
$bdd->exec('INSERT INTO td VALUES ("", "TD06", "2014-04-02")');
$bdd->exec('INSERT INTO td VALUES ("", "TD07", "2014-03-19")');

//$bdd->exec('DROP TABLE submission');
//$bdd->exec('CREATE TABLE submission(id INT AUTO_INCREMENT PRIMARY KEY,idUser INTEGER, idProblem INTEGER, date DATETIME, valid BOOL), UNIQUE (`idUser`, `idProblem`, `valid`)');


header('Location: index.php');
?>
