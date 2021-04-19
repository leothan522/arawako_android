<?php
require_once("consultas.php");
$consultas = new Consultas();
$name = null;
$telefono = null;
$email = null;
$error = null;
$password = null;
$data=array();

$data['name'] = false;
$data['email'] = false;
$data['telefono'] = false;
$data['error'] = false;


if (!empty($_POST['name'])){
    $update = $consultas->update('name', $_POST['name'], $_POST['id']);
    if ($update == "update"){
        $data['name'] = ucwords($_POST['name']);
        $name = true;
    }
}
if (!empty($_POST['telefono'])){
    $update = $consultas->update('two_factor_secret', $_POST['telefono'], $_POST['id']);
    if ($update == "update"){
        $data['telefono'] = $_POST['telefono'];
        $telefono = true;
    }
}
if (!empty($_POST['email'])){
    $update = $consultas->update('email', $_POST['email'], $_POST['id']);
    if ($update == "update"){
        $data['email'] = strtolower($_POST['email']);
        $email = true;
    }else{
        if ($update == "error"){
            $error = "email";
        }
    }

}


if (!empty($_POST['password']) && !empty($_POST['nuevo_password'])){
    $update = $consultas->updatePassword($_POST['password'], $_POST['nuevo_password'], $_POST['id']);
    if ($update == "update"){
        $password = true;
    }else{
        if ($update == "incorrecto"){
            $error = "password";
        }
    }

}


if ($name || $email || $password || $telefono){
    $data['success'] = true;
    $data['message'] = "Cambios Guardados Correctamente";
}else{

    switch ($error){

        case "email":
            $data['success'] = false;
            $data['error'] = $error;
            $data['message'] = "El correo electronico ya ha sido registrado anteriormente.";
        break;
        case "password":
            $data['success'] = false;
            $data['error'] = $error;
            $data['message'] = "Password Incorrecto.";
        break;

        default:
            $data['success'] = false;
            $data['message'] = "No se realizo ningun cambio.";
        break;
    }

}


echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>