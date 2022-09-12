<?php
  include ('bd.php');
  error_reporting(0);

  if (isset($_SESSION['usuario'])) {
    echo '<script>window.location="cerrar.php"</script>';
  }
  if (isset($_POST['iniciar'])) {
    $usuario=$_POST['usuario'];
    $contraseña=md5($_POST['contraseña']);

    $query="SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
    $result=mysqli_query($conn,$query);

    if ($result->num_rows>0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['usuario']=$row['usuario'];
      echo '<script>window.location="cerrar.php"</script>';
    }else {
      echo "<script>alert('El usuario o la contraseña son incorrectos')</script>";
    }

  }

 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>


    <h1>Iniciar sesion</h1>
    or <a href="registro.php">Registrarse</a>

    <form action="sesion.php" method="POST">
      <input name="usuario" type="text" placeholder="Ingrese su usuario">
      <input name="contraseña" type="password" placeholder="Ingrese su contraseña">
      <input type="submit" value="Iniciar Sesion" name="iniciar" >
    </form>
  </body>
</html>
