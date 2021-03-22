<!DOCTYPE html>
<html lang="es">
</html>



<?php include('conexion.php'); 


// mandar acrchivos a la BD
if(!empty($_POST['tarea'])) {
            

    $tarea = $_POST['tarea'];
    $descripcion = $_POST['descripcion'];
    $prioridad = $_POST['prioridad'];
    $urgente = $_POST['urgente'];
    $tipo = $_POST['tipo'];

    $sql = "INSERT INTO tareas (tarea, descripcion, prioridad, urgente, tipo) VALUES ('$tarea', '$descripcion', '$prioridad', '$urgente', '$tipo')";
    
    $conn->exec($sql);

    // * Redireccionamiento
    header('Location: index.php');

} else {
    echo 'No hay datos enviados';
}

?>