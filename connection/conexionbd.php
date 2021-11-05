<?php
    //Paso 1. Conexion BD
    $cnx = @mysqli_connect('localhost','root','','bdferreteria');

    if (!$cnx) {
        die(msj("[ERROR EN CONEXIÓN]", "Revisar los valores del parametro de conexión"));
    }

    function msj($titulo, $descripcion){
        echo("

            <div style='background:orange; width:300px; margin: 0 auto;
            height:250px;text-align: center; '>

                <p> <h2> $titulo </h2> </p>

                <p> <img src='img/icons/Alert.ico' > </p>

                <p> <h4> $descripcion </h4> </p>
            </div>
        
        ");
    }
?>