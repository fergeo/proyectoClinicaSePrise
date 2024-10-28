<?php
    
    // Agrego conexión a BDD
    require("../../../inc/conexion.php");

    // Tomo los datos del formulario
    $idConsultorio = $_POST['idConsultorio'];
    $idInsumo = $_POST['idInsumo'];

    echo "<script>alert('alert mensaje 1246')</script>";
    
    // Estructura de decisión
    //if($existe==1){
        // Modifico el mensaje y volvemos al formulario
    //    header("Location: consultorioInsumo.php?idConsultorio=$idConsultorio");
    //}
    //else{
    
        // El usuario no existe, permitimos la carga.
        $alta = "insert into consultorioInsumo values('$idConsultorio','$idInsumo')";
        $resultado_alta = mysqli_query($conexion,$alta);

        // Redirigimos al usuario
        header("Location:consultorioInsumo.php?idConsultorio=$idConsultorio");
    //}
?>