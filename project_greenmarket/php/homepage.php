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
        <div class="conteudo container row">
            <h2 text="center"> Bem vindo <?php echo $_SESSION['username'] ?>
            <div class="categories">
            <p> <?php $_SESSION["username"]; ?> </p>
            <p> <?php $_SESSION["usertype"]; ?> </p>
                <div class="slideshow-container">
                    <h2 class="title">Produtos Green <i class="fa fa-leaf" aria-hidden="true"></i></h2>
                    
                    <div class="mySlides fade">
                        <div class="row">
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/0d0f3fee6fe713fe8ee322df419c75b1d0a8f296.jpg">
                                <h4>Máquina de Lavar Roupa SAMSUNG <i class="fa fa-leaf" aria-hidden="true"></i></h4>
                                <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>549,99€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/938e26790562aeca544aac40bfd994726c8a3635.jpg">
                                <h4>Frigorífico Combinado SAMSUNG <i class="fa fa-leaf" aria-hidden="true"></i></h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>579,99€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/91f3e8e48ccb4f70e3a61eec14e4c62747eb6a74.jpg">
                                <h4>Forno a Vapor AEG PlusSteam <i class="fa fa-leaf" aria-hidden="true"></i></h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>397,99€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/71c8ecb8f3bc3f18a87b551f8401f9b5f4c43c64.jpg">
                                <h4>Máquina de Lavar Loiça BOSCH <i class="fa fa-leaf" aria-hidden="true"></i></h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>529,99€</p>
                            </div>
                        </div>
                    </div>
                    <div class="mySlides fade">
                        <div class="row">
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/1a54e4f821e05c27cfd3b55ff36ac39419a584e3.jpg">
                                <h4>Frigorifico Combinado LG <i class="fa fa-leaf" aria-hidden="true"></i></h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>1249,50€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/e05fdaf39465219ddfdd9a85a7f2030ec30bc3a4.jpg">
                                <h4>Samsung TV AU7105 4K <i class="fa fa-leaf" aria-hidden="true"></i></h4>
                                <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>749,99€</p>
                            </div>
                            
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/63097c70a7d0cb9cc244e40a08d873195fa82c4e.jpg">
                                <h4>iPhone 13 Pro Max APPLE <i class="fa fa-leaf" aria-hidden="true"></i></h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>720,25€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/ffc0623613d76c39302fabbaafb98325a24ce6d4.jpg">
                                <h4>Auriculares XIAOMI <i class="fa fa-leaf" aria-hidden="true"></i></h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>13,90€</p>
                            </div>
                        </div>
                    </div>
                    <div class="mySlides fade">
                        <div class="row">
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/2856550b36e141a57eeeea28b37388536801dc23.jpg">
                                <h4>Pulseira Desportiva XIAOMI Mi Band 5 <i class="fa fa-leaf" aria-hidden="true"></i></h4>
                                <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>23,99€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/8292a96bbefc382aee4a52bb641ff99ea42bd4d5.jpg">
                                <h4>Smartphone SAMSUNG Galaxy A53 5G <i class="fa fa-leaf" aria-hidden="true"></i></h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>449,99€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/b000c4368b5a978129db816ed5fea579dadf8e38.jpg">
                                <h4>Kit Máquina Fotográfica CANON EOS M50 <i class="fa fa-leaf" aria-hidden="true"></i></h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>639,99€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/8a4801220331b2ed5fe5b25a9781cb9c23e82075.jpg">
                                <h4>Aspirador Robô IKOHS Netbot S15 <i class="fa fa-leaf" aria-hidden="true"></i></h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>149,99€</p>
                            </div>
                        </div>
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a> 
                </div>
                <div style=" text-align:center ">
                    <span class="dot" onclick="currentSlide(1)"></span> 
                    <span class="dot" onclick="currentSlide(2)"></span> 
                    <span class="dot" onclick="currentSlide(3)"></span> 
                </div>
                <a href="products.html"><button class="button button1" style=" text-align:right"><i class="fa fa-plus" aria-hidden="true"></i> Ver Mais</button></a>
                <br>
                <div class="slideshow-container">
                    <h2 class="title">Produtos Mais Vendidos</h2>
                    <div class="mySlides2 fade">
                        <div class="row">
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/d5602a1944003c66e24df24b357fc28f1b140553.jpg">
                                <h4>Jogo Nintendo Switch Sports - Nitendo</h4>
                                <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>49,99€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/68c68b95ba36bf118bf9f6b0968c65f73fdb77c5.jpg">
                                <h4>TV HISENSE 32A4BG - HD - Smart TV</h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>199,99€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/d143ac8a15c5bb61d16f7a754fe319b58be79d5a.jpg">
                                <h4>Smartphone SAMSUNG Galaxy A32</h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>229,99€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/c86f2f74f8e9c5e84e2e7a2a8d516ed84beafbf8.jpg">
                                <h4>Máquina de Café KRUPS Nespresso</h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>120,99€</p>
                            </div>
                        </div>
                    </div>
                    <div class="mySlides2 fade">
                        <div class="row">
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/9923cec0a25e60bfbd1ec441d0ed57d2b0fc91a1.jpg">
                                <h4>Portátil HP 15s-fq2032np 15.6'' Branco </h4>
                                <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>549,99€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/66642febde748eafb6189102363d9061337d1f0c.jpg">
                                <h4>Máquina de Lavar Roupa SAMSUNG</h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>1249,50€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/dc27b84d01c4f149c590665392812d9649f1b678.jpg">
                                <h4>Monitor MITSAI M24 MTM8172 - 24'' - Full HD</h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>109,99€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/6c613425d9af42850fc8449c4732d5ca2c549e30.jpg">
                                <h4>TV LG 43UP75006 LED - 43'' - 4K Ultra HD</h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>324,99€</p>
                            </div>
                        </div>
                    </div>
                    <div class="mySlides2 fade">
                        <div class="row">
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/aef54f5b145eb0b4af70617e2d66aa50b933063d.jpg">
                                <h4>Consola Nintendo Switch Modelo OLED</h4>
                                <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>349,99€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/a59841b414c1cb905faa4dcca203782dc5b4cd7c.jpg">
                                <h4>Tablet LENOVO Tab P11 Pro</h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>399,99€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/e73a83b356d5e2aaf5f284871876745b1d112be1.jpg">
                                <h4>Frigorífico Combinado Encastre TEKA</h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>649,99€</p>
                            </div>
                            <div class="col-4">
                                <img src="https://www.worten.pt/i/100ca4812c0d78fa56327c9daeee496d5373f5c2.jpg">
                                <h4>Smartphone XIAOMI Redmi Note 10S</h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <button class="button button1" style="position: relative; left: 20px;"><i class="fa fa-shopping-cart" style="font-size:24px"></i> ADICIONAR</button>
                                </div>
                                <p>189,99€</p>
                            </div>
                        </div>
                    </div>
                    <a class="prev" onclick="plusSlides2(-1)">❮</a>
                    <a class="next" onclick="plusSlides2(1)">❯</a> 
                </div>    
                <div style="text-align:center">
                    <span class="dot2" onclick="currentSlide2(1)"></span> 
                    <span class="dot2" onclick="currentSlide2(2)"></span> 
                    <span class="dot2" onclick="currentSlide2(3)"></span> 
                </div>
                <a href="products.html"><button class="button button1" style=" text-align:right"><i class="fa fa-plus" aria-hidden="true"></i> Ver Mais</button></a>
            </div>
        </div>
        <script>
        let slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
        }

        let slideIndex2 = 1;
        showSlides2(slideIndex2);
        
        function plusSlides2(n) {
            showSlides2(slideIndex2 += n);
        }
        
        function currentSlide2(n) {
            showSlides2(slideIndex2 = n);
        }
        
        function showSlides2(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides2");
            let dots = document.getElementsByClassName("dot2");
            if (n > slides.length) {slideIndex2 = 1}    
            if (n < 1) {slideIndex2 = slides.length}
            for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex2-1].style.display = "block";  
            dots[slideIndex2-1].className += " active";
        }
        </script>
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