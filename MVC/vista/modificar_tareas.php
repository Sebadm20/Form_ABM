<?php
include ("../modelo/conexion.php");
$id=$_GET["id"];

$query="SELECT * FROM tareas WHERE id_tarea = $id";
$resultado_query = pg_query($con, $query);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/45893607c4.js" crossorigin="anonymous"></script>
</head>
<body>

<form class="col-4 m-auto"method="POST">
    <h3 class="text-center p-4 bg-warning">Modificacion de Tareas</h3>
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <?php
    include ("../controlador/modificar_tarea.php");

    while($filas_tareas= pg_fetch_array($resultado_query)){ ?>
  <div class="mb-3">
    <label class="form-label">Nombre de tarea</label>
    <input type="text" class="form-control" name="nombre_tarea" value="<?= $filas_tareas["nombre_tarea"] ?>" >
  </div>

  <div class="mb-3">
    <label class="form-label">Descripción de tarea</label>
    <input type="text" class="form-control" name="desc_tarea" value="<?= $filas_tareas["descripcion"] ?>" >
  </div>

  <div class="mb-3">
    <label class="form-label">Tipo de tarea</label>
    <select type="text" required="" class="form-control " id="tipo_tarea" name="tipo_tarea" value="<?= $filas_tareas["c_tipo"] ?>" onchange="verEmpresa()">
    <option value="1">Gestion Interna</option>
    <option value="2">Gestion Externa</option>
    </select>
  </div>

  <span id="empresa_externa" hidden>
  <div class="mb-3">
    <label class="form-label">Empresa</label>
    <input type="text" class="form-control" name="empresa" id="empresa"value="<?= $filas_tareas["empresa"] ?>">
  </div>
</span>

  <div class="mb-3">
    <label class="form-label">Persona</label>
    <input type="text" class="form-control" name="persona"value="<?= $filas_tareas["persona"] ?>" >
  </div>

  <div class="mb-3">
    <label class="form-label">Prioridad</label>
    <input type="text" class="form-control" name="prioridad" value="<?= $filas_tareas["prioridad"] ?>">
  </div>

  <div class="mb-3">
    <label class="form-label">Fecha de modificacion</label>
    <input type="date" maxlength="24" class="form-control" id="fechamodif" name="fechamodif" value="<?= $filas_tareas["fecha_modif"] ?>">
  </div>

  <div class="mb-3">
    <label class="form-label">Fecha de creacion</label>
    <input type="date" maxlength="24" class="form-control" id="fecha" name="fecha" value="<?= $filas_tareas["fecha_creacion"] ?>">
  </div>

<?php }
?>

  <button type="submit" class="btn btn-primary" name="btn_modificar" value="ok">Modificar</button>
</form>


<script>

function verEmpresa(){
    
    var tipo_empresa = document.getElementById('tipo_tarea').value;
    if (tipo_empresa ==1) //habilita campos empresa
    {
        document.getElementById('empresa_externa').hidden=true;
            }
    else { 
        document.getElementById('empresa_externa').hidden=false;
    }

}



</script>

</body>
</html>