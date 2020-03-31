<?php
    include("db.php");    
    if(validar()){
        $fecha=strtoupper($_POST['fecha']);        
        switch ($fecha) {
            case "HOY":
                $fecha=date("Y/m/d");
                echo (ordenar("select * from fecha like '$fecha'"));
                break;
            case "MES":
                echo "i es igual a 1";
                break;
            case "AÑO":
                echo "i es igual a 2";
                break;
            case "MASAÑO":
                echo "i es igual a 2";
                break;
            default:
               echo "Fecha no en contrada";
        }
    }
    else{

    }

    // Validaciones y ordenamiento_______________

    function validar(){
        $ok=false;
        if(isset($_POST['fecha'])){
            $ok=true;
        }
    }

    function ordenar($squery){
        $html="";        
        $link=mysqli_query($conectar,$query);  
        $count=0;
        while ($reg= mysqli_fetch_array($link))
        {   
            $fechaComoEntero = strtotime($reg['fecha']);     
            $imagen="../img/".$reg['id_autor'].date("Y-m-d-H-i-s",$fechaComoEntero).".php";
            $fecha=date("d/m/Y",$fechaComoEntero);
            $html=$html."<div class=\"col s4\"><div class=\"card large z-depth-3\"><div class=\"card-image\"><img src=\"".$imagen."\"></div><div class=\"card-content\"><span class=\"card-title\">".$reg['titulo']."</span><span class=\"blue-text\">Tu publicacion<p>publicado: ".$fecha."</p></span><p>".$reg['descripcion']."</p></div><div class=\"card-action center\"><a href=\"blog.php?id=".$reg['id']."\">Leer mas..</a></div></div></div>";
        }
        if($count==0){ 
            $html=array(
                "request"=> false,
                "msn"=>"¡No hay publicaciones que mostrar!",
                "html"=> "<h1 id=\"defaultnotice\" class=\"center blue-text\">¡No hay publicaciones que mostrar!</h1>"
            );
        }

        return json_encode($html);
    }


?>