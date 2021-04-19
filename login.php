<?php
require_once("consultas.php");
$consultas = new Consultas();
$data=array();

if (empty($_POST['email']) && empty($_POST['password'])) {
    $data['success'] = false;
    $data['message'] = 'Campos Vacios al enviar los datos';
}else{
    $usuario = $consultas->login($_POST['email'], $_POST['password']);
    if ($usuario['success']){
        $data['id'] = $usuario['id'];
        $data['name'] = ucwords($usuario['name']);
        $data['email'] = strtolower($usuario['email']);
        $data['telefono'] = $usuario['telefono'];
        $data['success'] = true;
        $data['message'] = "Bienvenido ".ucwords($data['name']);
    }else{
        $data['success'] = false;
        $data['message'] = "Estas credenciales no coinciden con nuestros registros.";
        if ($usuario['error'] == "email"){
            $data['error'] = "email";
        }else{
            $data['error'] = "password";
        }
    }

}

echo json_encode($data, JSON_UNESCAPED_UNICODE);