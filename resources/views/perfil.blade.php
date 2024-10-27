<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
</head>

<body>
    <h1>Bienvenido, {{ Auth::user()->nombre }}</h1>
    <p>Usuario: {{ Auth::user()->usuario }}</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar Sesión</button>
    </form>

    <h1>Notas</h1>
    <table id="notas-table">
        <thead>
            <tr>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>80</td>
                <td>90</td>
                <td>50</td>
            </tr>
        </tbody>
    </table>

    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger intent="WELCOME" chat-title="Sabiondo" agent-id="cb13dbb3-098a-4566-adf1-62e26f49f653" language-code="es"
        chat-icon="https://i.postimg.cc/vH73Qz65/Recurso-3.png"></df-messenger>

        <script>
            // Espera a que se cargue el Messenger de Dialogflow
            document.addEventListener("DOMContentLoaded", function() {
                // Obtiene el nombre del usuario desde PHP
                var userName = "{{ Auth::user()->nombre }}";
        
                // Captura las notas de la tabla
                var notas = [];
                var rows = document.querySelectorAll('#notas-table tbody tr');
                rows.forEach(row => {
                    row.querySelectorAll('td').forEach(cell => {
                        notas.push(parseFloat(cell.textContent));
                    });
                });
        
                // Envía el nombre del usuario y las notas como datos personalizados a Dialogflow
                const dfMessenger = document.querySelector('df-messenger');
                dfMessenger.setCustomUserData({ nombre: userName, notas: notas.join(', ') });
            });
        </script>
        

</body>

</html>
