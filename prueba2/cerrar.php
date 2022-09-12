<?php
  session_start();
 if (!isset($_SESSION['usuario'])) {
  header('Location: index.php');
 }
?>
<h1>BIENVENIDOS</h1>
<a href="salir.php">Desconectar</a>
