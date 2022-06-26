<!DOCTYPE html>
<html lang="pt">
<!--
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
                        <li><a href="login.html"> Iniciar Sess�o</a></li>
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
        /*
        if (isset($_GET["username"])) {
            $username = $_GET["username"];
            mysql_connect("localhost","root","") or die ("N�o foi possivel estabelecer conex�o ao servidor");
            mysql_select_db("users") or die ("A base de dados n�o foi possivel encontrar!");
            $userquery = mysql_query("SELECT * FROM users WHERE username ="$username"") or die ("Nao foi completa a query");
            if (mysql_num_rows($userquery) != 1) {
                die ("N�o foi possivel encontrar o utilizador!");
            }
            while ($row = mysql_fetch_array($userquery, MYSQL_ASSOC)) {
                $name =$row["name"];
                $email =$row["email"];
                $dbusername =$row["username"];
                $accountType =$row["accountType"];
            }
            if($username != $dbusername) {
                die ("Existe um erro.")

            }
        
        ?>  
        
        <h1>Profile de <?php echo $name; ?></h1>
        <table>
            <tr><td>Nome:</td><td><?php echo $name; ?></td></tr>
            <tr><td>Email:</td><td><?php echo $email; ?></td></tr>
            <tr><td>Username:</td><td><?php echo $username; ?></td></tr>
            <tr><td>AccountType:</td><td><?php echo $accountType; ?></td></tr>
        </table>
        <?php
        } else die ("Eh preciso especificar o username!")
        */
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
                                <li><a href="https://ciencias.ulisboa.pt/pt/perfil/amferreira">Ant�nio Ferreira</a></li>
                                <li><a href="https://ciencias.ulisboa.pt/perfil/aodsa">Alan Oliveira</a></li>
                                <li><a href="https://ciencias.ulisboa.pt/pt/perfil/mcalha">M�rio Calha</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-md-3 item">
                            <h3>Membros do Grupo</h3>
                            <ul>
                                <li><a href="">Filipe Santos</a></li>
                                <li><a href="">Gon�alo Rocha</a></li>
                                <li><a href="">Jos� Dias</a></li>
                                <li><a href="">Miguel Martins</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-md-3 item">
                            <h3>Projeto de PTI/PTR</h3>
                            <ul>
                                <li><a href="welcome.html">Sobre o Projeto</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Sobre N�s</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 item social"><a href="https://github.com/ptiptr17/PTIPTR17_2021-2022"><i class="fa fa-github"></i></a>
                            <p class="copyright">� GreenMarket by Grupo 17 PTI/PTR - Ano Letivo 2021/2022</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
-->
</html>