document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registration-form');
    const resultDiv = document.getElementById('result');



    form.addEventListener('submit', function (event) {
        event.preventDefault();
        
      const codigo_cria= document.getElementById('codigo_cria').value;
        const fecha_nacimiento = document.getElementById('fecha_nacimiento').value;
        const peso_nacimiento = document.getElementById('peso_nacimiento').value;
        const raza            = document.getElementById('raza').value;
        const sexo              = document.getElementById('sexo').value;
         const observaciones = document.getElementById('observaciones').value;
         const nombre        = document.getElementById('nombre').value;
         const especie       = document.getElementById('especie').value;
         const idPadre       = document.getElementById('idPadre').vaule;
         const idMadre       = document.getElementById('idMadre').value;
        const image = document.getElementById('image').value;

        const message = `
            <div class="alert alert-success" role="alert">
              Cria registrada exitosamente con los siguientes detalles:<br>

               Codigo de la cria: ${codigo_cria}<br>
                Fecha de nacimiento: ${fecha_nacimiento}<br>
                Peso de nacimiento: ${peso_nacimiento} <br>
                 Raza: ${raza}<br>
                Sexo : ${sexo} <br>
                Observaciones : ${observaciones} <br>
                Nombre : ${nombre}<br> 
                Especie : ${especie}<br>
                Codigo del padre: ${idPadre} <br>
                Codigo de la madre: ${idMadre} <br>
                Imagen: ${image}<br>
            </div>
        `;

        resultDiv.innerHTML = message;
 form.submit();
    });
});