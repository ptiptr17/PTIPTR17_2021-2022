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
//$accountT = $_POST["accountType"];

echo "prints de dados do user<br>";
echo "username: ";
echo $username;
echo "<br>password: ";
echo $pwd;

$query = "SELECT * FROM user_info WHERE username='$username' AND password='$pwd'";

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
	$row = mysqli_fetch_array($queryu);
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $username;
	$_SESSION["usertype"] = $row["accountType"];
	$_SESSION["userid"] = $row["user_id"];
	$usertype = $_SESSION['usertype'];
    echo "<br>login efetuado com sucesso";
	echo "<br>username:".$_SESSION["username"];
	echo "<br>usertype:".$_SESSION["usertype"];
	if($usertype === 'admin'){
<<<<<<< Updated upstream
		header("refresh:5;*/ url= ../php/admin.php");
=======
		header("refresh:5; url= ../php/admin.php");
>>>>>>> Stashed changes
	}
	else{
    	header("refresh:5; url= ../php/homepage.php");
	}
} else {
	echo "<br>authentication failed";
    header("refresh:5; url= ../html/login.html");
}

//mysqli_close($conn);

?>