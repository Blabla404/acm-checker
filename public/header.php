<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="lib/css/bootstrap.css" />
    <link rel="stylesheet" href="lib/css/bootstrap-theme.css" />
    <script src="lib/js/jquery.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <link rel="icon" href="favicon.png" />
    <title>ACM-2014</title>

    <style type="text/css">
     table.sourceCode, tr.sourceCode, td.lineNumbers, td.sourceCode {
       margin: 0; padding: 0; vertical-align: baseline; border: none; }
     table.sourceCode { width: 100%; line-height: 100%; }
     td.lineNumbers { text-align: right; padding-right: 4px; padding-left: 4px; color: #aaaaaa; border-right: 1px solid #aaaaaa; }
     td.sourceCode { padding-left: 5px; }
     code > span.kw { color: #007020; font-weight: bold; }
     code > span.dt { color: #902000; }
     code > span.dv { color: #40a070; }
     code > span.bn { color: #40a070; }
     code > span.fl { color: #40a070; }
     code > span.ch { color: #4070a0; }
     code > span.st { color: #4070a0; }
     code > span.co { color: #60a0b0; font-style: italic; }
     code > span.ot { color: #007020; }
     code > span.al { color: #ff0000; font-weight: bold; }
     code > span.fu { color: #06287e; }
     code > span.er { color: #ff0000; font-weight: bold; }
    </style>

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
            <li><a href="https://docs.google.com/spreadsheet/ccc?key=0ApMTqWB_E_MxdHZmUWZOeTVIeVoySGFOYUFxTHVJNVE&amp;usp=sharing">Google Doc</a></li>
            <li><a href="https://drive.google.com/folderview?id=0B5MTqWB_E_MxZktYZmJjTFl0LWs&amp;usp=sharing">Testcases</a></li>
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
