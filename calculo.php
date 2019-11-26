<?php
include_once 'valida.php';
include_once 'conexao.php';

if (isset($_GET['id']) && empty($_GET['id']) == false) {
  $id = addslashes($_GET['id']);
  if (isset($_POST['quantidade'])) {
    $sql = "SELECT * FROM carrinho WHERE id = $id";
    $sql = $pdo->query($sql);
    if ($sql -> rowCount()>0) {
      foreach($sql ->fetchAll() as $c){
        $sql = "SELECT * FROM produtos_airsoft WHERE id = $c[produto_id]";
        $sql = $pdo->query($sql);
        if ($sql->rowCount()>0) {
          foreach($sql ->fetchAll() as $p){
            $quantidade = $_POST['quantidade'];
            if (is_numeric($quantidade)){
              $sql = "UPDATE carrinho SET quantidade ='$quantidade' WHERE produto_id = $p[id]";
              $sql = $pdo->query($sql);
              header("Location: carrinho.php");
            }
          }
        }
      }
    }
  }
}
 ?>
