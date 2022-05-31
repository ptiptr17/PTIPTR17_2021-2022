<?php
include "openconn.php";
session_start();

$username_novo = htmlspecialchars($_POST["uname_novo"]);
$nome = htmlspecialchars($_POST["nome_novo"]);
$email = htmlspecialchars($_POST["email_novo"]);
$phone = htmlspecialchars($_POST["phone_novo"]);
$codigo_postal = htmlspecialchars($_POST["codPostal_novo"]);
$cidade = htmlspecialchars($_POST["cidade_novo"]);
$distrito = htmlspecialchars($_POST["distrito_novo"]);
$morada = htmlspecialchars($_POST["morada_nova"]);


$username = $_SESSION['username'];
echo "<br>username".$username;
$userid = $_SESSION['user_id'];
echo "<br>userid".$userid;

if( $username_novo === ""  || $nome === "" || $email === "" || $phone ==="" || $codigo_postal === "" || $cidade === "" || $distrito === "" || $morada === "" ){
    echo ("Foram inseridos dados invalidos");
    header( "refresh:5; url=profile.php" );
}else{
    $update_user = "UPDATE user_info SET username = '$username_novo', name = '$nome', email = '$email', phone = '$phone' WHERE username = '$username'";
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