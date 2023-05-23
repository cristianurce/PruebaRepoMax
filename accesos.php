<?php
include __DIR__ . './conexio.php';
?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
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
          if (isset($_SESSION['username'])) {
            echo '<span class="username">Benvingut, ' . $_SESSION['username'] . '</span>';
          }
        ?>
        <a class="login-button" href="./login.php"> | Tancar Sessió</a>
      </div>
      </div>
    </div>
  </header>


  <main class="container mt-5 ml-20">
    <div style="background-color: #0e9a8cb4; color: white; text-align: center; width: 50%; margin-left: 25%; border: 4px solid white;">
      <h1>Accesos directes:</h1>
    </div>
    <div style="background-color: #0e9a8cb4; margin-top: 3%; color: white; border: 4px solid white; text-align: center;">
      <h2 style="margin-top: 3%;">Finques sant celoni</h2>
      <p>finquessantceloni.com</p><br>
      <a href="https://finquessantceloni.com">
        <img src="./img/fscweb.png" style="width: 50%; border: solid 2px white;">
      </a><br><br>
      <h2 style="margin-top: 3%;">Inmovilla</h2>
      <p>inmovilla.com</p><br>
      <a href="https://inmovilla.com/">
        <img src="./img/invweb.png" style="width: 50%; border: solid 2px white;">
      </a><br><br>
      <h2 style="margin-top: 3%;">Habitaclia</h2>
      <p>habitaclia.com</p><br>
      <a href="https://habitaclia.com/">
        <img src="./img/hbweb.png" style="width: 50%; border: solid 2px white;">
      </a><br><br>
      <h2 style="margin-top: 3%;">Idealista</h2>
      <p>idealista.com</p><br>
      <a href="https://www.idealista.com/">
        <img src="./img/idweb.png" style="width: 50%; border: solid 2px white;">
      </a><br><br>
      <h2 style="margin-top: 3%;">Fotocasa</h2>
      <p>fotocasa.es</p><br>
      <a href="https://fotocasa.es/es">
        <img src="./img/fcweb.png" style="width: 50%; border: solid 2px white;">
      </a><br><br>
      <h2 style="margin-top: 3%;">Indomio</h2>
      <p>indomio.es</p><br>
      <a href="https://www.indomio.es/">
        <img src="./img/indweb.png" style="width: 50%; border: solid 2px white;">
      </a><br><br>
      <h2 style="margin-top: 3%;">Pisos.com</h2>
      <p>pisos.com</p><br>
      <a href="https://pisos.com/">
        <img src="./img/pisweb.png" style="width: 50%; border: solid 2px white;">
      </a><br><br>
    </div>
  </main>

  <footer class="bg-custom text-white custom-header" style="margin-top: 5%; height: 90%">
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