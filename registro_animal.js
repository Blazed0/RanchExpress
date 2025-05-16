document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registration-form');
    const resultDiv = document.getElementById('result');



    form.addEventListener('submit', function (event) {
         event.preventDefault();
   
        
        const especie = document.getElementById('especie').value;
        const id = document.getElementById('id').value;
        const weight = document.getElementById('weight').value;
        const breed = document.getElementById('breed').value;
        const age = document.getElementById('age').value;
        const gender = document.getElementById('gender').value;
        const image = document.getElementById('image').value;

        const message = `
            <div class="alert alert-success" role="alert">
                Animal registrado exitosamente con los siguientes detalles:<br>
                
                Especie: ${especie}<br>
                N°codigo: ${id} <br>
                Peso: ${weight} kg<br>
                Raza: ${breed}<br>
                Edad: ${age}<br>
                Sexo: ${gender}<br>
                Imagen: ${image}<br>
            </div>
        `;

        resultDiv.innerHTML = message;
        form.reset();
    });
});