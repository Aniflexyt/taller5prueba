<?php
// Tu conexión exacta sin cambios
$conexion = new PDO('pgsql:host=dpg-d8g5vu28qa3s73asc3dg-a.oregon-postgres.render.com;dbname=bd_profe','bd_profe_user','biTM7L5wwdh8SyCZGqEbVreq19d55ZZT');

$registroExitoso = false;

// Verificamos que vengan datos del formulario para no guardar vacíos si solo queremos "Ver"
if(isset($_POST["nom"])) {
    // Tus líneas exactas de inserción
    $registrar = $conexion->prepare("INSERT INTO form_sugerencias (nombre,telefono,detalles) VALUES (?, ?, ?)");
    $registrar->execute([$_POST["nom"], $_POST["tel"], $_POST["det"]]);
    $registroExitoso = true; // Activamos la ventanita
}

// Tus líneas exactas de consulta
$consulta = $conexion->prepare("SELECT * FROM form_sugerencias order by id");
$consulta->execute();
$tabla = $consulta->fetchAll(PDO::FETCH_ASSOC);       //PDO::FETCH_NUM
$conexion = null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros | Base de Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #0d1117;
            color: #c9d1d9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px 20px;
            background-image: radial-gradient(circle at top, #161b22 0%, #0d1117 100%);
            min-height: 100vh;
        }
        .container-tech {
            max-width: 1000px;
            margin: auto;
            background: #161b22;
            border: 1px solid #30363d;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(46, 160, 67, 0.1);
        }
        h2 { color: #2ea043; text-shadow: 0 0 10px rgba(46, 160, 67, 0.4); letter-spacing: 2px; }
        .table-tech {
            width: 100%; border-collapse: separate; border-spacing: 0;
            border-radius: 10px; overflow: hidden; border: 1px solid #30363d;
        }
        .table-tech th { background-color: #21262d; color: #58a6ff; padding: 15px; }
        .table-tech td { background-color: #0d1117; color: #c9d1d9; padding: 15px; border-bottom: 1px solid #21262d; }
        .table-tech tr:hover td { background-color: #1c2128; color: #fff; }
        .btn-volver {
            background-color: transparent; color: #8b949e; border: 2px solid #8b949e; 
            padding: 8px 16px; text-decoration: none; border-radius: 5px;
        }
        .btn-volver:hover { background-color: #8b949e; color: #0d1117; box-shadow: 0 0 15px #8b949e; }
    </style>
</head>
<body>
    <div class="container-tech">
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-secondary pb-3">
            <h2>[ TERMINAL_REGISTROS ]</h2>
            <a href="../index.html" class="btn-volver fw-bold">⬅ Volver al Inicio</a>
        </div>
        
        <table class="table-tech text-center">
            <tr>
                <th>Codigo</th>
                <th>Nombre completo</th>
                <th>Contacto</th>
                <th>Detalles</th>
            </tr>
            <?php
            // Tu mismo foreach para recorrer la tabla
            foreach($tabla as $fila){
                echo "<tr>
                        <td class='text-success fw-bold'># {$fila['id']}</td>
                        <td>{$fila['nombre']}</td>
                        <td>{$fila['telefono']}</td>
                        <td class='text-start'>{$fila['detalles']}</td>
                      </tr>";
            }
            ?>
        </table>
    </div>

    <?php if($registroExitoso): ?>
    <script>
        Swal.fire({
            title: '¡Registro exitoso!',
            text: 'Los datos fueron guardados en la base de datos.',
            icon: 'success',
            background: '#161b22',
            color: '#c9d1d9',
            confirmButtonColor: '#2ea043'
        });
    </script>
    <?php endif; ?>
</body>
</html>
