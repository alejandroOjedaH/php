window.onload= ()=>{
const cuerpo = document.getElementsByTagName("body")[0];
const logeoPag = document.getElementById("login");


cargarPantallaLogin();

function cargarPantallaLogin(){
    ocultar();
    cuerpo.innerHTML=logeoPag.innerHTML;
    const logeoBut = document.getElementById("logear");

    logeoBut.onclick = function(){
        const usuario = document.getElementById("usuario");
        const clave = document.getElementById("contrasenna");
        let datos ={
            usuario: usuario.value,
            password: clave.value
        }

        fetch("http://localhost/php/practica15/api",{method:"POST", headers:{"Content-Type":"application/json"}, body: JSON.stringify(datos)})
        .then(response => {
            if(!response.ok){
                console.error("Error Logeo");
            }else{
                return response.json;
            }
        })
        .then(esto =>{
            console.log(esto.toString());
        })
    }
}

function ocultar(){
    cuerpo.innerHTML="";
}
}

