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
        <h2> Os teus Armazéns: </h2>

        <?php
        $username = $_SESSION['username'];
        $userid = $_SESSION['userid'];
        $query = "SELECT * FROM warehouse_info WHERE supplier_id='$userid'";
        $res = mysqli_query($conn, $query);

        if(mysqli_num_rows($res) > 0){

            while($row = mysqli_fetch_array($res)) {

            echo"<ul>";
            echo "<h2> Dados relativos aos teus Armazéns: </h3>";
            echo "<br>";
            echo"<li><h3>Armazém ".$row['warehouse_id'].":</h3>";
            echo"<li><h4>Nome do armazém:</h4><br>";
            echo "<li><a href='warehouseDetail.php'>".$row['warehouse_name']."</a></li>";
        ?>
            <form action="warehouseDetail.php" method="post">
                <input type="hidden" name="warehouse_id" value="<?php echo $row['warehouse_id']; ?>" />
                <input type="submit" value="Aceder a armazem" name="aceder">
            </form>

        <?php
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
        }?>

        <form action="delete_warehouse.php" method="post">
            <label class="labels">ID do armazém a ser excluído:</label>
            <input type="text"  placeholder="armazem" name="armazem_id">
            <input type="submit" value="Delete Warehouse" name="apagar_warehouse">
        </form>

        <?php
        }else{
            echo "<br>Nao tem armazéns seus neste momento.";
        }

        ?>


    <h2 class="text-right">Registar Novo Armazém:</h2>
        </div>
        <form action="registerWarehouse.php" method="post">
            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="name_warehouse"><b>Nome do armazém</b></label>
                    <input type="text" name="name_warehouse" id="wname">
                </div>
                <div class="col-md-12">
                    <label for="phone_warehouse"><b>Número de telemovel</b></label>
                    <input type="text" name="phone_warehouse" id="wphone">
                </div>
                <div class="col-md-12">
                    <label for="email_warehouse"><b>Email</b></label>
                    <input type="text" name="email_warehouse" id="wemail">
                </div>
                <div class="col-md-12">
                    <label for="city_warehouse"><b>Cidade</b></label>
                    <input type="text" name="city_warehouse" id="wcity">
                </div>
                <div class="col-md-12">
                    <label for="district_warehouse"><b>Distrito</b></label>
                    <input type="text" name="district_warehouse" id="wdistrict">
                </div>
                <div class="col-md-12">
                    <label for="address_warehouse"><b>Endereço</b></label>
                    <input type="text" name="address_warehouse" id="wadress">
                </div>
            </div>
            <div class="mt-3 text-center">
                <div class="col-md-4">
                    <input type="submit" value="Create Warehouse" name="newWarehouse">
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