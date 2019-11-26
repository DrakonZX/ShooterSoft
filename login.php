<?php
session_start();
header ('Content-type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/login1.css">
    <link href="https://fonts.googleapis.com/css?family=Hind+Guntur|Merriweather+Sans|Roboto+Slab&display=swap" rel="stylesheet">

    <title>Login - ShooterSoft</title>
</head>
<body>
    <header>
      <div class="nada">
         <div class="logo">
           <a href="index.php"><img src="img/logo_veridico2.png" alt=""></a>
      </div>
       <div class="background">
        <div class="cont">
          <div class="cobertura-top">
              <img style="height:150px;" src="img/prancheta.png" alt="">
          </div>
          <br><h2>Login</h2><br><br>
          <?php

			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			if(isset($_SESSION['msgcad'])){
				echo $_SESSION['msgcad'];
				unset($_SESSION['msgcad']);
            }
            ?>
            <form method="POST" action="valida.php">
                <label>Email</label><br>
            <input type="email" name="email" placeholder="Email" required><br><br>

            <label>Senha</label><br>
            <input type="password" name="senha" maxlength="16" placeholder="Senha" required><br>

            <button type="submit" name="btnLogin" value="Acessar">Concluir</button>
            </form>
        </div>
        </div>
        </div>
    </header>
    <script src="http://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
        <script>
        $('nav.menu-mobile h2').click(function()
            {
                $('nav.menu-mobile ul').slideToggle(); //função do jQuery
            })
        </script>
</body>
</html>
