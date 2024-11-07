<?php
    // Conexión al servidor de BDD
    include('../../../inc/conexion.php');

    $idRervaTurno = $_GET['idRervaTurno'];
    
    // Hacemos la baja del registro
    $baja = "delete from reservaturno where idReservaTurno = '$idRerservaTurno'";
    $resultado_baja = mysqli_query($conexion,$baja);
    header("Location:diaTurno.php?");

?>