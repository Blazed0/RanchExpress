document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registration-form');
    const resultDiv = document.getElementById('result');



    form.addEventListener('submit', function (event) {
        event.preventDefault();
        
      const galpon= document.getElementById('galpon').value;
        const nm = document.getElementById('nm').value;
        const amount = document.getElementById('amount').value;
        const breed = document.getElementById('breed').value;
        const weight = document.getElementById('weight').value;
        const image = document.getElementById('image').value;

        const message = `
            <div class="alert alert-success" role="alert">
              Galpon/lote registrado exitosamente con los siguientes detalles:<br>

                Galpon/lote: ${galpon}<br>
                Numero galpon/lote: ${nm}<br>
                Cantidad: ${amount} <br>
                 Raza: ${breed}<br>
                Peso promedio: ${weight} kg<br>
                Imagen: ${image}<br>
            </div>
        `;

        resultDiv.innerHTML = message;
        form.reset();
    });
});