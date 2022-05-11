<?php

echo "inicio do processo login";
/*require_once 'openconn.php';*/
include 'openconn.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$username = $_POST["uname"];
$pwd = $_POST["psw"];
$accountT = $_POST["accountType"];

echo "prints de dados do user";
echo $username;
echo $pwd;

$queryu = mysqli_query($conn, "select * from customer_login where username='" . $username . "' and password='" . $pwd . "'");

if (mysqli_num_rows($queryu) == 1) {
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $username;
    header("refresh:30; url= ../html/homepage.html");
    exit()
} else {
    header("refresh:30; url= ../html/login.html");
}

mysqli_close($conn);

?>