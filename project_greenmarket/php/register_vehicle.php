<?php
include "openconn.php";
session_start();

$vehicle_type_novo = htmlspecialchars($_POST["vehicle_type_novo"]);
$vehicle_name_novo = htmlspecialchars($_POST["vehicle_name_novo"]);
$plate_number_novo = htmlspecialchars($_POST["plate_number_novo"]);
$pollution_caused_nova = htmlspecialchars($_POST["pollution_caused_nova"]);
$descricao_nova = htmlspecialchars($_POST["descricao_nova"]);
$imagem_nova = htmlspecialchars($_POST["imagem_nova"]);

echo $vehicle_type_novo;
echo $vehicle_name_novo;
echo $plate_number_novo;
echo $pollution_caused_nova;
echo $descricao_nova;


$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];


echo "<br>username".$username;
$userid = $_SESSION['user_id'];
echo "<br>userid".$userid;


if( $vehicle_type_novo === "" || $plate_number_novo === "" || $pollution_caused_nova ==="" || $descricao_nova === "" ){
    echo ("Foram inseridos dados invalidos");
    header( "refresh:5; url=transporterVehicle.php" );
}else{
    $create_vehicle = "insert into vehicle_info(transporter_id, vehicle_type, vehicle_name, plate_number, pollution_caused, descript) values('$userid', '$vehicle_type_novo', '$vehicle_name_novo', '$plate_number_novo', '$pollution_caused_nova', '$descricao_nova')";
    $res1 = mysqli_query ($conn, $create_vehicle);

    if($res1){
        echo ("Novo veículo adicionado com sucesso.");
            header("refresh:5; url=transporterVehicles.php");
    } else {
            echo ("Erro ao criar um novo veículo.");
            header("refresh:5; url=transporterVehicles.php");
    }
}


mysqli_close($conn);
   
?>