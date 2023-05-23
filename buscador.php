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
<script></script>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plantilla Bootstrap</title>
  <!-- Enlace al archivo CSS de Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script>
  // Comprobar si la variable en localStorage está definida
  if (localStorage.getItem('miVariableLocalStorage') === null) {
    localStorage.setItem('miVariableLocalStorage', true);
  }
</script> -->
  <!-- <script>
  $(document).ready(function() {
    if (localStorage.getItem('miVariableLocalStorage') === 'false') {
      $('#texto').hide();
    }
  });
</script> -->



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
    <div class="buscador">
      <form id="search-form" method="post">
        <label for="search-term" style="margin-top: 15px;"><b>Buscar per:</b></label>
        <select name="campo" id="search-field">
          <option value="codi">Codi</option>
          <option value="nom">Nom</option>
          <option value="adreca">Direcció</option>
          <option value="cp">Códi Postal</option>
          <option value="poblacio">Població</option>
          <option value="provincia">Provincia</option>
          <option value="telefon">Teléfon</option>
          <option value="nif">NIF</option>
        </select>
        <input type="text" name="valor" id="search-term">
        <button value="buscar" type="submit" id="boton">Buscar</button>
      </form>
    </div>
    <!-- <div id="texto" style="margin-top: 6%; text-align: center; background-color: #0e9a8cb4 ">asdasdads</div> -->
    <div id="search-results"></div>
    <div class="clients mt-4">
      <?php
      // Procesar el formulario de búsqueda
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $campo = $_POST["campo"];
        $valor = $_POST["valor"];

        // Construir la consulta SQL
        $sql = "SELECT * FROM clients WHERE $campo = '$valor'";
        $result = mysqli_query($conn, $sql);

        // Mostrar el resultado de la búsqueda en una tabla HTML
        if (mysqli_num_rows($result) > 0) {
          echo "<div style='border: 5px solid white;'>";
          echo "<table>";
          echo "<tr><th>Codi</th><th>Nom</th><th>Adreca</th><th>CP</th><th>Poblacio</th><th>Provincia</th><th>Telefon</th><th>NIF</th></tr>";
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
            echo "</tr>";
          }
          echo "</table>";
          echo "</div>";
        } else {
          echo "<b><p>No se encontraron resultados.</p></b>";
        }
      } else {
        echo "<div style='#0e9a8cb4; color: white; border: 3px solid white; '>
        <div style='padding: 4%'>
        <h1>Buscador</h1>
        Selecciona el criteri de recerca (codi, nom, direcció, codi postal, població, província, telèfon o NIF) i seguidament busca el client que desitges. Un cop trobat el client, pots fer clic sobre el seu nom per veure la seva documentació, o pujar-ne en format PDF.
        </div></div>";
      }
      mysqli_close($conn);

      ?>

    </div>




  </main>
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

  <!-- Enlace al archivo JavaScript de Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>