<link rel="shortcut icon" type="image/x-icon" href="../images/icono.ico">
<?php

if (isset($_POST['enviar'])) {
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    
    
    if ($usuario=="admin" and $contraseña=="mensajes") {
        echo '<script lenguage="javascript">';
        echo 'window.location = "../mensajes.php";
        </script>';
        }
    if (!$resultado) {
        echo '<script lenguage="javascript">';
         echo 'alert(" Usuario y/o contraseña incorrecto, intente de nuevo")
        window.location = "../contactenos.php";
        </script>';
        }
    }
    
    ?>