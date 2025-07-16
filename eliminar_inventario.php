<?php
// Mostrar errores en desarrollo
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos
include 'db_connect.php';

// Validar si llegó el ID por POST
if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // Convertir a número por seguridad

    // Si el ID es válido
    if ($id > 0) {
        // Ejecutar consulta SQL
        $delete = $conn->query("DELETE FROM inventario WHERE id = $id");

        if ($delete) {
            echo 1; // ✅ Éxito
        } else {
            echo 0; // ❌ Falló consulta SQL
        }
    } else {
        echo 0; // ❌ ID no válido
    }
} else {
    echo 0; // ❌ No se recibió el ID
}
?>