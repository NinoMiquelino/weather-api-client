<?php
// Inclui a classe POO
require_once __DIR__ . '/WeatherClient.php'; 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

$method = $_SERVER['REQUEST_METHOD'] ?? '';

if ($method === 'GET') {
    $response = ['success' => false, 'data' => null, 'error' => ''];
    $city = $_GET['city'] ?? 'Rio de Janeiro'; // Cidade padrão

    try {
        // 1. Instancia a classe Cliente
        $client = new WeatherClient();
        
        // 2. Obtém os dados brutos da API usando o método da classe
        $rawData = $client->getWeather($city);
        
        // 3. Formata os dados para o frontend usando outro método da classe
        $formattedData = $client->formatData($rawData);
        
        $response['success'] = true;
        $response['data'] = $formattedData;

    } catch (Exception $e) {
        http_response_code(400); 
        $response['error'] = "Erro ao buscar clima: " . $e->getMessage();
    }

    echo json_encode($response);

} elseif ($method === 'OPTIONS') {
    http_response_code(200);
    exit();
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Método não permitido.']);
}
