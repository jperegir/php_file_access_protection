<?php

define('ACCESO_PERMITIDO', true);
include_once('../config/config.php');


echo <<<EOF
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

    <style>
        div{
            widht:80%;
            margin-top: 100px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        p {
            display: inline;
            padding: 10px;
            background: black; 
            color: white; 
            font-weight: bold;
        }

        span {

            color: red;
            font-weight: 400;
        }
    </style>
</head>
<body>


    <div>
        <h3>Acceso al fichero de configuración desde el script principal</h3>

        <h4>Dato obtenido del fichero de configuración:</h4>
            <p>Database1 => <span>{$config['db']['db1']['dbname']} </span></p>
    </div>
</body>


</html>


EOF;

?>


