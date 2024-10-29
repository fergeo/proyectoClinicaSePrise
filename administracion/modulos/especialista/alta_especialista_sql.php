<?php
    
    echo "<script>alert('antes if ingreos')</script>";

    if (isset($_POST["consultorioSala"])) {
        $consultorioSala = $_POST['consultorioSala'];

        echo "<script>alert('ingreos')</script>";
        
        header("Location: especialista.php?espacios=$consultorioSala");
    } 

    if (isset($_POST["especialista"])) {
        // Agrego conexión a BDD
        require("../../../inc/conexion.php");

        // Tomo los datos del formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $matricula = $_POST['matricula'];
        $consultorioSalaEspacio = $_POST['consultorioSalaEspacio'];
        $espacio = $_POST['idEspacios'];

        // Verificamos si existe el usuario.
        $consulta = "select count(distinct matricula) as nuevo from especialista where matricula = '$matricula' ";
        $resultado = mysqli_query($conexion,$consulta);
    
        while($a = mysqli_fetch_assoc($resultado)){
            $existe = $a['nuevo'];
        }

        // Estructura de decisión
        if($existe==1){
            // Modifico el mensaje y volvemos al formulario
            header("Location: consultorio.php?mensaje=uno");
        }
        else{
    
            // El usuario no existe, permitimos la carga.
            $alta = "insert into especialista values(NULL,'$nombre','$apellido','$matricula','$consultorioSalaEspacio','$espacio')";
            $resultado_alta = mysqli_query($conexion,$alta);

            // Redirigimos al usuario
            header("Location: especilista.php?");
        }
    }

    
?>