<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <style>
        body {
            background-image: url(img/guitarra.jpg);
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: rgba(0, 0, 0, 0.7);
            width: 200px; /* Aumentado el ancho del contenedor */
            height: 360px; /* Aumentado la altura del contenedor */
            padding: 20px; /* Reducido el padding del contenedor */
            border-radius: 5px;
            background-size: 500px;
            text-align: center;
        }

        .login-container h2 {
            color: #f2f2f2;
            margin-bottom: 20px;
            position: relative;
        }

        .login-container h2:before {
            content: "";
            display: block;
            width: 200px;
            height: 200px;
            background-image: url(img/musicpro.png);
            background-size: cover;
            background-position: top;
            background-repeat: no-repeat;
            position: absolute;
            bottom: 100px;
            left: calc(50% - 100px);
            animation: animateImage 10s linear infinite;
        }

        .login-container h2 span {
            display: inline-block;
            animation: animateText 3s infinite;
        }

        @keyframes animateText {
            0% { color: #ff0000; }
            25% { color: #00ff00; }
            50% { color: #0000ff; }
            75% { color: #ffff00; }
            100% { color: #ff00ff; }
        }

        @keyframes animateImage {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 150px;
            padding: 10px ;
            margin-bottom: 10px;
            border-radius: 5px;
            text-align: center;
            border: none;
        }

        .login-container input[type="submit"] {
            background-color: #333;
            color: #f2f2f2;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2><span>¡Bienvenido!</span></h2>
        <form method="POST" action="newL.php">
            <input type="text" name="user" placeholder="Usuario" required>
            <br>
            <input type="password" name="password" placeholder="Contraseña" required>
            <br>
            <input type="submit" value="Iniciar sesión">
        </form>
        <?php
        function redirect($location) {
            header("Location: $location");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Incluir el archivo configL.php para establecer la conexión a la base de datos
            require_once 'configL.php';

            // Obtén los datos de inicio de sesión enviados desde el formulario
            $user = $_POST['user'];
            $password = $_POST['password'];

            // Consulta SQL para verificar las credenciales del usuario
            $sql = "SELECT * FROM usuarios WHERE user = '$user' AND password = '$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Las credenciales son válidas, el inicio de sesión es exitoso
                $response = array('status' => 'success', 'message' => 'Inicio de sesión exitoso');
                redirect("newP.php");
            } else {
                // Las credenciales son inválidas, el inicio de sesión falla
                echo '<p style="color: red;">Credenciales incorrectas</p>';
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>

