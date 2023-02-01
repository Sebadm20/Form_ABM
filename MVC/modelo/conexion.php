<?php

$con = pg_connect("host=localhost port=5432 dbname=prueba01 user=postgres password=walter");

if($con){
    //echo"Se conecto correctamente";
}else{
    echo"Error al conectar";
}



?>