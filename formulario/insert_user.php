<?php
require 'vendor/autoload.php'; // Asegúrate de tener instalado el autoload de Composer para MongoDB

$client = new MongoDB\Client("mongodb+srv://jhoyerolivares157:olivares@users.tb25u4p.mongodb.net/");
$collection = $client->userDB->users;

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$pais = $_POST['pais'];
$correo = $_POST['correo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$direccion = $_POST['direccion'];
$password = $_POST['password'];

$result = $collection->insertOne([
    'nombre' => $nombre,
    'apellidos' => $apellidos,
    'pais' => $pais,
    'correo' => $correo,
    'fecha_nacimiento' => new MongoDB\BSON\UTCDateTime((new DateTime($fecha_nacimiento))->getTimestamp()*1000),
    'direccion' => $direccion,
    'password' => $password,
]);

if($result->getInsertedCount() == 1) {
    echo "Usuario insertado exitosamente";
} else {
    echo "Error al insertar el usuario";
}
?>
