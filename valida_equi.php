<?php
  include_once 'valida.php';
  include_once 'conexao.php';
  if(isset($_SESSION['usuario'])){
  if (isset($_POST['ndg']) && isset($_POST['espec_equi'])) {
      $equipe = array($_POST['ndg'],$_POST['espec_equi'],$_POST['id_usuario'],$_POST['country']);
      $sql = "select * from equipe where id_usuario='$_POST[id_usuario]'";
      $sql = $pdo->query($sql);
      if ($sql->rowCount()>0) {
        header('location:equipe.php');
      }
      else {
        $sql = "insert into equipe set nick='$equipe[0]', class='$equipe[1]',id_usuario='$equipe[2]',country='$equipe[3]'";
        $sql = $pdo->query($sql);
        if ($sql->rowCount()>0) {
          header('location:equipe.php');
        }
      }
    }
  }
 ?>
