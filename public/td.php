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

<?php include 'footer.php'; ?>
