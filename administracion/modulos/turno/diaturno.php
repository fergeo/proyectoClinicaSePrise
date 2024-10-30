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
        <h1>Dia Turno</h1>

        <form  action="alta_turno_sql.php" method="post" class="formulario-turnos">
            <div class="inputs">
                <label for="dia" class="label-input">dia:</label>
                <div class="inputs">
                    <select id="dia" name="dia">
                        <option value='x'>Elije una opción</option>
                        <option value='Lunes'>Lunes</option>
                        <option value='Martes'>Martes</option>
                        <option value='Miercoles'>Miercoles</option>
                        <option value='Jueves'>Jueves</option>
                        <option value='Viernes'>Viernes</option>
                        <option value='Sabado'>Sabado</option>
                    </select>
            </div>
            </div>
            <div class="inputs">
                <label for="nombre" class="label-input">Descripcion:</label>                
                <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion">
            </div>
            <div class="inputs">
                <label for="nombre" class="label-input">Cantidad:</label>      
                <input type="text" id="cantidad" name="cantidad" placeholder="cantidad Inicial">
            </div>
            <div class="botones">
                <button button type="submit" class="btn-add">Agregar</button>
                <button button type="submit" class="btn-add" class="button-modificar" id="button-modificar">Modificar</button>
            </div>
            <?php echo $mensaje; ?>  
        </form>
    </main>

    
</body>
</html>