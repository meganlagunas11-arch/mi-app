<?php

$conn = new mysqli("lab-db.cv8owwcmsfde.us-east-1.rds.amazonaws.com", "admin", "Admin12345", "transporte_lab");

if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

$sql = "SELECT 
    e.id_envio,
    c.nombre AS cliente,
    v.tipo AS vehiculo,
    r.origen,
    r.destino,
    e.estado
FROM envios e
JOIN clientes c ON e.id_cliente = c.id_cliente
JOIN vehiculos v ON e.id_vehiculo = v.id_vehiculo
JOIN rutas r ON e.id_ruta = r.id_ruta;";

$result = $conn->query($sql);

if ($result) {
    while($row = $result->fetch_assoc()) {
        echo $row["cliente"] . " - " . $row["estado"] . "<br>";
    }
} else {
    echo "Error en query";
}

?>
