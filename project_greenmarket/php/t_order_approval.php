<?php
//por completar
include "openconn.php";
session_start();

$order_id = $_POST['id_encomenda'];
$userid = $_SESSION['userid'];

if($_POST['encomenda'] = 'Aceitar encomenda'){
    $update_order_status = "UPDATE order_info SET status = 'approved' where order_id='$order_id'";
    $update = mysqli_query($conn, $update_order_status);
    if($update):
        echo "encomenda aceite com sucesso mudando o estado de encomenda para aprovado.";
        header( "refresh:10; url= ../php/t_orders.php");
    endif;
}elseif($_POST['encomenda'] = 'Não aceitar encomenda'){
    $delete_transporter = "UPDATE order_info SET transporter_id = NULL, transporter_name = NULL WHERE order_id='$order_id'";
    $delete = mysqli_query($conn, $delete_transporter);
    if($delete):
        echo "encomenda recusada com sucesso, encomenda por aprovar.";
        header( "refresh:10; url= ../php/t_orders.php");
    endif;
}

?>