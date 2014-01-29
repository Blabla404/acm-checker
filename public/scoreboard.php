<?php include 'header.php';
include_once('connectdb.php');

$valid = array();
$res = $bdd->query('SELECT idUser, idProblem, date FROM submission WHERE valid=TRUE');
while($data = $res->fetch())
  $valid[$data['idUser']][$data['idProblem']] = $data['date'];

$users = array();
$res = $bdd->query('SELECT id, pseudo FROM user WHERE admin=FALSE');
while($data = $res->fetch())
  $users[] = $data;

$problems = array();
$sql = 'SELECT problem.id, problem.title, problem.url, problem.bonus, td.dueDate
FROM problem JOIN td ON (problem.idTD = td.id)';


if(isset($_GET['td']) && is_numeric($_GET['td']))
  $sql .= ' WHERE td.id='.$_GET['td'];

$res = $bdd->query($sql);
while($data = $res->fetch())
  $problems[] = $data;

if(file_exists('last_update.txt')){
  $date = file_get_contents('last_update.txt');
  echo('<p>Dernière mise à jour: ' . $date . '</p>');
}

?>

<table class="table table-bordered">
<tr>
  <th></th>
  <?php foreach($problems as $problem)
  echo('<th> <a href="'. $problem['url'].'">'. $problem['title'] .'</a><br/> (' . $problem['dueDate']. ")</th>\n");
  ?>
</tr>

<?php
foreach($users as $user){
  echo("<tr>\n");
  echo('<td>'.htmlspecialchars($user['pseudo'])."</td>\n");

  foreach($problems as $problem){
    if(!isset($valid[$user['id']][$problem['id']]))
      echo("<td class=\"danger\">TODO</td>\n");
    else if($valid[$user['id']][$problem['id']]<=$problem['dueDate'])
    echo("<td class=\"success\">DONE</td>\n");
    else
      echo("<td class=\"warning\">LATE</td>\n");
  }
  echo("</tr>\n");
}
?>

</table>

<?php include 'footer.php'; ?>
