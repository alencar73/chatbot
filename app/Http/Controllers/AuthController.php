<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Alumno;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'contrasena' => 'required|string',
        ]);
    
        // Busca el usuario en la base de datos
        $alumno = Alumno::where('usuario', $request->usuario)->first();
    
        // Verifica si el usuario existe y la contraseña coincide
        if ($alumno && $alumno->contrasena === $request->contrasena) {
            Auth::login($alumno); // Inicia sesión
            return redirect()->intended('perfil'); // Redirige a la página de perfil
        }
    
        return back()->withErrors([
            'usuario' => 'Las credenciales son incorrectas.',
        ]);
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect('/'); // Redirige a la página principal después de cerrar sesión
    }

    public function register(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'nombre' => 'required|string',
            'usuario' => 'required|string|unique:alumnos', // Verifica que el usuario sea único
            'contrasena' => 'required|string|min:8', // Validar que la contraseña tenga al menos 8 caracteres
        ]);
    
        // Crear el nuevo alumno sin hashear la contraseña
        Alumno::create([
            'nombre' => $request->nombre,
            'usuario' => $request->usuario,
            'contrasena' => $request->contrasena, // Almacena la contraseña tal cual
        ]);
    
        return redirect()->route('login')->with('success', 'Usuario registrado con éxito.');
    }
    

    public function showRegistrationForm()
    {
        return view('auth.register'); // Vista del formulario de registro
    }
}
