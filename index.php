<?php
  include ('bd.php');
  error_reporting(0);

  if (isset($_SESSION['usuario'])) {
    echo '<script>window.location="bienvenida.html"</script>';
  }
  if (isset($_POST['iniciar'])) {
    $usuario=$_POST['usuario'];
    $contraseña=md5($_POST['contraseña']);

    $query="SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
    $result=mysqli_query($conn,$query);

    if ($result->num_rows>0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['usuario']=$row['usuario'];
      echo '<script>window.location="bienvenida.html"</script>';
    }else {
      echo "<script>alert('El usuario o la contraseña son incorrectos')</script>";
    }

  }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/icono.ico">
    <link rel="stylesheet" href="diseños/principal.css">
    <title>INICIAR SESION</title>
    <link rel="stylesheet" href="diseños/incio.css">
</head>
<body>
    <img src="images/toyota.png" width="100px">
    <Table style="background-color: rgba(80, 45, 45, 0.267);">
        <tr>
            <td>
                <b>Iniciar Sesion</b>
                <div class="tabla">
                <table>
                    <tr>
                        <td> 
                            <form action="index.php" method="post" ><br><br>
                                <center><img src="images/usuario.png" width="60px">
                                <center><input type="text" name="usuario" placeholder="INGRESE USUARIO"></center><br>
                                <center><img src="images/contraseña.png" width="60px"></center>
                                <center><input type="password" name="contraseña" placeholder="INGRESE CONTRASEÑA"></center><br>
                                <p><input type="submit" value="INGRESAR" name="iniciar"></p>
                            </form>
                            <form action="registro.php" method="post"><p><input type="submit" value="REGISTRARSE" name="re"></p></form>
                            
                        </td>
                    </tr>
                </table>
            </div>
            </td>
        </tr>
    </Table>
</body>
</html>