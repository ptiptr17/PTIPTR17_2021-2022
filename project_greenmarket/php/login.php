<?php

echo "inicio do processo login";

/*require_once 'openconn.php';*/
include "openconn.php";
session_start();

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
echo "password: ";
echo $pwd;

$query = "SELECT * FROM customer_login WHERE username='$username' AND password='$pwd'";
$queryu = mysqli_query($conn, $query);

if (mysqli_num_rows($queryu) == 1) {
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $username;
    echo "login efetuado com sucesso";
    header("refresh:15; url= ../html/homepage.html");
} else {
    header("refresh:15; url= ../html/login.html");
}

//mysqli_close($conn);

?>