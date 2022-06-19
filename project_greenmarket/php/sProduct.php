<?php
include "openconn.php";
session_start();
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>GreenMarket</title>
        <link rel="icon" href="imagens/icon.png"/>
        <link rel="stylesheet" type="text/css" href="../html/css/homepage.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type= "text/javascript" src = "../js/homepage.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    </head>
    <body>
        <header class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <a href="../php/homepage.php"><img src="../html/imagens/logo.png" width="400px"></a>
                    </div>
                    <div class="search">
                        <input type="text" placeholder="Procurar..">
                    </div>

                    <?php if(isset($_SESSION['username'])):  ?>
                    <nav>
                        <ul>
                          <li><a href="../html/products.html"> Produtos </a></li>
                          <li><a href="logout.php"> Terminar a sessão </a></li>
                          <li><a href="profile.php"> <?php echo $_SESSION["username"]."profile";?> </a></li>
                        </ul>
                    </nav>
                    <?php else:?>
                        <nav>
                            <ul>
                            <li><a href="../html/products.html"> Produtos</a></li>
                            <li><a href="../html/login.html"> Iniciar Sessão</a></li>
                            <li><a href="../html/register.html"> Criar Conta</a></li>
                            </ul>
                        </nav>
                    <?php endif; ?>
                    <a href="cartView.html" aria-label="0 items in cart" class="nav-a nav-a-2 nav-progressive-attribute" id="nav-cart">
                    <div id="nav-cart-count-container">
                        <span id="nav-cart-count" aria-hidden="true" class="nav-cart-count nav-cart-0 nav-progressive-attribute nav-progressive-content">0</span>
                        <i class="fa fa-shopping-cart" style="font-size:24px"></i>
                    </div>
                    <div id="nav-cart-text-container" class=" nav-progressive-attribute">
                        <span aria-hidden="true" class="nav-line-1">
                        </span>
                        <span aria-hidden="true" class="nav-line-2">
                        Carrinho
                        <span class="nav-icon nav-arrow"></span>
                        </span>
                    </div>
                    </a>
                </div>
                <hr>
            </div>
        </header>
        <br>
        <h1> Produtos de <?php echo $_SESSION['username']; ?>, <?php echo  $_SESSION["usertype"];?></h1>
        <br>
        <br>
        <h2> Os teus produtos: </h2>

        <?php
        $username = $_SESSION['username'];
        $userid = $_SESSION['userid'];
        $query = "SELECT * FROM product_info WHERE S_id='$userid'";
        $res = mysqli_query($conn, $query);

        if(mysqli_num_rows($res) > 0){

            $row = mysqli_fetch_array($res);

            echo"<ul>";
            echo "<h2> dados relativos aos teus produtos: </h3>";
            echo "<br>";
                echo"<li><h3>:</h3>";
                echo "<li>".$row['accountType'];
                echo"<li><h3>user_id:</h3>";
                echo "<li>".$row['user_id'];
                echo"<li><h3>username:</h3>";
                echo "<li>".$row['username'];
                echo "<li><h3>name:</h3>";
                echo "<li>".$row['name'];
                echo"<li><h3>email:</h3>";
                echo "<li>".$row['email'];
                echo"<li><h3>phone number:</h3>";
                echo "<li>".$row['phone'];

        }else{
            echo "<br>Nao tem produtos seus neste momento.";
        }

        ?>

    <h2 class="text-right">Registar novo produto:</h2>
        </div>
        <form action="register_product.php" method="post">
            <div class="row mt-3">
                <div class="col-md-12">
                    <label class="labels">username</label>
                    <input type="text"  placeholder="UNome" name="uname_novo" value="<?php echo $username?>">
                </div>
                <div class="col-md-12">
                    <label class="labels">name</label>
                    <input type="text"  placeholder="Nome" name="nome_novo" value="<?php echo $nome?>">
                </div>
                <div class="col-md-12">
                    <label class="labels">Email</label>
                    <input type="text"  placeholder="Email" name="email_novo" value="<?php echo $email?>">
                </div>
                <div class="col-md-12">
                    <label class="labels">Phone number</label>
                    <input type="text"  placeholder="Phone" name="phone_novo" value="<?php echo $phone?>">
                </div>
                <div class="col-md-12">
                    <label class="labels">Código Postal</label>
                    <input type="text"  placeholder="Código Postal" name="codPostal_novo" value="<?php echo $postalcode?>">
                </div>
                <div class="col-md-12">
                    <label class="labels">Cidade</label>
                    <input type="text"  placeholder="Cidade" name="cidade_novo" value="<?php echo $city?>">
                </div>
                <div class="col-md-12">
                    <label class="labels">Distrito</label>
                    <input type="text"  placeholder="Código Postal" name="distrito_novo" value="<?php echo $district?>">
                </div>
                <div class="col-md-12">
                    <label class="labels">Morada</label>
                    <input type="text"  placeholder="Morada" name="morada_nova" value="<?php echo $address?>">
                </div>
            </div>
            <div class="mt-3 text-center">
                <div class="col-md-4">
                    <input type="submit" value="Save Profile" name="edit_utilizador">
                </div>
            </div>
        </form>

    </body>
</html>