<?php
  include 'valida.php';
  include 'conexao.php';
  $data = date("Y");
 ?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,inicial-scale=1.0;maximum-scale=1.0">
      <link rel="icon" type="image/png" href="img/logo_veridico.png" sizes="64x64">
    <link rel="stylesheet" href="css/produtos.css">
    <link href="https://fonts.googleapis.com/css?family=Hind+Guntur|Merriweather+Sans|Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Equipe - Airsoft</title>
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
                                <a href="logout.php?id=<?php echo $usuario['id'] ?>">Logout</a><br>
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
    <div class="respon">
      <div class="equipe_cont">
          <h2>Seja bem vindo <span>"<?php echo $usuario['nome'] ?>"</span> essa é nossa equipe </h2>
        <div class="p">
          <img src="img/bandido.jpg" alt="">
          <h3>Flavio Henrique</h3>
          <p>A pessoa de equipe focada em preparar toda a documentação do site.</p>
        </div>
        <div class="s">
          <img src="img/cheideolho.jpg" alt="">
          <h3>Natã Tidioli</h3>
          <p>Formatação do CSS e imagens.</p>
        </div>
        <div class="p">
          <img src="img/ryan.jpg" alt="">
          <h3>Ryan Henrique</h3>
          <p>Criador do Banco de Dados de nossa equipe, cadastro/login,barra de pesquisa.</p>
        </div>
        <div class="q">
          <img src="img/lucius.jpg" alt="">
          <h3>Lucius Muniz</h3>
          <p>Marketing do nosso site e ajudante em horas vagas.</p>
        </div>
        <div class="p">
          <img src="img/eu.jpg" alt="">
          <h3>Juliano Gomes Tosta</h3>
          <p>Programador e coordenador do grupo</p>
        </div>
      </div>
    </div>

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
      <h3>Formas de pagamento</h3><div class="respon">
      <img class="google" src="img/google-site-seguro.png" alt="">
      <img class="credito" src="img/imagem.webp" alt="">
    </div>
      </div>
      </div>
      </div>
      <!-- Copyright -->
      <div class="copy">
        <div class="footer-copyright text-center py-3">© <?php echo $data ?> Copyright:
          <a href="index.php">ShooterSoft.com.br</a>
        </div>
      </div>

      <!-- Copyright -->

    </footer>
  </body>
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
</html>
