<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h2>Registro</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>

        <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a></p>
    </div>
</body>
</html>
