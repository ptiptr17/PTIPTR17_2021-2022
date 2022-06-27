<?php
//por completar
include "openconn.php";
session_start();

$vehicle_name = $_POST['nome_veiculo'];
$delivery_date = $_POST['data_entrega'];
$order_id = $_POST['id_encomenda'];
$userid = $_SESSION['userid'];

$find_vehicle_id = "SELECT * FROM vehicle_info where vehicle_name = '$vehicle_name'";
$find_vehicle = mysqli_query($conn, $find_vehicle_id);
if(mysqli_num_rows($find_vehicle) > 0){
    echo "query efetuada com sucesso";
    $row = mysqli_fetch_array($find_vehicle);
    echo "target vehicle id";
    echo $row['vehicle_id'];
    $vehicle_id = $row['vehicle_id'];

}
$update_order = "UPDATE order_info SET status = 'ready for delivery', vehicle_id = '$vehicle_id', vehicle_name = '$vehicle_name', delivery_date = '$delivery_date', cancelation_date = NULL  where order_id='$order_id'";
$update = mysqli_query($conn, $update_order);
    if($update):
        echo "encomenda aceite com sucesso adicionando o veiculo para fazer encomenda e mudando o estado de encomenda para pronto para entrega.";
        header( "refresh:10; url= ../php/t_order.php");
    endif;

?>