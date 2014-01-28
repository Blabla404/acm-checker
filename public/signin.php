<?php
include('header.php');
include_once('connectdb.php');

require('lib/password.php');

if(isset($_POST['pseudo']) AND isset($_POST['pass'])){
  $req = $bdd->prepare('SELECT id, pseudo, password FROM user WHERE pseudo = ?');
  $req->execute(array($_POST['pseudo']));
  $res = $req->fetch();
  if($res AND password_verify($_POST['pass'], $res['password'])){
    $_SESSION['id'] = $res['id'];
    $_SESSION['pseudo'] = $res['pseudo'];
    header('Location: index.php'); 
  }
}
?>

<form class="form-horizontal" role="form" action="signin.php" method="post">
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
    <div class="col-sm-offset-4 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>
<?php include 'footer.php'; ?>
