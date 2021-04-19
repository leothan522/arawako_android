<?php
 header("Access-Control-Allow-Origin: *");

require 'env.php';

class Conexion{
	public function get_conexion(){
		$user = CONEXION_USER;
		$pass = CONEXION_PASSWORD;
		$host = CONEXION_HOST;
		$db = CONEXION_DB;
		$conexion = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
		return($conexion);
	}
}

?>