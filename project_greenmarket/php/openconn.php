<?php
	echo "a iniciar ligação à bd";
	/*
	$dbhost = "sql212.epizy.com";
	$dbuser = "epiz_31612828";
	$dbpass = "aa4ulaYtRDKpoG";
	$dbname = "34.175.213.0 ";
	*/
	$dbhost = "34.175.213.0 ";
	$dbname = "greenmarket_database";
	$dbuser = "ptiptr17";
	$dbpass = "ptiptr202217";

	echo "a tentar conexão";
	// Cria a ligação à BD
	//$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	$conn = new PDO("mysql:host=".$dbhost."; dbname=". $dbname, $dbuser, $dbpass);

	// Verifica a ligação à BD
	if (mysqli_connect_error()) {
		echo "connection failed";
        die("Database connection failed: " . mysqli_connect_error());

	}
	echo "<p> connection worked!</p>";

	/*
	public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
	*/
?>
