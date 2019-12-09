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
  <meta name="viewport" content="width=device-width,inicial-scale=1.0;maximum-scale=1.0">
    <link rel="icon" type="image/png" href="img/logo_veridico.png" sizes="64x64">
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



  <br><br> <label for="arquivo">Trocar nome: </label> <br>
  <input type="file" name="arquivo" value="Selecione uma imagem" ><br><br>

<label class="nometext">Nome</label><br>
  <input type="text" name="nome" value="<?php echo $dados['nome'];?>"><br><br>

<label class="nometext4">Sobrenome</label><br>
  <input type="text" name="sobrenome" value="<?php echo $dados['sobrenome'];?>" ><br><br>

  <label class="nometext">E-mail</label><br>
  <input type="email" name="email" value="<?php echo $dados['email'];?>" ><br><br>

  <label class="nometext3">CEP</label><br>
  <input type="text" name="cep" value="<?php echo $dados['cep'];?>" ><br><br>

  <label class="nometext2">Endereço</label><br>
  <input type="text" name="endereco" value="<?php echo $dados['endereco'];?>" ><br><br>

  <label class="nometext6">Número da casa</label><br>
  <input type="text" name="preço" value="<?php echo $dados['num'];?>" ><br><br>

  <label class="nometext">Bairro</label><br>
  <input type="text" name="lucro" value="<?php echo $dados['bairro'];?>"><br><br>

  <label class="nometext">Cidade</label><br>
  <input type="text" name="cidade" value="<?php echo $dados['cidade'];?>"><br><br>

  <label class="nometext3">UF</label><br>
  <input type="text" name="icms" value="<?php echo $dados['uf'];?>" ><br><br>
    <button  type="submit" value="Confirmar">Confirmar</button>

</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
