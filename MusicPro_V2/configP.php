<?php
// Configuración de la base de datos
$host = "localhost"; // Cambia esto si tu base de datos está alojada en un servidor remoto
$dbName = "prueba";
$username = "root";
$password = "";

try {
    // Establecer conexión a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);

    // Consulta para obtener el último ID registrado
    $query = "SELECT ID FROM productos ORDER BY ID DESC LIMIT 1";
    $result = $conn->query($query);
    $lastID = $result->fetchColumn();

    // Verificar si se ha enviado el formulario de inserción de producto
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el nuevo ID basado en el último ID registrado
        if ($lastID) {
            $id = $lastID + 1;
        } else {
            $id = 1; // Si no hay registros, el ID será 1
        }

        // Obtener los demás datos del formulario
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $stock = $_POST["stock"];

        // Insertar los datos en la tabla
        $query = "INSERT INTO productos (ID, Nombre, Descripcion, Stock) VALUES (:id, :nombre, :descripcion, :stock)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":stock", $stock);
        $stmt->execute();
    }

    // Mostrar el formulario de agregar productos
    echo "<form id='formulario-agregar' method='post' action='' style='margin-bottom: 10px;'>";
    echo "<input type='text' name='nombre' placeholder='Nombre' required>";
    echo "<input type='text' name='descripcion' placeholder='Descripción' required>";
    echo "<input type='number' name='stock' placeholder='Stock' required>";
    echo "<button type='submit'>Agregar</button>";
    echo "</form>";

    // Consulta para obtener los datos de la tabla
    $query = "SELECT * FROM productos ORDER BY ID";
    $result = $conn->query($query);

    // Mostrar los datos en la tabla
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Nombre'] . "</td>";
        echo "<td>" . $row['Descripcion'] . "</td>";
        echo "<td>" . $row['Stock'] . "</td>";
        echo "<td><button>Enviar a Sucursal</button></td>";
        echo "</tr>";
    }

    // Cerrar la conexión a la base de datos
    $conn = null;
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>

<style>
#formulario-agregar {
    margin-top: 10px; /* Espacio superior para el formulario */
}

#formulario-agregar input,
#formulario-agregar button {
    margin-right: 10px; /* Espacio derecho entre los elementos del formulario */
}
</style>
