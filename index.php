<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<body>

    <section class="main">

        <figure class="main__figure">
            <img src="img/logo.png" class="main__img">
        </figure>

        <div class="main__contact">

            <h2 class="main__title">Crear Cuenta</h2>
            <p class="main__paragraph">Ingrese su cuenta para continuar</p>
            <?php
            if(isset($_GET['error'])){?>
            <p class="error"><?php echo $_GET['error']?></p>
            <?php } ?>
            <form class="main__form" action="controller/agregar_cuenta.php" method="POST">

                <input type="text" placeholder="Nombre de Usuario" class="main__input" name="uname">

                <input type="text" placeholder="Correo" class="main__input" name="email">

                <input type="password" placeholder="Contraseña" class="main__input" name="password">

                <input type="submit" value="Registrarse" class="main__input main__input--send">

            </form>

            <a href="views/login_page.php" style="text-decoration: none;" class="main__paragraph">Si tienes cuenta inicia sesion</a>



        </div>

    </section>



</body>

</html>