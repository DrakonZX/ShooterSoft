<?php
  include_once("valida.php");
  include_once 'conexao.php';
  if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);
    echo $id;
    $sql = "DELETE FROM carrinho WHERE id='$id'";
    $sql = $pdo->query($sql);
    if ($sql->rowCount()>0) {
      header("Location: carrinho.php");
    }
  }

 ?>
