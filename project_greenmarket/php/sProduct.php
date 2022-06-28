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

        div.col-md-12{
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

            while($row = mysqli_fetch_array($resp)) {

            echo"<ul>";
            echo "<h2> dados relativos aos teus produtos: </h3>";
            echo "<br>";
            echo"<li><h3>produto ".$row['product_id'].":</h3>";
            echo "<li>".$row['product_name'];
            echo"<li><h4>categories:</h4><br>";
            echo "<li>".$row['one_category'];
            echo "<li>".$row['two_category'];
            echo"<li><h4>price:</h4><br>";
            echo "<li>".$row['price'];
            echo "<li><h4>production date:</h4><br>";
            echo "<li>".$row['production date'];
            echo"<li><h4>expenditure:</h4><br>";
            echo "<li>".$row['resource_cast'];
            echo"<li><h4>eletricity:</h4><br>";
            echo "<li>".$row['eletricity_cast'];
            echo"<li><h4>water:</h4><br>";
            echo "<li>".$row['water_cast'];
            echo"<li><h4>polution caused:</h4><br>";
            echo "<li>".$row['pollution_caused'];
            echo"<li><h4>shelf life:</h4><br>";
            echo "<li>".$row['shelf_life'];
            echo"<li><h4>description:</h4><br>";
            echo "<li>".$row['descript'];
            echo"<li><h4>Image:</h4><br>";
            echo "<li>".$row['pic_desc'];
        }?>

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
                    <label class="labels">nome do produto</label>
                    <input type="text"  placeholder="Product" name="pname_novo" value="nome">
                </div>
                <div class="col-md-12">
                    <label class="labels">categoria produto</label>
                    <input type="text"  placeholder="product category" name="categoria_novo" value="categoria">
                </div>
                <div class="col-md-12">
                    <label class="labels">segunda categoria produto</label>
                    <input type="text"  placeholder="product category2" name="categoria2_novo" value="categoria2">
                </div>
                <div class="col-md-12">
                    <label class="labels">Preço</label>
                    <input type="text"  placeholder="Price" name="preco_novo" value="0">
                </div>
                <div class="col-md-12">
                    <label class="labels">data producao</label>
                    <input type="date"  placeholder="production date" name="dataprod_novo">
                </div>
                <div class="col-md-12">
                    <label class="labels">nome armazem</label>
                    <input type="text"  placeholder="storage" name="armazem_novo" value="nome do armazém">
                </div>
                <div class="col-md-12">
                    <label class="labels">gastos</label>
                    <input type="text"  placeholder="expenses" name="gastos_novo" value="0">
                </div>
                <div class="col-md-12">
                    <label class="labels">custo eletrecidade</label>
                    <input type="text"  placeholder="eletricty cost" name="eletricidade_novo" value="0">
                </div>
                <div class="col-md-12">
                    <label class="labels">custo agua</label>
                    <input type="text"  placeholder="water cost" name="agua_nova" value="0">
                </div>
                <div class="col-md-12">
                    <label class="labels">poluicao causada</label>
                    <input type="text"  placeholder="polution" name="poluicao_nova" value="0">
                </div>
                <div class="col-md-12">
                    <label class="labels">validade</label>
                    <input type="date"  placeholder="shelflife" name="validade_nova">
                </div>
                <div class="col-md-12">
                    <label class="labels">descricao</label>
                    <input type="text"  placeholder="descrption" name="descricao_nova" value="a descricao">
                </div>
                <div class="col-md-12">
                    <label class="labels">imagem</label>
                    <input type="image"  placeholder="image" name="imagem_nova">
                </div>
            </div>
            <div class="mt-3 text-center">
                <div class="col-md-4">
                    <input type="submit" value="Create Product" name="newProduct">
                </div>
            </div>
        </form>
    </body>
</html>
