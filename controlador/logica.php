<?php

var_dump($_POST);

$conexion = new PDO('pgsql:host=dpg-d8g5vu28qa3s73asc3dg-a.oregon-postgres.render.com;dbname=bd_profe','bd_profe_user','biTM7L5wwdh8SyCZGqEbVreq19d55ZZT');
$registrar = $conexion->prepare("INSERT INTO form_sugerencias (nombre,telefono,detalles) VALUES (?, ?, ?)");
$registrar->execute([$_POST["nom"], $_POST["tel"], $_POST["det"]]);
echo "<p style='color:white;background-color:green;font-family:calibri,arial;font-size:24px;text-align:center'>Registro exitoso</p>";

$consulta = $conexion->prepare("SELECT * FROM form_sugerencias order by id");
$consulta->execute();
$tabla = $consulta->fetchAll(PDO::FETCH_ASSOC);	      //PDO::FETCH_NUM
$conexion = null;

echo "<table><tr><th>Codigo</th>
                 <th>Nombre completo</th>
                 <th>Contacto</th>
			     <th>Detalles</th>		</tr>";
foreach($tabla as $fila){		//Recorre el arreglo $tabla como FETCH_NUM
    echo "<tr>		<td>$fila[id]</td>
            		<td>$fila[nombre]</td>
            		<td>$fila[telefono]</td>
            		<td>$fila[detalles]</td>		</tr>";
}
echo "</table>";

?>


<style>
    /* Fondo tecnológico */
    body {
        background-color: #0d1117;
        color: #c9d1d9;
        font-family: 'Segoe UI', Tahoma, sans-serif;
        padding: 40px;
        background-image: radial-gradient(circle at top, #161b22 0%, #0d1117 100%);
    }
    
    /* Ocultamos el var_dump y el texto verde feo original para mostrar la alerta bonita */
    pre, p[style*="background-color:green"] {
        display: none !important;
    }

    /* Diseño hiper-tecnológico para la tabla que imprime tu PHP */
    table {
        width: 100%;
        max-width: 1000px;
        margin: 20px auto;
        border-collapse: collapse;
        background: #161b22;
        box-shadow: 0 0 20px rgba(88, 166, 255, 0.15);
        border-radius: 10px;
        overflow: hidden;
    }
    th {
        background-color: #21262d;
        color: #58a6ff;
        padding: 15px;
        border-bottom: 2px solid #30363d;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    td {
        padding: 15px;
        border-bottom: 1px solid #21262d;
        text-align: center;
        color: #c9d1d9;
    }
    tr:hover td {
        background-color: #1c2128;
        color: #fff;
    }
    
    /* Botón flotante para volver */
    .btn-volver {
        display: block;
        width: 200px;
        margin: 30px auto;
        text-align: center;
        padding: 10px;
        background: transparent;
        color: #8b949e;
        border: 2px solid #8b949e;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: 0.3s;
    }
    .btn-volver:hover {
        background: #8b949e;
        color: #0d1117;
    }
</style>

<a href="../index.html" class="btn-volver">⬅ Volver al Inicio</a>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Automáticamente lanza la pestaña de éxito al cargar esta pantalla
    Swal.fire({
        title: '¡Registro Exitoso!',
        text: 'Los datos están seguros en la base de datos.',
        icon: 'success',
        background: '#161b22',
        color: '#c9d1d9',
        confirmButtonColor: '#2ea043'
    });
</script>
