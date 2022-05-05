<?php 

require_once 'openconn.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$username = $_GET["uname"];
$pwd = $_GET["psw"];
$accountT = $_GET["accountType"];

$queryu = mysqli_query($conn, "select * from userinfo where username='" . $username . "' and password='" . $pwd . "'");

if (mysqli_num_rows($queryu) == 1) {
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $username;
    header("location: welcome.html");
    exit();
}
} else {
    header("location: login.html");
}

mysqli_close($conn);

?>