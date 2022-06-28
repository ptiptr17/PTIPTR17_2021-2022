<?php
include "openconn.php";
session_start();

$v_id = htmlspecialchars($_POST["vehicle_id"]);

$delete_vehicle = "DELETE FROM vehicle_info WHERE vehicle_id = '$v_id'";
$res1 = mysqli_query ($conn, $delete_vehicle);

if($res1){
    echo ("O Veículo foi removido com sucesso.");
    header("refresh:5; url=../php/transporterVehicles.php");
}else{
    echo "Não foi possivel apagar o veículo devido a um erro";
    header("refresh:5; url=transporterVehicles.php");
}

?>