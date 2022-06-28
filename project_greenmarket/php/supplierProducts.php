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
    <style type="text/css">
        body {
        background: #ecf4e9;
        padding: 2px 6px;
        border-collapse: separate;
        border: 1px solid #000;
        }

        div.body{
            display: inline-block;
            margin: auto;
            text-align: center;
        }

        input[type=submit] {
            padding:5px 15px; 
            background:#4CAF50;
            border: 2px solid black; 
            border-radius: 5px;
            margin: auto;
        }

        

        form {
            margin: auto;
            text-align: center;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto 
        }


    </style>
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
        <h1> Produtos de <?php echo $_SESSION['username']; ?>, <?php echo  $_SESSION["usertype"];?></h1>
        <br>
        <br>
        <h2> Os teus produtos: </h2>
        <br>
        <!--<h2> dados relativos aos teus produtos: </h2>-->
        <div class="body">
            <?php
            $username = $_SESSION['username'];
            $userid = $_SESSION['userid'];
            $query = "SELECT * FROM product_info WHERE s_id='$userid'";
            $res = mysqli_query($conn, $query);

            if(mysqli_num_rows($res) > 0){
                while($row = mysqli_fetch_array($res)) {
                    
                    echo"<ul>";
                    echo "<br>";
                    echo"<li><h3>produto ".$row['product_id'].":</h3>";

                    if($row['one_category'] == "eletrodomestico"){
                        echo "<li><img src ='../html/imagens/eletrodomesticos.jpg' width ='150' height='90'/>";
                    }elseif($row['one_category'] == "vestuario"){
                        echo "<li><img src ='../html/imagens/vestuario.jpg' width ='150' height='90'/>";
                    }elseif($row['one_category'] == "mobilia"){
                        echo "<li><img src ='../html/imagens/mobilia.jpg' width ='150' height='90'/>";
                    }
                
                    echo "<li>".$row['product_name'];
                    echo"<li><h4>categories:</h4><br>";
                    echo $row['one_category']."<br>";
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
                    echo"<li><h4>Image:</h4><br>";?>
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['picture']); ?>" />
                    <?php echo"</ul>";
                    echo "<br>";
                }
            ?>

            <h2 class="text-right">Apagar um produto:</h2>

            <form action="delete_product.php" method="post">
                <label class="labels">product id of product to be deleted:</label>
                <input type="text"  placeholder="Pid" name="Pid">
                <input type="submit" value="Delete Product" name="apagar_produto">
            </form>
            <br>
            <?php
            }else{
                echo "<br>Nao tem produtos seus neste momento.";
            }

            ?>

            <h2 class="text-right">Registar novo produto:</h2>
            <br>
            </div>
            <form action="register_product.php" method="post" enctype="multipart/form-data">
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
                        <label class="labels">Descricao:</label>
                        <input type="text"  placeholder="description" name="descricao_nova" value="a descricao">
                    </div>
                    <div class="col-md-12">
                        <label class="labels" for="image">Imagem:</label>
                        <input type="file" placeholder="image" accept="image/png, image/gif, image/jpeg" name="imagem_nova">
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <div class="col-md-4">
                        <input type="submit" value="Create Product" name="newProduct">
                    </div>
                </div>
            </form>

        </div>
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