<?php

    include 'conexion_db.php';

    $nombre_completo = $_POST['nombre'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $encriptacion = hash('sha512', $contraseña);

    $query = "INSERT INTO usuarios (Nombre, Correo, Direccion, Usuario, Contraseña) 
                VALUES ('$nombre_completo', '$correo', '$direccion', '$usuario', '$contraseña')";
    
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Correo = '$correo' OR Usuario = '$usuario'"); 
    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
        <script> 
            alert("El usuario o correo ya existen. Intente registrarse con otros datos.");
            window.location ="../index.php";
        </script>
    '; 
    exit();
    }

    $execute = mysqli_query($conexion, $query);
    if($execute){
        echo '
            <script> 
                alert("Usuario registrado exitosamente.");
                window.location ="../index.php";
            </script>
        ';
    }
    else{
        echo '
            <script> 
                alert("Hubo un problema, intentar nuevamente.");
                window.location ="../index.php";
            </script>
        ';
    }
    mysqli_close($conexion);
?>