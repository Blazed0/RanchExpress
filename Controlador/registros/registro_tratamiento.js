document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registration-form');
    const resultDiv = document.getElementById('result');



    form.addEventListener('submit', function (event) {
         event.preventDefault();
   
        
        const fecha_aplicacion = document.getElementById('fecha_aplicacion').value;
        const diagnostico = document.getElementById('diagnostico').value;
        const nombre_tratamiento = document.getElementById('nombre_tratamiento').value;
        const observaciones = document.getElementById('observaciones').value;
        const realizador = document.getElementById('realizador').value;
     

        const message = `
            <div class="alert alert-success" role="alert">
                Vacuna registrado exitosamente con los siguientes detalles:<br>
                
                Fecha de aplicacion: ${fecha_aplicacion}<br>
                Diagnostico: ${diagnostico} <br>
                Nombre del tratamiento: ${nombre_tratamiento} <br>
                Observaciones: ${observaciones}<br>
                Realizador: ${realizador}<br>
            </div>
        `;

        resultDiv.innerHTML = message;
        form.submit();
    });
});