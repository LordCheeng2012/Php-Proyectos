let SelectDestino = document.getElementById("Destino");

// Crear un evento para que se ejecute cuando el usuario cambie de opción
SelectDestino.addEventListener('change', function() {
    // Mostrar modal con mensaje de carga
    AbrirModal("Cargando..", 0);

    // Obtener el valor de la opción seleccionada
    var indice = SelectDestino.options[SelectDestino.selectedIndex];
    var valorSeleccionado = indice.getAttribute("data-idDestino");

    // Ejecutar código después de 1 segundo
    setTimeout(function () {
        // Cerrar el modal
        AbrirModal("", 1);
    }, 200);

    // Realizar una solicitud AJAX
    $.ajax({
        url: './controladore/Peticiones.php',
        type: 'GET',
        dataType: 'json',
        data: {
            ID: valorSeleccionado,
        },
        success: function (Res) {
            // Obtener los elementos h6 y mostrar la información
            var h6Depart = document.getElementById('h6Depart'); 
            var h6Provinci = document.getElementById('h6Provinci');
            var h6Distri = document.getElementById('h6Distri');
            var h6Desti = document.getElementById('h6Desti');
            
            // Mostrar la información en los elementos correspondientes
            h6Depart.innerHTML = "Departamento : "+ Res[0];
            h6Provinci.innerHTML = "Provincia : "+ Res[1];
            h6Distri.innerHTML = "Distrito : "+ Res[2];
            h6Desti.innerHTML ="Direccion-Agencia : " + Res[3];
            



            // Aquí podrías agregar código para recorrer el array JSON y asignar los valores a cada h6
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:');
            console.error('Estado:', status);
            console.error('Error:', error);
            console.error('Respuesta del servidor:', xhr.responseText);
            Precio.innerHTML = 'error:' + xhr.responseText;
        }
    });
});

function TraePrecio(ID_Pre) {
    let MuestraPrecio = document.getElementById("Precio");
    var IndiceSelect = ID_Pre.selectedIndex; // Obtener el índice de la lista de opciones
    var opcionSelect = ID_Pre.options[IndiceSelect]; // Obtener la opción seleccionada

    // Obtener el valor de la opción seleccionada
    var PrecioOpcion = opcionSelect.getAttribute("data-idPrecio");

    // Realizar una solicitud AJAX
    $.ajax({
        url: './controladore/Peticiones.php',
        type: 'GET',
        dataType: 'json',
        data: {
            ID_Precio: PrecioOpcion,
        },
        success: function (Res) {
            MuestraPrecio.value = Res.Precio;
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:');
            console.error('Estado:', status);
            console.error('Error:', error);
            console.error('Respuesta del servidor:', xhr.responseText);
            Precio.innerHTML = 'error:' + xhr.responseText;
        }
    });
};
