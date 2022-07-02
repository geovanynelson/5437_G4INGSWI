<?php

$conexion = mysqli_connect("localhost", "root", "", "misdelicias_db");
if($conexion){
    echo 'Conectado';
}else{
    echo 'No conectado';
}
?>