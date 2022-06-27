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
        <h1> Armazéns de <?php echo $_SESSION['username']; ?>, <?php echo  $_SESSION["usertype"];?></h1>
        <br>
        <br>
        <h2> Produtos neste armazém: </h2>

        <?php
        $username = $_SESSION['username'];
        $userid = $_SESSION['userid'];
        $warehouse_id = $_POST['warehouse_id'];
        $query = "SELECT * FROM product_info WHERE w_id='$warehouse_id'";
        $res = mysqli_query($conn, $query);

        if(mysqli_num_rows($res) > 0){

            while($row = mysqli_fetch_array($res)) {

            echo"<ul>";
            echo "<h2> Dados relativos a cada produto: </h3>";
            echo "<br>";
            echo"<li><h3>Produto ".$row['product_id'].":</h3>";
            echo"<li><h4>Nome do produto:</h4><br>";
            echo "<li>".$row['product_name'];
            echo"<li><h4>Categoria:</h4><br>";
            echo "<li>".$row['one_category'];
            echo"<li><h4>Sub-categoria:</h4><br>";
            echo "<li>".$row['two_category'];
            echo"<li><h4>Preço:</h4><br>";
            echo "<li>".$row['price'].'€';
            // echo"<li><h4>Quantidade:</h4><br>";
            // echo "<li>".$row['amount'];
        }?>

        <?php
        }else{
            echo "<br>Nao tem produtos neste armazéns neste momento.";
            echo "Se pretender adicionar produtos <a href='sProduct.php'>CLIQUE AQUI</a>";
        }

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