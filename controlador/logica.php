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
<title>Gestión de Sugerencias</title>

<style>
body{
    background:#111;
    font-family:Arial, Helvetica, sans-serif;
    margin:0;
    padding:30px;
    color:white;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
    background:#1a1a1a;
    box-shadow:0 0 20px rgba(255,215,0,.2);
}

th{
    background:#FFD700;
    color:#000;
    padding:15px;
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

.panel{
    display:flex;
    justify-content:center;
    gap:15px;
    margin-bottom:20px;
}

.btn{
    background:#FFD700;
    color:#000;
    padding:12px 25px;
    border:none;
    border-radius:8px;
    font-weight:bold;
    cursor:pointer;
}

.btn:hover{
    background:#ffea70;
}
</style>

</head>
<body>

<h1 style="text-align:center;color:#FFD700;">
    GESTIÓN DE SUGERENCIAS
</h1>

<div class="panel">
    <button class="btn">Consultar</button>
    <button class="btn">Ordenar</button>
</div>

<?php

// TU PHP EXACTAMENTE IGUAL DESDE AQUÍ

$conexion = new PDO('pgsql:host=dpg-d8g5vu28qa3s73asc3dg-a.oregon-postgres.render.com;dbname=bd_profe','bd_profe_user','biTM7L5wwdh8SyCZGqEbVreql9d55ZZT');
$registrar = $conexion->prepare("INSERT INTO form_sugerencias (nombre,telefono,detalles) VALUES (?, ?, ?)");
$registrar->execute([$_POST["nom"], $_POST["tel"], $_POST["det"]]);
echo "<p style='color:white;background-color:green;font-family:calibri,arial;font-size:24px;text-align:center'>Registro exitoso</p>";

$consulta = $conexion->prepare("SELECT * FROM form_sugerencias order by id");
$consulta->execute();
$tabla = $consulta->fetchAll(PDO::FETCH_ASSOC);
$conexion = null;

echo "<table><tr><th>Codigo</th>
                 <th>Nombre completo</th>
                 <th>Contacto</th>
                 <th>Detalles</th></tr>";

foreach($tabla as $fila){
    echo "<tr>
            <td>$fila[id]</td>
            <td>$fila[nombre]</td>
            <td>$fila[telefono]</td>
            <td>$fila[detalles]</td>
          </tr>";
}

echo "</table>";

?>

</body>
</html>
