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
                          <li><a href="produtos.html"> Produtos</a></li>
                          <li><a href="login.html"> Iniciar Sessão</a></li>

                          <?php
                                if(isset($_SESSION['Username'])):?>

                                <li> <a href="#"><?php echo $_SESSION['Username'];?></a></li>
                            <?php

                                else:?>

                                <li><a href="Login2.php">Login</a></li>
                                <?php
                                endif;

                                ?>
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