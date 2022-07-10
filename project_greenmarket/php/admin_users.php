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

        <?php
        if($_SESSION["usertype"] == "admin"){
            echo "<h3><a href='admin_produtos.php'>Ver produtos</a></h3>";
            echo "<br><h3><a href='admin_transportes.php'>Ver transportes</a></h3><br>";
            echo "<br><h3><a href='admin_armazens.php'>Ver armazens</a></h3><br>";
            echo "<br><h3><a href='admin_users.php'>Ver utilizadores</a></h3><br>";
        }
        ?>


        <h2> Listagem de todos os utilizadores:</h2>
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

            <form action="admin_edit_user.php" method="post">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">id de utilizador para editar:</label>
                                <input type="text"  placeholder="userid" name="user_idM" value="user_idM">
                             </div>
                            <div class="col-md-12">
                                <label class="labels">username</label>
                                <input type="text"  placeholder="UNome" name="uname_novo" value="nomede utilizador novo">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">name</label>
                                <input type="text"  placeholder="Nome" name="nome_novo" value="nome novo">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Email</label>
                                <input type="text"  placeholder="Email" name="email_novo" value="email novo">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Phone number</label>
                                <input type="text"  placeholder="Phone" name="phone_novo" value="contacto">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Código Postal</label>
                                <input type="text"  placeholder="Código Postal" name="codPostal_novo" value="codigo postal novo">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Cidade</label>
                                <input type="text"  placeholder="Cidade" name="cidade_novo" value="cidade nova">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Distrito</label>
                                <input type="text"  placeholder="Distrito" name="distrito_novo" value="Distrito novo">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Morada</label>
                                <input type="text"  placeholder="Morada" name="morada_nova" value="morada nova">
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <div class="col-md-4">
                                <input type="submit" value="Save Profile" name="edit_utilizador">
                            </div>
                        </div>
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