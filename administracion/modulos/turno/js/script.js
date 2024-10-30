document.addEventListener('DOMContentLoaded', function() {
    // Array con los nombres de los días de la semana
    var daysOfWeek = ['dom', 'lun', 'mar', 'mié', 'jue', 'vie', 'sáb'];

    // Función para obtener el nombre del día de la semana
    function getDayName(year, month, day) {
        var dayOfWeekIndex = new Date(year, month, day).getDay();
        return daysOfWeek[dayOfWeekIndex];
    }

    // Obtener el cuerpo de la tabla
    var calendarBody = document.getElementById('calendarBody');

    // Generar las filas para cada día del mes
    for (var day = 1; day <= 31; day++) {
        var row = document.createElement('tr');

        // Generar las celdas para cada día del año
        for (var month = 0; month < 12; month++) {
            var daysInMonth = new Date(2024, month + 1, 0).getDate();
            // Comprobar si el día es válido para el mes actual
            if (day <= daysInMonth) {
                var currentDay = new Date(2024, month, day);
                var cell = document.createElement('td');
                cell.innerHTML = `
                    <div class="CalendarCell CalendarCell--editable">
                        <div class="CalendarCell-dayNumber">${currentDay.getDate()}</div>
                        <div class="CalendarCell-dayName">${getDayName(2024, month, day)}</div>
                        <div class="CalendarCell-eventSocketWrapper">
                            <div class="CalendarEventSocket">
                                <div class="CalendarEventSocket-emptyClickArea"></div>
                                <div class="CalendarEventSocket-overflow" style="display: none;">+0</div>
                                <div class="CalendarEventSocket-selectionOverlay" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
                `;
                row.appendChild(cell);
            }
        }

        // Agregar la fila a la tabla
        calendarBody.appendChild(row);
    }
});