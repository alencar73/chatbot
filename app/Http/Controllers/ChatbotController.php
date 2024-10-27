<?php

namespace App\Http\Controllers;

use App\DialogflowService;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    protected $dialogflowService;

    public function __construct(DialogflowService $dialogflowService)
    {
        $this->dialogflowService = $dialogflowService;
    }

    public function handle(Request $request)
    {
        $userMessage = $request->input('message');
        $sessionId = session()->getId();

        // Enviar el mensaje al servicio de Dialogflow
        $botResponse = $this->dialogflowService->detectIntent($userMessage, $sessionId);

        // Retornar la respuesta en formato JSON
        return response()->json(['response' => $botResponse]);
    }
}
