<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnos</title>
</head>
<body>

    <?php
        //require("../../inc/cabecera.php");
        //cabecera();

        require("../../../inc/conexion.php");
    ?>

    <main class="contenedor-principal">
        <h1>Turnos</h1>

        <div class="CalendarGrid">
            <div class="CalendarGrid-mask" style="width: 4000px;">
                <table class="CalendarGrid-table">
                    <thead>
                        <tr>
                            <th class="CalendarHeaderCell"><div class="CalendarHeaderCell-inner">enero</div></th>
                            <th class="CalendarHeaderCell"><div class="CalendarHeaderCell-inner">febrero</div></th>
                            <th class="CalendarHeaderCell"><div class="CalendarHeaderCell-inner">marzo</div></th>
                            <th class="CalendarHeaderCell"><div class="CalendarHeaderCell-inner">abril</div></th>
                            <th class="CalendarHeaderCell"><div class="CalendarHeaderCell-inner">mayo</div></th>
                            <th class="CalendarHeaderCell"><div class="CalendarHeaderCell-inner">junio</div></th>
                            <th class="CalendarHeaderCell"><div class="CalendarHeaderCell-inner">julio</div></th>
                            <th class="CalendarHeaderCell"><div class="CalendarHeaderCell-inner">agosto</div></th>
                            <th class="CalendarHeaderCell"><div class="CalendarHeaderCell-inner">septiembre</div></th>
                            <th class="CalendarHeaderCell"><div class="CalendarHeaderCell-inner">octubre</div></th>
                            <th class="CalendarHeaderCell"><div class="CalendarHeaderCell-inner">noviembre</div></th>
                            <th class="CalendarHeaderCell"><div class="CalendarHeaderCell-inner">diciembre</div></th>
                        </tr>
                    </thead>
                    <tbody id="calendarBody">
                    </tbody>
                </table>
            </div>
        </div>

        <div class="volver">
            <button class="btn-volver"><a href="http://localhost/proyectoClinicaSePrise/administracion/main-adm.php">Volver</a></button>
        </div>

    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</body>

</html>