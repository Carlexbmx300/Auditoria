<div class="form-proyectos">
    <form action="components/ProcesoCrearProyecto.php" method="post" enctype="multipart/form-data">
        <div class="input">
            <!-- Material input -->
            <div class="md-form">
            <input type="text" id="form1" class="form-control" name="nombre" required>
            <label for="form1">Nombre del proyecto</label>
            </div>
            <div class="md-form">
            <input type="number" id="campo" class="form-control" name="numero" min="1" max="9" required>
            <label for="campo">Numero de integrantes</label>
           <div id="reflejar"></div>
            </div>
            <div class="input-file float-left ml-n3">
                    <input type="file" ref="file" name="imagen" id="file">
                    <p  id="texto" for="file">Subir logo</p>
            </div>      

            <div class="preview" id="preview">
            
            </div>

            <button type="submit" class="btn btn-success">enviar</button>
        </div>
    </form>

    <button><a href="components/Documento.php">vista previa de documento</a></button>

</div>