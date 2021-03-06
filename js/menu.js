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
      frmData.append("ellaT",$("#ellaT").val());
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
              $("#defaultnotice").hide();
              M.toast({ html: respuesta.msn })
              console.log(respuesta.msn);
              var contenido=$("#Bloques").html();
              var cards="<div class=\"col s4\"><div class=\"card large z-depth-3\"><div class=\"card-image\"><img src=\""+respuesta.link+"\"></div><div class=\"card-content\"><span class=\"card-title\">"+$("#tituloNota").val()+"</span><span class=\"blue-text\">Tu publicacion<p>publicado: Hoy mismo</p></span><p>"+$("#descripcionNota").val()+"</p></div><div class=\"card-action center\"><a href=\"blog.php?id="+respuesta.folio+"\">Leer mas..</a></div></div></div>";
              $("#Bloques").html(cards+contenido);
              $("#formularioNota")[0].reset();       
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

    // Mis noticias::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    $("#miscarpeta").click(function(){
        console.log("Mis noticias");
        $("#Bloques").load("Misnoticias.php");
        M.toast({html: '¡Tus Noticias Publicadas!'});
    });

  });

  function orden(id){
    var frmData=new FormData;
    frmData.append("fecha",id);
      $.ajax({
        url: "ordenacion.php",
        type: "POST",
        data: frmData,
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function(){
          M.toast({html: '¡Buscando noticias!'})
        },
        success: function(r){
          var respuesta= JSON.parse(r);           
          console.log(respuesta); 
          if(respuesta.request){
            M.toast({html: respuesta.msn })
            $("#Bloques").html(respuesta.html);
          }
          else{
            M.toast({ html: respuesta.msn });
          }     
        },
        error: function(){
           M.toast({html: 'Error al enviar los datos'});
        }

      });

      /*$("#info").click(function(){

      });*/
  }

  