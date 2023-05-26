<!DOCTYPE html>
<html>
<head>
<style>
    body {
        background-image: url(img/imgfondo.jpg);
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        margin: 0;
        padding: 0;
    }
    
    .hero {
        height: 38px;
        background-color: #f2f2f2;
        text-align: center;
    }
    
    .navbar {
        background-color: #333;
        color: #f2f2f2;
        padding: 10px;
    }
    
    .navbar a {
        color: #f2f2f2;
        text-decoration: none;
        padding: 10px;
    }
    
    .table-container {
        width: 1200px;
        height: 600px; /* Tamaño fijo de la tabla */
        margin: 0 auto;
        margin-top: 100px;
        padding-left: 100px;
        padding-right: 100px;
        padding-top: 80px;
        padding-bottom: 80px;
        text-align: center;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-weight: bold;
        color: #f2f2f2;
        background-color: rgba(0, 0, 0, 0.8);
        overflow: auto; /* Agrega una barra de desplazamiento */
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 0 auto;
    }
    
    th, td {
        padding: 5px;
        text-align: center;
        border: 1px solid #fff
    }
    
    .button-container {
        display: flex;
        justify-content: center;
    }
    
    .button {
        padding: 5px 10px;
        margin: 5px;
        background-color: #333;
        color: #f2f2f2;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
</style>
</head>
<body>
    <div class="hero">
        <div class="navbar">
            <a href="#" onclick="confirmLogout()">CERRAR SESIÓN</a>
        </div>
    </div>
    
    <div class="table-container">
        <table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>Enviar a sucursal</th> <!-- Columna extra para los botones -->
            </tr>
            <?php require_once 'configP.php'; ?>
        </table>
    </div>

    <script>
        function confirmLogout() {
            var confirmation = confirm("¿Estás seguro de que deseas cerrar sesión?");
            if (confirmation) {
                window.location.href = "newL.php";
            }
        }
    </script>
</body>
</html>
