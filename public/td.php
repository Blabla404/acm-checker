<?php include 'header.php';
include_once('connectdb.php');

function generate($nbTD){
  global $bdd;

  $req = $bdd->prepare('SELECT dueDate FROM td WHERE id = ?');
  $req->execute(array($nbTD));
  $dueDate = $req->fetch();
  $dueDate = $dueDate['dueDate'];

  echo('<p>Ci-dessous les problèmes de la semaine, à rendre avant le <strong>' . $dueDate. '</strong>. Et voici le <a href="scoreboard.php?td='. $nbTD .'">scoreboard</a> de la semaine.</p>');
  echo('<ul>');

  $req = $bdd->prepare('SELECT * FROM problem WHERE idTD = ? AND NOT bonus');
  $req->execute(array($nbTD));
  while($data = $req->fetch()){
    echo('<li> <a href="'. $data['url']. '">' . $data['title'] . '</a></li>');
  }

  $req = $bdd->prepare('SELECT * FROM problem WHERE idTD = ? AND bonus');
  $req->execute(array($nbTD));
  while($data = $req->fetch()){
    echo('<li> <strong>BONUS: </strong><a href="'. $data['url']. '">' . $data['title'] . '</a></li>');
  }


echo('</ul>');
}

?>

<h1>TD 01</h1>
<p>
Ce TD est surtout une introduction. Nous allons voir un workflow pour
  travailler efficacement, comment gérer les entrées sorties et
  comment utiliser les structures de données classiques (vector,
  map...) de la librairie standard.
</p>

<?php
generate(1);
?>

<h1>TD 02</h1>
<p>
Aujourd'hui nous allons voir comment calculer la plus longue sous
  suite croissante en temps <em>O(n ln(n))</em> là où la programmation
  dynamique classique donnerait un algo en
  <em>O(n<sup>2</sup>)</em>.
</p>

<p>
Les autres problèmes sont de la génération exhaustive de solution, du
  backtracking et de la dichotomie sur l'espace des solutions.
</p>

<?php
generate(2);
?>

<h1>TD 03</h1>
<p>
Aujourd'hui programmation dynamique. Comme d'habitude les bonus sont d'anciens exo du SWERC.
</p>

<?php
generate(3);
?>

<h1>TD 04</h1>
<p>
Aujourd'hui petit TD. Un problème de backtracking et une application directe des arbres de Fenwick. Ceux qui sont en avance peuvent en profiter pour finir les bonus.
</p>

<?php
generate(4);
?>

<h1>TD 05</h1>
<p>
Aujourd'hui des problèmes mathématiques, exponentiation rapide, pgcd, ppcm, crible...
</p>

<?php
generate(5);
?>

<h1>TD 06</h1>
<p>
Aujourd'hui des problèmes de chaines de caractères. En particulier, KMP et les tableaux de suffixes.
</p>

<?php
generate(6);
?>

<h1>TD 07</h1>
<p> Entrainement pour le partiel. Il y a beaucoup d'exercices
qui sont normalement plus faciles que d'habitude, le but est de tout faire
pendant la séance.
</p>

<p>Les problèmes sont issus du <a
href="https://code.google.com/codejam/">Google Code Jam</a> et les
inscriptions ont déjà commencées</p>

<?php
generate(7);
?>

<h1>Partiel</h1>
<p> Le partiel ! Les problèmes sont triés par nom alphabétique et pas par ordre de difficulté.
Tous les problèmes valent le même nombre de points. La time limite est de 10 secondes en compilant
sur les machines de l'école avec clang++ -O2 -std=c++11. 
</p>

<p>
À la fin du partiel envoyez-nous tous vos codes par mail en indiquant <strong>explicitement</strong>
ceux qui ne fonctionnent pas ou qui ne passent pas le time limite. Pour rappel, vous devez nommer
vos codes avec le nom du problème un tiret puis votre nom|pseudo|login
par exemple <code>print_42-ttrunck</code>. Il peut y avoir un malus pour ceux ne respectant pas le
format de rendu.
</p>

<?php
generate(8);
?>

<h1>TD 09</h1> <p>On va corriger et finir le partiel et le TD07. Pour ceux qui
ont fini: entraitement aux ACM, par groupe de 3 avec un unique ordinateur,
essayez de faire le SWERC2007, voici le
<a href="http://ctp.di.fct.unl.pt/~amd/cpn/2007swerc/official/class.html">
classement officiel le jour du SWERC  
</a>.</p>

<?php
generate(9);
?>

<h1>TD 10</h1> <p>Des algos de graphes: parcours en largeur (BFS), Dijkstra,
Prim, recherche de pont (arête disconnectante) et composantes fortement
connexes</p>

<?php
generate(10);
?>

<h1>TD 11</h1> <p>Encore des graphes: Kruskal (qui dans certaines situations
est bien plus adapté que Prim), Bellman-Ford, Floyd-Warshall et des flots.</p>

<?php
generate(11);
?>

<h1>TD 12</h1> <p>Finir les problèmes de graphes. Ceux qui ont tout fait,
peuvent finir les problèmes du SWERC2007 donnés lors du TD09.</p>

<?php
generate(12);
?>

<h1>TD 13</h1>

<?php
generate(13);
?>

<h1>TD 14</h1>
<p>De la géométrie. Pour le dernier exo nous vous conseillions d'aller voir sur cette page <a href="http://fr.wikipedia.org/wiki/Parcours_de_Graham">wikipedia</a> et de poser des questions.</p>
<?php
generate(14);
?>

<h1>TD 15</h1>
<p>Dernier TD avant l'examen. Les problemes sont ceux de l'examen de l'an dernier moins un probleme deja fait.</p>
<?php
generate(15);
?>

<h1>Examen</h1>
<p> L'examen ! Les problèmes sont triés par nom alphabétique et pas par ordre de difficulté.
Tous les problèmes valent le même nombre de points. La time limite est de 10 secondes en compilant
sur les machines de l'école avec <code>clang++ -O2 -std=c++11</code>. 
</p>

<p>
À la fin du partiel envoyez-nous tous vos codes par mail en indiquant <strong>explicitement</strong>
ceux qui ne fonctionnent pas ou qui ne passent pas le time limite. Pour rappel, vous devez nommer
vos codes avec le nom du problème un tiret puis votre nom|pseudo|login
par exemple <code>print_42-ttrunck</code>. Il peut y avoir un malus pour ceux ne respectant pas le
format de rendu.
</p>

<?php
generate(16);
?>

<?php include 'footer.php'; ?>
