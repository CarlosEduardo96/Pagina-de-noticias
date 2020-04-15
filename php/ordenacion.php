<?php
   
    if(validar()){
        $fecha=$_POST['fecha'];       
       
        switch ($fecha) {
            case "dia":
                date_default_timezone_set("America/Mexico_City");
                $fecha=date("Y-m-d");     
                $consulta="SELECT * FROM noticias WHERE fecha >='$fecha' ORDER by id DESC;";     
                $datos=ordenar($consulta);                
                echo($datos);
                break;           
            case "semana":
                date_default_timezone_set("America/Mexico_City");
                $fecha_actual = date("Y-m-d");
                $fecha=date("Y-m-d",strtotime($fecha_actual."+1 week"));
                
                break;  
            case "mes":                
                date_default_timezone_set("America/Mexico_City");
                $fecha_actual = date("Y-m");
                $fecha=date("Y-m",strtotime($fecha_actual."+1 month"));

                $fecha_actual=$fecha_actual."-01";
                $fecha=$fecha."-01";  

                $consulta="SELECT * FROM noticias WHERE fecha >='$fecha_actual' ORDER by id DESC;";
                
                $datos=ordenar($consulta);              
                echo($datos);
                break;
            case "año":              
                date_default_timezone_set("America/Mexico_City");
                $fecha_actual = date("Y");
                $fecha=date("Y",strtotime($fecha_actual."+ 1 year"));

                $fecha_actual=$fecha_actual."-01-01";
                $fecha=$fecha."-01-01";

                $consulta="SELECT * FROM noticias WHERE fecha >='$fecha_actual' and fecha <='$fecha' ORDER by id DESC;";
                
                $datos=ordenar($consulta);              
                echo($datos);
                break;
            case "masaño":
                date_default_timezone_set("America/Mexico_City");
                $fecha_actual = date("Y")."-01-01";                
                $consulta="SELECT * FROM noticias WHERE fecha <='$fecha_actual' ORDER by id DESC;";
                $datos=ordenar($consulta);              
                echo($datos);
                break;
            case "todas":
                $consulta="SELECT * FROM noticias ORDER by id DESC;";     
                $datos=ordenar($consulta);    
                echo($datos);
                break;
            default:
                $array=array(
                    "request"=> false,
                    "msn"=>"¡Opcion no disponible en el menu!"
                );
                echo(json_encode($array));
                break;
        }
    }
    else{

    }

    // Validaciones y ordenamiento_______________

    function validar(){
        $ok=true;
        if(isset($_POST['fecha'])){
            $ok=true;
        }
        else{
            $ok=false;
        }
        return $ok;
    }

    function ordenar($query){
        include("db.php");    
        session_start();
        $html="";
        $link=mysqli_query($conectar,$query);  
        $count=0;
        $array=null;
        $id=$_SESSION['id']; 
        while($reg= mysqli_fetch_array($link)){
            $fechaComoEntero = strtotime($reg['fecha']);
            $imagen="../img/".$reg['id_autor'].date("Y-m-d-H-i-s",$fechaComoEntero).".png";
            $fecha=date("d/m/Y",$fechaComoEntero);
            $user=null;
            if($id==$reg['id_autor']){
                $user="Tus publicaciones";
            }
            else{ 
                $user="By ".$reg['autor'];
            }

            $html=$html."<div class=\"col s4\"><div class=\"card large z-depth-3\"><div class=\"card-image\"><img src=\"".$imagen."\"></div><div class=\"card-content\"><span class=\"card-title\">".$reg['titulo']."</span><span class=\"blue-text\">$user<p>publicado: ".$fecha."</p></span><p>".$reg['descripcion']."</p></div><div class=\"card-action center\"><a href=\"blog.php?id=".$reg['id']."\">Leer mas..</a></div></div></div>";
            $count=$count+1;
        }
        if($count>0){
            $array=array(
                "request" => true,
                "msn" => "¡Noticias en contradas con exito!",
                "html"=>$html            
            );
        }        
        else{
            $array=array(
                "request" => false,
                "msn" => "No se encontraron resultados"
            );
        }
        return json_encode($array);
    }


?>