let editandoActivo = false;
let informacionOriginal = {};

function guardarDatosOriginales(){
    informacionOriginal= {
        nombre: document.getElementById('nombreInput').value,
        identificacion : document.getElementById('identificacionInput').value,
        email:document.getElementById('emailInput').value
    };
}

function habilitarEditar(){
    editandoActivo = true;
    guardarDatosOriginales();
    const fields = ['nombre', 'identificacion','email'];

    fields.forEach(field=>{
        document.getElementById(field).classList.add('hidden');
        document.getElementById(field + 'Input').classList.remove('hidden');
});

document.getElementById('view-buttons').classList.add('hidden');
document.getElementById('edit-buttons').classList.remove('hidden');

document.getElementById('mode-text').textContent = "Modo De Edicion Habilitado";

hideMessages();
}

function cancelarEditar(){
    editandoActivo = false;
    Object.keys(informacionOriginal).forEach(field=>{
        document.getElementById(field + 'Input').value = informacionOriginal[field];
        document.getElementById(field + 'Input').classList.add('hidden');
        document.getElementById(field).textContent = informacionOriginal[field];
        document.getElementById(field).classList.remove('hidden');
});

document.getElementById('view-buttons').classList.remove('hidden');
document.getElementById('edit-buttons').classList.add('hidden');

document.getElementById('mode-text').textContent = 'Informacion Personal';

hideMessages();

}

function guardarPerfil(){
    const form = document.getElementById('formularioPerfil');

    if(!form.checkValidity()){
        showError('Por favor Llena todos los campos correctamente y vuelve a intentar');
        return;
    }

    const informacionActualizada = {
        nombre:document.getElementById('nombreInput').value.trim(),
        identificacion:document.getElementById('identificacionInput').value.trim(),
        email: document.getElementById('emailInput').value.trim()
    };

    if(!informacionActualizada.nombre || !informacionActualizada.identificacion|| !informacionActualizada.email){
            showError('Hubo un error en el llenado de los campos, verifica e intenta de nuevo')
        }
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRegex.test(informacionActualizada.email)){
        showError('Por favor Ingresa un correo valido');
        return;
    }
    const controladorActualizar = '../Controlador/registros/actualizar_perfil.php';

    fetch(controladorActualizar,{
        method: 'POST',
        headers:{
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(informacionActualizada)
    }).then(response =>{
        if(!response.ok){
            return response.json().then(errorData =>{
                throw new Error(errorData.message || "Error en la solicitud de la red");
            })
        }
        return response.json();
    })
    .then(data=>{
        if(data.success){
            Object.keys(informacionActualizada).forEach(field=>{
                document.getElementById(field).textContent = informacionActualizada[field];
            });

            editandoActivo = false;
        const fields = ['nombre', 'identificacion','email'];
        fields.forEach(field=>{
            document.getElementById(field).classList.remove('hidden');
            document.getElementById(field + 'Input').classList.add('hidden');
        });
        document.getElementById('view-buttons').classList.remove('hidden');
        document.getElementById('edit-buttons').classList.add('hidden');


        document.getElementById('mode-text').textContent = 'Informacion Personal';

        showSuccess('Perfil actualizado correctamente');
    }else {
        showError(data.message || "Hubo un error al actualizar el perfil, por favor trata nuevamente o contacta con soporte");
    }
}).catch(error => {
    console.error('Error:', error);
    showError(error.messagge || "Fallo al conectar con el servidor, Vuelve a intentar por favor");
})
}

function showSuccess(message){
    hideMessages();
    const successMessage = document.getElementById('success-message');
    successMessage.textContent = message;
    successMessage.classList.remove('hidden');
    setTimeout(hideMessages, 3000);
}
function showError(message){
    hideMessages();
    const errorMessage = document.getElementById('error-message')
    errorMessage.textContent = message;
    errorMessage.classList.remove('hidden');
}

function hideMessages(){
    document.getElementById('success-message').classList.add('hidden');
    document.getElementById('error-message').classList.add('hidden');
}
