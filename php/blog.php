<?php
    session_start();
    include("db.php");
    if(@!$_SESSION['id'] || @!isset($_GET['id'])){
        header("Location: menu.php");
    }
    else {
        $id=$_GET['id'];

        if($id!="" || $id!=null){
            $comando="select * from noticias where id='$id';";
            $link=mysqli_query($conectar,$comando);
            if($resul=mysqli_fetch_assoc($link)){

                $fechaComoEntero = strtotime($resul['fecha']);
                $fecha=date("d/m/Y h:i:s a",$fechaComoEntero);
                $imagen=$resul['id_autor'].date("Y-m-d-H-i-s",$fechaComoEntero);
                if(date("d/m/Y H:i:s a")==$fecha){
                    $fecha="Hoy mismo";
                }
                
                $contenido=array(
                    'id'=>$resul['id'],
                    'imagen'=>"../img/".$imagen.".png",
                    'titulo'=>$resul['titulo'],                    
                    'fecha'=>$fecha, 
                    'autor'=>$resul['autor'],
                    'descripcion'=>$resul['descripcion'],
                    'noticia'=>$resul['noticia'],
                    'id_autor'=>$resul['id_autor']
                );            
            }      
            else{
                header("Location:blog.php?id=");
            }                

        }     
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG </title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/materialize.min.css">
</head>
<body class="grey"> 
    <div class="navbar-fixed">
        <nav class="red">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo"><i class="material-icons">public</i>Noticias</a>                
                <ul class="right hide-on-med-and-down row">                
                    <li><a><?php $name=$_SESSION['user']." ".$_SESSION['ape']; echo(strtoupper($name));?></a></li>
                    <li><a id="refrescar"><i class="material-icons">refresh</i></a></li>
                    <li><a href="menu.php">Noticias<i class="material-icons right">view_module</i></a></li>
                    
                    <li><a class="dropdown-trigger" href="#!" data-target="id_drop">Opciones Avanzadas<i class="material-icons right">settingsx</i></a></li>
                    <li><a href="acercade.php">Acerca de..<i class="material-icons right">info</i></a></li>
                    <li><a href="#" id="singout">Sing Out<i class="material-icons right">input</i></a></li>
                </ul>
               
            </div> 
        </nav>
        
    </div>
    <ul id="id_drop" class="dropdown-content">         
        <li><a href="#">Configuracion</a></li>
        <?php
            if( $_SESSION['roll']=="ADMIN"){
                echo("<li><a href=\"#\">Panel de administracion</a></li>");
            }
            
        ?>
    </ul>
<!--Contenido de las noticias-->
    <div>
        <?php
            if($id!="" || $id!=null){
                include("blogcontent.php");
            }
            else{ 
                echo("<h1 class=\"white-text center\">¡Ooops...! no se encontro la noticia</h1>");
            }
        ?>  
    </div>

    <?php
        if($id!="" || $id!=null){
            if($contenido['id_autor']==$_SESSION['id']){
                include("editaryeliminar.php"); 
                echo("<div>");
                include("formNoticias.php");
                echo("</div>");
            }
        }
    ?>   



<?php include("piepage.php"); ?>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/blog.js"></script>    
</body>
</html>