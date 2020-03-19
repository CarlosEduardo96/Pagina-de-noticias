<?php
    session_start();
    include("db.php");
    if(@!(isset($_GET['id'])) || @!$_SESSION['id']){
        header("Location:menu.php");
    }
    else {
        $id=$_GET['id'];

        if($id!="" || $id!=null){
            $comando="select * from noticias where id='$id';";
            $link=mysqli_query($conectar,$comando);
            if($resul=mysqli_fetch_assoc($link)){

                $fechaComoEntero = strtotime($resul['fecha']);
                $fecha=date("d/m/Y H:i:s a",$fechaComoEntero);
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
                    'noticia'=>$resul['noticia']
                );            
            }
            else{
                header("Location:menu.php");
            }  
                    


        }
        else{
            header("Location:menu.php");
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
                    <li><a href="#"><i class="material-icons">refresh</i></a></li>
                    <li><a href="menu.php">Noticias<i class="material-icons right">view_module</i></a></li>
                    
                    <li><a class="dropdown-trigger" href="#!" data-target="id_drop">Opciones Avanzadas<i class="material-icons right">settingsx</i></a></li>
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
    
   
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo($contenido['imagen']); ?>">                    
                    </div>
                    <div class="card-content">
                        <h1 class="card-title center"><?php echo($contenido['titulo']);?></h1>
                        <blockquote  class="flow-text">
                            <?php
                                echo($contenido['noticia']);
                            ?>
                        </blockquote>
                        <div class="center">
                            <span class="blue-text">Publicado Por: <?php echo($contenido['autor']);?></span>
                            <span class="red-text"><?php echo($contenido['fecha']);?></span>
                        </div>                  
                    
                    </div>
                    <div class="card-action">                        
                        <form id="publicar">
                            <div class="row">  
                                <div class="col s12">
                                    <div class="input-field">                                
                                        <i class="material-icons prefix">mode_edit</i>
                                        <textarea id="txtxomentario" class="materialize-textarea"></textarea>
                                        <label for="txtxomentario">Deja Tu Comentario ...</label>
                                    </div>                                                              
                                </div>                         
                                <div class="col col s10">
                                    <div class="input-field"> 
                                        <button class="btn waves-effect waves-light" type="submit" id="iniciar">Enviar
                                            <i class="material-icons right">send</i>
                                        </button>                                         
                                    </div>        
                                </div>                                                          
                            </div>
                        </form> 

                        
                    </div>

                    <div class="card-action">
                        <div class="row">
                            <div class="col s12">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="center">Comentarios:</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody id="lista">
                                        <?php
                                            $comando="select * from comentarios where id_pu='".$contenido['id']."';";
                                            $link=mysqli_query($conectar,$comando);
                                            $count=0;
                                            while ($reg= mysqli_fetch_array($link)){
                                                $count=$count+1;
                                            }                
                                            if($count==0){
                                                echo("<tr><td class=\"center grey-text\">No hay comentarios...</td></tr>");
                                            }                            
                                        ?>                                             
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>    

                </div>

            </div>

        </div>

    </div>
            
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/blog.js"></script>    
</body>
</html>