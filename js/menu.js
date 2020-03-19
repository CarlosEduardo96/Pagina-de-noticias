$( document ).ready(function(){
    //Dropdown
    $('.dropdown-trigger').dropdown();
    //Fload bottums
    $('.tooltipped').tooltip();
    //Modales
    $('.modal').modal();
    //__Buscar noticia____________
    $("#buscarbtn").click(function(){
       console.log("Has dado click");
       $("#buscar").show("slow");
    });
    $("#cerrarb").click(function(){
      console.log("Has dado click");
      $("#buscar").hide("slow");
    });
    //Cerrar Session______________________-
    $("#singout").click(function(){
      $.get("session.php",function(dato,status,xhr){
        console.log("Sesion cerrada: "+dato+"\nStatus: "+status+" "+xhr.status);        
        if(dato=="true"){
          alert("¡Asta luego! :)")
          window.location.href = "/materialize/index.php";
        }
        else{
          alert("No se pudo cerrar la sesion intente de nuevo");
          console.log("No se pudo cerrar la sesion intente de nuevo");
        }
      }).done(function(){
        console.log("Ejecucion Exitosa");
      }).fail(function(){
        console.log("Error al ejecutar la peticion");
      }).always(function(){
        console.log("Peticion finalizada");
      });
    });
    //Agregar Notas_________________________________
    $("#formularioNota").bind("submit",function(){

      var frmData=new FormData;
      frmData.append("imagen",$("input[name=imagen]")[0].files[0]);    
      frmData.append("titulo",$("#tituloNota").val());
      frmData.append("descripcion",$("#descripcionNota").val());
      frmData.append("cuerpo",$("#cuerpoNota").val());
        $.ajax({
          url: "insertNotas.php",
          type: "POST",
          data: frmData,
          processData: false,
          contentType: false,
          cache: false,
          beforeSend: function(){
            M.toast({html: '¡Publicando Noticia...!'})
          },
          success: function(respuesta){
            var respuesta= JSON.parse(respuesta);           

            if(respuesta.resultado){
              M.toast({ html: respuesta.msn })
              console.log(respuesta.msn);
              var contenido=$("#Bloques").html();
              var cards="<div class=\"col s3\"><div class=\"card large z-depth-3\"><div class=\"card-image\"><img src=\""+respuesta.link+"\"></div><div class=\"card-content\"><span class=\"card-title\">"+$("#tituloNota").val()+"</span><span class=\"blue-text\">Tu publicacion<p>publicado: Hoy mismo</p></span><p>"+$("#descripcionNota").val()+"</p></div><div class=\"card-action center\"><a href=\"blog.php?id="+respuesta.folio+"\">Leer mas..</a></div></div></div>";
              $("#Bloques").html(cards+contenido);
              $("##formularioNota")[0].reset();
            }
            else{
              M.toast({ html: respuesta.msn })
              console.log(respuesta.msn);
            }
          },
          error: function(){
            M.toast({html: '¡Error al enviar los datos al servidor!'});
          }
        });
        //M.toast({html: 'Hoola Amigo!'})
        return false;
    });
    //______________________________________________
  });
