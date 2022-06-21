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
$eletricidade_novo = htmlspecialchars($_POST["eletricidade_novo"]);
$agua_nova = htmlspecialchars($_POST["agua_nova"]);
$poluicao_nova = htmlspecialchars($_POST["poluicao_nova"]);
$validade_nova = htmlspecialchars($_POST["validade_nova"]);
$descricao_nova = htmlspecialchars($_POST["descricao_nova"]);
$imagem_nova = htmlspecialchars($_POST["imagem_nova"]);



$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];

echo "<br>username".$username;
$userid = $_SESSION['user_id'];
echo "<br>userid".$userid;

if( $productname_novo === ""  || $categoria_novo === "" || $preco_novo === "" || $dataprod_novo ==="" || $gastos_novo === "" || $poluicao_nova === "" || $validade_nova === "" || $descricao_nova === "" || $imagem_nova === ""){
    echo ("Foram inseridos dados invalidos");
    header( "refresh:5; url=sProduct.php" );
}else{
    //change from here.
    $create_product = "INSERT product_info SET username = '$username_novo', name = '$nome', email = '$email', phone = '$phone' WHERE username = '$username'";
    $res1 = mysqli_query ($conn, $update_user);

    $update_user_address = "UPDATE user_address SET postal_code = '$codigo_postal', city = '$cidade', district = '$distrito', address = '$morada' WHERE user_id = '$userid'";
    $res2 = mysqli_query ($conn, $update_user_address);

    if($res1 && $res2){
        echo ("Dados mudados com sucesso");
            $_SESSION['user_id'] = $user_id;
            $_SESSION["username"] = $username_novo;
            $_SESSION["nome"] = $nome;
            $_SESSION["email"] = $email;
            header("refresh:5; url=profile.php");
    } else {
            echo ("session name not found");
            $_SESSION["status"] = "conta com sessao iniciada nao encontrada";
            $_SESSION["statusCode"] = "error";
            header("refresh:5; url=profile.php");
    }
}


mysqli_close($conn);
   
?>