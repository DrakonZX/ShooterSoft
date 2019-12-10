<?php
  include_once("valida.php");
  include_once 'conexao.php';
  if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);
    $sql = "DELETE FROM carrinho WHERE produto_id='$id'";
    $sql = $pdo->query($sql);
    $sql = "DELETE FROM soma_total WHERE produto_id='$id'";
    $sql = $pdo->query($sql);
    header("Location: carrinho.php");
  }
  else{
    $sql = "delete from carrinho where cliente_id='$_GET[delete_id]'";
    $sql = $pdo->query($sql);
    $sql = "DELETE FROM soma_total WHERE cliente_id='$_GET[delete_id]'";
    $sql = $pdo->query($sql);
    header("Location: carrinho.php");
  }
 ?>
