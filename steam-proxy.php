<?php
// Прокси-запрос к Steam API

// URL, к которому мы хотим обратиться (пример)
$url = 'https://api.steampowered.com/IClientMetricsService/ReportClientError/v1';

// Отправка запроса
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Если ты хочешь передать POST-данные:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents('php://input'));
}

// Получаем ответ
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Устанавливаем заголовки для CORS
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
http_response_code($http_code);

// Отдаём результат клиенту
echo $response;
?>
