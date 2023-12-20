window.onload= ()=>{
    let token = null;
    const cuerpo = document.getElementsByTagName("body")[0];
    const logeoPag = document.getElementById("login");
    const principalPag = document.getElementById("principal");


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

            fetch("http://localhost/php/practica14/api",{method:"POST", headers:{"Content-Type":"application/json"}, body: JSON.stringify(datos)})
            .then(response => {
                if(!response.ok){
                    console.error("Error Logeo");
                }else{
                    return response.json();
                }
            })
            .then(esto =>{
                if(esto.split(":")[0] === "Bearer"){
                    cargarPantallaPrincipal();
                }
            });
        }
    }

    function cargarPantallaPrincipal(){
        ocultar();
        mostrarCabecera();
        cuerpo.innerHTML+=principalPag.innerHTML;
        const lista = document.getElementById("listaCategorias");

        fetch("http://localhost/php/practica14/api/categorias",{method:"GET"})
            .then(response => {
                if(!response.ok){
                    console.error("Error Cargar Categorias");
                }else{
                    return response.json();
                }
            })
            .then(esto =>{
                esto.forEach(cosa => {
                    const elemento = document.createElement("li");
                    elemento.innerText = cosa.descripcion;
                    elemento.onclick = ()=>{ mostrarProducto(cosa.codCat)};
                    lista.appendChild(elemento);
                });
            });
    }

    function mostrarCabecera(){
        let cabecera = document.createElement("div");
        let categoria =document.createElement("a");
        let carrito =document.createElement("a");
        let sesion =document.createElement("a");

        cabecera.id= "cabecera";
        
        categoria.innerText="Categorias ";
        carrito.innerText="Ver carrito ";
        sesion.innerText="Cerrar Sesion";

        categoria.onclick = mostrarCategoria;
        carrito.onclick = mostrarCarrito;
        sesion.onclick = mostrarSesion;

        cabecera.appendChild(categoria);
        cabecera.appendChild(carrito);
        cabecera.appendChild(sesion);
        cuerpo.innerHTML=cabecera.innerHTML;
    }

    function ocultar(){
        cuerpo.innerHTML="";
    }
}
