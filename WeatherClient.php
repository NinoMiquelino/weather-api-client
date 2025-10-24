<?php

class WeatherClient {
    private const API_BASE_URL = 'https://api.openweathermap.org/data/2.5/weather';
    private string $apiKey;
    
    // --- Configuração da Chave ---
    // ATENÇÃO: Substitua 'SUA_CHAVE_AQUI' pela chave que você obteve no OpenWeatherMap
    public function __construct() {
        // Por segurança, a chave DEVERIA estar em um arquivo de configuração fora do código
        $this->apiKey = 'SUA_CHAVE_AQUI'; 
        if ($this->apiKey === 'SUA_CHAVE_AQUI' || empty($this->apiKey)) {
            throw new Exception("Chave de API do OpenWeatherMap não configurada em WeatherClient.php.");
        }
    }

    /**
     * Faz uma requisição HTTP usando cURL e retorna o JSON decodificado.
     * @param string $city Nome da cidade para buscar.
     * @return array Dados do clima.
     */
    public function getWeather(string $city): array {
        $url = $this::API_BASE_URL . 
               "?q=" . urlencode($city) . 
               "&appid=" . $this->apiKey . 
               "&units=metric" . // Retorna em Celsius
               "&lang=pt_br"; // Retorna o idioma em Português
        
        $ch = curl_init();
        
        // Configurações do cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorna a resposta como string
        curl_setopt($ch, CURLOPT_TIMEOUT, 5); // Timeout de 5 segundos

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        
        curl_close($ch);
        
        if ($response === false) {
            throw new Exception("Erro de rede cURL: " . $error);
        }

        $data = json_decode($response, true);
        
        // Lógica de tratamento de erro da API
        if ($httpCode !== 200 || ($data['cod'] ?? 200) !== 200) {
            $message = $data['message'] ?? 'Erro desconhecido ao obter dados.';
            throw new Exception("Erro da API: " . $message);
        }

        return $data;
    }

    /**
     * Processa os dados brutos da API para um formato mais limpo e amigável.
     * @param array $rawData Dados brutos da API.
     * @return array Dados processados.
     */
    public function formatData(array $rawData): array {
        $main = $rawData['main'];
        $weather = $rawData['weather'][0];
        $wind = $rawData['wind'];

        return [
            'city_name' => $rawData['name'] ?? 'N/A',
            'country' => $rawData['sys']['country'] ?? 'N/A',
            'temp' => round($main['temp']) . '°C',
            'feels_like' => round($main['feels_like']) . '°C',
            'description' => ucfirst($weather['description'] ?? 'N/A'),
            'icon_url' => "http://openweathermap.org/img/wn/" . ($weather['icon'] ?? '') . "@2x.png",
            'humidity' => $main['humidity'] ?? 'N/A',
            'wind_speed' => round($wind['speed'] * 3.6) . ' km/h', // Converte de m/s para km/h
            'sunrise' => date('H:i', $rawData['sys']['sunrise'] ?? time()),
            'sunset' => date('H:i', $rawData['sys']['sunset'] ?? time()),
        ];
    }
}
