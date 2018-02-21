<div class="container">

    <form action="createChannel.php" method="post">
        <h2 class="form-signin-heading">Creación de un canal </h2>
        <label for="inputNombre" class="sr-only">Nombre</label>
        <input name="nombre" type="text" id="inputNombre" class="form-control" placeholder="Nombre" required="" autofocus="">
        </br>
        <label for="inputImagen" class="sr-only">imagen</label>
        <input name="imagen" type="text" id="inputImagen" class="form-control" placeholder="Imagen" required="">
        </br>
        <label for="inputDescripcion" class="sr-only">descripción</label>
        <input name="descripcion" type="text" id="inputDescripcion" class="form-control" placeholder="Descripcion" required="">
        </br>
        <label for="inputCategoria" class="sr-only">Nombre</label>
        <input name="categoria" type="text" id="inputCategoria" class="form-control" placeholder="Categoria" required="">
        </br>
        <label for="inputCanalesRecomendados" class="sr-only">Canales Recomendados</label>
        <input name="canales" type="text" id="inputCanalesRecomendados" class="form-control" placeholder="Canales Recomendados" required="">
        </br>
        <label for="inputMayorEdad" class="sr-only">¿Mayor de edad?</label>
        ¿ Mayor de edad ?<input name="mayorEdad" type="checkbox" id="inputMayorEdad" class="form-control" placeholder="¿Mayor de edad?" required="">
        </br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Crear canal</button>
    </form>

</div>