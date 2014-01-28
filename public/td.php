<?php include 'header.php';
include_once('connectdb.php');

function generate($nbTD){
  echo('<p>Voici les problèmes de la semaine:</p>');
  echo('<ul>');

  global $bdd;

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

<?php include 'footer.php'; ?>
