<?php
require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

try {
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'cristianurquieta2001@ginebro.cat';                     
    $mail->Password   = 'cris669390655';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
    $mail->Port       = 587;                                   
    $mail->setFrom('cristianurquieta2001@ginebro.cat', 'Finques Sant Celoni');
    $correoDestinatario = $_POST['destinatario'];
    $mail->addAddress($correoDestinatario, 'Destinatario');
    
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        $archivo = $_FILES['archivo']['tmp_name'];
        $nombreArchivo = $_FILES['archivo']['name'];
        $tipoArchivo = $_FILES['archivo']['type'];
        
        // Verificar si el archivo es un PDF válido
        if ($tipoArchivo === 'application/pdf') {
            $mail->addAttachment($archivo, $nombreArchivo);
        } else {
            throw new Exception('Solo se permiten archivos PDF.');
        }
    }
    
    $mail->isHTML(true);                                  
    $mail->Subject = $_POST['asunto'];
    $mail->Body    = $_POST['contenido']; 
    
    $mail->send();
    
    header('Location: contacte.php');
    exit();
} catch (Exception $e) {
    echo '<script>alert("Error: ' . $e->getMessage() . '"); history.back();</script>';
}
