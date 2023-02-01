<?php

if(!empty($_POST["btn_registrar"])){
    if(!empty($_POST["nombre_tarea"]) and 
    !empty($_POST["desc_tarea"]) and 
    !empty($_POST["tipo_tarea"]) and 
    !empty($_POST["persona"]) and 
    !empty($_POST["prioridad"]) and 
    !empty($_POST["fechamodif"]) and 
    !empty($_POST["fecha"])){
        
        $nombre_tarea=$_POST['nombre_tarea'];
        $desc_tarea=$_POST['desc_tarea'];
        $tipo_tarea=['tipo_tarea'];
        $persona=$_POST['persona'];
        $prioridad=$_POST["prioridad"];
        $fechamodif=$_POST['fechamodif'];
        $fecha=$_POST['fecha'];
        $empresa =$_POST['empresa'];
        $tipo_tarea =1;

        $insert_tareas = "INSERT INTO tareas(
             nombre_tarea, descripcion, c_tipo, fecha_modif,
             fecha_creacion, persona, empresa)
            VALUES ( '$nombre_tarea', '$desc_tarea', $tipo_tarea, '$fechamodif', '$fecha', '$persona', '$empresa');";

            $resultado_insert = pg_query($con, $insert_tareas);
            $result1 = pg_affected_rows($resultado_insert);
            
            if($result1 ==1){
                echo '<div class="alert alert-success">Se registro la tarea correctamente</div>';
            }else{
                echo '<div class="alert alert-danger">Error al registrar una tarea</div>';
            }

    }else{
        echo '<div class="alert alert-warning">HAY CAMPOS VACIOS, COMPLETE TODOS LOS CAMPOS</div>';
    }
}


?>

