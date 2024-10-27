<?php

namespace App;

use Google\Cloud\Dialogflow\V2\SessionsClient;

class DialogflowService
{
    protected $projectId;

    public function __construct()
    {
        $this->projectId = 'tu-project-id'; // Reemplaza con el ID de tu proyecto en Google Cloud
    }

    public function detectIntent($text, $sessionId)
    {
        $sessionClient = new SessionsClient();
        $session = $sessionClient->sessionName($this->projectId, $sessionId);

        $queryInput = [
            'text' => [
                'text' => $text,
                'language_code' => 'es', // Cambia a tu idioma si es necesario
            ],
        ];

        $response = $sessionClient->detectIntent($session, $queryInput);
        $sessionClient->close();

        return $response->getQueryResult()->getFulfillmentText();
    }
}
