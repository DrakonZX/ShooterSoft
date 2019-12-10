<?php
include 'valida.php';
include 'conexao.php';
$sql = "select * from usuario where id='$_GET[id]'";
$sql = $pdo->query($sql);
  if ($sql->rowCount()>0) {
    foreach ($sql ->fetchAll() as $u) {
       $loca = " Cidade: <span style='color:#89BF00;'>".$u['cidade']."</span>,  Estado: <span style='color:#89BF00;'>".$u['uf']."</span>,  Endereço: <span style='color:#89BF00;'>".$u['endereco']."</span>,  Número: <span style='color:#89BF00;'>".$u['num']."</span>,  no Bairro: <span style='color:#89BF00;'>".$u['bairro']."</span>";
    }
  }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="css/finalizar.css">
     <meta name="viewport" content="width=device-width,inicial-scale=1.0;maximum-scale=1.0">
       <link rel="icon" type="image/png" href="img/logo_veridico.png" sizes="64x64">
     <title>Carrinho - ShooterSoft</title>
 </head>
 <body>
    <div class="fundo">
      <div class="respon">
        <div class="logo">
      <a href="index.php"><img src="img/logo_veridico2.png" alt=""></a>
        </div>
      </div>
    </div>
     <header>
            <div class="respon">
             <div class="cart">
                 <h2>Sua compra será enviada para o endereço correspondente:</h2>
                 <div class="line"></div>
                <div class="cads">
                 <h1 ><?php echo $loca ?></h1> <br>
                 <h2 style="color:#89BF00;border-top:2px solid black;">O endereço está correto ?</h2><br>
                 </div>
                 <div class="avancar">
                 <a class="sim" onclick="au(<?php echo $u['id'] ?>)">Sim</a><br><br>
                 <div class="line">

                 </div><br>
                 <a href="editar_perfil.php?id=<?php echo $u['id'] ?>">Não, desejo modificar</a>
                 </div>
             </div>
             </div>
     </header>
     <script src="http://code.jquery.com/jquery-3.4.1.min.js"
   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
   crossorigin="anonymous"></script>
   <script type="text/javascript">
   function au(id)
   {
      var conf = confirm("Tem certeza disso?  ");
      if (conf == true) {
        window.location='compra_finalizada.php?id='+id+ '';
        return true;
      }
    }
   </script>
 </body>
 </html>
