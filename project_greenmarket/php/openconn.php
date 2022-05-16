<?php
echo "a iniciar ligação à bd<br>";
/*
$dbhost = "sql212.epizy.com";
$dbuser = "epiz_31612828";
$dbpass = "aa4ulaYtRDKpoG";
$dbname = "34.175.213.0 ";
 */
$dbhost = "localhost";
$dbhost2 = "34.175.213.0";
$dbname = "greenmarket_database";
$dbuser = "ptiptr17";
$dbpass = "ptiptr202217";

echo "a tentar conexão<br>";

// Cria a ligação à BD

//$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Verifica a ligação à BD
//if (mysqli_connect_error()) {
//      echo "connection failed<br>";
//die("Database connection failed: " . mysqli_connect_error());
//
//}
//echo "<p> connection worked!</p>";

//$conn = mysqli_connect(null, $dbuser, $dbpass, $dbname, null, "ptiptr17greenmarket:europe-southwest1:greenmarketsql");
// Verifica a ligação à BD
//if($conn != null) {
//      print("Connected! :*");
//} else {
//      print("Can't connect! :(");
//}

//try{
//$conn = new PDO("mysql:host=".$dbhost."; dbname=". $dbname, $dbuser, $dbpass);
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//}catch (PDOException $e){
//      echo 'Database connection error:' . $e->getMessage();
//}
//
//if($conn){
//    echo "<br>connection worked.";
//}


$username = 'ptiptr17';
$password = 'ptiptr202217';
$dbName = 'greenmarket_database';
$connectionName = getenv("ptiptr17greenmarket:europe-southwest1:greenmarketsql");
$socketDir = getenv('DB_SOCKET_DIR') ?: '/cloudsql';

// Connect using UNIX sockets
$dsn = sprintf(
    'mysql:dbname=%s;unix_socket=%s/%s',
    $dbName,
    $socketDir,
    $connectionName
);

// Connect to the database.
$conn = new PDO($dsn, $username, $password, $conn_config);

if($conn != null) {
        print("Connected! :*");
} else {
        print("Can't connect! :(");
}


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