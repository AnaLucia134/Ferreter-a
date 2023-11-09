<?php

$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_de_datos = 'gres';

$conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}


$nombreCompleto = $_POST['nombreCompleto'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$zona = $_POST['zona'];
$departamento = $_POST['departamento'];
$municipio = $_POST['municipio'];
$formaPago = $_POST['formaPago'];
$fechaEntrega = $_POST['fechaEntrega'];
$productos = isset($_POST['productos']) ? $_POST['productos'] : array();

$query = "INSERT INTO pedidos (nombreCompleto, telefono, correo, direccion, zona, departamento, municipio, formaPago, fechaEntrega, productos) VALUES ('$nombreCompleto', '$telefono', '$correo', '$direccion', '$zona', '$departamento', '$municipio', '$formaPago', '$fechaEntrega', '" . implode(", ", $productos) . "')";

if (mysqli_query($conexion, $query)) {
    echo "El pedido se ha registrado exitosamente.";
} else {
    echo "Error al registrar el pedido: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
