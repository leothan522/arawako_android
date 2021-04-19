<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'Constantes.php';
require_once("consultas.php");
$consultas = new Consultas();
$data=array();

if (empty($_POST['email'])) {
    $data['success'] = false;
    $data['message'] = 'Campos Vacios al enviar los datos';
    echo(json_encode($data));
}else{
	
	$resultado = $consultas->recuperarPassword($_POST['email']);
	if ($resultado && $resultado != "true" && $resultado != "false"){
        $data['success'] = true;
        $data['message'] = "La nueva clave fue enviada por correo";
        echo(json_encode($data));

        // Al pasar true habilitamos las excepciones
        $mail = new PHPMailer(true);

        try {
        // Ajustes del Servidor
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Comenta esto antes de producción
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL_SENDER;
        $mail->Password = EMAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinatario
        $mail->setFrom(EMAIL_SENDER, 'ARAWAKO');
        $mail->addAddress($_POST['email']);

        // Mensaje
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo Password';
        $mail->Body = 'Hola, este es tu nuevo Password: <h1 style="color: blue"><pre>'.$resultado.'</pre></h1> Asegurate de guardar bien la clave.';
        $mail->AltBody = 'Este es un mensaje para los clientes que no soportan HTML.';

        $mail->send();
        //echo 'Se envio el mensaje';
        } catch (Exception $e) {
            //echo "Algo salio mal al intentar enviar: {$mail->ErrorInfo}";
            //$data['error'] = true;
            //$data['message'] = "Algo salio mal al intentar enviar.";
        }
    }else{
	    if ($resultado == "true"){
            $data['success'] = true;
            $data['message'] = "La nueva clave fue enviada por correo";
            echo(json_encode($data));
        }else{
            $data['success'] = false;
            $data['message'] = "El Email no coincide con nuestros registros.";
            echo(json_encode($data));
        }
    }
}

