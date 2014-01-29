<?php
include_once('connectdb.php');

function uvaId2Title(){
$problemJSON = file_get_contents('problem.json');
$data = json_decode($problemJSON, true);

$id2Title = array();

foreach($data as $problem)
  $id2Title[$problem[0]] = $problem[1];

return $id2Title;
}

function uvaId2User(){
  global $bdd;
  $id2User = array();
  $res = $bdd->query('SELECT id,idUva FROM user');
  while($data = $res->fetch())
    $id2User[$data['idUva']] = $data['id'];
  return $id2User;
}

function uvaProblem2Id(){
  global $bdd;
  $problem2Id = array();
  $res = $bdd->query('SELECT id,title FROM problem ');
  while($data = $res->fetch())
    $problem2Id[$data['title']] = $data['id'];
  return $problem2Id;
}

function uvaCall(){
  global $bdd;
  $call = "http://uhunt.felix-halim.net/api/subs-nums/";

  $res = $bdd->query('SELECT idUva FROM user');
  $data = $res->fetchAll(PDO::FETCH_COLUMN, 0);
  $call .= join(',', $data);

  $call .= "/";

  $res = $bdd->query('SELECT title FROM problem WHERE site = 1');
  $data = $res->fetchAll(PDO::FETCH_COLUMN, 0);
  $call .= join(',', $data);

  $call .= "/0";
  return $call;
}

function uvaGet($call){
  global $bdd;
  $id2Title = uvaId2Title();
  $id2User = uvaId2User();

  $problem2Id = uvaProblem2Id();

  $uvaJSON = file_get_contents($call);
  $data = json_decode($uvaJSON, true);
  foreach ($data as $idUVA => $value){
    $subs = $value['subs'];
    $solved = array();
    foreach($subs as $sub)
      if($sub[2]==90){
      $problem = $problem2Id[$id2Title[$sub[1]]];
      if($solved[$problem])
	$solved[$problem] = min($solved[$problem], $sub[4]);
      else
	$solved[$problem] = $sub[4];
    }

    $sql = 'INSERT INTO submission VALUES';
    $sqlValue = array();
    foreach($solved as $problem => $date){
      $sqlValue[] = '("","' . $id2User[$idUVA] . '","' . $problem . '",FROM_UNIXTIME("' . $date . '"), TRUE)';
    }
    if($sqlValue){
      $bdd->exec('DELETE from submission WHERE idUser = ' . $id2User[$idUVA]);
      $sql .= join(',', $sqlValue);
      $bdd->exec($sql);
    }
  }
}

$call = uvaCall();
uvaGet($call);

date_default_timezone_set('Europe/Paris');
$date = date('H:i:s d/m/Y');
$handle = fopen('last_update.txt', 'wb');
fwrite($handle, $date);
fclose($handle);
?>
