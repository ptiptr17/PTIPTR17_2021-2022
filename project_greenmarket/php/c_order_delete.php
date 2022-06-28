<?php
include "openconn.php";
session_start();

$o_id = htmlspecialchars($_POST["id_encomenda"]);

$delete_order = "DELETE FROM order_info WHERE order_id = '$o_id'";
$res1 = mysqli_query ($conn, $delete_order);

if($res1){
    echo ("Order removed sucessfully.");
    header("refresh:5; url=../php/c_orders.php");
}else{
    echo "não foi possivel cancelar encomenda devido a um erro";
    header("refresh:5; url=c_orders.php");
}

?>
