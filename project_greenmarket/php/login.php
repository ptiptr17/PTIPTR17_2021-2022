<?php

session_start();

echo "inicio do processo login";

/*require_once 'openconn.php';*/
include "openconn.php";


/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 */

$username = $_POST["uname"];
$pwd = $_POST["psw"];
$accountT = $_POST["accountType"];

echo "prints de dados do user<br>";
echo "username: ";
echo $username;
echo "<br>password: ";
echo $pwd;

$query = "SELECT * FROM customer_login WHERE username='$username' AND password='$pwd'";

/*
$queryu = $conn->query($query);

$user = $queryu->fetchAll(PDO::FETCH_ASSOC);

if($user){
	foreach($user as $theuser){
		echo $theuser['username'].'<br>';
	}
}else{
	echo"<br>error in query";
}
*/
$queryu = mysqli_query($conn, $query);

//echo $queryu;

if (mysqli_num_rows($queryu) == 1) {
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $username;
    echo "<br>login efetuado com sucesso";
	echo "<br>a cookey do nome:".$_SESSION["username"];
    header("refresh:15; url= ../html/homepage.html");
} else {
	echo "<br>authentication failed";
    header("refresh:15; url= ../html/login.html");
}

//mysqli_close($conn);

?>