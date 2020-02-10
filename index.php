<?php
    include_once("conexao.php");
    include_once("valida.php");

    $pdo = new PDO($dns,$dbuser,$dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $data = date("Y");
 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,inicial-scale=1.0;maximum-scale=1.0">
  <link rel="icon" type="image/png" href="img/logo_veridico.png" sizes="64x64">
  <link rel="stylesheet" href="css/produtos.css">
  <link href="https://fonts.googleapis.com/css?family=Hind+Guntur|Merriweather+Sans|Roboto+Slab&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <title>ShooterSoft</title>
</head>

<body>
  <header>
         <div class="respon">
        <?php
          if(isset($_SESSION['usuario'])){
          ?><div class="perfil"><?php
            ?>
                    <?php $nome = $_SESSION['usuario'];

                    $sql = "SELECT * FROM usuario WHERE email LIKE '$nome'";
                    $sql = $pdo-> query($sql); ?>

                    <?php
                    if ($sql -> rowCount() > 0) {
                        foreach ($sql -> fetchAll() as $usuario) {
                          $img_perfil = $usuario['sem_img'];
                          ?>
                          <div class="img">
                              <?php
                              if (empty($usuario['img']) == true) {
                                ?>
                                <img src="<?php echo $usuario['sem_img']; ?>" alt="">
                                <?php
                              }
                              else {
                                ?>
                                <img src="<?php echo $usuario['img'] ?>" alt="">
                                <?php
                              }
                               ?>

                          </div>
                          <div class="conteudo">
                            <h3><?php echo $usuario['nome'] ?></h3>
                            <a href="logout.php?id=<?php echo $usuario['id'] ?>&&url=<?php echo $url ?>">Logout</a><br>
                            <a href="editar_perfil.php?id=<?php echo $usuario['id'] ?>.php">Editar perfil</a>
                          </div>
                          <?php
                        }
                      }
                     ?>
             </div>
            <?php
          }else{
              ?>
              <div class="login-cadas">
                <div class="cads">
                  <a href="cadastro.php"><i class="fas fa-sign-in-alt"> Cadastro</i></a>
                </div>
                <div class="login">
                  <a href="login.php?url=<?php echo $url ?>"><i class="fas fa-user-circle"> Login</i></a>
                </div>
              </div>
              <?php
          }
           ?>
           <div class="logo">
              <a href="index.php"><img src="img/logo_veridico2.png" alt=""></a>
      </div>
        <form action="pesquisa.php" method="POST">
        <div class="pesquisa">
          <input type="search" placeholder="Buscar..." name="pesquisa">
          <button type="submit" name="butao"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
        </form>
      </div>
      <div class="respon">
      <div class="txt">
        <div class="cart">
            <a href="confirma_car.php"><i class="fas fa-shopping-cart"></i></a>
          </div>
        </div>
  </header>
  <div class="fundo">
  <div class="menu">
    <ul class="menu-list">
      <li><a href="index.php">Home</a></li>
      <li>
        <a href="pagina_produtos.php?tipo=Airsoft">Airsoft</a>
         <ul class="sub-menu">
          <li><a href="pagina_produtos.php?categoria=Pistolas&&tipo=Airsoft">Pistolas</a></li>
          <li><a href="pagina_produtos.php?categoria=Rifles&&tipo=Airsoft">Rifles</a></li>
          <li><a href="pagina_produtos.php?categoria=Escopetas&&tipo=Airsoft">Escopetas</a></li>
             <li><a href="pagina_produtos.php?categoria=Acessorios&&tipo=Airsoft">Acessórios</a></li>
        </ul>
      </li>
      <li><a href="pagina_produtos.php?tipo=Paintball">Paintball</a></li>
      <li><a href="pagina_produtos.php?tipo=Arquearia">Arquearia</a></li>
      <li><a href="equipe.php">Equipe</a></li>
    </ul>
</div>
<div class="mobile-container">
<div class="topnav">
    <a href="index.php">Home</a>
    <div id="myLinks">
      <a href="pagina_produtos.php?tipo=Airsoft">Airsoft</a>
      <a href="pagina_produtos.php?tipo=Paintball">Paintball</a>
      <a href="pagina_produtos.php?tipo=Arquearia">Arquearia</a>
      <a href="equipe.php">Equipe</a>
    </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<!-- End smartphone / tablet look -->
</div>
</div>
</div>
  <div class="s">
    <div class="slideshow-container">
      <?php $sql = "SELECT * FROM produtos_airsoft WHERE slide='1'";
            $sql = $pdo->query($sql);
            if ($sql -> rowCount()>0) {
              foreach ($sql->fetchAll() as $slide) {
                ?>
                <div class="mySlides fade">
                  <a href="pagina_all.php?id=<?php echo $slide['id'] ?>"><img src="<?php echo $slide['img_slide'] ?>"></a>
                </div>
                <?php
              }
            }
      ?>
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <div style='text-align: center;'>
      <span class="dot" onclick='currentSlide(1)'></span>
      <span class="dot" onclick='currentSlide(2)'></span>
      <span class="dot" onclick='currentSlide(3)'></span>
    </div>
    <br>
    <script>
      var slideIndex = 1;

      var myTimer;

      window.addEventListener("load", function() {
        showSlides(slideIndex);
        myTimer = setInterval(function() {
          plusSlides(1)
        }, 3000);
      })



      // NEXT AND PREVIOUS CONTROL
      function plusSlides(n) {
        clearInterval(myTimer);
        if (n < 0) {
          showSlides(slideIndex -= 1);
        } else {
          showSlides(slideIndex += 1);
        }
        if (n === -1) {
          myTimer = setInterval(function() {
            plusSlides(n + 2)
          }, 3000);
        } else {
          myTimer = setInterval(function() {
            plusSlides(n + 1)
          }, 3000);
        }
      }

      function currentSlide(n) {
        clearInterval(myTimer);
        myTimer = setInterval(function() {
          plusSlides(n + 1)
        }, 3000);
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
          slideIndex = 1
        }
        if (n < 1) {
          slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
      }
    </script>
    <div class="respon">
      <div class="descontos">
        <img src="img/desconto1.png" style="height: 30px; margin-right: 50px;">
        <img src="img/desconto2.png" style="height: 30px; margin-right: 50px;">
        <img src="img/desconto3.png" style="height: 30px; margin-right: 50px;">
        <img src="img/desconto4.png" style="height: 30px;">
      </div>
      <div class="borda">
      <h2 style="text-align:center;">Mais vendidos</h2>

      <?php
          $sql = "SELECT * FROM produtos_airsoft WHERE mais_vendidos LIKE '1'";
          $sql = $pdo-> query($sql);
      if ($sql -> rowCount() > 0) {
          foreach ($sql -> fetchAll() as $produto) {
            $img = $produto['img'];
        ?>
        <script type="text/javascript">
         function adicionado()
         {
          alert("Seu produto foi adicionado com sucesso! ");
          }
        </script>
        <div class="itens">
        <div class="item">
          <a href="pagina_all.php?id=<?php echo $produto['id'] ?>"><img class="card-img-top" src="<?php echo $img; ?>"></a>
          <div class="card-body">
            <h3  class="card-title"><?php echo $produto['nome'] ?></h3>
            <p class="card-text" id="preco_avista" ><?php echo "<span style ='font-size:18px;'>R$ ".$produto['avista']."</span><span style='color:green;'> à vista no boleto</span>" ?></p>
            <p  class="card-text" id="preco_parcelas"><?php echo "ou <span style='color:green;'>13x</span> de "."<span style='color:green;'>".$produto['parcelas']."</span>" ?></p>
            <div class="item_links">
                <a class="comp" href="pagina_all.php?id=<?php echo $produto['id'] ?>" role="button">Comprar</a>
                <a class="fav" style="cursor:pointer" onclick="adicionado()" href="favorito.php?id=<?php echo $produto['id'] ?>&caminho=index.php" id="link"  name="favorito"><i class="fas fa-cart-plus"></i></a><br><br>
            </div>
        </div>
        </div>
        </div>
      <?php
       }
     }
        ?>
       </div>
       <div class="borda">
      <h2 style="text-align:center;">Em promoção</h2>
      <?php
      $data = date('Y');
      $pdo = new PDO($dns,$dbuser,$dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

      $sql = "SELECT * FROM produtos_airsoft WHERE promocao LIKE '1'";
      $sql = $pdo-> query($sql);

        if ($sql -> rowCount() > 0) {
            foreach ($sql -> fetchAll() as $produto) {
              $img = $produto['img'];
          ?>

          <div class="itens">
          <div class="item">
            <a href="pagina_all.php?id=<?php echo $produto['id'] ?>"><img class="card-img-top" src="<?php echo $img; ?>"></a>
            <div class="card-body">
              <h3  class="card-title"><?php echo $produto['nome'] ?></h3>
              <p class="card-text" id="preco_avista" ><?php echo "<span style ='font-size:18px;'>R$ ".$produto['avista']."</span><span style='color:green;'> à vista no boleto</span>" ?></p>
              <p  class="card-text" id="preco_parcelas"><?php echo "ou <span style='color:green;'>13x</span> de "."<span style='color:green;'>".$produto['parcelas']."</span>" ?></p>
              <div class="item_links">
                  <a class="comp" href="pagina_all.php?id=<?php echo $produto['id'] ?>" role="button">Comprar</a>
                  <a class="fav" style="cursor:pointer" onclick="adicionado()" href="favorito.php?id=<?php echo $produto['id'] ?>&caminho=index.php" id="link"  name="favorito"><i class="fas fa-cart-plus"></i></a><br><br>
              </div>
          </div>
          </div>
          </div>
             <?php
             }
           }
           ?>

    </div>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small cyan darken-3">

      <!-- Footer Elements -->
      <div class="container">

        <!-- Grid row-->
        <div class="row">
          <div class="respon">
          <!-- Grid column -->
          <div class="col-md-12 py-5">
            <div class="mb-5 flex-center">

              <a class="fb-ic" href="https://www.facebook.com/ShooterSoft-113889746662685" target="_blank">
                <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
              </a>
              <a class="tw-ic" href="https://twitter.com/ShooterSoft" target="_blank">
                <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
              </a>

              <a class="gplus-ic" href="#" target="_blank">
                <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
              </a>

              <a class="li-ic" href="https://github.com/DrakonZX/ShooterSoft" target="_blank">
                <i class="fab fa-github"></i>
              </a>

              <a class="ins-ic" href="https://www.instagram.com/shootersoft/?hl=pt-br" target="_blank">
                <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
              </a>

              <a class="pin-ic" href="equipe.php" target="_blank">

                <i class="fas fa-question"></i>

              </a>
            </div>
          </div>
        </div>
        </div>


      </div>
      <div class="container-2">
      <div class="respon">
        <div class="cont">
          <div class="cont_primeiro">
        <h3>Integrantes:</h3>
        <h5>Flavio Henrique</h5>
        <h5>Juliano Gomes Tosta</h5>
        <h5>Ryan Henrique</h5>
        <h5>Natã Tidioli</h5>
        <h5>Lucius Muniz</h5>
        </div>
        </div>
      <div class="cont">
        <div class="cont_meio">
          <h3>Quem somos nós ?</h3>
          <p>Somos uma empresa<br> de armas de entreterimento<br> e caça dentre elas <br>tem airsoft, paintball<br> e arquearia.</p>
        </div>
      </div>

      <div class="cont">
      <div class="cont_ultimo">
      <h3>Categorias: </h3>
      <h5>Airsoft</h5>
      <h5>Paintball</h5>
      <h5>Arquearia</h5>
      <h5>Customização (em breve)</h5><br>
      </div>
      </div>
      </div>

      <div class="footer_risco"></div>

      <div class="footer_img">
      <div class="respon">
      <h3>Formas de pagamento</h3>
      <img class="google" src="img/google-site-seguro.png" alt="">
      <img class="credito" src="img/imagem.webp" alt="">
      </div>
      </div>
      </div>
      <!-- Copyright -->
      <div class="copy">
        <div class="footer-copyright text-center py-3">© <?php echo $data ?> Copyright:
          <a href="index.php"> ShooterSoft.com.br</a>
        </div>
      </div>

      <!-- Copyright -->

    </footer>
    <!-- Fechamento Foooter -->
    <script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
   <script src="http://code.jquery.com/jquery-3.4.1.min.js"
   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
   crossorigin="anonymous"></script>
   </body>
   </html>
