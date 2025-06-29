<?php 
include '../Controlador/calendario_datos.php';
include 'header.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Calendario Animal</title>
  <style>
    /* Reset básico */
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #ffffc3;
      margin: 0;
      padding: 0;
      color: #2e3e1f;
      user-select: none;
    }

    main.container {
      max-width: 480px;
      margin: 40px auto;
      background: white;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgb(0 0 0 / 0.15);
      padding: 20px;
    }

    /* Botón atrás */
    .back-button {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background-color: #617b2e;
      border: none;
      border-radius: 50%;
      width: 42px;
      height: 42px;
      color: white;
      font-size: 1.5rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 3px 6px rgb(97 123 46 / 0.5);
    }
    .back-button:hover {
      background-color: #4a6322;
    }
    .back-button:focus {
      outline: none;
      box-shadow: 0 0 0 3px #a1b35f;
    }

    /* Título Mes-Año */
    #monthYear {
      font-weight: 700;
      font-size: 1.5rem;
      color: #4a6322;
      text-transform: uppercase;
    }

    /* Fila encabezado de días */
    .weekdays {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      text-align: center;
      font-weight: 600;
      color: #5a7033;
      margin-top: 10px;
      user-select: none;
    }
    .weekdays div {
      padding: 10px 0;
    }

    /* Contenedor calendario */
    #calendarGrid {
      margin-top: 10px;
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 8px;
    }

    /* Cada celda del calendario */
    .calendar-cell {
      background-color: #d9e4b5;
      border-radius: 14px;
      height: 68px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: #2e3e1f;
      font-weight: 600;
      cursor: default;
      box-shadow: inset 2px 2px 6px rgba(255 255 255 / 0.7),
                  inset -2px -2px 6px rgba(0 0 0 / 0.1);
      transition: background-color 0.3s ease;
      user-select: none;
      font-size: 0.9rem;
    }
    .calendar-cell strong {
      font-size: 1.2rem;
      margin-bottom: 4px;
    }
    .calendar-cell small {
      font-weight: 500;
      color: #50662f;
    }

    /* Celdas vacías */
    .calendar-cell.empty {
      background-color: transparent;
      box-shadow: none;
      cursor: default;
    }

    /* Controles para cambiar mes */
    .month-controls {
      margin-top: 5px; /* Ajuste para subir los botones */
      display: flex;
      justify-content: space-between;
    }

    /* Botones mes anterior / siguiente */
    .month-button {
      background-color: #617b2e;
      border: none;
      border-radius: 50%;
      width: 42px;
      height: 42px;
      color: white;
      font-size: 1.5rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 3px 6px rgb(97 123 46 / 0.5);
    }
    .month-button:hover {
      background-color: #4a6322;
    }
    .month-button:focus {
      outline: none;
      box-shadow: 0 0 0 3px #a1b35f;
    }

  </style>
</head>
<body>
  <main class="container my-4">

    <div class="mb-3">
      <a href="hojanimales.html" aria-label="Volver a hoja de animales">
        <button class="back-button" title="Volver">
          &#8592;
        </button>
      </a>
    </div>

    <div class="d-flex justify-content-center align-items-center fw-bold fs-4 mb-2">
      <div id="monthYear">ENERO 2025</div>
    </div>

    <div class="weekdays" aria-label="Días de la semana">
      <div>LUN</div>
      <div>MAR</div>
      <div>MIÉ</div>
      <div>JUE</div>
      <div>VIE</div>
      <div>SÁB</div>
      <div>DOM</div>
    </div>

    <div id="calendarGrid" role="grid" aria-label="Calendario"></div>

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

      calendarGrid.innerHTML = "";

      monthYear.textContent = new Date(year, month).toLocaleString('default', { month: 'long' }).toUpperCase() + ' ' + year;

      // En JS getDay(): 0 = Domingo, 1 = Lunes ... 
      // Queremos que el calendario empiece el lunes (0=lunes), así que ajustamos:
      let firstDay = new Date(year, month, 1).getDay();
      firstDay = (firstDay === 0) ? 6 : firstDay - 1;  // Ajuste: domingo (0) pasa a ser 6, lunes=0, martes=1...

      const totalDays = new Date(year, month + 1, 0).getDate();

      let day = 1;

      for (let i = 0; i < 6; i++) {
        for (let j = 0; j < 7; j++) {
          const col = document.createElement("div");

          if ((i === 0 && j < firstDay) || day > totalDays) {
            col.className = "calendar-cell empty";
            col.innerHTML = "&nbsp;";
          } else {
            col.className = "calendar-cell";

            const dateKey = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            const litros = litrosPorDia[dateKey];

            col.innerHTML = `<strong>${day}</strong><small>${litros ? litros + ' L' : ''}</small>`;
            day++;
          }

          calendarGrid.appendChild(col);
        }
      }
    }

    function changeMonth(offset) {
      currentDate.setMonth(currentDate.getMonth() + offset);
      generateCalendar(currentDate.getMonth(), currentDate.getFullYear());
    }

    // Inicializa calendario
    generateCalendar(currentDate.getMonth(), currentDate.getFullYear());
  </script>
</body>
</html>
