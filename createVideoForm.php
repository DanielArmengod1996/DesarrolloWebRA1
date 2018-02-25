<div class="container">

    <form enctype="multipart/form-data" action="createVideo.php" method="post">
        <input name="idCanal" type="hidden" id="inputNombre" value="<?php echo $_SESSION["canal"] ?>" autofocus="">
        <label for="titulo" class="sr-only">titulo</label>
        <input name="titulo" type="text" id="titulo" class="form-control" placeholder="Nombre" required="" autofocus="">
        </br>
        <label for="contenido" class="sr-only">contenido</label>
        <input name="contenido" type="text" id="contenido" class="form-control" placeholder="Imagen" required="">
        </br>
        Imagen: <input name="uploaded" type="file" class="form-control" />
        </br>
        <label for="rutaVideo" class="sr-only">Descripcion</label>
        <input name="rutaVideo" type="text" id="rutaVideo" class="form-control" placeholder="Descripcion" required="">
        </br>
        <label for="etiquetas" class="sr-only">etiquetas</label>
        <input name="etiquetas" type="text" id="etiquetas" class="form-control" placeholder="Categoria" required="">
        </br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Crear video</button>
    </form>

</div>