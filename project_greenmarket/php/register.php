<?php
include "openconn.php";
session_start();

echo $_POST['name_user'];
$email_user = $_POST['email_user'];
$nome_user = $_POST['name_user'];
$pass_user = $_POST['psw_user'];
$repass_user = $_POST['psw-repeat'];
$user_type = $_POST['type_user'];

echo "as variaveis guardadas<br>";
echo $email_user;
echo "<br>";
echo $nome_user;
echo "<br>";
echo $pass_user;
echo "<br>";
echo "user type:";
echo $user_type;
echo "<br>";
echo"end variaveis";

if($pass_user == $repass_user){
    echo "password correta.<br>";
}

//encriptacao da password para garantir confidencialidade
$password = password_hash($pass_repr, PASSWORD_BCRYPT);

// Inserir para a tabela
$insert_user = "insert into user_info(username, password, email, accountType) values('$nome_user','$pass_user','$email_user', '$user_type')";

$res2= mysqli_query ($conn, $insert_user);
if($res2){
    echo "Novo utilizador criado com sucesso<br>";
    $_SESSION["username"] = $nome_user;
    $_SESSION["usertype"] = $user_type;
    header( "refresh:10; url= ../php/completeRegister.php");
} else {
    echo "Erro: insert failed" . $query . "<br>" . mysqli_error($conn);
    header( "refresh:10; url=../html/register.html" );
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