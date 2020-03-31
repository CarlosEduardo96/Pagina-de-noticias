<div id="modal1" class="modal modal-fixed-footer">
    
    <form id="formularioNota">  
        <div class="modal-content">
            <div class="row">
                
                <h2 class="center red-text">Nota informativa</h2>
                  
                <div class="input-field col s12">                    
                    <input id="tituloNota" type="text" class="validate">
                    <label for="tituloNota">Titulo</label>
                </div>
                <div class="input-field col s12">                 
                    
                    <textarea id="descripcionNota" class="materialize-textarea"></textarea>
                    <label for="descripcionNota">Descripcion</label>
                </div>
                <div class="input-field col s12">                    
                    <textarea id="cuerpoNota" class="materialize-textarea"></textarea>
                    <label for="cuerpoNota">Contenido de la noticia</label>
                </div>              
                   
                <div class="file-field input-field col s12">                
                    <div class="btn">
                        <span>File</span>
                        <input type="file" id="imagen" name="imagen" accept="image/png, .jpeg, .jpg, .png">
                    </div>

                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Subir Portada">
                    </div>
                </div>                  
               
            </div>
        </div>
        
        <div class="modal-footer">
            <button class="modal-close waves-effect waves-effect waves-light btn red" type="reset">Cancelar</button>            
            <button class="modal-close waves-effect waves-effect waves-light btn" type="submit">Guardar</button>
        </div>
    </form>
</div>