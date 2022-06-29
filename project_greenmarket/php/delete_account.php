<?php
include "openconn.php";
session_start();

$user_id = $_SESSION['userid'];
$password = htmlspecialchars($_POST["password"]);

$delete_user = "DELETE FROM user_info WHERE password = '$password'";
$res1 = mysqli_query ($conn, $delete_user);

$delete_products = "DELETE FROM product_info WHERE s_id = '$user_id'";
$res2 = mysqli_query ($conn, $delete_products);

$delete_warehouses = "DELETE FROM warehouse_info WHERE supplier_id = '$user_id'";
$res3 = mysqli_query ($conn, $delete_warehouses);

$delete_vehicles = "DELETE FROM vehicle_info WHERE transporter_id = '$user_id'";
$res4 = mysqli_query ($conn, $delete_vehicles);

$delete_cart = "DELETE FROM cart_item WHERE consumer_id = '$user_id'";
$res5 = mysqli_query ($conn, $delete_cart);

$delete_order = "DELETE FROM order_info WHERE consumer_id = '$user_id' and status != 'delivery completed'";
$res6 = mysqli_query ($conn, $delete_order);


if($res1 && $res2 && $res3 && $res4 && $res5 && $res6){
    session_destroy();
    echo ("Conta apagada com sucesso.");
    header("refresh:5; url=../html/welcome.html");
}else{
    echo "não foi possivel apagar a sua conta devido a um erro";
    header("refresh:5; url=profile.php");
}

?>