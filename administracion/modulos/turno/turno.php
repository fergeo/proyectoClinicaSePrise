<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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

        <div class="tunos">
            <div class="imanen-turno">
                
            </div>

            <div class="cursos-events"> 
                <div class="calendar">
                    <div class="calendar__opts">
                        <select name="calendar__month" id="calendar__month">
                            <option>Ene</option>
                            <option>Feb</option>
                            <option>Mar</option>
                            <option selected>Abr</option>
                            <option>May</option>
                            <option>Jun</option>
                            <option>Jul</option>
                            <option>Ago</option>
                            <option>Sep</option>
                            <option>Oct</option>
                            <option>Nov</option>
                            <option>Dic</option>
                        </select>

                        <select name="calendar__year" id="calendar__year">
                            <option>2022</option>
                            <option>2023</option>
                            <option selected>2024</option>
                        </select>
                    </div>

                    <div class="calendar__body">
                        <div class="calendar__days">
                            <div>L</div>
                            <div>M</div>
                            <div>Mi</div>
                            <div>J</div>
                            <div>V</div>
                            <div>S</div>
                            <div>D</div>
                        </div>

                        <div class="calendar__dates">
                            <div class="calendar__date"><span>1</span></div>
                            <div class="calendar__date"><span>2</span></div>
                            <div class="calendar__date"><span>3</span></div>
                            <div class="calendar__date"><span>4</span></div>
                            <div class="calendar__date"><span>5</span></div>
                            <div class="calendar__date"><span>6</span></div>
                            <div class="calendar__date"><span>7</span></div>
                            <div class="calendar__date"><span>8</span></div>
                            <div class="calendar__date"><span>9</span></div>
                            <div class="calendar__date"><span>10</span></div>
                            <div class="calendar__date"><span>11</span></div>
                            <div class="calendar__date"><span>12</span></div>
                            <div class="calendar__date"><span>13</span></div>
                            <div class="calendar__date"><span>14</span></div>
                            <div class="calendar__date"><span>15</span></div>
                            <div class="calendar__date"><span>16</span></div>
                            <div class="calendar__date"><span>17</span></div>
                            <div class="calendar__date"><span>18</span></div>
                            <div class="calendar__date calendar__date--selected calendar__date--first-date calendar__date--range-start"><span>19</span></div>
                            <div class="calendar__date calendar__date--selected calendar__date--last-date"><span>20</span></div>
                            <div class="calendar__date calendar__date--selected calendar__date--first-date"><span>21</span></div>
                            <div class="calendar__date calendar__date--selected"><span>22</span></div>
                            <div class="calendar__date calendar__date--selected"><span>23</span></div>
                            <div class="calendar__date calendar__date--selected calendar__date--last-date calendar__date--range-end"><span>24</span></div>
                            <div class="calendar__date"><span>25</span></div>
                            <div class="calendar__date"><span>26</span></div>
                            <div class="calendar__date"><span>27</span></div>
                            <div class="calendar__date"><span>28</span></div>
                            <div class="calendar__date"><span>29</span></div>
                            <div class="calendar__date"><span>30</span></div>
                            <div class="calendar__date"><span>28</span></div>
                            <div class="calendar__date"><span>29</span></div>
                            <div class="calendar__date"><span>30</span></div>
                            <div class="calendar__date calendar__date--grey"><span>1</span></div>
                        </div>
                    </div>

                    <div id="eventModal" class="modal">
                        <div class="modal-content">
                            <span class="close-button">×</span>
                            <h2>Evento o Tarea</h2>
                            <input type="text" id="eventName" placeholder="Nombre del Evento/Tarea">
                            <div class="modal-buttons">
                                <button id="modifyEventButton" style="display:none;">Modificar</button>
                                <button id="cancelEventButton" style="display:none;">Borrar Evento</button>
                                <button id="saveEventButton">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="volver">
            <button class="btn-volver"><a href="http://localhost/proyectoClinicaSePrise/administracion/main-adm.php">Volver</a></button>
        </div>

    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</body>

</html>