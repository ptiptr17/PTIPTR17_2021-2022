<?php
include "openconn.php";
session_start();
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="google-signin-client_id" content="150537595526-k8su1jjs23i0oo14gaalmvpbbi7plpud.apps.googleusercontent.com">
        <title>GreenMarket</title>
        <link rel="icon" href="imagens/icon.png"/>
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type= "text/javascript" src = "admin.js"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
    </head>
    <style type="text/css">
        body {
        background: #ecf4e9;
        padding: 2px 6px;
        border-collapse: separate;
        border: 1px solid #000;
        }

    </style>
    <body>
        <header class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="homepage.html"><img src="imagens/logo.png" width="400px"></a>
                </div>
                <div class="search">
                    <input type="text" placeholder="Procurar..">
                </div>
                <?php if(isset($_SESSION['username'])):  ?>
                    <nav>
                        <ul>
                          <li><a href="../html/products.html"> Produtos </a></li>
                          <li><a href="logout.php"> Terminar a sessão </a></li>
                          <!--<li><a href="profile.php"> <?php //echo $_SESSION["username"];?> </a></li>-->
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
        <h1> Pagina de administrador </h1>
        <div>
        <h2> listagem de todos os utilizadores:</h2>
        <?php

        $username = $_SESSION["username"];
        $query = "SELECT * FROM user_info";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {

            while($row = mysqli_fetch_array($res)) {
                echo"<ul>";
                echo "<h3> dados relativos ao utilizador <b>".$row['username']."</b>: </h3>";
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
                $userid = $row['user_id'];


                $query2 = "SELECT * FROM user_address WHERE user_id='$userid'";
                $res2 = mysqli_query($conn, $query2);
                if(mysqli_num_rows($res2) == 1){
                    $row2 = mysqli_fetch_array($res2);

                    echo "<br>";
                    echo "<h3> dados relativos à sua localidade: </h3>";
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
                }else{
                    echo"<li>este utilizador não tem dados de localidade.</li>";
                    echo"</ul>";
                }
            }?>

            <form action="edit_user.php" method="post">
            <label class="labels">id de utilizador para editar:</label>
            <input type="text"  placeholder="userid" name="userid" value="userid">
            <br>
            <input type="submit" value="Editar conta" name="edit_account" class="btnL">
            </form>

            <form action="delete_user.php" method="post">
            <label class="labels">id de utilizador para eliminar:</label>
            <input type="text"  placeholder="userid" name="userid" value="userid">
            <br>
            <input type="submit" value="Eliminar utilizador" name="delete_user" class="btnL">
            </form>

        <?php
        }
        ?>

        <form action="create_user.php" method="post">
        <label class="labels">criar utilizador:</label>
        <!--
        <input type="text"  placeholder="userid" name="userid" value="userid">
        <br>
        -->
        <input type="submit" value="criar conta" name="create_account" class="btnL">
        </form>
        </div>

        <div>
        <h2>listagem de todos os produtos:</h2>
        <?php
        $queryp = "SELECT * FROM product_info";
        $resp = mysqli_query($conn, $queryp);
        if (mysqli_num_rows($resp) > 0) {
            while($row = mysqli_fetch_array($resp)) {
                echo"<ul>";
                echo "<h2> dados relativos a todos os produtos: </h3>";
                echo "<br>";
                echo"<li><h3>produto ".$row['product_id'].":</h3>";
                echo $row['product_name'];
                echo"<li><h4>categories:</h4><br>";
                echo $row['one_category'];
                echo $row['two_category'];
                echo"<li><h4>price:</h4><br>";
                echo $row['price'];
                echo "<li><h4>production date:</h4><br>";
                echo $row['production_date'];
                echo"<li><h4>expenditure:</h4><br>";
                echo $row['resource_cast'];
                echo"<li><h4>eletricity:</h4><br>";
                echo $row['eletricity_cast'];
                echo"<li><h4>water:</h4><br>";
                echo $row['water_cast'];
                echo"<li><h4>polution caused:</h4><br>";
                echo $row['pollution_caused'];
                echo"<li><h4>shelf life:</h4><br>";
                echo $row['shelf_life'];
                echo"<li><h4>description:</h4><br>";
                echo $row['descript'];
                echo"<li><h4>Image:</h4><br>";
                echo $row['picture'];
                echo"</ul>";
            }?>

            <form action="edit_product.php" method="post">
            <label class="labels">id de produto para editar:</label>
            <input type="text"  placeholder="productid" name="productid" value="productid">
            <br>
            <input type="submit" value="Editar conta" name="edit_conta" class="btnL">
            </form>

            <form action="delete_product.php" method="post">
            <label class="labels">id de produto para eliminar:</label>
            <input type="text"  placeholder="produtoid" name="productid" value="productid">
            <br>
            <input type="submit" value="Eliminar produto" name="delete_product" class="btnL">
            </form>
        <?php
        }
        ?>

        <form action="create_product.php" method="post">
            <label class="labels">criar produto:</label>
            <!--
            <input type="text"  placeholder="userid" name="userid" value="userid">
            <br>
            -->
            <input type="submit" value="criar produto" name="create_product" class="btnL">
            </form>
        </div>

        <div>
        <h2>listagem de todos os armazéns:</h2>
        <?php
        $querya = "SELECT * FROM warehouse_info";
        $resa = mysqli_query($conn, $querya);
        if (mysqli_num_rows($resa) > 0) {
            while($row = mysqli_fetch_array($resa)) {
                echo"<ul>";
                echo "<h2> Dados relativos a todos os armazéns: </h2>";
                    echo "<br>";
                    echo"<li><h3>Armazém ".$row['warehouse_id'].":</h3>";
                    echo"<li><h4>Nome do armazém:</h4><br>";
                    echo "<li>".$row['warehouse_name'];
                    echo"<li><h4>Telefone do armazém:</h4><br>";
                    echo "<li>".$row['warehouse_phone'];
                    echo"<li><h4>Email:</h4><br>";
                    echo "<li>".$row['email'];
                    echo"<li><h4>Cidade:</h4><br>";
                    echo "<li>".$row['city'];
                    echo"<li><h4>Distrito:</h4><br>";
                    echo "<li>".$row['district'];
                    echo"<li><h4>Endereço:</h4><br>";
                    echo "<li>".$row['address'];
            }
        }
        ?>
        </div>

        <div>
        <h2>listagem de todos os veiculos:</h2>
        <?php
        $queryv = "SELECT * FROM vehicle_info";
        $resv = mysqli_query($conn, $queryv);
        if (mysqli_num_rows($resv) > 0) {
            while($row = mysqli_fetch_array($resv)) {
                echo"<ul>";
                echo "<h2> Dados relativos a todos os Veículos: </h2>";
                echo "<br>";
                echo"<li><h3>Veículo ".$row['vehicle_id'].":</h3>";
                echo"<li><h4>Tipo de veículo:</h4><br>";
                echo "<li>".$row['vehicle_type'];
                echo"<li><h4>Matricula:</h4><br>";
                echo "<li>".$row['plate_number'];
                echo"<li><h4>Poluição Causada:</h4><br>";
                echo "<li>".$row['pollution_caused'];
                echo"<li><h4>Descrição:</h4><br>";
                echo "<li>".$row['descript'];
                echo"<li><h4>Image:</h4><br>";
                echo "<li>".$row['pic_desc'];
                echo "</ul>";
            }?>

            <form action="edit_vehicle.php" method="post">
            <label class="labels">id de veiculo para editar:</label>
            <input type="text"  placeholder="vehicleid" name="vehicleid" value="vehicleid">
            <br>
            <input type="submit" value="Editar conta" name="edit_conta" class="btnL">
            </form>

            <form action="delete_vehicle.php" method="post">
            <label class="labels">id de veiculo para eliminar:</label>
            <input type="text"  placeholder="veiculoid" name="vehicleid" value="vehicleid">
            <br>
            <input type="submit" value="Eliminar veiculo" name="delete_vehicle" class="btnL">
            </form>
        <?php
        }
        ?>

        <form action="create_vehicle.php" method="post">
            <label class="labels">criar veiculo:</label>
            <!--
            <input type="text"  placeholder="userid" name="userid" value="userid">
            <br>
            -->
            <input type="submit" value="criar veiculo" name="create_vehicle" class="btnL">
            </form>
        </div>

        <!--
        <div>
            <h1>Procurar por um utilizador:</h1>
            <form action="adminManage.php" method="GET">
            <table>
                <tr><td>Username:</td><td><input type="text" id="username" name="username"></td></tr>
                <tr><td><input type="submit" id="submit" name="submit" value="Ver perfil!"></td></tr>
            </table>
        </form>
        </div>
        -->

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
