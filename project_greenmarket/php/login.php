<?php 

require_once 'openconn.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$username = $_POST["uname"];
$pwd = $_POST["psw"];
$accountT = $_POST["accountType"];

$queryuser = mysqli_query($conn, "select * from userinfo where username='" . $username . "' and password='" . $pwd . "' and accountType='" . $accountT . "'");
print_r($querytrans);
if (mysqli_num_rows($queryuser) == 1) {
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $username;
    if $accountT = "Transportadora"{
        header("location: transportadora.html");
        exit();
    } elseif $accountT = "Vendedor"{
        header("location: vendedor.html");
        exit();
    }else{
        header("location: user.html");
        exit();
    }

} else {
    header("location: login.php");
}

mysqli_close($conn);
?>