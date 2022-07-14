<?php
include "openconn.php";
session_start();

$p_id = htmlspecialchars($_POST["id_produto"]);

$delete_product = "DELETE FROM cart_item WHERE product_id = '$p_id'";
$res1 = mysqli_query ($conn, $delete_product);

if($res1){
    echo ("Product removed sucessfully from cart.");
    header("location:../php/cart.php");
}else{
    echo "não foi possivel remover o produto do carrino devido a um erro";
    header("refresh:5; url=cart.php");
}

?>
