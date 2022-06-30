<?php

    include 'conexion_db.php';
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Usuario = '$usuario' and Contraseña = '$contraseña' ");
    

    if(mysqli_num_rows($login) > 0 ){
        header("location: ../menu.php");
        exit;
    } else{
        echo '
        <script> 
            alert("El usuario no existe.");
            window.location ="../index.php";
        </script>
    '; 
    exit;
    }
?>