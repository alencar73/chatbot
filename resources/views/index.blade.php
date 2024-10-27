<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
</head>

<body>
    <h1>Bienvenido a la Página Principal</h1>
    <p>Aquí puedes ver la información de la escuela.</p>

    <a href="{{ route('login') }}">
        <button type="button">Iniciar Sesión</button>
    </a>

    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger intent="WELCOME" 
       chat-title="Sabiondo" agent-id="cb13dbb3-098a-4566-adf1-62e26f49f653" 
       language-code="es"
       chat-icon="https://i.postimg.cc/vH73Qz65/Recurso-3.png"></df-messenger>
</body>

</html>
