<!DOCTYPE html>
<html>
<body>
	<?php
	echo "<p>All work and no play makes jack a dull boy!</p>";*/
	$dbhost = "sql113.epizy.com";
	$dbuser = "epiz_31611966";
	$dbpass = "3c1ziqiwKc1hjCV";
	$dbname = "epiz_31611966_anewapptest";
	
	// Cria a ligação à BD
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	// Verifica a ligação à BD
	if (mysqli_connect_error()) {
	die("Database connection failed: " . mysqli_connect_error());
	}
	echo "<p> connection worked!</p>";
	?>
</body>
</html>