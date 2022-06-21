<?php
include "openconn.php";
session_start();

$p_id = htmlspecialchars($_POST["product_id"]);

$delete_product = "DELETE FROM product_info WHERE product_id = '$p_id'";
$res1 = mysqli_query ($conn, $delete_product);

if($res1){
    echo ("Product deleted sucessfully.");
    header("refresh:5; url=../php/sProduct.php");
}else{
    echo "não foi possivel apagar o produto devido a um erro";
    header("refresh:5; url=sProduct.php");
}

?>