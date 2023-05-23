<?php
include 'conexio.php';
?>


<?php

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM usuari WHERE nom='$username' AND contra='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        echo '<script>alert("' . $username . '");</script>';
        // Redirige al usuario a la página de inicio
        header('Location: index.php');
        exit();
    } else {
        $error = 'Nombre de usuario o contraseña incorrectos';
        echo '<script>alert("' . $error . '");</script>';
    }
}
session_destroy();

if (isset($_GET['error']))
{
    echo '<script>alert("' . $_GET['error'] . '");</script>';
}

?>


<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="./css/login.css">

    <!--<title>Login & Registration Form</title>-->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="logo-container">
                    <img src="./img/logo.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6">
                <div class="forms">
                    <div class="form login">
                        <span class="title">Login</span>

                        <form action="login.php" method="POST">
                            <div class="input-field">
                                <input type="text" name="username" class="form-control" placeholder="Usuari">
                                <i class="uil uil-user"></i>
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" class="form-control" placeholder="Contrasenya">
                                <i class="uil uil-lock icon"></i>
                                <i class="uil uil-eye-slash showHidePw"></i>
                            </div>

                            <div class="input-field button">
                                <input type="submit" class="btn btn-primary" value="Entra">
                            </div>

                        </form>

                        <div class="login-signup">
                            <span class="text">No tens una compte?
                                <a href="#" class="text signup-link">Crea una compte</a>
                            </span>
                        </div>

                    </div>

                    <!-- Registration Form -->

                    <div class="form signup">
                        <span class="title">Registration</span> 

                        <form action="register.php" method="POST">
                            <div class="input-field">
                                <input type="text" name="username" placeholder="Introdueix el teu nom" required>
                                <i class="uil uil-user"></i>
                            </div>
                            <div class="input-field">
                                <input type="text" name="email" placeholder="Introdueix el teu correu" required>
                                <i class="uil uil-envelope icon"></i>
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" class="password" placeholder="Crea una contrasenya" required>
                                <i class="uil uil-lock icon"></i>
                            </div>
                            <div class="input-field">
                                <input type="password" name="confirm_password" class="password" placeholder="Repeteix la contrasenya" required>
                                <i class="uil uil-lock icon"></i>
                                <i class="uil uil-eye-slash showHidePw"></i>
                            </div>

                            <div class="checkbox-text">
                                <div class="checkbox-content">
                                    <input type="checkbox" id="termCon" required>
                                    <label for="termCon" class="text">Acepto els terminis i les condicions</label>
                                </div>
                            </div>
                            

                            <div class="input-field button">
                                <input type="submit" value="Registrat">
                            </div>
                        </form>

                        <div class="login-signup">
                            <span class="text">Ja tens una compte?
                                <a href="login.php" class="text login-link">Login</a>
                            </span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>     