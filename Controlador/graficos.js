window.onload = function() {

    // Arreglo que almacenará los puntos del gráfico (x, y)

    var dataPoints = [];

    // Configuración del gráfico
    var options = {
          animationEnabled: true,
        theme: "light2", // Tema visual del gráfico
        title: {
            text: "Producción de leche" // Título del gráfico
        },

        axisX:{
            title:"Fecha",
            labelAngle: -45
        },
          axisY:{
            title:"Litros",
       
        },
        data: [{
            
            type: "line", // Tipo de gráfico: línea
            dataPoints: dataPoints // Aquí se agregan los puntos dinámicos
        }]
    };

    // Inicializa el gráfico en el contenedor con las opciones definidas
    $("#chartContainer").CanvasJSChart(options);

    // Función que agrega nuevos datos al gráfico
    function addData(data) {
           dataPoints.length = 0;
            // Si se agregan múltiples datos, se recorre el arreglo
            $.each(data, function(key, value) {
                dataPoints.push({ label: value.label, y: parseInt(value.y)});
            });

        // Se vuelve a renderizar el gráfico con los nuevos datos
        $("#chartContainer").CanvasJSChart().render();
        // Se programa otra actualización de datos dentro de 1.5 segundos
        setTimeout(updateData, 1500);	
    }

    // Función que obtiene nuevos datos desde un servicio externo
    function updateData() {
        // Petición AJAX para obtener datos simulados desde el servidor de CanvasJS
       const params = new URLSearchParams(window.location.search);
const token = params.get('token');
$.getJSON(`../Controlador/leche/obtener_leche.php?token=${token}`, addData);

    }

    updateData();

}
