<?php
    // Conexión al servidor de BDD
    include('../../../inc/conexion.php');

    $idReservaTurno = $_GET['idReservaTurno'];
    $fecha = $_GET['fecha'];

    echo "<script>alert('turno reserva: $idReservaTurno')</script>";
    
    // Hacemos la baja del registro
    $baja = "delete from reservaturno where idReservaTurno = '$idReservaTurno'";
    $resultado_baja = mysqli_query($conexion,$baja);
    header("Location:diaTurno.php?fecha=$fecha");

?>