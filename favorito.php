<?php
include_once("conexao.php");
include_once("valida.php");

  $pdo = new PDO($dns,$dbuser,$dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  if (isset($_SESSION['usuario'])) {
    $caminho = $_GET['caminho'];
    if (isset($_GET['id']) && empty($_GET['id']) == false) {
        $id = addslashes($_GET['id']);
        $nome = $_SESSION['usuario'];

        $sql = "SELECT * FROM produtos_airsoft WHERE id='$id'";
        $sql = $pdo->query($sql);


        $sql = "SELECT * FROM usuario WHERE email LIKE '$nome'";
        $sql = $pdo-> query($sql);

        if ($sql->rowCount()>0) {
        foreach ($sql -> fetchAll() as $teste) {
          $id_usuario = $teste['id'];
          $sql = "SELECT * FROM carrinho WHERE produto_id = $id AND cliente_id = $id_usuario";
          $sql = $pdo->query($sql);
          if ($sql -> rowCount() > 0) {
            $sql = "UPDATE carrinho SET quantidade = (quantidade + 1) WHERE produto_id = $id AND cliente_id = $id_usuario";
            $sql = $pdo->query($sql);
          }
          else {
            $sql = "INSERT INTO carrinho (produto_id,cliente_id) VALUES ($id,$id_usuario)";
            $sql = $pdo->query($sql);
          }
        }
      }
      $erros = 0;
      header("Location:$caminho.php");
    }
  }
  else {
    header("Location: carrinho-semconta.php");
  }
 ?>
