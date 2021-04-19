<?php
require_once("consultas.php");
$consultas = new Consultas();
$data=array();

if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['telefono']) || empty($_POST['password'])) {
    $data['success'] = false;
    $data['message'] = 'Campos Vacios al enviar los datos';
}else{
    $usuario = $consultas->registrar(ucwords($_POST['name']), strtolower($_POST['email']), $_POST['telefono'], $_POST['password']);
    if ($usuario){
        $data['id'] = $usuario['id'];
        $data['name'] = ucwords($usuario['name']);
        $data['email'] = $usuario['email'];
        $data['telefono'] = $usuario['telefono'];
        $data['success'] = true;
        $data['message'] = "Registrado correctamente";
    }else{
        $data['success'] = false;
        $data['message'] = "El correo electronico ya ha sido registrado anteriormente.";
    }

}
echo json_encode($data, JSON_UNESCAPED_UNICODE);

