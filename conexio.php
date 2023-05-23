<?php
$servername = "localhost";
$username = "pfinal";
$password = "1234";
$dbname = "projectefinalmc";

// Establecer la conexión con la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión ha sido exitosa
if (!$conn) {
  die("La conexión ha fallado: " . mysqli_connect_error());
}
?>