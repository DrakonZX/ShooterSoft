<?php
  include_once("valida.php");
  include_once 'conexao.php';
  if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);
    echo $id;
    $sql = "DELETE FROM carrinho WHERE produto_id='$id'";
    $sql = $pdo->query($sql);
    $sql = "DELETE FROM soma_total WHERE produto_id='$id'";
    $sql = $pdo->query($sql);
    header("Location: carrinho.php");
  }

 ?>
