<?php
include "openconn.php";
session_start();

$password = htmlspecialchars($_POST["password"]);

$delete_user = "DELETE FROM user_info WHERE password = '$password'";
$res1 = mysqli_query ($conn, $delete_user);

$delete_products = "";

$delete_warehouses = "";

$delete_vehicles = "";

$delete_cart = "";

if($res1){
    session_destroy();
    echo ("Conta apagada com sucesso.");
    header("refresh:5; url=../html/welcome.html");
}else{
    echo "não foi possivel apagar a sua conta devido a um erro";
    header("refresh:5; url=profile.php");
}

?>