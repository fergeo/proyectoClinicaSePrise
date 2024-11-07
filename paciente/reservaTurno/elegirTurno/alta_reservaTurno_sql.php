<?php
    
    // Agrego conexión a BDD
    require("../../../inc/conexion.php");

    // Tomo los datos del formulario
    $idTurno = $_POST['idTurno'];
    $costo = $_POST['costo'];
    
    session_start(); // Asegurarse de que la sesión esté iniciada
    // Verificar si la variable de sesión está definida
    if (isset($_SESSION['usuario'])) {
        $nreoDNI = $_SESSION['usuario']; // Recuperar el valor de la sesión
        echo "El valor de la sesión es: " . $valor;

        // Verificamos si existe el usuario.
        $consulta1 = "select distinct idPaciente as idPaciente from paciente where diaTurno = '$fecha' and horaTurno = '$hora' and numDodcumentoPaciente = '$nroDNI' ";
        $resultado1 = mysqli_query($conexion,$consulta1);
    
        while($a = mysqli_fetch_assoc($resultado1)){
            $idPaciente = $a['idPaciente'];

            if($a['poseeObraSocial'] == 1){
                $montofinal = $costo * 1.2;
            }

        }

        // Estructura de decisión
        if($existe==1){
            // Modifico el mensaje y volvemos al formulario
            header("Location: diaturno.php?mensaje=uno");
        }
        
        // El usuario no existe, permitimos la carga.
        $alta = "insert into reservaturno values(NULL,'$idTurno','$idPaciente','$montofinal')";
        $resultado_alta = mysqli_query($conexion,$alta);
    }
    else {
        echo "La variable de sesión 'nombre_variable' no está definida.";
    }

    // Redirigimos al usuario
    header("Location: diaturno.php?fecha=$fecha");
    
        
?>