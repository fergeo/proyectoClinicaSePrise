<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Panel Paciente</title>
</head>
<body>

    <?php
        require("inc/cabecera.php");
        cabecera();
    ?>

    <main class="modulos">
        <div class="imagen-modulo">
            <img class="administracion" src="./assets/administracion.jpg" alt="Administración">
        </div>
        <div class="botones-modulos">
            <button id="registrar"><a href="registro/regisro.php">Registrarse</a></button>
            <button id="historiaClinica"><a href="historiaClinica/historiaClinica.php">Consultar Historia Clinica</a></button>
            <button id="reservar"><a href="reservaTurno/reservaTurno.php">Rerserva de Turno</a></button>
        </div>
    </main>

</body>
</html>