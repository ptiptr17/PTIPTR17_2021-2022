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

        input[type=submit] {
            padding:5px 15px;
            background:#4CAF50;
            border: 2px solid black;
            border-radius: 5px;
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
        <h1> Encomendas de <?php echo $_SESSION['username']; ?>, <?php echo  $_SESSION["usertype"];?></h1>
        <br>
        <br>

        <?php
        $username = $_SESSION['username'];
        $userid = $_SESSION['userid'];
        $query = "SELECT * FROM order_info WHERE consumer_id='$userid' AND status!='delivery completed'";
        $res = mysqli_query($conn, $query);

        if(mysqli_num_rows($res) > 0){

            echo "<h2> encomendas atuais: </h2>";

            while($row = mysqli_fetch_array($res)) {

                echo"<ul>";
                echo "<br>";
                echo"<li><h3>encomenda ".$row['order_id'].":</h3>";
                echo "<li>".$row['product_name'];
                echo "<li> localidade origem:";
                echo $row['postalcode_origin'];
                echo "<li> localidade_destino:";
                echo $row['postalcode_destin'];
                echo"<li><h3>preco:</h3><br>";
                echo $row['price'];
                echo "<li> data de creação de encomenda:";
                echo $row['creation_date'];
                echo "<li> data limite para cancelar encomenda:";
                echo $row['cancelation_date'];
                echo "<li> poluicao causada:";
                echo $row['pollution'];
                echo "<li> estado da encomenda:";
                echo $row['status'];
                echo "<li>transportador:";
                echo $row['transporter_name'];
                echo "<li>veiculo:";
                echo $row['vehicle_name'];
                echo "<br>data de entrega:";
                echo $row['delivery_date'];
                echo "</ul>";
                $current_date =  date("Y-m-d H:i:s");
                $cancelation_date = $row['cancelation_date'];
                $diff_dates = date_diff(date_create($current_date) , date_create($cancelation_date));
                if($row['status'] == 'approved'){
                    echo "encomenda aprovada e em curso processo de entrega.";
                }
                if($row['cancelation_date'] != NULL && $diff_dates -> format("%R%a days") <= 0 && $row['status'] == 'awaiting approval'){
        ?>
                <form action="c_order_delete.php" method="post">
                    <input type="hidden" name="id_encomenda" value="<?php echo $row['order_id']; ?>" />
                    <input type="submit" value="Cancelar Encomenda" name="encomendar">
                </form>
        <?php
                }
            }

        }elseif(mysqli_num_rows($res) == 0){
            echo "<h3> Não existem produtos encomendados. </h3>";
        }else{
            echo "<h3> erro a encontrar encomendas. </h3>";
        }
        ?>

        <h3>Historico de encomendas já completadas:</h3>

        <?php
        $query = "SELECT * FROM order_info WHERE consumer_id='$userid' AND status!='delivery_completed'";
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
                                <li><a href="../html/welcome.html">Sobre o Projeto</a></li>
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
