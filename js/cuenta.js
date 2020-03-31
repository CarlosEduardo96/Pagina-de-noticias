
$(document).ready(function(){
    $("#cancelar").click(function(){
        window.location.href = "/materialize/index.php";
    });

    $("#registrar").click(function(event){
        event.preventDefault();
        var nombre= $("#nombre").val();
        var apellido= $("#apellido").val();
        var correo= $("#correo").val();
        var pwd= $("#pwd").val();
        var cpwd= $("#cpwd").val();
        console.log("Registrado");       
        $.post("newuser.php",{            
            nombre: nombre,
            apellido: apellido,
            correo: correo,
            pwd: pwd,
            cpwd: cpwd
        },function(respuesta){
            if(respuesta=="true"){
                alert("¡Felicidades fuistes aceptado!");
                window.location.href = "/materialize/index.php";
            }
            else{
                $("#mensaje").show("slow");
                $("#texto").text(respuesta);
            }
            
        }).done(function(){
            console.log("Ejecucion exitosa");
        }).fail(function(){
            console.log("Error al enviar los datos al servidor");
        }).always(function(){
            console.log("Ejecucion finalizada");
        }); 
    });
});