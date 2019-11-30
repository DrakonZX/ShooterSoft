<?php
include_once("conexao.php");
include_once("valida.php");
$data = date("Y");
  $pdo = new PDO($dns,$dbuser,$dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

     if (isset($_GET['id']) && empty($_GET['id']) == false) {
         $id = addslashes($_GET['id']);
         $sql = "SELECT * FROM produtos_airsoft WHERE id='$id'";
         $sql = $pdo->query($sql);
     }


 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,inicial-scale=1.0;maximum-scale=1.0">
  <link rel="stylesheet" href="css/pagina_all.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/lightslider.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Hind+Guntur|Merriweather+Sans|Roboto+Slab&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <?php
   if ($sql -> rowCount() > 0) {
       foreach ($sql -> fetchAll() as $produto) {
           $img = $produto['img'];
           $img2 = $produto['img2'];
           $img3 = $produto['img3']; ?>
  <title>ShooterSoft - <?php echo $produto['nome'] ?></title>
  <?php
       }
   }
  ?>
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
 </div>
  <div class="respon">
    <div class="path">
      <table>
        <tr>
          <th> <a href="index.php">Home</a> > </th>
          <th> <a href="<?php echo $produto['caminho_categoria'] ?>"><?php echo $produto['tipo'] ?></a> > </th>
          <th> <a href="<?php echo $produto['caminho'] ?>"><?php echo $produto['categoria'] ?></a> > </th>
          <th><a href="#"><?php echo $produto['nome'] ?></a> </th>
    </tr>
    </table>
    </div>
    <script type="text/javascript">
      var $easyzoom = $('.easyzoom').easyZoom();
      function img00() {
        document.getElementById("troca").src = "<?php echo $img ?>";
      }

      function img01() {
        document.getElementById("troca").src = "<?php echo $img2 ?>";
      }

      function img02() {
        document.getElementById("troca").src = "<?php echo $img3 ?>";
      }
    </script>
    <div class="produtos">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-3">
            <div class="card">
              <div class="card-horizontal">
                <div class="imagens_secundarias">
                  <ul>
                    <li><img src="<?php echo $img ?>" alt="" onclick="img00();" style="cursor:pointer"></li>
                    <li><img src="<?php echo $img2 ?>" alt="" onclick="img01();" style="cursor:pointer"></li>
                    <li><img src="<?php echo $img3 ?>" alt="" onclick="img02();" style="cursor:pointer"></li>
                  </ul>
                </div>
                <div class="img-square-wrapper">
                        <img src="<?php echo $img ?>" id="troca" alt="" width="640" height="360" />
                 </div>
                </div>
                <div class="card-body">
                  <br><br>
                  <h2 class="card-title"><?php echo $produto['nome'] ?></h2>
                  <p style="font-size:14px;text-decoration: line-through;color:gray;" class="card-text"><?php echo "R$"." ".$produto['preco_antigo'] ?></p>
                  <p style="font-size:20px;" class="card-text"><?php echo "R$"." ".$produto['preco'] ?></p>
                  <p style="font-size:20px;" class="card-text"><?php echo "OU <span style='color:green;'>10x</span> DE "."<span style='color:green;'> R$ ".$produto['parcelas']."<span style='color:black;font-size:19px;'> sem juros</span></span>" ?></p><br>
                  <a id="comprar" href="favorito.php?id=<?php echo $produto['id']?>">Comprar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carac">
        <br><br><br>
        <h3>Descrição: <?php echo $produto['nome'] ?></h3><br>
        <ul>
          <li><span>Marca:</span> <?php echo $produto['marca'] ?></li>
          <li><span>Peso:</span> <?php echo $produto['peso']." kg" ?></li>
          <li><span>Sistema:</span> <?php echo $produto['sistema'] ?></li>
          <li><span>Modo de disparo:</span> <?php echo $produto['disparo'] ?></li>
          <li><span>Calibre:</span> <?php echo $produto['calibre']." mm" ?></li>
          <li><span>Comprimento:</span> <?php echo $produto['comprimento']." cm" ?></li>
          <li><span>Altura:</span> <?php echo $produto['altura']." cm" ?></li>
          <li><span>Mira:</span> <?php echo $produto['mira'] ?></li>
          <li><span>Bateria:</span> <?php echo $produto['bateria'] ?></li>
          <li><span>Material:</span> <?php echo $produto['material'] ?></li>
        </ul>
      </div>
    </div>
    <script>
    $(document).ready(function() {
      $("#content-slider").lightSlider({
        auto: true,
        item: 5,
        loop: true,
        controls: true,
        speed: 250,
        pause: 3000,
        keyPress: true,
        mode: 'slide',
        responsive: [{
          breakpoint: 767,
          settings: {
            item: 3,
            slideMove: 1,
            slideMargin: 6,
          }
        }, {
          breakpoint: 481,
          settings: {
            item: 1,
            slideMove: 1
          }
        }]
      });

    });
     </script>
     <ul style="border:2px solid red;" id="content-slider" class="content-slider">
     <?php
     $sql = "select * from produtos_airsoft where tipo='$produto[tipo]'";
     $sql=$pdo->query($sql);
     if ($sql->rowCount()>0) {
       foreach($sql->fetchAll() as $outros){
         ?>
          <li style="background-color:white;border-radius:50px;">
            <a style="color:#161C08;" href="pagina_all.php?id=<?php echo $outros['id'] ?>"><img style="height:150px;width:150px;margin-left:50px;margin-top:10px;" src="<?php echo $outros['img'] ?>" alt="">
              <p style="text-align:justify;width:200px;margin-left:50px;height:60px;"><?php echo $outros['nome'] ?></p>
             </a>
          </li>
         <?php
       }
     }
      ?>
    </ul>

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
      <script>
      $('nav.menu-mobile h2').click(function()
          {
              $('nav.menu-mobile ul').slideToggle(); //função do jQuery
          })
      </script>
</body>

</html>
