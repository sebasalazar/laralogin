<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Prueba, Laravel, UTEM, Ingeniería, Software">
        <meta name="author" content="Sebastián Salazar Molina">
        <!--<link rel="icon" href="../../favicon.ico">-->

        <title>Ejemplo Laravel</title>

        <!-- Bootstrap core CSS -->
        <?php echo HTML::style('bootstrap/css/bootstrap.min.css'); ?>

        <!-- Custom styles for this template -->
        <?php echo HTML::style('css/navbar.css'); ?>

        <?php echo HTML::script('js/jquery-1.11.1.min.js'); ?>

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><?php echo HTML::script('js/ie8-responsive-file-warning.js'); ?><![endif]-->
        <?php echo HTML::script('js/ie-emulation-modes-warning.js'); ?>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">

            <!-- Static navbar -->
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#" target="_blank">Ejemplo Laravel</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li <?php if (Request::is('codigo')) { echo 'class="active"'; } ?>><a href="https://github.com/sebasalazar/laralogin" target="_blank">Código</a></li>
                            <?php 
                            if(Auth::check()) {
                                ?>
                                <li <?php if (Request::is('home')) { echo 'class="active"'; } ?>><a href="home">Home</a></li>
                                <li <?php if (Request::is('logout')) { echo 'class="active"'; } ?>><a href="logout">Cerrar Sesión</a></li>
                            <?php
                            } else {
                                ?>
                                <li <?php if (Request::is('login')) { echo 'class="active"'; } ?>><a href="login">Login</a></li>
                                <?php
                            }
                            ?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="#">Sebastián Salazar Molina.</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>

            <!-- Main component for a primary marketing message or call to action -->
            <div class="jumbotron">
                <div>
                    @yield('contenido')
                </div>
            </div>

        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
        <?php echo HTML::script('bootstrap/js/bootstrap.min.js'); ?>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <?php echo HTML::script('js/ie10-viewport-bug-workaround.js'); ?>
    </body>
</html>
