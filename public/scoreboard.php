<?php include 'header.php';

$homepage = file_get_contents('http://uhunt.felix-halim.net/api/subs-nums/339,32900/100,101,102/0');
echo(htmlspecialchars($homepage));


include 'footer.php'; ?>
