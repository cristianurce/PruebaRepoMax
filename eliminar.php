<?php
include 'conexio.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM clients WHERE codi='$id'";
    mysqli_query($conn, $query);
    header('Location: llistat.php');
    exit();
}
?>
