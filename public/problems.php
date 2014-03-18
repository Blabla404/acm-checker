<?php include 'header.php'; ?>
<?php include_once('connectdb.php'); ?>

<?php 
if(isset($_GET['id']) and file_exists('problems/' . $_GET['id'])) {

	if(isset($_SESSION['id']) AND isset($_SESSION['pseudo']) AND isset($_FILES['out']) AND isset($_FILES['source']) AND $_FILES['out']['error']==0 AND $_FILES['source']['error']==0 AND $_FILES['source']['size'] < 1048576){
		move_uploaded_file($_FILES['source']['tmp_name'],'soumissions/' . $_GET['id'] . '-' . $_SESSION['pseudo'] . date('-d-M-y-h-i') . '.cpp');
		
		if(sha1_file($_FILES['out']['tmp_name']) == sha1_file('problems/'. $_GET['id'] .'/testcase.res')) {
			$req = $bdd->prepare('SELECT id FROM problem WHERE title = ?');
			$req->execute(array($_GET['id']));
			$idProblem = $req->fetch();
			$idProblem = $idProblem[0];
			$bdd->exec('INSERT INTO submission VALUES("", '. $_SESSION['id'] . ', ' . $idProblem . ', NOW(), TRUE )');
		echo(	'<div class="alert alert-success">
				<strong>Congratulations</strong> problem solved!
				</div>');
		}
		else{
			echo(	'<div class="alert alert-danger">
					<strong>Failed</strong> try again!
					</div>');
		}
	}


	echo('<h1>' . $_GET['id'] . '</h1>');
	include('problems/' . $_GET['id'] . '/statement.html');
	echo('<h2>Input</h2>');
	echo('<pre><code>');
	include('problems/' . $_GET['id'] . '/exemple.in');
	echo('</pre></code>');
	echo('<p><a href="problems/'. $_GET['id'] .'/exemple.in" download="problems/' . $_GET['id']. '/exemple.in" target = "_blank">Télécharger l\'entrée</a></p>');
	echo('<h2>Output</h2>');
	echo('<pre><code>');
	include('problems/' . $_GET['id'] . '/exemple.res');
	echo('</pre></code>');
	echo('<p><a href="problems/'. $_GET['id'] .'/exemple.res" download="problems/' . $_GET['id']. '/exemple.res" target = "_blank">Télécharger la sortie</a></p>');


	if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
	echo('<p><a href="problems/'. $_GET['id'] .'/testcase.in" download="problems/' . $_GET['id']. '/testcase.in" target = "_blank">Télécharger le jeu de données</a></p>');

	echo('<form role="form" action="problems.php?id=' . $_GET['id'] . '" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label for="out">Résultat:</label>
      	<input type="file" id="out" name="out" required/>
      	</div>

      	<div class="form-group">
        <label for="source">Code source:</label>
      	<input type="file" id="source" name="source" required/>
      	</div>
		<button type="submit" class="btn btn-default">Soumettre</button>
      </form>');

	} else{
		echo(	'<div class="alert alert-info">
				<p>Il faut être logué pour pouvoir envoyer une soumission.</p>
				</div>');
	}

}
else{
	header('Location: .');
}
?>
<?php include 'footer.php'; ?>