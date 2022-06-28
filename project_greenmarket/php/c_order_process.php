<?php
include "openconn.php";
session_start();


$product_id = $_POST['id_produto'];
$product_name = $_POST['nome_produto'];
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

//ir buscar o w_id do produto em questão
$product = "SELECT * FROM product_info where product_id = '$product_id'";
$quer1 = mysqli_query ($conn, $product);
if(mysqli_num_rows($quer1) == 1){

    $row = mysqli_fetch_array($quer1);
    echo $row['w_id'];
    $ware_id = $row['w_id'];
    $supplier_id = $row['s_id'];
    $price = $row['price'];
}

//ir buscar o codigo postal do warehouse cujo id igual ao w_id
$warehouse = "SELECT * FROM warehouse_info where warehouse_id = '$ware_id'";
$quer2 = mysqli_query ($conn, $warehouse);
if(mysqli_num_rows($quer2) == 1){

    $row2 = mysqli_fetch_array($quer2);
    //echo $row2['postal_code'];
    $w_postalcode = $row2['postal_code'];
    echo "<br>o codigo postal origem: ".$w_postalcode."<br>";
}

//ir buscar codigo postal do consumidor
$consumer = "SELECT * FROM user_address where user_id = '$userid'";
$quer3 = mysqli_query ($conn, $consumer);
if(mysqli_num_rows($quer3) == 1){

    $row3 = mysqli_fetch_array($quer3);
    echo $row3['postal_code'];
    $c_postalcode = $row3['postal_code'];
}

$data =  date("Y-m-d H:i:s");
$dataFinal = date('Y-m-d H:i:s', strtotime($data. ' + 7 days'));

// Inserir para a tabela

$delete_product = "DELETE FROM cart_item WHERE product_id = '$product_id'";
$res1 = mysqli_query ($conn, $delete_product);

if($res1){
    echo ("Product removed sucessfully from cart.");
}else{
    echo "não foi possivel remover o produto do carrino devido a um erro";
}


$insert_order = "insert into order_info(product_id, consumer_id, consumer_name, supplier_id, product_name, postalcode_origin, postalcode_destin, price,  creation_date, cancelation_date) values('$product_id', '$userid', '$username', '$supplier_id', '$product_name', '$w_postalcode', '$c_postalcode', '$price', '$data', '$dataFinal')";

$res= mysqli_query ($conn, $insert_order);
if($res){
    echo "Novo encomenda criada com sucesso<br>";
    header( "refresh:10; url= ../php/c_orders.php");
} else {
    echo "Erro: insert failed" . $query . "<br>" . mysqli_error($conn);
    header( "refresh:10; url=../php/cart.php" );
}
// Termina a ligacao com a base de dados
mysqli_close($conn);

?>
