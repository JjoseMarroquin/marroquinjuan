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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="diseños/incio.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/icono.ico">
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
                                <center><input type="submit" value="INGRESAR" name="iniciar"></center>
                            </form>
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="bot"><a href="registro.php"><input type="submit" value="REGISTRARSE"></a></div>
                        
                      </td>
                    </tr>
                </table>
                
                
            </div>
            </td>
        </tr>
    </Table>
</body>
</html>