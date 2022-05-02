<?php

require_once 'openconn.php';

$field = $_GET["field"];

if (isset($_POST["submit"])) {
    if (strcmp($field, "vol") == 0) {
        $volname = $_POST["volname"];
        $voldata = date('Y-m-d', strtotime($_POST['voldata']));
        $volgenero = $_POST["volgenero"];
        $voldistrito = $_POST["voldistrito"];
        $volconcelho = $_POST["volconcelho"];
        $volfreguesia = $_POST["volfreguesia"];
        $volcc = $_POST["volcc"];
        $volcarta = $_POST["volcarta"];
        $voltelefone = $_POST["voltelefone"];
        $volemail = $_POST["volemail"];
        $volpassword = $_POST["volpassword"];

        $querycc = mysqli_query($conn, "select cc from voluntario where cc='" . $volcc . "'");
        $querymail = mysqli_query($conn, "select email from voluntario where email='" . $volemail . "'");

        if (mysqli_num_rows($querycc) != 0) {
            ?>
            <script>
            alert("O número de cartão de cidadão já se encontra registado.");
            </script>
            <?php
            header("location: ./registo.html");
        } elseif (mysqli_num_rows($queryemail) != 0) {
            echo "test2";
            ?>
            <script>
            alert("O email já se encontra registado.");
            </script>
            <?php
            header("location: ./registo.html");
        }

        $uploaddir = "fotografias/";

        $fileExtensionsAllowed = ['jpeg','jpg','png'];

        $nome = $_FILES["volfotografia"];
        $fileName = $_FILES["volfotografia"]["name"];
        $fileTmpName  = $_FILES["volfotografia"]["tmp_name"];
        $fileType = $_FILES["volfotografia"]["type"];
        $fileExtension = strtolower(end(explode(".",$fileName)));

        $uploadPath = $uploaddir . $fileName;

        if (! in_array($fileExtension,$fileExtensionsAllowed)) {
            die("A extensão do ficheiro não é aceitável.");
        }

        if ($_FILES["volfotografia"]["error"] !== UPLOAD_ERR_OK) {
            die("O upload falhou com o erro " . $_FILES["volfotografia"]["error"]);
        }

        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if (!$didUpload) {
            echo "Ocorreu um erro." . $_FILES["volfotografia"]["error"];
        }

        $PasswordEncriptada = password_hash($volpassword, PASSWORD_DEFAULT);
        $query = "insert into voluntario values ('" . $volname . "', '" . $voldata . "', '" . $volgenero . "', '" . $fileName . "', '" . $volfreguesia . "', '" . $volconcelho . "', '" . $voldistrito . "', '" . intval($voltelefone) . "', '" . intval($volcc) . "', '" . $volcarta . "', '" . $volemail  . "', '" . $PasswordEncriptada . "')";
        $res = mysqli_query($conn, $query);

        if ($res) {
            header("location: ./login.html");
            exit();
        } else {
            echo "Erro: insert failed " . $query . "<br>" . mysqli_error($conn);
        }

    } elseif (strcmp($field, "ins") == 0) {
        $insname = $_POST["insname"];
        $instelefone = $_POST["instelefone"];
        $insdistrito = $_POST["insdistrito"];
        $insconcelho = $_POST["insconcelho"];
        $insfreguesia = $_POST["insfreguesia"];
        $insmorada = $_POST["insmorada"];
        $insemail = $_POST["insemail"];
        $inswebsite = $_POST["inswebsite"];
        $insnomedorepresentante = $_POST["insnomedorepresentante"];
        $insemailrepresentante = $_POST["insemailrepresentante"];
        $inspassword = $_POST["inspassword"];
        $insdescricao = $_POST["insdescricao"];

        $querymail = mysqli_query($conn, "select Email from Instituicao where Email='" . $insemail . "'");

        if (mysqli_num_rows($queryemail) != 0) {
            ?>
            <script>
            alert("O email já se encontra registado.");
            </script>
            <?php
        }

        $PasswordEncriptada = password_hash($volpassword, PASSWORD_DEFAULT);
        $query = "insert into Instituicao values ('" . $insname . "', '" . intval($instelefone) . "', '" . $insdistrito . "', '" . $insconcelho . "', '" . $insfreguesia . "', '" . $insmorada . "', '" . $insemail . "', '" . $inswebsite . "', '" . $insnomedorepresentante . "', '" . $insemailrepresentante . "', '" . $PasswordEncriptada  . "', '" . $insdescricao . "')";
        $res = mysqli_query($conn, $query);

        if ($res) {
            header("location: ./login.html");
            exit();
        } else {
            echo "Erro: insert failed " . $query . "<br>" . mysqli_error($conn);
        }
    }
} else {
    header("location: ./registo.html");
}
?>