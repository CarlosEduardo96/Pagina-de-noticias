<div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-image">
                        <img id="bimagen" src="<?php echo($contenido['imagen']); ?>">                    
                    </div>
                    <div class="card-content row" id="cuerponoticia">
                        <div class="col s12">
                            <h1 id="btitulo" class="card-title center"><?php echo($contenido['titulo']);?></h1>
                            <p id="bdescripcion"class="flow-text grey-text"><?php echo str_replace("\n", "<br>", $contenido['descripcion']);?></p>
                        </div>
                        <div class="col s12">                        
                        <blockquote id="bnoticia" class="flow-text left"><?php echo str_replace("\n", "<br>", $contenido['noticia']);?></blockquote>
                        </div>                     

                        <div class="col s12 center">
                            <span class="blue-text">Publicado Por: <?php echo($contenido['autor']);?></span>
                            <span class="red-text"><?php echo($contenido['fecha']);?></span>
                        </div>                  
                    
                    </div>
                    <div class="card-action">                
                        <div class="row">                             
                            <div class="col s12">
                                <form id="publicar">
                                    <div class="input-field">                                
                                        <i class="material-icons prefix">mode_edit</i>
                                        <textarea id="txtxomentario" class="materialize-textarea"></textarea>
                                        <label for="txtxomentario">Deja Tu Comentario ...</label>
                                    </div>    
                                    <div class="input-field"> 
                                        <button class="btn waves-effect waves-light" type="submit" id="iniciar">Enviar
                                            <i class="material-icons right">send</i>
                                        </button>                                         
                                    </div>                                       
                                </form> 
                            </div>
                            
                        </div>
                    </div>

                    <div class="card-action">
                        <div class="row">
                            <div  id="lista" class="col s12">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="center">Comentarios:</th>   

                                        </tr>
                                    </thead>
                                    <tbody> 
                                        
                                        <?php
                                            $comando="select * from comentarios where id_pu='".$contenido['id']."';";
                                            $link=mysqli_query($conectar,$comando);
                                            $count=0;
                                            while ($reg= mysqli_fetch_array($link)){
                                                echo("<tr><td> <span class=\"blue-text\">".$reg['usuario']."</span> [ <span class=\"red-text center\">".$reg['fecha']."</span> ]<p class=\"grey-text\">".$reg['comentario']."</p> </td></tr>");
                                                $count=$count+1;
                                            }                
                                            if($count==0){
                                                echo("<tr id=\"predefinido\"><td class=\"center grey-text\">No hay comentarios...</td></tr>");
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