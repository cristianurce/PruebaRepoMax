<?php
include __DIR__.'/conexio.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = 'Las contraseñas no coinciden';
        echo '<script>alert("' . $error . '");</script>';
    } else {
        $query = "SELECT * FROM usuari WHERE nom='$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $error1 = "El nombre de usuario ya existe";

            header("Location: login.php?error=$error1");
        } else {
            $query = "SELECT * FROM usuari WHERE correu='$email'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $error2 = "El correo electrónico ya está asociado a otro usuario";
                echo '<script>alert("' . $error2 . '");</script>';
            } else {
                $query = "INSERT INTO usuari (nom, correu, contra) VALUES ('$username', '$email', '$password')";
                mysqli_query($conn, $query);
                header('Location: login.php');
                
            }
            
        }
    }
}

?>
