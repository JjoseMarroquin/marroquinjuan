<?php

  include ('bd.php');
  error_reporting(0);

  if (isset($_SESSION["usuario"])) {
    header("Location:bienvenida.html");
  }
  if (isset($_POST["registrarse"])) {
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $usuario=$_POST["usuario"];
    $contraseña=md5($_POST["contraseña"]);
    $ccontraseña=md5($_POST["ccontraseña"]);

    if ($contraseña==$ccontraseña) {
      $query="SELECT * FROM usuarios WHERE usuario='$usuario'";
      $result=mysqli_query($conn,$query);
      if (!$result->num_rows > 0) {
        $query="INSERT INTO usuarios(nombre, apellido, usuario, contraseña)
        Value ('$nombre','$apellido','$usuario','$contraseña')";
        $result=mysqli_query($conn,$query);
        if ($result) {
          echo"<script>alert('Usuario registrado con éxito')</script>";
          echo '<script>window.location="index.php"</script>';
          
        }
        
        else {
          echo "<script>alert('Hay un error')</script>";
        }
      }
      else {
        echo "<script>alert('El usuario ya existe')</script>";
      }
    }
    else {
      echo "<script>alert('Las contraseñas no coinciden')</script>";
    }

  }


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrarse</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>


    <h1>registrarse</h1>
    o <a href="sesion.php">Iniciar sesion</a>

    <form action="registro.php" method="POST">
      <input name="nombre" type="text" placeholder="Ingrese su nombre">
      <input name="apellido" type="text" placeholder="Ingrese su apellido">
      <input name="usuario" type="text" placeholder="Ingrese su usuario">
      <input name="contraseña" type="password" placeholder="Ingrese su contraseña">
      <input name="ccontraseña" type="password" placeholder="Confirmar contraseña">
      <input type="submit" value="registrarse" name="registrarse">
    </form>

  </body>
</html>
