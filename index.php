<!DOCTYPE html>

<?php include('conexion.php'); ?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Introducción a php</title>
</head>
<body>
    
    <div class="container">
        <h2>Formulario lista de tareas</h2>

        <form method="POST" action="store.php">
            
            <label for="tarea">Nombre de Tarea</label><br>
            <input type="text" name="tarea">
            <br>

            <label for="descripcion">descripción</label><br>
            <textarea name="descripcion" id="" cols="32" rows="10"></textarea>
            <br>

            <label for="prioridad">Prioridad</label><br>
            <select name="prioridad" id="">
                <option value="Alta">Alta</option>
                <option value="Media">Media</option>
                <option value="Baja">Baja</option>
            </select>
            <br>

            <input type="checkbox" name="urgente" id="" value="1">
            <label for="urgente">Check box Urgente</label>

            <br>
            <input type="radio" name="tipo" value="escuela">
            <label for="tipo">Escuela</label>

            <br>
            <input type="radio" name="tipo" value="trabajo">
            <label for="tipo">Trabajo</label>

            <br>
            <input type="submit" value="Enviar">
        </form>


        <hr>
        <h2>Liata de tareas</h2>
        <?php

        $sql = "SELECT * FROM tareas";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo "<tr> <th>ID</th> <th>Nombre</th> <th>Descripcion</th> <th>Tipo</th> </tr>";
        foreach ($stmt->fetchAll() as $tarea) {
            echo "
            <tr>
                <td>" . $tarea['id'] . "</td>
                <td>" . $tarea['tarea'] . "</td>
                <td>" . $tarea['descripcion'] . "</td>
                <td>" . $tarea['tipo'] . "</td>
            
            </tr>";
        }
        echo "</table>";

        ?>

        
    </div>


</body>
</html>