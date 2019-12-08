<?php
  include_once 'valida.php';
  include_once 'conexao.php';
  $data = date("Y");
  $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  if (isset($_GET['categoria']) && isset($_GET['tipo'])) {
     $sql = "SELECT * FROM produtos_airsoft where categoria='$_GET[categoria]' and  tipo='$_GET[tipo]'";
     $sql = $pdo->query($sql);
     if ($sql->rowCount()>0) {
       foreach ($sql -> fetchAll() as $produtos) {
       }
     }
  }
  else {
    $sql = "SELECT * FROM produtos_airsoft where tipo='$_GET[tipo]'";
    $sql = $pdo->query($sql);
    if ($sql->rowCount()>0) {
      foreach ($sql -> fetchAll() as $categoria) {
      }
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
   <title><?php
   if(isset($_GET['tipo']) && isset($_GET['categoria'])){
     echo $produtos['tipo'] ?> - <?php echo $produtos['categoria'];
   }else {
     echo $categoria['tipo'];
   }
   ?>
 </title>
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
   <div class="respon">
     <div class="caminho">
       <table>
        <?php
        if (isset($_GET['tipo']) && isset($_GET['categoria'])) {
          ?>
          <tr>
            <th> <a href="index.php">Home</a> <i class="fas fa-angle-right"></i> </th>
            <th> <a href="<?php echo $produtos['caminho_categoria'] ?>"><?php echo $produtos['tipo'] ?></a> <i class="fas fa-angle-right"></i> </th>
            <th> <a href="<?php echo $produtos['caminho'] ?>"><?php echo $produtos['categoria'] ?></a>  </th>
          </tr>
          <?php
          $nome = $produtos['categoria'];
        }
        else{
          ?>
          <tr>
            <th> <a href="index.php">Home</a> <i class="fas fa-angle-right"></i> </th>
            <th> <a href="<?php echo $categoria['caminho_categoria'] ?>"><?php echo $categoria['tipo'] ?></a></th>
          </tr>
          <?php
          $nome = $categoria['tipo'];
        }
         ?>
       </table>
       <div class="caminho-div"></div>
     </div>
     <div class="borda">
     <h2 style="text-align:center;"><?php echo $nome ?></h2>
     <!-- Todos os itens -->


       <?php
       if (isset($_GET['categoria']) && isset($_GET['tipo'])) {
          $sql = "SELECT * FROM produtos_airsoft where categoria='$_GET[categoria]' and  tipo='$_GET[tipo]'";
          $sql = $pdo->query($sql);
          if ($sql->rowCount()>0) {
            foreach ($sql -> fetchAll() as $produtos) {
              $caminho1 = "?categoria=<?php $produtos[categoria] ?>&tipo=<?php $produtos[tipo] ?>";
              $caminho2 = "?tipo=<?php $produtos[tipo] ?>"
              ?>
              <div class="itens">
              <div class="item">
                <a href="pagina_all.php?id=<?php echo $produtos['id'] ?>"><img class="card-img-top" src="<?php echo $produtos['img']; ?>"></a>
                <div class="card-body">
                  <h3  class="card-title"><?php echo $produtos['nome'] ?></h3>
                  <p class="card-text" id="preco_avista" ><?php echo "<span style ='font-size:18px;'>R$ ".$produtos['avista']."</span><span style='color:green;'> à vista no boleto</span>" ?></p>
                  <p  class="card-text" id="preco_parcelas"><?php echo "ou <span style='color:green;'>13x</span> de "."<span style='color:green;'>".$produtos['parcelas']."</span>" ?></p>
                  <div class="item_links">
                      <a class="comp" href="pagina_all.php?id=<?php echo $produtos['id'] ?>" role="button">Comprar</a>
                      <a class="fav" style="cursor:pointer" onclick="adicionado()" href="favorito.php?id=<?php echo $produtos['id'] ?>&caminho=<?php echo $url ?>" id="link"  name="favorito"><i class="fas fa-cart-plus"></i></a><br><br>
                  </div>
              </div>
              </div>
              </div>
              <?php
            }
          }
       }
       else {
         $sql = "SELECT * FROM produtos_airsoft where tipo='$_GET[tipo]'";
         $sql = $pdo->query($sql);
         if ($sql->rowCount()>0) {
           foreach ($sql -> fetchAll() as $categoria) {
             ?>
             <div class="itens">
             <div class="item">
               <a href="pagina_all.php?id=<?php echo $categoria['id'] ?>"><img class="card-img-top" src="<?php echo $categoria['img']; ?>"></a>
               <div class="card-body">
                 <h3  class="card-title"><?php echo $categoria['nome'] ?></h3>
                 <p class="card-text" id="preco_avista" ><?php echo "<span style ='font-size:18px;'>R$ ".$categoria['avista']."</span><span style='color:green;'> à vista no boleto</span>" ?></p>
                 <p  class="card-text" id="preco_parcelas"><?php echo "ou <span style='color:green;'>13x</span> de "."<span style='color:green;'>".$categoria['parcelas']."</span>" ?></p>
                 <div class="item_links">
                     <a class="comp" href="pagina_all.php?id=<?php echo $categoria['id'] ?>" role="button">Comprar</a>
                     <a class="fav" style="cursor:pointer" onclick="adicionado()" href="favorito.php?id=<?php echo $categoria['id'] ?>&caminho=<?php echo $url ?>" id="link"  name="favorito"><i class="fas fa-cart-plus"></i></a><br><br>
                 </div>
             </div>
             </div>
             </div>
             <?php
           }
         }
       }
        ?>
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
     <img class="google" src="img/google-site-seguro.png" alt="">
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
