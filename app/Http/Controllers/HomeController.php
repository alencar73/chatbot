<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index'); // Asegúrate de que esta vista exista en resources/views
    }
}
