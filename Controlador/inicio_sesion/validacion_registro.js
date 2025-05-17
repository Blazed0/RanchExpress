let numeroDNI = document.getElementById('numeroDNI');
let clave = document.getElementById('clave');
let boton = document.getElementById('iniciar');
let formulario = document.getElementById('formulario');

boton.addEventListener('click', function(event){
    event.preventDefault();
    if(numeroDNI.value.length !==10){
        alert("El DNI debe tener 10 caracteres");
    }else if (!/[A-Z]/.test(clave.value)){
        alert("¿Seguro esa es tu clave?");
    }else if(!/\d/.test(clave.value)){
        alert('¿Seguro esa es tu clave?');
    }else{  
        formulario.submit();
    }
})