<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/diaTurno.css">

    <?php
        require("../../../inc/conexion.php");
        
        // Sección mensaje.
        $fecha = $_GET['fecha'];
        $mensaje = 'Ingrese los datos';
        if(isset($_GET['mensaje'])){
            if($_GET['mensaje']=='uno'){$mensaje = 'El turno ya existe en la base';}
        }

        session_start(); // Asegurarse de que la sesión esté iniciada
        // Verificar si la variable de sesión está definida
        if (isset($_SESSION['usuario'])) {
            $nreoDNI = $_SESSION['usuario']; 
        }
    ?>

    <title>Escoger Dia Turno</title>
    
</head>
<body>



    <main class="contenedor-principal">
        <h1 class="title"> Dia Turno </h1>

        <h1 class="title"> Turnos Disponibles </h1>

        <table class="tables-turno">
            <thead class="table-headers">
                <tr>
                    <td style="visibility:collapse; display:none;"></td><td>Fecha</td><td>Hora</td><td>Especialista</td><td>Espacio</td><td>Costo</td><td>Acciones</td>
                </tr>
            </thead>
            <tbody class="table-success">
                <?php
                    
                    $consultaT = "select distinct * from turno where diaTurno = '$fecha' order by horaTurno";
                    $resultadoT = mysqli_query($conexion,$consultaT);

                    while($fila=mysqli_fetch_array($resultadoT)){
                        echo "<tr>";
                            echo '<td style="display:none;" id="idTurno">'.$fila['idTurno']."</td>";
                            echo "<td>".$fila['diaTurno']."</td>";
                            echo "<td>".$fila['horaTurno']."</td>";

                            require("../../../inc/conexion.php");
                            $idEspecialista = $fila['idEspecialista'];
                            $consulta3 = "SELECT * FROM especialista WHERE idEspecialista = '$idEspecialista'";
                            $resultado3 = mysqli_query($conexion, $consulta3);
                            if ($resultado3 && mysqli_num_rows($resultado3) > 0) {
                                $especialistaR = mysqli_fetch_array($resultado3); // Obtiene el registro completo
                                
                                // Accede a los valores específicos usando `$especialistaR`
                                //echo "<script>alert('adentros')</script>";
                                echo "<td>".$especialistaR['nombreEspecialista']." ".$especialistaR['apellidoEspecialista']."</td>";

                                // Obtener el valor de espacioEspecialista
                                $espacioEspecialista = $especialistaR['espacioEspecialista'];

                                //echo "<script>alert('adentros')</script>";
                                if($especialistaR['consultorioSalaEstudio'] == "Consultorio"){
                                    // Consulta para obtener los datos del consultorio
                                    $consulta3 = "SELECT * FROM consultorio WHERE idConsultorio = '$espacioEspecialista'";
                                    $resultado3 = mysqli_query($conexion, $consulta3);

                                    // Verificar si la consulta se ejecutó correctamente y si hay resultados
                                    if ($resultado3 && mysqli_num_rows($resultado3) > 0) {
                                        // Obtener el resultado en forma de array asociativo
                                        $consultorio = mysqli_fetch_array($resultado3);
    
                                        // Mostrar los datos
                                        echo "<td>" . $especialistaR['consultorioSalaEstudio'] . " - " . $consultorio['consultorioNombre'] . "</td>"; 
                                    } 
                                    else {
                                        echo "<td>No se encontró el consultorio.</td>";
                                    }
                                }
                                elseif($especialistaR['consultorioSalaEstudio'] == "Sala de Estudios"){
                                    // Consulta para obtener los datos del Sala de Estudios
                                    $consulta3 = "SELECT * FROM salaEstudio WHERE idSalaEstudio = '$espacioEspecialista'";
                                    $resultado3 = mysqli_query($conexion, $consulta3);

                                    // Verificar si la consulta se ejecutó correctamente y si hay resultados
                                    if ($resultado3 && mysqli_num_rows($resultado3) > 0) {
                                        // Obtener el resultado en forma de array asociativo
                                        $consultorio = mysqli_fetch_array($resultado3);
    
                                        // Mostrar los datos
                                        echo "<td>" . $especialistaR['consultorioSalaEstudio'] . " - " . $consultorio['salaEstudioNombre'] . "</td>"; 
                                    } 
                                    else {
                                        echo "<td>No se encontró el consultorio.</td>";
                                    }
                                }
                                

                            } else {
                                echo "<script>alert('No se encontraron resultados')</script>";
                            }
                            echo "<td>".$fila['costo']."</td>";
                            echo "<td>
                                    <a href='alta_diaTurno_sql.php?idTurno=".$fila['idTurno']."&costo=".$fila['costo']."' 
                                        style='text-decoration:none'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                                <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z'/>
                                            </svg>
                                    </a>
                                </td>";
                        echo "</tr>";
                        }
                ?>
            </tbody>
        </table>

        <h1 class="title"> Turnos Reservados </h1>

        <table class="tables-turno">
        <thead class="table-headers">
            <tr>
                <td style="visibility:collapse; display:none;"></td><td>Fecha</td><td>Hora</td><td>Especialista</td><td>Espacio</td><td>Costo</td><td>Acciones</td>
            </tr>
        </thead>
        <tbody class="table-success">
        <?php
            
            $consultaT = "select distinct * 
                            from tuno t,
                                reservaTurno r,
                                especialista e,
                                salaEstudio s,
                                consultorio c
                            where ((e.consultorioSalaEstudio = 'salaEspera'
                                    and espacioEspecialista = idSalaEspera) or
                                (e.consultorioSalaEstudio = 'Consultorio'
                                    and espacioEspecialista = idConsultorio))
                            and t.idEspecialista = e.idEspecialista
                            and r.idTurno = t.idTurno
                            and numDocumentoPaciente = '$nreoDNI'";
            $resultadoT = mysqli_query($conexion,$consultaT);

            while($fila=mysqli_fetch_array($resultadoT)){
                echo "<tr>";
                    echo '<td style="display:none;" id="idTurno">'.$fila['idTurno']."</td>";
                    echo "<td>".$fila['diaTurno']."</td>";
                    echo "<td>".$fila['horaTurno']."</td>";

                    require("../../../inc/conexion.php");
                    $idEspecialista = $fila['idEspecialista'];
                    $consulta3 = "SELECT * FROM especialista WHERE idEspecialista = '$idEspecialista'";
                    $resultado3 = mysqli_query($conexion, $consulta3);
                    if ($resultado3 && mysqli_num_rows($resultado3) > 0) {
                        $especialistaR = mysqli_fetch_array($resultado3); // Obtiene el registro completo
                        
                        // Accede a los valores específicos usando `$especialistaR`
                        //echo "<script>alert('adentros')</script>";
                        echo "<td>".$especialistaR['nombreEspecialista']." ".$especialistaR['apellidoEspecialista']."</td>";

                        // Obtener el valor de espacioEspecialista
                        $espacioEspecialista = $especialistaR['espacioEspecialista'];

                        //echo "<script>alert('adentros')</script>";
                        if($especialistaR['consultorioSalaEstudio'] == "Consultorio"){
                            // Consulta para obtener los datos del consultorio
                            $consulta3 = "SELECT * FROM consultorio WHERE idConsultorio = '$espacioEspecialista'";
                            $resultado3 = mysqli_query($conexion, $consulta3);

                            // Verificar si la consulta se ejecutó correctamente y si hay resultados
                            if ($resultado3 && mysqli_num_rows($resultado3) > 0) {
                                // Obtener el resultado en forma de array asociativo
                                $consultorio = mysqli_fetch_array($resultado3);

                                // Mostrar los datos
                                echo "<td>" . $especialistaR['consultorioSalaEstudio'] . " - " . $consultorio['consultorioNombre'] . "</td>"; 
                            } 
                            else {
                                echo "<td>No se encontró el consultorio.</td>";
                            }
                        }
                        elseif($especialistaR['consultorioSalaEstudio'] == "Sala de Estudios"){
                            // Consulta para obtener los datos del Sala de Estudios
                            $consulta3 = "SELECT * FROM salaEstudio WHERE idSalaEstudio = '$espacioEspecialista'";
                            $resultado3 = mysqli_query($conexion, $consulta3);

                            // Verificar si la consulta se ejecutó correctamente y si hay resultados
                            if ($resultado3 && mysqli_num_rows($resultado3) > 0) {
                                // Obtener el resultado en forma de array asociativo
                                $consultorio = mysqli_fetch_array($resultado3);

                                // Mostrar los datos
                                echo "<td>" . $especialistaR['consultorioSalaEstudio'] . " - " . $consultorio['salaEstudioNombre'] . "</td>"; 
                            } 
                            else {
                                echo "<td>No se encontró el consultorio.</td>";
                            }
                        }
                        

                    } else {
                        echo "<script>alert('No se encontraron resultados')</script>";
                    }
                    echo "<td>".$fila['costo']."</td>";
                    echo "<td>
                            <a href='baja_consultorio_sql.php?idRerservaTurno=".$fila['idRervaTurno']."'
                            style='text-decoration:none'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                    <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
                                </svg>
                            </a>
                        </td>";
                echo "</tr>";
                }
        ?>
    </tbody>
</table>

        <div class="volver">
            <button class="btn-volver"><a href="http://localhost/proyectoClinicaSePrise/paciente/reservaTurno/elegirTurno/elegirTurno.php?espacio=estudio">Volver</a></button> <br><br><br>
        </div>
    </main>

    <script src="js/diaturno.js"></script>
</body>
</html>