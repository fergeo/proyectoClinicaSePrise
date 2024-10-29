
consultorioSalaEspacio = document.getElementById("consultorioSalaEspacio");

consultorioSalaEspacio.addEventListener("change", function() {
    // Obtenemos el valor del select
    selectValor = document.getElementById("consultorioSalaEspacio").value;
    // Asignamos el valor al input
    document.getElementById("cosultorioSala").value = selectValor;
});




