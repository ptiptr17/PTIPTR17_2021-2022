<?php
include "openconn.php";
session_start();

$w_id = htmlspecialchars($_POST["warehouse_id"]);

$delete_warehouse = "DELETE FROM warehouse_info WHERE warehouse_id = '$w_id'";
$res1 = mysqli_query ($conn, $delete_warehouse);

if($res1){
    echo ("O Armazém foi removido com sucesso.");
    header("refresh:5; url=../html/sellerWarehouses.php");
}else{
    echo "Não foi possivel apagar o armazém devido a um erro";
    header("refresh:5; url=../html/sellerWarehouses.php");
}

?>