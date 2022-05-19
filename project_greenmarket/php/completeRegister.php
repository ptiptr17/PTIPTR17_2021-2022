<?php
    include "openconn.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>GreenMarket</title>
        <link rel="icon" href="../html/imagens/icon.png"/>
        <link rel="stylesheet" type="text/css" href="../html/css/completeRegister.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type= "text/javascript" src = "../javascript/completeRegister.js"></script>
    </head>
    <body>
         <header class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <a href="homepage.php"><img src="../html/imagens/logo.png" width="400px"></a>
                    </div>
                    
                    <nav>
                        <ul>
                          <li><a href="../html/products.html"> Produtos </a></li>
                          <li><a href="logout.php"> Terminar a sessão </a></li>
                          <li><a href="profile.php"> <?php echo $_SESSION["username"];?> </a></li>
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

         <div class="conteudo container row">
            <div class = "w3-container w3-display-container w3-light-grey w3-display-middle form">
                <h1>Completar Registo </h1>

                <h2> bem vindo <?php  echo $_SESSION['username']; ?>. </h2>
                
                <h3>Basta completar o seguinte formulário para teres acesso a tudo o que o site tem para oferecer.</h3>

                <h4> não pretende completar o registo?</h4>
                <a href="homepage.php"><p> então clique aqui para ir à página principal </p> </a>

                <?php echo "atributo da sessão" . $_SESSION['usertype'];  ?>
                

               <?php if($_SESSION['usertype'] == 'consumer'): ?>

               <h4> formulário para consumidor: </h4>

               <form action="../php/complete_registry.php" method="post">
                    <label for="name"> Nome: </label>
                    <input type="text" name="cname" required /><br>
                    <label for="data">Data de Nascimento:</label>
                    <input type="date" name="cdata" required /><br>
                    <label for="genero">Género:</label>
                    <select id="genero" name="utigenero" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="none">Prefiro não dizer</option>
                    </select><br>
                    <label for="phoneN">nº telefone:</label>
                    <input type="text" placeholder= "numero de telefone" name="phoneN" required /><br>
                            
                    <!--costumer addresstable handle -->
                   
                    <label for="postal code">zone improvement plan:</label>
                    <input type="text" placeholder="postal code" name="c_pc" required /><br>
                    <label for="province">province:</label>
                    <input type="text" placeholder="provincia" name="provincia" required /><br>
                    <label for="city">city:</label>
                    <input type="text" placeholder="city" name="cidade" required /><br>
                    <label for="district">distrito:</label>
                    <input type="text" placeholder="district" name="distrito" required /><br>
                    <label for="address">morada:</label>
                    <input type="text" placeholder="address" name="morada" required /><br>
                    <label for="coordinates">coordenadas:</label>
                    <input type="text" placeholder="coordinates" name="coordenadas" required /><br>

                    <input type="submit" value="Submit" name="register_complete" />

               </form>     
                
               <?php elseif($_SESSION['usertype'] == 'transporter'): ?>
                
               <h5> formulário para transportador: </h5>

               <form action="../php/complete_registry.php" method="post">
                    <label for="name"> Nome: </label>
                    <input type="text" name="cname" required /><br>
                    <label for="data">Data de Nascimento:</label>
                    <input type="date" name="cdata" required /><br>
                    <label for="genero">Género:</label>
                    <select id="genero" name="utigenero" required />
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="none">Prefiro não dizer</option>
                    </select><br>
                    <label for="phoneN">nº telefone:</label>
                    <input type="text" placeholder= "numero de telefone" name="phoneN" required /><br>
                            
                    <!--costumer addresstable handle -->

                    <label for="zip">zone improvement plan:</label>
                    <input type="text" placeholder="zip" name="czip" required /><br>
                    <label for="province">province:</label>
                    <input type="text" placeholder="provincia" name="provincia" required /><br>
                    <label for="city">city:</label>
                    <input type="text" placeholder="city" name="cidade" required /><br>
                    <label for="district">distrito:</label>
                    <input type="text" placeholder="district" name="distrito" required /><br>
                    <label for="address">morada:</label>
                    <input type="text" placeholder="address" name="morada" required /><br>
                    <label for="coordinates">coordenadas:</label>
                    <input type="text" placeholder="coordinates" name="coordenadas" required /><br>

                    <input type="submit" value="Submit" name="register_complete" />
               </form>

               <?php elseif($_SESSION['usertype'] == 'transporter'): ?>
                
               <h5> formulário para fornecedor: </h5>

               <form action="../php/complete_registry.php" method="post">
                    <label for="name"> Nome: </label>
                    <input type="text" name="cname" required /><br>
                    <label for="data">Data de Nascimento:</label>
                    <input type="date" name="cdata" required /><br>
                    <label for="genero">Género:</label>
                    <select id="genero" name="utigenero" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="none">Prefiro não dizer</option>
                    </select><br>
                    <label for="phoneN">nº telefone:</label>
                    <input type="text" placeholder= "numero de telefone" name="phoneN" required /><br>
                            
                    <!--costumer addresstable handle -->

                    <label for="zip">zone improvement plan:</label>
                    <input type="text" placeholder="zip" name="czip" required /><br>
                    <label for="province">province:</label>
                    <input type="text" placeholder="provincia" name="provincia" required /><br>
                    <label for="city">city:</label>
                    <input type="text" placeholder="city" name="cidade" required /><br>
                    <label for="district">distrito:</label>
                    <input type="text" placeholder="district" name="distrito" required /><br>
                    <label for="address">morada:</label>
                    <input type="text" placeholder="address" name="morada" required /><br>
                    <label for="coordinates">coordenadas:</label>
                    <input type="text" placeholder="coordinates" name="coordenadas" required /><br>

                    <input type="submit" value="Submit" name="register_complete" />
               </form>

               <?php endif; ?>
                




            </div>
         </div>
    </body>
</html>
                    
               