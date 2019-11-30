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
  <?php
      $u_id = $usuario['id'];
      $sql = "SELECT * FROM carrinho WHERE cliente_id = '$u_id'";
      $sql = $pdo->query($sql);
      if ($sql -> rowCount()<1) {
        echo "<h1 style='font-size:20px;text-align:center;'>Sem produtos Cadastrados</h1>";
      }
      else {
        ?>
        <div class="carrinho">
        <div class="respon">
          <table>
            <tr>
                <th style="padding-left: 300px;">Produtos</th>
                <th style="padding-left:240px;">Quantidade</th>
                <th style="padding-left:180px;"> Preço</th>
            </tr>
          </table>
          <div class="divisao"></div>
        </div>
        <?php
      }
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
              $soma = $preco + $preco;
              ?>
              <div class="respon">
              <table>
                <tr>
                  <div class="produto">
                  <td><a href="pagina_all.php?id=<?php echo $p['id'] ?>"><img src="<?php echo $p['img'] ?>" alt=""></a> </td>
                  <td style="padding-left: 150px;width:450px;text-align:justify;"><?php echo $p['nome'] ?></td>
                  <form class="" id="qtd_<?php echo $p['id']; ?>" action="calculo.php?id=<?php echo $p['id']; ?>" method="post">
                    <td style="padding-left: 0px;">
                      <select class="" name="quantidade" onchange="document.getElementById('qtd_<?php echo $p['id']; ?>').submit()">
                      <option name='quantidade'><?php echo $quantidade ?></option>
                      <option name='quantidade' value="1">1</option>
                      <option name='quantidade' value="2">2</option>
                      <option name='quantidade' value="3">3</option>
                      <option name='quantidade' value="4">4</option>
                      <option name='quantidade' value="5">5</option>
                    </select>
                   </td>
                  </form>
                  <td style="padding-left: 220px;"><?php echo "$ ".$preco ?></td>
                  <td style="padding-left: 100px;"><a href="delete.php?id=<?php echo $p['id'] ?>">Trash</a></td>
                </tr>
              </div>
              </table>
              <div class="divisao"></div>
             </div>
              <?php
            }
          }
        }
      }
      $sql = "SELECT * FROM carrinho WHERE cliente_id = '$u_id'";
      $sql = $pdo->query($sql);
      if ($sql -> rowCount()>0) {
      $sql = "SELECT SUM(soma) from soma_total where cliente_id='$u_id'";
      $sql = $pdo->query($sql);
      if ($sql->rowCount()>0) {
        foreach($sql -> fetchAll() as $soma_total){
          $soma = $soma_total['SUM(soma)'];
          $avista = $soma - ($soma * 0.13);
          $parcelas = $soma / 10;
        }
        ?>
        <div class="som_total">
          <div class="conteudo">
            <table>
              <tr>
                <th style="padding:0;">Soma total: R$ <?php echo $soma ?></th>
                <th style="margin:0;">Preço da compra à vista: R$ <?php echo $avista ?> </th>
                <th style="margin:0;">Preço da compra no cartão: 10x <?php echo $parcelas ?></th>
              </tr>
              <tr>
                <td></td>
                <td style="padding:0;"><a href="#">Finalizar Compra</a> </td>
              </tr>
            </table>
          </div>
        </div>
        <?php
  }
}
     ?>
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
    <h3 style="color:#E8FFC6;">Formas de pagamento</h3>
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
