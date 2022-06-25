<?php
include "openconn.php";
session_start();


$product_id = $_POST['productid'];
$userid = $_SESSION['userid'];

$product = "SELECT * FROM product_info where product_id = '$product_id'";
//ir buscar o w_id do produto em questão

$warehouse = "SELECT * FROM warehouse_info where warehouse_id = '$ware_id'";
//ir buscar o codigo postal do warehouse cujo id igual ao w_id 

// Inserir para a tabela
$insert_user = "insert into order_info(product_id, consumer_id, postalcode_origin, postalcode_destin, creation_date, cancellation_date) values('$', '$', '$', '$', '$', '$')";

$res= mysqli_query ($conn, $insert_user);
if($res){
    echo "Novo encomenda criada com sucesso<br>";
    $_SESSION["username"] = $nome_user;
    $_SESSION["usertype"] = $user_type;
    header( "refresh:10; url= ../php/c_orders.php");
} else {
    echo "Erro: insert failed" . $query . "<br>" . mysqli_error($conn);
    header( "refresh:10; url=../php/products.php" );
}
// Termina a ligacao com a base de dados
mysqli_close($conn);

?>