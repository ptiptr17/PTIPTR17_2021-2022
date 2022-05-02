<?php
include "openconn.php";
session_start();

/* voluntario */
$nome_v = "";
$password_v = "";

/* instituicao*/
$nome_i = "";
$password_i ="";


    // Receiving the values entered and storing
    // in the variables
    $nome_v = $_POST["uname"];
    $password_v = $_POST["psw"];

    //$password_v = password_hash($password_v, PASSWORD_BCRYPT);

    // receber elementos da tabela
    $query = "SELECT * FROM costumer_login WHERE nome='$nome_v' AND password='$password_v'";
    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) == 1){
        $_SESSION['username'] = $nome_v;

        //mensagem de sucesso
        $_SESSION['success'] = "<br>You have logged in!";

        header('refresh:5; location: home.php');
    }
    elseif (mysqli_num_rows($result) == 0) {
        $query_admin = "SELECT * FROM Admin WHERE nome='$nome_v' AND password='$password_v'";
        $result_admin = mysqli_query($conn, $query_admin);

        if (mysqli_num_rows($result) == 1){

            $_SESSION["nome_admin"] = $nome_v;
            $_SESSION["admin"] = " bem vindo";

            header('location: administrador.php');
        }
        elseif (mysqli_num_rows($result) != 1) {
            $_SESSION['username'] = 'erro<br>';

            //mensagem de sucesso
            $_SESSION['success'] = "You have not logged in!";
        }

    }

    // redirecionamento
    header('location: home.php');



?>