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
        <h1> Veículos de <?php echo $_SESSION['username']; ?>, <?php echo  $_SESSION["usertype"];?></h1>
        <br>
        <br>
        <h2> Os teus Veículos: </h2>

        <?php
        $username = $_SESSION['username'];
        $userid = $_SESSION['userid'];
        $query = "SELECT * FROM vehicle_info WHERE vehicle_id='$userid'";
        $res = mysqli_query($conn, $query);

        if(mysqli_num_rows($res) > 0){

            while($row = mysqli_fetch_array($resp)) {

            echo"<ul>";
            echo "<h2> Dados relativos aos teus Veículos: </h3>";
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
        }?>

        <form action="delete_vehicle.php" method="post">
            <label class="labels">ID do veiculo a ser excluído:</label>
            <input type="text"  placeholder="Pid" name="Pid">
            <input type="submit" value="Delete Vehicle" name="apagar_vehicle">
        </form>

        <?php
        }else{
            echo "<br>Nao tem veículos seus neste momento.";
        }

        ?>


    <h2 class="text-right">Registar Novo Veiculo:</h2>
        </div>
        <form action="register_vehicle.php" method="post">
            <div class="row mt-3">
                <div class="col-md-12">
                    <label class="labels">Tipo de veiculo</label>
                    <input type="text"  placeholder="Tveiculo" name="uname_novo">
                </div>
                <div class="col-md-12">
                    <label class="labels">Matricula do veiculo:</label>
                    <input type="text"  placeholder="Nome" name="nome_novo">
                </div>
                <div class="col-md-12">
                    <label class="labels">Poluição Causada (CO2):</label>
                    <input type="text"  placeholder="Poluicao" name="poluicao_causada">
                </div>
                <div class="col-md-12">
                    <label class="labels">Descricao</label>
                    <input type="text"  placeholder="descrption" name="descricao_nova">
                </div>
                <div class="col-md-12">
                    <label class="labels">Imagem</label>
                    <input type="image"  placeholder="image" name="imagem_nova">
                </div>
            </div>
            <div class="mt-3 text-center">
                <div class="col-md-4">
                    <input type="submit" value="Create Vehicle" name="newVehicle">
                </div>
            </div>
        </form>
    </body>
</html>