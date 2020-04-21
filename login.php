<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>El Videoroom - Magallanes BBC</title>
    <!-- Bootstrap core CSS -->
    <link href="V0.1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="V0.1/css/blog-home.css" rel="stylesheet">
    <!-- link a Font Awesome (Iconos) -->
    <link rel="stylesheet" type="text/css" href="login.css">
  </head>
  <body>
  <div class="container">
    <div class="login-page">
      <div class="login-form">        
        <div class="form">
          <img src="V0.1/img/logo-login.png" class="rounded mx-auto d-block" alt="">
          <form class="login-form" action="V0.1/authentication/authentication.php" method="post">
          <?php
          if(isset($_GET["status"])){
            $id = $_GET["status"];
            $message = $_GET["msg"];
            echo"<br> <div id='$id' style='margin-left:-1%; margin-top:8%; text-align:center; color:red;'>$message</div>";
          }?>
            <input class="form-control" type="email" placeholder="usuario" name="correo">
            <br>
            <input class="form-control" type="password" placeholder="clave" name="clave">
            <br>
            <button class="btn btn-primary btn-block" type="submit">Iniciar Sesion</button>
            <br>
          </form>
        </div>
      </div>      
    </div>    
  </div>
  </body>
</html>