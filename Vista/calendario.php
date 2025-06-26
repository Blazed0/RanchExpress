<?php 
include '../Controlador/ver_caprinos.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendario Animal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../public/calendario.css">
</head>
<body>



<main class="container my-4">
  <div class="mb-3">
    <a href="hojanimales.html">
    <button class="btn btn-outline-dark rounded-circle">
      <span class="fs-4">&#8592;</span>
    </button>
    </a>
  </div>

  <div class="row text-center fw-bold fs-4 mb-2">
    <div class="col border border-dark">SAM</div>
    <div class="col border border-dark" id="monthYear">ENERO 2025</div>
  </div>

  <div class="row text-center fw-bold">
    <div class="col">LUNES</div>
    <div class="col">MARTES</div>
    <div class="col">MIERCOLES</div>
    <div class="col">JUEVES</div>
    <div class="col">VIERNES</div>
    <div class="col">SABADO</div>
    <div class="col">DOMINGO</div>
  </div>

  <div id="calendarGrid" class="border border-dark p-2 rounded"></div>

  <div class="d-flex justify-content-between mt-3">
    <button class="btn btn-outline-dark rounded-circle" onclick="changeMonth(-1)"><span class="fs-4">&#8592;</span></button>
    <button class="btn btn-outline-dark rounded-circle" onclick="changeMonth(1)"><span class="fs-4">&#8594;</span></button>
  </div>
</main>



<script>
  let currentDate = new Date();

 
  const litrosPorDia = <?php echo $produccionJSON ?? '{}'; ?>;

  function generateCalendar(month, year) {
    const calendarGrid = document.getElementById("calendarGrid");
    const monthYear = document.getElementById("monthYear");

    //Aca  es donde se dibuja el nombre del mes y el año
    calendarGrid.innerHTML = "";
    monthYear.textContent = `${new Date(year, month).toLocaleString('default', { month: 'long' }).toUpperCase()} ${year}`;
//Toma el primer dia del mes y el total de dias que tiene el mes
    const firstDay = new Date(year, month, 1).getDay();
    const totalDays = new Date(year, month + 1, 0).getDate();
    let day = 1;
//Establecemos las filas y columnas de la tabla, osease las semanas y dias del calendario
//Fila
    for (let i = 0; i < 6; i++) {
      const row = document.createElement("div");
      row.className = "row text-center";
//Columna
      for (let j = 0; j < 7; j++) {
        const col = document.createElement("div");
        col.className = "col calendar-cell";


        //Aca es donde dibuja los campos en blanco para los dias faltantes al terminar el mes
        if ((i === 0 && j < (firstDay === 0 ? 6 : firstDay - 1)) || day > totalDays) {
          col.innerHTML = "&nbsp;";
        } else {
          const dateKey = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
          const litros = litrosPorDia[dateKey];
          col.innerHTML = `<strong>${day}</strong><br><small>${litros ? litros + ' L' : ''}</small>`;
          day++;
        }
        row.appendChild(col);
      }
      calendarGrid.appendChild(row);
    }
  }

  function changeMonth(offset) {
    currentDate.setMonth(currentDate.getMonth() + offset);
    generateCalendar(currentDate.getMonth(), currentDate.getFullYear());
  }

  generateCalendar(currentDate.getMonth(), currentDate.getFullYear());
</script>


  <?php
    include 'footer.html';
    ?>
</body>
</html>
