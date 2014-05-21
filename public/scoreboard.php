<?php include 'header.php';
include_once('connectdb.php');

$sql = 'CREATE OR REPLACE VIEW problemtd AS
  SELECT problem.id, problem.title, problem.url, problem.bonus, td.dueDate, problem.idTD
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
WHERE NOT admin
GROUP BY user.id
ORDER BY COUNT(submissiontd.id) DESC, MAX(submissiontd.date)
'
);
while($data = $res->fetch())
  if(!isset($_GET['user']) || $data['pseudo'] == $_GET['user'])
    $users[] = $data;

$problems = array();
$sql = 'SELECT * FROM problemtd ORDER BY idTD, bonus, id';
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
<?php
$nbProblem = 0;
$nbBonus = 0;
foreach($problems as $problem){
    if($problem['bonus'])
      $nbBonus += 1;
    else
      $nbProblem += 1;
}
echo("<th>" . $nbProblem . " problèmes et " . $nbBonus . " bonus</th>");
?>
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
  $doneB = 0;
  $done = 0;
  foreach($problems as $problem){
    if(isset($valid[$user['id']][$problem['id']])) {
      if($problem['bonus'])
        $doneB += 1;
      else
        $done += 1;
    }
  }

  echo("<tr>\n");
  echo('<td><a href="scoreboard.php?user=' . htmlspecialchars($user['pseudo']) . '">');
  echo(htmlspecialchars($user['pseudo']) . '</a>');
  echo(" (" . $done . "+". $doneB . ")");
  echo("</td>\n");

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
