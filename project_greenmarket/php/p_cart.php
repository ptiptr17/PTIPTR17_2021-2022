<?php
include "openconn.php";
session_start();

$product_id = $_POST['id_produto'];
$product_name = $_POST['nome_produto'];
$preco = $_POST['preco_produto'];
$userid = $_SESSION['userid'];


// Inserir para a tabela
$insert_cart = "insert into cart_item(consumer_id, product_id, product_name, price) values('$userid', '$product_id', '$product_name', '$preco')";

$res= mysqli_query ($conn, $insert_cart);
if($res){
    echo "produto adicionado ao carrinho com sucesso<br>";
    header( "refresh:10; url= ../php/cart.php");
} else {
    echo "Erro: insert failed" . $query . "<br>" . mysqli_error($conn);
    header( "refresh:10; url=../php/products.php" );
}
// Termina a ligacao com a base de dados
mysqli_close($conn);

?>