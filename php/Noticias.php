<?php
    include("../php/db.php");    
    $query="select * from noticias ORDER by id DESC";
    $link=mysqli_query($conectar,$query);  
    $count=0;
    $id=$_SESSION['id'];
    while ($reg= mysqli_fetch_array($link))
    {        
        $fechaComoEntero = strtotime($reg['fecha']);
        $fechap=date("d/m/Y",$fechaComoEntero);
        echo("<div class=\"col s4\">");            
            echo("<div class=\"card large z-depth-2 hoverable\" >");                
                echo("<div class=\"card-image\">");
                    echo("<img src=\"../img/".$reg['id_autor'].date("Y-m-d-H-i-s",$fechaComoEntero).".png\">");                                                   
                echo("</div>");
                
                echo("<div class=\"card-content\">");
                    
                    if(date("d/m/Y")==$fechap){
                        $fechap="Hoy mismo";
                    }
                    echo("<span class=\"card-title\">".$reg['titulo']."</span>"); 

                    $user=null;
                    if($id==$reg['id_autor']){
                        $user="Tús publicaciones";
                    }
                    else{
                        $user="By ".$reg['autor'];
                    }
                    echo("<span class=\"blue-text\">".$user."<p>publicado: ".$fechap."</p></span>");
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
        echo("<h1 id=\"defaultnotice\" class=\"center blue-text\">No hay noticias que mostrar</h1>");
    }

?>