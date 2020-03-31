<?php
    session_start();
    include("db.php"); 
    $id=$_SESSION['id'];
    $query="select * from noticias where id_autor='$id' ORDER by id DESC";
    $link=mysqli_query($conectar,$query);  
    $count=0;    
    while ($reg= mysqli_fetch_array($link))
    {        
        $fechaComoEntero = strtotime($reg['fecha']);
        $fechap=date("d/m/Y",$fechaComoEntero);
        echo("<div class=\"col s4\">");            
            echo("<div class=\"card large z-depth-3\" >");                
                echo("<div class=\"card-image\">");
                    echo("<img src=\"../img/".$reg['id_autor'].date("Y-m-d-H-i-s",$fechaComoEntero).".png\">");
                echo("</div>");
                
                echo("<div class=\"card-content\">");
                    
                    if(date("d/m/Y")==$fechap){
                        $fechap="Hoy mismo";
                    }
                    echo("<span class=\"card-title\">".$reg['titulo']."</span>"); 
                    echo("<span class=\"blue-text\">By user ".$reg['autor']."<p>publicado: ".$fechap."</p></span>");
                    echo("<p>".$reg['descripcion']."</p>");
                echo("</div>");

                echo("<div class=\"card-action center\">");                                 
                    echo("<a href=\"blog.php?id=".$reg['id']."\">Leer mas..</a>");
                    echo("</div>");
            echo("</div>");
        echo("</div>");      
        $count=$count+1;
    }
    
    if($count==0){
        echo("<h1 id=\"defaultnotice\" class=\"center blue-text\">Lo siento no has publicado contenido</h1>");
    }
?>