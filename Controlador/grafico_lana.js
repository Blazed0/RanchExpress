$(function() {
  var dataPoints = [];

  var options = {
      animationEnabled: true,
    theme: "light2",
    title: {
      text: "Producción de lana"
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
      $.each(data, function(key, value) {
        dataPoints.push({x: value[0], y: parseFloat(value[1])});
      });
      $("#chartContainerLana").CanvasJSChart().render();
    });
  }

  updateData();
});