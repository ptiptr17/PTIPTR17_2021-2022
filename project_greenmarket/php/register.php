<?php
include "openconn.php";
session_start();

$email_user = htmlspecialchars($_POST['e-mail_user']);
$nome_user = htmlspecialchars($_POST['name_user']);
$pass_user = htmlspecialchars($_POST['psw_user']);
$repass_user = htmlspecialchars($POST['psw-repeat']);

if($pass_user == $repass_user){
    echo "password correta.";
}

//encriptaчуo da password para garantir confidencialidade
$password = password_hash($pass_repr, PASSWORD_BCRYPT);

// Inserir para a tabela
$insert_user = "insert into customer_login(username, password, email) values('$nome_user','$pass_user','$email_user')";

$res2= mysqli_query ($conn, $insert_user);
if($res2){
    echo "Novo utilizador criado com sucesso";
    header( "refresh:10; url=../html/welcome.html");
} else {
    echo "Erro: insert failed" . $query . "<br>" . mysqli_error($conn);
    header( "refresh:10; url=../html/welcome.html" );
}
// Termina a ligaчуo com a base de dados
mysqli_close($conn);

// $_SESSION['username'] = $nome_repr;

// Welcome message
//$_SESSION['success'] = "You have logged in";

// Page on which the user will be
// redirected after logging in
//header('location: home.php');

?>