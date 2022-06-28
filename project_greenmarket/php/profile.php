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
                          <li><a href="../php/products.php"> Produtos </a></li>
                          <li><a href="logout.php"> Terminar a sessão </a></li>
                          <li><a href="profile.php"> <?php echo $_SESSION["username"];?> </a></li>
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
                    <?php if($_SESSION['usertype'] == "consumer"):?>
                    <?php
                        $userid = $_SESSION['userid'];
                        $query = "SELECT * FROM cart_item WHERE consumer_id='$userid'";
                        $cnum = mysqli_query($conn, $query);
                        $numcitems = mysqli_num_rows($cnum);
                    ?>
                        <a href="../php/cart.php" aria-label="<?php echo $numcitems; ?> items in cart" class="nav-a nav-a-2 nav-progressive-attribute" id="nav-cart">
                        <div id="nav-cart-count-container">
                            <span id="nav-cart-count" aria-hidden="true" class="nav-cart-count nav-cart-0 nav-progressive-attribute nav-progressive-content"><?php echo $numcitems; ?></span>
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
                    <?php elseif($_SESSION['usertype'] == "transporter"): ?>
                        <a href="../php/t_order.php"> Encomendas </a>
                    <?php elseif($_SESSION['usertype'] == "supplier"): ?>
                        <a href="../php/s_order.php"> Encomendas </a>
                    <?php endif ?>
                </div>
                <hr>
            </div>
        </header>
        
        <br>
        <h1> Perfil de <?php echo $_SESSION['username']; ?>, <?php echo  $_SESSION["usertype"];?></h1>
        <br>
        <img src ='../html/imagens/default_user_icon.png' width ='180' height='120'/>
        <br>
        
        <?php
        if($_SESSION["usertype"] == "consumer"){
            echo "<h3><a href='../php/products.php'>Fazer compras</a></h3>";
            echo "<br><h3><a href='c_orders.php'>Ver encomendas</a></h3><br>";

        }elseif($_SESSION["usertype"] == "transporter"){
            echo "<br><h3><a href='transporterVehicles.php'>Os meus veiculos</a></h3><br>";
            echo "<br><h3><a href='t_order.php'>Ver encomendas</a></h3><br>";

        }elseif($_SESSION["usertype"] == "supplier"){
            echo "<br><h3><a href='supplierProducts.php'>Os meus produtos</a></h3><br>";
            echo "<br><h3><a href='sellerWarehouses.php'>Os meus armazéns</a></h3><br>";
            echo "<br><h3><a href='s_order.php'>Ver encomendas</a></h3><br>";
        }
        ?>

        <?php

        $username = $_SESSION['username'];
        $query = "SELECT * FROM user_info WHERE username='$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) == 1) {

            $row = mysqli_fetch_array($res);
            
            $userid = $row['user_id'];
            $_SESSION['user_id'] = $userid;

            $nome = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];

            $query2 = "SELECT * FROM user_address WHERE user_id='$userid'";
            $res2 = mysqli_query($conn, $query2);
            if(mysqli_num_rows($res2) == 1){

                $row2 = mysqli_fetch_array($res2);

                echo"<ul>";
                echo "<h2> dados gerais do ".$username.": </h2>";
                echo "<br>";
                    echo"<li><h3>account type:</h3>";
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
                    //echo"<li><h3>gender:</h3>";
                    //echo "<li>".$row['gender'];
                echo "<br>";
                echo "<h2> dados relativos à localidade: </h2>";
                echo "<br>";
                    echo"<li><h3>codigo postal:</h3>";
                    echo "<li>".$row2['postal_code'];
                    echo "<li><h3>cidade:</h3>";
                    echo "<li>".$row2['city'];
                    echo"<li><h3>distrito:</h3>";
                    echo "<li>".$row2['district'];
                    echo"<li><h3>morada:</h3>";
                    echo "<li>".$row2['address'];
                echo"</ul>";

                $postalcode = $row2['postal_code'];
                $city = $row2['city'];
                $district = $row2['district'];
                $address = $row2['address'];
            }else{
                echo "<br>dados indisponiveis";
            }
        }else {
            echo "<br>dados indisponiveis";
        }

        echo "<br>";
        echo "<br>";
        ?>

                    <form action="alterarConta.php">
                        <input type="submit" value="Alterar Conta" name="alterar_conta">
                    </form>

                    <br>
                    <h3 class="text-right">Eliminar Conta</h3>
                    <br>
                    
                    <form action="delete_account.php" method="post">
                        
                        <label class="labels">Password:</label>
                        <input type="password"  placeholder="Password" name="password" value="">
                        <br>
                        <input type="submit" value="Eliminar conta" name="delete_conta" class="btnL">
                    </form>
                    
        <div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>
                            <a href="https://fenix.ciencias.ulisboa.pt/degrees/tecnologias-de-informacao-564500436615450/disciplina-curricular/2253530685505944">PTI</a>
                            <a href="https://fenix.ciencias.ulisboa.pt/degrees/tecnologias-de-informacao-564500436615450/disciplina-curricular/2253530685505943">PTR</a>
                        </h3>
                        <ul>
                            <li><a href="https://ciencias.ulisboa.pt/pt/perfil/amferreira">António Ferreira</a></li>
                            <li><a href="https://ciencias.ulisboa.pt/perfil/aodsa">Alan Oliveira</a></li>
                            <li><a href="https://ciencias.ulisboa.pt/pt/perfil/mcalha">Mário Calha</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Membros do Grupo</h3>
                        <ul>
                            <li><a href="">Filipe Santos</a></li>
                            <li><a href="">Gonçalo Rocha</a></li>
                            <li><a href="">José Dias</a></li>
                            <li><a href="">Miguel Martins</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Projeto de PTI/PTR</h3>
                        <ul>
                            <li><a href="welcome.html">Sobre o Projeto</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Sobre Nós</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social"><a href="https://github.com/ptiptr17/PTIPTR17_2021-2022"><i class="fa fa-github"></i></a>
                        <p class="copyright">© GreenMarket by Grupo 17 PTI/PTR - Ano Letivo 2021/2022</p>
                    </div>
                </div>
            </div>
        </footer>
        </div>
        
    </body>
</html>
