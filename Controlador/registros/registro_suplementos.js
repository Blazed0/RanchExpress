document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registration-form');
    const resultDiv = document.getElementById('result');



    form.addEventListener('submit', function (event) {
    event.preventDefault();
        
        const suplemento = document.getElementById('suplemento').value;
        const date = document.getElementById('date').value;
        const purpose = document.getElementById('purpose').value;
        const fabricante = document.getElementById('fabricante').value;
        const date1 = document.getElementById('date1').value;
     

        const message = `
            <div class="alert alert-success" role="alert">
                Suplemento registrado exitosamente con los siguientes detalles:<br>
                
                Suplemento: ${suplemento}<br>
                Fecha de caducidad: ${date} <br>
                Proposito del suplemento: ${purpose} <br>
                Fabricante: ${fabricante}<br>
                Fecha de aplicacion: ${date1}<br>
            </div>
        `;

        resultDiv.innerHTML = message;
        form.reset();
    });
});