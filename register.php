<div class="container">

    <form action="registerAction.php" method="post">
        <h2 class="form-signin-heading">Creación de nueva cuenta.</h2>
        <label for="inputEmail" class="sr-only">Dirección de email</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        </br>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input name="contrasena" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
        </br>
        <label for="inputName" class="sr-only">Nombre</label>
        <input name="nombre" type="text" id="inputName" class="form-control" placeholder="Name" required="">
        </br>
        <label for="inputNick" class="sr-only">Nombre</label>
        <input name="nick" type="text" id="inputNick" class="form-control" placeholder="Nick" required="">
        </br>
        <label for="inputLastName" class="sr-only">Apellidos</label>
        <input name="apellidos" type="text" id="inputLastname" class="form-control" placeholder="Apellidos" required="">
        </br>
        <label for="inputBornDate" class="sr-only">Apellidos</label>
        <input name="fechaNacimiento" type="date" id="inputBornDate" class="form-control" placeholder="Fecha Nacimiento" required="">
        </br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Crear cuenta</button>
    </form>

</div>