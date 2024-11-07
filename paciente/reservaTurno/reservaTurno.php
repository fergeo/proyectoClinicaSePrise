<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="css/style.css">

    <?php
        require("inc/cabecera.php");
        cabecera();
    ?>

    <title>Reserva de Turno</title>
</head>
<body>

    <main class="modulos">
        <div class="imagen-modulo">
            <img class="administracion" src="./assets/administracion.jpg" alt="Administración">
        </div>
        <div class="botones-modulos">
            <h1>Reserva de Turnos</h1>
            <button class="btn-historiaClinica"><a href="elegirTurno/elegirTurno.php?espacio=consultorio">Consultorios Externos</a></button>
            <button class="btn-registrarReserva"><a href="elegirTurno/elegirTurno.php?espacio=estudio">Estudios</a></button>
            
            <button class="btn-registrarReserva"><a href="http://localhost/proyectoClinicaSePrise/paciente/reservaTurno/reservaTurno.php">Voler</a></button>
        </div>
        
    </main>

</body>
</html>