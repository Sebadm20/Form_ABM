<?php

if(!empty($_POST["btn_modificar"])){
    if(!empty($_POST["nombre_tarea"]) and 
    !empty($_POST["desc_tarea"]) and 
    !empty($_POST["tipo_tarea"]) and 
    !empty($_POST["persona"]) and 
    !empty($_POST["prioridad"]) and 
    !empty($_POST["fechamodif"]) and 
    !empty($_POST["fecha"])){
        
        $id=$_POST['id'];

        $nombre_tarea=$_POST['nombre_tarea'];
        $desc_tarea=$_POST['desc_tarea'];
        $tipo_tarea=1;
        $persona=$_POST['persona'];
        $prioridad=$_POST["prioridad"];
        $fechamodif=$_POST['fechamodif'];
        $fecha=$_POST['fecha'];
        $empresa =$_POST['empresa'];

        $update_tareas = "UPDATE tareas SET nombre_tarea='$nombre_tarea', descripcion='$desc_tarea',
         c_tipo=$tipo_tarea, fecha_modif='$fechamodif', fecha_creacion='$fecha', persona='$persona',
        empresa='$empresa', prioridad=$prioridad
        WHERE id_tarea = $id";

           $resultado_update = pg_query($con, $update_tareas);
           $result2 = pg_affected_rows($resultado_update);

           if($result2 ==1){

            header("location:formulario.php");
        }else{
            echo '<div class="alert alert-danger">Error al modificar la tarea</div>';
        }

    }else{
        echo '<div class="alert alert-warning">HAY CAMPOS VACIOS, COMPLETE TODOS LOS CAMPOS</div>';
    }
}

?>