<?php

//var_dump($_POST);

$conexion = new PDO('pgsql:host=dpg-d8g5vu28qa3s73asc3dg-a.oregon-postgres.render.com;dbname=bd_profe','bd_profe_user','biTM7L5wwdh8SyCZGqEbVreql9d55ZZT');
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

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gestión de Sugerencias</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#111;
    color:#fff;
    font-family:Arial, Helvetica, sans-serif;
    padding:30px;
}

.contenedor{
    max-width:1200px;
    margin:auto;
}

h1{
    text-align:center;
    color:#FFD700;
    margin-bottom:25px;
    letter-spacing:2px;
}

.botones{
    text-align:center;
    margin-bottom:20px;
}

.btn{
    background:#FFD700;
    color:#000;
    border:none;
    padding:12px 25px;
    border-radius:8px;
    font-weight:bold;
    cursor:pointer;
    transition:.3s;
}

.btn:hover{
    background:#ffea70;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#1b1b1b;
    overflow:hidden;
    border-radius:10px;
    box-shadow:0 0 20px rgba(255,215,0,.25);
}

th{
    background:#FFD700;
    color:#000;
    padding:15px;
    text-transform:uppercase;
}

td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #333;
}

tr:nth-child(even){
    background:#222;
}

tr:hover{
    background:#333;
}

.exito{
    color:white;
    background:green;
    padding:15px;
    border-radius:8px;
    text-align:center;
    margin-bottom:20px;
    font-size:20px;
}
</style>
</head>

<body>

<div class="contenedor">

    <h1>GESTIÓN DE SUGERENCIAS</h1>

    <div class="botones">
        <button class="btn" onclick="history.back()">
            ← Volver
        </button>
    </div>


</div>

</body>
</html>

</body>
</html>
