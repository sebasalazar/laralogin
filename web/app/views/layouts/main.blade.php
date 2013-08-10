<?php ?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Prueba de Laravel :: Sebastián Salazar Molina.</title>

        <style>
            @import url(//fonts.googleapis.com/css?family=Lato:300,400,700);

            body {
                margin:0;
                font-family:'Lato', sans-serif;
                text-align:center;
                color: #999;
            }

            .welcome {
                width: 300px;
                height: 300px;
                position: absolute;
                left: 50%;
                top: 50%; 
                margin-left: -150px;
                margin-top: -150px;
            }

            a, a:visited {
                color:#FF5949;
                text-decoration:none;
            }

            a:hover {
                text-decoration:underline;
            }

            ul li {
                display:inline;
                margin:0 1.2em;
            }

            p {
                margin:2em 0;
                color:#555;
            }
            
            table {
                border: 1px solid #e3e3e3;
                background-color: #f2f2f2;
                width: 100%;
                border-radius: 6px;
                -webkit-border-radius: 6px;
                -moz-border-radius: 6px;
            }

            table td, table th {
                padding: 5px;
                color: #333;
            }
            
            table thead {
                font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
                padding: .2em 0 .2em .5em;
                text-align: left;
                color: #4B4B4B;
                background-color: #C8C8C8;
                background-image: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#e3e3e3), color-stop(.6,#B3B3B3));
                background-image: -moz-linear-gradient(top, #D6D6D6, #B0B0B0, #B3B3B3 90%);
                border-bottom: solid 1px #999;
            }

            table th {
                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                font-size: 17px;
                line-height: 20px;
                font-style: normal;
                font-weight: normal;
                text-align: left;
                text-shadow: white 1px 1px 1px;
            }

            table td {
                line-height: 20px;
                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                font-size: 14px;
                border-bottom: 1px solid #fff;
                border-top: 1px solid #fff;
            }
            
            table td:hover {
                background-color: #fff;
            }
        </style>

        <?php echo HTML::script('js/jquery-1.10.2.min.js'); ?>
        <?php echo HTML::script('js/jquery.Rut.min.js'); ?>
    </head>
    <body>
        <div class="welcome">
        </div>
        <div>
            @yield('contenido')
        </div>
    </body>
</html>

<?php
?>
