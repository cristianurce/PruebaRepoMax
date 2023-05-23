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
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

  <main class="container mt-5 ml-20">

    <button id="add-button" class="btn-afegir">Afegir un nou client</button>
    <div class="afegir" style="background-color:  #0e9a8cb4; border: 5px solid white; padding: 1%; display: none; " id="hola">

      <form id="add-form" method="POST">
        <h2>Nou client</h2>
        <label for="codi">Código:</label>
        <input type="text" name="codi" id="codi">
        <label for="nom">Nombre:</label>
        <input type="text" name="nom" id="nom">
        <label for="adreca">Dirección:</label>
        <input type="text" name="adreca" id="adreca">
        <label for="cp">Código postal:</label>
        <input type="text" name="cp" id="cp">
        <label for="poblacio">Población:</label>
        <input type="text" name="poblacio" id="poblacio">
        <label for="provincia">Provincia:</label>
        <input type="text" name="provincia" id="provincia">
        <label for="telefon">Teléfono:</label>
        <input type="text" name="telefon" id="telefon">
        <label for="nif">NIF:</label>
        <input type="text" name="nif" id="nif">
        <button type="submit" style="margin-left: 45%;">Agregar</button>
      </form>
    </div>

    <div class="clientss mt-4">
  <?php
  // Establecer el número de registros por página
  $registrosPorPagina = 10;

  // Obtener el número total de clientes
  $sqlTotal = "SELECT COUNT(*) AS total FROM clients";
  $resultadoTotal = mysqli_query($conn, $sqlTotal);
  $filaTotal = mysqli_fetch_assoc($resultadoTotal);
  $totalClientes = $filaTotal['total'];

  // Calcular el número total de páginas
  $totalPaginas = ceil($totalClientes / $registrosPorPagina);

  // Obtener la página actual
  $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

  // Calcular el índice inicial y final de los registros a mostrar
  $indiceInicial = ($paginaActual - 1) * $registrosPorPagina;
  $indiceFinal = $indiceInicial + $registrosPorPagina;

  // Obtener los clientes para la página actual
  $sql = "SELECT * FROM clients LIMIT $indiceInicial, $registrosPorPagina";
  $result = mysqli_query($conn, $sql);
  ?>

<!-- <div class="clientss mt-4"> -->
  <?php
  // Establecer el número de registros por página
  $registrosPorPagina = 10;

  // Obtener el número total de clientes
  $sqlTotal = "SELECT COUNT(*) AS total FROM clients";
  $resultadoTotal = mysqli_query($conn, $sqlTotal);
  $filaTotal = mysqli_fetch_assoc($resultadoTotal);
  $totalClientes = $filaTotal['total'];

  // Calcular el número total de páginas
  $totalPaginas = ceil($totalClientes / $registrosPorPagina);

  // Obtener la página actual
  $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

  // Calcular el índice inicial y final de los registros a mostrar
  $indiceInicial = ($paginaActual - 1) * $registrosPorPagina;
  $indiceFinal = $indiceInicial + $registrosPorPagina;

  // Obtener los clientes para la página actual
  $sql = "SELECT * FROM clients LIMIT $indiceInicial, $registrosPorPagina";
  $result = mysqli_query($conn, $sql);
  ?>

<!-- <div class="clientss mt-4"> -->
  <?php
  // Establecer el número de registros por página
  $registrosPorPagina = 10;

  // Obtener el número total de clientes
  $sqlTotal = "SELECT COUNT(*) AS total FROM clients";
  $resultadoTotal = mysqli_query($conn, $sqlTotal);
  $filaTotal = mysqli_fetch_assoc($resultadoTotal);
  $totalClientes = $filaTotal['total'];

  // Calcular el número total de páginas
  $totalPaginas = ceil($totalClientes / $registrosPorPagina);

  // Obtener la página actual
  $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

  // Calcular el índice inicial y final de los registros a mostrar
  $indiceInicial = ($paginaActual - 1) * $registrosPorPagina;
  $indiceFinal = $indiceInicial + $registrosPorPagina;

  // Obtener los clientes para la página actual
  $sql = "SELECT * FROM clients LIMIT $indiceInicial, $registrosPorPagina";
  $result = mysqli_query($conn, $sql);
  ?>

  <table cellpadding="10">
    <thead>
      <tr>
        <th>Codi</th>
        <th>Nom</th>
        <th>Adreca</th>
        <th>CP</th>
        <th>Poblacio</th>
        <th>Provincia</th>
        <th>Telefon</th>
        <th>NIF</th>
        <th>Accions</th> <!-- Nueva columna para los botones -->
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["codi"] . "</td>";
        echo "<td><a style='color: black' href='./cliente.php?id=" . $row["codi"] . "'>" . $row["nom"] . "</a></td>";
        echo "<td>" . $row["adreca"] . "</td>";
        echo "<td>" . $row["cp"] . "</td>";
        echo "<td>" . $row["poblacio"] . "</td>";
        echo "<td>" . $row["provincia"] . "</td>";
        echo "<td>" . $row["telefon"] . "</td>";
        echo "<td>" . $row["nif"] . "</td>";
        echo "<td><a href='eliminar.php?id=" . $row["codi"] . "' class='btn-eliminar'><i class='uil uil-trash-alt'></i></a></td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>

  <div class="pagination justify-content-center mt-4" style="padding: 30px 0;">
  <ul class="pagination">
    <?php

    $rango = 6;


    $rangoInicial = max(1, $paginaActual - $rango);
    $rangoFinal = min($paginaActual + $rango, $totalPaginas);

  
    if ($rangoInicial > 1) {
      echo '<li class="page-item"><a class="page-link" href="llistat.php?pagina=1">1</a></li>';
      if ($rangoInicial > 2) {
        echo '<li class="page-item disabled"><a class="page-link" href="#">...</a></li>';
      }
    }


    for ($i = $rangoInicial; $i <= $rangoFinal; $i++) {
      echo '<li class="page-item ' . (($i == $paginaActual) ? 'active' : '') . '"><a class="page-link" href="llistat.php?pagina=' . $i . '">' . $i . '</a></li>';
    }

    
    if ($rangoFinal < $totalPaginas) {
      if ($rangoFinal < $totalPaginas - 1) {
        echo '<li class="page-item disabled"><a class="page-link" href="#">...</a></li>';
      }
      echo '<li class="page-item"><a class="page-link" href="llistat.php?pagina=' . $totalPaginas . '">' . $totalPaginas . '</a></li>';
    }
    ?>
  </ul>
</div>


 


    <script>
      $(document).ready(function() {
        // Ocultar el formulario al cargar la página
        $('#hola').hide();

        // Mostrar el formulario cuando se haga clic en el botón
        $('#add-button').click(function() {
          $('#hola').toggle();
        });

      });
    </script>
    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Obtener los valores enviados por el formulario
      $codi = $_POST['codi'];
      $nom = $_POST['nom'];
      $adreca = $_POST['adreca'];
      $cp = $_POST['cp'];
      $poblacio = $_POST['poblacio'];
      $provincia = $_POST['provincia'];
      $telefon = $_POST['telefon'];
      $nif = $_POST['nif'];

      // Insertar el nuevo cliente en la base de datos
      $sql = "INSERT INTO clients (codi, nom, adreca, cp, poblacio, provincia, telefon, nif) VALUES ('$codi', '$nom', '$adreca', '$cp', '$poblacio', '$provincia', '$telefon', '$nif')";
      mysqli_query($conn, $sql);
    }
    ?>
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
  
  <!-- Enlace al archivo JavaScript de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>