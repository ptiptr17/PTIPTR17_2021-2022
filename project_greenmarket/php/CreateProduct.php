<?php

require_once 'openconn.php';

$field = $_GET["field"];

if (isset($_POST["submit"])) {
    $pname = $_POST["pname"];
    $prodate = date('Y-m-d', strtotime($_POST['prodate']));
    $price = $_POST["price"];
    $category = $_POST["category"];
    $resourcewater = $_POST["resourcewater"];
    $resourceelec = $_POST["resourceelec"];
    $polut = $_POST["polut"];
    $expire = date('Y-m-d', strtotime($_POST['expire']));
    $desc = $_POST["desc"];

    $query = "insert into product_info values ('" . $pid . "','" . $pname . "', '" . $category . "', '" . $price . "', '" . $prodate . "', '" . $resourcewater . "', '" . $resourceelec . "', '" . $polut . "', '" . $expire . "', '" . $PasswordEncriptada . "')";
    $res = mysqli_query($conn, $query);

    /*$uploaddir = "fotografias/";

    $fileExtensionsAllowed = ['jpeg','jpg','png'];

    $nome = $_FILES["image"];
    $fileName = $_FILES["image"]["name"];
    $fileTmpName  = $_FILES["image"]["tmp_name"];
    $fileType = $_FILES["image"]["type"];
    $fileExtension = strtolower(end(explode(".",$fileName)));

    $uploadPath = $uploaddir . $fileName;

    if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        die("A extensão do ficheiro não é aceitável.");
    }

    if ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
        die("O upload falhou com o erro " . $_FILES["image"]["error"]);
    }

    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

    if (!$didUpload) {
        echo "Ocorreu um erro." . $_FILES["image"]["error"];
    }*/

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