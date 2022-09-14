
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/icono.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="diseños/mensajes.css">
    <link rel="stylesheet" href="diseños/pie.css">
    <title>Mensajes</title>
  </head>
  <body>
    <div class="botones" >
      <div class="row">
        <div class="col-4" style="background-color:#F6AE30;">
          <a href="bienvenida.html"> Inicio</a>
        </div>
        <div class="col-4" style="background-color:#30C6F6;">
          <a href="tiendas.html">tiendas</a> 
        </div>
        <div class="col-4" style="background-color:#1D4771;">
          <a href="contactenos.php">Contáctenos</a> 
        </div>
      </div>
    </div>
    <h1>Mensajes Recibidos</h1>
    <table>
  <tr>
    <td>Nombres</td>
    <td>Telefóno</td>
    <td>Correo Electrónico</td>
    <td>Mensaje</td>
    <td>Eliminar</td>
  </tr>
  <?php
  include('bd.php');
  $query="SELECT * FROM mensajes ORDER BY nomensaje ASC" ;
  $resultados=mysqli_query($conn, $query);
  while($row=mysqli_fetch_array($resultados)){ ?>
  <tr>
    <td><?php echo $row['nombre']?></td>
    <td><?php echo $row['telefono']?></td>
    <td><?php echo $row['correo']?></td>
    <td><?php echo $row['mensaje']?></td>
    <td>
      <a href="msg/eliminar.php?id=<?php echo $row['nomensaje']?>">
      <img src="images/borr.ico" width="60px"></a>
    </td>
  </tr>
  
  <?php } ?>
</table><br><br><br>
<div class="pdf" style="background-color:rgba(255, 255, 255, 0);">
      <div class="row">
        <div class="col">
          <a href="msg/pdf.php">
            <center><input type="submit" value="PDF"></center>
          </a>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>PBX: xxxx-xxxx - Dirección: xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
      <p>Carnet: 2021-40011 &nbsp;&nbsp;&nbsp;&nbsp; Nombre: Juan Jose Marroquin del Valle</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>