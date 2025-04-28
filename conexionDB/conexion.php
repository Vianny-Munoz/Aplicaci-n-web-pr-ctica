<?php
    $conexion=mysqli_connect("localhost", "root", "", "db_pastoeats");
        if(!$conexion){
            echo "Error de conexion: " . mysqli_connect_error();
            exit();
        }
        else{
            echo "Conectado a la base de datos";
        }

?>
