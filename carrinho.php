<?php
include_once("valida.php");
include_once("conexao.php");
include_once("conexao2.php");
  $pdo = new PDO($dns,$dbuser,$dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$data = date("Y");




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,inicial-scale=1.0;maximum-scale=1.0">
  <link rel="stylesheet" href="css/carrinho.css">
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
  <?php
      $u_id = $usuario['id'];
      $sql = "SELECT * FROM produtos_airsoft";
      $sql = $pdo->query($sql);
      if ($sql ->rowCount()>0) {
        foreach($sql ->fetchAll() as $p ){
          $p_id = $p['id'];
          $sql = "SELECT * FROM carrinho WHERE produto_id = $p_id and cliente_id = $u_id";
          $sql = $pdo->query($sql);
          if ($sql -> rowCount()>0) {
            foreach ($sql -> fetchAll() as $c) {
              $quantidade = $c['quantidade'];
              $preco = $quantidade * $p['preco'];
              ?><div class="pb-5">
        <div style="margin-top:100px;" class="todo_cart">
          <div class="fundo_cart">
            <div class="row">
              <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                <!-- Shopping cart table -->
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" class="border-0 bg-light">
                          <div class="p-2 px-3 text-uppercase">Produtos</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                          <div class="py-2 text-uppercase">Preço</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Quantidade</div>
                  </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Remover</div>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row"  style="background-color: white;" class="border-0">
                      <div  class="p-2">
                        <img src="<?php echo $p['img'] ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0"> <a href="pagina_all.php?id=<?php echo $p['id'] ?>" class="text-dark d-inline-block align-middle"><?php echo $p['nome'] ?></a></h5><span style="color:#191d0f;" class="text-muted font-weight-normal font-italic d-block">Categoria: <?php echo $p['tipo'] ?></span>
                        </div>
                      </div>
                    </th>
                    <form action="calculo.php?id=<?php echo $c['id'] ?>" method="post">
                      <td class="border-0 align-middle"><strong><?php echo "R$ ".$preco ?></strong></td>
                       <td class="border-0 align-middle"><strong><input type="number" name="quantidade" value="<?php echo $quantidade ?>"><button type="submit" name="button">OK</button> </strong></td>
                      <td class="border-0 align-middle"><a href="delete.php?id=<?php echo $c['id'] ?>" class="text-dark"><i class="fa fa-trash"></i></a></td>
                    </form>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- End -->
          </div>
        </div>
      </div>
    </div>
  </div><?php
            }
          }
        }
      }
      $sql = "SELECT * FROM carrinho WHERE cliente_id = '$u_id'";
      $sql = $pdo->query($sql);
      if ($sql -> rowCount()<1) {
        echo "<h1 style='font-size:100px;'>Sem produtos Cadastrados</h1>";
      }
    ?>
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
