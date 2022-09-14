
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/icono.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="diseños/contactenos.css">
    <link rel="stylesheet" href="diseños/pie.css">
    <title>Contáctenos</title>
  </head>
  <body>
    <div class="botones" >
      <div class="row">
        <div class="col-3" style="background-color:#F6AE30;">
          <a href="bienvenida.html"> Inicio</a>
        </div>
        <div class="col-3" style="background-color:#30C6F6;">
          <a href="productos.html">Productos</a> 
        </div>
        <div class="col-3" style="background-color:#1D4771;">
          <a href="tiendas.html">Tiendas</a> 
        </div>
        <div class="col-3" style="background-color:#142568;">
            <a href="sesion.html">Ver Mensajes</a> 
          </div>
      </div>
    </div>
    <h1>Contáctenos</h1>
    <?php
include('bd.php');
if (isset($_POST['msg'])) {
    $nombre=$_POST['nombre'];
    $telefono=$_POST['telefono'];
    $correo=$_POST['correo'];
    $mensaje=$_POST['mensaje'];

    $campos=array();

    if ($nombre == "") {
        array_push($campos,"No ingreso un nombre, llene los datos");
    }
    if ($telefono == "" or strlen($telefono)<8 or strlen($telefono)>8) {
        array_push($campos,"El telenofo ingresado no es valido, ingrese un telefono de 8 digitos");
    }
    if ($correo == "" or strpos($correo,"@")=== false) {
        array_push($campos,"Ingresa un correo electronico valido");
    }
    if ($mensaje == "") {
        array_push($campos,"No ingreso un mensaje, llene los datos");
    }
    if (count($campos)>0) {
        for ($i=0 ; $i < count($campos); $i++ ) { 
        
            echo "<div class='error'>";
            echo "<li>".$campos[$i]."</div>";
        }
    }
    else {
        $query= "INSERT INTO mensajes(nombre,telefono,correo,mensaje) VALUES ('$nombre','$telefono','$correo','$mensaje')";
        $resultado=mysqli_query($conn,$query);
        if ($resultado) {
            echo '<script lenguage="javascript">';
            echo 'alert("¡Mensaje enviado correctamente :) !")
            window.location = "contactenos.php";
            </script>';
            }
        if (!$resultado) {
            echo '<script lenguage="javascript">';
            echo 'alert("El mensaje no pudo ser enviado, intente de nuevo.")
            window.location = "contactenos.php";
            </script>';
            }
    }
    }
    mysqli_close($conn);
    ?>
    <div class="container">
      <form action="contactenos.php" method="post">
        <label for="fname">Nombres*</label>
        <input type="text" name="nombre" placeholder="Ingrese nombre y apellido">
        <label for="fname">Teléfono / Celular</label>
        <input type="text" name="telefono" placeholder="Ingrese número telefonico">
        <label for="fname">Correo Electrónico</label>
        <input type="text" name="correo" placeholder="Ingrese correo electrónico">
        <label for="fname">Mensaje*</label>
        <input type="text" name="mensaje" placeholder="Ingrese su mensaje">
        <center><input type="submit" value="Enviar Mensaje" name="msg"></center>
      </form>
      
    </div>
    <br><br><br>
    <div class="footer">
      <p>PBX: xxxx-xxxx - Dirección: xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
      <p>Carnet: 2021-40011 &nbsp;&nbsp;&nbsp;&nbsp; Nombre: Juan Jose Marroquin del Valle</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>