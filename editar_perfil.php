<?php
    require 'conexao.php';
    $data = date("Y");
    if(isset($_GET['id']) && empty($_GET['id']) == false)
    {
        $id = addslashes($_GET['id']);
        $sql = "SELECT * FROM usuario WHERE id='$id'";
        $dados = $pdo->query($sql);

        if($dados->rowCount() > 0)
        {
            $dados = $dados->fetch();
        }
        else
        {
            header("Location: index.php");
        }
    }

    if(isset($_POST['nome']) && !empty ($_POST['nome']))
    {
      $nome = addslashes($_POST['nome']);
      $sobrenome = addslashes($_POST['sobrenome']);
      $email = addslashes($_POST['email']);
      $cep = addslashes($_POST['cep']);
      $endereco = addslashes($_POST['endereco']);
      $num = addslashes($_POST['num']);
      $bairro = addslashes($_POST['lucro']);
      $cidade = addslashes($_POST['cidade']);
      $uf = addslashes($_POST['icms']);

        $sql = "UPDATE usuario SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', cep = '$cep', endereco = '$endereco', num = '$num', bairro = '$bairro', cidade = '$cidade', uf = '$uf' WHERE ID = '$id'";
        $pdo->query($sql);

        if (isset($_FILES['arquivo'])) {
          $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
          $novo_nome = $dados['cpf'].$extensao;
          $dire = 'perfil/img/';

          move_uploaded_file($_FILES['arquivo']['tmp_name'],$dire.$novo_nome);

          $sql = "UPDATE usuario SET img = 'perfil/img/$novo_nome' WHERE id = '$id'";
          $pdo->query($sql);
        }

        header("Location: index.php");
    }

?>
<html>
<head>
  <link rel="stylesheet" href="css/editar_perfil.css">
  <link href="https://fonts.googleapis.com/css?family=Hind+Guntur|Merriweather+Sans|Roboto+Slab&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<header>

</header>
        <div class="cadas">
          <div class="background">
               <div class="logo">
    <a href="index.php"><img src="img/logo_veridico2.png" alt="" width=""></a>

      </div>
          </div>
          <div class="respon">
            <div class="side">
              <div class="cobertura-top">
                <img style="height:150px;" src="img/prancheta.png" alt="">
              </div>
<div class="fundo">
<div class="overlay">

<form method="post" enctype="multipart/form-data">



      <div class="nometext5">Trocar imagem</div><br>
  <input type="file" name="arquivo" value="Selecione uma imagem" ><br><br>

<div class="nometext">Nome</div><br>
  <input type="text" name="nome" value="<?php echo $dados['nome'];?>"><br><br>

<div class="nometext4">Sobrenome</div><br>
  <input type="text" name="sobrenome" value="<?php echo $dados['sobrenome'];?>" ><br><br>

  <div class="nometext">E-mail</div><br>
  <input type="email" name="email" value="<?php echo $dados['email'];?>" ><br><br>

  <div class="nometext3">CEP</div><br>
  <input type="text" name="cep" value="<?php echo $dados['cep'];?>" ><br><br>

  <div class="nometext2">Endereço</div><br>
  <input type="text" name="endereco" value="<?php echo $dados['endereco'];?>" ><br><br>

  <div class="nometext6">Número da casa</div><br>
  <input type="text" name="preço" value="<?php echo $dados['num'];?>" ><br><br>

  <div class="nometext">Bairro</div><br>
  <input type="text" name="lucro" value="<?php echo $dados['bairro'];?>"><br><br>

  <div class="nometext">Cidade</div><br>
  <input type="text" name="cidade" value="<?php echo $dados['cidade'];?>"><br><br>

  <div class="nometext3">UF</div><br>
  <input type="text" name="icms" value="<?php echo $dados['uf'];?>" ><br><br>
    <button  type="submit" value="Confirmar">Confirmar</button>

</form>
</div>
</div>
</div>
</div>
</div>
<div class="todos">
<div class="container">
  <div class="respon">
  <div class="row align-items-start">
    <div class="col">
      <h4>Sobre nós</h4><br>
      <p>Somos uma empresa de vendas online com o foco em armas para treino e diversão.<br>(Paintball, Airsoft e Arcos)</p>
    </div>
    <div class="col">
      <div class="links1">
        <a href="https://www.google.com/maps/place/Av.+Bahia,+Microrregi%C3%A3o+de+Caraguatatuba+-+SP/@-23.6320208,-45.4259223,17z/data=!3m1!4b1!4m5!3m4!1s0x94cd6312a97556f9:0x8cacdb175a953749!8m2!3d-23.6320257!4d-45.4237336" target="_blank" style="margin-left: -18px;"><i class="fas fa-map-marker-alt"></i> Avenida Bahia.</a><br><br>
        <a href="#"><i class="fas fa-phone"></i> +12 3888-8888</a><br><br>
        <a class="email-link" href="https://accounts.google.com/" target="_blank"><i class="far fa-envelope"></i> shootersoft5@gmail.com</a><br><br>
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
</div>
</body>
</html>
