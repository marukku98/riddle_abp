<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require_once "../librerias/Mail/PHPMailer.php";
    require_once "../librerias/Mail/SMTP.php";
    require_once "../librerias/Mail/Exception.php";

    $nombre = $_POST["name"];
    $de = $_POST["email"];
    $mensaje = $_POST["message"];

    enviaCorreo($nombre, $de, $mensaje);

    function enviaCorreo($nombre, $de, $mensaje){

        $mail = new PHPMailer(true);

        $mail->IsSMTP(); 
        $mail->SMTPAuth = true; 
        $mail->SMTPSecure = "tls"; 
        $mail->Host = "smtp.gmail.com"; 
        $mail->Port = 587; 
        $mail->Username = "riddleteam00@gmail.com"; 
        $mail->Password = "Riddle123abp"; 

        $mail->AddAddress("riddleteam00@gmail.com");
        $mail->SetFrom("$de", "Contacto");
        $mail->isHTML(true);
        $mail->Subject = "Correo de contacto - $de";
        $mail->Body = "Mensaje de: " . $nombre . "<br/>" . $mensaje;

        try {
            $mail->Send();
            
            header("Location: ../body/index.php");
        } catch(Exception $e){
            echo $mail->ErrorInfo;
        }
    }

?>