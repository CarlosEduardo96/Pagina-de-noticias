<?php    
    include("../php/db.php");
    $datos=null;
    if(isset($_POST['id'])){
        $id=$_POST['id'];
        if($id!="" || $id!=null){
        $consulta="delete from comentarios where id_pu='$id'";
        $link=mysqli_query($conectar,$consulta);
        if($link){
            $consulta="delete from noticias where id='$id'";
            $link=mysqli_query($conectar,$consulta);
            if($link){
                $datos=array("request"=>true,"msn"=>"¡Noticia borrada con exito!");
                echo json_encode($datos);
            }
            else{
                $datos=array("request"=>false,"msn"=>"Error: No se pudo borrar la noticia vuelva a intentarlo");
                echo json_encode($datos);
            }
        }
        else{
            $datos=array("request"=>false,"msn"=>"Error: No se pudieron borrar los datos vuelva a intentarlo");
            echo json_encode($datos);
        }
            
        }
        else{
            $datos=array("request"=>false,"msn"=>"Error: El folio de la noticia es nulo");
            echo json_encode($datos);

        }        
    }
    else{
        $datos=array("request"=>false,"msn"=>"Error: error al enviar los datos");
        echo json_encode($datos);
    }
?>