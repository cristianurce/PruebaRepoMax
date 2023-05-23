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
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plantilla Bootstrap</title>
  <!-- Enlace al archivo CSS de Bootstrap -->
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
                <li class="nav-item">
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
        <a class="login-button" href="./login.php"> | Tancar sessió</a>
      </div>
      </div>
    </div>
  </header>

  <main class="container mt-5 ml-20">

    <div style="background-color: #0e9a8cb4; color:white; border: 4px solid white; padding:50px">
      <h1>Formulari de contacte</h1>
      <form action="enviar.php" method="POST" enctype="multipart/form-data">
        <label for="destinatario">Correu del destinatari:</label>
        <input type="email" name="destinatario" required><br><br>
        <label for="asunto">Assumpte:</label>
        <input type="text" name="asunto" required><br><br>
        <label for="contenido">Contingut del correu:</label><br>
        <textarea name="contenido" rows="5" cols="30" required></textarea><br><br>
        <label for="archivo">Adjuntar archiu:</label>
        <input type="file" name="archivo"><br><br>
        <input type="submit" value="Enviar">
      </form>
    </div>

  </main>
  <footer class="bg-custom text-white custom-header" style="margin-top: 12%; height: 90%">
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
  <!-- Enlace al archivo JavaScript de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>