<?php include 'header.php';
include_once('connectdb.php');

$sql = 'CREATE OR REPLACE VIEW problemtd AS
  SELECT problem.id, problem.title, problem.url, problem.bonus, td.dueDate
  FROM problem JOIN td ON (problem.idTD = td.id)';
if(isset($_GET['td']) && is_numeric($_GET['td']))
  $sql .= ' WHERE td.id='.$_GET['td'];

$bdd->exec($sql);

$sql = 'CREATE OR REPLACE VIEW submissiontd AS
SELECT DISTINCT submission.id, submission.idUser, submission.idProblem, submission.date
FROM problemtd JOIN submission ON (problemtd.id=submission.idProblem)
WHERE submission.valid';
$bdd->exec($sql);

$valid = array();
$res = $bdd->query('SELECT idUser, idProblem, CAST(date AS DATE) as date FROM submissiontd');
while($data = $res->fetch())
  $valid[$data['idUser']][$data['idProblem']] = $data['date'];

$users = array();
$res = $bdd->query(
'SELECT user.id, user.pseudo
FROM user LEFT JOIN submissiontd ON(user.id=submissiontd.idUser)
GROUP BY user.id
ORDER BY admin, COUNT(submissiontd.id) DESC, MAX(submissiontd.date)
'
);
while($data = $res->fetch())
  $users[] = $data;

$problems = array();
$sql = 'SELECT * FROM problemtd ORDER BY dueDate, bonus, id';
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
  <?php foreach($problems as $problem){
    echo('<th> <a href="'. $problem['url'].'">'. $problem['title'] .'</a><br/>');
    if($problem['bonus'])
      echo('(Bonus)');
    else
      echo('(' . $problem['dueDate']. ')');
    echo("</th>\n");
}?>
</tr>

<?php
foreach($users as $user){
  echo("<tr>\n");
  echo('<td>'.htmlspecialchars($user['pseudo'])."</td>\n");

  foreach($problems as $problem){
    if(!isset($valid[$user['id']][$problem['id']]))
      echo("<td class=\"danger\">TODO</td>\n");
    else if($valid[$user['id']][$problem['id']]<=$problem['dueDate'] || $problem['bonus'])
      echo("<td class=\"success\">DONE</td>\n");
    else
      echo("<td class=\"warning\">LATE</td>\n");
  }
  echo("</tr>\n");
}
?>

</table>

<?php include 'footer.php'; ?>
