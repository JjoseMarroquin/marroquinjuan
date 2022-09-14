<title>INSERTANDO</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/icono.ico">
<?php
include('../bd.php');
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
        
        echo "<div class='error'>";
        for ($i=0 ; $i < count($campos); $i++ ) { 
            echo "<li>".$campos[$i]."</div>";
        }
    }
    else {
        $query= "INSERT INTO mensajes(nombre,telefono,correo,mensaje) VALUES ('$nombre','$telefono','$correo','$mensaje')";
        $resultado=mysqli_query($conn,$query);
        if ($resultado) {
            echo '<script lenguage="javascript">';
            echo 'alert("¡Mensaje enviado correctamente :) !")
            window.location = "../contactenos.html";
            </script>';
            }
        if (!$resultado) {
            echo '<script lenguage="javascript">';
            echo 'alert("El mensaje no pudo ser enviado, intente de nuevo.")
            window.location = "../contactenos.html";
            </script>';
            }
    }
    }

    
    
    mysqli_close($conn);
    ?>