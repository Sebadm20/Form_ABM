<?php
if(!empty($_GET["id"])){
    $id=$_GET["id"];
    
    $query_eliminar = "DELETE FROM tareas WHERE id_tarea = $id";
    $delete1 = pg_query($con, $query_eliminar);
    $result = pg_affected_rows($delete1);

    if($result ==1){
        echo '<div class="alert alert-success">Se elimino la tarea correctamente</div>';
    }else{
        echo '<div class="alert alert-danger">Error al eliminar una tarea</div>';
    }
}

?>