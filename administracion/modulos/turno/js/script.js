//botón "ir arriba" (togo-top-button)
var btn = $('#goto-top-button');
$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});
btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
});


document.addEventListener("DOMContentLoaded", function() {
    // Función para actualizar el calendario
    function updateCalendar() {
        const monthSelect = document.getElementById("calendar__month");
        const yearSelect = document.getElementById("calendar__year");
        const datesContainer = document.querySelector(".calendar__dates");

        // Obtiene el mes y año seleccionados
        const month = monthSelect.selectedIndex;
        const year = parseInt(yearSelect.value, 10);

        // Obtiene la fecha actual
        const today = new Date();
        const currentDay = today.getDate();
        const currentMonth = today.getMonth();
        const currentYear = today.getFullYear();

        // Calcula el primer día del mes
        const firstDay = new Date(year, month, 1).getDay();

        // Calcula el número total de días en el mes
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        // Limpia los días previos
        datesContainer.innerHTML = '';

        // Ajusta el inicio según el primer día del mes
        for (let i = 0; i < (firstDay === 0 ? 6 : firstDay - 1); i++) {
            const emptyCell = document.createElement("div");
            emptyCell.className = "calendar__date calendar__date--grey";
            datesContainer.appendChild(emptyCell);
        }

        // Llena los días del mes
        for (let day = 1; day <= daysInMonth; day++) {
            const dateCell = document.createElement("div");
            dateCell.className = "calendar__date";
            dateCell.innerHTML = `<span>${day}</span>`;
            if (day === currentDay && month === currentMonth && year === currentYear) {
                dateCell.classList.add("calendar__date--range-start");
            }
            datesContainer.appendChild(dateCell);
        }
    }

    // Añade eventos a los selects para actualizar el calendario
    document.getElementById("calendar__month").addEventListener("change", updateCalendar);
    document.getElementById("calendar__year").addEventListener("change", updateCalendar);
    // Actualiza el calendario inicialmente
    updateCalendar();

    let selectedDay = null; // Almacena el día seleccionado

    // Abre el modal para agregar o modificar un evento
    document.querySelectorAll(".calendar__date:not(.calendar__date--grey)").forEach(day => {
        day.addEventListener("click", function() {
            document.getElementById("eventModal").style.display = "block";
            selectedDay = this;

            // Verifica si el día seleccionado ya tiene un evento asignado
            if (selectedDay.getAttribute('data-event-name')) {
                document.getElementById("eventName").value = selectedDay.getAttribute('data-event-name');
                document.getElementById("saveEventButton").style.display = "none";
                document.getElementById("modifyEventButton").style.display = "inline";
                document.getElementById("cancelEventButton").style.display = "inline";
            } else {
                document.getElementById("eventName").value = '';
                document.getElementById("saveEventButton").style.display = "inline";
                document.getElementById("modifyEventButton").style.display = "none";
                document.getElementById("cancelEventButton").style.display = "none";
            }
        });
    });

    // Cierra el modal
    document.querySelector(".close-button").addEventListener("click", function() {
        document.getElementById("eventModal").style.display = "none";
    });
    
    // Guarda el nuevo evento
    document.getElementById("saveEventButton").addEventListener("click", function() {
        const eventName = document.getElementById("eventName").value;
        if (eventName && selectedDay) {
            selectedDay.classList.add("calendar__date--range-end");
            selectedDay.setAttribute('data-event-name', eventName);
            document.getElementById("eventModal").style.display = "none";
        }
    });

    // Modifica el evento existente
    document.getElementById("modifyEventButton").addEventListener("click", function() {
        const eventName = document.getElementById("eventName").value;
        if (eventName && selectedDay) {
            selectedDay.setAttribute('data-event-name', eventName);
            document.getElementById("eventModal").style.display = "none";
        }
    });

    // Cancela (elimina) el evento existente
    document.getElementById("cancelEventButton").addEventListener("click", function() {
        if (selectedDay) {
            selectedDay.classList.remove("calendar__date--range-end");
            selectedDay.removeAttribute('data-event-name');
            document.getElementById("eventModal").style.display = "none";
        }
    });
});
