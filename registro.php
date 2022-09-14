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
<html lang="es">
  <head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="diseños/incio.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/icono.ico">

  </head>
  <body>
    
  <img src="images/toyota.png" width="100px">
    <Table style="background-color: rgba(80, 45, 45, 0.267);">
        <tr>
            <td>
                <b>Registrarse</b>
                <div class="tabla">
                <table>
                    <tr>
                        <td><br>
                          <form action="registro.php" method="POST">
                            <center><input name="nombre" type="text" placeholder="Ingrese su nombre"></center><br>
                            <center><input name="apellido" type="text" placeholder="Ingrese su apellido"></center><br>
                            <center><input name="usuario" type="text" placeholder="Ingrese su usuario"></center><br>
                            <center><input name="contraseña" type="password" placeholder="Ingrese su contraseña"></center><br>
                            <center><input name="ccontraseña" type="password" placeholder="Confirmar contraseña"></center><br>
                            <center><input type="submit" value="REGISTRARSE" name="registrarse"></center>
                          </form>
                          <div class="bar"><a href="index.php"><input type="submit" value="INICIAR SESIÓN"></a></div>
                        </td>
                    </tr>
                </table>
            </div>
            </td>
        </tr>
    </Table>
  </body>
</html>

