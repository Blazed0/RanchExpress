window.onload = function() {

    // Arreglo que almacenará los puntos del gráfico (x, y)
    var dataPoints = [];

    // Configuración del gráfico
    var options = {
        theme: "light2", // Tema visual del gráfico
        title: {
            text: "Producción de leche" // Título del gráfico
        },
        data: [{
            type: "line", // Tipo de gráfico: línea
            dataPoints: dataPoints // Aquí se agregan los puntos dinámicos
        }]
    };

    // Inicializa el gráfico en el contenedor con las opciones definidas
    $("#chartContainer").CanvasJSChart(options);

    // Llama a la función que actualiza los datos del gráfico
    updateData();

    // Variables para el eje X e Y y la cantidad de datos nuevos a agregar
    var xValue = 0;
    var yValue = 10;
    var newDataCount = 6;

    // Función que agrega nuevos datos al gráfico
    function addData(data) {
        if(newDataCount != 1) {
            // Si se agregan múltiples datos, se recorre el arreglo
            $.each(data, function(key, value) {
                dataPoints.push({x: value[0], y: parseInt(value[1])});
                xValue++; // Incrementa el valor X
                yValue = parseInt(value[1]); // Actualiza Y con el valor actual
            });
        } else {
            // Si se agrega solo un punto nuevo
            dataPoints.push({x: data[0][0], y: parseInt(data[0][1])});
            xValue++;
            yValue = parseInt(data[0][1]);
        }

        newDataCount = 1; // A partir de aquí, solo se agregará un dato a la vez

        // Se vuelve a renderizar el gráfico con los nuevos datos
        $("#chartContainer").CanvasJSChart().render();

        // Se programa otra actualización de datos dentro de 1.5 segundos
        setTimeout(updateData, 1500);	
    }

    // Función que obtiene nuevos datos desde un servicio externo
    function updateData() {
        // Petición AJAX para obtener datos simulados desde el servidor de CanvasJS
        $.getJSON("../Controlador/leche/datos_leche_animal.php", addData);
    }

}
