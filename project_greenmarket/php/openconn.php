<?php
	echo "a iniciar ligação à bd";
	$dbhost = "sql212.epizy.com";
	$dbuser = "epiz_31612828";
	$dbpass = "aa4ulaYtRDKpoG";
	$dbname = "epiz_31612828_GreenMarket";


	// Cria a ligação à BD
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// Verifica a ligação à BD
	if (mysqli_connect_error()) {
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
