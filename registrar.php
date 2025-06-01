<?php
include ('ConexionDB/conexion.php');
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$cedula = $_POST['cedula'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$sql = "INSERT INTO usuarios (nombre, apellido, usuario, password, cedula, correo, telefono, direccion, fecha_nacimiento)
        VALUES ('$nombre', '$apellido', '$usuario', '$password', '$cedula', '$correo', '$telefono', '$direccion', '$fecha_nacimiento')";

if (mysqli_query($conexion, $sql)){
    //Redirigiendo a productos
    echo "Registro correcto. Redirigiendo...";
    header("Location: index.html");
    exit();;
}else{
    echo "Error. " . mysqli_error($conexion);
}

?>
