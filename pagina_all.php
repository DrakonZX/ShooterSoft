<?php
include_once("conexao.php");
include_once("valida.php");
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$data = date("Y");

  if (isset($_GET['id'])) {
    $categoria = "SELECT * FROM produtos_airsoft WHERE id='$_GET[id]'";
    $categoria = $pdo-> query($categoria);
    if ($categoria->rowCount()>0) {
      foreach ($categoria->fetchAll() as $nsei) {
      }
    }
  }


 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,inicial-scale=1.0;maximum-scale=1.0">
  <link rel="stylesheet" href="css/pagina_all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Hind+Guntur|Merriweather+Sans|Roboto+Slab&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
  <title>Acessórios Airsoft -  ShooterSoft</title>
</head>

<body>
  <header>
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
                              <h3><?php echo $usuario['nome'];
                               ?></h3>
                              <a href="logout.php">Logout</a><br>
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
                <div class="cads">
                  <a href="cadastro.php"><i class="fas fa-sign-in-alt"> Cadastro</i></a>
                </div>
                <div class="login">
                  <a href="login.php"><i class="fas fa-user-circle"> Login</i></a>
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
        <a href="airsoft.php">Airsoft</a>
         <ul class="sub-menu">
          <li><a href="pistola.php">Pistolas</a></li>
          <li><a href="rifle.php">Rifles</a></li>
          <li><a href="escopeta.php">Escopetas</a></li>
             <li><a href="acessorios_airsoft.php">Acessórios</a></li>
        </ul>
      </li>
      <li><a href="paintball.php">Paintball</a></li>
      <li><a href="arquearia.php">Arquearia</a></li>
      <li><a href="#  ">Equipe</a></li>
    </ul>
  </div>
  </div>
  <div class="respon">
    <div class="caminho">
       <table>
         <tr>
           <th> <a href="index.php">Home</a> <i class="fas fa-angle-right"></i> </th>
           <th> <a href="<?php echo $nsei['categoria_caminho'] ?>"><?php echo $nsei['tipo'] ?></a> <i class="fas fa-angle-right"></i> </th>
           <th> <a href="<?php echo $nsei['caminho'] ?>"><?php echo $nsei['categoria'] ?></a> <i class="fas fa-angle-right"></i>  </th>
           <th> <a href="pagina_all?id=<?php echo $nsei['id'] ?>"><?php echo $nsei['nome'] ?></a> </th>
         </tr>
       </table>
       <div class="caminho-div"></div>
    </div>
          <script type="text/javascript">
            function img00() {
              document.getElementById("troca").src = "<?php echo $nsei['img'] ?>";
            }

            function img01() {
              document.getElementById("troca").src = "<?php echo $nsei['img2'] ?>";
            }

            function img02() {
              document.getElementById("troca").src = "<?php echo $nsei['img3'] ?>";
            }
          </script>
        <div class="itens">
          <div class="itens-img">
            <div class="outras-img">
              <img src="<?php echo $nsei['img'] ?>" onclick="img00();" alt=""><br>
              <img src="<?php echo $nsei['img2'] ?>"  onclick="img01();" alt=""><br>
              <img src="<?php echo $nsei['img3'] ?>" onclick="img02();" alt="">
            </div>
            <div class="principal-img">
              <img src="<?php echo $nsei['img'] ?>" id="troca" alt="">
            </div>
          </div>
          <div class="itens-cont">
            <h3><?php echo $nsei['nome'] ?></h3>
            <p><span>R$ <?php echo $nsei['preco_antigo'] ?></span></p>
            <p class="preco">R$ <?php echo $nsei['preco'] ?></p>
            <p class="avista">R$ <?php echo $nsei['avista'] ?> À VISTA  OU</p>
            <p class="parcelas"><span>10X DE </span> R$ <?php echo $nsei['parcelas'] ?> <span> SEM JUROS</span></p>
            <div class="itens-comprar">
              <a href="favorito.php?id=<?php echo $nsei['id'] ?>">Comprar</a>
            </div>
          </div>
        </div>
        <div class="tipo">
          <h3>Outros produtos do tipo <span>"<?php echo $nsei['tipo'] ?>"</span> </h3>
        </div>
        <div class="demo">
          <ul id="slider">
            <?php
            $sql = "select * from produtos_airsoft where tipo = '$nsei[tipo]'";
            $sql = $pdo->query($sql);
            if ($sql->rowCount()>0) {
              foreach($sql->fetchAll() as $slider){
                ?>
                <li class="slide">
                  <a href="pagina_all.php?id=<?php echo $slider['id'] ?>" class="linkzada" ><img src="<?php echo $slider['img'] ?>" alt="" >
                  <p style="margin-top:10px; font-size:14px;border-top:2px solid #1c5400;padding-top:10px;"><?php echo $slider['nome'] ?></p>
                  <p style="font-size:17px;">à vista no boleto R$ <span><?php echo $slider['avista'] ?></span> </p>
                  </a>
                </li>
                <?php
              }
            }
             ?>
          </ul>
        </div>

           <!--Fechamento TODOS OS ITENS -->
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

          <a class="fb-ic" href="#">
            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <a class="tw-ic" href="#">
            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>

          <a class="gplus-ic" href="#">
            <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>

          <a class="li-ic" href="#">
            <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>

          <a class="ins-ic" href="#">
            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>

          <a class="pin-ic" href="#">
            <i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
          </a>
        </div>
      </div>
    </div>
    </div>


  </div>
  <div class="container-2">
    <div class="respon">
    <div class="cont">
      <h3>Quem somos nós ?</h3>
      <p>Somos uma empresa de armas de entreterimento e caça dentre elas tem airsoft, paintball e arquearia.</p>
    </div>
    <div class="cont">
      <h3>Quem somos nós ?</h3>
      <p>Somos uma empresa de armas de entreterimento e caça dentre elas tem airsoft, paintball e arquearia.</p>
    </div>
    <div class="cont">
      <h3>Quem somos nós ?</h3>
      <p>Somos uma empresa de armas de entreterimento e caça dentre elas tem airsoft, paintball e arquearia.</p>
    </div>
   </div>

  <div class="footer_risco"></div>

  <div class="footer_img">
    <div class="respon">
    <h3>Formas de pagamento</h3>
    <img style="height:100px;width:300px;margin-bottom:100px;margin-right:150px;" src="img/google-site-seguro.png" alt="">
    <img src="img/credito.png" alt="">
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
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script><script  src="js/slider.js"></script>
        <script>
        $('nav.menu-mobile h2').click(function()
            {
                $('nav.menu-mobile ul').slideToggle(); //função do jQuery
            })
        </script>
</body>
</html>
