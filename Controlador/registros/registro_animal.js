document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registration-form');
    const resultDiv = document.getElementById('result');



    form.addEventListener('submit', function (event) {
         event.preventDefault();
   
        
        const codigo_animal = document.getElementById('codigo_animal').value;
        const fecha_ingreso = document.getElementById('fecha_ingreso').value;
        const fecha_nacimiento = document.getElementById('fecha_nacimiento').value;
        const peso_nacimiento = document.getElementById('peso_nacimiento').value;
        const especie = document.getElementById('especie').value;
        const nombre = document.getElementById('nombre').value;
         const raza = document.getElementById('raza').value;
         const color = document.getElementById('color').value;
        const sexo = document.getElementById('sexo').value;
        const estado = document.getElementById('estado').value;
        const image = document.getElementById('image').value;

        const message = `
            <div class="alert alert-success" role="alert">
                Animal registrado exitosamente con los siguientes detalles:<br>
                
                Codigo: ${codigo_animal}<br>
                Fecha de ingreso: ${fecha_ingreso} <br>
                Fecha de nacimiento: ${fecha_nacimiento} <br>
                Peso de nacimiento: ${peso_nacimiento} kg<br>
                Especie: ${especie}<br>
                Nombre: ${nombre}<br>
                  Raza: ${raza}<br>
                Color: ${color}<br>
                 Sexo: ${sexo}<br>
                 Estado: ${estado}<br>
                Imagen: ${image}<br>
            </div>
        `;

        resultDiv.innerHTML = message;
        form.submit();
    });
});