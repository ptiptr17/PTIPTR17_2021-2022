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
            display: grid;
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

        label.labels {
            display: flex;
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


    <?php
        $username = $_SESSION['username'];
        $query = "SELECT * FROM user_info WHERE username='$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) == 1) {

            $row = mysqli_fetch_array($res);
        }
    ?>
        <br>
        <h1> Dados da conta de <?php echo $_SESSION['username']; ?></h1>
        <br>
        <br>
        <h2 class="text-right">Alterar dados do utilizador</h2>
                    </div>
                    <form class="dados" action="edit_user.php" method="post">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Username</label>
                                <input type="text"  placeholder="UNome" name="uname_novo" value="<?php echo $row['username']?>">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Nome</label>
                                <input type="text"  placeholder="Nome" name="nome_novo" value="<?php echo $row['name']?>">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Email</label>
                                <input type="text"  placeholder="Email" name="email_novo" value="<?php echo $row['email']?>">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Numero de Telefone</label>
                                <input type="text"  placeholder="Phone" name="phone_novo" value="<?php echo $row['phone']?>">
                            </div>
                            <div class="col-md-12">
                                <label class="labels" for="image">Imagem:</label>
                                <input type="file" placeholder="image" accept="image/png, image/gif, image/jpeg" name="imagem_nova">
                            </div>

                            <?php
                                $userid = $_SESSION['userid'];
                                $query = "SELECT * FROM user_address WHERE user_id='$userid'";
                                $res = mysqli_query($conn, $query);
                                if (mysqli_num_rows($res) == 1) {

                                    $row = mysqli_fetch_array($res);
                                }
                            ?>

                            <div class="col-md-12">
                                <label class="labels">Código Postal</label>
                                <input type="text"  placeholder="Código Postal" name="codPostal_novo" value="<?php echo $row['postal_code']?>">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Cidade</label>
                                <input type="text"  placeholder="Cidade" name="cidade_novo" value="<?php echo $row['city']?>">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Distrito</label>
                                <input type="text"  placeholder="Código Postal" name="distrito_novo" value="<?php echo $row['district']?>">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Morada</label>
                                <input type="text"  placeholder="Morada" name="morada_nova" value="<?php echo $row['address']?>">
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <div class="col-md-4">
                                <input type="submit" value="Guardar Perfil" name="edit_utilizador">
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
