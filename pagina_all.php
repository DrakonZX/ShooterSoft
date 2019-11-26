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
  <link type="text/css" rel="stylesheet" href="css/lightslider.css" />
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
                      <img src="<?php echo $img ?>" alt=""  id="troca">
                  </div>
                </div>
                <div class="card-body">
                  <br><br>
                  <h2 class="card-title"><?php echo $produto['nome'] ?></h2>
                  <p style="font-size:20px;text-decoration: line-through;color:gray;" class="card-text"><?php echo "R$"." ".$produto['preco_antigo'] ?></p>
                  <p style="font-size:30px;" class="card-text"><?php echo "R$"." ".$produto['preco'] ?></p>
                  <p style="font-size:30px;" class="card-text"><?php echo "OU <span style='color:green;'>10x</span> DE "."<span style='color:green;'> R$ ".$produto['parcelas']."<span style='color:black;font-size:19px;'> sem juros</span></span>" ?></p><br>
                  <a id="comprar" href="favorito.php?id=<?php echo $produto['id']?>&caminho=pagina_all.php?id=<?php echo $produto['id']?>">Comprar</a>
                  <div class="calcular_frete">
                    <form class="" action="" method="post">

                      <input type="text" name="frete" value="" placeholder="">
                      <button type="submit" name="">OK</button>
                      <div class="neo"><p>Calcular Frete</p></div>
                    </form>
                  </div>
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
  </div>
  </div>
  <div class="container">
    <div class="respon">
      <div class="row align-items-start">
        <div class="col">
          <h4>Sobre nós</h4><br>
          <p>Somos uma empresa de vendas online com o foco em armas para treino e diversão.<br>(Paintball, Airsoft e Arcos)</p>
        </div>
        <div class="col">
          <div class="links1">
            <a
              href="https://www.google.com/maps/place/Av.+Bahia,+Microrregi%C3%A3o+de+Caraguatatuba+-+SP/@-23.6320208,-45.4259223,17z/data=!3m1!4b1!4m5!3m4!1s0x94cd6312a97556f9:0x8cacdb175a953749!8m2!3d-23.6320257!4d-45.4237336" target="_blank"
              ><i class="fas fa-map-marker-alt"></i> Avenida Bahia.</a><br><br>
            <a href="#" ><i class="fas fa-phone"></i> +12 3888-8888</a><br><br>
            <a href="https://accounts.google.com/" target="_blank"><i class="far fa-envelope"></i> shootersoft5@gmail.com</a><br><br>
          </div>
        </div>
        <div class="col">
          <div class="links">
            <h4>Links</h4><br>
             <a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a>
             <a href="https://www.facebook.com/ShooterSoft-113889746662685" target="_blank"><i class="fab fa-facebook-square"></i></a>
             <a href="https://twitter.com/ShooterSoft" target="_blank"><i class="fab fa-twitter-square"></i></a><br>
             <a href="#"><i class="fab fa-linkedin" target="_blank"></i></a>
             <a href="https://www.instagram.com/shootersoft/?hl=pt-br" target="_blank"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright">
    <h5 id="down">Shooter Soft © <?php echo $data ?> Copyright</h5>
  </div>

  <!-- Fechamento Foooter -->
  <script src="http://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
      <script>
      $('nav.menu-mobile h2').click(function()
          {
              $('nav.menu-mobile ul').slideToggle(); //função do jQuery
          })
      </script>
</body>

</html>
