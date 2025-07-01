$(function() {
  var dataPoints = [];

  var options = {
      animationEnabled: true,
    theme: "light2",
    title: {
      text: "Producción de lana"
    },
     axisX: {
      title: "Año",
      interval: 1, // Para que muestre cada punto
      labelFormatter: function(e) {
        return e.value;
      }
    },
    axisY: {
      title: "Kilos producidos"
    },

    data: [{
      type: "line",
      dataPoints: dataPoints
    }]
  };

  $("#chartContainerLana").CanvasJSChart(options);

 

  function updateData() {
    const params = new URLSearchParams(window.location.search);
    const token = params.get('token');

    $.getJSON(`../Controlador/lana/obtener_lana.php?token=${token}`, function(data) {
       dataPoints.length = 0;

      $.each(data, function(index, value) {
        dataPoints.push({x: value.año, y: value.total_kilos,
               label: String(value.año)
        });
   
      });
      $("#chartContainerLana").CanvasJSChart().render();
    });
  }

  updateData();
});