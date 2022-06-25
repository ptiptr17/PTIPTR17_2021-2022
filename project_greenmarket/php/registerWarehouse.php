<?php
include "openconn.php";
session_start();

echo $_POST['name_warehouse'];
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$phone_warehouse = $_POST['phone_warehouse'];
$nome_warehouse = $_POST['name_warehouse'];
$email_warehouse = $_POST['email_warehouse'];
$city_warehouse = $_POST['city_warehouse'];
$district_warehouse = $_POST['district_warehouse'];
$address_warehouse = $_POST['address_warehouse'];

echo "as variaveis guardadas<br>";
echo $phone_warehouse;
echo "<br>";
echo $nome_warehouse;
echo "<br>";
echo $email_warehouse;
echo "<br>";
echo $city_warehouse;
echo "<br>";
echo $district_warehouse;
echo "<br>";
echo $address_warehouse;
echo "<br>";
echo"end variaveis";

$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];

// Inserir para a tabela
$insert_warehouse = "insert into warehouse_info(supplier_id, warehouse_name, warehouse_phone, email, city, district, address) values('$userid','$nome_warehouse','$phone_warehouse','$email_warehouse', '$city_warehouse', '$district_warehouse', '$address_warehouse')";

$res2= mysqli_query ($conn, $insert_warehouse);
if($res2){
    echo "Novo armazém criado com sucesso<br>";
    header( "refresh:10; url= ../php/sellerWarehouse.php");
} else {
    echo "Erro: insert failed" . $query . "<br>" . mysqli_error($conn);
    header( "refresh:10; url=../php/sellerWarehouse.php" );
}
// Termina a ligacao com a base de dados
mysqli_close($conn);

// $_SESSION['username'] = $nome_repr;

// Welcome message
//$_SESSION['success'] = "You have logged in";

// Page on which the user will be
// redirected after logging in
//header('location: home.php');

?>