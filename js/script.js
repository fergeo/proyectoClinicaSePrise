console.log("script");

btnLogin = document.getElementById("login-button");
btnLogin.addEventListener("click",function(){

    console.log("ingreso")

    perfil = document.getElementById("perfil");

    if(perfil.value == "administrador"){
        window.open("http://localhost/proyectoCl%c3%adnica/administracion/main-adm.php", "_self");  

    }
});