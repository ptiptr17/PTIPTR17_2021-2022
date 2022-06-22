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
        $query = "SELECT * FROM product_info WHERE s_id='$userid'";
        $res = mysqli_query($conn, $query);

        if(mysqli_num_rows($res) > 0){

            while($row = mysqli_fetch_array($res)) {

            echo"<ul>";
            echo "<h2> dados relativos aos teus produtos: </h3>";
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
        }
        ?>

        <form action="delete_product.php" method="post">
            <label class="labels">product id of product to be deleted:</label>
            <input type="text"  placeholder="Pid" name="Pid">
            <input type="submit" value="Delete Product" name="apagar_produto">
        </form>

        <?php
        }else{
            echo "<br>Nao tem produtos seus neste momento.";
        }

        ?>

    <h2 class="text-right">Registar novo produto:</h2>
        </div>
        <form action="register_product.php" method="post">
            <div class="row mt-3">
                <div class="col-md-12">
                    <label class="labels">Nome do produto:</label>
                    <input type="text"  placeholder="Product" name="pname_novo" value="nome">
                </div>
                <div class="col-md-12">
                    <label class="labels">Categoria produto:</label>
                    <input type="text"  placeholder="product category" name="categoria_novo" value="categoria">
                </div>
                <div class="col-md-12">
                    <label class="labels">Segunda categoria produto:</label>
                    <input type="text"  placeholder="product category2" name="categoria2_novo" value="categoria2">
                </div>
                <div class="col-md-12">
                    <label class="labels">Preço:</label>
                    <input type="text"  placeholder="Price" name="preco_novo" value="0">
                </div>
                <div class="col-md-12">
                    <label class="labels">Data producao:</label>
                    <input type="date"  placeholder="production date" name="dataprod_novo">
                </div>
                <div class="col-md-12">
                    <label class="labels">Nome armazem:</label>
                    <input type="text"  placeholder="storage" name="armazem_novo" value="nome do armazém">
                </div>
                <div class="col-md-12">
                    <label class="labels">Gastos:</label>
                    <input type="text"  placeholder="expenses" name="gastos_novo" value="0">
                </div>
                <div class="col-md-12">
                    <label class="labels">Custo eletrecidade:</label>
                    <input type="text"  placeholder="eletricty cost" name="eletricidade_novo" value="0">
                </div>
                <div class="col-md-12">
                    <label class="labels">Custo agua:</label>
                    <input type="text"  placeholder="water cost" name="agua_nova" value="0">
                </div>
                <div class="col-md-12">
                    <label class="labels">Poluicao causada:</label>
                    <input type="text"  placeholder="polution" name="poluicao_nova" value="0">
                </div>
                <div class="col-md-12">
                    <label class="labels">Validade:</label>
                    <input type="date"  placeholder="shelflife" name="validade_nova">
                </div>
                <div class="col-md-12">
                    <label class="labels">Descricao:</label>
                    <input type="text"  placeholder="description" name="descricao_nova" value="a descricao">
                </div>
                <div class="col-md-12">
                    <label class="labels">Imagem:</label>
                    <input type="file" placeholder="image" accept="image/png, image/gif, image/jpeg" name="imagem_nova">
                </div>
            </div>
            <div class="mt-3 text-center">
                <div class="col-md-4">
                    <input type="submit" value="Create Product" name="newProduct">
                </div>
            </div>
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