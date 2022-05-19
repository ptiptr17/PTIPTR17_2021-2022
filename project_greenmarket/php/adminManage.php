<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="google-signin-client_id" content="150537595526-k8su1jjs23i0oo14gaalmvpbbi7plpud.apps.googleusercontent.com">
        <title>GreenMarket</title>
        <link rel="icon" href="imagens/icon.png"/>
        <link rel="stylesheet" type="text/css" href="css/adminManage.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type= "text/javascript" src = "adminManage.js"></script>
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
                <nav>
                    <ul>
                        <li><a href="products.html"> Produtos</a></li>
                        <li><a href="login.html"> Iniciar Sessão</a></li>
                        <li><a href="register.html"> Criar Conta</a></li>
                    </ul>
                </nav>
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
        <?php

        if (isset($_GET["username"])) {
            $username = $_GET["username"];
            mysql_connect("localhost","root","") or die ("Não foi possivel estabelecer conexão ao servidor");
            mysql_select_db("users") or die ("A base de dados não foi possivel encontrar!");
            $userquery = mysql_query("SELECT * FROM users WHERE username ="$username"") or die ("Não foi completa a query");
            if (mysql_num_rows($userquery) != 1) {
                die ("Não foi possivel encontrar o utilizador!");
            }
            while ($row = mysql_fetch_array($userquery, MYSQL_ASSOC)) {
                $firstname =$row["firstname"];
                $lastname =$row["lastname"];
                $email =$row["email"];
                $dbusername =$row["username"];
                $typeUser =$row["typeUser"];
            }
        ?>

        <h1><?php echo $firstname; ?> <?php echo $lastname; ?>s Profile</h1>
        <table>
            
        </table>
        <?php
        } else die ("É preciso especificar o username!")
        ?>

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