<!DOCTYPE html>
<html>
<head>
    <title>Resultado de Búsqueda de Teléfono</title>
</head>
<body>
    <h1>Resultado de Búsqueda de Teléfono</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Obtener el número de teléfono ingresado por el usuario desde el formulario.
        $telefono = $_POST["telefono"];

        // Obtener la clave de API ingresada por el usuario desde el formulario.
        $api_key = $_POST["api_key"];

        // Obtener el apartado de la URL ingresado por el usuario desde el formulario.
        $url_part = $_POST["url_part"];

        // Comprobar si el número de teléfono, la clave de API y el apartado de la URL están presentes y no están vacíos.
        if (!empty($telefono) && !empty($api_key) && !empty($url_part)) {
            // Inicializar cURL.
            $ch = curl_init();

            // Crear la URL con el número de teléfono ingresado por el usuario, la clave de API y el apartado de la URL.
            $url = "https://phonevalidation.abstractapi.com/v1/" . urlencode($url_part) . "/?api_key=" . urlencode($api_key) . "&phone=" . urlencode($telefono);

            // Establecer la URL que se va a GET mediante la opción CURLOPT_URL.
            curl_setopt($ch, CURLOPT_URL, $url);

            // Establecer CURLOPT_RETURNTRANSFER en true para que el contenido se devuelva como una variable.
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Establecer CURLOPT_FOLLOWLOCATION en true para seguir las redirecciones.
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

            // Ejecutar la solicitud.
            $data = curl_exec($ch);

            // Cerrar el controlador cURL.
            curl_close($ch);

            // Imprimir los datos en la página.
            echo "Resultado de la búsqueda para el número de teléfono: " . htmlspecialchars($telefono) . "<br>";
            echo "Respuesta de la API: " . htmlspecialchars($data);
        } else {
            echo "Por favor, ingresa un número de teléfono, una clave de API y un apartado de la URL válidos.";
        }
    }
    ?>
    <br>
    <a href="verifyphone.html">Volver al formulario</a>
</body>
</html>
