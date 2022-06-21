<?php
include "openconn.php";
session_start();

$productname_novo = htmlspecialchars($_POST["productname_novo"]);
$categoria_novo = htmlspecialchars($_POST["categoria_novo"]);
$categoria2_novo = htmlspecialchars($_POST["categoria2_novo"]);
$preco_novo = htmlspecialchars($_POST["preco_novo"]);
$dataprod_novo = htmlspecialchars($_POST["dataprod_novo"]);
$armazem_novo = htmlspecialchars($_POST["armazem_novo"]);
$gastos_novo = htmlspecialchars($_POST["gastos_novo"]);
$eletricidade_nova = htmlspecialchars($_POST["eletricidade_novo"]);
$agua_nova = htmlspecialchars($_POST["agua_nova"]);
$poluicao_nova = htmlspecialchars($_POST["poluicao_nova"]);
$validade_nova = htmlspecialchars($_POST["validade_nova"]);
$descricao_nova = htmlspecialchars($_POST["descricao_nova"]);
$imagem_nova = htmlspecialchars($_POST["imagem_nova"]);


$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];

$queryw = "SELECT * FROM warehouse_info WHERE warehouse_name='$armazem_novo'";
$resw = mysqli_query($conn, $queryw);
if(mysqli_num_rows($resw) == 1){

    $roww = mysqli_fetch_array($resw);
    echo"<li><h4>warehouse_id correspondente ao armazém".$armazem_novo.":</h3>";
    echo "<li>".$roww['warehouse_id'];
    $id_armazem = $roww['warehouse_id'];
}else{
    echo "armazém com esse nome não existe.";
}

echo "<br>username".$username;
$userid = $_SESSION['user_id'];
echo "<br>userid".$userid;

if( $productname_novo === ""  || $categoria_novo === "" || $preco_novo === "" || $dataprod_novo ==="" || $gastos_novo === "" || $poluicao_nova === "" || $validade_nova === "" || $descricao_nova === "" || $imagem_nova === ""){
    echo ("Foram inseridos dados invalidos");
    header( "refresh:5; url=sProduct.php" );

}else{
    $create_product = "INSERT INTO product_info(product_name, one_category, two_category, price, production_date, w_id, s_id, resource_cast, pollution_caused, eletricity_cast, water_cast, shelf_life, descript, picture) values('$productname_novo', '$categoria_novo', '$categoria2_novo', '$preco_novo', '$dataprod_novo', '$id_armazem', '$userid', $gastos_novo, '$poluicao_nova', '$eletricidade_nova', '$agua_nova', '$validade_nova', '$descricao_nova', '$imagem_nova')";
    $res1 = mysqli_query ($conn, $create_product);

    if($res1){
        echo ("Novo produto adicionado com sucesso");
        header("refresh:5; url=supplierProducts.php");
    } else {
            echo ("erro na adição de novo produto.");
            $_SESSION["statusp"] = "produto nao adicionado, ocorrencia de falha.";
            $_SESSION["statusCode"] = "error";
            header("refresh:5; url=supplierProducts.php");
    }
}

mysqli_close($conn);
   
?>