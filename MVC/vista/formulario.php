<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/45893607c4.js" crossorigin="anonymous"></script>
</head>
<body>
    
<h1 class="text-center p-3">Formulario ABM</h1>
<?php
include ("../modelo/conexion.php");
include ("../controlador/eliminar_tarea.php");
?>
<div class="container-fluid row">
<form class="col-4"method="POST">
    <h3>Registro de Tareas</h3>
    <?php 
    
    include ("../controlador/registro_tareas.php");
    ?>
  <div class="mb-3">
    <label class="form-label">Nombre de tarea</label>
    <input type="text" class="form-control" name="nombre_tarea" >
  </div>

  <div class="mb-3">
    <label class="form-label">Descripción de tarea</label>
    <input type="text" class="form-control" name="desc_tarea" >
  </div>

  <div class="mb-3">
    <label class="form-label">Tipo de tarea</label>
    <select type="text" required="" class="form-control " id="tipo_tarea" name="tipo_tarea" value="" onchange="verEmpresa()">
    <option value="1">Gestion Interna</option>
    <option value="2">Gestion Externa</option>
    </select>
  </div>

  <span id="empresa_externa" hidden>
  <div class="mb-3">
    <label class="form-label">Empresa</label>
    <input type="text" class="form-control" name="empresa" id="empresa">
  </div>
</span>

  <div class="mb-3">
    <label class="form-label">Persona</label>
    <input type="text" class="form-control" name="persona" >
  </div>

  <div class="mb-3">
    <label class="form-label">Prioridad</label>
    <input type="text" class="form-control" name="prioridad" >
  </div>

  <div class="mb-3">
    <label class="form-label">Fecha de modificacion</label>
    <input type="date" maxlength="24" class="form-control" id="fechamodif" name="fechamodif">
  </div>

  <div class="mb-3">
    <label class="form-label">Fecha de creacion</label>
    <input type="date" maxlength="24" class="form-control" id="fecha" name="fecha" >
  </div>

  <button type="submit" class="btn btn-primary" name="btn_registrar" value="ok">Registrar</button>
</form>

<div class="col-8 p-4">
<table class="table">
  <thead class="bg-info">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre de Tarea</th>
      <th scope="col">Descripción</th>
      <th scope="col">Tipo</th>
      <th scope="col">Fecha de modificacion</th>
      <th scope="col">Fecha de creacion</th>
      <th scope="col">Persona</th>
      <th scope="col">Empresa</th>
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
    <?php 
    include ("../modelo/conexion.php");
    $query = "SELECT * FROM tareas 
                ORDER BY prioridad DESC, fecha_creacion DESC";
    $resultado_tareas = pg_query($con, $query);
    while($filas_tareas= pg_fetch_array($resultado_tareas)){ ?>
    
    
    <tr>
      <td class="text-center"><?= $filas_tareas["id_tarea"] ?></td>
      <td class="text-center"><?= $filas_tareas["nombre_tarea"] ?></td>
      <td><?= $filas_tareas["descripcion"] ?></td>
      <td><?= $filas_tareas["c_tipo"] ?></td>
      <td><?= $filas_tareas["fecha_modif"] ?></td>
      <td><?= $filas_tareas["fecha_creacion"] ?></td>
      <td><?= $filas_tareas["persona"] ?></td>
      <td><?= $filas_tareas["empresa"] ?></td>
      <td>
        <a href="modificar_tareas.php?id=<?= $filas_tareas["id_tarea"]?>" class="btn btn-small btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
        <a onclick="return eliminar()"href="formulario.php?id=<?= $filas_tareas["id_tarea"]?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
      </td>
    </tr>
    <?php }
    ?>
  </tbody>
</table>
</div>

</div>
<script>

function eliminar(){
    var respuesta= confirm("Estas seguro que deseas eliminar la tarea?");
    return respuesta;
}

let select = document.getElementById("tipo_tarea");
let selectedOption = select.value;
console.log(selectedOption);


function verEmpresa(){

  let select = document.getElementById("tipo_tarea");
  let selectedOption = select.value;

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