<div class="container">

    <form class="form-signin">
        <h2 class="form-signin-heading">Creación de nueva cuenta.</h2>
        <label for="inputEmail" class="sr-only">Dirección de email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        </br>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
        </br>
        <label for="inputName" class="sr-only">Nombre</label>
        <input type="text" id="inputName" class="form-control" placeholder="Name" required="">
        </br>
        <label for="inputLastName" class="sr-only">Apellidos</label>
        <input type="text" id="inputLastname" class="form-control" placeholder="Last Name" required="">
        </br>
        <label for="inputBornDate" class="sr-only">Fecha de Nacimiento</label>
        <div class="input-append date form_datetime">
            <input size="16" type="text" value="" readonly>
            <span class="add-on"><i class="icon-th"></i></span>
        </div>

        <script type="text/javascript">
            $(".form_datetime").datetimepicker({
                format: "dd MM yyyy - hh:ii"
            });
        </script>
        </br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Crear cuenta</button>
    </form>

</div>