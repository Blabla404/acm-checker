<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css" />
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="icon" href="favicon.png" />
    <title>ACM-2014</title>

  </head>

  <body>
    <?php include_once("analyticstracking.php") ?>

    <nav class="navbar navbar-default" role="navigation">
      <ul class="nav navbar-nav">
	<li> <a class="navbar-brand" href=".">ACM-2014</a> </li>
	<li> <a href="td.php">TD</a> </li>
	<li> <a href="scoreboard.php">Scoreboard</a> </li>
	<li> <a href="cours.php">Cours</a> </li>
	<li class="dropdown">
	  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Liens <b class="caret"></b></a>
	  <ul class="dropdown-menu">
            <li><a href="https://docs.google.com/spreadsheet/ccc?key=0ApMTqWB_E_MxdHZmUWZOeTVIeVoySGFOYUFxTHVJNVE&usp=sharing">Google Doc</a></li>
            <li><a href="https://drive.google.com/folderview?id=0B5MTqWB_E_MxZktYZmJjTFl0LWs&usp=sharing">Testcases</a></li>
            <li class="divider"></li>
            <li><a href="lien.php">Sites utiles</a></li>
	  </ul>
	</li>
      </ul>

      <div class="navbar-right">
	<?php if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){ ?>
	<a href="me.php" class="navbar-link"><?php echo htmlspecialchars($_SESSION['pseudo']); ?></a>
	<a href="logout.php"><button type="button" class="btn btn-default navbar-btn">Logout</button></a>
	<?php } else{?>
	<a href="signin.php"><button type="button" class="btn btn-default navbar-btn">Sign in</button></a>
	<a href="signup.php"><button type="button" class="btn btn-default navbar-btn">Sign up</button></a>
	<?php } ?>
      </div>
    </nav>
