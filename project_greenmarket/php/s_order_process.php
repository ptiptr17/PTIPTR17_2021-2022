<?php
include "openconn.php";
session_start();


$transporter_id = $_POST['id_transportador'];
$transporter_name = $_POST['nome_transportador'];
$order_id = $_POST['id_encomenda'];
$userid = $_SESSION['userid'];

/*
$order = "SELECT * FROM order_info where transporter_id = '$transporter_id'";
$oquery = mysqli_query ($conn, $order);
if(mysqli_num_rows($oquery) == 1){
    
    $row = mysqli_fetch_array($oquery);
    echo "order_id: ".$row['order_id'];
    $order_id = $row['order_id'];
}
*/

$addtransporter = "UPDATE order_info SET transporter_id = '$transporter_id',  transporter_name = '$transporter_name' WHERE order_id = '$order_id'";
$addt = mysqli_query($conn , $addtransporter);
if($addt){
    echo "transportador inserido com sucesso<br>";
    header("refresh:10; url= ../php/s_order.php");
} else {
    echo "Erro: insert failed" . $query . "<br>" . mysqli_error($conn);
    header( "refresh:10; url=../php/s_order.php" );
}
// Termina a ligacao com a base de dados
mysqli_close($conn);

?>