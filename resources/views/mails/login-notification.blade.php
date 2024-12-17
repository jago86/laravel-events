<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            padding: 15px;
        }
        .header {
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .footer {
            font-size: 12px;
            text-align: center;
            color: #777;
            margin-top: 10px;
        }
        a.button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        a.button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Encabezado -->
        <div class="header">
            <h1>Hola, {{ $user->name }}</h1>
        </div>

        <!-- Contenido -->
        <div class="content">
            <p>Hemos detectado un nuevo inicio de sesión con tu usuario {{ $user->email }}
                desde la IP {{ $request['ip'] }}.
            </p>
            <p>Si fuiste tu, puedes ignorar este mensaje. Caso contrario, haz clic en el enlace de abajo para restablecer tu contraseña.</p>
            <a href="#" class="button">Haz clic aquí</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Tu Aplicación | Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>
