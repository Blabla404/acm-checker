<?php
include('header.php');
include_once('connectdb.php');

if(isset($_POST['pseudo']) OR isset($_POST['pass']) OR 
   isset($_POST['passCheck']) OR isset($_POST['email']) OR
   isset($_POST['idUva'])){

  $okPseudo = isset($_POST['pseudo']);
  if($okPseudo){
    $req = $bdd->prepare('SELECT COUNT(*) FROM user WHERE pseudo = ?');
    $req->execute(array($_POST['pseudo']));
    $okPseudo = ($req->fetchColumn()==0);
  }
  $okPass = isset($_POST['pass']) AND isset($_POST['passCheck']) AND ($_POST['pass']==$_POST['passCheck']);
  $okMail = isset($_POST['email']);

  $okIdUva = isset($_POST['idUva']);

}

if($okPseudo AND $okPass AND $okMail AND $okIdUva){
  $req = $bdd->prepare('INSERT INTO user(pseudo, password, email, admin, idUva) 
VALUES( :pseudo, :password, :email, 0, :idUva)');
$req->execute(array(
  'pseudo' => $_POST['pseudo'],
  'password' => sha1($_POST['pass']),
  'email' => $_POST['email'],
  'idUva' => $_POST['idUva']
));
}

else{
?>

<form class="form-horizontal" role="form" action="signup.php" method="post">
  <div class="form-group">
    <label for="pseudo" class="col-sm-4 control-label">Pseudo</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="pseudo" name="pseudo">
    </div>
  </div>
  <div class="form-group">
    <label for="pass" class="col-sm-4 control-label">Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="pass" placeholder="Password" name="pass">
    </div>
  </div>
  <div class="form-group">
    <label for="passCheck" class="col-sm-4 control-label">Password (Confirmation)</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="passCheck" placeholder="Password" name="passCheck">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-4 control-label">Email</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="email" placeholder="prenom.nom@ens-lyon.fr" name="email">
    </div>
  </div>
  <div class="form-group">
    <label for="idUva" class="col-sm-4 control-label">Id UVA</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="idUva" placeholder="44949" name="idUva">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-10">
      <button type="submit" class="btn btn-default">Sign up</button>
    </div>
  </div>
</form>
<?php 
}
include 'footer.php'; ?>
