<?php
include "openconn.php";
session_start();

$order_id = $_POST['id_encomenda'];
$userid = $_SESSION['userid'];

$update_order_status = "UPDATE order_info SET status = 'delivery completed' where order_id='$order_id'";
$update = mysqli_query($conn, $update_order_status);
if($update):
    echo "encomenda aceite com sucesso mudando o estado de encomenda para aprovado.";
    header( "refresh:10; url= ../php/t_order.php");
else:
    echo "erro ocorreu operação não teve sucesso";

endif;

?>