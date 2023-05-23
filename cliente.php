<?php
include __DIR__ . './conexio.php';
?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
  // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
  header('Location: login.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body style="font-family: Palatino, 'Palatino Linotype', serif;">
  <header class="bg-custom text-white custom-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-3">
          <img src="./img/logo.png" alt="Logo" width="200px" class="img-fluid">
        </div>
        <div class="col-md-6">
          <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="./index.php">Inici</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="./buscador.php">Buscador</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./llistat.php">Llistat de clients</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./accesos.php">Accesos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./contacte.php">Contacte</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
        <div class="col-md-3 text-right">
        <?php
          // Mostrar el nombre de usuario si ha iniciado sesión
          if (isset($_SESSION['username'])) {
            echo '<span class="username">Benvingut, ' . $_SESSION['username'] . '</span>';
          }
        ?>
        <a class="login-button" href="./login.php"> | Tancar Sessió</a>
      </div>
      </div>
    </div>
  </header>
  <?php
  $targetDirectory = "pdfs/";
  // Obtener el identificador del cliente desde la URL
  $clienteID = $_GET["id"];

  // Obtener el nombre del cliente desde la base de datos
  $sql = "SELECT nom FROM clients WHERE codi = '$clienteID'";
  $result = mysqli_query($conn, $sql);

  // Verificar si se encontró el cliente
  if (mysqli_num_rows($result) > 0) {
    // Obtener el nombre del cliente
    $cliente = mysqli_fetch_assoc($result);
    $nombre = $cliente["nom"];

    // Mostrar el nombre del cliente en la página
    echo "<div class='clientus'>";
    echo "<h1>$nombre</h1>";
    echo "    <form action='cliente.php?id=$clienteID ' method='post' enctype='multipart/form-data'>
        <input type='file' name='pdf_file'>
        <input type='submit' value='Pujar PDF'>
        </form><br>";

    // Procesar el formulario de carga de archivos PDF
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pdf_file"])) {
      // Directorio donde se guardarán los archivos PDF
      $targetFile = $targetDirectory . $clienteID . "_" . basename($_FILES["pdf_file"]["name"]);
      $uploadOk = true;
      $pdfFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

      // Verificar si el archivo es un PDF válido
      if ($pdfFileType != "pdf") {
        echo "Solo se permiten archivos PDF.";
        $uploadOk = false;
      }

      // Verificar si hubo algún error durante la carga del archivo
      if ($uploadOk && move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $targetFile)) {
        echo "Arxiu pujat correctament.";
      } elseif (!$uploadOk) {
        echo "Error al pujar l'arxiu PDF.";
      }
    }

    // Obtener la lista de archivos PDF asociados al cliente actual
    $files = glob($targetDirectory . $clienteID . "_*.pdf");

    // Mostrar los archivos PDF asociados al cliente actual
    foreach ($files as $file) {
      $fileName = basename($file);
      echo "<div class='pdf-file'>";
      echo "<a style='color: green' href='$file' target='_blank'>$fileName</a>";
      echo "<form action='' method='post'>";
      echo "<input type='hidden' name='file_name' value='$fileName'>";
      echo "<button type='submit' name='delete_file'>Eliminar</button>";
      echo "</form>";
      echo "</div>";
    }
    
  } else {
    // Mostrar un mensaje de cliente no encontrado
    echo "<h1>Client no trobat</h1>";
  }
  // Procesar el formulario de eliminación de archivos PDF
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_file"])) {
  $fileName = $_POST["file_name"];
  $filePath = $targetDirectory . $fileName;

  // Verificar si el archivo existe
  if (file_exists($filePath)) {
    // Eliminar el archivo
    if (unlink($filePath)) {
      echo "Segur que vols eliminar l'arxiu?";
    } else {
      echo "Error al eliminar l'arxiu.";
    }
  }
}
  

  mysqli_close($conn);
  ?>


  </div>
  <footer class="bg-custom text-white custom-header" style="position: fixed; bottom: 0; width: 100%">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-3">
        <img src="./img/logo.png" alt="Logo" class="img-fluid" style="width: 50%; padding: 5%">
      </div>
      <div class="col-md-6">
        <nav class="navbar navbar-expand-lg navbar-dark" style="margin-left: 10%">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <p>Web desenvolupada per Max Bueno i Cristian Urquieta</p>
        </nav>
      </div>
      <div class="col-md-3">
        <img src="./img/logo.png" alt="Logo" class="img-fluid" style="width: 50%; padding: 5%; margin-left: 45%">
      </div>
    </div>
  </div>
</footer>

</body>

</html>