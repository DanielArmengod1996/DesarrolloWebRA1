<div class="container">

    <form action="createComentario.php" method="post">
        <input name="idVideo" type="hidden" id="inputNombre" value="<?php echo $_SESSION["video"] ?>" autofocus="">
        <label for="titulo" class="sr-only">titulo</label>
        <input name="titulo" type="text" id="titulo" class="form-control" placeholder="Nombre" required="" autofocus="">
        </br>
        <label for="comment" class="sr-only">Comment:</label>
        <textarea name="contenido" class="form-control" rows="5" id="comment"></textarea>
        </br>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Comentar video</button>

    </form>

</div>