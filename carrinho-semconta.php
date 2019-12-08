<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/carrinho-semconta.css">
    <meta name="viewport" content="width=device-width,inicial-scale=1.0;maximum-scale=1.0">
      <link rel="icon" type="image/png" href="img/logo_veridico.png" sizes="64x64">
    <title>Carrinho - ShooterSoft</title>
</head>
<body>
   <div class="fundo">
      <div class="logo">
    <a href="index.php"><img src="img/logo_veridico2.png" alt=""></a>
      </div>
   </div>
    <header>
           <div class="respon">
            <div class="cart">
                <h2>Olá! Para adicionar ao carrinho, acesse sua conta.</h2>
                <div class="line"></div>
               <div class="cads">
                <a href="cadastro.php">Sou novo</a><br>
                </div>
                <div class="avancar">
                <a href="login.php">Já tenho conta</a>
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
