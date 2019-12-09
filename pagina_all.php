<?php
include_once("conexao.php");
include_once("valida.php");
  $data = Date("Y");
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $sql = "SELECT * FROM produtos_airsoft WHERE id='$_GET[id]'";
  $sql = $pdo-> query($sql);
  if ($sql->rowCount()>0) {
    foreach($sql ->fetchAll() as $produtos){

    }
  }
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
  <title><?php echo $produtos['nome'] ?> -  <?php echo $produtos['categoria'] ?></title>
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
              <div class="login-cadas">
                <div class="cads">
                  <a href="cadastro.php"><i class="fas fa-sign-in-alt"> Cadastro</i></a>
                </div>
                <div class="login">
                  <a href="login.php"><i class="fas fa-user-circle"> Login</i></a>
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
      <li><a href="#">Equipe</a></li>
    </ul>
</div>
<div class="mobile-container">
<div class="topnav">
    <a href="index.php">Home</a>
    <div id="myLinks">
      <a href="pagina_produtos.php?tipo=Airsoft">Airsoft</a>
      <a href="pagina_produtos.php?tipo=Paintball">Paintball</a>
      <a href="pagina_produtos.php?tipo=Arquearia">Arquearia</a>
      <a href="#">Equipe</a>
    </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<!-- End smartphone / tablet look -->
</div>
</div>
</div>
<div class="respon">
  <div class="caminho">
     <table>
       <tr>
         <th> <a href="index.php">Home</a> <i class="fas fa-angle-right"></i> </th>
         <th> <a href="<?php echo $produtos['caminho_categoria'] ?>"><?php echo $produtos['tipo'] ?></a> <i class="fas fa-angle-right"></i> </th>
         <th> <a href="<?php echo $produtos['caminho'] ?>"><?php echo $produtos['categoria'] ?></a> <i class="fas fa-angle-right"></i>  </th>
         <th> <a href="pagina_all?id=<?php echo $produtos['id'] ?>"><?php echo $produtos['nome'] ?></a> </th>
       </tr>
     </table>
     <div class="caminho-div"></div>
  </div>
        <script type="text/javascript">
          function img00() {
            document.getElementById("troca").src = "<?php echo $produtos['img'] ?>";
          }

          function img01() {
            document.getElementById("troca").src = "<?php echo $produtos['img2'] ?>";
          }

          function img02() {
            document.getElementById("troca").src = "<?php echo $produtos['img3'] ?>";
          }
        </script>
      <div class="produtos">
        <div class="produtos-img">
          <div class="outras-img">
            <img src="<?php echo $produtos['img'] ?>" onclick="img00();" alt=""><br>
            <img src="<?php echo $produtos['img2'] ?>"  onclick="img01();" alt=""><br>
            <img src="<?php echo $produtos['img3'] ?>" onclick="img02();" alt="">
          </div>
          <div class="principal-img">
            <img src="<?php echo $produtos['img'] ?>" id="troca" alt="">
          </div>
        </div>
        <div class="produtos-cont">
          <h3><?php echo $produtos['nome'] ?></h3>
          <p><span>R$ <?php echo $produtos['preco_antigo'] ?></span></p>
          <p class="preco">R$ <?php echo $produtos['preco'] ?></p>
          <p class="avista">R$ <?php echo $produtos['avista'] ?> À VISTA  OU</p>
          <p class="parcelas"><span>10X DE </span> R$ <?php echo $produtos['parcelas'] ?> <span> SEM JUROS</span></p>
          <div class="produtos-comprar">
            <a href="favorito.php?id=<?php echo $produtos['id'] ?>">Comprar</a>
          </div>
        </div>
      </div>
      <div class="tipo">
        <h3>Outros produtos da categoria <span>"<?php echo $produtos['categoria'] ?>"</span> </h3>
      </div>

      <div class="demo">
        <ul id="lightSlider">
          <?php
          $sql = "select * from produtos_airsoft where categoria = '$produtos[categoria]'";
          $sql = $pdo->query($sql);
          if ($sql->rowCount()>0) {
            foreach($sql->fetchAll() as $slider){
              ?>
              <li class="slide">
                <a href="pagina_all.php?id=<?php echo $slider['id'] ?>" class="linkzada" ><img src="<?php echo $slider['img'] ?>" alt="" >
                <p style="font-size:14px;border-bottom:2px solid #89BF00;height: 50px;"><?php echo $slider['nome'] ?></p>
                <p ><?php echo "<span style='font-size:18px;'>R$ ".$slider['avista']."</span><span style='color:green;font-size:16px;'> à vista no boleto</span>" ?></p>
                <p ><?php echo "ou <span style='color:green;font-size:18px;'>13x</span> de "."<span style='color:green;'>".$slider['parcelas']."</span>" ?></p>
                </a>
                <div class="slide_links">
                    <a class="comp" href="pagina_all.php?id=<?php echo $slider['id'] ?>" role="button">Comprar</a>
                    <a class="fav" style="cursor:pointer" onclick="adicionado()" href="favorito.php?id=<?php echo $slider['id'] ?>&caminho=<?php echo $url ?>" id="link"  name="favorito"><i class="fas fa-cart-plus"></i></a>
                </div>
              </li>
              <?php
            }
          }
           ?>
        </ul>
        <?php
        if ($sql->rowCount()>4) {
          ?>
          <button class="ante" type="button" id="goToPrevSlide"><i class="fas fa-angle-left"></i></button>
          <button class="prox" type="button" id="goToNextSlide"><i class="fas fa-angle-right"></i></button>
          <?php
        }
         ?>
      </div>
      <div class="sem_slide">
        <?php
        $sql = "select * from produtos_airsoft where categoria='$produtos[categoria]'";
        $sql = $pdo->query($sql);
        if ($sql->rowCount()>0) {
          foreach($sql -> fetchAll() as $sem_slide){
            ?>
            <div class="itens">
            <div class="item">
              <a href="pagina_all.php?id=<?php echo $sem_slide['id'] ?>"><img class="card-img-top" src="<?php echo $sem_slide['img']; ?>"></a>
              <div class="card-body">
                <h3  class="card-title"><?php echo $sem_slide['nome'] ?></h3>
                <p class="card-text" id="preco_avista" ><?php echo "<span style ='font-size:18px;'>R$ ".$sem_slide['avista']."</span><span style='color:green;'> à vista no boleto</span>" ?></p>
                <p  class="card-text" id="preco_parcelas"><?php echo "ou <span style='color:green;'>13x</span> de "."<span style='color:green;'>".$sem_slide['parcelas']."</span>" ?></p>
                <div class="item_links">
                    <a class="comp" href="pagina_all.php?id=<?php echo $sem_slide['id'] ?>" role="button">Comprar</a>
                    <a class="fav" style="cursor:pointer" onclick="adicionado()" href="favorito.php?id=<?php echo $sem_slide['id'] ?>&caminho=<?php echo $url ?>" id="link"  name="favorito"><i class="fas fa-cart-plus"></i></a><br><br>
                </div>
            </div>
            </div>
            </div>
            <?php
          }
        }
         ?>
      </div>
      <div class="produtos-cont2">

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
    <div class="cont_ultimo">
      <h3>Quem somos nós ?</h3>
      <p>Somos uma empresa de armas de entreterimento e caça dentre elas tem airsoft, paintball e arquearia.</p>
    </div>
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.0/holder.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.5/js/lightslider.min.js" charset="utf-8"></script>
<script  src="js/slider.js"></script>
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
</body>
</html>
